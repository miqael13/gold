<?php

class CronsController extends AppController {
    var $components = array('Mailer');
    var $uses = array(
    'Admin',
    'User',
    'Category',
    'Jeverly',
    'Stone'
);
    
    
    public function index(){
        $this->autoRender = false ;
        $UserId = $this->User->find('all') ;
        foreach($UserId as $UserId){
            if(strlen($UserId['User']['email']) > 1){
                if($UserId['User']['active'] == 1){
                    $endDate = $UserId['User']['endDate'] ;
                    $d = explode('-', $endDate);
                    $today  = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
                    $date1 = mktime (0,0,0,$d[1],$d[2],$d[0]);
                    $diff = ($date1-$today)/(3600*24);
                    if((round($diff) < 160) and (round($diff) != 0)){
                        $data = array() ;
                        $data['email'] = $UserId['User']['email'] ;
                        $data['firstName'] = $UserId['User']['firstName'] ;
                        $data['lastName'] = $UserId['User']['lastName'] ;
                        $data['time'] = round($diff) ;
                        $this->Mailer->sendEmail($data);
                    }
                }

            }else{
                $emailAdmin[] = $UserId['User']['firstName'] ;
                $emailAdmin[] = $UserId['User']['lastName'] ;
                    debug($emailAdmin);
            }
        }
    }
}
?>
