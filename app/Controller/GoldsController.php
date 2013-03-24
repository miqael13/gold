<?php

class GoldsController extends AppController {

    var $helpers = array('Html', 'Form', 'Session', 'Paginator');
    var $components = array('Session', 'Paginator');
    var $uses = array('Jeverly', 'User');

//var $uses = array('Book','Basket');


    /* comment */


    public function index() {
        $this->layout = "default";
        $this->viewData['jeverly'] = $this->Jeverly->find('all', array(
            'joins' => array(
                array(
                    'table' => 'users',
                    'alias' => 'User',
                    'type' => 'LEFT',
                    'foreignKey' => false,
                    'conditions' => array(
                        'Jeverly.userId = User.id',
                    ),
                ),
            ),
            'limit' => '10',
            'order' => 'Jeverly.created DESC',
            'conditions' => array('User.active' => 1)
                ));
    }

    public function pic($jevId) {
        $this->layout = false;
        $this->viewData['jeverly'] = $this->Jeverly->find('first', array('conditions' => array('id' => $jevId)));
    }

    public function addIsotope($offset) {
        $params['jeverly'] = $this->Jeverly->find('all', array(
            'joins' => array(
                array(
                    'table' => 'users',
                    'alias' => 'User',
                    'type' => 'LEFT',
                    'foreignKey' => false,
                    'conditions' => array(
                        'Jeverly.userId = User.id',
                    ),
                ),
            ),
            'limit' => $offset . '0,10',
            'order' => 'Jeverly.created DESC',
            'conditions' => array('User.active' => 1)
                ));
        if ($params['jeverly']) {
            $params['status'] = true;
        } else {
            $params['status'] = false;
        }
        echo json_encode($params);
        exit;
    }

    public function singleView($id) {
        $this->viewData['jeverly'] = $this->Jeverly->find('first', array(
            'joins' => array(
                array(
                    'table' => 'users',
                    'alias' => 'User',
                    'type' => 'LEFT',
                    'foreignKey' => false,
                    'conditions' => array(
                        'Jeverly.userId = User.id',
                    ),
                ),
                array(
                    'table' => 'stones',
                    'alias' => 'Stone',
                    'type' => 'LEFT',
                    'foreignKey' => false,
                    'conditions' => array(
                        'Jeverly.stone = Stone.id',
                    ),
                ),
            ),
            'limit' => '10',
            'order' => 'Jeverly.created DESC',
            'conditions' => array('Jeverly.id' => $id),
            'fields'=>array('Jeverly.* , User.*','Stone.*')
                ));
    }

}

?>