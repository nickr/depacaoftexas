<?php
App::uses('AppModel', 'Model');
/**
 * Group Model
 *
 */
class Admin extends AppModel {
    /**
    * Display field
    *
    * @var string
    */
    public function beforeFilter() {
        parent::beforeFilter();

    }

    public function parentNode() {
        return null;
    }

    public $actsAs = array('Containable', 'Multivalidatable', 'Tree');
    //The Associations below have been created with all possible keys, those that are not needed can be removed
}