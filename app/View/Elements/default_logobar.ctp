<!-- topbar starts -->
<div class="navbar navbar-default navbar-fixed-top navbar-logo" role="navigation" style="background-color: #ebebeb" id="Logobar">
    <!-- Container -->
    <div class="container"> 
        <div class="navbar-header"> 
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php
            
            echo $this->Html->link(
                $this->Html->image("iworklogo.png", array(
                    'fullBase' => true,
                    'alt' => 'iWorkZone',
                    'style'=>'height: 40px; margin-top: 7px;'
                )),
                array( 'controller'=>'pages', 'action'=>'index'),
                array('escape' => false, 'style'=>'margin-top: -15px;', 'class'=>'navbar-brand')
            );
            ?>
        </div><!-- End navbar header -->
        <div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php
                    echo $this->Html->link(
                        '<span class="text">Forgot <strong>Password</strong>?</span>', 
                        array('controller'=>'pages', 'member'=>false, 'action'=>'login'),
                        array( 'escape'=>false, 'data-toggle'=>'modal', 'data-target'=>'#myModal')
                    );                    
                    ?>
                </li>
            </ul>
            <?php echo $this->element( '_login_form' ); ?>
        </div>
        
    </div><!-- End Container -->
</div><!-- navbar ends --> 