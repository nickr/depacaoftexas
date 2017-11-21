<!-- start: AppNavbar -->
<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-static-bottom" role="navigation">
    <!-- Container -->
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"> 
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> 
        </div>
        
        <div class="collapse navbar-collapse" id="target_nav">
            <ul class="nav navbar-nav">
                <li>
                    <?php
                    echo $this->Html->link(
                        'Employer', 
                        array( 'controller'=>'pages', 'action'=>'index', '#'=>'employer'), 
                        array( 'escape'=>false)
                    );                    
                    ?>
                </li>
                <!--<li>
                    <?php
                    echo $this->Html->link(
                        'BLOG',
                        array( 'controller'=>'pages', 'action'=>'index', '#'=>'blog'), 
                        array( 'escape'=>false)
                    );                    
                    ?>
                </li>-->
                <li>
                    <?php
                    echo $this->Html->link(
                        'Job Seeker', 
                        array( 'controller'=>'pages', 'action'=>'index', '#'=>'jobSeeker'), 
                        array( 'escape'=>false)
                    );                    
                    ?>
                </li>
                <!--<li>
                    <?php
                    echo $this->Html->link(
                        'Non-Profit', 
                        array( 'controller'=>'pages', 'action'=>'index', '#'=>'nonProfit'), 
                        array( 'escape'=>false)
                    );                    
                    ?>
                </li>-->
                <li>
                    <?php
                    echo $this->Html->link(
                        'Pricing', 
                        array( 'controller'=>'pages', 'action'=>'index', '#'=>'pricing'), 
                        array( 'escape'=>false)
                    );                    
                    ?>
                </li>
                
                <li>
                    <?php
                    echo $this->Html->link(
                        'Contact Us', 
                        array( 'controller'=>'pages', 'action'=>'index', '#'=>'contact'), 
                        array( 'escape'=>false)
                    );                    
                    ?>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <?php
                    echo $this->Html->link(
                        'Pages <span class="caret"></span>', 
                        '#', 
                        array( 'escape'=>false, 'class'=>'dropdown-toggle', 'data-toggle'=>'dropdown', 'role'=>'button', 'aria-expanded'=>'false')
                    );                    
                    ?>
                    <ul class="dropdown-menu submenu" role="menu">
                        <li>
                            <?php
                            echo $this->Html->link(
                                '<i class="fa fa-check-square-o"></i><span class="text">About Us</span>', 
                                array( 'controller'=>'pages', 'action'=>'aboutus', '#'=>'contact'), 
                                array( 'escape'=>false)
                            );                    
                            ?>
                        </li>
                        <li>
                            <?php
                            echo $this->Html->link(
                                '<i class="fa fa-check-square-o"></i><span class="text">FAQ</span>', 
                                array( 'controller'=>'pages', 'action'=>'faq'), 
                                array( 'escape'=>false)
                            );                    
                            ?>
                        </li>
                        <li>
                            <?php
                            echo $this->Html->link(
                                '<i class="fa fa-check-square-o"></i><span class="text">Privacy Policy</span>', 
                                array( 'controller'=>'pages', 'action'=>'privacy'), 
                                array( 'escape'=>false)
                            );                    
                            ?>
                        </li>
                        <li>
                            <?php
                            echo $this->Html->link(
                                '<i class="fa fa-check-square-o"></i><span class="text">Terms Of Service</span>', 
                                array( 'controller'=>'pages', 'action'=>'tos'), 
                                array( 'escape'=>false)
                            );                    
                            ?>
                        </li>
                        <li>
                            <?php
                            echo $this->Html->link(
                                '<i class="fa fa-check-square-o"></i><span class="text">Meet The Team</span>', 
                                array( 'controller'=>'pages', 'action'=>'meettheteam'), 
                                array( 'escape'=>false)
                            );                    
                            ?>
                        </li>
                    </ul>
                </li>    
            </ul>
        </div>
            
    </div><!--/.container -->
</div><!--/.navbar -->
<!-- end: AppNavbar -->