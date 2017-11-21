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
    	//get the company layout of the company
    	$parent = $this->find('all', array(
            'conditions' => array(
                'Page.parent_id IS NULL'
            ),
            'contain'=>array(
            ),
            'fields'=>array('Page.lft', 'Page.rght')
        ));
		
		$recs = array();            
        foreach($parent as $v){
            $info = $this->find('threaded', array(
	            'conditions' => array(
	                'Page.lft >=' => $v['Page']['lft'], 
	                'Page.rght <=' => $v['Page']['rght']
	            ),
	            'contain'=>array()
	        ));
	        
	        $recs = array_merge($recs, $info);
	    }
	    
        #pr($recs);
        #exit;
        return $recs;
    }
}