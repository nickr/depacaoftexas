<?php $menu = $this->requestAction('/Admin/getAdminMenu/'); ?>

<h4>Default Links</h4>
<div class="list-group">
	<?php
	foreach($menu['default'] as $v){
		#pr($v);
		?>
		<div class="list-group-item">
			<div class="float-right">
				<?php
				if($v['Page']['id'] != 1){
					?>
					<ul class="list-inline">
						<li class="list-inline-item">
							<?php
							echo $this->Html->link(
								'<i class="fa fa-pencil fa-fw"></i>',
								array( 'controller'=>'Admin', 'action'=>'edit', $v['Page']['id']), 
								array( 'escape'=>false, 'class'=>'')
							);
							?>
						</li>
						<li class="list-inline-item">
							<?php
							echo $this->Html->link(
								'<i class="fa fa-plus fa-fw"></i>',
								array( 'controller'=>'Admin', 'action'=>'addChild', $v['Page']['id']), 
								array( 'escape'=>false, 'data-toggle'=>'modal', 'data-target'=>'#myModal')
							);
							?>
						</li>
					</ul>
					<?php
				}
				?>
			</div>
			<?php
			echo $this->Html->link(
				$v['Page']['name'],
				array( 'controller'=>'Admin', 'action'=>'view', $v['Page']['id']), 
				array( 'escape'=>false, 'class'=>'')
			);
			
			if(!empty($v['children'])){
				?>
				<div class="list-group" >
					<?php
					foreach($v['children'] as $child){
						?>
						<div class="list-group-item" style="border: 0px; width: 100%;">
							<div class="float-right">
								<?php
								echo $this->Html->link(
									'<i class="fa fa-pencil fa-fw"></i>',
									array( 'controller'=>'Admin', 'action'=>'edit', $child['Page']['id']), 
									array( 'escape'=>false)
								);
								?>	
							</div>
							<?php
							echo $this->Html->link(
								$child['Page']['name'],
								array( 'controller'=>'Admin', 'action'=>'view', $child['Page']['id']), 
								array( 'escape'=>false, 'class'=>'')
							);
							?>
						</div>
						<?php
					}
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	}
	?>
</div>
			
<h4>Custom Links</h4>
<div class="list-group">
	<?php
	if(!empty($menu['cust'])){
		foreach($menu['cust'] as $v){
			echo $this->Html->link(
				$v['Page']['name'],
				array( 'controller'=>'Admin', 'action'=>'view', $v['Page']['id']), 
				array( 'escape'=>false, 'class'=>'list-group-item')
			);
		}
	}
	?>
</div>