<?php
class AdminsController extends AppController {
    
    
var $helpers = array('Html','Form','Session','Paginator');
var $components = array('Session','Paginator');
var $uses = array(
    'Admin',
);
//var $uses = array('Book','Basket');


/* comment */


    public function login(){
        $this->layout = "admin" ;
        $this->Session->write('Note.error', 'User does not exist.') ;
        $data = $this->data ;
        if(!empty($data)){
            if($data['Admin']['type'] == 'Admin'){
                $login = $this->Admin->find(
                            'first',
                            array(
                                'login'=>$data['Admin']['email'],
                                'password'=>$data['Admin']['password']
                                )
                            ) ;
                if(!empty($login)){
                    $this->Session->write('Note.error', 'User does not exist.') ;
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
    
    
 

}
?>