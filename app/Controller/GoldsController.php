<?php
class GoldsController extends AppController {
    
    
var $helpers = array('Html','Form','Session','Paginator');
var $components = array('Session','Paginator');
var $uses = array('Jeverly');
//var $uses = array('Book','Basket');


/* comment */


    public function index(){
        $this->layout = "default";
        $this->viewData['jeverly'] = $this->Jeverly->find('all',
                array(
                    'limit'=>'10',
                    'order'=>'Jeverly.created DESC'
                    ));
    }
    public function pic($jevId){
        $this->layout = false;
        $this->viewData['jeverly'] = $this->Jeverly->find('first',array('conditions'=>array('id'=>$jevId)));
    }
    public function addIsotope($offset){
        $params['jeverly'] = $this->Jeverly->find('all',
                array(
                    'limit'=> $offset.'0,10',
                    'order'=>'Jeverly.created DESC'
                    ));
        if($params['jeverly']){
            $params['status'] = true;
        }else{
            $params['status'] = false;
        }
        echo json_encode($params);
        exit;
    }
 

}
?>