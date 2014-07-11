<?php
/**
 * User controller.
 *
 * This file will render views from views/caculators/
 *
 * PHP 5
 *
 * Copyright (c) Jason Lu (jasonl.biz@gmail.com)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Jason Lu (jasonl.biz@gmail.com)
 * @link          https://github.com/bumetcs/cs673
 * @package       app.Controller
 * @since         DiabeteSavior v 0.0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');
App::uses('Security', 'Utility');
App::uses('CakeEmail', 'Network/Email');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
  public $uses = array();

  public function beforeFilter(){
    parent::beforeFilter();
    Security::setHash('sha512');
  }

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
  public function index() {
    //$this->authenticate_user();
    $this->authenticate_admin();
    $users = $this->User->find('all');
    $this->set('users', $users);
  }


/**
 * Do login
 *
 * @param email, password
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
  public function do_login() {
    //var_dump($this->request->data); exit;
    if(!$this->request->is('post') && !$this->request->is('put')) {
      //$this->header('HTTP/1.1 403 Forbidden');
      //$this->Session->setFlash(__('Go away'));
      throw new ForbiddenException();
      //$this->cakeError('error403');
      //exit;
    }

    $email = $this->request->data('email');
    $password = $this->request->data('password');
    $remember_me = $this->request->data('remember_me');
    // var_dump($this->request->data);
    $conditions = array("email" => $email, "password" => $password);
    $user = $this->User->find('first', array('conditions' => $conditions));
    $user = $user['User'];
    $res = new stdClass();
    $res->status = 0;
    $res->message = "Initialized";
    $res->data = null;
    if (!$user) {
      $res->status = -1;
      $res->message = __d("login", "Login failed, wrong email/password");
      $res->class = "alert alert-danger";
      $res->data = $user;
    } else if ($user['activated'] == 0) {
      $res->status = 0;
      $res->message = __d("login", "Login failed, account is not activated.");
      $res->class = "alert alert-danger";
      $res->data = $user;
      //$this->Session->write('user', $user);
    } else {
      $res->status = 1;
      $res->message = __d("login", "Login succeed");
      $res->class = "alert alert-success";
      $res->data = $user;
      $this->Session->write('user', $user);
      if($remember_me == 'yes') {
        $auto_login_token = sha1(time() . $password);
        $data = array('id' => $user['id'], 'auto_login_token' => $auto_login_token);
        //$this->User->set('auto_login_token', $auto_login_token);
        $this->User->save($data);
        setcookie("auto_login", $auto_login_token, time() + 86400 * 90, "/");  /* expire in 90 days */
      }
    }
    //$this->Session->setFlash('Visit added successfully!', 'default', );
    $this->Session->setFlash($res->message, 'default', array('class' => $res->class));
    /*
    <div id="flashMessage" class="alert alert-success">Algorithm results accepted successfully!</div>
    */
    $this->set('user', $user);
    $this->autoRender = false;
    $this->redirect($this->referer());
    echo json_encode($res);
    exit;
  }

/**
 * Do logout
 *
 * @param email, password
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
  public function logout() {
    $user = $this->Session->read('user');
    $data = array('id' => $user['id'], 'auto_login_token' => null);
    $this->User->save($data);

    $this->Session->delete('user');
    setcookie('auto_login', null, -1, '/');
    $this->redirect("/");
    exit;
  }

/**
 * Forgot password
 *
 * @param email
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
  public function forgot_password() {
    if ($this->request->is('post')){
      $email = $this->request->data['User']['email'];
      $this->User->recursive = -1;  // Don't fetch associated models
      $user = $this->User->findByEmail($email);
      if($user) {
        //var_dump($user);
        //exit;
        $reset_token = sha1(time() . $user["User"]["id"]);
        $this->User->id = $user["User"]["id"];
        $this->User->set(array(
          'reset_token' => $reset_token
        ));
        $this->User->save();

        $reset_token = "reset_password?token=" . $reset_token;
        $user["reset_token"] = $reset_token;

        $reset_url = "http://" . CakeRequest::host() . $this->request->webroot;
        $reset_token = $reset_url . $reset_token;
        $mail = new CakeEmail();
        $mail->viewVars(array('reset_token' => $reset_token));
        $mail->template('forgot_password', 'default')
          ->subject('DiabeteSavior: Reset your password')
          ->emailFormat('html')
          ->to($email)
          ->from('no-reply@diabetesavior.com')
          ->send();
          //var_dump($mail);
      } else {
        var_dump("notfound");
        exit;
      }
    }
  }

/**
 * Create new user
 *
 * @param email, password
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
  public function add() {
    //$this->authenticate_user();
    //$this->authenticate_admin();
    if ($this->request->is('post')){
      $this->User->create();
      try {
        $activate_token = sha1(time() . $userEmail . $userPassword);
        $userEmail = $this->request->data["User"]["email"];
        $userPassword = sha1($this->request->data["User"]["password"]);
        $this->request->data["User"]["activate_token"] = $activate_token;
        //var_dump($this->request->data);
        //exit;
        $res = $this->User->saveAssociated($this->request->data);
        
        $admin_emails = array();
        $this->User->recursive = -1;
        $conditions = array("User.role >" => 0);
        $admins = $this->User->find('all', array('conditions' => $conditions));

        foreach($admins as $u) {
          if($u['User']['email'] != '') {
            array_push($admin_emails, $u['User']['email']);
          }
        }
        
        $mail = new CakeEmail();
        $mail->template('notify_new_user', 'default')
          ->subject('New user notification')
          ->emailFormat('html')
          ->to('admin@diabetesavior.com')
          ->bcc($admin_emails)
          ->from('admin@diabetesavior.com')
          ->send();
        
        $baseUrl = "http://" . CakeRequest::host() . $this->request->webroot;
        $activate_url = $baseUrl . "activate?token=". $activate_token;

        $mail = new CakeEmail();
        $mail->viewVars(array('activate_url' => $activate_url));
        $mail->template('user_confirmation', 'default')
          ->subject('Activate you account')
          ->emailFormat('html')
          ->to($userEmail)
          ->from('admin@diabetesavior.com')
          ->send();
        //var_dump($userEmail);
        $this->redirect("/pages/after_sign_up");
      } catch(Exception $e) {
        $this->Session->setFlash($e->getMessage());
        $this->redirect("/sign_up");
      }
    } else {
      throw new ForbiddenException();
    }
  }
/**
 * Activate user
 *
 * @param id
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
  public function activate() {
    $this->authenticate_admin();
    if($this->can('manage', 'User')) {
      $id = $this->request->params['pass'][0];
      $this->User->id = $id;
      $data = array('User' => array('activated' => 1));
      $this->User->save($data);
      $user = $this->User->read();
      $fullname = $user['Profile']['fullname'];
      $this->Session->setFlash('User ' . $fullname . ' activated!');
      $this->redirect($this->referer());
    } else {
      throw new ForbiddenException();
    }
  }

  public function self_activate() {
    $token = $this->params['url']['token'];
    $user = $this->User->findByActivate_token($token);
    //var_dump($user);
    //exit;
    if(count($user) > 1) {
      $user['User']['activated'] = 1;
      $user['User']['activate_token'] = null;
      if($this->User->save($user)){
        $this->Session->setFlash('Your account is now activated, please use your password to login', 'default', array('class' => 'alert alert-success'));
        $this->redirect("/");
      } else {
        debug($this->User->validationErrors);
        $this->render('reset_password_failed');
      }
    } else {
      throw new ForbiddenException();
    }


  }

/**
 * Deactivate user
 *
 * @param id
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
  public function deactivate() {
    $this->authenticate_admin();
    if($this->can('manage', 'User')) {
      $id = $this->request->params['pass'][0];
      if($id == 1) {
        //return;
      } else {
        $this->User->id = $id;
        $data = array('activated' => 0);
        $user = $this->User->save($data);
        $user = $this->User->read();
        $fullname = $user['Profile']['fullname'];
        $this->Session->setFlash('User ' . $fullname . ' deactivated!');
      }
      $this->redirect($this->referer());
      //$this->render("/layouts/debug");
    } else {
      throw new ForbiddenException();
    }
  }

/**
 * Edit user
 *
 * @param email, password
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
  public function edit($paramId = null) {
    $this->authenticate_user();
    //get the id of the user to be edited
    $id = $paramId == null?$this->request->params['pass'][0]:$paramId;
    //set the user id
    $this->User->id = $id;
    //check if a user with this id really exists
    if( $this->User->exists() ){
        if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){
            //saveAssociated is important, this is to save associated model alse if data presented.
            $this->request->data['User']['id'] = $id;
            //$this->request->data['Profile']['user_id'] = $id;
            //var_dump($this->request->data); exit;
            if( $this->User->saveAssociated( $this->request->data ) ){
                //set to user's screen
                //$this->Session->setFlash('User was edited.');
          		$this->Session->setFlash('User updated successfully!', 'default', array('class' => 'alert alert-success'));
                //redirect to user's list
                //$this->redirect(array('action' => 'index'));
                $this->redirect(array('action' => '../'));
            }else{
                //$this->Session->setFlash('Unable to edit user. Please, try again.');
          		$this->Session->setFlash('Unable to edit user. Please, try again.', 'default', array('class' => 'alert alert-danger'));
            }
        }else{
            //we will read the user data
            //so it will fill up our html form automatically
            //$this->request->data = $this->User->findById($id);
            $this->request->data = $this->User->read();
        }
        
    }else{
        //if not found, we will tell the user that user does not exist
        //$this->Session->setFlash('The user you are trying to edit does not exist.');
        $this->Session->setFlash('The user you are trying to edit does not exist.', 'default', array('class' => 'alert alert-danger'));
        $this->redirect(array('action' => '../'));
        //or, since it we are using php5, we can throw an exception
        //it looks like this
        //throw new NotFoundException('The user you are trying to edit does not exist.');
    }
  }


/**
 * Edit my profile
 *
 * @param email, password
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
  public function profile() {
    $this->edit($this->current_user['id']);
  }

  public function change_password() {
    $this->edit($this->current_user['id']);
    $this->render('password');
  }

  public function reset_password() {
    $token = $this->params['url']['token'];
    $this->User->recursive = -1;
    $user = $this->User->findByReset_token($token);
    if(!$user) {
      throw new ForbiddenException('Who are you?');
    }

    if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){
      $user['User']['password'] = $this->request->data['User']['password'];
      $user['User']['confirm_password'] = $this->request->data['User']['password_confirm'];
      $user['User']['reset_token'] = null;
      $user['User']['reset_at'] = null;
      if($this->User->save($user)){
        $this->Session->setFlash('User updated successfully!', 'default', array('class' => 'alert alert-success'));
        $this->render('reset_password_completed');
      } else {
        debug($this->User->validationErrors);
        $this->render('reset_password_failed');
      }
    } else {
      $this->render('password');
    }
    
  }
 /**
 * Delete user
 *
 * @param id
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
  public function delete() {
    $this->authenticate_admin();
    $id = $this->request->params['pass'][0];
    //the request must be a post request 
    //that's why we use postLink method on our view for deleting user
    if( $this->request->is('get') ){
        $this->Session->setFlash('Delete method is not allowed.');
        $this->redirect(array('action' => 'index'));
        
        //since we are using php5, we can also throw an exception like:
        //throw new MethodNotAllowedException();
    }else{
    
        if( !$id ) {
            $this->Session->setFlash('Invalid id for user');
            $this->redirect(array('action'=>'index'));
            
        }else{
            //delete user
            if( $this->User->delete( $id ) ){
                //set to screen
                $this->Session->setFlash('User was deleted.');
                //redirect to users's list
                $this->redirect(array('action'=>'index'));
                
            }else{  
                //if unable to delete
                $this->Session->setFlash('Unable to delete user.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }
  }
/**
 * Sign up page
 * @author Jason Lu 
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
  public function sign_up() {
    //$this->authenticate_admin();
    if($this->user_session()) {
      $this->redirect("/");
      exit;
    } else {

    }
  }

/**
 * New user page
 * @author Jason Lu 
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
  public function new_user() {
    $this->authenticate_admin();
    if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){
      $this->add();
    }
  }



/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
  public function show() {
    $id = $this->request->params['pass'][0];
    try {
      $user = $this->User->find('first', 
        array('conditions' => array(
          'User.id' => $id
        ))
      );
      $this->set('user', $user);
    } catch (NotFoundException $e) {
      throw $e;
    }
  }
}
