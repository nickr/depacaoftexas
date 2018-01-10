<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          	<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          	<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          	<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          	<!-- Slide One - Set the background image for this slide in the line below -->
          	<?php
          	$img_1 = $this->Html->image("image1.jpg", array(
          		'fullBase' => true,
                'alt' => 'depacaoftexas',
            ));
            #echo $img_1;
          	?>
          	<div class="carousel-item active" style="background-image: url('<?php echo $this->webroot . 'img' . '/image1.jpg'; ?>')">
            	<div class="carousel-caption d-none d-md-block">
              		<h3>First Slide</h3>
              		<p>This is a description for the first slide. test 1234</p>
            	</div>
          	</div>
          	
          	<!-- Slide Two - Set the background image for this slide in the line below -->
          	<div class="carousel-item" style="background-image: url('<?php echo $this->webroot . 'img' . '/image2.jpg'; ?>')">
            	<div class="carousel-caption d-none d-md-block">
              		<h3>Second Slide</h3>
              		<p>This is a description for the second slide.</p>
            	</div>
          	</div>
          
          	<!-- Slide Three - Set the background image for this slide in the line below -->
          	<div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
            	<div class="carousel-caption d-none d-md-block">
              		<h3>Third Slide</h3>
              		<p>This is a description for the third slide.</p>
            	</div>
          	</div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
          	<span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          	<span class="carousel-control-next-icon" aria-hidden="true"></span>
          	<span class="sr-only">Next</span>
        </a>
    </div>
</header>

<!-- Page Content -->
<div class="container">
	<?php
							echo $this->Html->link(
								'<i class="fa fa-plus fa-fw"></i> here',
								array( 'controller'=>'Admin', 'action'=>'addChild', 3), 
								array( 'escape'=>false, 'data-toggle'=>'modal', 'data-target'=>'#myModal')
							);
							?>
	<?php
	
    foreach($recs as $item){
		?>
		<hr />
		<h2><?=$item['PageDetail']['title']?></h2>
		<?php
		echo $item['PageDetail']['content'];
		
	}  
	?>
    <div id="push"></div>

</div>