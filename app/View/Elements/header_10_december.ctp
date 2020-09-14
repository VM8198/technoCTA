<!DOCTYPE html>
<html lang="en">
<head>
<title>Techno CTA</title>
<meta charset="UTF-8">
<meta name="description" content="Unica University Template">
<meta name="keywords" content="event, unica, creative, html">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
<!-- Favicon -->
<link href="https://techno.sdssoftltd.co.uk/img/fav-icon.png" rel="shortcut icon"/>

<!-- Google Fonts -->

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>

<!-- Stylesheets -->
<?php
error_reporting(0);
 echo  $this->Html->css('bootstrap.min.css');
   echo $this->Html->css('font-awesome.min.css');
   echo $this->html->css('themify-icons.css');
   echo $this->Html->css('magnific-popup.css');
   echo $this->Html->css('animate.css');
   echo $this->Html->css('owl.carousel.css');
   echo $this->Html->css('style.css');
   echo $this->Html->css('eagle.gallery.min.css');
    echo $this->Html->css('datepicker.css');
    echo $this->Html->css('signature-pad.css');
  
  
?>
<?php echo $this->Html->script('jquery.min.js');?>
<link href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css" rel="stylesheet">


<script type="text/javascript">
var DateHelper = {
    addDays : function(aDate, numberOfDays) {
        aDate.setDate(aDate.getDate()+2);              // Add numberOfDays
        return aDate;                                  // Return the date
    },
    format : function format(date) {
        return [
          ("0" + date.getDate()).slice(-2),           // Get day and pad it with zeroes
          ("0" + (date.getMonth()+1)).slice(-2),      // Get month and pad it with zeroes
          date.getFullYear()                          // Get full year
        ].join('/');                                   // Glue the pieces together
    }
}
var DateHelper1 = {
    addDays1 : function(aDate, numberOfDays) {
        aDate.setDate(aDate.getDate()+1);              // Add numberOfDays
        return aDate;                                  // Return the date
    },
    format : function format(date) {
        return [
          ("0" + date.getDate()).slice(-2),           // Get day and pad it with zeroes
          ("0" + (date.getMonth()+1)).slice(-2),      // Get month and pad it with zeroes
           date.getFullYear()                          // Get full year
        ].join('/');                                   // Glue the pieces together
    }
}
var DateHelper2 = {
    addDays2 : function(aDate, numberOfDays) {
        aDate.setDate(aDate.getDate());              // Add numberOfDays
        return aDate;                                  // Return the date
    },
    format : function format(date) {
        return [
          ("0" + date.getDate()).slice(-2),           // Get day and pad it with zeroes\
          ("0" + (date.getMonth()+1)).slice(-2),      // Get month and pad it with zeroes
           date.getFullYear()                          // Get full year
        ].join('/');                                   // Glue the pieces together
    }
}
var days2 = DateHelper.format(DateHelper.addDays(new Date(), -5));
var days1 = DateHelper1.format(DateHelper1.addDays1(new Date(), -5));
var samedays = DateHelper2.format(DateHelper2.addDays2(new Date(), -5));
</script>


</head>
<body>
<!-- Page Preloder  <body oncontextmenu="return false;">-->

<!-- header section -->
<header class="header-section" >
  <div class="container-fluid">
    <div class="row"> 
      <!-- logo -->
      <div class="col-sm-5 col-lg-4">
      	<a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index'));?>" class="site-logo" title="TechnoCTA">
        <?php echo $this->Html->image('/app/webroot/img/logo.jpg', array('alt'=>'logo','class'=>'img-responsive','title'=>'Techno CTA Ltd')) ?></a>

      </div>
      <div class="col-sm-7 col-lg-8" align="right">
        <div class="nav-switch">
        	<i class="fa fa-bars"></i>
        </div>
        <div class="header-info rights">
          <div class="hf-item">
            <p><i class="fa fa-phone"></i><a href="tel:02070550877">0207-0550-877</a></p>
			 <p><i class="fa fa-envelope"></i><a href="mailto:info@technocta.co.uk">info@technocta.co.uk</a></p>
          </div>
          
        </div>
		<button class="btn btn-success"  data-toggle="modal" data-target="#myModal3">Book Now</button>
        <div class="header-info">
         

		  <?php if($this->Session->read('Auth')){?>
      
			<!--  <a href=""> -->
		<div class=" btn-welcome">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Welcome <?php if($_SESSION['Auth']['User']['user_type']=="User"){
			echo $_SESSION['Auth']['User']['first_name']; 
			}else{ echo $_SESSION['Auth']['User']['company'];  }?>
			</button>
			<div class="dropdown-menu header_open_menu dropright">
				<?php if($_SESSION['Auth']['User']['user_type']=="User"){?>
				<a class="dropdown-item logout" href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'profile'));?>">Profile</a>
				<?php }else { ?> 
				<a class="dropdown-item logout" href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'companyprofile'));?>">Profile</a>
				<?php } ?>
				<a class="dropdown-item logout" href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'logout'));?>">Logout</a>
    
			</div>
		</div>
		<?php }else{ ?>
		  <button class="btn btn-danger" data-toggle="modal" data-target="#myModal">Login</button><?php  } ?>
        </div>
      </div>
    </div>
  </div>
</header>
 <div style="background:#5cb85c;color:#ffffff;text-align:center;font-size:18px;position: relative;" id= "successMsg"><?php echo $this->Session->flash('form1'); ?> </div> 
<!-- header section end--> 
<!-- Header section  -->
<nav class="nav-section">
  <div class="container-fluid">
    <ul class="main-menu">
      <li class="nav-item dropdown">
      <a  class="nav-link dropdown-toggle <?php if(($this->params['controller']=='homes' && $this->params['action']=='index')||($this->params['controller']=='contents' && $this->params['action']=='about_us')||($this->params['controller']=='contents' && $this->params['action']=='terms_conditions')||($this->params['controller']=='contents' && $this->params['action']=='our_facility')){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index'));?>">Home</a>
      <div class="dropdown-menu"> 
		<a class="dropdown-item <?php if($this->params['controller']=='contents' && $this->params['action']=='about_us'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'about_us'));?>">About Us</a> 
		<a class="dropdown-item <?php if($this->params['controller']=='contents' && $this->params['action']=='terms_conditions'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'terms_conditions'));?>">Terms & Conditions</a> 
		<a class="dropdown-item <?php if($this->params['controller']=='contents' && $this->params['action']=='our_facility'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'our_facility'));?>">Facilities</a> 
		</div>
      </li>
	
	  
      <li class="nav-item dropdown"><a href="#"  class="nav-link dropdown-toggle <?php if(($this->params['controller']=='courses' && $this->params['action']=='railway_safety')||($this->params['controller']=='courses' && $this->params['action']=='construction')||($this->params['controller']=='courses' && $this->params['action']=='plant_operation')||($this->params['controller']=='courses' && $this->params['action']=='small_tools')||($this->params['controller']=='courses' && $this->params['action']=='health_safety')){ echo "active";};?>"  data-toggle="dropdown">Training Courses </a>
        <div class="dropdown-menu header"> 
		<a class="dropdown-item <?php if($this->params['controller']=='courses' && $this->params['action']=='railway_safety'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'railway_safety'));?>">Railway Safety </a> 
		<a class="dropdown-item <?php if($this->params['controller']=='courses' && $this->params['action']=='construction'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'construction'));?>">Construction</a> 
		<a class="dropdown-item <?php if($this->params['controller']=='courses' && $this->params['action']=='plant_operation'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'plant_operation'));?>">Plant Operation</a> 
		<a class="dropdown-item <?php if($this->params['controller']=='courses' && $this->params['action']=='small_tools'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'small_tools'));?>">Small Tools </a> 
		<a class="dropdown-item <?php if($this->params['controller']=='courses' && $this->params['action']=='health_safety'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'health_safety'));?>">Health and Safety / First Aid </a>
		</div>
		
      </li>
      <li class="<?php if($this->params['controller']=='contents' && $this->params['action']=='policy_certificate'){ echo "active";};?>"><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'policy_certificate'));?>">Policy</a></li>
	  <li class="<?php if($this->params['controller']=='contents' && $this->params['action']=='accreditations'){ echo "active";};?>"><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'accreditations'));?>">Accreditation Certificate</a></li>
	  
       <li class="nav-item dropdown">
      	<a href="#"  class="nav-link dropdown-toggle <?php if($this->params['controller']=='contents' && $this->params['action']=='recruitment'){ echo "active";};?>"  data-toggle="dropdown">Recruitment</a>
        <div class="dropdown-menu">
        	
            <a class="dropdown-item <?php if($this->params['controller']=='contents' && $this->params['action']=='recruitment'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'recruitment'));?>">Labour Supply-Recruitment </a>
        </div>
      </li>
	  
      <li class="nav-item dropdown ">
      <a class="nav-link dropdown-toggle <?php if(($this->params['controller']=='trainings' && $this->params['action']=='handbook_network_rail')||($this->params['controller']=='trainings' && $this->params['action']=='handbooks_london')||($this->params['controller']=='trainings' && $this->params['action']=='network_rail')||($this->params['controller']=='trainings' && $this->params['action']=='sentinel')||($this->params['controller']=='trainings' && $this->params['action']=='pts_card')||($this->params['controller']=='trainings' && $this->params['action']=='industry_common_induction')){ echo "active";};?>" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Training Reference Materials</a>
	   
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item <?php if($this->params['controller']=='trainings' && $this->params['action']=='handbook_network_rail'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'trainings', 'action' => 'handbook_network_rail'));?>">Handbooks-Network Rail</a></li>
          <li><a class="dropdown-item <?php if($this->params['controller']=='trainings' && $this->params['action']=='handbooks_london'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'trainings', 'action' => 'handbooks_london'));?>">Handbooks–London Underground</a></li>
          <li class="dropdown-submenu"><a class="dropdown-item <?php if($this->params['controller']=='trainings' && $this->params['action']=='network_rail'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'trainings', 'action' => 'network_rail'));?>">Keypoints Card-Network Rail</a>

              <li><a class="dropdown-item <?php if($this->params['controller']=='trainings' && $this->params['action']=='sentinel'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'trainings', 'action' => 'sentinel'));?>">Sentinel</a></li>
              <li><a class="dropdown-item <?php if($this->params['controller']=='trainings' && $this->params['action']=='pts_card'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'trainings', 'action' => 'pts_card'));?>">What Is a PTS Card?</a></li>
              <li><a class="dropdown-item <?php if($this->params['controller']=='trainings' && $this->params['action']=='industryCommonInduction'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'trainings', 'action' => 'industryCommonInduction'));?>">What Is the Industry Common Induction?</a></li>
			  <li><a class="dropdown-item <?php if($this->params['controller']=='trainings' && $this->params['action']=='workingonrail'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'trainings', 'action' => 'workingonrail'));?>">Working on Rail</a></li>
			  <!--<li><a class="dropdown-item <?php //if($this->params['controller']=='trainings' && $this->params['action']=='railmedical'){ echo "active";};?>" href="<?php //echo $this->html->url(array('controller' => 'trainings', 'action' => 'railmedical'));?>">Rail Medical Standards</a></li>-->
            
          </li>
        </ul>
      </li>
       <li class="nav-item dropdown">
	   <a class="nav-link dropdown-toggle <?php if(($this->params['controller']=='contents' && $this->params['action']=='medical')||($this->params['controller']=='contents' && $this->params['action']=='railwaymedical')||($this->params['controller']=='trainings' && $this->params['action']=='drugalcohol')||($this->params['controller']=='trainings' && $this->params['action']=='railmedical')||($this->params['controller']=='courses' && $this->params['action']=='drug_medical')){ echo "active";};?>" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Drug & Alcohol Screening & Medical Assessments</a>
	   <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item <?php if($this->params['controller']=='contents' && $this->params['action']=='medical'){ echo "active";};?> " href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'medical'));?>">Medical Rail & Construction- Safety Critical Medical</a></li>
          <li><a class="dropdown-item <?php if($this->params['controller']=='contents' && $this->params['action']=='railwaymedical'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'railwaymedical'));?>">Rail Medical & Drug & Alcohol</a></li>
          <li><a class="dropdown-item <?php if($this->params['controller']=='trainings' && $this->params['action']=='drugalcohol'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'trainings', 'action' => 'drugalcoholtesting'));?>">Drug and Alcohol Testing Service</a></li>
		  <li><a class="dropdown-item <?php if($this->params['controller']=='trainings' && $this->params['action']=='drugalcohol_and_railmedical'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'trainings', 'action' => 'drugalcohol_and_railmedical'));?>">Drug & Alcohol FAQs and Rail Medical Standards</a></li>
      <li>
        <a class="dropdown-item <?php if($this->params['controller']=='courses' && $this->params['action']=='drug_medical'){ echo "active";};?>" href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'drug_medical'));?>">Book Now : DA & Medical Assessments</a>
      </li>
        </ul>
	   </li>
      <li class="<?php if($this->params['controller']=='galleries' && $this->params['action']=='gallery'){ echo "active";};?>"><a href="<?php echo $this->html->url(array('controller' => 'galleries', 'action' => 'gallery'));?>">Gallery</a></li>
      <li class="<?php if($this->params['controller']=='contacts' && $this->params['action']=='contact_us'){ echo "active";};?>"><a href="<?php echo $this->html->url(array('controller' => 'contacts', 'action' => 'contact_us'));?>">Contact Us</a></li>
    </ul>
  </div>
</nav>
<!-- Header section end --> 
<script>
setTimeout(function() {
    $('#successMsg').fadeOut('fast');
}, 45000);
</script>