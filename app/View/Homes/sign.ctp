<?php
	if($this->Session->read('Auth')){
		$authId = $_SESSION['Auth']['User']['id'];
		$authFirstName = $_SESSION['Auth']['User']['first_name'];
		$authLastName = $_SESSION['Auth']['User']['last_name'];
        $authUserType = $_SESSION['Auth']['User']['user_type'];
		//echo $id;
	}

?>
<input type="hidden" name="" value="<?php echo $book['Bookinglog']['email_status']; ?>" id="emailstatus">

<div class="container">
    <div class="row">
        <div class="col-sm-12" align="center">
		<?php if(!empty($tran['Course']['pre_requisite'])){ ?>
            <h3 class="bookingdetail">Course Details and Joining Instructions</h3>
			<?php }else{ ?>
			 <h3 class="bookingdetail">Course Details</h3>
			 <?php }?>
        </div>
         
        <div class="col-sm-7">

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
                                <?php $names = explode(',',$book['User']['first_name']);

								echo $count = count($names); ?>
                            </td>
                        </tr>
                         <tr>
                            <td>Names of Candidate</td>
                            <td>
                                <?php  $lnames = explode(',',$book['User']['last_name']); 
                                    for ($i=0; $i < $count ; $i++) { 
                                       echo $names[$i].' '.$lnames[$i];?></br>
                                 <?php   }
                                ?>
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
                            <td>Sentinel number</td>
                            <td>
                                 <?php echo $book['User']['sentinel']; ?>
                             
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
            <?php echo $this->Form->create('homes', array('controller'=>'homes','action'=>'course_save','class' => 'comment-form -contact text-center', 'id' =>'personalForm','enctype'=>'multipart/form-data')); ?>
             <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
             <?php if (!empty($cc_d)): ?>
                <!--  <span style="color: red">'Thanks for the booking' 'Confirmation and Payment details will be emailed to you as soon as possible'</span> -->
                <script type="text/javascript">alert("Thanks for the booking' 'Confirmation and Payment details will be emailed to you as soon as possible")</script>
            <?php else: ?>
            <button type="submit" class="button btn btn-success" id="inputsb">Submit</button>
             <?php endif ?>
              <?php echo $this->form->end(); ?>
        </div>
     

       <!--  <div class="col-sm-5" align="center">
           
            <div class="profile">
                   <div id="upload_sign" class="Pointernone">
				   <?php echo $this->Form->create('Bookinglog',array('id'=>'pdfadd','type'=>'file','enctype'=>'multipart/form-data')); ?>
                        <div class="form-group">
                            <label class="lab">Upload Signature</label>
                                <input type="file" name="data[Bookinglog][sign]" onclick="ClickFunction();">
                          </div>
                          <div class="form-group" id="U_file">
                          <button type="submit" class="button btn btn-success" id="inputsb">Submit</button>
                          <button type="button" class="button btn btn-success" onclick="ResetUpload();">Reset</button>
                          </div>
						   <?php echo $this->form->end(); ?>

                        </div>
				
                 </div>
                 <div class="form-group text-left">
                 <label class="labs">OR</label>
                </div>

                    <div class="form-group">

                        <label class="lab">Digital Signature</label>
                        <input type="hidden" id="signat" value="">
                        <div id="signature-pad" class="signature-pad pointerevent">
                            
                            <div class="signature-pad--body" onclick="functionClik();">
                                <canvas></canvas>
                            </div>
                            <div class="signature-pad--footer">
                                <div class="signature-pad--actions">
                                    <div>
                                        <button type="button" class="button btn btn-success clear" data-action="clear">Clear</button>
                                      
 <button type="button" class="button btn btn-success" data-action="undo">Undo</button>

                                    </div>
                                    <div id="SignDig"> 
                                    <button type="button" class="button save btn btn-success" data-action="save-png" onclick="send_mail();" id="sendmail">Submit</button>
                            <button type="button" class="button save btn btn-success" onclick="ResetUpload();">Reset</button>
                                    </div>
                                </div>  
                            </div>
                           
                        </div>
                       
                    </div>


            </div> -->
        </div>
		<!-- <?php if(!empty($tran['Course']['pre_requisite'])){ ?>
        <div class="col-sm-12 pad">
        <p>
			<?php echo $tran['Course']['pre_requisite'];?>
		</p>
    </div> -->
	<?php } ?>
    </div>

   
</div>
</div>

<style>

    .table td{
        font-size: 14px;
    padding: 8px;
    text-align: left;
    }
    #U_file , #SignDig{
        display:block;
    }
    .mystyle{
        pointer-events: none;
        opacity: 0.7;
    }
    .pad div{
        font-size:14px;
    }
    .pad p{
        font-size:16px;
        font-weight:600;
        margin:0;
    }
    .pad p span{
        font-size:16px !important;font-weight:600;
    }
    .bookingdetail {
    text-align: center;
    margin: 30px 0 35px 0;
    font-size: 24px;
}
.table td, .table th {
    border-top: 1px solid #449ac6
}
.table {
    border: 1px solid #449ac6;
}
.table thead th:first-child, .table tbody td:first-child{
    white-space: nowrap;
}
.pointerevent{
    pointer-events: none;
}
</style>
<script>
    function ClickFunction(){
        setTimeout(function(){
        document.getElementById("U_file").style.display = "block";
        var element = document.getElementById("signature-pad");
        element.classList.add("mystyle");
        }, 2000);
    }
</script>
<script>
    function ResetUpload(){
        document.getElementById("U_file").style.display = "none";
        document.getElementById("SignDig").style.display = "noe";
        var element = document.getElementById("signature-pad");
        element.classList.remove("mystyle");
        var element1 = document.getElementById("upload_sign");
        element1.classList.remove("mystyle");
    }
</script>
<script>
function functionClik(){
    setTimeout(function(){
        document.getElementById("SignDig").style.display = "block";
        var element = document.getElementById("upload_sign");
        element.classList.add("mystyle");
        }, 1000);
}
    </script>
	
<script>
    function send_mail(){
		setTimeout(function(){
        var img = document.getElementById("signat").value;
		var url_string = window.location.href;
		var url = new URL(url_string);
		var id = url.searchParams.get("id");
        if (img ==null || img ==""){
            return false;
        }
		 $.ajax({
         url: "<?php echo SITEPATH ?>homes/digital_sign",
         data: {
             img: img,
			 id:id
         },
         type: "POST",
         success: function(e) {
          //s alert(e);
			if(e==2){
				alert('<?php echo $authUserType ?>');return false;
                window.location = '<?php echo $this->webroot; ?>app/webroot/Payzone/index.php?id=<?php echo $book['Bookinglog']['course_id']; ?>&amount=<?php echo $book['Bookinglog']['price_inc_vat']; ?>&userId=<?php echo $authId; ?>&username=<?php echo $authFirstName." ".$authLastName; ?>&userType=<?php echo $authUserType; ?>';
			}else if(e==1){
                document.getElementById("alertshowmsg").innerHTML = "Thank You For E-Sign.";
                document.getElementById("alertMsgs").style.display = "block";
                setTimeout(function(){
				window.location = '<?php echo SITEPATH ?>';
                 }, 6000);
			}
         }
     })
		}, 1000);
    }
</script>

<script>

window.addEventListener('load', 
  function() { 
    setTimeout(function(){ 
    var element = document.getElementById("signature-pad");
    element.classList.remove("pointerevent");
}, 1000);
  }, false);
    </script>
    <script type="text/javascript">
    var i = document.getElementById("emailstatus").value;
 
    if(i == 1){
        //      alert(i)   
        document.getElementById("sendmail").disabled = true;
          document.getElementById("inputsb").disabled = true;
    }else{
       //   alert("hgfd")
        document.getElementById("sendmail").disabled = false;
          document.getElementById("inputsb").disabled = false;
    }

</script>
