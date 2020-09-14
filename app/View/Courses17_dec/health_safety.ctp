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
  <div class="container"> <a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index'));?>"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i> <span>Health & Safety</span> </div>
</div>
<!-- Breadcrumb section end -->

<section id="inner-headline-gallery" class="safety-page">
  <div class="carousel-text" align="center">
    <h1>Health & Safety <strong>/ First Aid</strong></h1>
  </div>
</section>
<div class="container" id="book_now">
  <div class="col-sm-12">
    <div class="row right-side">
     
   
          <div class="right-sides">
            <h2>Filter these courses by date range, course name or location</h2>
            <?php echo $this->Form->create('Course', array('controller' => 'courses', 'action' => 'health_safety','type' => 'get', 'id' => 'search_course')); ?>
            <div class="row">
              <div class="col-sm-3">
                <div class="calender">
                  <input type="text" autocomplete="off" class="form-control testdate" data-toggle="datepicker" name="start_date" value="<?php if(!empty($getvalue['start_date'])) { echo ($getvalue['start_date']); } else { echo ""; } ?>" id="search" placeholder="Course Date">
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                </div>
              </div>
              <!--<div class="col-sm-3">
                <div class="calender">
                  <input type="text" autocomplete="off" class="form-control testdate" data-toggle="datepicker"  name="end_date" value="<?php// if(!empty($getvalue['end_date'])) { echo ($getvalue['end_date']); } else { echo ""; } ?>"  placeholder="End Date">
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
                <th>No. of Delegates<br>
                  per Session</th>
                <th>Price Per Delegates<br>
                  excl VAT</th>
                <th>Expiry<br>
                  Competence </th>
                <th>Course Date</th>
                <th>Start Time</th>
				<th>End Time</th>
                <th>Book Now</th>
				<th>Instruction</th>
              </tr>
            </thead>
            <tbody>
            	<?php $i=1; foreach($list as $result) { ?>
              	<tr>
					<td><?php echo $result['Course']['course_name']; ?></td>
					<td><?php echo $result['Course']['duration']; ?></td>
					<td><?php echo $result['Location']['location']; ?></td>
					<td><?php echo $result['Course']['delegates_no']; ?></td>
					<td><span>&#163;</span><?php echo $result['Course']['delegate_price']; ?></td>
					<td><?php echo $result['Course']['expiry']; ?></td>
					<td><?php $date =explode( ',',$result['Course']['start_date']);?>
					<Select type="text" class="form-control" id="<?php echo $result['Course']['id']; ?>" style="width:130px;font-size: 14px;" onChange="datefunction(this);">
                  <option value="">Course Date</option>
                  <?php foreach($date as $raw) { ?>
                  <option value="<?php echo $raw; ?>"><?php echo $raw; ?></option>
                  <?php } ?>
                </Select></td>
					<td><?php echo $result['Course']['start_time']; ?></td>
					<td><?php echo $result['Course']['end_time']; ?></td>	             
					<?php if($authId == true) { ?>
					<?php if($_SESSION['Auth']['User']['user_type']=="User"){?>
					<td><button class="btn btn-success pading-button" data-toggle="modal" data-target="#Indivitualnonrail<?php echo $result['Course']['id']; ?>">Book Now</button></td>
					<?php }?>
					<?php if($_SESSION['Auth']['User']['user_type']=="Company"){?>
					<td><button class="btn btn-success pading-button" data-toggle="modal" data-target="#orgnisationnonrail<?php echo $result['Course']['id']; ?>">Book Now</button></td>
					<?php }?>
					<?php } else{ ?>
					<td><button class="btn btn-success" data-toggle="modal" data-target="#myModal">Book Now</button></td>
					<?php } ?>
					<td><?php if(!empty($result['Course']['pre_requisite'])){ ?>
					<a class="btn btn-success pading-button" href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'prerequisite',$result['Course']['id']));?>">Pre-Requisite</a>
					<?php } else { ?>
					<a class="btn btn-success pading-button"  style="display:none;" href="#">Pre-Requisite</a>
					<?php } ?>
					</td>
              	</tr>
              	<?php $i++;} ?>    
            </tbody>
          </table>
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

<!--<script>
	function altmsg(){
		alert("Please Login for booking the course");
	}
</script>-->
<!-- About section end
<script>
    function getnewevent() {
        var sectorId = '5';
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
</script>-->
<script type="text/javascript">
function datefunction(obj)
{
 var i = obj.id;
 var j = obj.value;
 //alert(j);alert("date" + i);
 document.getElementById("indate" + i).value = j;
 document.getElementById("orgdate" + i).value = j;
}
</script>