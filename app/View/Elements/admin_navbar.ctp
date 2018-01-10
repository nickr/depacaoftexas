<?php $menu = $this->requestAction('/Admin/getAdminMenu/'); ?>

<!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav sn-bg-4 fixed">
            <ul class="custom-scrollbar list-unstyled">
	            <!-- Logo -->
	            <li class="logo-sn waves-effect">
	                <div class=" text-center">
	                    <a href="#" class="pl-0"><img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" class=""></a>
	                </div>
	            </li>
	            <!--/. Logo -->
				<?php #echo $this->element( 'Admin/menu' ); ?>
				
	            <!-- Side navigation links -->
	            <li>
	                <ul class="collapsible collapsible-accordion">
	                    <?php
	                    foreach($menu['default'] as $v){
							if($v['Page']['id'] != 1){
								?>
								<li>
									<?php
									$arrow = !empty($v['children']) ? 'arrow-r' : null;
									$icon = !empty($v['children']) ? '<i class="fa fa-angle-down rotate-icon"></i>' : null;
									
									$link = !empty($v['children']) ? '#' : array( 'controller'=>'Admin', 'action'=>'view', $v['Page']['id']);
									
									echo $this->Html->link(
										$v['Page']['name'] . $icon,
										$link, 
										array( 'escape'=>false, 'class'=>'collapsible-header waves-effect '.$arrow )
									);
									
									if(!empty($v['children'])){
										?>
										<div class="collapsible-body">
											<ul>
												<?php
												foreach($v['children'] as $child){
													?>
													<li>
														<?php
														echo $this->Html->link(
															$child['Page']['name'],
															array( 'controller'=>'Admin', 'action'=>'view', $child['Page']['id']), 
															array( 'escape'=>false, 'class'=>'waves-effect')
														);
														?>
													</li>
													<?php
												}
												?>
											</ul>
										</div>
										<?php
									}
									?>
								</li>
								<?php
							}
							
						}	
						?>
                	</ul>
            	</li>
            	
            	<li>
            		<?php
		            if(!empty($menu['cust'])){
		            	?>
		            	<ul class="collapsible collapsible-accordion">
		            		<?php
							foreach($menu['cust'] as $v){
								
								?>
								<li>
									<?php
									echo $this->Html->link(
										$v['Page']['name'],
										array( 'controller'=>'Admin', 'action'=>'view', $v['Page']['id']), 
										array( 'escape'=>false, 'class'=>'collapsible-header waves-effect')
									);
									?>
								</li>
								<?php
							}
							?>
						</ul>
						<?php
					}
		            ?>
		        </li>
		    </ul>
            <!--/. Side navigation links -->
            <div class="sidenav-bg mask-strong"></div>
        </div>
        <!--/. Sidebar navigation -->
<nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
    <div class="container">
    	<?php
        echo $this->Html->link(
            'Depaca Of Texas', 
            array( 'controller'=>'pages', 'action'=>'home'), 
            array( 'escape'=>false, 'class'=>'navbar-brand')
        );                    
        ?>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        	<span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          	<ul class="navbar-nav ml-auto">
          		<li class="nav-item">
	              	<?php
					echo $this->Html->link(
					    'Logout',
					    array( 'controller'=>'Users', 'action'=>'logout'), 
					    array( 'escape'=>false, 'class'=>'nav-link')
					);                    
					?>
	            </li>
	        </ul>
        </div>
    </div>
</nav>