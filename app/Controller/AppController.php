<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */



class AppController extends Controller {
    
        public $viewData = null;
        
        public function beforeRender() {
        parent::beforeRender(); 
        
        if($this->name == 'CakeError') {
            $this->layout = 'error';
        }              
        if($this->Session->check('Note.error')){
            $this->viewData['note'] = $this->Session->read('Note.error');
            $this->viewData['theme'] = 'errorJg';
            $this->Session->delete('Note.error'); 
        }
        if($this->Session->check('Note.ok')){
            $this->viewData['note'] = $this->Session->read('Note.ok');
            $this->Session->delete('Note.ok');
            $this->viewData['theme'] = 'noteJg';
        }
    
        if($this->Session->check('Note.info')){
            $this->viewData['note'] = $this->Session->read('Note.info');
            $this->Session->delete('Note.info');
            $this->viewData['theme'] = 'noteJg';
        }
        $this->set($this->viewData);
    }
}
