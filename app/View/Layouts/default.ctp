<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
        <!--<meta http-equiv="X-UA-Compatible" content="IE=8" >-->
        <?php echo $this->Html->meta('icon'); ?>
        <meta name="viewport" content="initial-scale = 1,maximum-scale = 1,user-scalable=no" />
        <?php echo $this->fetch('meta'); ?>
        
        <title><?php echo $title_for_layout; ?> - <?php echo Configure::read('App.SiteName'); ?></title>
        
        <!---- scriptsTop ---->
        <?php $this->start('scriptsTop'); ?>
        <?php $this->end('scriptsTop'); ?>
        <!---- /scriptsTop ---->
        
        <!---- scriptslib ---->
        <?php $this->start('script'); ?>
            
        <?php $this->end('script'); ?>
        <!---- /scriptslib ---->
        
        <!---- scriptsBottom ---->
        <?php $this->start('scriptsBottom'); ?>
        	<?php echo $this->Html->script('jquery.min'); ?>
            <?php #echo $this->Html->script('chosen.jquery.min'); ?>
            <?php echo $this->Html->script('bootstrap.bundle'); ?>    
        <?php $this->end('scriptsBottom'); ?>
        <!---- /scriptsBottom ---->
        
        <!---- csslib ---->
        <?php $this->start('csslib'); ?>
            <!-- The styles -->
            <?php echo $this->Html->css('bootstrap.min.css'); ?>
            <?php echo $this->Html->css('modern-business'); ?>
            <?php #echo $this->Html->css('https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');?>
            <?php #echo $this->Html->css('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');?>
        <?php $this->end('csslib'); ?>
        <!---- /csslib ---->
        
        <?php echo $this->fetch('csslib'); ?>
        <?php echo $this->fetch('scriptsTop'); ?>
        
        <!--Couple of added google fonts -->
        <!--<link href="http://fonts.googleapis.com/css?family=Sonsie+One|Old+Standard+TT" rel="stylesheet" type="text/css">-->
        <!--<link href="http://fonts.googleapis.com/css?family=Cabin:400,600italic" rel="stylesheet" type="text/css">-->
        
</head>
<body>
	<div id="container">
		<?php echo $this->element('default_navbar'); ?>
        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>
                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
            </div>
        </noscript>
        
        <?php #echo $this->element('breadcrumbs'); ?>
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->Session->flash('auth'); ?>
            
        <?php if(isset($logged_in)): ?>
            <?php 
            if (isset($this->request->params['admin']) ) {
                $prefix = 'admin';
            }
            /*else{
                $prefix = 'member';
            }*/
            ?>
        <?php endif; ?>
        
        <?php echo $this->fetch('content'); ?>
        <?php echo $this->element('default_footer'); ?>
        <?php echo $this->fetch('script'); ?>
        
        <!-- Normal Model -->
        <div class="modal type-primary fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
            <div class="modal-dialog">
                <div class="modal-content">
                </div> <!-- /.modal-content -->
            </div> <!-- /.modal-dialog -->
        </div> <!-- /.modal -->

        <!-- Big Model -->
        <div class="modal bootstrap-dialog type-primary fade modal-wide in" id="myModalBig" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
            <div class="modal-dialog">
                <div class="modal-content">
                </div> <!-- /.modal-content -->
            </div> <!-- /.modal-dialog -->
        </div> <!-- /.modal -->
	</div>
	<?php echo $this->fetch('scriptsBottom'); ?>
	
</body>
</html>
