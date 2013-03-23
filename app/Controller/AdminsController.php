<?php
class AdminsController extends AppController {
    
    
var $helpers = array('Html','Form','Session','Paginator');
var $components = array('Session','Paginator','FileUploader');
var $uses = array(
    'Admin',
    'User',
    'Category',
    'Jeverly',
    'Stone'
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
                $password = md5($this->data['Admin']['password'].'gold') ;
                $login = $this->Admin->find(
                        'first',
                        array(
                            'conditions'=>array(
                                'login'=>$data['Admin']['email'],
                                'password'=>$password
                                )                              
                            )
                        ) ;
                if(!empty($login)){
                    $this->Session->write('adminId',$login['Admin']['id']);
                    $this->redirect('/admins/userList') ;
                    
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
            $pathname = WWW_ROOT . 'system' . DS .'Users'. DS .$save['User']['id'];
            if($save){
                $this->Session->write('Note.ok', 'User has been added.') ;
                mkdir($pathname);
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
        $pathname = WWW_ROOT . 'system' . DS .'Users'. DS .$id;
//        unset($pathname);
        $this->redirect('/admins/userList');
    }
    
    public function viewUser($id = NULL){
        $this->layout = "admin" ;
        $UserId = $this->User->find('first',array('conditions'=>array('id'=>$id))) ;
        $this->viewData['userID'] = $UserId ;
        $this->viewData['id'] = $id ;
        $this->viewData['category'] = $this->Category->find('all') ;
        $this->viewData['stone'] = $this->Stone->find('all') ;
        if($UserId['User']['active'] == 1){
            $endDate = $UserId['User']['endDate'] ;
            $d = explode('-', $endDate);
            $today  = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
            $date1 = mktime (0,0,0,$d[1],$d[2],$d[0]);
            $diff = ($date1-$today)/(3600*24);
            $this->viewData['days'] = round($diff) ;
        }
        $limit = 10 ;
        $this->paginate = array(
            'joins' => array(
                array(
                    'table' => 'categories',
                    'alias' => 'Category',
                    'type' => 'LEFT',
                    'foreignKey' => false,
                    'conditions' => array(
                        'Jeverly.categoryId = Category.id',
                        ),
                    ),
                ),
            'conditions' => array(
                'Jeverly.userId' => $id
                ),
            'order' => array('Jeverly.created' => 'DESC'),
            'limit' => $limit,
            'fields' => array('Category.*', 'Jeverly.*'),
            );
        $data = $this->paginate('Jeverly');
        $this->viewData['jeverly'] = $data ;
        $data = $this->data ;
        if(!empty($data)){
            if(isset($data['User']['pic1']) and isset($data['User']['pic2'])){
                $save = $this->Jeverly->save($data['User']) ;
            }else{
                $this->Session->write('Note.error', 'Something is wrong.') ;
            }
            if($save){
                $this->Session->write('Note.ok', 'Your data is updated.') ;
                $this->redirect('/admins/viewUser/'.$id);
            }else{
                $this->Session->write('Note.error', 'Something is wrong.') ;
            }
            
        }
        
    }
    
    public function viewEdit($id = NULL){
        $this->layout = "admin" ;
        $userId = $this->Jeverly->find('first',array('conditions'=>array('id'=>$id))) ;
        $this->viewData['id'] = $userId['Jeverly']['userId'] ;
        $this->viewData['category'] = $this->Category->find('all') ;
        $this->viewData['stone'] = $this->Stone->find('all') ;
        $jeverly = $this->Jeverly->find(
                'first',
                array(
                    'conditions'=>array(
                        'id'=>$id
                    )
                )) ;
        $this->viewData['jeverly'] = $jeverly ;
        $data = $this->request->data ;
        if(!empty($data)){
            $this->Jeverly->id = $id ;
            $save = $this->Jeverly->save($data['User']) ;
            if($save){
                $this->Session->write('Note.ok', 'Your data is updated.') ;
                $this->redirect('/admins/viewUser/'.$save['Jeverly']['userId']) ;
            }else{
                $this->Session->write('Note.error', 'Something is wrong.') ;
            }
        }
    }
    
    public function viewDelete($id = NULL){
        $this->autoRender = false ;
        $Jeverly = $this->Jeverly->find('first',array('conditions'=>array('id'=>$id))) ;
        $userID = $Jeverly['Jeverly']['userId'] ;
        $this->Jeverly->id = $id ;
        $this->Jeverly->delete();
        $this->redirect('/admins/viewUser/'.$userID);
    }
    
    public function uploadManulFile($id = Null){
        //$this->autoRender = false;
        if(isset($_GET['qqfile'])){
            $imgName = $_GET['qqfile'];
        }elseif(isset($_FILES['qqfile'])){
            $imgName = $_FILES['qqfile']['name'];
        }

        $explode = explode('.', $imgName);
        $ext = end($explode);
        $name = md5(microtime()) . '.' . $ext;
        //$getSessionImg = $this->Session->read()
        $ext = strtolower($ext);
        if($ext == 'jpg' || $ext == 'png' || $ext == 'gif'){
//            $checkCurrent = $this->Session->read('currentImg');
//            if($checkCurrent){
//                if($checkCurrent['userId'] == $this->u_id && $checkCurrent['currentImg']){
//                    //if($this->data[''])
//                    @$deleteImg = unlink(WWW_ROOT . 'system' . DS . $checkCurrent['currentImg']);
//                    if($deleteImg){
////                        $this->Session->delete('currentImg');
//                    }
//                }
//            }
            $currentUserId = $this->u_id;
            $getData = array('currentImg' => $name, 'userId' => $currentUserId);
            $this->Session->write('currentImg', $getData);
            // if (!is_dir(WWW_ROOT . 'system' . DS . 'userPic' . DS.$this->u_id)){
            // mkdir(WWW_ROOT . 'system' . DS . 'userPic' . DS.$this->u_id,true);}
            $this->FileUploader->upload(WWW_ROOT . 'system' . DS . 'Users' . DS . $id .DS);
            $response['fileName'] = $name;
            $response['success'] = true;
            @rename(WWW_ROOT . 'system' . DS . 'Users' . DS . $id .DS . $imgName, WWW_ROOT . 'system' . DS . 'Users' . DS . $id .DS . $name);
            $img = array();
            $img = $this->Session->read('img');
            $img[$name] = $name;
            $imageInfo = getimagesize(WWW_ROOT . 'system' . DS . 'Users' . DS . $id .DS . $name);
            if(($imageInfo[0] > 550) || ($imageInfo[1] > 550)){
                if($imageInfo['0'] > $imageInfo['1']){
                    $hh = $imageInfo['1'] / $imageInfo['0'];
                    $imageInfo['0'] = 550;
                    $imageInfo['1'] = round($hh * 550);
                }else{
                    $hh = $imageInfo['0'] / $imageInfo['1'];
                    $imageInfo['1'] = 550;
                    $imageInfo['0'] = round($hh * 550);
                }
            }
            $response['width'] = $imageInfo['0'];
            $response['height'] = $imageInfo['1'];
            if($imageInfo['0'] > $imageInfo['1']){
                $response['cropCube'] = $imageInfo['0'];
            }else{
                $response['cropCube'] = $imageInfo['1'];
            }
            $this->Session->write('img', $name);
            $echo = json_encode($response);
            echo $echo;
            die;
        }else{
            $response['success'] = false;
            $echo = json_encode($response);
            echo $echo;
            die;
        }
        //move_uploaded_file($_GET['qqfile'], WWW_ROOT . 'system' . DS . 'qustionsFile' . DS . $_GET['qqfile']);
        //var_dump($_GET['qqfile']);die;
    }
    
    public function start(){
        $this->autoRender = false ;
        $data = $this->data ;
        if(!empty($data)){
            $year = date("Y");
            $months = date("m");
            $day = date("d");
            $today = date("Y-m-d") ;
            $months = $months +  $data['Admins']['endDate'];
            if($months > 12){
                $months-=12;
                $year++;
            }
            if(strlen($months) == 1){
                $months = '0'.$months;
            }
            $date = $year.'-'.$months.'-'.$day;
            $m = $data['Admins']['endDate'] ;
            $this->User->id = $data['Admins']['id'] ;
            $this->User->save(array('active'=>'1','startDate'=>$today,'endDate'=>$date)) ;
            $this->redirect('/admins/viewUser/'.$data['Admins']['id']);
        }
        
    }
    
    public function stop(){
        $this->autoRender = false ;
        $data = $this->data ;
        if(!empty($data)){
            $this->User->id = $data['Admins']['id'] ;
            $this->User->save(array('active'=>'0')) ;
            $this->redirect('/admins/viewUser/'.$data['Admins']['id']);
        }
    }
    
    public function logout(){
        $this->autoRender = false ;
        $this->Session->destroy();
        $this->redirect('/admins/login');
    }
    
    public function porc(){
        
    }
    
 

}
?>