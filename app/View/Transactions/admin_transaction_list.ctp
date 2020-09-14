<?php
$page = $this->params['paging']['TransactionLog']['page'];
$counter = ($page * 10) - 10 + 1;
//pr($counter);die;
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Transaction listing
                </div>
                    
                <label>&nbsp;&nbsp;</label>
                    <!--end-->
            </div>
            <div class="table-scrollable" style="margin-top:30px;">
    		<!--  <div style="color:green">   <?php //echo $this->Session->flash(); ?> </div>-->
				<div style="color:green;text-align: center;font-size: 18px;"><?php echo $this->Session->flash(); ?> </div>
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                    <thead>
						<tr>
                            <th style="text-align:center" >S.No.</th>
                            <th style="text-align:center" >Transaction ID</th>
                            <th style="text-align:center">User's EmailID</th>
                            <th style="text-align:center">Amount</th>
                            <th style="text-align:center">Payment Status</th>
                            <th style="text-align: center">Date of Transaction</th>
                            <th style="text-align:center" colspan="2">Action</th>
						</tr>
					</thead>
                	<tfoot>
                        <tr>
                           <td colspan="9" class="rounded-foot-left"><em><?php echo $this->element('admin_paging_links'); ?></em></td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i=1; foreach($TranList as $result) { ?>
                              
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result['TransactionLog']['id']; ?></a></td>
                            <td><?php echo $result['User']['email_id']; ?></a></td>
                            <td><?php echo $result['TransactionLog']['amount_major']; ?></td>
                            <td><?php echo $result['TransactionLog']['status']; ?></td>
                            <td><?php echo $result['TransactionLog']['transaction_datetime_txt']; ?></td>
                            <td>
								<?php
                                    echo $this->Html->link('<i class="glyphicon glyphicon-trash"></i>', array(
                                        'controller' => 'transactions',
                                        'action' => 'admin_deleteTransaction',
                                        $result['TransactionLog']['id']
                                            ), array(
                                        'escape' => false,
                                        'confirm' => 'Are you sure?',
                                        'title' => 'Delete'
                                    ));
                                ?>
							</td>
                        </tr>
                            
                        <?php $i++;} ?>
					</tbody>
                </table>
                        
            </div>                    
        </div>
    </div>
</div>