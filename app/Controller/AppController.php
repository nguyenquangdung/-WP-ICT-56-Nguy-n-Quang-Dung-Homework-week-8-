<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {

	public $components = array(
    'Session','Auth' => array(
        'loginRedirect' => array('controller' => 'products', 'action' => 'index'),
        'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
        'authError' => 'You must be logged in to view this page.',
        'loginError' => 'Invalid Username or Password entered, please try again.'
 
    ));
	
	public function beforeFilter() {
		$this->loadModel('Cart');
		$this->Auth->allow('login');
		$this->set('count',$this->Cart->getCount());
	}	
}
