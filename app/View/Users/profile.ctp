
<!-- Breadcrumb section -->
<div class="site-breadcrumb">
  <div class="container"> <a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index'));?>"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i> <span>Dashboard</span> </div>
</div>
<div class="container">
<br>
<h3  class="dashbo">
Dashboard
 
</h3>
<br>
<div class="row">
          <div class="col-md-3">
            <div class="dash-left">
              <ul class="list-group">
                <li class="list-group-item active"><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'profile'));?>"><i class="fa fa-user"></i> My Profile</a></li>
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
		<?php echo $this->Form->create('User', array('controller'=>'users','action'=>'profile', 'id' =>'updateprofile')); ?>
			 <div class="row">
                  <div class="col-lg-6">
                     <label class="form-text detail">First Name</label>
                     <input type="text" class="form-control" name="data[User][first_name]" placeholder="First Name" value="<?php echo $user['User']['first_name']; ?>">
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text detail">Last Name</label>
                     <input type="text" class="form-control" name="data[User][last_name]" placeholder="Last Name" value="<?php echo $user['User']['last_name']; ?>">
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text detail">Mobile Number</label>
                     <input type="tel" class="form-control" name="data[User][phone]" placeholder="Mobile Number" value="<?php echo $user['User']['phone']; ?>">
                  </div>
                  <div class="col-lg-12">
                     <label class="form-text">What is your gender?</label>
                     <p class="form-p">(Please mark appropriate box)</p>
                  </div>
                  <div class="col-lg-6">
                     <label class="gender checkeddesun">Male
                      <?php if($user['User']['gender']=="Male"){ ?>
								   <input type="radio" value="Male" checked="checked" name="data[User][gender]">
								   <?php }else{?>
									   <input type="radio" value="Male" name="data[User][gender]">
								   <?php }?>
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-6">
                     <label class="gender checkeddesun">Female
                     <?php if($user['User']['gender']=="Female"){ ?>
								   <input type="radio" value="Female" checked="checked" name="data[User][gender]">
								   <?php }else{?>
									   <input type="radio" value="Female" name="data[User][gender]">
								   <?php }?>
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-12">
                     <label for="data[User][gender]" class="error"></label>
                  </div>
                  <div class="col-lg-12">
                     <label class="form-text">What is your Marital Status?</label>
                     <p class="form-p">(Please mark appropriate box)</p>
                  </div>
                  <div class="col-lg-3">
                     <label class="gender checkeddesun">Single
					 <?php  if($user['User']['maritalstatus']=="Single"){ ?>
								    <input type="radio" value="Single" checked="checked" name="data[User][maritalstatus]">
								   <?php }else{?>
									    <input type="radio" value="Single" name="data[User][maritalstatus]">
								   <?php }?>
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-3">
                     <label class="gender checkeddesun">Married
					 <?php if($user['User']['maritalstatus']=="Married"){ ?>
								   <input type="radio" value="Married" checked="checked" name="data[User][maritalstatus]">
								   <?php }else{?>
									    <input type="radio" value="Married" name="data[User][maritalstatus]">
								   <?php }?>
                     
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-3">
                     <label class="gender checkeddesun">Civil Partnership
					 <?php if($user['User']['maritalstatus']=="Civil Partnership"){ ?>
								   <input type="radio" value="Civil Partnership" checked="checked" name="data[User][maritalstatus]">
								   <?php }else{?>
									    <input type="radio" value="Civil Partnership" name="data[User][maritalstatus]">
								   <?php }?>
                     
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-3">
                     <label class="gender checkeddesun">Separated/ Divorce
					  <?php if($user['User']['maritalstatus']=="Separated/ Divorce"){ ?>
								   <input type="radio" checked="checked" value="Separated/ Divorce"  name="data[User][maritalstatus]">
								   <?php }else{?>
									    <input type="radio" value="Separated/ Divorce"  name="data[User][maritalstatus]">
								   <?php }?>
                     
                     
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-12">
                     <label for="data[User][maritalstatus]" class="error"></label>
                  </div>
                  <div class="col-lg-12">
                     <label class="form-text">What age Group do you fall in to?</label>
                     <p class="form-p">(Please mark appropriate box)</p>
                  </div>
                  <div class="col-lg-2">
                     <label class="gender checkeddesun">16-24
					 <?php if($user['User']['age']=="16-24"){ ?>
								   <input type="radio" value="16-24" checked="checked" name="data[User][age]">
								   <?php }else{?>
									    <input type="radio" value="16-24"  name="data[User][age]">
								   <?php }?>
                     
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-2">
                     <label class="gender checkeddesun">25-29
					 <?php if($user['User']['age']=="25-29"){ ?>
								   <input type="radio" value="25-29" checked="checked" name="data[User][age]">
								   <?php }else{?>
									    <input type="radio" value="25-29"  name="data[User][age]">
								   <?php }?>
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-2">
                     <label class="gender checkeddesun">30-34
					  <?php if($user['User']['age']=="30-34"){ ?>
								   <input type="radio" value="30-34" checked="checked" name="data[User][age]">
								   <?php }else{?>
									    <input type="radio" value="30-34"  name="data[User][age]">
								   <?php }?>
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-2">
                     <label class="gender checkeddesun">35-39
					   <?php if($user['User']['age']=="35-39"){ ?>
								   <input type="radio" value="35-39" checked="checked" name="data[User][age]">
								   <?php }else{?>
									    <input type="radio" value="35-39"  name="data[User][age]">
								   <?php } ?>
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-2">
                     <label class="gender checkeddesun">40-44
					 <?php if($user['User']['age']=="40-44"){ ?>
								   <input type="radio" value="40-44" checked="checked" name="data[User][age]">
								   <?php }else{?>
									    <input type="radio" value="40-44"  name="data[User][age]">
								   <?php }?>
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-2">
                     <label class="gender checkeddesun">45-49
					 <?php if($user['User']['age']=="45-49"){ ?>
								   <input type="radio" value="45-49" checked="checked" name="data[User][age]">
								   <?php }else{?>
									    <input type="radio" value="45-49"  name="data[User][age]">
								   <?php }?>
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-2">
                     <label class="gender checkeddesun">50-54
					 <?php if($user['User']['age']=="50-54"){ ?>
								   <input type="radio" value="50-54" checked="checked" name="data[User][age]">
								   <?php }else{?>
									    <input type="radio" value="50-54"  name="data[User][age]">
								   <?php } ?>
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-2">
                     <label class="gender checkeddesun">55-59
					 <?php if($user['User']['age']=="55-59"){ ?>
								   <input type="radio" value="55-59" checked="checked" name="data[User][age]">
								   <?php }else{?>
									    <input type="radio" value="55-59"  name="data[User][age]">
								   <?php } ?>
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-2">
                     <label class="gender checkeddesun">60-64
					  <?php if($user['User']['age']=="60-64"){ ?>
								   <input type="radio" value="60-64" checked="checked" name="data[User][age]">
								   <?php }else{?>
									    <input type="radio" value="60-64"  name="data[User][age]">
								   <?php }?>
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-2">
                     <label class="gender checkeddesun">65+
					 <?php if($user['User']['age']=="65+"){ ?>
								   <input type="radio" value="65+" checked="checked" name="data[User][age]">
								   <?php }else{?>
									    <input type="radio" value="65+"  name="data[User][age]">
								   <?php }?>
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-12">
                     <label for="data[User][age]" class="error"></label>
                  </div>
                  <div class="ethnic row">
                     <div class="col-lg-12">
                        <label class="form-text">What is your ethnic group?</label>
                        <p class="form-p">(Please mark appropriate box)</p>
                        <p class=""></p>
                        <div class="hilight-text">
                           <p>
                              <label class="gender checkeddesun whites">White
							  <?php if($user['User']['ethnic']=="White"){ ?>
								   <input type="radio" value="White" checked="checked" name="data[User][ethnic]" onclick="show5();">
								   <?php }else{?>
									    <input type="radio" value="White" name="data[User][ethnic]" onclick="show5();">
								   <?php } ?>
                              
                              <span class="checkmark"></span>
                              </label>
                           </p>
                        </div>
                     </div>
                     <div class="div_none" id="div1">
                        <div class="row " style="margin:0;">
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">English
							  <?php if($user['User']['sub_ethnic']=="English"){ ?>
								   <input type="radio" value="English" checked="checked" name="data[User][sub_ethnic]" >
								   <?php }else{?>
									    <input type="radio" value="English" name="data[User][sub_ethnic]" >
								   <?php }?>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Welsh
							  <?php if($user['User']['sub_ethnic']=="Welsh"){ ?>
								   <input type="radio" value="Welsh" checked="checked" name="data[User][sub_ethnic]" >
								   <?php }else{?>
									    <input type="radio" value="Welsh" name="data[User][sub_ethnic]" >
								   <?php }?>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Scottish
							  <?php if($user['User']['sub_ethnic']=="Scottish"){ ?>
								   <input type="radio" value="Scottish" checked="checked" name="data[User][sub_ethnic]" >
								   <?php }else{?>
									    <input type="radio" value="Scottish" name="data[User][sub_ethnic]" >
								   <?php }?>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">N Lrish
							  <?php if($user['User']['sub_ethnic']=="N Lrish"){ ?>
								   <input type="radio" value="N Lrish" checked="checked" name="data[User][sub_ethnic]" >
								   <?php }else{?>
									    <input type="radio" value="N Lrish" name="data[User][sub_ethnic]" >
								   <?php } ?>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Lrish
							  <?php if($user['User']['sub_ethnic']=="Lrish"){ ?>
								   <input type="radio" value="Lrish" checked="checked" name="data[User][sub_ethnic]" >
								   <?php }else{?>
									    <input type="radio" value="Lrish" name="data[User][sub_ethnic]" >
								   <?php }?>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Lrish Trav
							   <?php if($user['User']['sub_ethnic']=="Lrish Trav"){ ?>
								   <input type="radio" value="Lrish Trav" checked="checked" name="data[User][sub_ethnic]" >
								   <?php }else{?>
									    <input type="radio" value="Lrish Trav" name="data[User][sub_ethnic]" >
								   <?php }?>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Gypsy
							   <?php if($user['User']['sub_ethnic']=="Gypsy"){ ?>
								   <input type="radio" value="Gypsy" checked="checked" name="data[User][sub_ethnic]" >
								   <?php }else{?>
									    <input type="radio" value="Gypsy" name="data[User][sub_ethnic]" >
								   <?php }?>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Other
							  <?php if($user['User']['sub_ethnic']=="Other"){ ?>
								   <input type="radio" value="Other" checked="checked" name="data[User][sub_ethnic]" >
								   <?php }else{?>
									    <input type="radio" value="Other" name="data[User][sub_ethnic]" >
								   <?php }?>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="ethnic row ">
                     <div class="col-lg-12 mixed">
                        <p></p>
                        <div class="hilight-text">
                           <p>
                              <label class="gender checkeddesun">Mixed/Multiple Ethnicity
							  <?php if($user['User']['ethnic']=="Mixed/Multiple Ethnicity"){ ?>
								   <input type="radio" value="Mixed/Multiple Ethnicity" checked="checked" name="data[User][ethnic]" onclick="show2();">
								   <?php }else{?>
									    <input type="radio" value="Mixed/Multiple Ethnicity" name="data[User][ethnic]" onclick="show2();" >
								   <?php }?>
                              <span class="checkmark"></span>
                              </label>
                           </p>
                        </div>
                     </div>
                     <div class="div_none" id="div2">
                        <div class="row " style="margin:0;">
                           <div class="col-lg-3">
                              <label class="gender checkeddesun">W/B Caribbean
							  <?php if($user['User']['sub_ethnic']=="W/B Caribbean"){ ?>
								   <input type="radio" value="W/B Caribbean" checked="checked" name="data[User][sub_ethnic]" >
								   <?php }else{?>
									    <input type="radio" value="W/B Caribbean" name="data[User][sub_ethnic]">
								   <?php }?>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-3">
                              <label class="gender checkeddesun">W/B African
							  <?php if($user['User']['sub_ethnic']=="W/B African"){ ?>
								   <input type="radio" value="W/B African" checked="checked" name="data[User][sub_ethnic]" >
								   <?php }else{?>
									    <input type="radio" value="W/B African" name="data[User][sub_ethnic]">
								   <?php } ?>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-3">
                              <label class="gender checkeddesun">W/ Asian
							   <?php if($user['User']['sub_ethnic']=="W/ Asian"){ ?>
								   <input type="radio" value="W/ Asian" checked="checked" name="data[User][sub_ethnic]" >
								   <?php }else{?>
									    <input type="radio" value="W/ Asian" name="data[User][sub_ethnic]">
								   <?php } ?>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-3">
                              <label class="gender checkeddesun">Other
							  <?php if($user['User']['sub_ethnic']=="Other"){ ?>
								   <input type="radio" value="Other" checked="checked" name="data[User][sub_ethnic]" >
								   <?php }else{?>
									    <input type="radio" value="Other" name="data[User][sub_ethnic]">
								   <?php }?>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <p></p>
                        </div>
                     </div>
                  </div>
                  <div class="ethnic  row">
                     <div class="col-lg-12 asian">
                        <p></p>
                        <div class="hilight-text">
                           <p>
                              <label class="gender checkeddesun">Asian or Asian British
							  <?php if($user['User']['ethnic']=="Asian or Asian British"){ ?>
								   <input type="radio" checked="checked" value="Asian or Asian British" name="data[User][ethnic]" onclick="show3();">
								   <?php }else{?>
									    <input type="radio" value="Asian or Asian British" name="data[User][ethnic]" onclick="show3();">
								   <?php }?>
                              
                              <span class="checkmark"></span>
                              </label>
                           </p>
                        </div>
                     </div>
                     <div class="div_none" id="div3">
                        <div class="row " style="margin:0;">
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Indian
							   <?php if($user['User']['sub_ethnic']=="Indian"){ ?>
								   <input type="radio" value="Indian" checked="checked" name="data[User][sub_ethnic]" >
								   <?php }else{?>
									    <input type="radio" value="Indian" name="data[User][sub_ethnic]">
								   <?php }?>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Pakistan
							  <?php if($user['User']['sub_ethnic']=="Pakistan"){ ?>
								   <input type="radio" value="Pakistan" checked="checked" name="data[User][sub_ethnic]" >
								   <?php }else{?>
									    <input type="radio" value="Pakistan" name="data[User][sub_ethnic]">
								   <?php }?>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Bangladeshi
							  <?php if($user['User']['sub_ethnic']=="Bangladeshi"){ ?>
								   <input type="radio" value="Bangladeshi" checked="checked" name="data[User][sub_ethnic]" >
								   <?php }else{?>
									    <input type="radio" value="Bangladeshi" name="data[User][sub_ethnic]">
								   <?php }?>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Chinese
							   <?php if($user['User']['sub_ethnic']=="Chinese"){ ?>
								   <input type="radio" value="Chinese" checked="checked" name="data[User][sub_ethnic]" >
								   <?php }else{?>
									    <input type="radio" value="Chinese" name="data[User][sub_ethnic]">
								   <?php }?>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Other
                              <?php if($user['User']['sub_ethnic']=="Other"){ ?>
								   <input type="radio" value="Other" checked="checked" name="data[User][sub_ethnic]" >
								   <?php }else{?>
									    <input type="radio" value="Other" name="data[User][sub_ethnic]">
								   <?php }?>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <p></p>
                        </div>
                     </div>
                  </div>
                  <div class="ethnic row " style="margin-bottom: 10px;">
                     <div class="col-lg-12 African">
                        <p></p>
                        <div class="hilight-text">
                           <p>
                              <label class="gender checkeddesun">African/Caribbean/Black British
							  <?php if($user['User']['ethnic']=="African/Caribbean/Black British"){ ?>
								   <input type="radio" value="African/Caribbean/Black British" name="data[User][ethnic]" onclick="show4();">
								   <?php }else{?>
									    <input type="radio" value="African/Caribbean/Black British" name="data[User][ethnic]" onclick="show4();">
								   <?php }?>
                              
                              <span class="checkmark"></span>
                              </label>
                           </p>
                        </div>
                     </div>
                     <div class="div_none" id="div4">
                        <div class="row " style="margin:0;">
                           <div class="col-lg-3">
                              <label class="gender checkeddesun">Black African
							  <?php if($user['User']['sub_ethnic']=="Black African"){ ?>
								   <input type="radio" value="Black African" checked="checked" name="data[User][sub_ethnic]" >
								   <?php }else{?>
									    <input type="radio" value="Black African" name="data[User][sub_ethnic]">
								   <?php }?>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-3">
                              <label class="gender checkeddesun">White African
							   <?php if($user['User']['sub_ethnic']=="White African"){ ?>
								   <input type="radio" value="White African" checked="checked" name="data[User][sub_ethnic]" >
								   <?php }else{?>
									    <input type="radio" value="White African" name="data[User][sub_ethnic]">
								   <?php }?>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-3">
                              <label class="gender checkeddesun">Caribbean
							  <?php if($user['User']['sub_ethnic']=="Caribbean"){ ?>
								   <input type="radio" value="Caribbean" checked="checked" name="data[User][sub_ethnic]" >
								   <?php }else{?>
									    <input type="radio" value="Caribbean" name="data[User][sub_ethnic]">
								   <?php } ?>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-3">
                              <label class="gender checkeddesun">Other
                              <?php if($user['User']['sub_ethnic']=="Other"){ ?>
								   <input type="radio" value="Other" checked="checked" name="data[User][sub_ethnic]" >
								   <?php }else{?>
									    <input type="radio" value="Other" name="data[User][sub_ethnic]">
								   <?php } ?>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <p></p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <label for="data[User][sub_ethnic]" class="error"></label>
                  </div>
                  <div class="col-lg-12">
                     <label for="data[User][ethnic]" class="error"></label>
                  </div>
                  <div class="col-lg-12">
                     <label class="form-text">Do you consider yourself to have a disability?</label>
                     <p class="form-p">(Please mark appropriate box)</p>
                  </div>
                  <div class="col-lg-6">
                     <label class="gender checkeddesun">Yes
					 <?php if($user['User']['disability']=="Yes"){ ?>
								   <input type="radio" value="Yes" checked="checked" name="data[User][disability]" >
								   <?php }else{?>
									    <input type="radio" value="Yes" name="data[User][disability]">
								   <?php } ?>
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-6">
                     <label class="gender checkeddesun">No
					  <?php if($user['User']['disability']=="No"){ ?>
								   <input type="radio" value="No" checked="checked" name="data[User][disability]" >
								   <?php }else{?>
									    <input type="radio" value="No" name="data[User][disability]">
								   <?php }?>
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-12">
                     <label for="data[User][disability]" class="error"></label>
                  </div>
                  <div class="col-lg-12">
                     <div class="text-center">
                        <button class="btn btn-default" type="submit">Update Profile</button>
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
