<?php
class AdminsController extends AppController {
    
    
var $helpers = array('Html','Form','Session','Paginator');
var $components = array('Session','Paginator');
var $uses = array(
    'Admin',
    'User',
);
//var $uses = array('Book','Basket');


/* comment */
public function beforeFilter() {
    if($this->params['action'] != 'login'){
        if(!$this->Session->check('adminId')){
            $this->redirect('/admins/login');
        }
    }
}

    public function login(){
        $this->layout = "admin" ;
        $data = $this->data ;
        if(!empty($data)){
            if($data['Admin']['type'] == 'Admin'){
                $login = $this->Admin->find(
                        'first',
                        array(
                            'conditions'=>array(
                                'login'=>$data['Admin']['email'],
                                'password'=>$data['Admin']['password']
                                )                              
                            )
                        ) ;
                if(!empty($login)){
                    $this->Session->write('adminId',$login['Admin']['id']);
                    $this->redirect('/admins/index') ;
                    
                }else{
                    $this->Session->write('Note.error', 'User does not exist.') ;
                }
            }else{
                
            }
            
        }
    }
    
    public function index(){
        $this->layout = "admin" ;
        
    }
    
    public function addUser(){
        $this->layout = "admin" ;
        $data = $this->data ;
        if(!empty($data)){
            $this->User->save($data['User']);
        }
    }
    
    public function userList(){
        $this->layout = "admin" ;
        $this->paginate = array(
            'order' => array('User.created' => 'DESC'),
            'limit' => 10,
            );
        $data = $this->paginate('User');
        $this->viewData['users'] = $data ;
    }
    
    
    
    public function logout(){
        $this->autoRender = false ;
        $this->Session->destroy();
        $this->redirect('/admins/login');
    }
    
    
 

}
?>