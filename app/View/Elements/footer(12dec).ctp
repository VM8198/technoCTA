<!-- Event section -->
<!-- Event section -->
<section class="event-section">
   <div class="container">
      <div id="example3" class="eagle-gallery img300">
         <div class="owl-carousel">
            <?php $sponsor = $this->requestAction(array('controller' => 'homes', 'action' => 'index'));
               foreach($sponsor as $result) { ?>
            <?php echo $this->html->image('sponsorimage/'.$result['SponsorImage']['image'] ,array('width'=>'50px','height'=>'50')); ?>
            <?php } ?>
         </div>
      </div>
   </div>
</section>
<!-- Footer section -->
<footer class="footer-section">
   <div class="container footer-top">
      <div class="col-sm-12">
         <div class="row">
            <!-- widget -->
            <div class="col-sm-6 col-lg-4 footer-widget">
               <div class="">
                  <div class="about-widget">
                     <h5 class="fw-title">About Us</h5>
                     <p>Techno CTA Ltd is a private professional Training & Assessment Provider delivering a wide range of courses within various trades including Construction Railway, Plant Operation and Health & Safety.</p>
                     <div class="social pt-1"> <a href="https://www.facebook.com/" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a> <a href="https://twitter.com/login?lang=en" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a> <a href="https://in.linkedin.com/company/login" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a> </div>
                  </div>
               </div>
            </div>
            <!-- widget -->
            <div class="col-sm-6 col-lg-4 footer-widget">
               <div class="">
                  <h6 class="fw-title">Quick Links</h6>
                  <div class="dobule-link">
                     <ul>
                        <li><i class="fa fa-angle-right"></i><a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index'));?>">Home</a></li>
                        <li><i class="fa fa-angle-right"></i><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'about_us'));?>">About Us</a></li>
                        <li><i class="fa fa-angle-right"></i><a href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'railway_safety'));?>">Training Courses</a></li>
                        <li class="mobiles"><i class="fa fa-angle-right"></i><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'policy_certificate'));?>">Policy & Certificate<br><span style="opacity: 0;">display</span></a></li>
                        <li><i class="fa fa-angle-right"></i><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'terms_conditions'));?>">Terms & Conditions</a></li>
                     </ul>
                     <ul>
                        <li><i class="fa fa-angle-right"></i><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'our_facility'));?>">Facilities</a></li>
                        <li><i class="fa fa-angle-right"></i><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'recruitment'));?>">Recruitment </a></li>
                        <li><i class="fa fa-angle-right"></i><a href="<?php echo $this->html->url(array('controller' => 'galleries', 'action' => 'gallery'));?>">Gallery </a></li>
                        <li><i class="fa fa-angle-right"></i><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'medical'));?>">Drug & Alcohol<br>& Medical</a></li>
                        <li><i class="fa fa-angle-right"></i><a href="<?php echo $this->html->url(array('controller' => 'contacts', 'action' => 'contact_us'));?>">Contact Us</a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <!-- widget -->
            <!-- widget -->
            <div class="col-sm-6 col-lg-4 footer-widget contact">
               <div class="">
                  <h6 class="fw-title">Contact Us</h6>
                  <ul class="contact">
                     <li>
                        <p><i class="fa fa-map-marker"></i>&nbsp;&nbsp;7 Pier Parade, London E16 2LJ</p>
                        <p><i class="fa fa-map-marker"></i>&nbsp;&nbsp;7 Woodman Parade, London E16 2LL</p>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- copyright -->
   <div class="copyright">
      <div class="container">
         <div class="row">
            <div class="col-sm-6 col-lg-6">
               <p>Copyright © 2018 TechnoCTA Ltd. All Rights Reserved. </p>
            </div>
            <div class="col-sm-6 col-lg-6">
               <div class="right-side">
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>
<!--- POP up start --->
<!-- Login Popup  -->
<div class="modal fade" id="myModal">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Log in</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
<div class="modal-body">
            <div class="col-sm-12">
               <?php echo $this->Form->create('User', array('controller'=>'users','action'=>'login','class' => 'comment-form --contact text-center', 'id' => 'loginForm')); ?>
			   <div style="color:red;font-size:18px;position:relative;padding-left:15px;" id= "errorMsg"></div>

               <div class="row">
                  <div class="col-lg-12">
                     <input type="email" class="contactmodal" name="data[User][email_id]" id="email_id" placeholder="Email Address">
					 <div id="emptyemail_id" style="color:red;margin-left:3%"></div>
                  </div>
                  <div class="col-lg-12">
                     <input type="password" class="contactmodal" name="data[User][password]" id="password" placeholder="Password">
					 <div id="emptypassword" style="color:red;margin-left:3%"></div>

                  </div>
                  <div class="col-lg-12">
                     <div class="form-group form-check">
                        <label class="form-check-label">
                        <input class="form-check-input" name="data[User][remberme]" id="remberme" type="checkbox"> Remember me </label>
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div class="text-center">
                        <button class="site-btn modal-btn" type="button" onclick="loginform()">Submit</button>
                     </div>
                  </div>
               </div>
               <?php echo $this->Form->end(); ?>
            </div>
         </div>
         <div class="modal-footer">
            <div class="col-lg-6">
               <div class="forgot-pswd">
                  <a href="#" data-toggle="modal" data-target="#myModal2" data-dismiss="modal">
                     <h5>Forgot Password ?</h5>
                  </a>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="Register">
                  <a href="#" data-toggle="modal" data-target="#myModal8" data-dismiss="modal">
                     <h5>Register Here?</h5>
                  </a>
               </div>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>

<!-- Company Details-->
<div class="modal fade" id="myModal8" data-backdrop="static">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Register As</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
            <div class="col-sm-12 paddig-0">
               <br>
               <form class="comment-form -contact text-center paddig-0">
                  <div class="row">
                     <div class="col-lg-6" align="center">
                        <button class="site-btn modal-btn" data-toggle="modal" data-target="#myModal1" data-dismiss="modal">Individual</button>
                     </div>
                     <div class="col-lg-6" align="center">
                        <button class="site-btn modal-btn" data-toggle="modal" data-target="#myModal4" data-dismiss="modal">Company</button>
                     </div>
                     <div class="col-lg-12" align="center">
                        <br>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- ////////////Company Details-->
<!-- Modal forgot password -->
<div class="modal fade" id="myModal2">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Forgot Password</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
            <div class="col-sm-12">
               <form class="comment-form -contact text-center">
                  <div class="row">
                     <div id="successemail1" style='color:red'></div>
                     <div class="col-lg-12">
                        <input type="text" class="contactmodal" id="ResetEmail"  placeholder="Email Address" >
                     </div>
                     <div id="emptyemail" style="color:red;margin-left:3%"></div>
                     <div class="col-lg-12">
                        <div class="text-center">
                           <a href="#" class="site-btn modal-btn" onclick="resetPassword();" id="disbtn" disabled="">Submit</a>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Modal forgot password -->

<!-- Company Register Details -->
<div class="modal fade" id="myModal4" data-backdrop="static">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Company Register Details</h4>
            <button type="button" class="close" data-dismiss="modal" data-toggle="modal" data-target="#myModal8" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
            <div class="col-sm-12">
               <?php echo $this->Form->create('User', array('controller'=>'users','action'=>'companyregister','class' => 'comment-form -contact text-center', 'id' =>'comapanyForm')); ?>
               <div class="row">
                  <div class="col-lg-12">
                     <input type="text" class="contactmodal" name="data[User][company]" placeholder="Company Name"  >
                  </div>
                  <div class="col-lg-12">
                     <input type="text" class="contactmodal" name="data[User][company_position]" placeholder="Company Position" >
                  </div>
                  
                  <div class="col-lg-12" style="padding-top: 10px">
                  <p>Contact Details</p>
                  </div>
                  
                  <div class="contact-details">
                  <div class="col-lg-12 first-contact">
                  
                     <input type="text" class="contactmodal" name="data[User][first_name]" placeholder="First Name">
                  </div>
                  <div class="col-lg-12">
                     <input type="text" class="contactmodal" name="data[User][last_name]" placeholder="Last Name">
                  </div>
                  <div class="col-lg-12">
                     <input type="text" class="contactmodal" name="data[User][phone]" placeholder="Contact Number">
                  </div>
                  <div class="col-lg-12">
                     <input type="email" class="contactmodal" name="data[User][email_id]" id="Useremail" placeholder="Email Address">
                  </div>
                  <div class="col-lg-12">
                     <input type="email" class="contactmodal" name="data[User][confirm_email_id]" placeholder=" Confirm Email Address">
                  </div>
                  <div class="col-lg-12">
                     <input type="password" class="contactmodal" id="UserPassword" name="data[User][password]" placeholder="Password">
                  </div>
                  <div class="col-lg-12">
                     <input type="password" class="contactmodal" name="data[User][confirm_password]" placeholder="Confirm Password">
                  </div>
                  <div class="col-lg-12">
                  </div>
                 
                    
                        <label class="gender form-checks" >Tick if you would like to register your details with Techno CTA for the purpose of analysing market trend and receive any course offers. We also use data to help us provide a great customer service, which includes tailoring the information we share with you to help ensure that it’s relevant, useful and timely. You can opt out at any time if you don’t want to hear from us. Please contact us on <a href="mailto:info@technocta.co.uk">info@technocta.co.uk</a>
                        <input type="checkbox" name="data[User][checkbox]">
                        <span class="checkmarks"></span>
                        </label>
                        <label for="data[User][checkbox]" class="error"></label>
                   
                  </div>
                  <div class="col-lg-12">
                     <div class="text-center">
                        <button class="site-btn modal-btn">Submit</button>
                     </div>
                  </div>
               </div>
               <?php echo $this->Form->end(); ?>
            </div>
         </div>
      </div>
   </div>
</div>
<!--//////// Company Register Details -->
<!-- Register Modal start  -->
<div class="modal fade" id="myModal1" data-backdrop="static">
   <div class="modal-dialog modal-dialog-centered  modal-lg">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Register Here</h4>
            <button type="button" class="close" data-dismiss="modal" data-toggle="modal" data-target="#myModal8" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="col-sm-12">
               <?php echo $this->Form->create('User', array('controller'=>'users','action'=>'individualregister','class' => 'comment-form --contact text-center form', 'id' =>'UserRegisterForm')); ?>
               <div class="row">
                  <div class="col-lg-6">
                     <label class="form-text">First Name</label>
                     <input type="text" class="contactmodal" name="data[User][first_name]" placeholder="First Name">
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text">Last Name</label>
                     <input type="text" class="contactmodal" name="data[User][last_name]" placeholder="Last Name">
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text">Mobile Number</label>
                     <input type="tel" class="contactmodal phone" name="data[User][phone]" placeholder="Mobile Number">
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text">Email Address</label>
                     <input type="email" class="contactmodal" name="data[User][email_id]" id="Useremail1" placeholder="Email Address">
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text">Confirm Email Address</label>
                     <input type="email" class="contactmodal" name="data[User][confirm_email_id]" placeholder="Confirm Email Address">
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text">Password</label>
                     <input type="password" class="contactmodal" name="data[User][password]" id="UserPassword1" placeholder="Password">
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text">Confirm Password</label>
                     <input type="password" class="contactmodal" name="data[User][confirm_password]" placeholder="Confirm Password">
                  </div>
                  <div class="col-lg-12">
                     <label class="form-text">What is your gender?</label>
                     <p class="form-p">(Please mark appropriate box)</p>
                  </div>
                  <div class="col-lg-6">
                     <label class="gender checkeddesun">Male
                     <input type="radio" value="Male" name="data[User][gender]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-6">
                     <label class="gender checkeddesun">Female
                     <input type="radio" value="Female" name="data[User][gender]">
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
                     <input type="radio" value="Single" name="data[User][maritalstatus]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-3">
                     <label class="gender checkeddesun">Married
                     <input type="radio" value="Married" name="data[User][maritalstatus]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-3">
                     <label class="gender checkeddesun">Civil Partnership
                     <input type="radio" value="Civil Partnership" name="data[User][maritalstatus]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-3">
                     <label class="gender checkeddesun">Separated/ Divorce
                     <input type="radio" value="Separated/ Divorce"  name="data[User][maritalstatus]">
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
                     <input type="radio" value="16-24"  name="data[User][age]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-2">
                     <label class="gender checkeddesun">25-29
                     <input type="radio" value="25-29" name="data[User][age]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-2">
                     <label class="gender checkeddesun">30-34
                     <input type="radio" value="30-34" name="data[User][age]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-2">
                     <label class="gender checkeddesun">35-39
                     <input type="radio" value="35-39" name="data[User][age]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-2">
                     <label class="gender checkeddesun">40-44
                     <input type="radio" value="40-44" name="data[User][age]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-2">
                     <label class="gender checkeddesun">45-49
                     <input type="radio" value="45-49" name="data[User][age]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-2">
                     <label class="gender checkeddesun">50-54
                     <input type="radio" value="50-54" name="data[User][age]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-2">
                     <label class="gender checkeddesun">55-59
                     <input type="radio" value="55-59" name="data[User][age]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-2">
                     <label class="gender checkeddesun">60-64
                     <input type="radio" value="60-64" name="data[User][age]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-2">
                     <label class="gender checkeddesun">65+
                     <input type="radio" value="65+" name="data[User][age]">
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
                              <input type="radio" value="White" name="data[User][ethnic]" onclick="show5();">
                              <span class="checkmark"></span>
                              </label>
                           </p>
                        </div>
                     </div>
                     <div class="div_none" id="div1">
                        <div class="row " style="margin:0;">
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">English
                              <input type="radio" value="English" name="data[User][sub_ethnic]">
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Welsh
                              <input type="radio" value="Welsh" name="data[User][sub_ethnic]">
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Scottish
                              <input type="radio" value="Scottish" name="data[User][sub_ethnic]">
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">N Lrish
                              <input type="radio" value="N Lrish" name="data[User][sub_ethnic]">
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Lrish
                              <input type="radio" value="Lrish" name="data[User][sub_ethnic]">
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Lrish Trav
                              <input type="radio" value="Lrish Trav" name="data[User][sub_ethnic]">
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Gypsy
                              <input type="radio" value="Gypsy" name="data[User][sub_ethnic]">
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Other
                              <input type="radio" value="Other" name="data[User][sub_ethnic]">
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
                              <input type="radio" value="Mixed/Multiple Ethnicity" name="data[User][ethnic]" onclick="show2();">
                              <span class="checkmark"></span>
                              </label>
                           </p>
                        </div>
                     </div>
                     <div class="div_none" id="div2">
                        <div class="row " style="margin:0;">
                           <div class="col-lg-3">
                              <label class="gender checkeddesun">W/B Caribbean
                              <input type="radio" value="W/B Caribbean" name="data[User][sub_ethnic]">
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-3">
                              <label class="gender checkeddesun">W/B African
                              <input type="radio" value="W/B African" name="data[User][sub_ethnic]">
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-3">
                              <label class="gender checkeddesun">W/ Asian
                              <input type="radio" value="W/ Asian" name="data[User][sub_ethnic]">
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-3">
                              <label class="gender checkeddesun">Other
                              <input type="radio" value="Other" name="data[User][sub_ethnic]">
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
                              <input type="radio" value="Asian or Asian British" name="data[User][ethnic]" onclick="show3();">
                              <span class="checkmark"></span>
                              </label>
                           </p>
                        </div>
                     </div>
                     <div class="div_none" id="div3">
                        <div class="row " style="margin:0;">
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Indian
                              <input type="radio" value="Indian" name="data[User][sub_ethnic]">
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Pakistan
                              <input type="radio" value="Pakistan" name="data[User][sub_ethnic]">
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Bangladeshi
                              <input type="radio" value="Bangladeshi" name="data[User][sub_ethnic]">
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Chinese
                              <input type="radio" value="Chinese" name="data[User][sub_ethnic]">
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-2">
                              <label class="gender checkeddesun">Other
                              <input type="radio" value="Other" name="data[User][sub_ethnic]">
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
                              <input type="radio" value="African/Caribbean/Black British" name="data[User][ethnic]" onclick="show4();">
                              <span class="checkmark"></span>
                              </label>
                           </p>
                        </div>
                     </div>
                     <div class="div_none" id="div4">
                        <div class="row " style="margin:0;">
                           <div class="col-lg-3">
                              <label class="gender checkeddesun">Black African
                              <input type="radio" value="Black African" name="data[User][sub_ethnic]">
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-3">
                              <label class="gender checkeddesun">White African
                              <input type="radio" value="White African" name="data[User][sub_ethnic]">
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-3">
                              <label class="gender checkeddesun">Caribbean
                              <input type="radio" value="Caribbean" name="data[User][sub_ethnic]">
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="col-lg-3">
                              <label class="gender checkeddesun">Other
                              <input type="radio" value="Other" name="data[User][sub_ethnic]">
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
                     <input type="radio" value="Yes" name="data[User][disability]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-6">
                     <label class="gender checkeddesun">No
                     <input type="radio" value="No" name="data[User][disability]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-12">
                     <label for="data[User][disability]" class="error"></label>
                  </div>
                 
                  <div class="col-lg-12">
                  
                        <label class="gender form-checks">if you would like to register your details with Techno CTA for the purpose of analysing market trend and receive any course offers. We also use data to help us provide a great customer service, which includes tailoring the information we share with you to help ensure that it’s relevant, useful and timely. Techno CTA does not share or sell your personal information. The security of your data is our priority; re respect your privacy and work hard to meet strict regulatory requirements.
                        <input type="checkbox" name="data[User][checkbox]">
                        <span class="checkmarks"></span>
                        </label>
                        <label for="data[User][checkbox]" class="error"></label>
                  </div>
                  <div class="col-lg-12">
                     <div class="text-center">
                        <button class="site-btn modal-btn" type="Signup">Submit</button>
                     </div>
                  </div>
               </div>
               <?php echo $this->Form->end(); ?>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>
<!-- Register Modal close  -->

<!-- Courses -->
<div class="modal fade" id="myModal3">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header course">
            <h4 class="modal-title">Select Course</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="col-sm-12">
               <?php //echo $this->Form->create('BookCourse', array('class' => 'comment-form --contact text-center', 'id' =>'bookcourse')); ?>
               <form class="comment-form --contact text-center">
                  <div class="row">
                     <div class="col-md-6">
                        <span>Rail </span>
                        <select name="coursess" id="coursesr" class="contactmodal" onchange="myFunctionsss(this);">
                           <option value="select">Select Option</option>
                           <option value="railway_safety">Railway Safety</option>
                        </select>
                     </div>
                     <div class="col-md-6">
                        <span>Non-Rail Course</span>
                        <select name="coursess" id="coursess" class="contactmodal" onchange="myFunctionss(this);">
                           <option value="select">Select Option</option>
                           <option value="construction">Construction</option>
                           <option value="plant_operation">Plant Operation</option>
                           <option value="small_tools">Small Tool</option>
                           <option value="health_safety">Health And Safety</option>
						   <option value="drug_medical">Drug & Alcohol Screening & Medical Assessments</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div class="text-center">
                        <a class="site-btn modal-btn" id="screen" href="">Submit</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>
<!-- ///////////Courses close -->
<!-- Individual Rail Courses-->
<?php $course = $this->requestAction(array('controller' =>'courses', 'action' =>'railway_safety'));
   foreach($course as $value) { 
    $id = $value['Course']['id']; ?>
<div class="modal fade" id="Indivitualrail<?php echo $value['Course']['id'];?>" data-backdrop="static">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Booking Form <span class="railcousre">(Rail Courses)</span></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="col-sm-12">
               <?php echo $this->Form->create('User', array('controller'=>'users','action'=>'individualbooking','class' => 'comment-form --contact text-center form individualform', 'id'=>'I'+$id)); ?>
			    <div class="col-lg-12 booking">
				<h2 style="font-size: 18px;text-align: center;color: red;">TRAINING SPONSERSHIP AGREEMENT COURSE ONLINE BOOKING FORM</h2>
                     <p>Last booking for online booking should be no later than 24 hours of the start date</p>
                     <p class="contact_detail">*IF YOU DON’T HAVE SENTINEL ID NUMBER, please call us directly 
                        <a href="tel:02070550877">0207 055 0877</a>
                     </p>
                  </div>
			   <ul class="nav nav-tabs footer_tabs" role="tablist">
                  <li class="nav-item col-sm-4" role="presentation">
                     <a class="nav-link active" href="#steps1<?php echo $value['Course']['id'];?>" role="tab" data-toggle="tab" aria-controls="steps1" title="steps1" id="steps44">Step - 1</a>
                  </li>
                  <li class="nav-item disabled col-sm-4" role="presentation">
                     <a class="nav-link" href="#steps2<?php echo $value['Course']['id'];?>" role="tab" data-toggle="tab" aria-controls="steps2" title="steps2" id="steps55">Step - 2</a>
                  </li>
				  <li class="nav-item disabled col-sm-4" role="presentation">
                           <a class="nav-link" href="#referencessa<?php echo $value['Course']['id'];?>" role="tab" data-toggle="tab" aria-controls="references" title="references" id="steps3">Step - 3</a>
                    </li>
               </ul>
               <div class="">
                  <div class="tab-content">
                     <div role="tabpanel" class="tab-pane fade in active show" id="steps1<?php echo $value['Course']['id'];?>">
                        <div class="row">
                           <div class="col-lg-6">
                              <label class="form-text">Course</label>
                              <input type="text" class="contactmodal" name="data[User][course_name]" readonly="true" placeholder="Course" value="<?php echo $value['Course']['course_name'];?>">
                           </div>
                           <div class="col-lg-6">
                              <label class="form-text">Course Duration</label>
                              <input type="text" class="contactmodal" name="data[User][duration]" readonly="true" placeholder="Course Duration" value="<?php echo $value['Course']['duration'];?>">
                           </div>
                           <div class="col-lg-6">
                              <label class="form-text">Location</label>
                              <input type="text" class="contactmodal" name="data[User][location]" readonly="true" placeholder="Location" value="<?php echo $value['Location']['location'];?>">
                           </div>
                           <div class="col-lg-6">
                              <label class="form-text">Course Date</label>
                              <input type="text" class="contactmodal" name="data[User][start_date]" id="date<?php echo $value['Course']['id'];?>" readonly="true" placeholder="Course Date" value="">
                           </div>
                           <div class="col-lg-12">
                              <label class="form-text">Course Time</label>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <input type="text" class="contactmodal" name="data[User][start_time]" readonly="true" placeholder="Start Time" value="<?php echo $value['Course']['start_time'];?>">
                                 </div>
                                 <div class="col-lg-6">
                                    <input type="text" class="contactmodal" name="data[User][end_time]" readonly="true" placeholder="End Time" value="<?php echo $value['Course']['end_time'];?>">
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <label class="form-text">Price Per Deligates(excl VAT)</label>
                              <input type="text" class="contactmodal" name="data[User][delegate_price]" readonly="true" placeholder="Price Per Deligates" value="&#163;<?php echo $value['Course']['delegate_price'];?>">
                           </div>
						    <div class="col-lg-6">
                              <label class="form-text">Price Per Deligates(incl VAT)</label>
                              <input type="text" class="contactmodal" name="data[User][delegate_price]" readonly="true" placeholder="Price Per Deligates" value="&#163;<?php echo $value['Course']['delegate_price'] +  $value['Course']['delegate_price'] * 20/100 ;?>">
                           </div>
                           <div class="col-lg-12" align="right">
                              <ul class="nav nav-tabs" role="tablist" style="float:right;">
                                 <li class="nav-item disabled" role="presentation">
                                    <a class="site-btn modal-btn Add_btn" href="#steps2<?php echo $value['Course']['id'];?>" role="tab" data-toggle="tab" aria-controls="steps2" title="steps2" id="steps33"><i class="fa fa-angle-double-right"></i></a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div role="tabpanel" class="tab-pane fade" id="steps2<?php echo $value['Course']['id'];?>">
               <div class="row">
                  <div class="col-lg-6">
                     <label class="form-text">First Name</label>
                     <input type="text" class="contactmodal" name="data[User][first_name]" placeholder="First Name" value="<?php if($this->Session->read('Auth')){  
                        echo $_SESSION['Auth']['User']['first_name'];
                        }?>" >
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text">Last Name</label>
                     <input type="text" class="contactmodal" name="data[User][last_name]" placeholder="Last Name" value="<?php if($this->Session->read('Auth')){  
                        echo $_SESSION['Auth']['User']['last_name'];
                        }?>" >
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text">Mobile Number</label>
                     <input type="tel" class="contactmodal phone" name="data[User][phone]" placeholder="Mobile Number" value="<?php if($this->Session->read('Auth')){  
                        echo $_SESSION['Auth']['User']['phone'];
                        }?>">
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text">Email Address</label>
                     <input type="email" class="contactmodal" name="data[User][email_id]" placeholder="Email Address"  value="<?php if($this->Session->read('Auth')){  
                        echo $_SESSION['Auth']['User']['email_id'];
                        }?>">
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text">Sentinel Number</label>
                     <input type="tel" class="contactmodal" name="data[User][sentinel]" maxlength="7" placeholder="Sentinel Number">
                  </div>
                  <div class="col-lg-12">
                     <label class="form-text">Do you have a valid Drug & Alcohol Screen at the time of the course?</label> 
                  </div>
                  <div class="col-lg-3">
                     <label class="gender checkeddesun">Yes
                     <input type="radio" value="Yes" name="data[User][drug]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-3">
                     <label class="gender checkeddesun">No
                     <input type="radio" value="No" name="data[User][drug]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-12">
                     <label for="data[User][drug]" class="error"></label>
                  </div>
                  <div class="col-lg-12">
                     <label class="form-text">Do you have a valid Medical Examination at the time of the course?</label> 
                  </div>
                  <div class="col-lg-3">
                     <label class="gender checkeddesun">Yes
                     <input type="radio" value="Yes" name="data[User][medical]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-3">
                     <label class="gender checkeddesun">No
                     <input type="radio" value="No" name="data[User][medical]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-12">
                     <label for="data[User][medical]" class="error"></label>
                  </div>
                  <div class="col-lg-12 text-slide">
                     <p>The maximum expiry date of medical certificate issued are as follows;</p>
                     <p>10 yearly until aged 40yrs</p>
                     <p>5 yearly until aged 50yrs</p>
                     <p>Renewed annually thereafter</p>
                  </div>
				  <div class="col-lg-12">
                     <label class="form-text">Have you completed your E-learning?</label> 
                  </div>
                  <div class="col-lg-3">
                     <label class="gender checkeddesun">Yes
                     <input type="radio" value="Yes" name="data[User][elearning]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-3">
                     <label class="gender checkeddesun">No
                     <input type="radio" value="No" name="data[User][elearning]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-12">
                     <label for="data[User][elearning]" class="error"></label>
                  </div>
				  <p>(if you have not completed the elearning, we can arrange this prior to course date)</p>
				  <div class="col-lg-12" align="right">
                                 <ul class="nav nav-tabs" role="tablist" style="float:right;">
                                    <li class="nav-item disabled" role="presentation">
                                       <a class="site-btn modal-btn Add_btn" href="#referencessa<?php echo $value['Course']['id'];?>" role="tab" data-toggle="tab" id="Next" aria-controls="buzz" title="buzz"><i class="fa fa-angle-double-right"></i></a>
                                    </li>
                                 </ul>
                              </div>
               </div>
              
            </div>
			
			<div role="tabpanel" class="tab-pane fade" id="referencessa<?php echo $value['Course']['id'];?>">
                           <div class="row">
                              <div class="col-lg-3">
                                 <label class="form-text">Sponsor Name</label>
                                 <input type="text" class="contactmodal" name="data[User][company]" placeholder="Sponsor Name" value="<?php if($this->Session->read('Auth')){  
                                    if($_SESSION['Auth']['User']['user_type']=="User"){
                                    echo $_SESSION['Auth']['User']['company'];
                                    }}?>" >
                              </div>
                              <div class="col-lg-3">
                                 <label class="form-text">Sponsor Sentinel Number</label>
                                 <input type="text" class="contactmodal" name="data[User][companysentinel]" placeholder="Sponsor Sentinel Number" maxlength="7" value="">
                              </div>
                              <div class="col-lg-3">
                                 <label class="form-text">Sponsor Contact Number</label>
                                 <input type="tel" class="contactmodal" name="data[User][phone]"  placeholder="Sponsor Contact Number" value="<?php if($this->Session->read('Auth')){  
                                    if($_SESSION['Auth']['User']['user_type']=="User"){
                                    echo $_SESSION['Auth']['User']['phone'];
                                    }}?>">
                              </div>
                              <div class="col-lg-3">
                                 <label class="form-text">Sponsor Email Address</label>
                                 <input type="text" class="contactmodal" name="data[User][companyemail]" placeholder="Sponsor Email Address" value="<?php if($this->Session->read('Auth')){  
                                    if($_SESSION['Auth']['User']['user_type']=="User"){
                                    echo $_SESSION['Auth']['User']['companyemail'];
                                    }}?>">
                              </div>
                               <div class="col-lg-12">
                     <br>
                     <div class="text-center">
                        <button class="site-btn modal-btn" onclick="individualRail(<?php echo $value['Course']['id'];?>)">Submit</button>
                     </div>
                  </div>
                           </div>
                        </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>
</div>
 <?php echo $this->Form->end(); ?>
</div>
</div>
<?php } ?>
<!-- /////////// Individual Rail Cousre-->
<!-- Orgnisation rail courses1-->
<?php $course = $this->requestAction(array('controller' =>'courses', 'action' =>'railway_safety'));
   foreach($course as $value) {
    $id = $value['Course']['id'];
	?>
<div class="modal fade" id="orgnisationrail<?php echo $value['Course']['id'];?>" data-backdrop="static">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Booking Form <span class="railcousre">(Rail Courses)</span></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="col-sm-12" id="O<?php echo $id ?>">
               <?php echo $this->Form->create('User', array('controller'=>'users','action'=>'companyrailbooking','class' => 'comment-form --contact text-center form ')); ?>
               <div class="row">
                  <div class="col-lg-12 booking">
                  <h2 style="font-size: 18px;text-align: center;color: red;">TRAINING SPONSERSHIP AGREEMENT COURSE ONLINE BOOKING FORM</h2>
                     <p>Last booking for online booking should be no later than 24 hours of the start date</p>
                  </div>
                  <div class="col-lg-12">
                     <ul class="nav nav-tabs footer_tabs" role="tablist">
                        <li class="nav-item col-sm-4" role="presentation">
                           <p class="nav-link active" id="step1<?php echo $value['Course']['id'];?>">Step - 1</p>
                        </li>
                        <li class="nav-item disabled col-sm-4" role="presentation">
                           <p class="nav-link" id="step2<?php echo $value['Course']['id'];?>">Step - 2</p>
                        </li>
                        <li class="nav-item disabled col-sm-4" role="presentation">
                           <p class="nav-link" id="step3<?php echo $value['Course']['id'];?>">Step - 3</p>
                        </li>
                     </ul>
                     <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active show" id="profile<?php echo $value['Course']['id'];?>">
                           <div class="row">
                              <div class="col-lg-6">
                                 <label class="form-text">Course</label>
                                 <input type="text" class="contactmodal" name="data[User][course_name]" readonly="true" placeholder="Course" value="<?php echo $value['Course']['course_name'];?>">
                              </div>
                              <div class="col-lg-6">
                                 <label class="form-text">Course Duration</label>
                                 <input type="text" class="contactmodal" name="data[User][duration]" readonly="true" placeholder="Course Duration" value="<?php echo $value['Course']['duration'];?>">
                              </div>
                              <div class="col-lg-6">
                                 <label class="form-text">Location</label>
                                 <input type="text" class="contactmodal" name="data[User][location]" readonly="true" placeholder="Location" value="<?php echo $value['Location']['location'];?>">
                              </div>
                              <div class="col-lg-6">
                                 <label class="form-text">Course Date</label>
                                 <input type="text" class="contactmodal" name="data[User][start_date]" id="org<?php echo $value['Course']['id'];?>" readonly="true" placeholder="Course Date" value="">
                              </div>
                              <div class="col-lg-12">
                                 <label class="form-text">Course Time</label>
                                 <div class="row">
                                    <div class="col-lg-6">
                                       <input type="text" class="contactmodal" name="data[User][start_time]" readonly="true" placeholder="Start Time" value="<?php echo $value['Course']['start_time'];?>">
                                    </div>
                                    <div class="col-lg-6">
                                       <input type="text" class="contactmodal" name="data[User][end_time]" readonly="true" placeholder="End Time" value="<?php echo $value['Course']['end_time'];?>">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <label class="form-text">Price Per Deligates(excl VAT)</label>
                                 <input type="text" class="contactmodal" name="data[User][delegate_price]" readonly="true" placeholder="Price Per Deligates" value="&#163;<?php echo $value['Course']['delegate_price'];?>">
                              </div>
							  <div class="col-lg-6">
                              <label class="form-text">Price Per Deligates(incl VAT)</label>
                              <input type="text" class="contactmodal" name="data[User][delegate_price]" readonly="true" placeholder="Price Per Deligates" value="&#163;<?php echo $value['Course']['delegate_price'] +  $value['Course']['delegate_price'] * 20/100 ;?>">
                           </div>
                              <div class="col-lg-12" align="right"> 
                                 <ul class="nav nav-tabs" role="tablist" style="float:right;">
                                
                                    <li class="nav-item disabled" role="presentation">
                                       <a class="site-btn modal-btn Add_btn ddlSelect<?php echo $value['Course']['id'];?>" href="#" onclick="myfu(<?php echo $value['Course']['id'];?>);" role="tab" data-toggle="tab" title="Next"><i class="fa fa-angle-double-right"></i></a>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="buzz<?php echo $value['Course']['id'];?>">
                           <div class="row">
                              
                              <div class="col-lg-2">
                                 <label class="form-text">First Name</label>
                                 <input type="text" class="contactmodal" name="data[first_name][]" placeholder="First Name" value="<?php if($this->Session->read('Auth')){  
                                    if($_SESSION['Auth']['User']['user_type']=="Company"){
										$name = explode( ',',$_SESSION['Auth']['User']['first_name']);
										echo $name[0]; 
										 
                                    }}?>" >
                              </div>
                              <div class="col-lg-2">
                                 <label class="form-text">Last Name</label>
                                 <input type="text" class="contactmodal" name="data[last_name][]" placeholder="Last Name" value="<?php if($this->Session->read('Auth')){  
                                    if($_SESSION['Auth']['User']['user_type']=="Company"){
                                   $last = explode( ',',$_SESSION['Auth']['User']['last_name']);
										echo $last[0]; 
                                    }}?>" >
                              </div>
                              <div class="col-lg-2">
                                 <label class="form-text">Sentinel Number</label>
                                 <input type="tel" class="contactmodal" name="data[sentinel][]" maxlength="7" placeholder="Sentinel Number">
                              </div>
                              <div class="col-lg-3">
                                 <label class="form-text">Price Per Deligates(excl VAT)</label>
                                 <input type="text" class="contactmodal excvat<?php echo $value['Course']['id'];?>" readonly="true" id="4ddlSelect<?php echo $value['Course']['id'];?>" name="data[delegate_price][]" placeholder="Price Per Deligates(excl VAT)" value="<?php echo $value['Course']['delegate_price'];?>">
                              </div>
                              <div class="col-lg-3">
                                 <label class="form-text">Price Per Deligates(incl VAT)</label>
                                 <input type="text" class="contactmodal ddlSelect<?php echo $value['Course']['id'];?>" id="5ddlSelect<?php echo $value['Course']['id'];?>" name="data[delegate_price][]" readonly="true" placeholder="Price Per Deligates(incl VAT)" value="<?php echo $value['Course']['delegate_price'] +  $value['Course']['delegate_price'] * 20/100 ;?>">
                              </div>
                              
                           </div>
                           <div class="row">
                           <div class="col-lg-2">
                                 <label class="form-text">First Name</label>
                                 <input type="text" class="contactmodal" name="data[first_name][]" placeholder="First Name" value="" >
                              </div>
                              <div class="col-lg-2">
                                 <label class="form-text">Last Name</label>
                                 <input type="text" class="contactmodal" name="data[last_name][]" placeholder="Last Name" value="" >
                              </div>
                              <div class="col-lg-2">
                                 <label class="form-text">Sentinel Number</label>
                                 <input type="tel" class="contactmodal" name="data[sentinel][]" maxlength="7" placeholder="Sentinel Number">
                              </div>
                              <div class="col-lg-3">
                                 <label class="form-text">Price Per Deligates(excl VAT)</label>
                                 <input type="text" class="contactmodal excvat<?php echo $value['Course']['id'];?>" name="data[delegate_price][]" placeholder="Price Per Deligates(excl VAT)" readonly="true" value="<?php echo $value['Course']['delegate_price'];?>">
                              </div>
                              <div class="col-lg-3">
                                 <label class="form-text">Price Per Deligates(incl VAT)</label>
                                 <input type="text" class="contactmodal ddlSelect<?php echo $value['Course']['id'];?>" name="data[delegate_price][]" readonly="true" placeholder="Price Per Deligates(incl VAT)" value="<?php echo $value['Course']['delegate_price'] +  $value['Course']['delegate_price'] * 20/100 ;?>">
                              </div>
                           </div>
                           <div class="row">
                           <div class="col-lg-2">
                                 <label class="form-text">First Name</label>
                                 <input type="text" class="contactmodal" name="data[first_name][]" placeholder="First Name" value="" >
                              </div>
                              <div class="col-lg-2">
                                 <label class="form-text">Last Name</label>
                                 <input type="text" class="contactmodal" name="data[last_name][]" placeholder="Last Name" value="" >
                              </div>
                              <div class="col-lg-2">
                                 <label class="form-text">Sentinel Number</label>
                                 <input type="tel" class="contactmodal" name="data[sentinel][]" maxlength="7" placeholder="Sentinel Number">
                              </div>
                              <div class="col-lg-3">
                                 <label class="form-text">Price Per Deligates(excl VAT)</label>
                                 <input type="text" class="contactmodal excvat<?php echo $value['Course']['id'];?>" name="data[delegate_price][]" placeholder="Price Per Deligates(excl VAT)" readonly="true" value="<?php echo $value['Course']['delegate_price'];?>">
                              </div>
                              <div class="col-lg-3">
                                 <label class="form-text">Price Per Deligates(incl VAT)</label>
                                 <input type="text" class="contactmodal ddlSelect<?php echo $value['Course']['id'];?>" name="data[delegate_price][]" readonly="true" placeholder="Price Per Deligates(incl VAT)" value="<?php echo $value['Course']['delegate_price'] +  $value['Course']['delegate_price'] * 20/100 ;?>">
                              </div>
                           </div>
                           <div class="row">
                           <div class="col-lg-2">
                                 <label class="form-text">First Name</label>
                                 <input type="text" class="contactmodal" name="data[first_name][]" placeholder="First Name" value="" >
                              </div>
                              <div class="col-lg-2">
                                 <label class="form-text">Last Name</label>
                                 <input type="text" class="contactmodal" name="data[last_name][]" placeholder="Last Name" value="" >
                              </div>
                              <div class="col-lg-2">
                                 <label class="form-text">Sentinel Number</label>
                                 <input type="tel" class="contactmodal" name="data[sentinel][]" maxlength="7" placeholder="Sentinel Number">
                              </div>
                              <div class="col-lg-3">
                                 <label class="form-text">Price Per Deligates(excl VAT)</label>
                                 <input type="text" class="contactmodal excvat<?php echo $value['Course']['id'];?>" name="data[delegate_price][]" placeholder="Price Per Deligates(excl VAT)" readonly="true" value="<?php echo $value['Course']['delegate_price'];?>">
                              </div>
                              <div class="col-lg-3">
                                 <label class="form-text">Price Per Deligates(incl VAT)</label>
                                 <input type="text" class="contactmodal ddlSelect<?php echo $value['Course']['id'];?>" name="data[delegate_price][]" readonly="true" placeholder="Price Per Deligates(incl VAT)" value="<?php echo $value['Course']['delegate_price'] +  $value['Course']['delegate_price'] * 20/100 ;?>">
                              </div>
                           </div>
                          
                           <div id="1ddlSelect<?php echo $value['Course']['id'];?>"></div>
                           <div class="row">
                           <div class="col-lg-6">
                                 <label class="form-text">Total(Excl VAT)</label>
                                 <input type="text" class="contactmodal Totex<?php echo $value['Course']['id'];?>" id="TotExVal<?php echo $value['Course']['id'];?>" readonly="true" name="" placeholder="Total" value="">
                              </div>
                           <div class="col-lg-6">
                                 <label class="form-text">Total(Incl VAT)</label>
                                 <input type="text" class="contactmodal newdd<?php echo $value['Course']['id'];?>" id="TotVal<?php echo $value['Course']['id'];?>" readonly="true" name="data[delegate_price][]" placeholder="Total" value="">
                              </div>
                              </div>
                              <div class="row">
                           <div class="col-lg-12 booking button">
                                 <div class="form-group booking-form">
                                    <select class="form-control ddlSelect newdd<?php echo $value['Course']['id'];?>"  data-id="<?php echo $value['Course']['id'];?>" id="ddlSelect<?php echo $value['Course']['id'];?>" name="ddlSelect">
                                       <option>Add Box</option>
                                       <option value="1">1</option>
                                       <option value="2">2</option>
                                       <option value="3">3</option>
                                       <option value="4">4</option>
                                       <option value="5">5</option>
                                       <option value="6">6</option>
                                       <option value="7">7</option>
                                       <option value="8">8</option>
                                       <option value="9">9</option>
                                    </select>
                                 </div>
                              </div>
                          </div>    
                           <div class="col-lg-12" align="right">
                              <ul class="nav nav-tabs" role="tablist" style="float:right;">
                              <li class="nav-item disabled" role="presentation">
                                       <a class="site-btn modal-btn Add_btn " href="#" onclick="PreviousTab(<?php echo $value['Course']['id'];?>);" title="Previous"><i class="fa fa-angle-double-left"></i></a>
                                    </li>
                                 <li class="nav-item disabled" role="presentation">
                                    <a class="site-btn modal-btn Add_btn" href="#" onclick="NextTab(<?php echo $value['Course']['id'];?>);"  title="Next" ><i class="fa fa-angle-double-right"></i></a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="references<?php echo $value['Course']['id'];?>">
                           <div class="row">
                              <div class="col-lg-3">
                                 <label class="form-text">Sponsor Name</label>
                                 <input type="text" class="contactmodal" name="data[User][company]" placeholder="Sponsor Name" value="<?php if($this->Session->read('Auth')){  
                                    if($_SESSION['Auth']['User']['user_type']=="Company"){
                                    echo $_SESSION['Auth']['User']['company'];
                                    }}?>" >
                              </div>
                              <div class="col-lg-3">
                                 <label class="form-text">Sponsor Sentinel Number</label>
                                 <input type="text" class="contactmodal" name="data[User][companysentinel]" placeholder="Sponsor Sentinel Number" maxlength="7" value="">
                              </div>
                              <div class="col-lg-3">
                                 <label class="form-text">Sponsor Contact Number</label>
                                 <input type="tel" class="contactmodal" name="data[User][phone]"  placeholder="Sponsor Contact Number" value="<?php if($this->Session->read('Auth')){  
                                    if($_SESSION['Auth']['User']['user_type']=="Company"){
                                    echo $_SESSION['Auth']['User']['phone'];
                                    }}?>">
                              </div>
                              <div class="col-lg-3">
                                 <label class="form-text">Sponsor Email Address</label>
                                 <input type="text" class="contactmodal" name="data[User][companyemail]" placeholder="Sponsor Email Address" value="<?php if($this->Session->read('Auth')){  
                                    if($_SESSION['Auth']['User']['user_type']=="Company"){
                                    echo $_SESSION['Auth']['User']['companyemail'];
                                    }}?>">
                              </div>
                              <div class="col-lg-12" style="text-align:center;">
                                 <button class="site-btn modal-btn" id="O<?php echo $value['Course']['id'];?>" onclick="OrganizationRail(this)">Submit</button>
                              </div>
                           </div>
                           <div class="col-lg-12" align="right"> 
                                 <ul class="nav nav-tabs" role="tablist" style="float:right;">
                                
                                    <li class="nav-item disabled" role="presentation">
                                       <a class="site-btn modal-btn Add_btn " href="#" onclick="PRETab(<?php echo $value['Course']['id'];?>);" title="Previus"><i class="fa fa-angle-double-left"></i></a>
                                    </li>
                                 </ul>
                              </div>
                        </div>
                     </div>
                  </div>
               </div>
               <?php echo $this->Form->end(); ?>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>
<?php } ?>
<!-- Orgnisation rail courses-->

<!-- Indivitual NOn Rail Courses-->
<?php $url = $this->here; 
$course = $this->requestAction(array('controller' =>'courses', 'action' =>'booknow'));
if($url == "/courses/construction"){
	$course = $this->requestAction(array('controller' =>'courses', 'action' =>'construction')); 
	}else if($url=="/courses/plant_operation"){ 
		$course = $this->requestAction(array('controller' =>'courses', 'action' =>'plant_operation')); 
		}else if($url=="/courses/small_tools"){
			$course = $this->requestAction(array('controller' =>'courses', 'action' =>'small_tools')); 
		}else if($url=="/courses/health_safety"){
			$course = $this->requestAction(array('controller' =>'courses', 'action' =>'health_safety')); 
		}
   foreach($course as $value) {
		if($value['Sector']['id'] != "1"){	
		 $id = $value['Course']['id'];?>
<div class="modal fade" id="Indivitualnonrail<?php echo $value['Course']['id'];?>" data-backdrop="static">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Booking Form <span class="railcousre">(Non Rail Courses)</span></h4>
            <button type="button" class="close" data-dismiss="modal" data-toggle="modal" data-target="" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="col-sm-12" id="non<?php echo $id ?>">
               <?php echo $this->Form->create('User', array('controller'=>'users','action'=>'individualnonrail','class' => 'comment-form --contact text-center form')); ?>
			   <ul class="nav nav-tabs footer_tabs" role="tablist">
                  <li class="nav-item col-sm-6" role="presentation">
                     <a class="nav-link active" href="#stepnon1<?php echo $value['Course']['id'];?>" role="tab" data-toggle="tab" aria-controls="stepnon1" title="stepnon1" id="steps44">Step - 1</a>
                  </li>
                  <li class="nav-item disabled col-sm-6" role="presentation">
                     <a class="nav-link" href="#stepnon2<?php echo $value['Course']['id'];?>" role="tab" data-toggle="tab" aria-controls="stepnon2" title="stepnon2" id="steps55">Step - 2</a>
                  </li>
               </ul>
               <div class="">
                  <div class="tab-content">
                     <div role="tabpanel" class="tab-pane fade in active show" id="stepnon1<?php echo $value['Course']['id'];?>">
                        <div class="row">
                           <div class="col-lg-6">
                              <label class="form-text">Course</label>
                              <input type="text" class="contactmodal" name="data[User][course_name]" placeholder="Course" value="<?php echo $value['Course']['course_name'];?>">
                           </div>
                           <div class="col-lg-6">
                              <label class="form-text">Course Duration</label>
                              <input type="text" class="contactmodal" name="data[User][duration]" placeholder="Course Duration" value="<?php echo $value['Course']['duration'];?>">
                           </div>
                           <div class="col-lg-6">
                              <label class="form-text">Location</label>
                              <input type="text" class="contactmodal" name="data[User][location]"  placeholder="Location" value="<?php echo $value['Location']['location'];?>">
                           </div>
                           <div class="col-lg-6">
                              <label class="form-text">Course Date</label>
                              <input type="text" class="contactmodal" name="data[User][start_date]" id="indate<?php echo $value['Course']['id'];?>"  placeholder="Course Date" value="">
                           </div>
                           <div class="col-lg-12">
                              <label class="form-text">Course Time</label>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <input type="text" class="contactmodal" name="data[User][start_time]" placeholder="Start Time" value="<?php echo $value['Course']['start_time'];?>">
                                 </div>
                                 <div class="col-lg-6">
                                    <input type="text" class="contactmodal" name="data[User][end_time]" placeholder="End Time" value="<?php echo $value['Course']['end_time'];?>">
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <label class="form-text">Price Per Deligates(excl VAT)</label>
                              <input type="text" class="contactmodal" name="data[User][delegate_price]" placeholder="Price Per Deligates" value="&#163;<?php echo $value['Course']['delegate_price'];?>">
                           </div>
						   <div class="col-lg-6">
                              <label class="form-text">Price Per Deligates(incl VAT)</label>
                              <input type="text" class="contactmodal" name="data[User][delegate_price]" readonly="true" placeholder="Price Per Deligates" value="&#163;<?php echo $value['Course']['delegate_price'] +  $value['Course']['delegate_price'] * 20/100 ;?>">
                           </div>
                           <div class="col-lg-12" align="right">
                              <ul class="nav nav-tabs" role="tablist" style="float:right;">
                                 <li class="nav-item disabled" role="presentation">
                                    <a class="site-btn modal-btn Add_btn" href="#stepnon2<?php echo $value['Course']['id'];?>" role="tab" data-toggle="tab" aria-controls="stepnon2" title="step2" id="steps33"><i class="fa fa-angle-double-right"></i></a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div role="tabpanel" class="tab-pane fade" id="stepnon2<?php echo $value['Course']['id'];?>">
               <div class="row">
                  <div class="col-lg-6">
                     <label class="form-text">First Name</label>
                     <input type="text" class="contactmodal" name="data[User][first_name]" placeholder="First Name" value="<?php if($this->Session->read('Auth')){  
                        echo $_SESSION['Auth']['User']['first_name'];
                        }?>" >
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text">Last Name</label>
                     <input type="text" class="contactmodal" name="data[User][last_name]" placeholder="Last Name" value="<?php if($this->Session->read('Auth')){  
                        echo $_SESSION['Auth']['User']['last_name'];
                        }?>" >
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text">Mobile Number</label>
                     <input type="tel" class="contactmodal phone" name="data[User][phone]" placeholder="Mobile Number" value="<?php if($this->Session->read('Auth')){  
                        echo $_SESSION['Auth']['User']['phone'];
                        }?>">
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text">Email Address</label>
                     <input type="email" class="contactmodal" name="data[User][email_id]" placeholder="Email Address" value="<?php if($this->Session->read('Auth')){  
                        echo $_SESSION['Auth']['User']['email_id'];
                        }?>">
                  </div>
                  <div class="col-lg-12">
                     <br>
                     <div class="text-center">
                        <button class="site-btn modal-btn" id="non<?php echo $id ?>" onclick="nonRail(this)">Submit</button>
                     </div>
                  </div>
				  </div>
               </div>
               <?php echo $this->Form->end(); ?>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>
</div>
</div>
<?php } 
}?>
<!-- /////////// Indivitual NON Rail Cousre-->
<!-- Orgnisation Non rail courses-->
<?php $url = $this->here; 
//echo $url; 
$course = $this->requestAction(array('controller' =>'courses', 'action' =>'booknow'));
if($url == "/courses/construction"){
	$course = $this->requestAction(array('controller' =>'courses', 'action' =>'construction')); 
	}else if($url=="/courses/plant_operation"){ 
		$course = $this->requestAction(array('controller' =>'courses', 'action' =>'plant_operation')); 
		}else if($url=="/courses/small_tools"){
			$course = $this->requestAction(array('controller' =>'courses', 'action' =>'small_tools')); 
		}else if($url=="/courses/health_safety"){
			$course = $this->requestAction(array('controller' =>'courses', 'action' =>'health_safety')); 
		}
   foreach($course as $value) {
		if($value['Sector']['id'] != "1"){	
		 $id = $value['Course']['id'];?>
<div class="modal fade" id="orgnisationnonrail<?php echo $value['Course']['id'];?>" data-backdrop="static">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Booking Form <span class="railcousre">(Non Rail Courses)</span></h4>
            <button type="button" class="close" data-dismiss="modal" data-toggle="modal" data-target="" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="col-sm-12" id="org<?php echo $id ?>">
           
               <?php echo $this->Form->create('User', array('controller'=>'users','action'=>'companynonrail','class' => 'comment-form --contact text-center form')); ?>
               <ul class="nav nav-tabs footer_tabs" role="tablist">
                  <li class="nav-item col-sm-6" role="presentation">
                     <a class="nav-link active" href="#step1<?php echo $value['Course']['id'];?>" role="tab" data-toggle="tab" aria-controls="step1" title="step1" id="steps44">Step - 1</a>
                  </li>
                  <li class="nav-item disabled col-sm-6" role="presentation">
                     <a class="nav-link" href="#step2<?php echo $value['Course']['id'];?>" role="tab" data-toggle="tab" aria-controls="step2" title="step2" id="steps55">Step - 2</a>
                  </li>
               </ul>
               <div class="">
                  <div class="tab-content">
                     <div role="tabpanel" class="tab-pane fade in active show" id="step1<?php echo $value['Course']['id'];?>">
                        <div class="row">
                           <div class="col-lg-6">
                              <label class="form-text">Course</label>
                              <input type="text" class="contactmodal" name="data[User][course_name]" placeholder="Course" value="<?php echo $value['Course']['course_name'];?>">
                           </div>
                           <div class="col-lg-6">
                              <label class="form-text">Course Duration</label>
                              <input type="text" class="contactmodal" name="data[User][duration]" placeholder="Course Duration" value="<?php echo $value['Course']['duration'];?>">
                           </div>
                           <div class="col-lg-6">
                              <label class="form-text">Location</label>
                              <input type="text" class="contactmodal" name="data[User][location]"  placeholder="Location" value="<?php echo $value['Location']['location'];?>">
                           </div>
                           <div class="col-lg-6">
                              <label class="form-text">Course Date</label>
                              <input type="text" class="contactmodal" name="data[User][start_date]" id="orgdate<?php echo $value['Course']['id'];?>"  placeholder="Course Date" value="">
                           </div>
                           <div class="col-lg-12">
                              <label class="form-text">Course Time</label>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <input type="text" class="contactmodal" name="data[User][start_time]" placeholder="Start Time" value="<?php echo $value['Course']['start_time'];?>">
                                 </div>
                                 <div class="col-lg-6">
                                    <input type="text" class="contactmodal" name="data[User][end_time]" placeholder="End Time" value="<?php echo $value['Course']['end_time'];?>">
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <label class="form-text">Price Per Deligates(excl VAT)</label>
                              <input type="text" class="contactmodal" name="data[User][delegate_price]" placeholder="Price Per Deligates" value="&#163;<?php echo $value['Course']['delegate_price'];?>">
                           </div>
						    <div class="col-lg-6">
                              <label class="form-text">Price Per Deligates(incl VAT)</label>
                              <input type="text" class="contactmodal" name="data[User][delegate_price]" readonly="true" placeholder="Price Per Deligates" value="&#163;<?php echo $value['Course']['delegate_price'] +  $value['Course']['delegate_price'] * 20/100 ;?>">
                           </div>
                           <div class="col-lg-12" align="right">
                              <ul class="nav nav-tabs" role="tablist" style="float:right;">
                                 <li class="nav-item disabled" role="presentation">
                                    <a class="site-btn modal-btn Add_btn" href="#step2<?php echo $value['Course']['id'];?>" role="tab" data-toggle="tab" aria-controls="step2" title="step2" id="steps33"><i class="fa fa-angle-double-right"></i></a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div role="tabpanel" class="tab-pane fade" id="step2<?php echo $value['Course']['id'];?>">
                        <div class="row">
						   <div class="col-lg-4">
                              <label class="form-text">Company Name</label>
                              <input type="tel" class="contactmodal" name="data[User][company]" placeholder="Company Name" value="<?php if($this->Session->read('Auth')){  
                                 if($_SESSION['Auth']['User']['user_type']=="Company"){
                                 echo $_SESSION['Auth']['User']['company'];
                                 }}?>">
                           </div>
						   <div class="col-lg-4">
                              <label class="form-text">Contact Number</label>
                              <input type="tel" class="contactmodal" name="data[User][phone]" placeholder="Contact Number" value="<?php if($this->Session->read('Auth')){  
                                 if($_SESSION['Auth']['User']['user_type']=="Company"){
                                 echo $_SESSION['Auth']['User']['phone'];
                                 }}?>">
                           </div>
						   <div class="col-lg-4">
                              <label class="form-text">Company email address</label>
                              <input type="tel" class="contactmodal" name="data[User][companyemail]" placeholder="Company email address" value="<?php if($this->Session->read('Auth')){  
                                 if($_SESSION['Auth']['User']['user_type']=="Company"){
                                 echo $_SESSION['Auth']['User']['companyemail'];
                                 }}?>">
                           </div></div>
                           <div class="row">
                                <div class="col-lg-3">
                                    <label class="form-text">First Name</label>
                                    <input type="text" class="contactmodal" name="data[first_name][]" placeholder="First Name" value="<?php if($this->Session->read('Auth')){  
                                        if($_SESSION['Auth']['User']['user_type']=="Company"){
                                        echo $_SESSION['Auth']['User']['first_name'];
                                        }}?>">
                                </div>
                                <div class="col-lg-3">
                                    <label class="form-text">Last Name</label>
                                    <input type="text" class="contactmodal" name="data[last_name][]" placeholder="Last Name" value="<?php if($this->Session->read('Auth')){  
                                        if($_SESSION['Auth']['User']['user_type']=="Company"){
                                        echo $_SESSION['Auth']['User']['last_name'];
                                        }}?>" >
                                </div>
                           
                                <div class="col-lg-3">
                                    <label class="form-text">Price Per Deligates(excl VAT)</label>
                                    <input type="text" class="contactmodal" name="data[delegate_price][]" placeholder="Price Per Deligates(excl VAT)" id="61ddlSelect1<?php echo $value['Course']['id'];?>" value="&#163;<?php echo $value['Course']['delegate_price'];?>">
                                </div>
                                <div class="col-lg-3">
                                    <label class="form-text">Price Per Deligates(incl VAT)</label>
                                    <input type="text" class="contactmodal" name="data[delegate_price][]" placeholder="Price Per Deligates(incl VAT)" id="71ddlSelect1<?php echo $value['Course']['id'];?>" value="&#163;<?php echo $value['Course']['delegate_price'] +  $value['Course']['delegate_price'] * 20/100 ;?>">
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-lg-3">
                                    <label class="form-text">First Name</label>
                                    <input type="text" class="contactmodal" name="data[first_name][]" placeholder="First Name" value="">
                                </div>
                                <div class="col-lg-3">
                                    <label class="form-text">Last Name</label>
                                    <input type="text" class="contactmodal" name="data[last_name][]" placeholder="Last Name" value="" >
                                </div>
                           
                                <div class="col-lg-3">
                                    <label class="form-text">Price Per Deligates(excl VAT)</label>
                                    <input type="text" class="contactmodal" name="data[delegate_price][]" placeholder="Price Per Deligates(excl VAT)" id="" value="&#163;<?php echo $value['Course']['delegate_price'];?>">
                                </div>
                                <div class="col-lg-3">
                                    <label class="form-text">Price Per Deligates(incl VAT)</label>
                                    <input type="text" class="contactmodal" name="data[delegate_price][]" placeholder="Price Per Deligates(incl VAT)" id="" value="&#163;<?php echo $value['Course']['delegate_price'] +  $value['Course']['delegate_price'] * 20/100 ;?>">
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-lg-3">
                                    <label class="form-text">First Name</label>
                                    <input type="text" class="contactmodal" name="data[first_name][]" placeholder="First Name" value="">
                                </div>
                                <div class="col-lg-3">
                                    <label class="form-text">Last Name</label>
                                    <input type="text" class="contactmodal" name="data[last_name][]" placeholder="Last Name" value="" >
                                </div>
                           
                                <div class="col-lg-3">
                                    <label class="form-text">Price Per Deligates(excl VAT)</label>
                                    <input type="text" class="contactmodal" name="data[delegate_price][]" placeholder="Price Per Deligates(excl VAT)" id="" value="&#163;<?php echo $value['Course']['delegate_price'];?>">
                                </div>
                                <div class="col-lg-3">
                                    <label class="form-text">Price Per Deligates(incl VAT)</label>
                                    <input type="text" class="contactmodal" name="data[delegate_price][]" placeholder="Price Per Deligates(incl VAT)" id="" value="&#163;<?php echo $value['Course']['delegate_price'] +  $value['Course']['delegate_price'] * 20/100 ;?>">
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-lg-3">
                                    <label class="form-text">First Name</label>
                                    <input type="text" class="contactmodal" name="data[first_name][]" placeholder="First Name" value="">
                                </div>
                                <div class="col-lg-3">
                                    <label class="form-text">Last Name</label>
                                    <input type="text" class="contactmodal" name="data[last_name][]" placeholder="Last Name" value="" >
                                </div>
                           
                                <div class="col-lg-3">
                                    <label class="form-text">Price Per Deligates(excl VAT)</label>
                                    <input type="text" class="contactmodal" name="data[delegate_price][]" placeholder="Price Per Deligates(excl VAT)" id="" value="&#163;<?php echo $value['Course']['delegate_price'];?>">
                                </div>
                                <div class="col-lg-3">
                                    <label class="form-text">Price Per Deligates(incl VAT)</label>
                                    <input type="text" class="contactmodal" name="data[delegate_price][]" placeholder="Price Per Deligates(incl VAT)" id="" value="&#163;<?php echo $value['Course']['delegate_price'] +  $value['Course']['delegate_price'] * 20/100 ;?>">
                                </div>
                        </div>
                  
                        <div id='2ddlSelect1<?php echo $value['Course']['id'];?>'></div>
                        <div class="row">
                        <div class="col-lg-6" align="right"> <label class="form-text" style="padding-top:20px">Total(incl VAT)</label></div>
                        <div class="col-lg-6">
                             
                              <input type="text" class="contactmodal" name="data[delegate_price][]" placeholder="Total" id="" value="">
                           </div></div>
                        <div class="row">
                           <div class="col-lg-12 booking button">
                              <div class="form-group booking-form">
                                 <select class="form-control ddlSelect1" id="ddlSelect1<?php echo $value['Course']['id'];?>" name="ddlSelect1">
                                    <option>Add Box</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                 </select>
                              </div>
                           </div>
						  <div class="col-lg-12">
                  <div class="text-center">
                     <button class="site-btn modal-btn" id="org<?php echo $id ?>"onclick="orgRail(this)">Submit</button>
                  </div>
               </div>
                     </div>
                  </div>
               </div>
               </div>
            </div>
            </form>
         </div>
      </div>
      <!-- Modal footer -->
   </div>
</div>
<?php } 
}?>
<!-- The Modal -->

<!-- Footer section end-->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6acYWq5ZyYm9lspmm16T9zwCjzHnyygI&sensor=false&libraries=geometry,places&ext=.js"></script>

<?php 
   
   	echo $this->Html->script('jquery.countdown.js');
   	echo $this->Html->script('magnific-popup.min.js');
   
    echo $this->Html->script('popper.min.js');
   	echo $this->Html->script('bootstrap.min.js');
   	echo $this->Html->script('lightgallery.js');
   	echo $this->Html->script('jquery.js');
   	echo $this->Html->script('jquery.validate.min.js');
   	echo $this->Html->script('jquery.additional.js');
   	echo $this->Html->script('eagle.gallery.min.js');
    echo $this->Html->script('datepicker.js');
    echo $this->Html->script('owl.carousel.min.js');
    echo $this->Html->script('script.js');
    echo $this->Html->script('main.js');
   ?>
   
<script>
function resetPassword(){
	var email = $('#ResetEmail').val();
	//alert(email);
	if (email == '') {
 $('#emptyemail').html('Email should not be blank.').addClass('error').fadeIn().delay(3000).fadeOut();
 return false;
 } else {
 apos = email.indexOf("@");
 dotpos = email.lastIndexOf(".");
 if (email != '') {
 var eml = 1;
 if (apos < 1 || dotpos < 2)
 {
 $("#emptyemail").html("Please enter valid email.").addClass('error').fadeIn().delay(3000).fadeOut();

 var eml = 0;
 return false;
 }
 }
 }
	
	$.ajax({
 url: SITEPATH + "users/resetPassword/",
 data: "data[email]=" + email,
 type: "POST",
 success: function(result) {

 if (result == 1) {
 alert("Please check your Email to reset your password.");
 window.location.reload();
 }else {
 $('#successemail1').html('Incorrect email please try again.').addClass('error').fadeIn().delay(3000).fadeOut();
 }
 }
 });

}

</script> 


	<script>
	  function loginform() {
		  var email_id = $("#email_id").val();
		  var password = $("#password").val();
		  //alert(password);
		  if (email_id == '') {
           $('#emptyemail_id').html('Please enter an email address.').addClass('error').fadeIn().delay(3000).fadeOut();
           return false;
		   }else {
			apos = email_id.indexOf("@");
			dotpos = email_id.lastIndexOf(".");
			if (email_id != '') {
               var eml = 1;
               if (apos < 1 || dotpos < 2) {
                   $("#emptyemail_id").html("Please enter valid email address.").addClass('error').fadeIn().delay(3000).fadeOut();
   
                   var eml = 0;
                   return false;
               }
           }
		}if(password == '') {
           $('#emptypassword').html('Please enter an password.').addClass('error').fadeIn().delay(3000).fadeOut();
           return false;
		}
		
		$.ajax({
			url: SITEPATH + "users/login",
			data: {
                email_id: email_id,
				    password: password
            },
			type: "POST",
			success: function (result) {
				//alert(result);
				if(result == 2){ // if true (1)
					setTimeout(function(){// wait for 5 secs(2)
					location.reload(); // then reload the page.(3)
					}, 1000);
				}else{
				$('#errorMsg').html('Please enter valid Email and Password.').addClass('error').fadeIn().delay(3000).fadeOut();
				return false;	
				}
            }
		});
	  }
	</script>
	
<script type="text/javascript">
  var validator=$("#contactForm").validate({rules:{"data[Contact][name]":{required:!0},'data[Contact][phone]':{required:!0},"data[Contact][email]":{required:!0,email:!0},"data[Contact][message]":{required:!0}},messages:{"data[Contact][name]":{required:"Name should not be blank."},"data[Contact][email]":{required:"Email should not be blank."},
  "data[Contact][phone]":{required: "Phone number should not be blank."},
  "data[Contact][message]":{required:"Message should not be blank."}}});
</script>
<script type="text/javascript">
/* var validator=$("#loginForm").validate({rules:{"data[User][email_id]":{required:!0,email:!0},"data[User][password]":{required:!0}},messages:{"data[User][email_id]":{required:"Email Address should not be blank."},"data[User][password]":{required:"Password should not be blank."}}}); */
</script>
<script type="text/javascript">
var validator=$("#comapanyForm").validate({rules:{"data[User][first_name]":{required:!0},"data[User][last_name]":{required:!0},"data[User][company_position]":{required:!0},"data[User][email_id]":{required:!0,email:!0,remote:{url:SITEPATH+"users/checkEmail",type:"post"}},"data[User][confirm_email_id]":{required:!0,email:!0,equalTo:"#Useremail"},"data[User][company]":{required:!0},"data[User][phone]":{required:!0,minlength:3,maxlength:15},"data[User][password]":{required:!0},"data[User][confirm_password]":{required:!0,equalTo:"#UserPassword"},"data[User][checkbox]":{required:!0}},messages:{"data[User][first_name]":{required:"First Name should not be blank."},"data[User][last_name]":{required:"Last Name should not be blank."},"data[User][company_position]":{required:"Company Position should not be blank."},"data[User][email_id]":{required:"Email should not be blank.",email:"Enter a vaild email.",remote:"This Email is already in Use. Please Use Another."},"data[User][confirm_email_id]":{required:"Confirm Email should not be blank.",email:"Enter a valid email.",equalTo:"Both email must match."},"data[User][company]":{required:"Company Name should not be blank."},"data[User][phone]":{required:"Contact Number should not be blank.",minlength:"Contact Number should not be less than 3 digit.",maxlength:"Contact Number should not be more than 15 digit."},"data[User][password]":{required:"Password should not be blank."},"data[User][confirm_password]":{required:"Confirm Password should not be blank.",equalTo:"Both password must match."},"data[User][checkbox]":{required:"Please select check box."}}});
</script>
<script type="text/javascript">
  var validator=$("#UserRegisterForm").validate({rules:{"data[User][first_name]":{required:!0},"data[User][last_name]":{required:!0},"data[User][email_id]":{required:!0,email:!0,remote:{url:SITEPATH+"users/checkEmail",type:"post"}},"data[User][confirm_email_id]":{required:!0,email:!0,equalTo:"#Useremail1"},"data[User][address]":{required:!0},"data[User][phone]":{required:!0,minlength:3,maxlength:15},"data[User][password]":{required:!0},"data[User][confirm_password]":{required:!0,equalTo:"#UserPassword1"},"data[User][gender]":{required:!0},"data[User][maritalstatus]":{required:!0},"data[User][age]":{required:!0},"data[User][ethnic]":{required:!0},"data[User][sub_ethnic]":{required:!0},"data[User][disability]":{required:!0},"data[User][checkbox]":{required:!0}},messages:{"data[User][first_name]":{required:"First Name should not be blank."},"data[User][last_name]":{required:"Last Name should not be blank."},"data[User][email_id]":{required:"Email should not be blank.",remote:"This Email is already in Use. Please Use Another."},"data[User][confirm_email_id]":{required:"Confirm Email should not be blank.",email:"Enter a valid email.",equalTo:"Both email must match."},"data[User][address]":{required:"Address should not be blank."},"data[User][phone]":{required:"Mobile Number should not be blank.",minlength:"Mobile Number should not be less than 3 digit.",maxlength:"Mobile Number should not be more than 15 digit."},"data[User][password]":{required:"Password should not be blank."},"data[User][confirm_password]":{required:"Confirm Password should not be blank.",equalTo:"Both password must match."},"data[User][gender]":{required:"Please select gender."},"data[User][maritalstatus]":{required:"Please select marital status."},"data[User][age]":{required:"Please select age group."},"data[User][ethnic]":{required:"Please select ethnic group."},"data[User][sub_ethnic]":{required:"Please select sub-ethnic group."},"data[User][disability]":{required:"Please select disability."},"data[User][checkbox]":{required:"Please select check box."}}});
</script>
<script type="text/javascript">
	function individualRail(id){
	//	alert(id);alert("#"+id);
  var validator=$("#"+id).validate({rules:{"data[User][first_name]":{required:!0},"data[User][last_name]":{required:!0},"data[User][email_id]":{required:!0,email:!0},"data[User][phone]":{required:!0},"data[User][checkbox]":{required:!0},"data[User][sentinel]":{required:!0}},messages:{"data[User][first_name]":{required:"First Name should not be blank."},"data[User][last_name]":{required:"Last Name should not be blank."},"data[User][email_id]":{required:"Email should not be blank."},"data[User][phone]":{required:"Phone should not be blank."},"data[User][checkbox]":{required:"Please select check box."},"data[User][sentinel]":{required:"Sentinel number should not be blank."}}});
  }
</script>
<script type="text/javascript">
  function OrganizationRail(obj){
	  var id = obj.id
	  //alert(id);alert("#"+id+ " form");
  var validator=$("#"+id + " form").validate({rules:{"data[User][course_name]":{required:!0},"data[User][duration]":{required:!0},"data[User][location]":{required:!0},"data[User][start_date]":{required:!0},"data[User][start_time]":{required:!0},"data[User][end_time]":{required:!0},"data[User][delegate_price]":{required:!0},"data[User][first_name]":{required:!0},"data[User][last_name]":{required:!0},"data[User][sentinel]":{required:!0},"data[User][delegate_price]":{required:!0},"data[User][company]":{required:!0},"data[User][phone]":{required:!0},"data[User][companyemail]":{required:!0},"data[User][companysentinel]":{required:!0}},messages:{"data[User][course_name]":{required:"Course should not be blank."},"data[User][duration]":{required:"Duration should not be blank."},"data[User][location]":{required:"Location should not be blank."},"data[User][start_date]":{required:"Course time should not be blank."},"data[User][start_time]":{required:"Start time should not be blank."},"data[User][end_time]":{required:"End time should not be blank."},"data[User][delegate_price]":{required:"Price per delegate should not be blank."},"data[User][first_name]":{required:"First Name should not be blank."},"data[User][last_name]":{required:"Last Name should not be blank."},"data[User][sentinel]":{required:"Sentinel number should not be blank."},"data[User][delegate_price]":{required:"Price per delegate should not be blank."},"data[User][company]":{required:"Sponser name should not be blank."},"data[User][phone]":{required:"Sponser contact number should not be blank."},"data[User][companyemail]":{required:"Sponser email should not be blank."},"data[User][companysentinel]":{required:"Sponser sentinel number should not be blank."}}});
  }
</script>
<script type="text/javascript">
 function nonRail(obj){
	  var id = obj.id
	  //alert(id);alert("#"+id+ " form");
var validator=$("#"+id + " form").validate({rules:{"data[User][first_name]":{required:!0},"data[User][last_name]":{required:!0},"data[User][email_id]":{required:!0,email:!0},"data[User][phone]":{required:!0}},messages:{"data[User][first_name]":{required:"First Name should not be blank."},"data[User][last_name]":{required:"Last Name should not be blank."},"data[User][email_id]":{required:"Email should not be blank."},"data[User][phone]":{required:"Phone should not be blank."}}});
}
</script>
<script type="text/javascript">
 function orgRail(obj){
	  var id = obj.id
	 // alert(id);alert("#"+id+ " form");
  var validator=$("#"+id+ " form").validate({rules:{"data[User][course_name]":{required:!0},"data[User][duration]":{required:!0},"data[User][location]":{required:!0},"data[User][start_date]":{required:!0},"data[User][start_time]":{required:!0},"data[User][end_time]":{required:!0},"data[User][delegate_price]":{required:!0},"data[first_name][]":{required:!0},"data[last_name][]":{required:!0},"data[User][companyemail]":{required:!0,email:!0},"data[User][company]":{required:!0},"data[User][phone]":{required:!0,minlength:3,maxlength:15}},messages:{"data[User][course_name]":{required:"Course should not be blank."},"data[User][duration]":{required:"Duration should not be blank."},"data[User][location]":{required:"Location should not be blank."},"data[User][start_date]":{required:"Course time should not be blank."},"data[User][start_time]":{required:"Start time should not be blank."},"data[User][end_time]":{required:"End time should not be blank."},"data[User][delegate_price]":{required:"Price per delegate should not be blank."},"data[first_name][]":{required:"First Name should not be blank."},"data][last_name][]":{required:"Last Name should not be blank."},"data[User][companyemail]":{required:"Email should not be blank."},"data[User][company]":{required:"Company name should not be blank."},"data[User][phone]":{required:"Contact number should not be blank.",minlength:"Contact number should not be less than 3 digit.",maxlength:"Contact number should not be more than 15 digit."}}});
 }
</script>


<script>
var _ROOT="<?php echo $this->Html->url('/', true); ?>";function myFunctionss(e){var t=e.value,n=_ROOT+"courses/"+t;document.getElementById("screen").href=n};
var _ROOT="<?php echo $this->Html->url('/', true); ?>";function myFunctionsss(e){var t=e.value,n=_ROOT+"courses/"+t;document.getElementById("screen").href=n}
</script>
<script>
var _ROOT="<?php echo $this->Html->url('/', true); ?>";function myFunctionss(e){var t=e.value,l=_ROOT+"courses/"+t;document.getElementById("screen").href=l,document.getElementById("displayindi").style.display="none",document.getElementById("displayindiv").style.display="none",document.getElementById("btndisabled").style.display="inline-block",document.getElementById("displayindis").style.display="block",document.getElementById("displayindivs").style.display="block",document.getElementById("coursesr").value="select"};
var _ROOT="<?php echo $this->Html->url('/', true); ?>";function myFunctionsss(e){var t=e.value,l=_ROOT+"courses/"+t;document.getElementById("screen").href=l,document.getElementById("displayindis").style.display="none",document.getElementById("displayindivs").style.display="none",document.getElementById("btndisabled").style.display="inline-block",document.getElementById("displayindi").style.display="block",document.getElementById("displayindiv").style.display="block",document.getElementById("coursess").value="select"}
</script>
<script type="text/javascript">
$(document).ready(function(){
$(".ddlSelect").change(function(){
    var f = this.id;

    var n = $(this).data('id'); 
    //alert(n);
$("#1"+f).empty();
var e=this.value;

var j = document.getElementById("4"+f).value;
var k = document.getElementById("5"+f).value;

if(e>0)for(i=1;i<=e;i++){
    var a=$(document.createElement("div")).attr("id","divTxt"+i);a.after().html('\t<div class="row"><div class="col-lg-2"><label class="form-text">First Name</label><input type="text" class="contactmodal valid" name="data[first_name][]" placeholder="First Name" onkeypress="return ValidateAlpha(event);"></div><div class="col-lg-2"><label class="form-text">Last Name</label><input type="text" class="contactmodal valid" name="data[last_name][]" placeholder="Last Name" onkeypress="return ValidateAlpha(event);"></div><div class="col-lg-2"><label class="form-text">Sentinel Number</label><input type="tel" class="contactmodal" name="data[sentinel][]" maxlength="7" placeholder="Sentinel Number"></div><div class="col-lg-3"><label class="form-text">Price Per Deligates(excl VAT)</label><input type="text" class="contactmodal valid input" name="data[delegate_price][]" readonly="true" value="" placeholder="Price Per Deligates(excl VAT)" id="exc'+i+'"></div><div class="col-lg-3"><label class="form-text">Price Per Deligates(incl VAT)</label><input type="text" class="contactmodal valid newdd'+f+'" name="data[delegate_price][]" readonly="true" value=""  placeholder="Price Per Deligates(incl VAT)" id="inc'+i+'"></div></div><a href="#" id="'+n+'" class="remove">Remove</a>'),a.appendTo("#1"+f)
  document.getElementById("exc"+i).value = j;
   document.getElementById("inc"+i).value = k;
}
  var i = document.getElementById("TotVal"+n).value;

   var p = k*e;
   var qq = k*4;
   var kt = parseFloat(p) + parseFloat(qq);
   document.getElementById("TotVal"+n).value = kt;
   
}),$("body").on("click",".remove",function(){
  $(this).closest("div").remove()
  var kp = this.id;
  var ip = document.getElementById("TotVal"+kp).value;
  var pp = document.getElementById("5ddlSelect"+kp).value;
  var tt = parseFloat(ip) - parseFloat(pp);
  document.getElementById("TotVal"+kp).value = tt;
})
});


</script>
<script type="text/javascript">
$(document).ready(function(){$(".ddlSelect1").change(function(){
	var f=this.id;
    $("#2"+f).empty();
    var e=this.value;
    var jk = document.getElementById("61"+f).value;
    var kl = document.getElementById("71"+f).value;
    if(e>0)for(i=1;i<=e;i++){var a=$(document.createElement("div")).attr("id","divTxt"+i);a.after().html('\t<div class="row"><div class="col-lg-3"><label class="form-text">First Name</label><input type="text" class="contactmodal valid" name="data[first_name][]" placeholder="First Name" onkeypress="return ValidateAlpha(event);"></div><div class="col-lg-3"><label class="form-text">Last Name</label><input type="text" class="contactmodal valid" name="data[last_name][]" placeholder="Last Name" onkeypress="return ValidateAlpha(event);"></div><div class="col-lg-3"><label class="form-text">Price Per Deligates(excl VAT)</label><input type="text" class="contactmodal valid" name="data[delegate_price][]" id="exc1'+i+'" placeholder="Price Per Deligates(excl VAT)" ></div><div class="col-lg-3"><label class="form-text">Price Per Deligates(incl VAT)</label><input type="text" class="contactmodal valid" name="data[delegate_price][]"  id="inc1'+i+'"  placeholder="Price Per Deligates(incl VAT)" ></div></div><a href="#" id="remScnt" class="remove">Remove</a>'),a.appendTo("#2"+f)
    document.getElementById("exc1"+i).value = jk;
    document.getElementById("inc1"+i).value = kl;
 }}),$("body").on("click",".remove",function(){$(this).closest("div").remove()})});
</script>

<script type="text/javascript">
    var validator = $("#passid").validate({
        rules: {
            'data[User][old_password]': {
                required: true
            },
            'data[User][new_password]': {
                required: true,
                minlength:6
            },
            'data[User][confirm_password]': {
                required: true,
                equalTo:"#inputEmail"
            }
        },
        messages: {
            'data[User][old_password]': {
                required: "Old password  should not be blank</br>"
            },
            'data[User][new_password]': {
                required: "New password should not be blank"
            },
            
            'data[User][confirm_password]': {
                required: "Confirm password should not be blank",
                equalTo: jQuery.format("Both password must match.")
            }
        }
    });
</script>

<script type="text/javascript">
  var validator=$("#updateprofile").validate({rules:{"data[User][first_name]":{required:!0},"data[User][last_name]":{required:!0},"data[User][phone]":{required:!0,minlength:3,maxlength:15},"data[User][gender]":{required:!0},"data[User][maritalstatus]":{required:!0},"data[User][age]":{required:!0},"data[User][ethnic]":{required:!0},"data[User][sub_ethnic]":{required:!0},"data[User][disability]":{required:!0}},messages:{"data[User][first_name]":{required:"First Name should not be blank."},"data[User][last_name]":{required:"Last Name should not be blank."},"data[User][phone]":{required:"Mobile Number should not be blank.",minlength:"Mobile Number should not be less than 3 digit.",maxlength:"Mobile Number should not be more than 15 digit."},"data[User][gender]":{required:"Please select gender."},"data[User][maritalstatus]":{required:"Please select marital status."},"data[User][age]":{required:"Please select age group."},"data[User][ethnic]":{required:"Please select ethnic group."},"data[User][sub_ethnic]":{required:"Please select sub-ethnic group."},"data[User][disability]":{required:"Please select disability."}}});
</script>

<script type="text/javascript">
var validator=$("#comapanyprofile").validate({rules:{"data[User][first_name]":{required:!0},"data[User][last_name]":{required:!0},"data[User][company_position]":{required:!0},"data[User][company]":{required:!0},"data[User][phone]":{required:!0,minlength:3,maxlength:15}},messages:{"data[User][first_name]":{required:"First Name should not be blank."},"data[User][last_name]":{required:"Last Name should not be blank."},"data[User][company_position]":{required:"Company Position should not be blank."},"data[User][company]":{required:"Company Name should not be blank."},"data[User][phone]":{required:"Mobile Number should not be blank.",minlength:"Mobile Number should not be less than 3 digit.",maxlength:"Mobile Number should not be more than 15 digit."}}});
</script>
<script>
function myfu(obj){
    $('#buzz'+obj).addClass('in active show');
    $('#profile'+obj).removeClass('in active show');
    $('#step2'+obj).addClass('active');
    $('#step1'+obj).removeClass('active');
$(document).on("blur", ".ddlSelect"+obj, function() {
    var sum = 0;
    $(".ddlSelect"+obj).each(function(){
      //  alert($(this).val());
        sum += +$(this).val();
    });
    document.getElementById("TotVal"+obj).value = sum;
});

}
    </script>
    <script>
function myfu1(obj){
$(document).on("blur", ".ddlSelect"+obj, function() {
    var sum = 0;
    $(".ddlSelect"+obj).each(function(){
      //  alert($(this).val());
        sum += +$(this).val();
    });
    document.getElementById("TotVal"+obj).value = sum;
});

}
    </script>

<script>
function PreviousTab(obj){
    $('#profile'+obj).addClass('in active show');
    $('#buzz'+obj).removeClass('in active show');
    $('#step1'+obj).addClass('active');
    $('#step2'+obj).removeClass('active');
}

function NextTab(obj){
    $('#references'+obj).addClass('in active show');
    $('#buzz'+obj).removeClass('in active show');
    $('#step3'+obj).addClass('active');
    $('#step2'+obj).removeClass('active');
}
</script>
<script>
function PRETab(obj){
    $('#references'+obj).removeClass('in active show');
    $('#buzz'+obj).addClass('in active show');
    $('#step2'+obj).addClass('active');
    $('#step3'+obj).removeClass('active');
}
    </script>
<style>
   label.error , #individualform label.error , #orgnisationrail label.error{
   color: red;
   }
   button[disabled]{
    opacity: 0.6;
    cursor: default;
   }
   #emptyemail{
       display:none;
   }
   #emptyemail.error{
       display:block;
   }
</style>
</body>
</html>