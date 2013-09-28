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

  //function __construct() {
    //$this->assign('title', "TEST");
    //parent::__construct();
    //$this->set('title', "Title");
  //}



/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
  public function index() {
    // Just a test here.
    echo "Hello";
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
      $res->data = $user;
    } else {
      $res->status = 1;
      $res->message = __d("login", "Login succeed");
      $res->data = $user;
      $this->Session->write('user', $user);
    }
    $this->set('user', $user);
    $this->autoRender = false;
    $this->redirect($this->referer());
    //echo json_encode($res);
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
    $this->Session->delete('user');
    $this->redirect("/");
    exit;
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
    $email = $this->request->data('email');
    $password = $this->request->data('password');
    $data = array("User" => array('email' => $email, 'password' => $password));
    $this->User->create();
    $res = $this->User->save($data);

    echo json_encode($res);
    exit;

  }


/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
  public function display() {
    $path = func_get_args();
    $this->set('title', "Title");

    $count = count($path);
    if (!$count) {
      return $this->redirect('/');
    }
    $page = $subpage = $title_for_layout = null;

    if (!empty($path[0])) {
      $page = $path[0];
    }
    if (!empty($path[1])) {
      $subpage = $path[1];
    }
    if (!empty($path[$count - 1])) {
      $title_for_layout = Inflector::humanize($path[$count - 1]);
    }
    $this->set(compact('page', 'subpage', 'title_for_layout'));

    try {
      $this->render(implode('/', $path));
    } catch (MissingViewException $e) {
      if (Configure::read('debug')) {
        throw $e;
      }
      throw new NotFoundException();
    }
  }
}
