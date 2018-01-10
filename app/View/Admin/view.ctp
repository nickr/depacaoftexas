<!-- Page Content -->
<main>
    <div class="container-fluid mb-5">
    	<section>
			<div class="row">
            	<div class="col-md-12">
                	<div class="card">
                        <div class="card-body">
							<table class="table table-striped" id="accountsTable">
					        	<thead>
					            	<tr class="tr-heading">
					            		<th></th>
					            	</tr>
					            </thead>
					            
					            <tbody>
					            	<?php 
									foreach($content as $v){
										?>
										<tr>
											<td><?= $v['PageDetail']['title']?></td>
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
		</section>
	</div>
</main>