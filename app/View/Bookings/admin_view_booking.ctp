
<div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title" style="border-bottom:none;">
                        <div class="caption">
                            <i class="fa fa-reorder"></i> View Booking Details
                        </div>
                    </div>
                    <div class="table" style="margin-top:30px;">
                        <div style="color:green"><?php echo $this->Session->flash(); ?> </div>
                        <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                            <!-- <tr>
                                <td style="width:200px;">Booking ID:</td>
                                <td align = "left"><?php// echo $BookingDetail['TransactionLog']['id']; ?></td>
                            </tr>
                            <tr>
                                <td style="width:200px;">Course ID:</td>
                                <td align = "left"><?php //echo $BookingDetail['TransactionLog']['course_id'];?></td>
                            </tr> -->
							<tr>
                                <td style="width:200px;">First Name:</td>
                                <td align = "left"><?php echo $BookingDetail['User']['first_name'];?></td>
                            </tr>
                             <tr>
                                <td style="width:200px;">Last Name:</td>
                                <td align = "left"><?php echo $BookingDetail['User']['last_name'];?></td>
                            </tr>
                             <tr>
                                <td style="width:200px;">Course Name:</td>
                                <td align = "left"><?php echo $BookingDetail['Course']['course_name'];?></td>
                            </tr>
                             <tr>
                                <td style="width:200px;">Course Fees:</td>
                                <td align = "left"><span>&#163;</span><?php echo $BookingDetail['Course']['delegate_price'];?></td>
                            </tr>
                             <tr>
                                <td style="width:200px;">Payment Status</td>
								<td align = "left"><?php if($BookingDetail['TransactionLog']['status']=="Declined"){echo "Pending"; }else{ echo $BookingDetail['TransactionLog']['status'];}?></td>
                            </tr>
                             
                             <!-- <tr>
                                <td style="width:200px;">Date of Birth:</td>
                                <td align = "left"><?php //echo $BookingDetail['User']['dob'];?></td>
                            </tr> -->
                             <tr>
                                <td style="width:200px;">User's Email-ID</td>
                                <td align = "left"><?php echo $BookingDetail['User']['email_id'];?></td>
                            </tr>
                            <tr>
                                <td style="width:200px;">User's Phone No.</td>
                                <td align = "left"><?php echo $BookingDetail['User']['phone'];?></td>
                            </tr>
							 <tr>
                                <td style="width:200px;">Sponsor's Email-ID</td>
                                <td align = "left"><?php echo $BookingDetail['User']['companyemail'];?></td>
                            </tr>
                            <!-- <tr>
                                <td style="width:200px;">Address:</td>
                                <td align = "left"><?php //echo $BookingDetail['User']['address'];?></td>
                            </tr>-->
                             <tr>
                                <td style="width:200px;">Booking Date:</td>
                                <td align = "left"><?php echo date('d-m-Y',strtotime($BookingDetail['TransactionLog']['transaction_datetime_txt']));?></td>
                            </tr>
                        </table>                        
                    </div>                    
                </div>
            </div>
        </div>
