<?php 
/**
* Breadcrumbs element
* 
* Set the breadcrumbs variable to pass to the view.
*  $this->set('breadcrumbs', array(
*   array( 'title'=>'Home','/url/to/page', ''),
*   array( 'title'=>'Calendar', array('controller'=>'calendars', 'action'=>'view', 23) ),
*   array( 'title'=>'My Events Calendar', '/a/string/based/url', array('title'=>'Foo', 'rel'=>'nofollow', 'style'=>'color:#AAA') )
* ));
* 
* @author Jonathan Cutrer (joncutrer@gmail.com)
*/
if ( empty($breadcrumbs_for_layout ) && !empty( $breadcrumbs ) && is_array( $breadcrumbs ) ) {
    $breadcrumbs_for_layout = $breadcrumbs;
}

if ( !empty($breadcrumbs_for_layout) ) { 
    ?>
    <div class="container">
        <div class="breadcrumbs clearfix">    
            <ol class="breadcrumb">
            	<li class="breadcrumb-item">
            		<?php
					echo $this->Html->link(
	            		'Home',
	                	array('controller'=>'Pages', 'action'=>'index'),
	                	array('escape'=>false)
					);
					?>	
            	</li>
                <?php 
                $last = end($breadcrumbs_for_layout);
                foreach ( $breadcrumbs_for_layout as $key=>$crumb ) {
                    if ( !empty( $crumb['options'] ) && !is_array( $crumb['options'] )  ) { 
                        throw new Exception('Invalid breadcrumb options.');
                    }
                    if ( isset( $crumb['options'] ) ) {
                        $link_options = $crumb['options'];
                    } else {
                        $link_options = array();
                    }
                    
                    $active = ($last['title'] == $crumb['title']) ? 'active' : null ;
                    ?>
                    <li class="breadcrumb-item <?=$active?>"><?php echo $this->Html->link( $crumb['title'], $crumb['link'], $link_options );?></li>
                <?php } ?>
            </ol>
        </div><!-- /.breadcrumbs -->
    </div>
    <?php 
} ?>