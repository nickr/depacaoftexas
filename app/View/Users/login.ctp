<!-- Your custom styles (optional) -->
    <style>
        .intro-2 {
            background: url("../img/image1.jpg")no-repeat center center;
            background-size: cover;
        }
        .top-nav-collapse {
            background-color: #3f51b5 !important; 
        }
        .navbar:not(.top-nav-collapse) {
            background: transparent !important;
        }
        @media (max-width: 768px) {
            .navbar:not(.top-nav-collapse) {
                background: #3f51b5 !important;
            } 
        }
        
        .card {
            background-color: rgba(229, 228, 255, 0.2);
        }

         .md-form .prefix {
            font-size: 1.5rem;
            margin-top: 1rem;
        }
        .md-form label {
            color: #ffffff;
        }
        h6 {
            line-height: 1.7;
        }
        @media (max-width: 740px) {
            .full-height,
            .full-height body,
            .full-height header,
            .full-height header .view {
                height: 750px; 
            } 
        }
        @media (min-width: 741px) and (max-height: 638px) {
            .full-height,
            .full-height body,
            .full-height header,
            .full-height header .view {
                height: 750px; 
            } 
        }

        .card {
            margin-top: 30px;
            /*margin-bottom: -45px;*/

        }

        .md-form input[type=text]:focus:not([readonly]),
        .md-form input[type=password]:focus:not([readonly]) {
            border-bottom: 1px solid #8EDEF8;
            box-shadow: 0 1px 0 0 #8EDEF8;
        }
        .md-form input[type=text]:focus:not([readonly])+label,
        .md-form input[type=password]:focus:not([readonly])+label {
            color: #8EDEF8;
        }

        .md-form .form-control {
            color: #fff;
        }
                
    </style>
<section class="view intro-2 hm-stylish-strong">
    <div class="full-bg-img flex-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">
	        		<div class="card wow fadeIn" data-wow-delay="0.3s">
                        <div class="card-body">
	        				<!--Header-->
                            <div class="form-header purple-gradient">
                                <h3><i class="fa fa-user mt-2 mb-2"></i> Log in:</h3>
                            </div>
							<?php echo $this->Form->create('User'); ?>

                            <!--Body-->
                            <div class="md-form">
                                <i class="fa fa-user prefix white-text"></i>
                                <?php 
					            echo $this->Form->input('username', array(
					                'type'=>'text',
					                'class'=>'form-control',
					                'label'=>false,
					                'div'=>false,
					                'autocomplete'=>'off'
					            )); 
					            ?>
                                <label for="orangeForm-name">Username:</label>
                            </div>
                            
                            <div class="md-form">
                                <i class="fa fa-lock prefix white-text"></i>
                                <label for="orangeForm-password">Password:</label>
                                <?php 
					            echo $this->Form->input('password', array(
					                'type'=>'password',
					                'class'=>'form-control',
					                'label'=>false,
					                'div'=>false
					            )); 
					            ?>	
                                
                            </div>
                            
                            <div class="text-center">
                            	<button class="btn purple-gradient btn-lg">Sign In</button>	
                            </div>
                            
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.login-box-body -->
	</div><!-- /.login-box -->
</section>