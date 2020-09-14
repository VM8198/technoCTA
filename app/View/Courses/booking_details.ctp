<?php
	if($this->Session->read('Auth')){
		$authId = $_SESSION['Auth']['User']['id'];
		$authFirstName = $_SESSION['Auth']['User']['first_name'];
		$authLastName = $_SESSION['Auth']['User']['last_name'];
        $authUserType = $_SESSION['Auth']['User']['user_type'];
		//echo $id;
	}
?>
<div class="container">
    <div class="row">
    <div class="col-sm-3"></div>
        <div class="col-sm-6">
        <h3 class="bookingdetail">Course Details</h3>
            <div class="table-responsive">
                <table class="table table-striped">
                  
                    <tbody>
                        <tr>
                            <td>Course Name </td>
                            <td><?php echo $details['Bookinglog']['course_name']; ?></td>
                        </tr>
						<tr>
                            <td>Course Duration</td>
                            <td><?php echo $coursedetails['Course']['duration']; ?></td>
                        </tr>
						<tr>
                            <td>Course Date</td>
                            <td><?php echo $details['Bookinglog']['course_date']; ?></td>
                        </tr>
                        <tr>
                            <td>Start Time</td>
                            <td><?php echo $details['Bookinglog']['start_time']; ?></td>
                        </tr>
                        <tr>
                            <td>End Time</td>
                            <td><?php echo $details['Bookinglog']['end_time']; ?></td>
                        </tr>
                        
                        <tr>
                            <td>Price Per Deligates (Incl VAT)</td>
                             <td>&#163;<?php echo $details['Bookinglog']['price_inc_vat']; ?></td>
                        </tr>
                        <tr>
                            <td>Location</td>
                             <td><?php echo $coursedetails['Location']['location']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-12" align="center">
                <?php if(empty($findcoursedetail)){ ?>
                    <span id='mailmsg' style="color: red"></span>
					<a class="btn btn-success" id="sbutton" onclick="send_sponsormail();"  href="#">Submit</a>
                <?php }else{ ?>
                    <!-- <span id='mailmsg' style="color: red">Thanks for the booking' 'Confirmation and Payment details will be emailed to you as soon as possible</span> -->
                    <script type="text/javascript">alert("Thanks for the booking' 'Confirmation and Payment details will be emailed to you as soon as possible")</script>
                <?php } ?>
                </div>
        </div>
        
        <div class="col-sm-3"></div>
    </div>
</div>

<!-- <?php echo $this->webroot; ?>app/webroot/Payzone/index.php?id=<?php echo $details['Bookinglog']['course_id']; ?>&amount=<?php echo $details['Bookinglog']['price_inc_vat']; ?>&userId=<?php echo $authId; ?>&username=<?php echo $authFirstName." ".$authLastName; ?>&userType=<?php echo $authUserType; ?>-->

<script>
    function send_sponsormail(){
	setTimeout(function(){
		var url_string = window.location.href;
		var url = new URL(url_string);
		var id = url.searchParams.get("id");
		//alert(id); return false;
		 $.ajax({
         url: "<?php echo SITEPATH ?>users/sponsorMail",
         data: {
			 id:id
         },
         type: "POST",
         success: function(e) {
			 if(e == 2)
                $('#sbutton').hide();
            alert("Thanks for the booking' 'Confirmation and Payment details will be emailed to you as soon as possible");

			// $('#mailmsg').html("Thanks for the booking' 'Confirmation and Payment details will be emailed to you as soon as possible");
         }
     })
	}, 1000);
	
       
    }
</script>