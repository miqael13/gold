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
    public function sendEmail($data){
        $email = $data['email'];
        $this->Email->from(array($this->noreply => $this->team));
        $this->Email->to($email);
        $this->Email->bcc(array('admin@mygold.pusku.com')) ;
        $this->Email->emailFormat('html');
        $this->Email->subject($this->web);
        $this->Email->template('sendUserEmail');
        $this->Email->viewVars(array('User' => $data));
        return $this->Email->send();
    }
    
    public function sendEmailAdmin($data){
        $this->Email->from(array($this->noreply => $this->team));
        $this->Email->to(array('admin'.$this->concierge));
        $this->Email->emailFormat('html');
        $this->Email->subject($this->web.'!');
        $this->Email->template('sendAdminEmail');
        $this->Email->viewVars(array('Admin' => $data));
        return $this->Email->send();
    }
   
    public function sendStopEmail($data){
        $email = $data['email'] ;
        $this->Email->from(array($this->noreply => $this->team));
        $this->Email->bcc(array('admin'.$this->concierge));
        $this->Email->to($email);
        $this->Email->emailFormat('html');
        $this->Email->subject($this->web.'!');
        $this->Email->template('sendStopEmail');
        $this->Email->viewVars(array('User' => $data));
        return $this->Email->send();
    } 
    public function sendStopAdminEmail($data){
//        debug($data);die;
        $this->Email->from(array($this->noreply => $this->team));
        $this->Email->to(array('admin'.$this->concierge));
        $this->Email->emailFormat('html');
        $this->Email->subject($this->web.'!');
        $this->Email->template('sendStopAdminEmail');
        $this->Email->viewVars(array('Admin' => $data));
        return $this->Email->send();
    } 
}
