<?php
/**
 * MailerComponent
 *
 * This component is used for handling automated emailing stuff
 *
 * @package       dogvacay
 * @subpackage    dogvacay.mailer
 * @property EmailComponent $Email The dependency email component used for email stuff handling
 * @property EmailServiceComponent $EmailService The dependency email service component 
 * used for email through AWS stuff handling
 */

App::uses('CakeEmail', 'Network/Email');

class MailerComponent extends Component{
    public $components = array('CakeEmail');
    
    public $concierge = Null;
    public $noreply = Null;
    
    public $team = null;
    public $web = null;
	
    public $conciergeId = 1;
    public $controller = null;
    
    public $Email = null;

  
    public function initialize(&$controller, $settings = array()) {
        $this->controller =& $controller;
        $this->Email = new CakeEmail();
        $this->_set($settings);
        $this->concierge = Configure::read('Email.concierge');
        $this->noreply = Configure::read('Email.noreply');
        $this->team = Configure::read('TeamName');
        $this->web = Configure::read('WebName');
    }

    /**
     * Startup component
     *
     * @param object $controller Instantiating controller
     * @access public
     */
    public function startup(&$controller) {
        parent::startup($controller);
    }
    
    /**
     * Sends an email to the user that have just registered
     * @param array $data An array of user and profile data
     * @return bool Returns true if email is sent successfully, false otherwise
     */
    public function userRegistrationEmail($data){
        $user = $data['User'];
        

        $email = $user['email'];
        $firstName = $user['first_name'];
        $lastName = $user['last_name'];
        $name = $firstName.' '.$lastName;

        $this->Email->from($this->team.' <'.$this->noreply.'>');
        $this->Email->bcc('Concierge <'.$this->concierge.'>');
        $this->Email->to($name.' <'.$email.'>');
        $this->Email->emailFormat('both');

        $this->Email->subject('You have just registered at '.$this->web.'!');
        $this->Email->template('registration');

        $this->controller->set('contentForEmail','');

        return $this->Email->send();
    }
    
    public function sendEmail($data){
        $email = $data['email'];
//        debug(array($this->noreply => $this->team));die;
        
        $this->Email->from('aa@ss.com');
        $this->Email->to($email);
        $this->Email->emailFormat('html');
        $this->Email->subject($this->web);
        $this->Email->template('sendUserEmail');
        
        $this->Email->viewVars(array('User' => $data));
       
        return $this->Email->send();
    }
    
    public function sendEmailToAdmin($data){
       // debug($data);
        
       $email = $data['toEmail'];
       $fromEmail = $data['fromEmail'];
        $subject = $data['subject'];
        
        $this->Email->from($fromEmail);
        $this->Email->to($email);
        $this->Email->emailFormat('both');
        $this->Email->subject($subject);
        $this->Email->template('sendEmailToAdmin');
        
        $this->Email->viewVars(array('data' => $data['content']));
       
        return $this->Email->send();
    }
    
     public function passwordChange($data){
     //  debug($data);die;
        
       $email = $data['email'];
       
        
        $this->Email->from(array($this->noreply => $this->team));
        $this->Email->to($email);
        $this->Email->emailFormat('both');
        $this->Email->subject('Your password has been changed');
        $this->Email->template('passwordChange');
        
        $this->Email->viewVars(array('data' => $data));
         return $this->Email->send();
       
     }
    
    public function sendEmailToAuthorOrg($data){
       // debug($data);
        
       $email = $data['toEmail'];
       $fromEmail = $data['fromEmail'];
       // $subject = $data['subject'];
        
        $this->Email->from($fromEmail);
        $this->Email->to($email);
        $this->Email->emailFormat('both');
        $this->Email->subject('Your '.$data['type'].' is active');
        $this->Email->template('sendEmailToAuthorOrg');
        
        $this->Email->viewVars(array('contentForEmail' => $data));
       
        return $this->Email->send();
    }
    
      public function sendEmailToAuthorMuni($data){
       // debug($data);
        
       $email = $data['toEmail'];
       $fromEmail = $data['fromEmail'];
      // $subject = $data['subject'];
        
        $this->Email->from($fromEmail);
        $this->Email->to($email);
        $this->Email->emailFormat('both');
        $this->Email->subject('Your '.$data['type'].' is active');
        $this->Email->template('sendEmailToAuthorMuni');
        
        $this->Email->viewVars(array('contentForEmail' => $data));
       
        return $this->Email->send();
    }
    
      public function sendEmailToModeratorOrg($data){
//         debug($data);die;
       
       $email = $data['moderators'];
      
        $this->Email->from(array($this->noreply => $this->team));
        $this->Email->to($email);
        $this->Email->emailFormat('both');
        $this->Email->subject('Editor has added new data');
        $this->Email->template('sendEmailToModeratorOrg');
        
        $this->Email->viewVars(array('contentForEmail' => $data));
       
        return $this->Email->send();
    }
    
     public function sendEmailToModeratorMuni($data){
     //  debug($data);die;
        
       $email = $data['moderators'];
      
        $this->Email->from(array($this->noreply => $this->team));
        $this->Email->to($email);
        $this->Email->emailFormat('both');
        $this->Email->subject('Editor has added new data');
        $this->Email->template('sendEmailToModeratorMuni');
        
        $this->Email->viewVars(array('contentForEmail' => $data));
       
        return $this->Email->send();
    }
     /**
     * Sends an email to the user that have just registered
     * @param array $data An array of user and profile data
     * @return bool Returns true if email is sent successfully, false otherwise
     */
    public function userRegistrationEmail1($data){
        //$user = $data['User'];
        $user = $data;
        $email = $user['email'];
        $firstName = $user['firstName'];
        $lastName = $user['lastName'];
        $name = $firstName.' '.$lastName;
        $this->Email->from(array($this->noreply => $this->team));
        $this->Email->bcc(array($this->concierge => 'Concierge'));
        $this->Email->to(array($email => $name));
        $this->Email->emailFormat('both');

        $this->Email->subject('You have just registered at '.$this->web.'!');
        $this->Email->template('registration');

        $this->Email->viewVars(array('contentForEmail' => $user));
        return $this->Email->send();
    }
    
    /**
     * Sends an email to the user that want to recover his pass
     * @param array $data An array of user and profile data
     * @return bool Returns true if email is sent successfully, false otherwise
     */
    public function passwordRecovery($data){
        $email = $data['email'];
        $firstName = $data['firstName'];
        $lastName = $data['lastName'];
        $name = $firstName.' '.$lastName;
        $this->Email->from(array($this->noreply => $this->team));
        $this->Email->bcc(array($this->concierge => 'Concierge'));
        $this->Email->to(array($email => $name));
        $this->Email->emailFormat('both');

        $this->Email->subject('You have requested password recovery at '.$this->web.'!');
        $this->Email->template('passwordRecovery');

        $this->Email->viewVars(array('contentForEmail' => $data));
        return $this->Email->send();
    } 
}
