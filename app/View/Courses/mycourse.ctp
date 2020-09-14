
<!-- Breadcrumb section -->
<div class="site-breadcrumb">
  <div class="container"> <a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index'));?>"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i> <span>Dashboard</span> </div>
</div>
<div class="container">
<br>
<h3 class="dashbo">
 Dashboard
 
</h3>
<br>
<div class="row">
          <div class="col-md-3">
            <div class="dash-left">
              <ul class="list-group">
				<?php if($_SESSION['Auth']['User']['user_type']=="User"){?>
                <li class="list-group-item "><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'profile'));?>"><i class="fa fa-user"></i> My Profile</a></li>
					<?php }else{?> 
				<li class="list-group-item "><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'companyprofile'));?>"><i class="fa fa-user"></i>  My Profile</a></li>
				<?php } ?>
               <li class="list-group-item active"><a href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'mycourse'));?>"><i class="fa fa-home"></i>Booked Courses</a></li>
              </ul>
            </div>
          </div>
      
        <div class="col-md-9 dash-right">
        <div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="home">
 <table class="table table-striped table-bordered">
  <thead class="">
    <tr>
      <th scope="col">S.No.</th>
	  <th scope="col">Booking Date</th>
	  <th scope="col">Order ID</th>
      <th scope="col">Course Name</th>
      <th scope="col">Payment Status</th>
    </tr>
  </thead>
  <tbody>
   <?php $i=1; foreach($course as $result) { ?>
    <tr>
      <td><?php echo $i; ?></td>
	  <td><?php echo date('d-m-Y',strtotime($result['TransactionLog']['transaction_datetime_txt']));?></td>
	  <td><?php echo $result['TransactionLog']['order_id'];?></td>
	  <td><?php echo $result['Course']['course_name']; ?></td>
      <td><?php if($result['TransactionLog']['status']=="Declined"){echo "Pending"; }else{ echo $result['TransactionLog']['status'];}?></td>
    </tr>
	<?php $i++; } ?>
  </tbody>
</table>
      </div>
      </div>
      </div>
      </div>
</div>
<style>
.table td, .table th{
  font-size:14px;
}
   </style>