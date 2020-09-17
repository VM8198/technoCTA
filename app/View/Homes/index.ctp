
<script>
		var SITEPATH = '<?php echo SITEPATH; ?>';
		//alert(SITEPATH);
</script>
<?php $site = SITEPATH; ?>
<!-- Hero section -->
<section class="hero-section">
	<div class="hero-slider owl-carousel">
		<div class="hs-item set-bg" data-setbg="img/hero-slider/1.jpg">
			<div class="hs-text">
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<h2 class="hs-title">Construction and Railway <br>
								Training Provider</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="hs-item set-bg" data-setbg="img/hero-slider/1.jpg">
			<div class="hs-text">
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<h2 class="hs-title">Construction and Railway <br>
								Training Provider</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="counter-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-3">
					<div class="counter-content">
						<h2>Find A Training Course</h2>
					</div>
				</div>
				<div class="col-lg-8 col-md-9">
					<div class="Location-Course">
						<?php echo $this->Form->create('Course', array('controller' => 'courses', 'action' => 'booknow','type' => 'get','id'=>'searchForm')); ?>
						<div class="row">
							<div class="col-md-3">
								<select class="form-control" id="sectorId" name="sector_id" onchange="getsectorId();">
									<option value='' selected>Sector</option>
									<?php foreach ($sector as $value) { ?>
									<option value="<?php echo $value['Sector']['id']; ?>"><?php echo $value['Sector']['sector_name']; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-md-3" id="courseId">
								<select class="form-control"  name="course_name">
									<option value='' selected>Course</option>
									<?php foreach ($course as $value) { ?>
									<option value="<?php echo $value['Course']['course_name']; ?>"><?php echo $value['Course']['course_name']; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-md-3" id="locationId">
								<select class="form-control" name="location_id">
									<option value='' selected>Location</option>
									<?php foreach($location as $value){ ?>
									<option value="<?php echo $value['Location']['id']; ?>"><?php echo $value['Location']['location']; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-md-3">
								<div class="butn-search">
									<button class="btn btn-danger" onclick="findCar()">Search Now</button>
								</div>
							</div>
						</div>
						<?php echo $this->form->end(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>
<!-- Hero section end --> 

<!-- Counter section  --> 

<!-- Counter section end --> 

<!-- Services section -->

<section class="service-section spad">
	<div class="back_section">
		<div class="container services">
			<div class="section-title text-center">
				
				<h3><?php echo $heading['Content']['description']?></h3>
				<p><?php echo $content['Content']['description']?></p>
			</div>
		</div>
	</div>
	<div class="service-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4"> <a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'our_facility'));?>"><?php echo $this->Html->image('/app/webroot/img/services-icons/image1.jpg', array('class'=>'img-fluid')) ?></a>
					<div class="firstservice">
						<a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'our_facility'));?>"><h2> Classroom Based Training </h2></a>
						<p>We offer a wide selection of on-site classroom based training, beginner to experienced. Our Training is primarily housed
							within our training centre based in
							East London E16.</p>
					</div>
				</div>
				<div class="col-md-4"> <a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'our_facility'));?>"><?php echo $this->Html->image('/app/webroot/img/services-icons/image2.jpg', array('class'=>'img-fluid')) ?></a>
					<div class="firstservice">
						<a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'our_facility'));?>"><h2> On-Site Assessments </h2></a>
						<p>We offer assessments to previous candidates and newcomer alike.. We also have our own-training track onsite. We can also travel out to your chosen site to carry out your assessment whilst you complete
							your shift work.</p>
					</div>
				</div>
				<div class="col-md-4"> <a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'our_facility'));?>"><?php echo $this->Html->image('/app/webroot/img/gallery/gallery1.jpg', array('class'=>'img-fluid')) ?></a>
					<div class="firstservice">
						<a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'our_facility'));?>"><h2> E-Learning Based Training </h2></a>
						<p>In 2014, we had a brand new all-purpose built E-Learning suite installed at our
							Training Centre. We can accommodate
							12 candidates at any one time. We offer
							full IT support to all our candidates.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Services section end --> 

<!-- Courses section -->
<section class="courses-section spad">
	<div class="container">
		<div class="">
			<div class="section-title text-center">
				<h2><?php echo $training_courses['Content']['title']?></h2>
				<hr>
				<p><?php echo $training_courses['Content']['description']?></p>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">
					<div class="icon-section"><?php echo $this->Html->image('/app/webroot/img/services-icons/icon1.png') ?>
						<p>Railway Safety</p>
					</div>
				</div>
				<div class="col-md-2">
					<div class="icon-section"> <?php echo $this->Html->image('/app/webroot/img/services-icons/icon2.png') ?>
						<p>Construction</p>
					</div>
				</div>
				<div class="col-md-2">
					<div class="icon-section"><?php echo $this->Html->image('/app/webroot/img/services-icons/icon3.png') ?>
						<p>Plant Operation</p>
					</div>
				</div>
				<div class="col-md-2">
					<div class="icon-section"><?php echo $this->Html->image('/app/webroot/img/services-icons/icon4.png') ?>
						<p>Small Tools</p>
					</div>
				</div>
				<div class="col-md-2">
					<div class="icon-section"> <?php echo $this->Html->image('/app/webroot/img/services-icons/icon5.png') ?>
						<p>Health and Safety</p>
					</div>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</div>
</section>
<!-- Courses section end--> 

<!-- Fact section end-->
<section class="courses-section Choose spad">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="why_choose">
					<h2><?php echo $index['Content']['title']?>
						<hr>
					</h2>
					<div class="section-title why-choose-option">
						<?php echo $index['Content']['description']?>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="why_choose">
					<h2>See Our Gallery
						<hr>
					</h2>
				</div>
				<!-- Gallery section -->
				
					<div class="gallery-section">
					<div class="">
						<div class="col-sm-12 grid gride1 cs-style-4">
							 <div class="gallery row" id="lightgallery1">
		 
			<?php foreach($gallery as $image) {   ?>
				<?php $imgpath = SITEPATH . "app/webroot/img/galleryimage/" . $image['GalleryImage']['image']; //pr($imgpath); ?>
										<?php// $imgpath1 = "$site" . "homes/resizeimage/" . $image['image'] . '/300/200'; ?>
					<div class="col-sm-6" data-src="<?php echo $imgpath;?>">
						<div class="img-gallery">
							<?php  echo $this->html->image('/img/galleryimage/'.$image['GalleryImage']['image'] ,array('width'=>'250px','height'=>'200')); ?>
						</div>
					</div>
			<?php } ?>
				</div>
			<div class="col-sm-6">
			<div class="text-left">
				 <a href="<?php echo $this->html->url(array('controller' => 'galleries', 'action' => 'gallery'));?>" class="site-btn gallery">See More</a>
								</div>
				</div>
							<!-- Gallery section --> 
						</div>
					</div>
				</div>
		</div>
	</div>
</section>
<!-- Contact form section -->

<div class="contact-form spad" id="contact_id">
	<div class="container">
		<div class="section-title text-center">
			<h2>Get In Touch With Us
				<hr>
			</h2>
		</div>
		<div style="color:red;text-align:center;font-size:18px;position: relative;" id= "successMsg"><?php echo $this->Session->flash(); ?> </div>
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-1"></div> 
				<div class="col-sm-10">
				 <?php echo $this->Form->create('Contact', array('controller'=>'contacts','action'=>'contact_us1', 'class' => 'comment-form --contact', 'id' => 'contactForm')); ?>
						<div class="row">
							<div class="col-lg-4">
									<input type="text" name="data[Contact][name]" placeholder="Name">
							</div>
							<div class="col-lg-4" style="padding:0px;">
								<input type="text" name="data[Contact][email]" placeholder="Email Address">
							</div>
							<div class="col-lg-4">
								<input type="text" name="data[Contact][phone]" maxlength="14" onkeypress="javascript:return isNumber(event)" placeholder="Phone Number">
							</div>
							<div class="col-lg-12">
								<textarea name="data[Contact][message]" placeholder="Message"></textarea>
								<div class="text-left">
									<button class="site-btn" type="submit" id="contact_dis" disabled="">Submit</button>
								</div>
							</div>
						</div>
				 <?php echo $this->Form->end(); ?>
				</div>
				<div class="col-sm-1"></div>
			</div>
		</div>
	</div>
</div>

<!-- Contact form End --> 


<!-- Event section end -->
<script>
setTimeout(function() {
		$('#flashMessage').fadeOut('fast');
}, 10000);
</script>


<script>
    function getsectorId() {
        var sectorId = $('#sectorId').val();
        $.ajax({
            url: SITEPATH + "homes/getcourseajax",
            data: {
                sectorId: sectorId,
            },
            type: "POST",
            success: function (result) {
                $("#courseId").empty().append(result);
            }
        });
    }
</script>
<script>
    function getlocationid() {
        var coursename = $('#coursename').val();
        $.ajax({
            url: SITEPATH + "homes/getlocationajax",
            data: {
                coursename: coursename,
            },
            type: "POST",
            success: function (result) {
                $("#locationId").empty().append(result);
            }
        });
    }
</script>
<!-- <script>
$(function()
{
    $("#searchForm").validate(
      {
        rules: 
        {
          sector_id: 
          {
            required: true
          },
		  course_name: 
          {
            required: true
          },
		  location_id: 
          {
            required: true
          }
        },
		messages:
		{
		sector_id: 
          {
            required:'Please select sector'
          },
		  course_name: 
          {
            required:'Please select course'
          },
		  location_id: 
          {
            required:'Please select location'
          }	
		}
      });	
});
</script> -->
