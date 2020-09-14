<script>
    var SITEPATH = '<?php echo SITEPATH; ?>';
    //alert(SITEPATH);
</script>

<!-- Breadcrumb section -->
<div class="site-breadcrumb">
  <div class="container"> 
  	<a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index'));?>"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i> <span>Sentinel</span> 
  </div>
</div>
<!-- Breadcrumb section end -->

<section id="inner-headline-gallery" class="about-page">
  <div class="carousel-text" align="center">
    <h1>Sentinel<strong></strong></h1>
  </div>
</section>
<section class="about-section spad pt-0">
<div class="container"> 
    	<div class="col-md-12">
    <h4>Sentinel</h4>
   <div class="row">
    	<?php foreach($pdfDetails as $result) { ?>
			<div class="col-md-3 mb-4">
				<?php echo $this->html->image('references/image/'.$result['Pdf']['image'] ,array('class'=>'mb-2'));?>
				<a class="btn btn-warning" href="<?php echo SITEPATH .'app/webroot/img/references/pdf/'.$result['Pdf']['pdf_file']; ?>" download>Free Download</a>
			</div>
		<?php } ?>
		<div class="video-sec" style="margin-top:-7px;">
		<div class="col-md-3 mb-4">
		<video width="391" height="391" controls>
			<source src="<?php echo $this->webroot; ?>files/SentinelVideo.mp4" type="video/mp4">
			Your browser does not support the video tag.
		</video>
		</div>
		</div>
   <br>
    	
        	<p>Sentinel is one of the premier safety systems in use across the Rail Industry. They provide rail workers with a passport to work on the rail infrastructure across the United Kingdom by using the latest smart card technology.</p>
<p>To make Sentinel smart, safe and simple they use the very latest smartcard technology, a secure and trusted database, and multiple platforms such as smartphones. This allows workers’ competence and fitness to work to be verified simply and effectively in near real time.</p>
<p>Sentinel is growing.  There are presently 176,424 users (2018) on the system across the Network including Transport for London who has adopted the scheme.  The technical capability was improved in 2016 with new functionality (Site Access), to improve the management of workers’ hours and reduce their exposure to the risks of fatigue.</p>
			<h3>Sentinel history</h3>
            <br/>
            <p>Since 1999, Sentinel has been the chosen identity card scheme for making sure that people who work on or near Network Rail’s infrastructure have basic competence and are medically fit to do so. The system, owned and developed by Network Rail, is based on a central database and a common system for checking that people hold Personal Track Safety (PTS) or Industry Common Induction (ICI), other critical competences and medical fitness to work and in-date Drugs and Alcohol certificates, all assured against a ‘single version of the truth’. Originally a paper-based approach was taken and the system – though better – was not perfect. Re-printing of cards was necessary if something changed and there was no capability to easily verify or ‘authenticate’ the information being presented. Even with the introduction of a telephone hotline the data indicated that full checks were rarely carried out.</p>
<p>2013 saw a significant upgrade to the Sentinel system, making use of electronic chip technology within newly formatted cards. This allows near ‘real time’ checking of competence using a variety of authentication methods such as smartphones, PC access or simple scanning of a QR code on the new cards. The software has been designed and developed by an external provider, Reference Point Limited (RPL), subcontracted from MITIE security. It is now possible to check the card against the central database in near real time using 3 and 4g connectivity. In 2014, Transport for London became the first other Rail Entity to join the system and future expansion is under discussion with HS2 and the Highways Agency.</p>
<p>Further enhancement projects in 2016, which are already in progress, will see the Sentinel system being used to control site access and improve the management of risk due to fatigue. Until very recently, the prescribed route to becoming a Sentinel Card holder, in terms of competence, was to hold Personal Track Safety (PTS) as a minimum. An initiative has also been made to bring Non Trackside employees onto the Sentinel Scheme using an Industry Common Induction (ICI) standard as an alternative prerequisite for inclusion.</p>
			  <hr class="hr"/>
      
      
    <h4 class="">How to get Sentinel Card?</h4>
    <div class="">
    	<div class="">
        	<h3 class="mb-2">What Is a Rail Sentinel Card?</h3>
        	<p>The Rail Sentinel card is a smartcard that is to be swiped at the start of every shift by the Controller of Site Safety (COSS) to ensure that all workers who work on or near the railway are permitted to do so.  Without it, you will not be allowed to work on the railway.</p>
            <p>The Rail Sentinel card contains and is used to check the following information:</p>
            <ul class="pl-4">
                <li>Your ID</li>
                <li>You have a valid Sponsor</li>
                <li>You hold the necessary competences to carry out the work that will be performed</li>
                <li>You have a valid Personal Track Safety (PTS) or Industry Common Induction (ICI) competence</li>
                <li>You have a valid medical and drugs and alcohol record</li>
            </ul>   
          
			<h3 class="mb-2">Rail Sentinel Sponsorship</h3>
            <p>If you’ve decided you’re interested in working on the railway, establishing your Rail Sentinel Sponsorship will be your first step.</p>
			<p>As Rail Sentinel cards are not available to the general public, you’ll need a Sponsor to purchase one for you on your behalf.  A Sponsor is usually your new employer or you can be Sponsored by a rail recruitment provider.</p>
            <p>Once you have a Sponsorthey will conduct your Industry Common Induction – network rail ICI and/or London Underground endorsement – ICI London underground for you depending on the railway infrastructure where it will be used.</p>


			<p>Your Sponsor, they’ll need to ensure you’ve successfully completed the necessary ICI rail course – Industry Common Induction (ICI) before ordering your Sentinel rail card through the Sentinel card services.</p>
			<p>This is important because without it, you cannot work on the railway.</p>
			<h3 class="mb-2">Applying for Your Sentinel Card</h3>
            <p>To order your Rail Sentinel card through the Sentinel card services, your Sponsor will need the following information from you:</p>
            <ul class="pl-4">
            	<li>Full name</li>
				<li>Current and valid photograph (for guidance, please check out these official guidelines)</li>
				<li>Industry Common Induction (ICI) Assessment result which will indicate your competence</li>
				<li>Eligibility to work in the UK</li>
			</ul>
            <br/>
            <p>Upon being ordered, your Sentinel card should arrive within 11 working days and you must present it to the Controller of Site Safety (COSS) every time you work on the railway. Further qualifications within the rail industry such as railway medical screening, railway drug and alcohol screening, Personal Track Safety, Lookout, Controller of site safety are endorsed on the Sentinel card.</p>
           
		</div>
        </div>

    </div>
</div></section>

<!-- About section end-->