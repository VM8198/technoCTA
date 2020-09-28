<?php
$page = $this->params['paging']['TransactionLog']['page'];
$counter = ($page * 10) - 10 + 1;
//pr($counter);die;
?>
<?php //pr($getvalue['order_id']); die;?>
<div class="row">
<div class="col-md-12">
            <Form action="bookingList">
            <div class="row">
				<div class="col-sm-2">
                <input type="text" class="form-control" placeholder="Booking ID" name="order_id" value="<?php if(!empty($getvalue['order_id'])){
		  echo ($getvalue['order_id']);
	  }else{}?>">
              </div>
			   <div class="col-sm-3">
              <select class="form-control" name="status" >
				 <option value="">Payment Status</option>
					<?php foreach ($payStatus as $value) { ?>
                            <option value="<?php echo $value['TransactionLog']['status']; ?>"<?php
                            if (!empty($getvalue['status'])) {
                                 echo ($getvalue['status'] == $value['TransactionLog']['status'])? "selected" : "";
                            };
                            ?>><?php if($value['TransactionLog']['status']=="Declined"){echo "Pending"; }else{ echo $value['TransactionLog']['status'];}?></option>
                                <?php } ?>
			</select>
              </div>
			   <div class="col-sm-3">
               <!--   <input type="text" class="form-control" placeholder="Sponsor's Email ID" name="data[Booking][companyemail]"> -->
             
              <select class="form-control" name="course_name" >
                 <option value="">Course Name</option>
                    <?php foreach ($course_list as $value) { ?>
                            <option value="<?php echo $value['Course']['course_name']; ?>"<?php
                            if (!empty($getvalue['course_name'])) {
                                 echo ($getvalue['course_name'] == $value['Course']['course_name'])? "selected" : "";
                            };
                            ?>><?php echo $value['Course']['course_name']; ?></option>
                                <?php } ?>
            </select>
             </div>
              <div class="col-sm-2">
                 <input type="text" class="form-control date_search" value="<?php if(!empty($getvalue['booking_date'])){
          echo ($getvalue['booking_date']);
      }else{}?>" placeholder="Booking Date" name="booking_date">
           </div>
              <div class="col-sm-2">
                <button class="btn green"  type="submit">Filter</button>
              </div>
            </div>
            </Form>
          </div>
       
                       

            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title" style="border-bottom:none;">
                        <div class="caption">
                            <i class="fa fa-reorder"></i>Booking listing
                        </div>
						<!-- <div class="rightbtn" align="right"> -->
						  <?php //echo $this->Html->link('Download',array('controller'=>'bookings','action'=>'export','class'=>'btn green'), array('target'=>'_blank'));?>
             <button type="submit" class="btn green download"><?php echo $this->Html->link('Download', array( 'controller' => 'bookings', 'action' => 'admin_bookingListExport','?' => array('order_id' => $_GET['order_id'],'status' => $_GET['status'],'course_name' => $_GET['course_name'],'booking_date' => $_GET['booking_date']))); ?>


						<!-- </div> -->
                        <!--end-->
                    </div>
                    <div class="table-scrollable" style="margin-top:30px;">
                      <!--  <div style="color:green">   <?php //echo $this->Session->flash(); ?> </div>-->
						 <div style="color:red;text-align: center;font-size: 18px;"><?php echo $this->Session->flash(); ?> </div>
                        <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                            <thead>

                                <tr>
                                    <th style="text-align:center" >Booking Date</th>
									<th style="text-align:center" >Booking ID</th>
                                    <th style="text-align:center" >Payment Status</th>
                                    <th style="text-align:center">Course Name</th>
                                    <th style="text-align:center">Location</th>
                                    <th style="text-align:center">Booked By</th>
                                    <th style="text-align:center" colspan="2">Action</th>

                                </tr>

                            </thead>
                             <tfoot>
                        <tr>
                           <td colspan="9" class="rounded-foot-left"><em><?php echo $this->element('admin_paging_links'); ?></em></td>
                        </tr>
                    </tfoot>
                            <tbody>

                                <?php $i = 0;
                                //pr($locationNameArr);
                                foreach($bookinglist as $result) { ?>
                              
                                <tr>
									<td><?php echo $result['TransactionLog']['transaction_datetime_txt'];?></td>
									<td><?php echo $result['TransactionLog']['order_id'];?></td>
									<td><?php if($result['TransactionLog']['status']=="Declined"){echo "Pending"; }else{ echo $result['TransactionLog']['status'];}?></td>

                  <td><?php echo $result['Course']['course_name']; ?></td>
                  <td><?php echo $locationNameArr[$i]['Location']['location']; ?></td>

									<?php if($result['User']['user_type']=='Company'){ ?>
                                    <td><?php echo $result['User']['company'];?></td> 
									<?php }else{ ?>
									 <td><?php echo $result['User']['first_name'];?></td> 
									<?php } ?>
									<td><a href="<?php echo $this->html->url(array('controller'=>'bookings','action'=>'admin_viewBooking',$result['TransactionLog']['id']));?>"><?php echo $this->html->image('view.ico',array('title' => 'View'));?></a></td> 
									<td><?php
                                    echo $this->Html->link('<i class="glyphicon glyphicon-trash"></i>', array(
                                        'controller' => 'bookings',
                                        'action' => 'admin_deleteBooking',
                                        $result['TransactionLog']['id']
                                            ), array(
                                        'escape' => false,
                                        'confirm' => 'Are you sure?',
                                        'title' => 'Delete',
                                        'style' => 'color: #428bca;'
                                    ));
                                    ?></td>
                                      
                                </tr>
                            
                           <?php $i++; } ?>
                                
                                   
                            </tbody>
                        </table>
                        
                    </div>                    
                </div>
            </div>
        </div>
		<style>
		.rightbtn a{
			    color: white;
    background-color: #449ac6;
	    font-size: 14px;
    font-weight: 600;
    border:1px solid #fff;
    padding:3px 9px;
		}
		</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php echo $this->Html->script('jquery.datetimepicker.js'); ?>
<?php echo $this->Html->css('jquery-ui.css'); ?>
        <script type="text/javascript">
            $('body').on('focus',".date_search", function(){
        $(this).datepicker({
       // minDate: 0,
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: "dd-mm-yy"
        
        });
    });
        </script>
