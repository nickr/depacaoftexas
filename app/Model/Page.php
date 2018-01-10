<?php
App::uses('AppModel', 'Model');
/**
 * Group Model
 *
 */
class Page extends AppModel {
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


    public $hasMany = array(
		'PageDetail',
    );


    public $validationSets = array(
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'This field cannot be left blank'
        )
    );

    public function getmenu( ) {
    	//get the parent layout
    	$parent = $this->find('all', array(
            'conditions' => array(
                'Page.parent_id IS NULL',
                'Page.is_menu' => 1,
                'Page.is_active' => 1
            ),
            'contain'=>array(
            ),
            'fields'=>array('Page.lft', 'Page.rght'),
            'order'=>array('Page.lft' => 'ASC')
        ));
		
		$recs = array();            
        foreach($parent as $v){
        	$info = $this->find('threaded', array(
	            'conditions' => array(
	                'Page.lft >=' => $v['Page']['lft'], 
	                'Page.rght <=' => $v['Page']['rght'],
	                'Page.is_menu' => 1,
	                'Page.is_active' => 1
	            ),
	            'contain'=>array()
	        ));
	        
	        $recs = array_merge($recs, $info);
	    }
		
		return $recs;
    }
    
    public function getAdminMenu( ) {
    	//get the parent layout
    	$parent = $this->find('all', array(
            'conditions' => array(
                'Page.parent_id IS NULL',
            ),
            'contain'=>array(
            ),
            'fields'=>array('Page.lft', 'Page.rght'),
            'order'=>array('Page.lft' => 'ASC')
        ));
		
		$recs = array();            
        foreach($parent as $v){
        	$info = $this->find('threaded', array(
	            'conditions' => array(
	                'Page.lft >=' => $v['Page']['lft'], 
	                'Page.rght <=' => $v['Page']['rght'],
	            ),
	            'contain'=>array()
	        ));
	        
	        $recs = array_merge($recs, $info);
	    }
		
		return $recs;
    }
    
}