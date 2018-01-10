<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AdminController extends Controller {
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
    
    function beforeRender(){
        parent::beforeRender();
        $this->layout = 'admin';
    }
	
	
    public $components = array( 'RequestHandler', 'Paginator', 'Session');
    
    public function index($page_id = 1){
	 	$this->set('content', $this->PageDetail->getContent($page_id));
    }
	
	public function view($page_id = null){
	 	$this->set('content', $this->PageDetail->getContent($page_id));
    }
	
	public function getAdminMenu(){
		$data = $this->Page->getAdminMenu();
	 	foreach($data as $v){
			if($v['Page']['is_default'] == 1){
				$menu['default'][] = $v;
			}else{
				$menu['cust'][] = $v;
			}
		}
		
		return $menu;
	}
	
	public function addChild($parent_id = null){
		#pr($parent_id);
		#exit;
	 	$this->set('parent_id', $parent_id);
    }
}
