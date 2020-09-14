
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
				<li class="list-group-item active"><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'companyprofile'));?>"><i class="fa fa-user"></i> My Profile</a></li>
               <li class="list-group-item"><a href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'mycourse'));?>"><i class="fa fa-home"></i>Booked Courses</a></li>
              </ul>
            </div>
          </div>
        <div class="col-md-9">
        	<div class="dash-right">
<div> 

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
<li role="presentation" class=" nav-item"><a class="nav-link active" href="#home" aria-controls="home" role="tab" data-toggle="tab">My Details</a></li>
<li role="presentation" class="nav-item"><a class="nav-link " href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Change Password</a></li>
</ul>

<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="home">
		<?php echo $this->Form->create('User', array('controller'=>'users','action'=>'companyprofile', 'id' =>'comapanyprofile')); ?>
			 <div class="row">
				  <div class="col-lg-6">
                     <label class="form-text detail">Company Name</label>
                     <input type="text" class="form-control" name="data[User][company]" placeholder="Company Name" value="<?php echo $user['User']['company']; ?>">
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text detail">Company Position</label>
                     <input type="text" class="form-control" name="data[User][company_position]" placeholder="Company Position" value="<?php echo $user['User']['company_position']; ?>">
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text detail">First Name</label>
                     <input type="text" class="form-control" name="data[User][first_name]" placeholder="First Name" value="<?php echo $user['User']['first_name']; ?>">
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text detail">Last Name</label>
                     <input type="text" class="form-control" name="data[User][last_name]" placeholder="Last Name"  value="<?php echo $user['User']['last_name']; ?>">
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text detail">Mobile Number</label>
                     <input type="tel" class="form-control" name="data[User][phone]" placeholder="Mobile Number"  value="<?php echo $user['User']['phone']; ?>">
                  </div>
                  <div class="col-lg-12">
                     <div class="text-center">
                        <button class="btn btn-default" type="Signup">Update Profile</button>
                     </div>
                  </div>
               </div>
		<?php echo $this->form->end(); ?>
		</div>
	<div role="tabpanel" class="tab-pane" id="profile">
		 <?php echo $this->Form->create("User", array("controller"=>'users',"action"=>'changepassword',"id" => "passid",'class' => 'form-horizontal','autocomplete'=>'off')); ?>
		<div class="form-group">
			<label for="">Current password</label>
			<input type="password" class="form-control" name="data[User][old_password]" id="" placeholder="">
		</div>
		<div class="form-group">
			<label for="">New password</label>
			<input type="password" class="form-control" name="data[User][new_password]" id="inputEmail" placeholder="">
		</div>
		<div class="form-group">
			<label for="">Confirm new password</label>
			<input type="password" class="form-control" name="data[User][confirm_password]" id="" placeholder="">
		</div>
		
			<div class="text-center"><button type="submit" class="btn btn-default">Change Password</button></div>
		<?php echo $this->form->end(); ?>
	</div>
	</div>
	</div>
	</div>
	</div>
    </div>
   </div>
</div>
