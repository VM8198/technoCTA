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
								<td><?php echo $result['Course']['delegates_no']; ?></td>
								<td><span>&#163;</span> <?php echo $result['Course']['delegate_price']; ?></td>
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
							<?php
							if($result['Sector']['id'] == "1"){ ?>
							<?php if($authId == true) { ?>
					<?php if($_SESSION['Auth']['User']['user_type']=="User"){?>
					<td><button class="btn btn-success pading-button" data-toggle="modal" data-target="#Indivitualrail<?php echo $result['Course']['id']; ?>">Book Now</button></td>
					<?php }?>
					<?php if($_SESSION['Auth']['User']['user_type']=="Company"){?>
					<td><button class="btn btn-success pading-button" data-toggle="modal" data-target="#orgnisationrail<?php echo $result['Course']['id']; ?>">Book Now</button></td>
					<?php }?>
					<?php } else{ ?>
					<td><button class="btn btn-success" data-toggle="modal" data-target="#myModal">Book Now</button>
					
					</td>
					
					<?php } ?>
					<?php }else{?>
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
	

<!--<script>
	function altmsg(){
		alert("Please Login for booking the course");
	}
</script>-->

<!-- <script>
	$(document).ready(function(){
		$(function(){
			$('#from_date').datepicker();
			$('#to_date').datepicker();
		});
		$('#filter').click(function(){
			var from_date = $('#from_date').val();
			var to_date = $('#to_date').val();
			if(from_date != '' && to_date != ''){
				$.ajax({
					dataType: "html",
					evalScripts: true,
					url: "<?php //echo Router::url(array('controller'=>'courses','action'=>'filter'));?>",
					type: "POST",
					data: {from_date: from_date,to_date: to_date},
					success:function(data){
						$('#filter_table').html(data);
					}
				});
			}
			else{
				alert('Please select date');
			}
		});
	});
</script> -->
<script type="text/javascript">
function datefunction(obj)
{
 var i = obj.id;
 var j = obj.value;
 //alert(j);alert("date" + i);
 document.getElementById("date" + i).value = j;
 document.getElementById("org" + i).value = j;
document.getElementById("indate" + i).value = j;
 document.getElementById("orgdate" + i).value = j;
 
}
</script>