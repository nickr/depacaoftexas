<div class="container">
	<!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3"><?=$recs['Page']['name']?></h1>
	
	<?php echo $this->element('breadcrumbs'); ?>
		
    <?php
    foreach($recs["PageDetail"] as $item){
		?>
		<h2><?=$item['title']?></h2>
		<?php
		echo $item['content'];
	}  
	?>
</div>