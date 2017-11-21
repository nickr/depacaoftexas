<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link https://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array(
		'Page',
        'PageDetail'
	);
	
/**
 * Displays a view
 *
 * @return CakeResponse|null
 * @throws ForbiddenException When a directory traversal attempt.
 * @throws NotFoundException When the view file could not be found
 *   or MissingViewException in debug mode.
 */
 	
    public function pluginSetup() {
        
        //These Two Lines are Required
        parent::pluginSetup();
    }
    
    
    function beforeFilter(){
        parent::beforeFilter();
        
        
    }

    public $components = array( 'RequestHandler', 'Paginator', 'Session');
    
 	public function home() {
 		$recs = $this->PageDetail->find('all', array(
            'conditions' => array(
                'PageDetail.page_id IS NULL'
            ),
        ));
        
        $this->set('recs', $recs);
        $this->set('title_for_layout', 'Home' );
	}
	
	public function display($id = null) {
		$recs = $this->Page->find('first', array(
            'conditions' => array(
                'Page.id' => $id
            ),
            'contain'=>array(
            	'PageDetail'=>array(
            	)
            ),
        ));
        
        $this->set('recs', $recs);
        
        $this->set('breadcrumbs', array(
            array('title'=>$recs['Page']['name'], 'link'=>array('controller'=>$recs['Page']['controller'], 'action'=>$recs['Page']['action'], $recs['Page']['id'])),
        ));
        
        $this->set('title_for_layout', $recs['Page']['name'] );
	}
	
	public function getMenu() {
		$menu = $this->Page->getmenu();
		
		return $menu;
	}
}
