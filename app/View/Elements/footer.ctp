<!-- Event section -->
<!-- Event section -->
<section class="event-section">
   <div class="container">
      <div id="example3" class="eagle-gallery img300">
         <div class="owl-carousel">
            <?php $sponsor = $this->requestAction(array('controller' => 'homes', 'action' => 'index'));
               foreach($sponsor as $result) { 
                  if($result['SponsorImage']['id']==5){continue;}
                  ?>
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
                     <div class="social pt-1"> <a href="https://www.facebook.com/" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a> <a href="https://twitter.com/login?lang=en" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a> <a href="https://www.linkedin.com/in/techno-cta-ltd-b0831b159/" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a> </div>
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
               <p>Copyright © 2020 TechnoCTA Ltd. All Rights Reserved. </p>
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
                  <a href="#" data-toggle="modal" id="modalsforg" data-target="#myModal2" data-dismiss="modal">
                     <h5>Forgot Password ?</h5>
                  </a>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="Register">
                  <a href="#" id="modalsforgs" data-toggle="modal" data-target="#myModal8" data-dismiss="modal">
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
                        <button class="site-btn modal-btn" data-toggle="modal" data-target="#myModal4" data-dismiss="modal">Company/Sponsor</button>
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
                    
                     <div class="col-lg-12">                    
                        <input type="text" class="contactmodal" id="ResetEmail"  placeholder="Email Address" >
                        <div id="successemail1" style='color:red'></div>
                        <p id="forgetdiv" style=" margin: 5px 0; text-align: center; background: #5cb85c; color: #fff; padding: 5px; display:none;">Please check your Email to reset your password.</p>

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
                     <input type="text" class="contactmodal" onkeypress="javascript:return isNumber(event)" name="data[User][phone]" maxlength="14" placeholder="Contact Number" >
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
                     <input type="tel" class="contactmodal phone" onkeypress="javascript:return isNumber(event)" maxlength="14" name="data[User][phone]" placeholder="Mobile Number">
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
                        <span>Rail Course</span>
                        <select name="coursess" id="coursesr" data-id="s1" class="contactmodal" onchange="myFunctionsss(this);">
                           <option value="" selected>Select Option</option>
                           <option value="railway_safety">Railway Safety</option>
                        </select>
                     </div>
                     <div class="col-md-6">
                        <span>Non-Rail Course</span>
                        <select name="coursess" id="coursess" data-id="s2" class="contactmodal" onchange="myFunctionss(this);">
                           <option value="" selected> Select Option</option>
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
                        <a class="site-btn modal-btn disbbtn" id="screen" href="" >Submit</a>
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
            <div class="col-sm-12" id="ind<?php echo $value['Course']['id'];?>">
               <?php echo $this->Form->create('User', array('controller'=>'users','action'=>'individualbooking','class' => 'comment-form --contact text-center form individualform')); ?>
               <?php //echo $this->Form->create('User', array('controller'=>'users','action'=>'individualbooking','class' => 'comment-form --contact text-center form individualform', 'id'=>'I'+$id)); ?>
			    <div class="col-lg-12 booking">
				<h2 style="font-size: 18px;text-align: center;color: red;">TRAINING SPONSORSHIP AGREEMENT COURSE ONLINE BOOKING FORM</h2>
                     <p>Last booking for online booking should be no later than 48 hours of the start date</p>
                     <p class="contact_detail">*IF YOU DON’T HAVE SENTINEL ID NUMBER, please call us directly 
                        <a href="tel:02070550877">0207 055 0877</a>
                     </p>
                  </div>
			   <ul class="nav nav-tabs footer_tabs" role="tablist">
                  <li class="nav-item col-sm-4" role="presentation">
                     <p class="nav-link active" id="Istep1<?php echo $value['Course']['id'];?>">Step - 1</p>
                  </li>
                  <li class="nav-item disabled col-sm-4" role="presentation">
                     <p class="nav-link" id="Istep2<?php echo $value['Course']['id'];?>">Step - 2</p>
                  </li>
				  <li class="nav-item disabled col-sm-4" role="presentation">
                           <p class="nav-link" id="Istep3<?php echo $value['Course']['id'];?>">Step - 3</p>
                    </li>
               </ul>
               <div class="">
                  <div class="tab-content">
                     <div role="tabpanel" class="tab-pane fade in active show" id="Iprofile<?php echo $value['Course']['id'];?>">
                        <div class="row">
                           <div class="col-lg-6">
                              <label class="form-text">Course</label>
							   <input type="hidden" name="data[User][course_id]" value="<?php echo $value['Course']['id'];?>">
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
                             
                                 <div class="col-lg-6 ">
                                    <input type="text" class="contactmodal" name="data[User][start_time]" id="stime<?php echo $value['Course']['id'];?>" readonly="true" placeholder="Start Time" value="">
                                    
                                 </div>
                                 <div class="col-lg-6 ">
                                    <input type="text" class="contactmodal" name="data[User][end_time]" id="etime<?php echo $value['Course']['id'];?>" readonly="true" placeholder="End Time" value="">
                                   
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6 dollar">
                              <label class="form-text">Price Per Delegates (excl VAT)</label>
                              <input type="text" class="contactmodal" name="data[User][delegate_price]" readonly="true" placeholder="Price Per Delegates" value="<?php echo $value['Course']['delegate_price'];?>">
                              <p class="dollarsign">&#163;</p>
                           </div>
						    <div class="col-lg-6 dollar" >
                              <label class="form-text">Price Per Delegates (Incl VAT)</label>
                              <input type="text" class="contactmodal" name="data[User][price_incvat]" readonly="true" placeholder="Price Per Delegates" value="<?php echo $value['Course']['delegate_price'] +  $value['Course']['delegate_price'] * 20/100 ;?>">
                              <p class="dollarsign">&#163;</p>
                           </div>
                           <div class="col-lg-12" align="right">
                              <ul class="nav nav-tabs" role="tablist" style="float:right;">
                                 <li class="nav-item disabled" role="presentation">
                                    <a class="site-btn modal-btn Add_btn" href="#" onclick="IFunction(<?php echo $value['Course']['id'];?>);" title="Next" ><i class="fa fa-angle-double-right"></i></a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div role="tabpanel" class="tab-pane fade" id="Ibuzz<?php echo $value['Course']['id'];?>">
               <div class="row">
                  <div class="col-lg-6">
                     <label class="form-text">First Name</label>
                     <input type="text" class="contactmodal" name="data[User][first_name]" placeholder="First Name" value="<?php if($this->Session->read('Auth')){  
                        echo $_SESSION['Auth']['User']['first_name'];
                        }?>" readonly="true" >
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text">Last Name</label>
                     <input type="text" class="contactmodal" name="data[User][last_name]" placeholder="Last Name" value="<?php if($this->Session->read('Auth')){  
                        echo $_SESSION['Auth']['User']['last_name'];
                        }?>" readonly="true">
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text">Mobile Number</label>
                     <input type="tel" class="contactmodal phone" name="data[User][phone]" placeholder="Mobile Number" onkeypress="javascript:return isNumber(event)" value="<?php if($this->Session->read('Auth')){  
                        echo $_SESSION['Auth']['User']['phone'];
                        }?>" readonly="true">
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text">Email Address</label>
                     <input type="email" class="contactmodal" name="data[User][email_id]" placeholder="Email Address"  value="<?php if($this->Session->read('Auth')){  
                        echo $_SESSION['Auth']['User']['email_id'];
                        }?>" readonly="true">
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text">Sentinel Number</label>
                     <input type="tel" class="contactmodal" name="data[User][sentinel]" onkeyup = sentinal(<?php echo $value['Course']['id'];?>) minlength="6" maxlength="7" placeholder="Sentinel Number" value="" id="sent<?php echo $value['Course']['id'];?>">
                     <label id="lsent<?php echo $value['Course']['id'];?>" style="display:none;color:red;font-size:13px;">Sentinel Number should not be blank</label>
                     <label id="l6sent<?php echo $value['Course']['id'];?>" style="display:none;color:red;font-size:13px;">Sentinel Number should not be less than 6 digit and more than 7 digit</label>
                  </div>
                  <div class="col-lg-12">
                     <label class="form-text">Do you have a valid Drug & Alcohol Screen at the time of the course?</label> 
                  </div>
                  <div class="col-lg-3">
                     <label class="gender checkeddesun">Yes
                     <input type="radio" value="Yes" name="data[User][drug]" onclick="DisableDrug<?php echo $value['Course']['id'];?>(<?php echo $value['Course']['id'];?>)" id="YD<?php echo $value['Course']['id'];?>">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-3">
                     <label class="gender checkeddesun">No
                     <input type="radio" value="No" name="data[User][drug]" onclick="DisableDrug<?php echo $value['Course']['id'];?>(<?php echo $value['Course']['id'];?>)" id="DD<?php echo $value['Course']['id'];?>">
                     <span class="checkmark"></span>
                     </label>
                  </div>
               
				  <div class="col-lg-3">
                     <label class="gender checkeddesun">Not applicable
                     <input type="radio" value="Not applicable" name="data[User][drug]" onclick="DisableDrug<?php echo $value['Course']['id'];?>(<?php echo $value['Course']['id'];?>)" id="ND<?php echo $value['Course']['id'];?>">
                     <span class="checkmark"></span>
                     </label>
                  </div>

              <!--   <div class="col-lg-3">
                     <label class="gender checkeddesun">Not Sure
                     <input type="radio" value="Not Sure" name="data[User][drug]" onclick="DisableDrug<?php //echo $value['Course']['id'];?>(<?php //echo $value['Course']['id'];?>)" id="DD<?php //echo $value['Course']['id'];?>">
                     <span class="checkmark"></span>
                     </label>
                  </div> -->

                  <div class="col-lg-12">
                     <label for="data[User][drug]" class="error"></label>
                  </div>
                  <div class="col-lg-12">
                     <label class="form-text">Do you have a valid Medical Examination at the time of the course?</label> 
                  </div>
                  <div class="col-lg-3">
                     <label class="gender checkeddesun">Yes
                     <input type="radio" value="Yes" name="data[User][medical]" onclick="DisableDrug<?php echo $value['Course']['id'];?>(<?php echo $value['Course']['id'];?>)" id="YM<?php echo $value['Course']['id'];?>">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-3">
                     <label class="gender checkeddesun">No
                     <input type="radio" value="No" name="data[User][medical]" onclick="DisableDrug<?php echo $value['Course']['id'];?>(<?php echo $value['Course']['id'];?>)" id="DM<?php echo $value['Course']['id'];?>">
                     <span class="checkmark"></span>
                     </label>
                  </div>
				  <div class="col-lg-3">
                     <label class="gender checkeddesun">Not applicable
                     <input type="radio" value="Not applicable" name="data[User][medical]" onclick="DisableDrug<?php echo $value['Course']['id'];?>(<?php echo $value['Course']['id'];?>)" id="NM<?php echo $value['Course']['id'];?>">
                     <span class="checkmark"></span>
                     </label>
                  </div>

                <!--   <div class="col-lg-3">
                     <label class="gender checkeddesun">Not Sure
                     <input type="radio" value="No" name="data[User][medical]" onclick="DisableDrug<?php //echo $value['Course']['id'];?>(<?php //echo $value['Course']['id'];?>)" id="DM<?php// echo $value['Course']['id'];?>">
                     <span class="checkmark"></span>
                     </label>
                  </div> -->

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
                     <input type="radio" value="Yes" name="data[User][elearning]" onclick="DisableDrug<?php echo $value['Course']['id'];?>(<?php echo $value['Course']['id'];?>)" id="YE<?php echo $value['Course']['id'];?>">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-lg-3">
                     <label class="gender checkeddesun">No
                     <input type="radio" value="No" name="data[User][elearning]"  onclick="DisableDrug<?php echo $value['Course']['id'];?>(<?php echo $value['Course']['id'];?>)" id="DE<?php echo $value['Course']['id'];?>">
                     <span class="checkmark"></span>
                     </label>
                  </div>
				  <div class="col-lg-3">
                     <label class="gender checkeddesun">Not applicable
                     <input type="radio" value="Not applicable" name="data[User][elearning]" onclick="DisableDrug<?php echo $value['Course']['id'];?>(<?php echo $value['Course']['id'];?>)" id="NE<?php echo $value['Course']['id'];?>">
                     <span class="checkmark"></span>
                     </label>
                  </div>

                <!-- <div class="col-lg-3">
                     <label class="gender checkeddesun">Not Sure
                     <input type="radio" value="No" name="data[User][elearning]"  onclick="DisableDrug<?php //echo $value['Course']['id'];?>(<?php //echo $value['Course']['id'];?>)" id="DE<?php //echo $value['Course']['id'];?>">
                     <span class="checkmark"></span>
                     </label>
                  </div> -->

                  <div class="col-lg-12">
                    <label id="lmsent<?php echo $value['Course']['id'];?>" style="display:none;color:red;font-size:13px;">You have not marked all answers, please mark the remaining answers.</label>
                     <label for="data[User][elearning]" class="error"></label>
                  </div>
				  <p>(If you have not completed the e-learning, we can arrange this prior to course date)</p>
				  <p style="color:red;Font-size:14px;display:none;" id="cmsg<?php echo $value['Course']['id'];?>">(If you have not completed your "Drug &amp; Alchol Screen" OR "Medical Examination" OR "e-learning", then you are not eligible for booking this course. Call us on( 02070550877) )</p>
				  <div class="col-lg-12" align="right">
                                 <ul class="nav nav-tabs" role="tablist" style="float:right;">
                                 <li class="nav-item disabled" role="presentation">
                                       <a class="site-btn modal-btn Add_btn" href="#" onclick="IPreviousTab(<?php echo $value['Course']['id'];?>);" title="Previous"><i class="fa fa-angle-double-left"></i></a>
                                    </li>
                                    <li class="nav-item disabled" role="presentation">
                                       <a class="site-btn modal-btn Add_btn" href="#" title="Next" id="disbl<?php echo $value['Course']['id'];?>" onclick="INextTab(<?php echo $value['Course']['id'];?>);"><i class="fa fa-angle-double-right"></i></a>
                                    </li>
                                 </ul>
                              </div>
               </div>
              
            </div>
			
			<div role="tabpanel" class="tab-pane fade" id="Ireferences<?php echo $value['Course']['id'];?>">
                           <div class="row">
                              <div class="col-lg-3">
                                 <label class="form-text">Sponsor Name</label>
                                 <input class="contactmodal" placeholder="Sponsor Name" id="sponsername<?php echo $value['Course']['id'];?>" type="text"  name="data[User][sponsor_company][]">
                               
                                    <div id="listsponsor<?php echo $value['Course']['id'];?>" class="suggest"></div>
                                    <div class="suggestother" id="Others<?php echo $value['Course']['id'];?>">
                                      <li id="Other<?php echo $value['Course']['id'];?>" onclick="showothr(<?php echo $value['Course']['id'];?>)">Other</li>
									         </div>
                                    <input class="contactmodal" placeholder="Type here" id="showther<?php echo $value['Course']['id'];?>"  type="text"  name="data[User][sponsor_company][]" autofocus="off" autocomplete="off" style="display:none;">
                              </div>
                              <div class="col-lg-3">
                                 <label class="form-text">Sponsor Contact Name</label>
                                 <input type="text" class="contactmodal" name="data[User][sponsor_name]" placeholder="Sponsor Contact Name" value="">
                              </div>
                              <div class="col-lg-3">
                                 <label class="form-text">Sponsor Contact Number</label>
                                 <input type="text" class="contactmodal" name="data[User][sponsor_phone]" maxlength="14" onkeypress="javascript:return isNumber(event)" placeholder="Sponsor Contact Number" value="">
                              </div>
                              <div class="col-lg-3">
                                 <label class="form-text">Sponsor Email Address</label>
                                 <input type="email" class="contactmodal" name="data[User][companyemail]" placeholder="Sponsor Email Address" value="">
                              </div>
                               <div class="col-lg-12">
                     <br>
                     <div class="text-center">
                        <button class="site-btn modal-btn" onclick="individualRail(<?php echo $value['Course']['id'];?>)">Submit</button>
                     </div>
                  </div>
                  <div class="col-lg-12" align="right">
                                 <ul class="nav nav-tabs" role="tablist" style="float:right;">
                                 <li class="nav-item disabled" role="presentation">
                                       <a class="site-btn modal-btn Add_btn" href="#" onclick="IPRETab(<?php echo $value['Course']['id'];?>);" title="Previous"><i class="fa fa-angle-double-left"></i></a>
                                    </li>
                                  
                                 </ul>
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
                  <h2 style="font-size: 18px;text-align: center;color: red;">TRAINING SPONSORSHIP AGREEMENT COURSE ONLINE BOOKING FORM</h2>
                     <p>Last booking for online booking should be no later than 48 hours of the start date</p>
                     
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
								 <input type="hidden" name="data[User][course_id]" value="<?php echo $value['Course']['id'];?>">
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
                                       <input type="text" class="contactmodal" name="data[User][start_time]" id="sorg<?php echo $value['Course']['id'];?>" readonly="true" placeholder="Start Time" value="">
                                    </div>
                                    <div class="col-lg-6">
                                       <input type="text" class="contactmodal" name="data[User][end_time]" id="eorg<?php echo $value['Course']['id'];?>" readonly="true" placeholder="End Time" value="">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6 dollar">
                                 <label class="form-text">Price Per Delegate (excl VAT)</label>
                                 <input type="text" class="contactmodal" name="data[User][delegate_price]" readonly="true" placeholder="Price Per Delegate" value="<?php echo $value['Course']['delegate_price'];?>">
                                 <p class="dollarsign">&#163;</p>
                              </div>
							  <div class="col-lg-6 dollar">
                              <label class="form-text">Price Per Delegate (Incl VAT)</label>
                              <input type="text" class="contactmodal" name="data[User][delegate_price]" readonly="true" placeholder="Price Per Delegate" value="<?php echo $value['Course']['delegate_price'] +  $value['Course']['delegate_price'] * 20/100 ;?>">
                              <p class="dollarsign">&#163;</p>
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
                                 <input type="text" class="contactmodal" name="data[first_name][]" id="f1n<?php echo $value['Course']['id'];?>" placeholder="First Name" value="" onkeyup="NextTab1(<?php echo $value['Course']['id'];?>);" >
                              </div>
                              <div class="col-lg-2">
                                 <label class="form-text">Last Name</label>
                                 <input type="text" class="contactmodal" name="data[last_name][]" id="l1n<?php echo $value['Course']['id'];?>" placeholder="Last Name" value="" onkeyup="NextTab1(<?php echo $value['Course']['id'];?>);">
									
                              </div>
                              <div class="col-lg-2">
                                 <label class="form-text">Sentinel Number</label>
                                 <input type="tel" class="contactmodal" name="data[sentinel][]" id="s1n<?php echo $value['Course']['id'];?>" minlength="6" maxlength="7" placeholder="Sentinel Number" onkeyup="NextTab1(<?php echo $value['Course']['id'];?>);">
								
                              </div>
                              <div class="col-lg-3 dollar">
                                 <label class="form-text">Price Per Delegate (excl VAT)</label>
                                 <input type="text" class="contactmodal excvat<?php echo $value['Course']['id'];?>" readonly="true" id="4sTextBoxesGroup<?php echo $value['Course']['id'];?>" name="data[delegate_price][]" placeholder="Price Per Delegate (excl VAT)" value="<?php echo $value['Course']['delegate_price'];?>" readonly="true">
                                 <p class="dollarsign">&#163;</p>
                              </div>
                              <div class="col-lg-3 dollar">
                                 <label class="form-text">Price Per Delegate (Incl VAT)</label>
                                 <input type="text" class="contactmodal ddlSelect<?php echo $value['Course']['id'];?>" id="5sTextBoxesGroup<?php echo $value['Course']['id'];?>" name="data[delegate_price][]" readonly="true" placeholder="Price Per Delegate (Incl VAT)" value="<?php echo $value['Course']['delegate_price'] +  $value['Course']['delegate_price'] * 20/100 ;?>" readonly="true">
                                 <p class="dollarsign">&#163;</p>
                             </div>
                              
                           </div>
           
                           <div id='sTextBoxesGroup<?php echo $value['Course']['id'];?>'></div>
                           
                         <!--  <div id="1ddlSelect<?php //echo $value['Course']['id'];?>"></div>-->
                           <div class="row">
                           <div class="col-lg-6">
                                <button class="site-btn modal-btn Add_btn AddField addbox" type="button"  data-id="<?php echo $value['Course']['id'];?>" id='sTextBoxesGroup<?php echo $value['Course']['id'];?>'>Add</button>
                                <button class="site-btn modal-btn Add_btn removeButton addbox" type="button"   id='<?php echo $value['Course']['id'];?>' style="display:none;">Remove</button>
								
                                </div>
                           <div class="col-lg-3 dollar">
                                 <label class="form-text tot">Total (Excl VAT)</label>
                                 <input type="text" class="contactmodal Totex<?php echo $value['Course']['id'];?>" id="TotExVal<?php echo $value['Course']['id'];?>" readonly="true" name="" placeholder="Total" value="">
                                 <p class="dollarsign">&#163;</p>
                            </div>
                           <div class="col-lg-3 dollar">
                                 <label class="form-text tot">Total (Incl VAT)</label>
                                 <input type="text" class="contactmodal newdd<?php echo $value['Course']['id'];?>" id="TotVal<?php echo $value['Course']['id'];?>" readonly="true" name="data[User][price_incvat]" placeholder="Total" value="">
                                 <p class="dollarsign">&#163;</p>
                            </div>
                              </div>
                              <p class="allowbox" id="allowbox<?php echo $value['Course']['id'];?>" style="display:none;">only 12 box are allowed</p>
							  <div class="col-lg-12" style="padding:0">
                   <!--  <p style="color:red;margin-top: 10px;font-size: 13px;">Note - First four rows are mandatory to fill.</p> -->
                    <p style="color:red;margin-top: 10px;font-size: 13px;display:none;" id="msg<?php echo $value['Course']['id'];?>">** Sentinel Number should not be less than 6 digit and more than 7 digit</p>
						  </div> 
                            <!--   <div class="row">
                          <div class="col-lg-12 booking button">
                                 <div class="form-group booking-form">
                                    <select class="form-control ddlSelect newdd<?php //echo $value['Course']['id'];?>"  data-id="<?php //echo $value['Course']['id'];?>" id="ddlSelect<?php //echo $value['Course']['id'];?>" name="ddlSelect">
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
                          </div>   --> 
                           <div class="col-lg-12" align="right">
                              <ul class="nav nav-tabs" role="tablist" style="float:right;">
                              <li class="nav-item disabled" role="presentation">
                                       <a class="site-btn modal-btn Add_btn " href="#" onclick="PreviousTab(<?php echo $value['Course']['id'];?>);" title="Previous"><i class="fa fa-angle-double-left"></i></a>
                                    </li>
                                    <li class="nav-item disabled" role="presentation">
                                    <button class="site-btn modal-btn Add_btn" type="button" id="n<?php echo $value['Course']['id'];?>" onclick="NextTab(<?php echo $value['Course']['id'];?>);" title="Next" disabled><i class="fa fa-angle-double-right"  ></i></button>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="references<?php echo $value['Course']['id'];?>">
                           <div class="row">
                              <div class="col-lg-3">
                                 <label class="form-text">Sponsor Name</label>
                                 <input class="contactmodal"  id="sponserorgrail<?php echo $value['Course']['id'];?>" placeholder="Sponsor Name" onkeyup="orgRailSponserlist(<?php echo $value['Course']['id'];?>)"  type="text"  name="data[User][sponsor_company][]" autofocus="off" autocomplete="off">
									      <div id="listsponsororgrail<?php echo $value['Course']['id'];?>" class="suggest"></div>
                                    <div class="suggestother" id="Orgthers<?php echo $value['Course']['id'];?>">
                                    <li id="Orgther<?php echo $value['Course']['id'];?>" onclick="orgshowothr(<?php echo $value['Course']['id'];?>)">Other</li>
									      </div>
                                    <input class="contactmodal"  id="orgshowther<?php echo $value['Course']['id'];?>" placeholder="Type here" type="text"  name="data[User][sponsor_company][]" autofocus="off" autocomplete="off" style="display:none;">
                                    <i class="fa fa-chevron-down right-arrow"></i>
                              </div>
                              <div class="col-lg-3">
                                 <label class="form-text">Sponsor Contact Name</label>
                                 <input type="text" class="contactmodal" name="data[User][sponsor_name]" placeholder="Sponsor Contact Name"  value="<?php if($this->Session->read('Auth')){  
                                    if($_SESSION['Auth']['User']['user_type']=="Company"){
										$name = explode( ',',$_SESSION['Auth']['User']['sponsor_name']);
										echo $name[0]; 
										 
                                    }}?>">
                              </div>
                              <div class="col-lg-3">
                                 <label class="form-text">Sponsor Contact Number</label>
                                 <input type="text" class="contactmodal" name="data[User][sponsor_phone]" onkeypress="javascript:return isNumber(event)"  maxlength="14" placeholder="Sponsor Contact Number" value="<?php if($this->Session->read('Auth')){  
                                    if($_SESSION['Auth']['User']['user_type']=="Company"){
                                    echo $_SESSION['Auth']['User']['sponsor_phone'];
                                    }}?>">
                              </div>
                              <div class="col-lg-3">
                                 <label class="form-text">Sponsor Email Address</label>
                                 <input type="email" class="contactmodal" name="data[User][companyemail]" placeholder="Sponsor Email Address" value="<?php if($this->Session->read('Auth')){  
                                    if($_SESSION['Auth']['User']['user_type']=="Company"){
                                    echo $_SESSION['Auth']['User']['companyemail'];
                                    }}?>">
                              </div>
                              <div class="col-lg-12" style="text-align:center;">
                                 <button class="site-btn modal-btn btnenabO<?php echo $value['Course']['id'];?>" id="O<?php echo $value['Course']['id'];?>" type="submit" onclick="OrganizationRail(this)" disabled>Submit</button>
                              </div>
                           </div>
                           <div class="col-lg-12" align="right"> 
                                 <ul class="nav nav-tabs" role="tablist" style="float:right;">
                                
                                    <li class="nav-item disabled" role="presentation">
                                       <a class="site-btn modal-btn Add_btn " href="#" onclick="PRETab(<?php echo $value['Course']['id'];?>);" title="previous"><i class="fa fa-angle-double-left"></i></a>
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
                     <p class="nav-link active" id="1Istep<?php echo $value['Course']['id'];?>">Step - 1</p>
                  </li>
                  <li class="nav-item disabled col-sm-6" role="presentation">
                     <p class="nav-link" id="2Istep<?php echo $value['Course']['id'];?>" >Step - 2</p>
                  </li>
               </ul>
               <div class="">
                  <div class="tab-content">
                     <div role="tabpanel" class="tab-pane fade in active show" id="I1step<?php echo $value['Course']['id'];?>">
                        <div class="row">
                           <div class="col-lg-6">
                              <label class="form-text">Course</label>
							  <input type="hidden" name="data[User][course_id]" value="<?php echo $value['Course']['id'];?>">
                              <input type="text" class="contactmodal" name="data[User][course_name]" placeholder="Course" value="<?php echo $value['Course']['course_name'];?>" readonly="true">
                           </div>
                           <div class="col-lg-6">
                              <label class="form-text">Course Duration</label>
                              <input type="text" class="contactmodal" name="data[User][duration]" placeholder="Course Duration" value="<?php echo $value['Course']['duration'];?>" readonly="true">
                           </div>
                           <div class="col-lg-6">
                              <label class="form-text">Location</label>
                              <input type="text" class="contactmodal" name="data[User][location]"  placeholder="Location" value="<?php echo $value['Location']['location'];?>" readonly="true">
                           </div>
                           <div class="col-lg-6">
                              <label class="form-text">Course Date</label>
                              <input type="text" class="contactmodal" name="data[User][start_date]" id="indate<?php echo $value['Course']['id'];?>"  placeholder="Course Date" value="" readonly="true">
                           </div>
                           <div class="col-lg-12">
                              <label class="form-text">Course Time</label>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <input type="text" class="contactmodal" name="data[User][start_time]" id="intime<?php echo $value['Course']['id'];?>" placeholder="Start Time" value="" readonly="true">
                                 </div>
                                 <div class="col-lg-6">
                                    <input type="text" class="contactmodal" name="data[User][end_time]" id="entime<?php echo $value['Course']['id'];?>" placeholder="End Time" value="" readonly="true">
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6 dollar">
                              <label class="form-text">Price Per Delegate (excl VAT)</label>
                              <input type="text" class="contactmodal" name="data[User][delegate_price]" placeholder="Price Per Delegate" value="<?php echo $value['Course']['delegate_price'];?>" readonly="true">
                              <p class="dollarsign">&#163;</p>
                           </div>
						   <div class="col-lg-6 dollar">
                              <label class="form-text">Price Per Delegate (Incl VAT)</label>
                              <input type="text" class="contactmodal" name="data[User][price_incvat]" readonly="true" placeholder="Price Per Delegate" value="<?php echo $value['Course']['delegate_price'] +  $value['Course']['delegate_price'] * 20/100 ;?>" readonly="true">
                              <p class="dollarsign">&#163;</p>
                           </div>
                           <div class="col-lg-12" align="right">
                              <ul class="nav nav-tabs" role="tablist" style="float:right;">
                                 <li class="nav-item disabled" role="presentation">
                                    <a class="site-btn modal-btn Add_btn" href="#" title="Next" onclick="ONextTab(<?php echo $value['Course']['id'];?>)"><i class="fa fa-angle-double-right"></i></a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div role="tabpanel" class="tab-pane fade" id="I2step<?php echo $value['Course']['id'];?>">
               <div class="row">
                  <div class="col-lg-6">
                     <label class="form-text">First Name</label>
                     <input type="text" class="contactmodal" name="data[User][first_name]" placeholder="First Name" value="<?php if($this->Session->read('Auth')){  
                        echo $_SESSION['Auth']['User']['first_name'];
                        }?>" readonly="true">
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text">Last Name</label>
                     <input type="text" class="contactmodal" name="data[User][last_name]" placeholder="Last Name" value="<?php if($this->Session->read('Auth')){  
                        echo $_SESSION['Auth']['User']['last_name'];
                        }?>" readonly="true" >
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text">Mobile Number</label>
                     <input type="tel" class="contactmodal phone" name="data[User][phone]" placeholder="Mobile Number" onkeypress="javascript:return isNumber(event)" value="<?php if($this->Session->read('Auth')){  
                        echo $_SESSION['Auth']['User']['phone'];
                        }?>" readonly="true">
                  </div>
                  <div class="col-lg-6">
                     <label class="form-text">Email Address</label>
                     <input type="email" class="contactmodal" name="data[User][email_id]" placeholder="Email Address" value="<?php if($this->Session->read('Auth')){  
                        echo $_SESSION['Auth']['User']['email_id'];
                        }?>" readonly="true">
                  </div>
                  <div class="col-lg-12">
                     <br>
                     <div class="text-center">
                        <button class="site-btn modal-btn" id="non<?php echo $id ?>" onclick="nonRail(this)">Submit</button>
                     </div>
                  </div>
                  <div class="col-lg-12" align="right">
                              <ul class="nav nav-tabs" role="tablist" style="float:right;">
                                 <li class="nav-item disabled" role="presentation">
                                    <a class="site-btn modal-btn Add_btn" href="#" title="previous" onclick="OPreviousTab(<?php echo $value['Course']['id'];?>)"><i class="fa fa-angle-double-left"></i></a>
                                 </li>
                              </ul>
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
                     <p class="nav-link active" id="step1<?php echo $value['Course']['id'];?>">Step - 1</a>
                  </li>
                  <li class="nav-item disabled col-sm-6" role="presentation">
                     <a class="nav-link"  id="step2<?php echo $value['Course']['id'];?>">Step - 2</a>
                  </li>
               </ul>
               <div class="">
                  <div class="tab-content">
                     <div role="tabpanel" class="tab-pane fade in active show" id="profile<?php echo $value['Course']['id'];?>">
                        <div class="row">
                           <div class="col-lg-6">
                              <label class="form-text">Course</label>
							  <input type="hidden" name="data[User][course_id]" value="<?php echo $value['Course']['id'];?>">
                              <input type="text" class="contactmodal" name="data[User][course_name]" placeholder="Course" value="<?php echo $value['Course']['course_name'];?>" readonly="true">
                           </div>
                           <div class="col-lg-6">
                              <label class="form-text">Course Duration</label>
                              <input type="text" class="contactmodal" name="data[User][duration]" placeholder="Course Duration" value="<?php echo $value['Course']['duration'];?>" readonly="true">
                           </div>
                           <div class="col-lg-6">
                              <label class="form-text">Location</label>
                              <input type="text" class="contactmodal" name="data[User][location]"  placeholder="Location" value="<?php echo $value['Location']['location'];?>" readonly="true">
                           </div>
                           <div class="col-lg-6">
                              <label class="form-text">Course Date</label>
                              <input type="text" class="contactmodal" name="data[User][start_date]" id="orgdate<?php echo $value['Course']['id'];?>"  placeholder="Course Date" value="" readonly="true">
                           </div>
                           <div class="col-lg-12">
                              <label class="form-text">Course Time</label>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <input type="text" class="contactmodal" name="data[User][start_time]" id="stimen<?php echo $value['Course']['id'];?>" placeholder="Start Time" value="<?php //echo $value['Course']['start_time'];?>" readonly="true">
                                 </div>
                                 <div class="col-lg-6">
                                    <input type="text" class="contactmodal" name="data[User][end_time]" id="etimen<?php echo $value['Course']['id'];?>" placeholder="End Time" value="<?php //echo $value['Course']['end_time'];?>" readonly="true">
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6 dollar">
                              <label class="form-text">Price Per Delegate (excl VAT)</label>
                              <input type="text" class="contactmodal" name="data[User][delegate_price]" placeholder="Price Per Delegate" value="<?php echo $value['Course']['delegate_price'];?>" readonly="true">
                              <p class="dollarsign">&#163;</p>
                           </div>
						    <div class="col-lg-6 dollar">
                              <label class="form-text">Price Per Delegate (Incl VAT)</label>
                              <input type="text" class="contactmodal" name="data[User][delegate_price]" readonly="true" placeholder="Price Per Delegate" value="<?php echo $value['Course']['delegate_price'] +  $value['Course']['delegate_price'] * 20/100 ;?>" readonly="true">
                              <p class="dollarsign">&#163;</p>
                           </div>
                           <div class="col-lg-12" align="right">
                              <ul class="nav nav-tabs" role="tablist" style="float:right;">
                                 <li class="nav-item disabled" role="presentation">
                                    <a class="site-btn modal-btn Add_btn  textexcl1s<?php echo $value['Course']['id'];?>" onclick="NextResult(<?php echo $value['Course']['id'];?>);"  href="#" title="Next"><i class="fa fa-angle-double-right"></i></a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div role="tabpanel" class="tab-pane fade" id="buzz<?php echo $value['Course']['id'];?>">
                        <div class="row">
						   <div class="col-lg-4">
                              <label class="form-text">Company Name</label>
                              <input type="tel" class="contactmodal" name="data[User][company]" placeholder="Company Name" value="<?php if($this->Session->read('Auth')){  
                                 if($_SESSION['Auth']['User']['user_type']=="Company"){
                                 echo $_SESSION['Auth']['User']['company'];
                                 }}?>" readonly="true">
                           </div>
						   <div class="col-lg-4">
                              <label class="form-text">Contact Number</label>
                              <input type="tel" class="contactmodal" name="data[User][phone]" placeholder="Contact Number" onkeypress="javascript:return isNumber(event)" value="<?php if($this->Session->read('Auth')){  
                                 if($_SESSION['Auth']['User']['user_type']=="Company"){
                                 echo $_SESSION['Auth']['User']['phone'];
                                 }}?>" readonly="true">
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
                                    <input type="text" class="contactmodal" name="data[first_name][]" id="fn1m<?php echo $value['Course']['id'];?>" placeholder="First Name" value="" onkeyup="orgRail(<?php echo $value['Course']['id'];?>)">
									<div id="firstname1<?php echo $value['Course']['id'];?>" style="color:red;margin-left:3%"></div>
                                </div>
                                <div class="col-lg-3">
                                    <label class="form-text">Last Name</label>
                                    <input type="text" class="contactmodal" name="data[last_name][]" id="last1m<?php echo $value['Course']['id'];?>" placeholder="Last Name" value="" onkeyup="orgRail(<?php echo $value['Course']['id'];?>)">
									<div id="lastname1<?php echo $value['Course']['id'];?>" style="color:red;margin-left:3%"></div>
                                </div>
                           
                                <div class="col-lg-3 dollar">
                                    <label class="form-text">Price Per Delegate (excl VAT)</label>
                                    <input type="text" class="contactmodal textexcl<?php echo $value['Course']['id'];?>" name="data[delegate_price][]" placeholder="Price Per Delegate (excl VAT)" id="1TextBoxesGroup1<?php echo $value['Course']['id'];?>" value="<?php echo $value['Course']['delegate_price'];?>" readonly="true">
                                    <p class="dollarsign">&#163;</p>
                                </div>
                                <div class="col-lg-3 dollar">
                                    <label class="form-text">Price Per Delegate (Incl VAT)</label>
                                    <input type="text" class="contactmodal textincl<?php echo $value['Course']['id'];?>" name="data[delegate_price][]" placeholder="Price Per Delegate (Incl VAT)" id="2TextBoxesGroup1<?php echo $value['Course']['id'];?>" value="<?php echo $value['Course']['delegate_price'] +  $value['Course']['delegate_price'] * 20/100 ;?>" readonly="true">
                                    <p class="dollarsign">&#163;</p>
                                </div>
                        </div>
                    
                        <div id='TextBoxesGroup1<?php echo $value['Course']['id'];?>'></div>
                       
                        <div class="row">
                        <div class="col-lg-6">
                        <button class="site-btn modal-btn Add_btn AddField1 addbox" type="button" data-id="<?php echo $value['Course']['id'];?>" id="TextBoxesGroup1<?php echo $value['Course']['id'];?>">Add</button>
                        <button class="site-btn modal-btn Add_btn removeButton1 addbox" type="button" id="<?php echo $value['Course']['id'];?>" style="display:none;">Remove</button>
                        </div>
                        <div class="col-lg-3 dollar"> 
                             <label class="form-text tot">Total (Excl VAT)</label>
                              <input type="text" class="contactmodal" name="data[delegate_price][]" placeholder="Total" id="totalexcs<?php echo $value['Course']['id'];?>" value="" readonly="true"> 
                              <p class="dollarsign">&#163;</p>
                            </div>
                        <div class="col-lg-3 dollar">
                             <label class="form-text tot">Total (Incl VAT)</label>
                              <input type="text" class="contactmodal" name="data[User][price_incvat]" placeholder="Total" id="totalincs<?php echo $value['Course']['id'];?>" value="" readonly="true">
                              <p class="dollarsign">&#163;</p>
                            </div></div>
                        <div class="row">
						  <div class="col-lg-12">
                    <p class="allowbox" id="allowboxs<?php echo $value['Course']['id'];?>" style="display:none;">only 12 box are allowed</p>
						  <!-- <p style="color:red;margin-top: 10px;font-size: 13px;">Note - First four rows are mandatory to fill.</p> -->
                                <div class="text-center">
                                    <button class="site-btn modal-btn" id="m<?php echo $id ?>"  disabled >Submit</button>
                                </div>
                            </div>
                            <div class="col-lg-12" align="right">
                              <ul class="nav nav-tabs" role="tablist" style="float:right;">
                                   <li class="nav-item disabled" role="presentation">
                                       <a class="site-btn modal-btn Add_btn " href="#" onclick="PreviousTab(<?php echo $value['Course']['id'];?>);" title="Previous"><i class="fa fa-angle-double-left"></i></a>
                                    </li>
                                 
                              </ul>
                           </div>
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
<?php } 
}?>


<!-- Courses -->
<div class="pops" id="alertMsgs" style="display:none;">
   <div class="popupdesign">
                 <div class="sumit-mmess">
                   <span class="close" onclick="closefun1()"><i class="fa fa-times" aria-hidden="true"></i></span>
                        <p id="alertshowmsg"></p>
                  </div>
   </div>
</div>
<script>
function closefun1(){
   document.getElementById("alertMsgs").style.display = "none";
}
   </script>

<!-- Footer section end-->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6acYWq5ZyYm9lspmm16T9zwCjzHnyygI&sensor=false&libraries=geometry,places&ext=.js"></script>

<?php    echo $this->Html->script('jquery.js');
      echo $this->Html->script('jquery.validate.min.js');
      ?>
      <script type="text/javascript">
  var validator=$("#contactForm").validate({rules:{"data[Contact][name]":{required:!0},'data[Contact][phone]':{required:!0,minlength:3,maxlength:15},"data[Contact][email]":{required:!0,email:!0},"data[Contact][message]":{required:!0}},messages:{"data[Contact][name]":{required:"Name should not be blank."},"data[Contact][email]":{required:"Email should not be blank."},
  "data[Contact][phone]":{required: "Phone number should not be blank.",minlength:"Phone Number should not be less than 3 digit.",maxlength:"Phone Number should not be more than 15 digit."},
  "data[Contact][message]":{required:"Message should not be blank."}}});
</script>
<?php 
   
   	echo $this->Html->script('jquery.countdown.js');
   	echo $this->Html->script('magnific-popup.min.js');
   
    echo $this->Html->script('popper.min.js');
   	echo $this->Html->script('bootstrap.min.js');
   	echo $this->Html->script('lightgallery.js');
   
   	echo $this->Html->script('jquery.additional.js');
   	echo $this->Html->script('eagle.gallery.min.js');
    echo $this->Html->script('datepicker.js');
    echo $this->Html->script('owl.carousel.min.js');
    echo $this->Html->script('script.js');
    echo $this->Html->script('main.js');
    echo $this->Html->script('signature_pad.umd.js');
    echo $this->Html->script('app.js');
   ?>

   <script>
   /// LOGIN
   function loginform(){var e=$("#email_id").val(),a=$("#password").val();if(""==e)return $("#emptyemail_id").html("Please enter an email address.").addClass("error").fadeIn().delay(3e3).fadeOut(),!1;if(apos=e.indexOf("@"),dotpos=e.lastIndexOf("."),""!=e){if(apos<1||dotpos<2){$("#emptyemail_id").html("Please enter valid email address.").addClass("error").fadeIn().delay(3e3).fadeOut();return!1}}if(""==a)return $("#emptypassword").html("Please enter an password.").addClass("error").fadeIn().delay(3e3).fadeOut(),!1;$.ajax({url:"<?php echo SITEPATH; ?>users/login",data:{email_id:e,password:a},type:"POST",success:function(e){if(2!=e)return 0==e?($("#errorMsg").html("Account not active yet. please check your email to activate your account.").addClass("error").fadeIn().delay(3e3).fadeOut(),!1):($("#errorMsg").html("Please enter valid Email and Password.").addClass("error").fadeIn().delay(3e3).fadeOut(),!1);setTimeout(function(){location.reload()},1e3)}})}
    /////reset password
    function resetPassword(){var e=$("#ResetEmail").val();if(""==e)return $("#emptyemail").html("Email should not be blank.").addClass("error").fadeIn().delay(3e3).fadeOut(),!1;if(apos=e.indexOf("@"),dotpos=e.lastIndexOf("."),""!=e){if(apos<1||dotpos<2){$("#emptyemail").html("Please enter valid email.").addClass("error").fadeIn().delay(3e3).fadeOut();return!1}}$.ajax({url:SITEPATH+"users/resetPassword/",data:"data[email]="+e,type:"POST",success:function(e){1==e?(document.getElementById("forgetdiv").style.display = "block",setTimeout(function(){window.location.reload()},8000)):$("#successemail1").html("Incorrect email please try again.").addClass("error").fadeIn().delay(3e3).fadeOut()}})}
  
    // company registraion form
    var validator=$("#comapanyForm").validate({rules:{"data[User][first_name]":{
      required:!0},"data[User][last_name]":{required:!0},"data[User][company_position]":{required:!0},"data[User][email_id]":{required:true,
         email:true,
         remote:{
            url:"<?php echo SITEPATH ?>users/checkEmail",
         type:"post"}
      },"data[User][confirm_email_id]":{required:!0,email:!0,equalTo:"#Useremail"},"data[User][company]":{required:!0},"data[User][phone]":{required:!0,minlength:3,maxlength:15},"data[User][password]":{required:!0},"data[User][confirm_password]":{required:!0,equalTo:"#UserPassword"},"data[User][checkbox]":{required:!0}},messages:{"data[User][first_name]":{required:"First Name should not be blank."},"data[User][last_name]":{required:"Last Name should not be blank."},"data[User][company_position]":{required:"Company Position should not be blank."},"data[User][email_id]":{required:"Email should not be blank.",email:"Enter a vaild email.",remote:"This Email is already in Use. Please Use Another."},"data[User][confirm_email_id]":{required:"Confirm Email should not be blank.",email:"Enter a valid email.",equalTo:"Both email must match."},"data[User][company]":{required:"Company Name should not be blank."},"data[User][phone]":{required:"Contact Number should not be blank.",minlength:"Contact Number should not be less than 3 digit.",maxlength:"Contact Number should not be more than 15 digit."},"data[User][password]":{required:"Password should not be blank."},"data[User][confirm_password]":{required:"Confirm Password should not be blank.",equalTo:"Both password must match."},"data[User][checkbox]":{required:"Please select check box."}}});
    ////user registraion form
    var validator=$("#UserRegisterForm").validate({rules:{"data[User][first_name]":{required:!0},"data[User][last_name]":{required:!0},"data[User][email_id]":{
      required:!0,email:!0,
      remote:{
          url:"<?php echo SITEPATH ?>users/checkEmail",
        type:"post"
      }},"data[User][confirm_email_id]":{required:!0,email:!0,equalTo:"#Useremail1"},"data[User][address]":{required:!0},"data[User][phone]":{required:!0,minlength:3,maxlength:15},"data[User][password]":{required:!0},"data[User][confirm_password]":{required:!0,equalTo:"#UserPassword1"},"data[User][gender]":{required:!0},"data[User][maritalstatus]":{required:!0},"data[User][age]":{required:!0},"data[User][ethnic]":{required:!0},"data[User][sub_ethnic]":{required:!0},"data[User][disability]":{required:!0},"data[User][checkbox]":{required:!0}},messages:{"data[User][first_name]":{required:"First Name should not be blank."},"data[User][last_name]":{required:"Last Name should not be blank."},"data[User][email_id]":{required:"Email should not be blank.",remote:"This Email is already in Use. Please Use Another."},"data[User][confirm_email_id]":{required:"Confirm Email should not be blank.",email:"Enter a valid email.",equalTo:"Both email must match."},"data[User][address]":{required:"Address should not be blank."},"data[User][phone]":{required:"Mobile Number should not be blank.",minlength:"Mobile Number should not be less than 3 digit.",maxlength:"Mobile Number should not be more than 15 digit."},"data[User][password]":{required:"Password should not be blank."},"data[User][confirm_password]":{required:"Confirm Password should not be blank.",equalTo:"Both password must match."},"data[User][gender]":{required:"Please select gender."},"data[User][maritalstatus]":{required:"Please select marital status."},"data[User][age]":{required:"Please select age group."},"data[User][ethnic]":{required:"Please select ethnic group."},"data[User][sub_ethnic]":{required:"Please select sub-ethnic group."},"data[User][disability]":{required:"Please select disability."},"data[User][checkbox]":{required:"Please select check box."}}});
</script>

<script type="text/javascript">
// working (Rail Courses)
function individualRail(e){$("#ind"+e+" form").validate({rules:{"data[User][sponsor_company][]":{required:!0},"data[User][sponsor_name]":{required:!0},"data[User][companyemail]":{required:!0},"data[User][sponsor_phone]":{required:!0,minlength:3,maxlength:15}},messages:{"data[User][sponsor_company][]":{required:"Sponsor name should not be blank."},"data[User][sponsor_name]":{required:"Sponsor contact name should not be blank."},"data[User][companyemail]":{required:"Sponsor email address should not be blank."},"data[User][sponsor_phone]":{required:"Sponsor contact number should not be blank.",minlength:"Sponsor Contact Number should not be less than 3 digit.",maxlength:"Sponsor Contact Number should not be more than 15 digit."}}})}
</script>
<script type="text/javascript">
function OrganizationRail(e) {
   
   var r=e.id;
    $("#"+r+" form").validate( {
        rules: {
            "data[User][sponsor_company][]": {
                required: !0
            }
            , "data[User][sponsor_name]": {
                required: !0
            }
            , "data[User][sponsor_phone]": {
                required: !0, minlength: 8, maxlength: 15
            }
            , "data[User][companyemail]": {
                required: !0
            }
        }
        , messages: {
            "data[User][sponsor_company][]": {
                required: "Sponsor Name should not be blank."
            }
            , "data[User][sponsor_name]": {
                required: "Sponsor Contact Name should not be blank."
            }
            , "data[User][sponsor_phone]": {
                required: "Sponsor Contact Number should not be blank.", minlength: "Sponsor Contact Number should not be less than 8 digit.", maxlength: "Sponsor Contact Number should not be more than 15 digit."
            }
            , "data[User][companyemail]": {
                required: "Sponsor Email Address should not be blank."
            }
        }
    }
    )
}
</script>
<script type="text/javascript">
// working in non rail
 function nonRail(obj){var id = obj.id;var validator=$("#"+id + " form").validate({rules:{"data[User][first_name]":{required:!0},"data[User][last_name]":{required:!0},"data[User][email_id]":{required:!0,email:!0},"data[User][phone]":{required:!0}},messages:{"data[User][first_name]":{required:"First Name should not be blank."},"data[User][last_name]":{required:"Last Name should not be blank."},"data[User][email_id]":{required:"Email should not be blank."},"data[User][phone]":{required:"Phone should not be blank."}}});}
</script>

<script type="text/javascript">
///password 
    var validator=$("#passid").validate({rules:{"data[User][old_password]":{required:!0},"data[User][new_password]":{required:!0,minlength:6},"data[User][confirm_password]":{required:!0,equalTo:"#inputEmail"}},messages:{"data[User][old_password]":{required:"Old password  should not be blank</br>"},"data[User][new_password]":{required:"New password should not be blank"},"data[User][confirm_password]":{required:"Confirm password should not be blank",equalTo:jQuery.format("Both password must match.")}}});
</script>

<script type="text/javascript">
  var validator=$("#updateprofile").validate({rules:{"data[User][first_name]":{required:!0},"data[User][last_name]":{required:!0},"data[User][phone]":{required:!0,minlength:3,maxlength:15},"data[User][gender]":{required:!0},"data[User][maritalstatus]":{required:!0},"data[User][age]":{required:!0},"data[User][ethnic]":{required:!0},"data[User][sub_ethnic]":{required:!0},"data[User][disability]":{required:!0}},messages:{"data[User][first_name]":{required:"First Name should not be blank."},"data[User][last_name]":{required:"Last Name should not be blank."},"data[User][phone]":{required:"Mobile Number should not be blank.",minlength:"Mobile Number should not be less than 3 digit.",maxlength:"Mobile Number should not be more than 15 digit."},"data[User][gender]":{required:"Please select gender."},"data[User][maritalstatus]":{required:"Please select marital status."},"data[User][age]":{required:"Please select age group."},"data[User][ethnic]":{required:"Please select ethnic group."},"data[User][sub_ethnic]":{required:"Please select sub-ethnic group."},"data[User][disability]":{required:"Please select disability."}}});
</script>

<script type="text/javascript">
var validator=$("#comapanyprofile").validate({rules:{"data[User][first_name]":{required:!0},"data[User][last_name]":{required:!0},"data[User][company_position]":{required:!0},"data[User][company]":{required:!0},"data[User][phone]":{required:!0,minlength:3,maxlength:15}},messages:{"data[User][first_name]":{required:"First Name should not be blank."},"data[User][last_name]":{required:"Last Name should not be blank."},"data[User][company_position]":{required:"Company Position should not be blank."},"data[User][company]":{required:"Company Name should not be blank."},"data[User][phone]":{required:"Mobile Number should not be blank.",minlength:"Mobile Number should not be less than 3 digit.",maxlength:"Mobile Number should not be more than 15 digit."}}});
</script>


<script type="text/javascript">
//sponser list
function getsponserlist(e) {
    if(document.getElementById("sponsername" + e).value != ""){
    var s = document.getElementById("sponsername" + e).value;
    $.ajax({
        type: "POST",
        data: {
            name: s
        },
        url:"<?php echo SITEPATH; ?>users/sponserlist",
        success: function(s) {
            document.getElementById("listsponsor" + e).style.display = "block";
            var t = s;
            document.getElementById("listsponsor" + e).innerHTML = t, document.getElementById("listsponsor" + e).classList.add("listsponsor" + e), $(".liClass").click(function() {
                var s = this.id,
                    t = $("#" + s).text();
                document.getElementById("sponsername" + e).value = t;
                document.getElementById("Others" + e).style.display = "none";
                document.getElementById("listsponsor" + e).style.display = "none";
                document.getElementById("showther" + e).style.display = "none";
            })
        }
    })
    setTimeout(function(){document.getElementById("Others" + e).style.display = "block";}, 1500);
    $(".suggestother").css("opacity","1")
   // $("#Others"+e).click($("#showther"+e).style.display="block");
}else{
    document.getElementById("listsponsor" + e).style.display = "none";
    document.getElementById("Others" + e).style.display = "none";
    document.getElementById("showther" + e).style.display = "none";
}
}
function showothr(e){
  var p =  document.getElementById("Other" + e).innerHTML;
    document.getElementById("sponsername" + e).value = p;
    document.getElementById("showther" + e).style.display = "block";
    document.getElementById("Others" + e).style.display = "none";
    document.getElementById("listsponsor" + e).style.display = "none";
}
function orgRailSponserlist(e) {
    if(document.getElementById("sponserorgrail" + e).value != ""){
    var s = document.getElementById("sponserorgrail" + e).value;
    $.ajax({
        type: "POST",
        data: {
            name: s
        },
        url:"<?php echo SITEPATH; ?>users/sponserlist",
        success: function(s) {
            document.getElementById("listsponsororgrail" + e).style.display = "block";
            var t = s;
            document.getElementById("listsponsororgrail" + e).innerHTML = t, 
            document.getElementById("listsponsororgrail" + e).classList.add("listsponsororgrail" + e), 
            $(".liClass").click(function() {
                var s = this.id,
                    t = $("#" + s).text();
                document.getElementById("sponserorgrail" + e).value = t;
                document.getElementById("Orgthers" + e).style.display = "none";
                document.getElementById("listsponsororgrail" + e).style.display = "none";
                document.getElementById("orgshowther" + e).style.display = "none";
            })
        }
    })
    setTimeout(function(){document.getElementById("Orgthers" + e).style.display = "block";}, 1500);
    $(".suggestother").css("opacity","1")
}else{
    document.getElementById("listsponsororgrail" + e).style.display = "none";
    document.getElementById("Orgthers" + e).style.display = "none";
    document.getElementById("orgshowther" + e).style.display = "none";
}
}
$("body").on("click", ".liClass", function() {
   
   $(".suggestother").css("display","none")
   $(".suggestother").css("opacity","0")

});
function orgshowothr(e){
    var p =  document.getElementById("Orgther" + e).innerHTML;
    document.getElementById("sponserorgrail" + e).value = p;
    document.getElementById("orgshowther" + e).style.display = "block";
    document.getElementById("Orgthers" + e).style.display = "none";
    document.getElementById("listsponsororgrail" + e).style.display = "none";
}

</script>
<script type="text/javascript">

    // WRITE THE VALIDATION SCRIPT.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    

</script>
<script type="text/javascript">
window.onload = function(){
   document.getElementById("contact_dis").disabled = false;
}


$("#modalsforg").click(function() {  //use a class, since your ID gets mangled
    setTimeout(function(){  $("body").addClass("modal-open");  }, 500);
});
$("#modalsforgs").click(function() {  //use a class, since your ID gets mangled
      
      setTimeout(function(){  $("body").addClass("modal-open");  }, 500);
  });
</script>
<!--
<script>

$(document).keydown(function(event){
    if(event.keyCode==123){
        return false;
    }
    else if (event.ctrlKey && event.shiftKey && event.keyCode==73){        
             return false;
    }
});

$(document).on("contextmenu",function(e){        
   e.preventDefault();
});
</script>-->
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