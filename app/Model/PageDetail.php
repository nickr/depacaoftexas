<?php
App::uses('AppModel', 'Model');

/**
 * GroupMembership Model
 *
 */
class PageDetail extends AppModel {
    /**
    * Display field
    *
    * @var string
    */
	public $displayField = 'id';

    public $actsAs = array('Containable');
    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Page'=>array(
			'className' => 'Page',
            'foreignKey' => 'page_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
		),
	);
	
	public function getContent($page_id = null){
		$recs = $this->find('all', array(
            'conditions' => array(
                'PageDetail.page_id' => $page_id,
            ),
            'contain'=>array(
            	
            ),
        ));
		#pr($recs);
		#exit;
		return $recs;
	}
	
	
}
