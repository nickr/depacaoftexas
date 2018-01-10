
<div class="modal-header ">
    <a class="close" data-dismiss="modal"><i class="fa fa-close fa-2x"></i></a>
    <h2><?php echo __('Add New Accident Report:'); ?></h2>
</div>

<div class="modal-body">
	<?php
    echo $this->Form->create('Pages', array(
	    'url' => array('controller'=>'Admin', 'action'=>'addChild'),
	    'role'=>'form',
	    'class'=>'form-horizontal',
	    'inputDefaults' => array(
	        'label' => false,
	        'div' => false,
	        'class'=>'form-control',
	        'error'=>false
	    )
	));
	
	echo $this->Form->hidden('parent_id', array('value'=>$parent_id));

?>
    
    <div class="form-group">
        <label class="col-sm-4 control-label" for="name">Name:</label>
        <div class="col-sm-8">
            <?php
            echo $this->Form->input('name', array (
            ));
            ?>
        </div>
    </div>
<?php echo $this->Form->end();?>
    
</div>

<div class="modal-footer">
    <?php
    echo $this->Form->button(
        '<i class="fa fa-times fa-fw"></i> Close',
        array('class'=>'btn btn-default pull-left', 'data-dismiss'=>'modal')
    );

	echo $this->Form->button(
        '<i class="fa fa-save fa-fw"></i> Save',
        array('type'=>'submit', 'class'=>'btn btn-primary pull-left')
    );
    ?>
</div>