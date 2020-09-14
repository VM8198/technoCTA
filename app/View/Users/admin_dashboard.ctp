
 
<div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $course; ?></h3>

              <p>Courses</p>
            </div>
            <div class="icon">
              <i class="fa fa-list-ul"></i>
            </div>
            <a href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'admin_courseList'));?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $bookcount; ?></h3>

              <p>Booking</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo $this->html->url(array('controller' => 'bookings', 'action' => 'admin_bookingList'));?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $count; ?></h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo $this->html->url(array('controller' => 'Users', 'action' => 'admin_userListing'));?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
	  <br/>
	  <div class="box">
		  <h3 class="box-title">User Listing</h3>
		  <table class="table table-striped table-bordered">
		  <thead>
			<tr>
				<th>Name</td>
				<th>Email</td>
				<th>Phone Number</td>
				<th>Gender</td>
			</tr>
			</thead>
			<tbody>
			    <?php foreach($user as $result) { ?>
				<tr>
					<td><?php echo $result['User']['first_name']," " , $result['User']['last_name']; ?></td>
					<td><?php echo $result['User']['email_id']; ?></td>
					<td><?php echo $result['User']['phone']; ?></td>
					<td><?php echo $result['User']['gender'];?></td>
				</tr>
				   <?php } ?>
			</tbody>
		  </table>
		  <div align="right" style="margin-bottom:10px;">
		  <a href="<?php echo $this->html->url(array('controller' => 'Users', 'action' => 'admin_userListing'));?>" class="btn green">More Info <i class="fa fa-arrow-circle-right"></i></a></div>
		</div>	  
		<br/>
			  <div class="box">
		  <h3 class="box-title">Company Listing</h3>
		  <table class="table table-striped table-bordered">
		  <thead>
			<tr>
				<th>Name</td>
				<th>Company Name</td>
				<th>Email</td>
				<th>Phone Number</td>
			</tr>
			</thead>
			<tbody>
			    <?php foreach($user1 as $result) { ?>
				<tr>
					<td><?php echo $result['User']['first_name']," " , $result['User']['last_name']; ?></td>
					<td><?php echo $result['User']['company'];?></td>
					<td><?php echo $result['User']['email_id']; ?></td>
					<td><?php echo $result['User']['phone']; ?></td>
					
				</tr>
				   <?php } ?>
			</tbody>
		  </table>
		  <div align="right" style="margin-bottom:10px;">
		  <a href="<?php echo $this->html->url(array('controller' => 'Users', 'action' => 'admin_companyListing'));?>" class="btn green">More Info <i class="fa fa-arrow-circle-right"></i></a></div>
		</div>
		<br/>
		 <div class="box">
		  <h3 class="box-title">Course Listing</h3>
		  <table class="table table-striped table-bordered">
		  <thead>
			<tr>
				<th>Sector Name</th>
				<th>Course Name</th>
				<th>Duration</th>
				<th>Start Date</th>
				<th>Start Time</th>
				<th>End Time</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($courseList as $result) { ?>
				<tr>
					<td><?php echo $result['Sector']['sector_name'];?></td>
					<td><?php echo $result['Course']['course_name'];?></td>
					<td><?php echo $result['Course']['duration'];?></td>
					<td><?php echo $result['Course']['start_date'];?></td>
					<td><?php echo $result['Course']['start_time'];?></td>
					<td><?php echo $result['Course']['end_time'];?></td>
				</tr>
				 <?php } ?>
			</tbody>
		  </table>
		   <div align="right" style="margin-bottom:10px;">
		  <a href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'admin_courseList'));?>" class="btn green">More Info <i class="fa fa-arrow-circle-right"></i></a></div>
		</div>	  
		<br/>
		 <div class="box">
		  <h3 class="box-title">Booking Listing</h3>
		  <table class="table table-striped table-bordered">
		  <thead>
			<tr>
				<th>Booking Date</th>
				<th>Status</th>
				<th>Course Name</th>
				<th>Booked By</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($booking as $result) { ?>
				<tr>
					<td><?php echo date('d-m-Y',strtotime($result['TransactionLog']['transaction_datetime_txt']));?></td>
					<td><?php echo $result['TransactionLog']['status'];?></td>
					<td><?php echo $result['Course']['course_name'];?></td>
					<td><?php echo $result['User']['first_name'] ," " , $result['User']['last_name'];?></td>
				</tr>
				 <?php } ?>
			</tbody>
		  </table>
		   <div align="right" style="margin-bottom:10px;">
		  <a href="<?php echo $this->html->url(array('controller' => 'bookings', 'action' => 'admin_bookingList'));?>" class="btn green">More Info <i class="fa fa-arrow-circle-right"></i></a></div>
		</div>	
