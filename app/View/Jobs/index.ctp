
<div class="account index bg-white">
    <div class="dashhead" style="border-bottom: 2px solid #00A65A;">
        <div class="dashhead-titles">
            <h6 class="dashhead-subtitle">All Jobs</h6>
            <h3 class="dashhead-title"><i class="fa fa-trophy fa-fw"></i>Jobs</h3>
        </div>
        <div class="dashhead-toolbar">
        </div>
    </div>
    <div class="flextable">
        <div class="flextable-item">
			<?php echo $this->element( 'Jobs/menu');?>
		</div>
        <div class="flextable-item">
			<?php #echo $this->element( 'Awards/status_filter', ['month'=>$month, 'year'=>$year, 'months'=>$months, 'years'=>$years] );?>
            <?php #echo $this->element( 'Accidents/search_filter', ['in'=>$in, 'var'=>$var, 'viewBy'=>$viewBy] );?>
        </div>
    </div>

	<table class="table table-hover table-condensed">
        <thead>
            <tr class="tr-heading">
                <th class="col-md-2">Job Title</th>
                <th class="col-md-2">Account</th>
				<th class="col-md-5">Description</th>
                <th class="col-md-2">SOC Code</th>
                <th class="col-md-1"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($content as $key=>$job){
                #pr($job);
				#exit;
                ?>
                <tr>
                    <td><?=$job['Job']['name']?></td>
                    <td><?=$job['Account']['name']?> ( <?=$job['Account']['abr']?> )</td>
                    <td><?=$job['Job']['description']?></td>
                    <td><?=$job['Job']['soc_code']?></td>
                    <td>
                        <ul class="list-inline">
                            <li>
                                <span class="btn-group-xs" data-placement="top" data-toggle="tooltip" title="Edit: <?=$job['Job']['name']?>">
                                    <?php
                                    echo $this->Html->link(
                                        '<i class="fa fa-pencil-square-o"></i>',
                                        array('controller'=>'jobs', 'action'=>'edit', $job['Job']['id']),
                                        array('escape'=>false, 'data-toggle'=>'modal', 'data-target'=>'#myModal',)
                                    );
                                    ?>
                                </span>
                            </li>
                            <li>
                                <?php
                                echo $this->Html->link(
                                    '<i class="fa fa-trash"></i>',
                                    array('controller'=>'jobs', 'action'=>'confirm', $job['Job']['id'], 'jobTitle'),
                                    array(
                                        'escape'=>false,
                                        'id'=>$key,
                                        'data-toggle'=>'tooltip',
                                        'data-placement'=>'top',
                                        'title'=>'Delete: '.$job['Job']['name'],
                                        'data-toggle'=>'modal',
                                        'data-target'=>'#myModal',
                                    )
                                );
                                ?>
                            </li>
                        </ul>
                    </td>
                </tr>
            <?php
            }
        ?>
        </tbody>
    </table>

</div>
<!-- Normal Model -->
<div class="modal bootstrap-dialog type-primary fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
    <div class="modal-dialog">
        <div class="modal-content">
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
<?php echo $this->Form->end();?>
<script language="JavaScript">
    jQuery(document).ready( function($) {
        $("#myModal").on('hidden.bs.modal', function () {
            $(this).data('bs.modal', null);
        });
    });
</script>