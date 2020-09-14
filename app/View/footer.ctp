
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
              <p>Techno CTA Ltd is a private professional Training & Assessment Provider delivering a wide range of courses within various trades including Construction
                Railway, Plant Operation and Health & Safety.</p>
              <div class="social pt-1"> <a href="https://www.facebook.com/" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a> <a href="https://twitter.com/login?lang=en"  title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a> <a href="https://in.linkedin.com/company/login"  title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a> </div>
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
                <li><i class="fa fa-angle-right"></i><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'policy_certificate'));?>">Policy & Certificate</a></li>
				<li><i class="fa fa-angle-right"></i><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'terms_conditions'));?>">Terms & Conditions</a></li>
              </ul>
              <ul>
				<li><i class="fa fa-angle-right"></i><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'our_facility'));?>">Facilities</a></li>
                <li><i class="fa fa-angle-right"></i><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'recruitment'));?>">Recruitment </a></li>
                <li><i class="fa fa-angle-right"></i><a href="<?php echo $this->html->url(array('controller' => 'galleries', 'action' => 'gallery'));?>">Gallery </a></li>
                <li><i class="fa fa-angle-right"></i><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'medical'));?>">Medical & Drug </a></li>
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
                <p><i class="fa fa-map-marker"></i>&nbsp;&nbsp;7 Pier Parade, london E16 2LJ</p>
                <p class="fa fa-map-marker">&nbsp;&nbsp;7 Woodman Parade, London E16 2LL</p>
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
            <div class="row">
              <div class="col-lg-12">
                <input type="email" class="contactmodal" name="data[User][email_id]" placeholder="Email Address">
              </div>
              <div class="col-lg-12">
                <input type="password" class="contactmodal" name="data[User][password]" placeholder="Password">
              </div>
              <div class="col-lg-12">
                <div class="form-group form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" name="data[User][remberme]" id="remberme" type="checkbox">
                    Remember me </label>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="text-center">
                  <button class="site-btn modal-btn" type="submit">Submit</button>
                </div>
              </div>
            </div>
          <?php echo $this->Form->end(); ?>
        </div>
      </div>
      <div class="modal-footer">
        <div class="col-lg-6">
          <div class="forgot-pswd"> <a href="#" data-toggle="modal" data-target="#myModal2" data-dismiss="modal">
            <h5>Forgot Password</h5>
            </a> </div>
        </div>
        <div class="col-lg-6">
          <div class="Register"> <a href="#" data-toggle="modal" data-target="#myModal1" data-dismiss="modal">
            <h5>Register Here..?</h5>
            </a> </div>
        </div>
      </div>
      
      <!-- Modal footer --> 
      
    </div>
  </div>
</div>

<!-- Modal forgot password Start-->
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
                <input type="email" class="contactmodal" placeholder="Email Address">
              </div>
              <div class="col-lg-12">
                <div class="text-center">
                  <button class="site-btn modal-btn" type="submit">Submit</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal forgot password End--> 

<!-- Register Modal start  -->

<div class="modal fade" id="myModal1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Register Here</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <div class="col-sm-12">
		  <?php echo $this->Form->create('User', array('controller'=>'users','action'=>'register','class' => 'comment-form --contact text-center form', 'id' =>'UserRegisterForm')); ?>    
            <div class="row">
              <div class="col-lg-12">
                <input type="text" class="contactmodal" name="data[User][first_name]" placeholder="First Name">
              </div>
              <div class="col-lg-12">
                <input type="text" class="contactmodal" name="data[User][last_name]" placeholder="Last Name">
              </div>
              <div class="col-lg-12">
                <input type="email" class="contactmodal" name="data[User][email_id]" placeholder="Email">
              </div>
              <div class="col-lg-12">
                <input type="text" class="contactmodal" name="data[User][address]" placeholder="Address">
              </div>
              <div class="col-lg-12">
                <input type="tel" class="contactmodal phone" name="data[User][phone]" placeholder="Phone">
              </div>
              <div class="col-lg-12">
                  <input type="Password" class="contactmodal" id="UserPassword" name="data[User][password]" placeholder="Password">
              </div>
              <div class="col-lg-12">
                <input type="Password" class="contactmodal" name="data[User][confirm_password]" placeholder="Confirm Password">
              </div>
               <div class="col-lg-12">
                <div class="form-group form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" name="data[User][checkbox]" type="checkbox">
                    By registering you agree to our<a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'terms_conditions'));?>"> terms & conditions</a></label>
					<label for="data[User][checkbox]" class="error"></label>
                </div>
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

<div class="modal fade" id="myModal3">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Register Here</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <div class="col-sm-12">
		  <?php echo $this->Form->create('User', array('controller'=>'users','action'=>'register','class' => 'comment-form --contact text-center', 'id' =>'UserRegisterForm1')); ?>    
            <div class="row">
              <div class="col-lg-12">
                <input type="text" class="contactmodal" name="data[User][first_name]" placeholder="First Name">
              </div>
              <div class="col-lg-12">
                <input type="text" class="contactmodal" name="data[User][last_name]" placeholder="Last Name">
              </div>
              <div class="col-lg-12">
                <input type="email" class="contactmodal" name="data[User][email_id]" id="email" placeholder="Email">
              </div>
              <div class="col-lg-12">
                <input type="text" class="contactmodal" name="data[User][address]" placeholder="Address">
              </div>
              <div class="col-lg-12">
                <input type="tel" class="contactmodal phone" name="data[User][phone]" placeholder="Phone">
              </div>
              <div class="col-lg-12">
                  <input type="password" class="contactmodal" id="UserPassword1" name="data[User][password]" placeholder="Password">
              </div>
              <div class="col-lg-12">
                <input type="password" class="contactmodal" name="data[User][confirm_password]" placeholder="Confirm Password">
              </div>
               <div class="col-lg-12">
                <div class="form-group form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" name="data[User][checkbox]" type="checkbox">
                     By registering you agree to our<a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'terms_conditions'));?>"> terms & conditions</a></label>
					<label for="data[User][checkbox]" class="error"></label>
                </div>
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
<!-- Register Modal End  --> 

<!-- Footer section end--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php 
/*  echo $this->Html->script('jquery-3.2.1.min.js'); */
  echo $this->Html->script('owl.carousel.min.js');
  echo $this->Html->script('jquery.countdown.js');
  echo $this->Html->script('magnific-popup.min.js');
  echo $this->Html->script('main.js');

  echo $this->Html->script('popper.min.js');
  echo $this->Html->script('bootstrap.min.js');
  echo $this->Html->script('lightgallery.js');
  echo $this->Html->script('jquery.js');
  echo $this->Html->script('jquery.validate.min.js');
  echo $this->Html->script('eagle.gallery.min.js');

?>

<script type="text/javascript">
    var validator = $("#contactForm").validate({
        rules: {
            'data[Contact][name]':{
                required:true
            },
            'data[Contact][email]':{
                required:true,
                email:true
            },
            'data[Contact][message]':{
                required:true
            }
          
        },
        messages: {
            'data[Contact][name]':{
                required:"Name should not be blank."
            },
            'data[Contact][email]':{
                required:"Email should not be blank."
            },
            'data[Contact][message]':{
                required:"Message should not be blank."
            }
        },
     

    });
</script>

<script>

for(i = 0; i<=100; i++){
  lightGallery(document.getElementById('lightgallery' + i));
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6acYWq5ZyYm9lspmm16T9zwCjzHnyygI&sensor=false&libraries=geometry,places&ext=.js"></script>
<!--====== Javascripts & Jquery ======--> 


<script> 
			$(document).ready(function() {
				$('#example3').eagleGallery({
					miniSliderArrowPos: 'inside',
					showMediumImg: false,
					openGalleryStyle: 'transform',
					bottomControlLine: true,
					allowUserZoom: false,
					miniSlider: {
						itemsCustom: [[0, 1],[350, 2], [750, 3], [1050, 5], [1250, 5], [1450, 6]]
					}
				});
			
			}); 
		</script>
	
</body>
<script type="text/javascript">
    var validator = $("#loginForm").validate({
        rules: {
			'data[User][email_id]':{
				required:true,
				email:true
			},
			'data[User][password]':{
				required:true
			},
		},
		messages: {
			'data[User][email_id]':{
				required:"Email Address should not be blank.",
			},
			'data[User][password]':{
				required:"Password should not be blank."
			},
		 }
	   });
</script>
 <script type="text/javascript">
    var validator = $("#UserRegisterForm").validate({
        rules: {
            'data[User][first_name]': {
                    required: true
                },
                'data[User][last_name]': {
                    required: true
                },
                'data[User][email_id]': {
                    required: true,
                    email: true,
                },
				'data[User][address]':{
                    required:true
				},
                'data[User][phone]':{
                    required:true,
                    number:true
				},
                'data[User][password]':{
                    required:true,
                    minlength:6
				},
                'data[User][confirm_password]':{
                    required:true,
                    equalTo: "#UserPassword"
				},
                'data[User][checkbox]':{
                    required:true
				}          
        },
        messages: {
            'data[User][first_name]': {
                    required:"First Name should not be blank."
                },
                'data[User][last_name]': {
                    required:"Last Name should not be blank."
				},
                'data[User][email_id]': {
                    required: "Email should not be blank."
				},
                'data[User][address]':{
                    required:"Address should not be blank."
				},
                'data[User][phone]':{
                    required:"Phone should not be blank."
				},
                'data[User][password]':{
                    required: "Password should not be blank",
                    minlength: "Please enter at least 6 characters."
                },
				'data[User][confirm_password]':{
                    required: "Confirm password should not be blank.",
                    equalTo: "Both password must match."
                },
				'data[User][checkbox]':{
                    required:"Please select check box"
				}
        }
    });
</script>
<script type="text/javascript">
    var validator = $("#UserRegisterForm1").validate({
        rules: {
				'data[User][first_name]': {
                    required: true
                },
                'data[User][last_name]': {
                    required: true
                },
                'data[User][email_id]': {
                    required: true,
                    email: true
                },
				'data[User][address]':{
                    required:true
				},
                'data[User][phone]':{
                    required:true
				},
                'data[User][password]':{
                    required:true
				},
                'data[User][confirm_password]':{
                    required:true,
					 equalTo: "#UserPassword1"
				},
                'data[User][checkbox]':{
                    required:true
				}   
        },
        messages: {
				'data[User][first_name]': {
                    required:"First Name should not be blank."
                },
                'data[User][last_name]': {
                    required:"Last Name should not be blank."
				},
                'data[User][email_id]': {
                    required: "Email should not be blank."
				},
                'data[User][address]':{
                    required:"Address should not be blank."
				},
                'data[User][phone]':{
                    required:"Phone should not be blank."
				},
                'data[User][password]':{
                    required: "Password should not be blank"
                },
				'data[User][confirm_password]':{
                    required: "Confirm password should not be blank.",
					equalTo: "Both password must match."
                },
				'data[User][checkbox]':{
                    required:"Please select check box"
				}
        }
    });
</script>
<script>
var locations = [
  ['<b>Name 1</b><br>Address Line 1<br>7 Pier Parade, london E16 2LJ<br>Phone: 0207-0550-877<br><a href="#" >Link<a> of some sort.', 51.4998247, 0.06334179999998923, 1],
  ['<b>Name 2</b><br>Address Line 1<br>7 Woodman Parade, London E16 2LL<br><a href="#" target="_blank">Link<a> of some sort.', 51.5008811, 0.06366170000001148, 2]
/*
 * Next point on map
 *   -Notice how the last number within the brackets incrementally increases from the prior marker
 *   -Use http://itouchmap.com/latlong.html to get Latitude and Longitude of a specific address
 *   -Follow the model below:
 *      ['<b>Name 3</b><br>Address Line 1<br>City, ST Zipcode<br>Phone: ###-###-####<br><a href="#" target="_blank">Link<a> of some sort.', ##.####, -##.####, #]
 */
];

var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 14,
  /* Zoom level of your map */
   center: new google.maps.LatLng(51.5008811, 0.06366170000001148),
  /* coordinates for the center of your map */
  mapTypeId: google.maps.MapTypeId.ROADMAP
});

var infowindow = new google.maps.InfoWindow();

var marker, i;

for (i = 0; i < locations.length; i++) {
  marker = new google.maps.Marker({
    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
    map: map
  });

  google.maps.event.addListener(marker, 'click', (function(marker, i) {
    return function() {
      infowindow.setContent(locations[i][0]);
      infowindow.open(map, marker);
    }
  })(marker, i));
}
</script>
<script>
$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');


  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.dropdown-submenu .show').removeClass("show");
  });


  return false;
});
</script>

<style>
label.error {
	color: red;
}
</style>
<script>
$('document').ready(function(){
    $('#email').keyup(function(){
        var email = $(this).val();
        $.ajax({
                  method:'POST',
                  url:'<?php echo Router::url(['controller' => 'User', 'action' => 'emailCheck']); ?>',
                  dataType: "text",
                  data:{email:email},
                  success: function(data)
                  {
                      if(data){
                          $( ".result" ).html('<span style="color:red">Someone already has that username. Try another?</span>');
                      }else{
                         $( ".result" ).html('<span style="color:green">The email is still available!!</span>');
                      }

                  }
        });
    })
</script>