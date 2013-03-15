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
            $save = $this->User->save($data['User']) ;
            if($save){
                $this->Session->write('Note.ok', 'User has been added.') ;
                $this->redirect('/admins/userList') ;
            }else{
                $this->Session->write('Note.error', 'Something is wrong.') ;
            }
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
    
    public function userEdit($id = NULL){
        $this->layout = "admin" ;
        $users = $this->User->find(
                    'first',
                    array(
                        'conditions'=>array(
                            'id'=>$id
                            )
                        )
                    ) ;
        $this->viewData['users'] = $users;
        $data = $this->request->data ;
        if(!empty($data)){
            $this->User->id = $id ;
            $save = $this->User->save($data) ;
            if($save){
                $this->Session->write('Note.ok', 'Your data is updated.') ;
                $this->redirect('/admins/userList') ;
            }else{
                $this->Session->write('Note.error', 'Something is wrong.') ;
            }
        }
    }
    
    public function userDelete($id = NULL){
        $this->autoRender = false ;
        $this->User->id = $id ;
        $this->User->delete();
        $this->redirect('/admins/userList');
    }
    
    
    public function logout(){
        $this->autoRender = false ;
        $this->Session->destroy();
        $this->redirect('/admins/login');
    }
    
    
 

}
?>