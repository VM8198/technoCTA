<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".testdate").datepicker({
            dateFormat: "dd-mm-yy",
            yearRange: 'c+0:c+99',
            changeMonth: true,
          changeYear: true
        });

    });
</script>

<?php
	if($this->Session->read('Auth')){
		$authId = $_SESSION['Auth']['User']['id'];
		$authFirstName = $_SESSION['Auth']['User']['first_name'];
		$authLastName = $_SESSION['Auth']['User']['last_name'];
		//echo $id;
	}
?>



<!-- Breadcrumb section -->
<div class="site-breadcrumb">
	<div class="container"> <a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i> <span>Course List</span> </div>
</div>
<!-- Breadcrumb section end -->

<section id="inner-headline-gallery" class="about-page">
	<div class="carousel-text" align="center">
		<h1>Course <strong>List</strong></h1>
	</div>
</section>
<div class="container" id="book_now">
	<div class="col-sm-12">
		<div class="row right-side">
			
			
					<div class="right-sides">
						<h2>Filter these courses by date range, course name or location</h2>
						<?php echo $this->Form->create('Course', array('controller' => 'courses', 'action' => 'booknow','type' => 'get', 'id' => 'search_course')); ?>
						<div class="row">
							<div class="col-sm-3">
								<div class="calender">
									<input type="text" autocomplete="off" class="form-control testdate" data-toggle="datepicker" name="start_date" value="<?php if(!empty($getvalue['start_date'])) { echo ($getvalue['start_date']); } else { echo ""; } ?>" id="search" placeholder="Course Date">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</div>
							</div>
							<!--<div class="col-sm-3">
								<div class="calender">
									<input type="text" autocomplete="off" class="form-control testdate" data-toggle="datepicker"  name="end_date" value="<?php //if(!empty($getvalue['end_date'])) { echo ($getvalue['end_date']); } else { echo ""; } ?>"  placeholder="End Date">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</div>
							</div>-->
							<div class="col-sm-3">
								<Select type="text" class="form-control" name="id">
									<option value="">Course</option>
									<?php foreach($course as $result) { ?>
									<option value="<?php echo $result['Course']['id']; ?>"><?php echo $result['Course']['course_name']; ?></option>
									<?php } ?>
								</Select>
							</div>
							<div class="col-sm-3">
								<Select type="text" class="form-control" name="location_id">
									<option value="">Location</option>
									<?php foreach($location as $result) { ?>
									<option value="<?php echo $result['Location']['id']; ?>"><?php echo $result['Location']['location']; ?></option>
									<?php } ?>
								</Select>
							</div>
							<div class="col-sm-3">
								<input type="submit" class="btn btn-success" value="Filter">
							</div>
						
						</div>
						<?php echo $this->form->end(); ?>
					</div>
					
					<!-- filter course -->
					<div class="table-responsive">
					<div id="filter_table">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Course</th>
								<th>Duration</th>
								<th>Location</th>
								<th>No. of Delegates<br>per Session</th>
								<th>Price Per Delegates<br>excl VAT</th>
								<th>Expiry<br>Competence </th>
								<th>Course Date</th>
								<th>Start Time</th>
								<th>End Time</th>
								<th>Book Now</th>
								<th>Instruction</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($list as $result) { ?>
							<tr>
								<td><?php echo $result['Course']['course_name']; ?></td>
								<td><?php echo $result['Course']['duration']; ?></td>
								<td><?php echo $result['Location']['location']; ?></td>
								<td><?php echo $result['Course']['delegates_no']; ?></br><div style="color:#449ac6;font-size:13px;"><?php $count1 = $result['Course']['delegates_no'] - sizeof($result['TransactionLog']); 
								if($count1==1){
						echo "1 Space left.";
					}else{
						if($count1>0){
							echo $count1 ." Spaces left";
						}else{
							echo "No space";
						}
					}
					// if($authId == true) { 
     //         if($_SESSION['Auth']['User']['user_type']=="User"){
     //          if($count1==1){
     //        echo "1 Space left.";
     //      }else{
     //        if($count1>0){
     //          echo $count1 ." Spaces left";
     //        }else{
     //          echo "No space";
     //        }
     //      }
     //    }
     //    if($_SESSION['Auth']['User']['user_type']=="Company"){
     //        if($count1==4){
     //        echo "1 Space left.";
     //      }else{
     //        if($count1>=4){
     //          echo $count1 ." Spaces left";
     //        }else{
     //          echo "No space";
     //        }
     //      }
     //    }
     //  }
					?>
						
					</div></td>
								<td><span>&#163;</span> <?php echo $result['Course']['delegate_price']; ?></td>
								<td><?php echo $result['Course']['expiry']; ?></td>
								<?php 
								if($result['Sector']['id'] == "1"){
								if($authId == true) { ?>
					<?php if($_SESSION['Auth']['User']['user_type']=="User"){?>
          <td><?php $date =explode( ',',$result['Course']['start_date']);?>
					<Select type="text" class="form-control" id="<?php echo $result['Course']['id']; ?>" style="width:130px;font-size: 14px;" onChange="ingdatefunction(this);">
                  <option value="">Course Date</option>
                  <?php foreach($date as $raw) { ?>
                  <option value="<?php echo $raw; ?>"><?php echo $raw; ?></option>
                  <?php } ?>
                </Select>
              </td>
              <?php }?>
					          <?php if($_SESSION['Auth']['User']['user_type']=="Company"){?>
								<td><?php $date =explode( ',',$result['Course']['start_date']);?>
                <Select type="text" class="form-control" id="<?php echo $result['Course']['id']; ?>" style="width:130px;font-size: 14px;" onChange="datefunction(this);">
                  <option value="">Course Date</option>
                  <?php foreach($date as $raw) { ?>
                  <option value="<?php echo $raw; ?>"><?php echo $raw; ?></option>
                  <?php } ?>
                </Select></td>
							   <?php }?>
					
          <?php } else{ ?>
					<td><?php $date =explode( ',',$result['Course']['start_date']);?>

			<Select type="text" class="form-control" id="<?php echo $result['Course']['id']; ?>" style="width:130px;font-size: 14px;" onChange="datefunction(this);">
                  <option value="">Course Date</option>
                  <?php foreach($date as $raw) { ?>
                  <option value="<?php echo $raw; ?>"><?php echo $raw; ?></option>
                  <?php } ?>
                </Select>

					<!-- <Select type="text" class="form-control" id="<?php// echo $result['Course']['id']; ?>" style="width:130px;font-size: 14px;" data-toggle="modal" data-target="#myModal">
					<option disabled="disabled" selected="selected" style="display:none">Course Date</option>
                </Select> -->
                	
                </td>
					<?php }
					}else {?>
					<?php if($authId == true) { ?>
					<?php if($_SESSION['Auth']['User']['user_type']=="User"){?>
          <td><?php $date =explode( ',',$result['Course']['start_date']);?>
					<Select type="text" class="form-control" id="<?php echo $result['Course']['id']; ?>" style="width:130px;font-size: 14px;" onChange="ingdatefunction1(this);">
                  <option value="">Course Date</option>
                  <?php foreach($date as $raw) { ?>
                  <option value="<?php echo $raw; ?>"><?php echo $raw; ?></option>
                  <?php } ?>
                </Select>
              </td>
              <?php }?>
					          <?php if($_SESSION['Auth']['User']['user_type']=="Company"){?>
								<td><?php $date =explode( ',',$result['Course']['start_date']);?>
                <Select type="text" class="form-control" id="<?php echo $result['Course']['id']; ?>" style="width:130px;font-size: 14px;" onChange="datefunction1(this);">
                  <option value="">Course Date</option>
                  <?php foreach($date as $raw) { ?>
                  <option value="<?php echo $raw; ?>"><?php echo $raw; ?></option>
                  <?php } ?>
                </Select></td>
							   <?php }?>
					
          <?php } else{ ?>
					<td><?php $date =explode( ',',$result['Course']['start_date']);?>
					<Select type="text" class="form-control" id="<?php echo $result['Course']['id']; ?>" style="width:130px;font-size: 14px;"  data-toggle="modal" data-target="#myModal">
					<option disabled="disabled" selected="selected" style="display:none">Course Date</option>
                </Select></td>
					<?php }
					}?>
				<td id="dp<?php echo $result['Course']['id']; ?>"><?php //echo $value['Course']['start_time']; ?></td>  
          <td style="display:none;">
							<?php for($i=0;$i<=20;$i++){ ?>
							<input type="hidden" id="<?php $time =explode( ',',$result['Course']['start_date']); print_r($time[$i]);?>" Value="<?php $time =explode( ',',$result['Course']['start_time']); print_r($time[$i]);?> ">
							<?php } ?>
							</td>
              <td id="dpQ<?php echo $result['Course']['id']; ?>"><?php //echo $value['Course']['end_time']; ?></td>
							<td style="display:none;">
							<?php for($i=0;$i<=20;$i++){ ?>
							<input type="hidden" id="<?php $times=explode( ',',$result['Course']['start_date']); print_r($times[$i]);?>p" Value="<?php $times =explode( ',',$result['Course']['end_time']); print_r($times[$i]);?> ">
							<?php } ?>
							</td>  	
							<?php
							if($result['Sector']['id'] == "1"){ ?>
							<?php if($authId == true) { ?>
					<?php if($_SESSION['Auth']['User']['user_type']=="User"){?>
					<td>
						<?php if($count1<=0){ ?>
						<button class="btn btn-success pading-button" data-toggle="modal" data-target="#Indivitualrail<?php echo $result['Course']['id']; ?>"  disabled>No Space</button>
						<?php }else{ ?>
							<button class="btn btn-success pading-button" data-toggle="modal" data-target="#Indivitualrail<?php echo $result['Course']['id']; ?>" id="ings1<?php echo $result['Course']['id']; ?>" disabled>Select Date</button>
						<?php } ?>
					</td>
					<?php }?>
					<?php if($_SESSION['Auth']['User']['user_type']=="Company"){?>
					<td>
						<?php if($count1<=0){ ?>
						<button class="btn btn-success pading-button" data-toggle="modal" data-target="#orgnisationrail<?php echo $result['Course']['id']; ?>"  disabled>No Space</button>
					<?php }else{ ?>
						<button class="btn btn-success pading-button" data-toggle="modal" data-target="#orgnisationrail<?php echo $result['Course']['id']; ?>" id="orgs1<?php echo $result['Course']['id']; ?>" disabled>Select Date</button>
							<?php } ?>
					</td>
					<?php }?>
					<?php } else{ ?>
					<td><button class="btn btn-success" data-toggle="modal" data-target="#myModal">Book Now</button>
					
					</td>
					
					<?php } ?>
					<?php }else{?>
					<?php if($authId == true) { ?>
								<?php if($_SESSION['Auth']['User']['user_type']=="User"){?>
								<td>
									<?php if($count1<=0){ ?>
									<button class="btn btn-success pading-button" data-toggle="modal" data-target="#Indivitualnonrail<?php echo $result['Course']['id']; ?>"  disabled>No Space</button>
									<?php }else{ ?>
									<button class="btn btn-success pading-button" data-toggle="modal" data-target="#Indivitualnonrail<?php echo $result['Course']['id']; ?>" id="ing1<?php echo $result['Course']['id']; ?>" disabled>Select Date</button>
									<?php } ?>
								</td>
								<?php }?>
								<?php if($_SESSION['Auth']['User']['user_type']=="Company"){?>
								<td>
									<?php if($count1<=0){ ?>
									<button class="btn btn-success pading-button" data-toggle="modal"  data-target="#orgnisationnonrail<?php echo $result['Course']['id']; ?>" disabled>No Space</button>
									<?php }else{ ?>
									<button class="btn btn-success pading-button" data-toggle="modal" id="org1<?php echo $result['Course']['id']; ?>" data-target="#orgnisationnonrail<?php echo $result['Course']['id']; ?>" disabled>Select Date</button>
									<?php } ?>
								</td>
								<?php }?>
								<?php } else{ ?>
								<td><button class="btn btn-success" data-toggle="modal" data-target="#myModal">Book Now</button></td>
								
								<?php } ?>
								<?php } ?>
							<td><?php if(!empty($result['Course']['pre_requisite'])){ ?>
					<a class="btn btn-success pading-button" href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'prerequisite',$result['Course']['id']));?>">Pre-Requisite</a>
					<?php } else { ?>
					<a class="btn btn-success pading-button"  style="display:none;" href="#">Pre-Requisite</a>
					<?php } ?>
					</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<?php if($count > 5) { ?>
				<div class="text-center">
					<ul class="pagination text-center">
						<?= $this->Paginator->prev('< ' . __('previous')) ?>
						<?= $this->Paginator->numbers() ?>
						<?= $this->Paginator->next(__('next') . ' >') ?> 
					</ul>
				</div>
				<?php } ?>
					</div>
					</div>
				</div>
			</div>
		</div>
		<div style="display:none">
    <input type="hidden" id="Blank" value="011">
    <p id="dp011"></p>
    <p id="dpQ011"></p>
    <button id="org1011"></button>
    <button id="ing1011"></button>
    <select id="011">
      <option></option>
    </select></div>


<script type="text/javascript">
function datefunction(obj){
	var i = obj.id;
var j = obj.value;
var p = j.trim(); // trim to condition Check in value
var datearray = p.split("/");
var q = datearray[1] + '/' + datearray[0] + '/' + datearray[2];
var getid = document.getElementById("Blank").value;
if (document.getElementById(i).value == '') {
    document.getElementById("org1" + i).disabled = true;
    document.getElementById("org1" + i).innerHTML = "Select Date";
    document.getElementById("dp" + i).innerHTML = " ";
    document.getElementById("dpQ" + i).innerHTML = " ";
} else if (p == days1 || p == days2 || p == samedays) {
    document.getElementById("alertshowmsg").innerHTML = "Last booking for online booking should be no later than 48 hours of the start date";
    document.getElementById("alertMsgs").style.display = "block";
    document.getElementById("org1" + i).disabled = true;
    document.getElementById("org1" + i).innerHTML = "Select Date";
    document.getElementById("dp" + i).innerHTML = " ";
    document.getElementById("dpQ" + i).innerHTML = " ";
} else if (new Date() > new Date(q)) {
    document.getElementById("alertshowmsg").innerHTML = "This course expired. Please choose another course or check the next date course.";
    document.getElementById("alertMsgs").style.display = "block";
    document.getElementById("ing1" + i).disabled = true;
    document.getElementById("ing1" + i).innerHTML = "Select Date";
    document.getElementById("dp" + i).innerHTML = " ";
    document.getElementById("dpQ" + i).innerHTML = " ";
} else {
  //Disabled previous button
    if (getid != i) {
        document.getElementById("org1" + getid).disabled = true;
        document.getElementById("org1" + getid).innerHTML = "Select Date";
        document.getElementById("dp" + getid).innerHTML = " ";
        document.getElementById("dpQ" + getid).innerHTML = " ";
        document.getElementById(getid).value = "";
    }
    var a = document.getElementById(j).value;
    var b = document.getElementById(j+"p").value;
    document.getElementById("dp" + i).innerHTML = a;
    document.getElementById("dpQ" + i).innerHTML = b;
    document.getElementById("sorg" + i).value = a;
    document.getElementById("eorg" + i).value = b;
    document.getElementById("date" + i).value = j;
    document.getElementById("org" + i).value = j;
    document.getElementById("orgs1" + i).disabled = false;
    document.getElementById("orgs1" + i).innerHTML = "Book Now";
    document.getElementById("Blank").value = i;
}
}
</script>
<script type="text/javascript">
function ingdatefunction(obj){
	var i = obj.id;
var j = obj.value;
var p = j.trim(); // trim to condition Check in value
var datearray = p.split("/");
var q = datearray[1] + '/' + datearray[0] + '/' + datearray[2];
var getid = document.getElementById("Blank").value;
if (document.getElementById(i).value == '') {
    document.getElementById("org1" + i).disabled = true;
    document.getElementById("org1" + i).innerHTML = "Select Date";
    document.getElementById("dp" + i).innerHTML = " ";
    document.getElementById("dpQ" + i).innerHTML = " ";
} else if (p == days1 || p == days2 || p == samedays) {
    document.getElementById("alertshowmsg").innerHTML = "Last booking for online booking should be no later than 48 hours of the start date";
    document.getElementById("alertMsgs").style.display = "block";
    document.getElementById("org1" + i).disabled = true;
    document.getElementById("org1" + i).innerHTML = "Select Date";
    document.getElementById("dp" + i).innerHTML = " ";
    document.getElementById("dpQ" + i).innerHTML = " ";
} else if (new Date() > new Date(q)) {
    document.getElementById("alertshowmsg").innerHTML = "This course expired. Please choose another course or check the next date course.";
    document.getElementById("alertMsgs").style.display = "block";
    document.getElementById("ing1" + i).disabled = true;
    document.getElementById("ing1" + i).innerHTML = "Select Date";
    document.getElementById("dp" + i).innerHTML = " ";
    document.getElementById("dpQ" + i).innerHTML = " ";
} else {
  //Disabled previous button
    if (getid != i) {
        document.getElementById("org1" + getid).disabled = true;
        document.getElementById("org1" + getid).innerHTML = "Select Date";
        document.getElementById("dp" + getid).innerHTML = " ";
        document.getElementById("dpQ" + getid).innerHTML = " ";
        document.getElementById(getid).value = "";
    }
    var a = document.getElementById(j).value;
    var b = document.getElementById("p" + j).value;
    document.getElementById("dp" + i).innerHTML = a;
    document.getElementById("dpQ" + i).innerHTML = b;
    document.getElementById("sorg" + i).value = a;
    document.getElementById("eorg" + i).value = b;
    document.getElementById("date" + i).value = j;
    document.getElementById("org" + i).value = j;
    document.getElementById("org1" + i).disabled = false;
    document.getElementById("org1" + i).innerHTML = "Book Now";
    document.getElementById("Blank").value = i;
}
}
</script>
<script type="text/javascript">
function datefunction1(obj){
  var i = obj.id;
    var j = obj.value;
    var p = j.trim();
    var datearray = p.split("/");
    var q = datearray[1] + '/' + datearray[0] + '/' + datearray[2];
    var getid = document.getElementById("Blank").value;
    if (document.getElementById(i).value == '') {
        document.getElementById("org1" + i).disabled = true;
        document.getElementById("org1" + i).innerHTML = "Select Date";
        document.getElementById("dp" + i).innerHTML = " ";
        document.getElementById("dpQ" + i).innerHTML = " ";
    } else if (p == days1 || p == days2 || p == samedays) {
        document.getElementById("alertshowmsg").innerHTML = "Last booking for online booking should be no later than 48 hours of the start date";
        document.getElementById("alertMsgs").style.display = "block";
        document.getElementById("org1" + i).disabled = true;
        document.getElementById("org1" + i).innerHTML = "Select Date";
        document.getElementById("dp" + i).innerHTML = " ";
        document.getElementById("dpQ" + i).innerHTML = " ";
    } else if (new Date() > new Date(q)) {
        document.getElementById("alertshowmsg").innerHTML = "This course expired. Please choose another course or check the next date course.";
        document.getElementById("alertMsgs").style.display = "block";
        document.getElementById("org1" + i).disabled = true;
        document.getElementById("org1" + i).innerHTML = "Select Date";
        document.getElementById("dp" + i).innerHTML = " ";
        document.getElementById("dpQ" + i).innerHTML = " ";
    } else {
        if (getid != i) {
            document.getElementById("org1" + getid).disabled = true;
            document.getElementById("org1" + getid).innerHTML = "Select Date";
            document.getElementById("dp" + getid).innerHTML = " ";
            document.getElementById("dpQ" + getid).innerHTML = " ";
            document.getElementById(getid).value = "";
        }

        var a = document.getElementById(j).value;
        var b = document.getElementById(j + "p").value;
        document.getElementById("dp" + i).innerHTML = a;
        document.getElementById("dpQ" + i).innerHTML = b;
        document.getElementById("stimen" + i).value = a;
        document.getElementById("etimen" + i).value = b;
        document.getElementById("indate" + i).value = j;
        document.getElementById("orgdate" + i).value = j;
        document.getElementById("org1" + i).disabled = false;
        document.getElementById("org1" + i).innerHTML = "Book Now";

        document.getElementById("Blank").value = i;
    }
}
</script><script type="text/javascript">
function ingdatefunction1(obj){
	var i = obj.id;
    var j = obj.value;
    var p = j.trim();
    var datearray = p.split("/");
    var q = datearray[1] + '/' + datearray[0] + '/' + datearray[2];
    var getid = document.getElementById("Blank").value;
    if (document.getElementById(i).value == '') {
        document.getElementById("ing1" + i).disabled = true;
        document.getElementById("ing1" + i).innerHTML = "Select Date";
        document.getElementById("dp" + i).innerHTML = " ";
        document.getElementById("dpQ" + i).innerHTML = " ";
    } else if (p == days1 || p == days2 || p == samedays) {
        document.getElementById("alertshowmsg").innerHTML = "Last booking for online booking should be no later than 48 hours of the start date";
        document.getElementById("alertMsgs").style.display = "block";
        document.getElementById("ing1" + i).disabled = true;
        document.getElementById("ing1" + i).innerHTML = "Select Date";
        document.getElementById("dp" + i).innerHTML = " ";
        document.getElementById("dpQ" + i).innerHTML = " ";
    } else if (new Date() > new Date(q)) {
        document.getElementById("alertshowmsg").innerHTML = "This course expired. Please choose another course or check the next date course.";
        document.getElementById("alertMsgs").style.display = "block";
        document.getElementById("ing1" + i).disabled = true;
        document.getElementById("ing1" + i).innerHTML = "Select Date";
        document.getElementById("dp" + i).innerHTML = " ";
        document.getElementById("dpQ" + i).innerHTML = " ";
    } else {
        if (getid != i) {
            document.getElementById("ing1" + getid).disabled = true;
            document.getElementById("ing1" + getid).innerHTML = "Select Date";
            document.getElementById("dp" + getid).innerHTML = " ";
            document.getElementById("dpQ" + getid).innerHTML = " ";
            document.getElementById(getid).value = "";
        }

        var a = document.getElementById(j).value;
        var b = document.getElementById(j + "p").value;
        document.getElementById("dp" + i).innerHTML = a;
        document.getElementById("dpQ" + i).innerHTML = b;
        document.getElementById("stimen" + i).value = a;
        document.getElementById("etimen" + i).value = b;
        document.getElementById("intime" + i).value = a;
        document.getElementById("entime" + i).value = b;
        document.getElementById("indate" + i).value = j;
        document.getElementById("orgdate" + i).value = j;
        document.getElementById("ing1" + i).disabled = false;
        document.getElementById("ing1" + i).innerHTML = "Book Now";
        document.getElementById("Blank").value = i;
    }
}
</script>