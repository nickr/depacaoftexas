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
<html lang="en" class="full-height">
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
        	<?php echo $this->Html->script('mdb/jquery-3.2.1.min'); ?>
		    <!-- Bootstrap tooltips -->
		    <?php echo $this->Html->script('mdb/popper.min'); ?>
		    <!-- Bootstrap core JavaScript -->
		    <?php echo $this->Html->script('mdb/bootstrap'); ?>
		    <!-- MDB core JavaScript -->
		    <?php echo $this->Html->script('mdb/mdb.min'); ?>
    
        	<?php #echo $this->Html->script('jquery.min'); ?>
            <?php #echo $this->Html->script('chosen.jquery.min'); ?>
            <?php #echo $this->Html->script('bootstrap.bundle'); ?>    
        <?php $this->end('scriptsBottom'); ?>
        <!---- /scriptsBottom ---->
        
        <!---- csslib ---->
        <?php $this->start('csslib'); ?>
        	<!-- Font Awesome core CSS -->
        	<?php echo $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); ?>
        	
        	<!-- Bootstrap core CSS -->
        	<?php echo $this->Html->css('mdb/bootstrap.min.css'); ?>
		    
		    <!-- Material Design Bootstrap -->
		    <?php echo $this->Html->css('mdb/mdb.min.css'); ?>
            <!-- The styles -->
            <?php #echo $this->Html->css('bootstrap.min.css'); ?>
            <?php #echo $this->Html->css('modern-business'); ?>
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

<body class="fixed-sn white-skin">
    
    <!--Main Navigation-->
    <header>
    	
		<?php echo $this->element('default_navbar'); ?>
        <?php echo $this->Flash->render(); ?>
        <?php echo $this->fetch('content'); ?>
        <?php #echo $this->element('default_footer'); ?>
        
    </header>
    
    
	<?php echo $this->fetch('scriptsBottom'); ?>
	<script>
        new WOW().init();
    </script>
</body>
</html>
