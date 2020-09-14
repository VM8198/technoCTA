<!DOCTYPE html>
<html lang="en">
<head>
<title>Techno CTA</title>
<meta charset="UTF-8">
<meta name="description" content="Unica University Template">
<meta name="keywords" content="event, unica, creative, html">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Favicon -->
<link href="http://techno.sdssoftltd.co.uk/img/fav-icon.png" rel="shortcut icon"/>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>

<!-- Stylesheets -->
<?php
 echo  $this->Html->css('bootstrap.min.css');
   echo $this->Html->css('font-awesome.min.css');
   echo $this->html->css('themify-icons.css');
   echo $this->Html->css('magnific-popup.css');
   echo $this->Html->css('animate.css');
   echo $this->Html->css('owl.carousel.css');
   echo $this->Html->css('style.css');
   echo $this->Html->css('eagle.gallery.min.css');
    echo $this->Html->css('datepicker.css');
  
  
?>
<link href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css" rel="stylesheet">
</head>
<body>
<!-- Page Preloder -->

<!-- header section -->
<header class="header-section" >
  <div class="container-fluid">
    <div class="row"> 
      <!-- logo -->
      <div class="col-sm-5 col-lg-4">
      	<a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index'));?>" class="site-logo" title="TechnoCTA">
        <?php echo $this->Html->image('/app/webroot/img/logo.png', array('alt'=>'logo','class'=>'img-responsive','title'=>'Techno CTA Ltd')) ?></a>
      </div>
      <div class="col-sm-7 col-lg-8" align="right">
        <div class="nav-switch">
        	<i class="fa fa-bars"></i>
        </div>
        <div class="header-info rights">
          <div class="hf-item">
            <p><i class="fa fa-phone"></i><a href="tel:02070550877">0207-0550-877</a></p>
          </div>
          <div class="hf-item">
            <p><i class="fa fa-envelope"></i><a href="mailto:info@technocta.co.uk">info@technocta.co.uk</a></p>
          </div>
        </div>
        <div class="header-info pull-right">
         <button class="btn btn-success"  data-toggle="modal" data-target="#myModal3">Book Now</button>
		  <?php if($this->Session->read('Auth')){?>
			 <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'logout'));?>"><button class="btn btn-danger" >Welcome <?php echo $_SESSION['Auth']['User']['first_name']?>... Logout</button></a>
		  <?php }else{ ?>
		  <button class="btn btn-danger" data-toggle="modal" data-target="#myModal">LogIn</button> <?php  } ?>
        </div>
      </div>
    </div>
  </div>
</header>
 <div style="color:red;text-align:center;font-size:18px;position: relative;" id= "successMsg"><?php echo $this->Session->flash(); ?> </div> 
<!-- header section end--> 
<!-- Header section  -->
<nav class="nav-section">
  <div class="container-fluid">
    <ul class="main-menu">
      <li class="<?php if($this->params['controller']=='homes' && $this->params['action']=='index'){ echo "active";};?>"><a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index'));?>">Home</a></li>
	
      <li class="nav-item dropdown"><a class="nav-link dropdown-toggle <?php if(($this->params['controller']=='contents' && $this->params['action']=='about_us')||($this->params['controller']=='contents' && $this->params['action']=='terms_conditions')||($this->params['controller']=='contents' && $this->params['action']=='our_facility')){ echo "active";};?>" href="#" data-toggle="dropdown" >About Us</a>
	  
        <div class="dropdown-menu"> 
		<a class="dropdown-item <?php if($this->params['controller']=='contents' && $this->params['action']=='about_us'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'about_us'));?>">About Us</a> 
		<a class="dropdown-item <?php if($this->params['controller']=='contents' && $this->params['action']=='terms_conditions'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'terms_conditions'));?>">Terms & Conditions</a> 
		<a class="dropdown-item <?php if($this->params['controller']=='contents' && $this->params['action']=='our_facility'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'our_facility'));?>">Facilities</a> 
		</div>
      </li>
	  
      <li class=""><a href="#"  class="nav-link dropdown-toggle <?php if(($this->params['controller']=='courses' && $this->params['action']=='railway_safety')||($this->params['controller']=='courses' && $this->params['action']=='construction')||($this->params['controller']=='courses' && $this->params['action']=='plant_operation')||($this->params['controller']=='courses' && $this->params['action']=='small_tools')||($this->params['controller']=='courses' && $this->params['action']=='health_safety')){ echo "active";};?>"  data-toggle="dropdown">Training Courses </a>
        <div class="dropdown-menu header"> 
		<a class="dropdown-item <?php if($this->params['controller']=='courses' && $this->params['action']=='railway_safety'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'railway_safety'));?>">Railway Safety </a> 
		<a class="dropdown-item <?php if($this->params['controller']=='courses' && $this->params['action']=='construction'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'construction'));?>">Construction</a> 
		<a class="dropdown-item <?php if($this->params['controller']=='courses' && $this->params['action']=='plant_operation'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'plant_operation'));?>">Plant Operation</a> 
		<a class="dropdown-item <?php if($this->params['controller']=='courses' && $this->params['action']=='small_tools'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'small_tools'));?>">Small Tools </a> 
		<a class="dropdown-item <?php if($this->params['controller']=='courses' && $this->params['action']=='health_safety'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'health_safety'));?>">Health and Safety / First Aid </a> 
		</div>
		
      </li>
      <li class="<?php if($this->params['controller']=='contents' && $this->params['action']=='policy_certificate'){ echo "active";};?>"><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'policy_certificate'));?>">Policy & Certificate</a></li>
	  
       <li class="">
      	<a href="#"  class="nav-link dropdown-toggle <?php if($this->params['controller']=='contents' && $this->params['action']=='recruitment'){ echo "active";};?>"  data-toggle="dropdown">Recruitment</a>
        <div class="dropdown-menu">
        	
            <a class="dropdown-item <?php if($this->params['controller']=='contents' && $this->params['action']=='recruitment'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'recruitment'));?>">Labour Supply-Recruitment </a>
        </div>
      </li>
	  
      <li class="nav-item dropdown ">
      <a class="nav-link dropdown-toggle <?php if(($this->params['controller']=='trainings' && $this->params['action']=='handbook_network_rail')||($this->params['controller']=='trainings' && $this->params['action']=='handbooks_london')||($this->params['controller']=='trainings' && $this->params['action']=='network_rail')||($this->params['controller']=='trainings' && $this->params['action']=='sentinel')||($this->params['controller']=='trainings' && $this->params['action']=='pts_card')||($this->params['controller']=='trainings' && $this->params['action']=='industry_common_induction')){ echo "active";};?>" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Training Reference Materials</a>
	   
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item <?php if($this->params['controller']=='trainings' && $this->params['action']=='handbook_network_rail'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'trainings', 'action' => 'handbook_network_rail'));?>">Handbooks-Network Rail</a></li>
          <li><a class="dropdown-item <?php if($this->params['controller']=='trainings' && $this->params['action']=='handbooks_london'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'trainings', 'action' => 'handbooks_london'));?>">Handbooks–London Underground</a></li>
          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Keypoints Card</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item <?php if($this->params['controller']=='trainings' && $this->params['action']=='network_rail'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'trainings', 'action' => 'network_rail'));?>">Network Rail</a></li>
              <li><a class="dropdown-item <?php if($this->params['controller']=='trainings' && $this->params['action']=='sentinel'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'trainings', 'action' => 'sentinel'));?>">Sentinel</a></li>
              <li><a class="dropdown-item <?php if($this->params['controller']=='trainings' && $this->params['action']=='pts_card'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'trainings', 'action' => 'pts_card'));?>">What Is a PTS Card?</a></li>
              <li><a class="dropdown-item <?php if($this->params['controller']=='trainings' && $this->params['action']=='industry_common_induction'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'trainings', 'action' => 'industry_common_induction'));?>">What Is the Industry Common Induction?</a></li>
            </ul>
          </li>
        </ul>
      </li>
       <li class="<?php if($this->params['controller']=='contents' && $this->params['action']=='medical'){ echo "active";};?>"><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'medical'));?>">Drug & Alcohol Screening & Medical Assessments</a></li>
      <li class="<?php if($this->params['controller']=='galleries' && $this->params['action']=='gallery'){ echo "active";};?>"><a href="<?php echo $this->html->url(array('controller' => 'galleries', 'action' => 'gallery'));?>">Gallery</a></li>
      <li class="<?php if($this->params['controller']=='contacts' && $this->params['action']=='contact_us'){ echo "active";};?>"><a href="<?php echo $this->html->url(array('controller' => 'contacts', 'action' => 'contact_us'));?>">Contact Us</a></li>
    </ul>
  </div>
</nav>
<!-- Header section end --> 
<script>
setTimeout(function() {
    $('#successMsg').fadeOut('fast');
}, 10000);
</script>