<?php echo $this->Html->script('jquery.min.js');?>
<?php echo $this->Html->script('jquery.datetimepicker.js'); ?>
<script>
    $(document).ready(function() {
        $("#date").datepicker({
            dateFormat: "yy-mm-dd",
            yearRange: 'c+0:c+99',
            changeMonth: true,
          changeYear: true
        });
	});
</script>
<?php
$page = $this->params['paging']['TransactionLog']['page'];
$counter = ($page * 10) - 10 + 1;
//pr($counter);die;
?>
<div class="row">
<div class="col-md-12">
            <?php echo $this->Form->create('Report', array('controller' => 'reports', 'action' => 'admin_viewReport','id' => 'search_course')); ?>
            <div class="row">
              <div class="col-sm-3">
                <div class="calender">
                  <input type="text" autocomplete="off"  data-toggle="datepicker" name="data[Report][date]" placeholder="Booking Date" id="date" class="form-control">
                  
                </div>
              </div>
			
              <div class="col-sm-2">
                <button type="submit" class="btn green" >Filter</button>
              </div>
            
            </div>
            <?php echo $this->form->end(); ?>
          </div>
					


            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title" style="border-bottom:none;">
                        <div class="caption">
                            <i class="fa fa-reorder"></i> View Details
                        </div>
                    </div>
                    <div class="table" style="margin-top:30px;">
                        <div style="color:green"><?php echo $this->Session->flash(); ?> </div>
                        <table class="table table-striped table-bordered table-hover" style="text-align:center;">
						<thead>
						<tr>
						<th style="text-align:center">Booking ID</th>
						 <th style="text-align:center">Course Name</th>
						 <th style="text-align:center">Course Fees</th>
						 <th style="text-align:center">Paid</th>
						 <th style="text-align:center">User Name</th>
						 <th style="text-align:center">Company Name</th>
						 <th style="text-align:center">Email</th>
						 <th style="text-align:center">Booking Date</th>
						 <th style="text-align:center">Gender</th>
						 <th style="text-align:center">Age Group</th>
						 <th style="text-align:center">Merital Status</th>
						 <th style="text-align:center">Ethnic Group</th>
						</tr>
						</thead>
						<tfoot>
                        <tr>
                           <td colspan="9" class="rounded-foot-left"><em><?php echo $this->element('admin_paging_links'); ?></em></td>
                        </tr>
                    </tfoot>
					<tbody>
						<?php foreach($BookingDetail as $result){ ?>
                            <tr>
                                <td align = "center"><?php echo $result['TransactionLog']['id']; ?></td>
                                <td align = "center"><?php echo $result['Course']['course_name'];?></td>
                                <td align = "center"><?php echo $result['Course']['delegate_price'];?></td>
                                <td align = "center"><?php echo $result['TransactionLog']['amount_major'];?></td>
                                <td align = "center"><?php echo $result['User']['first_name']," ", $result['User']['last_name'];?></td>
								<td align = "center"><?php echo $result['User']['company'];?></td>
                                <td align = "center"><?php echo $result['User']['email_id'];?></td>
                          
                                <td align = "center"><?php echo date('d-m-Y', strtotime($result['TransactionLog']['transaction_datetime_txt']));?></td>
								<td align = "center"><?php echo $result['User']['gender'];?></td>
								<td align = "center"><?php echo $result['User']['age'];?></td>
								<td align = "center"><?php echo $result['User']['maritalstatus'];?></td>
								<td align = "center"><?php echo $result['User']['ethnic']," ", $result['User']['sub_ethnic'];?></td>
								
                            </tr>
					
						<?php } ?>
						</tbody>
                        </table>                        
                    </div>                    
                </div>
            </div>
        </div>
<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<?php echo $this->Html->script('jquery-ui.js'); ?>


<?php echo $this->Html->css('jquery-ui.css'); ?>
