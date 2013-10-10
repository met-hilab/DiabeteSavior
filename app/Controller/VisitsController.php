<?php
/**
 * Visit controller.
 *
 * This file will render views from views/visits/
 *
 * PHP 5
 *
 * Copyright (c) Yingyuan Zhang (zyy2013@bu.edu)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Yingyuan Zhang (zyy2013@bu.edu)
 * @link          http://github.com/bumetcs/cs673
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
*/
class VisitsController extends AppController {
	
	public $uses = array();
	
	public function index(){
		
	}
	
	public function add(){
	
	}
	
	public function view(){
	
	}
	
	public function algorithm(){
	
	}
	
	public function plot(){
	
	}
	
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
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

?>