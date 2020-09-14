<div class="row">
	<div class="col-md-12">
		<div class="portlet box green">
			<div class="portlet-title" style="border-bottom:none;">
				<div class="caption">
					<i class="fa fa-reorder"></i>Certificate Listing
				</div>
			</div>
			<div class="table-scrollable" style="margin-top:30px;">
<!--        <div style="color:green">   <?php //echo $this->Session->flash(); ?> </div>-->
				<div style="color:green;text-align: center;font-size: 18px;"><?php echo $this->Session->flash(); ?> </div>
				<table class="table table-striped table-bordered table-hover" style="text-align:center;">
					<thead>
						<tr>
							<th style="text-align:center" >S.No.</th>
							<th style="text-align:center" >Title</th>
							<th style="text-align:center" >Image</th> 
							<th style="text-align:center" colspan="2">Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<td colspan="9" class="rounded-foot-left"><em><?php echo $this->element('admin_paging_links'); ?></em></td>
						</tr>
					</tfoot>
					<tbody>
					<?php $i=1; foreach($docs as $result) { ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $result['Certificate']['title']; ?></a></td>
                            <td><?php echo $this->html->image('references/image/'.$result['Certificate']['image'] ,array('width'=>'50px','height'=>'50')); ?></a></td>
							<td><a href="<?php echo $this->html->url(array('controller' => 'sponsors', 'action' => 'admin_certificateView', $result['Certificate']['id'])); ?>"><?php echo $this->html->image('view.ico',array('title' => 'View'));?></a></td>
							<td><a href="<?php echo $this->html->url(array('controller' => 'sponsors', 'action' => 'admin_certificateEdit', $result['Certificate']['id'])); ?>"><?php echo $this->html->image('user_edit.png', array('title' => 'Edit')); ?></a></td>


							<!-- <td> <?php //echo $this->Html->link('Delete', array('id' => 'modalsforgs')); ?></td> -->

							<td> <?php echo $this->Html->link('<i class="glyphicon glyphicon-trash"></i>',array('controller' => 'sponsors','action' => 'admin_certificateDelete',$result['Certificate']['id']), array('escape' => false,'alt' =>'delete','style' => 'color: #428bca;','title'=>'Delete','confirm' => 'Are you sure?','titletitle')); ?></td> 

							</tr>
					<?php $i++ ; } ?>
					</tbody>
				</table>
			</div>                    
		</div>
	</div>
</div>

<!-- Company Details-->
<!--Modal  -->
<a data-target="#ConfirmDelete" role="button" data-toggle="modal" id="trigger"></a>
<div class="modal fade" id="ConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Deletar Notícia</h4>
            </div>
            <div class="modal-body">
                Deseja realmente apagar este registro?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left btn-lg" data-dismiss="modal">Cancelar</button>
                <div id="ajax_button"></div>
            </div>
        </div>
    </div>
</div>


<!-- ////////////Company Details-->