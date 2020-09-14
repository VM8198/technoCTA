<?php echo $this->Html->script('jquery.min.js');?>
<script>
    var SITEPATH = '<?php echo SITEPATH; ?>';
    //alert(SITEPATH);
</script>
<?php $site = SITEPATH; 
//echo $site; ?>
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
  <div class="container"> <a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index'));?>"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i> <span>Railway Safety</span> </div>
</div>
<!-- Breadcrumb section end -->

<section id="inner-headline-gallery" class="railway-page">
  <div class="carousel-text" align="center">
    <h1>Railway <strong>Safety</strong></h1>
  </div>
</section>
<div class="container" id="book_now">
  <div class="col-sm-12">
    <div class="row right-side"  id="newdataId">
     <!-- <div class="col-sm-2 pading-0">
        <div class="left-side">
           <button class="accordion" id="getpredata" name ="getpredata" onclick="getnewdata();" data-toggle="modal" data-target="#requiste" >Pre-Requisite</button>
        
          <button class="accordion" id="sectorId" name="sectorId"  data-toggle="modal" data-target="#upcoming"> Upcoming Courses</button>
         </div>
      </div>-->
  
          <div class="right-sides">
            <h2>Filter these courses by date range, course name or location</h2>
            <?php echo $this->Form->create('Course', array('controller' => 'courses', 'action' => 'railway_safety','type' => 'get', 'id' => 'search_course')); ?>
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
          <div class="table-responsive" id="coursename">
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
            <tbody id="newCourse">
            	<?php $i=1; foreach($list as $value) { ?>
              	<tr>
					<td><?php echo $value['Course']['course_name']; ?></td>
					<td><?php echo $value['Course']['duration']; ?></td>
					<td><?php echo $value['Location']['location']; ?></td>
					<td><?php echo $value['Course']['delegates_no']; ?></td>
					<td><span>&#163;</span><?php echo $value['Course']['delegate_price']; ?></td>
					<td><?php echo $value['Course']['expiry']; ?></td>

          <?php if($authId == true) { ?>
					<?php if($_SESSION['Auth']['User']['user_type']=="User"){?>
            <td><?php $date =explode( ',',$value['Course']['start_date']);?>
					<Select type="text" class="form-control" id="<?php echo $value['Course']['id']; ?>" style="width:130px;font-size: 14px;" onChange="ingdatefunction(this);">
                  <option value="">Course Date</option>
                  <?php foreach($date as $result) { ?>
                  <option value="<?php echo $result; ?>"><?php echo $result; ?></option>
                  <?php } ?>
                </Select></td>
					<?php }?>
					<?php if($_SESSION['Auth']['User']['user_type']=="Company"){?>
            <td><?php $date =explode( ',',$value['Course']['start_date']);?>
					<Select type="text" class="form-control" id="<?php echo $value['Course']['id']; ?>" style="width:130px;font-size: 14px;" onChange="datefunction(this);">
                  <option value="">Course Date</option>
                  <?php foreach($date as $result) { ?>
                  <option value="<?php echo $result; ?>"><?php echo $result; ?></option>
                  <?php } ?>
                </Select></td>
					<?php }?>
					
					<?php } ?>
					<td><?php $start_time =explode( ',',$value['Course']['start_time']);?></td>
					 <?php foreach($start_time as $start_time1) { ?>
					 <input type="hidden" value="<?php echo $start_time1; ?>">
                
                  <?php } ?>
					<td><?php// echo $value['Course']['start_time']; ?></td>               
					<td><?php echo $value['Course']['end_time']; ?></td>
					<?php if($authId == true) { ?>
					<?php if($_SESSION['Auth']['User']['user_type']=="User"){?>
					<td><button class="btn btn-success pading-button" data-toggle="modal" data-target="#Indivitualrail<?php echo $value['Course']['id']; ?>" id="ing1<?php echo $value['Course']['id']; ?>" disabled="">Select Date</button></td>
					<?php }?>
					<?php if($_SESSION['Auth']['User']['user_type']=="Company"){?>
					<td><button class="btn btn-success pading-button" data-toggle="modal" data-target="#orgnisationrail<?php echo $value['Course']['id']; ?>" id="org1<?php echo $value['Course']['id']; ?>" disabled="">Select Date</button></td>
					<?php }?>
					
					<?php } else{ ?>
					<td><button class="btn btn-success" data-toggle="modal" data-target="#myModal">Book Now</button>
					
					</td>
					<?php } ?>
					<td><?php if(!empty($value['Course']['pre_requisite'])){ ?>
					<a class="btn btn-success pading-button" href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'prerequisite',$value['Course']['id']));?>">Pre-Requisite</a>
					<?php } else { ?>
					<a class="btn btn-success pading-button"  style="display:none;" href="#">Pre-Requisite</a>
					<?php } ?>
					</td>
					
              	</tr>
              <?php $i++;} ?>    
            </tbody>
          </table>
		  
			<!--<ul class="pagination">
				<?php
				 //echo ($this->Paginator->hasPrev()) ? $this->Paginator->prev('«', array('tag' => 'li'), null, null) : '<li class="disabled"><a href="#">«</a></li>';
				 //echo $this->Paginator->numbers(array('separator' => false, 'tag' => 'li'));   
				 //echo ($this->Paginator->hasNext()) ? $this->Paginator->next('»', array('tag' => 'li'), null, null) : '<li class="disabled"><a href="#">»</a></li>';
			   ?>
			</ul>-->
				<?php if($count > 10) { ?>
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

<!-- <script>
	function altmsg(){
		alert("Please Login for booking the course");
	}
</script>-->
<!-- About section end-->
<!-- <script>
    function getnewevent() {
        var sectorId = '1';
        //var sectorId = $('#sectorId').val();
        //alert(sectorId);
        $.ajax({
            url: SITEPATH + "courses/getnewcourseajax",
            data: {
                sectorId: sectorId,
            },
            type: "POST",
            success: function (result) {
                $("#coursename").empty().append(result);
            }
        });
    }
</script> 
<script>
    function getnewdata() {
		var getpredata = $('#getpredata').val();
        $.ajax({
            url: SITEPATH + "courses/getnewdataajax",
            data: {
                getpredata: getpredata,
            },
            type: "POST",
            success: function (result) {
                $("#newdataId").empty().append(result);
            }
        });
    }
</script>-->
<script type="text/javascript">
function datefunction(obj){
 var i = obj.id;
 var j = obj.value;
 document.getElementById("date" + i).value = j;
 document.getElementById("org" + i).value = j;

 if(document.getElementById(i).value ==''){
  document.getElementById("org1"+i).disabled = true;
  document.getElementById("org1"+i).innerHTML = "Select Date";
  

 }else{
  document.getElementById("org1"+i).disabled = false;
  document.getElementById("org1"+i).innerHTML = "Book Now";

  

 }
}
</script>
<script type="text/javascript">
function ingdatefunction(obj){
  var i = obj.id;
 var j = obj.value;
  document.getElementById("date" + i).value = j;
 document.getElementById("org" + i).value = j;
 if(document.getElementById(i).value ==''){
  document.getElementById("ing1"+i).disabled = true;
  document.getElementById("ing1"+i).innerHTML = "Select Date";
  
 }else{
  document.getElementById("ing1"+i).disabled = false;
  document.getElementById("ing1"+i).innerHTML = "Book Now";

 }
}
</script>