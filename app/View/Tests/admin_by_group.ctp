<?php
    $this->Html->addCrumb('Groups', array('controller' => 'groups', 'action' => 'index', 'admin'=>true));   
    $this->Html->addCrumb('View', array('controller' => 'groups', 'action' => 'byGroup', $data[0]['Group']['id'], 'admin'=>true));   
    
    $this->Html->script('plugins/bootstrap-editable/jquery.mockjax.min.js', array('block' => 'scriptsBottom'));
    $this->Html->script('plugins/moment/moment.min.js', array('block' => 'scriptsBottom'));
    $this->Html->script('plugins/bootstrap-datepicker/bootstrap-datepicker.js', array('block' => 'scriptsBottom'));
    $this->Html->script('plugins/bootstrap-editable/bootstrap-editable.min.js', array('block' => 'scriptsBottom'));
    $this->Html->script('plugins/typeahead/typeahead.js', array('block' => 'scriptsBottom'));
    $this->Html->script('plugins/typeahead/typeaheadjs.1.5.1.js', array('block' => 'scriptsBottom'));
    $this->Html->script('plugins/select2/select2.min.js', array('block' => 'scriptsBottom'));
    $this->Html->script('plugins/bootstrap-editable/address.custom.js', array('block' => 'scriptsBottom'));
    $this->Html->script('plugins/bootstrap-editable/demo-mock.js', array('block' => 'scriptsBottom'));
    $this->Html->script('plugins/select2/select2.min.js', array('block' => 'scriptsBottom'));
    $this->Html->script('plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js', array('block' => 'scriptsBottom'));
    $this->Html->script('queen-elements.js', array('block' => 'scriptsBottom'));
?>
<style type="text/css">
    .row-padded {
        padding-bottom: 10px;
        border-bottom: 1px #E4E4E4 solid;
}
</style>
<h1 class="title" id="<?=$data[0]['Group']['id']?>">
    <?=$data[0]['Group']['name']?>
</h1>

<ul class="nav nav-pills nav-pills-custom-minimal custom-minimal-bottom tabs-iconized" role="tablist">
    <li class="active"><a href="#users" role="tab" data-toggle="tab"><i class="icon ion-ios7-people"></i> Users</a></li>
    <li><a href="#layout" role="tab" data-toggle="tab"><i class="icon ion-filing"></i> Layout</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade in active" id="users">
        <h5>All Users</h5>
        <table class="table table-striped table-hover table-condensed" id="groupTable">
            <thead>
                <?php
                echo $this->Html->tableHeaders(array(
                    array('Firstname' => array('class' => 'sortable')),
                    'Lastname',
                    'Location',
                    'Department',
                    'Activated',
                    'Status',
                    'Options'
                ));
                ?>
            </thead>
            <tbody>
                <?php
                foreach($userPage as $user){
                    ?>
                    <tr>
                        <td><?=$user['first_name']?></td>
                        <td><?=$user['last_name']?></td>
                        <td><?=$user['location']?></td>
                        <td><?=$user['department']?></td>
                        <td><?=$user['is_activated']?></td>
                        <td><?=$user['is_active']?></td>
                        <td>Options</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade in" id="layout">
        <div class="col-md-8">
            <div class="widget">
                <div class="widget-header clearfix">
                    <h3><i class="icon ion-ios7-browsers-outline"></i> <span>Layout (Org Chart)</span></h3>
                </div>
                
                <div class="widget-content">
                    <div class="row row-padded">
                        <div class="col-md-8">
                            <span>
                                <?php
                                echo $this->Html->link(
                                    '<i class="icon ion-plus"></i>',
                                    '#',
                                    array('escape'=>false, 'data-toggle'=>'collapse', 'data-target'=>'#addLocation')
                                );
                                ?>
                                &nbsp;
                            </span>
                            <span class="wrap" id="<?=$data[0]['Group']['id']?>">
                                <a href="#" class="groupName" data-placeholder="Required" data-type="text" data-pk="<?=$data[0]['Group']['id']?>" data-title="Enter Group Name"><?=$data[0]['Group']['name']?></a>
                                <small>Supervisor: 
                                    <a href="#" class="supervisor" data-type="select" data-pk="<?=$data[0]['Group']['id']?>" data-title="Select User">
                                        <?php echo $data[0]['Supervisor']['sur_name']; ?>
                                        <?php echo $data[0]['Supervisor']['first_name']; ?>
                                        <?php echo $data[0]['Supervisor']['last_name']; ?>
                                    </a>
                                </small>
                            </span>
                        </div>
                        <div class="col-md-4">
                            <span class="pull-right">
                                <?php
                                foreach($apps as $app){
                                    if(in_array($app['id'], $groupApps )){
                                        $icon = '<span class="comp_'.$app['name'].' badge-round badge element-bg-color-green"><i class="'.$app['iconCls'].'"></i></span>';    
                                        $action = 'access';
                                        $accessCode = 0;
                                    }else{
                                        $icon = '<span class="comp_'. $app['name'] .' badge-round badge badge-ghost"><i class="'.$app['iconCls'].'"></i></span>';    
                                        $action = 'access';
                                        $accessCode = 1;
                                    }
                                    
                                    echo $this->Html->link( 
                                        $icon, 
                                        array( 
                                            'controller'=>'applications',
                                            'action'=>$action, 
                                            $data[0]['Group']['id'], 
                                            $data[0]['Group']['id'], 
                                            $app['id'], 
                                            $accessCode,
                                            $app['name'] 
                                        ), 
                                        array('escape'=>false, 'class'=>'btn-switch') 
                                    );
                                    
                                    echo '&nbsp;';
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                    <div id="addLocation" class="collapse">
                        <div class="newcompany col-md-9">
                            <?php 
                            echo $this->Form->create('Group', array('action'=>'addsubGroup','class'=>'form-horizontal'));
                            echo $this->Form->hidden('parent_id', array('value'=>$data[0]['Group']['id']));
                                        
                            echo $this->Form->input( 'name', array(
                                'label'=>false, 
                                'div'=>false,
                                'value' => '',
                                'class'=>'form-control',
                                'placeholder' => 'Create New Location'
                            ));
                            ?>
                        </div>
                        <?php echo $this->Form->button('Save', array('type'=>'submit', 'div'=>false, 'label'=>false, 'class'=>'btn btn-primary')); ?>
                        <?php echo $this->Form->end();?>
                    </div>
                    <?php
                    foreach($data[0]['children'] as $child){
                        $countInput = 0;
                        $supervisor = $child['Supervisor']['first_name'].' '.$child['Supervisor']['last_name'];
                        $deleteUrl = $this->Html->link('Delete', array('action'=>'delete', $child['Group']['id']));
                        ?>
                        <div class="row row-padded">
                            <div class="col-md-7 col-md-offset-1" style="padding-left: -5px;">
                                <span>
                                    <?php
                                    echo $this->Html->link(
                                        '<i class="icon ion-plus"></i>',
                                        '#',
                                        array('escape'=>false, 'data-toggle'=>'collapse', 'data-target'=>'#'.$countInput.'')
                                    );
                                    
                                    echo $this->Html->link(
                                        '<i class="icon ion-android-trash"></i>', 
                                        array('controller'=>'groups', 'admin'=>true, 'action'=>'delete', $child['Group']['id']),
                                        array('escape'=>false,)
                                    );
                                    ?>
                                    
                                    <span>
                                        <a href="#" class="groupName" data-placeholder="Required" data-type="text" data-pk="<?=$child['Group']['id']?>" data-title="Enter Group Name"><?=$child['Group']['name']?></a>
                                        <small>Supervisor: <a href="#" class="supervisor" data-type="select" data-pk="<?=$child['Group']['id']?>" data-title="Select User"><?=$supervisor?></a></small>
                                    </span>
                                </span>
                            </div>
                            <div class="col-md-4">
                                <span class="<?=$child['Group']['id']?> pull-right">
                                    <?php
                                    $localApps = Set::extract( $child, '/Apps/id' );
                                    foreach($apps as $app){
                                        $is_authorized = (in_array($app['id'], $localApps )) ? 
                                            $this->Html->link(
                                                '<span class="comp_'. $app['name'].' '. $child['Group']['id'].'_'. $app['name'] .' badge-round badge element-bg-color-green" data-original-title="'.$app['name'].' - Remove Access" data-placement="top" data-toggle="tooltip"><i class="'.$app['iconCls'].'"></i></span>', 
                                                array('controller'=>'applications', 'admin'=>true ,'action'=>'access',$data[0]['Group']['id'], $child['Group']['id'], $app['id'], 0, $app['name'] ), 
                                                array('escape'=>false, 'class'=>'btn-switch') 
                                            ) : 
                                                            
                                            $this->Html->link(
                                                '<span class="comp_'. $app['name'].' '.$child['Group']['id'].'_'. $app['name'] .' badge-round badge badge-ghost" data-original-title="'.$app['name'].' - Give Access" data-placement="top" data-toggle="tooltip"><i class="'.$app['iconCls'].'"></i></span>', 
                                                array('controller'=>'applications', 'admin'=>true ,'action'=>'access',$data[0]['Group']['id'], $child['Group']['id'], $app['id'], 1, $app['name'] ), 
                                                array('escape'=>false, 'class'=>'btn-switch') 
                                            );
                                                        
                                            echo $is_authorized .'&nbsp;';
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                        <div id="<?=$countInput?>" class="collapse">
                            <div class="col-md-12">
                                <div class="newcompany col-md-9">
                                    <?php 
                                    echo $this->Form->create('Group', array('action'=>'addSubGroup','class'=>'form-horizontal'));
                                    echo $this->Form->hidden('parent_id', array('value'=>$child['Group']['id']));
                                        
                                    echo $this->Form->input( 'name', array(
                                        'label'=>false, 
                                        'div'=>false,
                                        'value' => '',
                                        'class'=>'form-control col-md-4',
                                        'placeholder' => 'Add Department'
                                    ));
                                    ?>
                                </div>
                                <?php echo $this->Form->button('Save', array('type'=>'submit', 'div'=>false, 'label'=>false, 'class'=>'btn btn-primary')); ?>
                                <?php echo $this->Form->end();?>
                            </div>
                        </div>
                        
                        <?php
                        $countInput++;
                        foreach($child['children'] as $dept){
                            $deptSupervisor = $dept['Supervisor']['first_name'].' '.$dept['Supervisor']['last_name'];
                            ?>
                            <div class="row row-padded">
                                <div class="col-md-6 col-md-offset-2">
                                    <span>
                                        <?php
                                        echo $this->Html->link(
                                            '<i class="icon ion-android-trash"></i>', 
                                            array('controller'=>'groups', 'admin'=>true, 'action'=>'delete', $dept['Group']['id']),
                                            array('escape'=>false,),
                                            "Are you Sure You Want To Delete This Department?"
                                        );
                                        ?>
                                        <span>
                                            <a href="#" class="groupName" data-placeholder="Required" data-type="text" data-pk="<?=$dept['Group']['id']?>" data-title="Enter Group Name"><?=$dept['Group']['name']?></a>
                                            <small><a href="#" class="supervisor" data-type="select" data-pk="<?=$dept['Group']['id']?>" data-title="Select User"><?=$deptSupervisor?></a></small>
                                        </span>
                                    </span>
                                </div>
                                <div class="col-md-4">
                                    <span class="<?=$dept['Group']['id']?> pull-right">
                                        <?php
                                        $deptApps = Set::extract( $dept, '/Apps/id' );
                                        
                                        foreach($apps as $app){
                                            $is_authorized = (in_array($app['id'], $deptApps )) ? 
                                                $this->Html->link(
                                                    '<span class="comp_'. $app['name'] .' '.$child['Group']['id'].'_'. $app['name'] .' '. $dept['Group']['id'].'_'. $app['name'] .' badge-round badge element-bg-color-green" data-original-title="'.$app['name'].' - Remove Access" data-placement="top" data-toggle="tooltip"><i class="'.$app['iconCls'].'"></i></span>', 
                                                    array('controller'=>'applications', 'admin'=>true ,'action'=>'access',$data[0]['Group']['id'], $dept['Group']['id'], $app['id'], 0, $app['name']  ), 
                                                    array('escape'=>false, 'class'=>'btn-switch') 
                                                ) : 
                                                            
                                                $this->Html->link(
                                                    '<span class="comp_'. $app['name'] .' '.$child['Group']['id'].'_'. $app['name'] .' '.$dept['Group']['id'] .'_'. $app['name'] .' badge-round badge badge-ghost" data-original-title="'.$app['name'].' - Give Access" data-placement="top" data-toggle="tooltip"><i class="'.$app['iconCls'].'"></i></span>', 
                                                    array('controller'=>'applications', 'admin'=>true ,'action'=>'access',$data[0]['Group']['id'], $dept['Group']['id'], $app['id'], 1, $app['name']  ), 
                                                    array('escape'=>false, 'class'=>'btn-switch') 
                                                );
                                                        
                                            echo $is_authorized .'&nbsp;';
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    
        <div class="col-md-4">
            <div class="widget">
                <div class="widget-header clearfix">
                    <h3><i class="icon ion-ios7-browsers-outline"></i> <span>Job Titles</span></h3>
                </div>
                
                <div class="widget-content">
                    <table class="table table-striped table-hover table-condensed" id="groupTable">
                        <thead>
                            <?php
                            echo $this->Html->tableHeaders(array(
                                'Title',
                                'Description',
                                'Options'
                            ));
                            ?>
                        </thead>
                        <tbody>
                            <?php
                            foreach($data[0]['JobTitle'] as $job){
                                ?>
                                <tr>
                                    <td><?=$job['job_title']?></td>
                                    <td><?=$job['description']?></td>
                                    <td>Options</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<!-- Modal stuff is here -->

<div class="modal fade" id="AjaxModal" tabindex="-1" role="dialog" aria-labelledby="addGroups" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(window).ready( function($) {
        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });

        var edit_name_url = '<?php echo Router::url( array('controller'=>'groups', 'action'=>'edit', 'admin'=>true ));?>';
        var access_name_url = '<?php echo Router::url( array('controller'=>'applications', 'action'=>'access', 'admin'=>true ));?>';
        
        $.fn.editable.defaults.mode = 'popup';
        $('.groupName').editable({
            validate: function(value) {
                if($.trim(value) == '') return 'This field is required';
            }
        });
        
        $('.supervisor').editable({
            inputclass: 'input-large',
            prepend: "Select User",
            source: <?php echo json_encode($users); ?>
        });
        
        $(document).on('click','.editable-submit',function(){
            var x = $(this).closest('.wrap').attr('id');
            var n = $('.input-sm').val();
            var s = $('.input-large').val();
            var newId = '#' + x;
            $.ajax({
                url: edit_name_url,
                type: 'post',
                dataType: "json",
                data: { Group: { id: x, name: n, supervisor_id: s }},
                success: function(s){
                    if(s == 'status'){
                        $(z).html(y);
                    }
                    
                    if(s == 'error') {
                        alert('Error Processing your Request!');
                    }
                },
                
                error: function(e){
                    alert('Error Processing your Request!!');
                }
            });
        });
        
        $('.btn-switch').on('click', function() {
            var row = $(this).parents('td');
            var url = $(this).attr('href');
            var pathArray = url.split( '/' );
            var newPath = "/" + pathArray[1] + "/" + pathArray[2] + "/" + pathArray[3] + "/" + pathArray[4] + "/" + pathArray[5] + "/" + pathArray[6] + "/";
            var updateClass = $(this).parents('span').attr('class');
            var newClass = '.' + updateClass + '_' + pathArray[8];
            $.ajax( {
                type:'get',
                url: $(this).attr('href'),
                dataType: 'json',
                success: function(response) {
                    
                    if(response.sucess == false) {
                        alert('There was an error');
                    }
                    
                    if(response.sucess == true) {
                        if(response.msg == 1){
                            $( newClass ).removeClass('badge-ghost').addClass('element-bg-color-green');
                            $( newClass ).closest('a').attr("href", newPath + response.enable + '/' + pathArray[8]);
                            
                            if(updateClass == 'comp'){
                                row.find('i').removeClass('ion-close').addClass('ion-checkmark');
                            }
                        }
                        
                        if(response.msg == 2){
                            $( newClass ).removeClass('element-bg-color-green').addClass('badge-ghost');
                            $( newClass ).closest('a').attr("href", newPath + response.enable + '/' + pathArray[8]);
                            
                            if(updateClass == 'comp'){
                                row.find('i').removeClass('ion-checkmark').addClass('ion-close');
                            }
                        }
                    }
                },
                error: function(e) {
                    alert("An error occurred: " + e.responseText.message);
                    console.log(e);
                }
            });
            
            return false;
        });
    });
</script>
