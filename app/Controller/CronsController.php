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
            if($UserId['User']['endDate'] != NULL){
                $endDate = $UserId['User']['endDate'] ;
                $d = explode('-', $endDate);
                $today  = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
                $date1 = mktime (0,0,0,$d[1],$d[2],$d[0]);
                $diff = ($date1-$today)/(3600*24);
                if(strlen($UserId['User']['email']) > 1){
                    if($UserId['User']['active'] == 1){
                        if((round($diff) < 5) and (round($diff) != 0)){
                            $data = array() ;
                            $data['email'] = $UserId['User']['email'] ;
                            $data['firstName'] = $UserId['User']['firstName'] ;
                            $data['lastName'] = $UserId['User']['lastName'] ;
                            $data['time'] = round($diff) ;
                            $this->Mailer->sendEmail($data);
                        }elseif(round($diff) == 0){
                            $dataStop['email'] = $UserId['User']['email'] ;
                            $dataStop['firstName'] = $UserId['User']['firstName'] ;
                            $dataStop['lastName'] = $UserId['User']['lastName'] ;
                            $this->User->id = $UserId['User']['id'] ;
                            $this->User->save(array('endDate'=>NULL,'active'=>2)) ;
                            $this->Mailer->sendStopEmail($dataStop);
                        }
                    }

                }else{
                    if(round($diff) == 0){
                        $dataStopAdmin['firstName'] = $UserId['User']['firstName'] ;
                        $dataStopAdmin['lastName'] = $UserId['User']['lastName'] ;
                        $dataStopAdmin['phone'] = $UserId['User']['phone'] ;
                        $this->User->id = $UserId['User']['id'] ;
                        $this->User->save(array('endDate'=>NULL,'active'=>2)) ;
                        $this->Mailer->sendStopAdminEmail($dataStopAdmin);
                    }
                    $emailAdmin = array() ;
                    $emailAdmin['firstName'] = $UserId['User']['firstName'] ;
                    $emailAdmin['lastName'] = $UserId['User']['lastName'] ;
                    $emailAdmin['phone'] = $UserId['User']['phone'] ;
                    $emailAdmin['time'] = round($diff) ;
                    $this->Mailer->sendEmailAdmin($emailAdmin);
                }
                
            }
        }
    }
}
?>
