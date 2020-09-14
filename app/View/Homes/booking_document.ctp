<div id="div_print">
<div class="container" >
    <div class="row">
        <div class="col-sm-12" align="center" >
        <img src="/app/webroot/img/logo.jpg" alt="logo" class="img-responsive" title="Techno CTA Ltd" id="display" style="display:none;">
            <h3 class="bookingdetail">Booking Details And Joining Instructions</h3>
        </div>
        <div class="col-sm-12">

            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
					<?php if(!empty($book['Bookinglog']['sponsor_company'])){?>
						 <tr>
                            <td>Sponsor Name </td>
                            <td>
                                <?php echo $book['Bookinglog']['sponsor_company']; ?>
                            </td>
                        </tr>
					<?php }?>
					
					<?php if($book['User']['user_type']=="Company"){ ?>
						 <tr>
                            <td>Number of Candidate</td>
                            <td>
                                <?php $name = explode(',',$book['User']['first_name']);
								echo count($name); ?>
                            </td>
                        </tr>
					<?php }else{ ?>
						 <tr>
                            <td>Candidate Name </td>
                            <td>
                                <?php echo $book['User']['first_name']." ". $book['User']['last_name']; ?>
                            </td>
                        </tr>
					<?php }?>
                        <tr>
                            <td>Course Name </td>
                            <td>
                                <?php echo $book['Bookinglog']['course_name']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Course Duration</td>
                            <td>
                                <?php echo $tran['Course']['duration']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Course Date</td>
                            <td>
                                <?php echo $book['Bookinglog']['course_date']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Start Time</td>
                            <td>
                                <?php echo $book['Bookinglog']['start_time']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Finish Time</td>
                            <td>
                                <?php echo $book['Bookinglog']['end_time']; ?>
                            </td>
                        </tr>

                        <tr>
                            <td>Price Per Deligates (Incl VAT)</td>
                            <td>&#163;
                                <?php echo $book['Bookinglog']['price_inc_vat']; ?>
                            </td>
                        </tr>
						<tr>
                            <td>Location</td>
                            <td>
                                <?php echo $tran['Location']['location']; ?>
                            </td>
                        </tr>
						<tr>
                            <td>Telephone</td>
                            <td>0207 055 0877</td>
                        </tr>
						<tr>
                            <td>Car Parking</td>
                            <td>Pay & Display & some restriction parking; permit holders only</td>
                        </tr>
						<tr>
                            <td>Smoking Policy</td>
                            <td>Smoking is not permitted inside the training centre.</td>
                        </tr>
						<tr>
                            <td>Refreshments</td>
                            <td>Hot and Cold drinks will be available on site</td>
                        </tr>
						<tr>
                            <td>Mobile Phone Policy</td>
                            <td>No phones or any gadgets are permitted in the training rooms</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
		<div  class="col-sm-12 pad">
		
		<h4 style="text-align: center;margin-top: 14px;">Training Sponsorship Agreement/Course Bookings</h4>
		<br>
<h5>Terms and Conditions</h5>

<br>
<h6>Course Bookings</h6>
<br>
<p>Online booking is completed via the Techno CTA Ltd website. However, a booking is only regarded as confirmed once a signed booking form has been received by the candidate’s Primary/Sub sponsor. Any bookings made by a sub-sponsor or broker must provide confirmation that the primary sponsor has been made aware and agrees to the training or assessment of each candidate.</p>



<h6>Payment</h6>
<br>
<p>The course fee per candidate will be the fee published in the literature of the company on the date the booking is made. All fees quoted are exclusive of VAT which will be charged at the current rate. Our VAT registration number is 252 4473 13.</p>

<p>Full payment is required when the course is booked by Sponsor or Individual Candidate using our Online Booking via Techno CTA website. Most types debit card and credit cards are accepted with the exception of Diners and American Express cards.</p>

<p>Techno CTA Ltd reserve the right to cancel or refuse services agreed (training and assessments).
Techno CTA Ltd does not accept cheques as a method of payment.</p>



<h6>Course Cancellations</h6>
<br>
<p>In the event you wish to cancel this booking you must complete cancellation form that should be done before 7 days of actual course planned, otherwise the full course fees will be charged</p>

<p>Should you wish to make changes to the booking, please contact Techno CTA Ltd; no charges will be applied if the changes are notified more than 7 days prior to the course start date.</p>

<p>If cancellation occurs within 7 days of the course start date, the course fee becomes payable in full. If cancellation occurs within 48 hours of the course start date, the course fee becomes payable 20%.
If cancellation occurs within 24 hours of the course start date, the course fee becomes non-refundable.</p>
 



<table>
<thead>Course Cancellation</thead>
<tr><td>within 7 days </td>	<td>Full refund</td></tr>
<tr><td>within 48 hours</td>	<td>	80% refund</td></tr>
<tr><td>within 24 hours</td>	<td>	0% refund</td></tr>
</table>
<br>
<h6>Allow 5-10 workings days for refund.</h6>
<br>
<p>Should you wish to make changes to the booking, please contact Techno CTA Ltd, no charges will be applied if the changes are notified more than 7 days prior to the course start date.</p>

<p>Techno CTA Ltd will endeavour to run all published courses and any changes to course dates or times will be notified as soon as possible. We reserve the right to cancel or reschedule courses and accept no consequential liability or any other claim irrespective of notice given for any changes made by Techno CTA Ltd.</p>


<p>Techno CTA Ltd will endeavour to run all published courses and any changes to course dates or times will be notified as soon as possible. We reserve the right to cancel or reschedule courses and accept no consequential liability or any other claim irrespective of notice given for any changes made by Techno CTA Ltd.</p>

<h6>Medical, Drugs and Alcohol Requirements</h6>
<br>
<p>The minimum Network Rail medical fitness standards NR/L2/0HS/00124 and NR/L1/0HS/051 Drugs and Alcohol Policy must be met prior to attending the course. The medical and drug and alcohol results must be registered on the Rail Sentinel website by the approved provider prior to the course start date.</p>


<h6>Personal Identification</h6>
<br>
<p>All delegates must produce photo I.D in the form of a new type driving license, Driving Licence with photo, Passport or similar to ensure candidates meet with eligibility to reside and work within the UK. Sponsor to advise the delegate(s)</p>

<p>Candidates must be able to converse adequately with the spoken English language to make emergency phone calls and recite phonetic alphabet. Failure to meet this requirement may result in refusal to continue with a training course</p>

		
		</div>
		<br>
		<?php if(!empty($tran['Course']['pre_requisite'])){ ?>
        <div class="col-sm-12 pad">
		<h4 style="text-align: center;margin-top: 14px;">Pre-Requisites</h4>
        <p>
			<?php echo $tran['Course']['pre_requisite'];?>
		</p>
    </div>
	<?php } ?>
	<br>
	<div>

	</div>
    </div>
    
    </div>
    <div class="container" >
    <div class="row">
        <div class="col-sm-12" align="left" >
    <button class="btn btn-success" onclick="PrintFunction('div_print')" style="margin:0">Print this page</button>
    </div>
    </div>
    </div>
<script>

function PrintFunction(printpage){
document.getElementById("display").style.display = "block";    
var headstr = "<html><head><title></title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;

document.getElementById("display").style.display = "none";  
return false;
}
</script>
<style>

    .table td{
        font-size: 17px;
    padding: 14px 16px;
    }
    #U_file , #SignDig{
        display:none;
    }
    .mystyle{
        pointer-events: none;
        opacity: 0.7;
    }
</style>

