<?php
class GoldsController extends AppController {
    
    
var $helpers = array('Html','Form','Session','Paginator');
var $components = array('Session','Paginator');
//var $uses = array('Book','Basket');


/* comment */


    public function index(){
        $this->layout = "default";
    }
    public function pic(){
        $this->layout = false;
    }
 

}
?>