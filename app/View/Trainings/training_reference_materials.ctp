

<!-- Breadcrumb section -->
<div class="site-breadcrumb">
  <div class="container"> 
  	<a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index'));?>"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i> <span>Training Reference Materials</span> 
  </div>
</div>
<!-- Breadcrumb section end -->

<section id="inner-headline-gallery" class="about-page">
  <div class="carousel-text" align="center">
    <h1>Training Reference<strong> Materials</strong></h1>
  </div>
</section>
<div class="container"> 
	<h1 class="h1 mt-4 mb-3">Handbooks- Network Rail</h1>
    <div class="row">
    	<?php $i=1; foreach($pdf as $result) { ?>
		<?php if($result['Pdf']['title']=='Handbooks- Network Rail'){ ?>
			<div class="col-md-3 mb-4">
				<?php echo $this->html->image('references/image/'.$result['Pdf']['image'] ,array('class'=>'mb-2'));?>
				<a class="btn btn-warning" href="<?php echo $result['Pdf']['pdf_file']; ?>" download>Free Download</a>
			</div>
		<?php } $i++; } ?>
    </div>
    <hr class="hr"/>
    <h1 class="h1 mt-4 mb-3">Handbooks – London Underground</h1>
    <div class="row">
    	<?php $i=1; foreach($pdf as $result) { ?>
		<?php if($result['Pdf']['title']=='Handbooks – London Underground'){ ?>
			<div class="col-md-3 mb-4">
				<?php echo $this->html->image('references/image/'.$result['Pdf']['image'] ,array('class'=>'mb-2'));?>
				<a class="btn btn-warning" href="<?php echo $result['Pdf']['pdf_file']; ?>" download>Free Download</a>
			</div>
		<?php } $i++; } ?>
    </div>
   <hr class="hr"/>
     <h1 class="h1 mt-4 mb-3">Keypoints Card - Network Rail</h1>
    <div class="row">
    	<?php $i=1; foreach($pdf as $result) { ?>
		<?php if($result['Pdf']['title']=='Keypoints Card - Network Rail'){ ?>
			<div class="col-md-3 mb-4">
				<?php echo $this->html->image('references/image/'.$result['Pdf']['image'] ,array('class'=>'mb-2'));?>
				<a class="btn btn-warning" href="<?php echo $result['Pdf']['pdf_file']; ?>" download>Free Download</a>
			</div>
		<?php } $i++; } ?>
    </div>
    <hr class="hr"/>
    <h1 class="h1 mt-4 mb-3">Sentinel</h1>
   <div class="row">
    	<?php $i=1; foreach($pdf as $result) { ?>
		<?php if($result['Pdf']['title']=='Sentinel'){ ?>
			<div class="col-md-3 mb-4">
				<?php echo $this->html->image('references/image/'.$result['Pdf']['image'] ,array('class'=>'mb-2'));?>
				<a class="btn btn-warning" href="<?php echo $result['Pdf']['pdf_file']; ?>" download>Free Download</a>
			</div>
		<?php } $i++; } ?>
    </div>
    <hr class="hr"/>
    <h1 class="h1 mt-4 mb-3">What is Sentinel?</h1>
    <div class="row">
    	<div class="col-md-12">
        	<p>Sentinel is one of the premier safety systems in use across the Rail Industry. They provide rail workers with a passport to work on the rail infrastructure across the United Kingdom by using the latest smart card technology.</p>
<p>To make Sentinel smart, safe and simple they use the very latest smartcard technology, a secure and trusted database, and multiple platforms such as smartphones. This allows workers’ competence and fitness to work to be verified simply and effectively in near real time.</p>
<p>Sentinel is growing.  There are presently 176,424 users (2018) on the system across the Network including Transport for London who has adopted the scheme.  The technical capability was improved in 2016 with new functionality (Site Access), to improve the management of workers’ hours and reduce their exposure to the risks of fatigue.</p>
			<h3>Sentinel history</h3>
            <br/>
            <p>Since 1999, Sentinel has been the chosen identity card scheme for making sure that people who work on or near Network Rail’s infrastructure have basic competence and are medically fit to do so. The system, owned and developed by Network Rail, is based on a central database and a common system for checking that people hold Personal Track Safety (PTS) or Industry Common Induction (ICI), other critical competences and medical fitness to work and in-date Drugs and Alcohol certificates, all assured against a ‘single version of the truth’. Originally a paper-based approach was taken and the system – though better – was not perfect. Re-printing of cards was necessary if something changed and there was no capability to easily verify or ‘authenticate’ the information being presented. Even with the introduction of a telephone hotline the data indicated that full checks were rarely carried out.</p>
<p>2013 saw a significant upgrade to the Sentinel system, making use of electronic chip technology within newly formatted cards. This allows near ‘real time’ checking of competence using a variety of authentication methods such as smartphones, PC access or simple scanning of a QR code on the new cards. The software has been designed and developed by an external provider, Reference Point Limited (RPL), subcontracted from MITIE security. It is now possible to check the card against the central database in near real time using 3 and 4g connectivity. In 2014, Transport for London became the first other Rail Entity to join the system and future expansion is under discussion with HS2 and the Highways Agency.</p>
<p>Further enhancement projects in 2016, which are already in progress, will see the Sentinel system being used to control site access and improve the management of risk due to fatigue. Until very recently, the prescribed route to becoming a Sentinel Card holder, in terms of competence, was to hold Personal Track Safety (PTS) as a minimum. An initiative has also been made to bring Non Trackside employees onto the Sentinel Scheme using an Industry Common Induction (ICI) standard as an alternative prerequisite for inclusion.</p>
			
        </div>
        <hr class="hr"/>
    <h1 class="h1 mt-4 mb-3">How to get Sentinel Card?</h1>
    <div class="row">
    	<div class="col-md-12">
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
            <br/> 
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
            <br/>
            <br/>
		</div>
        </div>
        
         <hr class="hr"/>
        <h1 class="h1 mt-4 mb-3">Sentinel Scheme Rules 2018</h1>
        <div class="row">
            <div class="col-md-12">
                <h3 class="mb-2"> Working on Rail</h3>
                <p>If you’re asking yourself the question: how to get a job on the railway, you’ve come to the right place.</p>
				<p>Working on the railway can provide a fulfilling and rewarding career.  Lots of opportunities exist for you to grow and develop.</p>
				<p>This article outlines the basic steps to take to get your career on the railway started.</p>
				 <p> <strong>Step 1: Join a Railway Recruitment Company</strong></p>
                 The first step is to get a Rail Sentinel Sponsorship.
				<p>A sentinel sponsor is responsible for ensuring you have a valid Sentinel rail profile in order for you to be you booked on to the relevant training courses.</p>
				<p>In the beginning, the chances are you won’t have a railway employer to act as a Sponsor.  The best move at this point will be to sign up with a recruitment company.
</p>
<p>They will take care of all the administrative work necessary to get you up and running on the Rail Sentinel database and ready for rail sentinel training.</p>
<p>Railway training providers who has been approved and accredited to provide railway training courses, can also help you with securing future job opportunities, which will save you the hassle further down the road. We are approved and accredited to conduct railway courses and also approved to provide railway jobs.
</p>
        <p><strong>Step 2: Start Your Induction Common Induction ICI Training</strong></p>
        <p>After registering with an approved and accredited recruitment company and are on the Rail Sentinel database, you’ll now be ready to take your first training course through a railway training provider.</p>
<p>Every new worker looking to work on or near the railway, needs to complete a mandatory two-part Industry Common Induction training course which are the e learning and the ICI training assessment to obtain a Rail Sentinel card.</p>
<p>The first part is ICI e learning module.  This will equip you with the basic knowledge and understanding of the risks, as well as the health and safety factors, regarding working within the rail and London underground infrastructure.
</p>
<p>The second part will be an ICI training assessment.  To pass the assessment you’ll need to score a minimum of 80%.</p>
<p>Once you’ve completed and passed your ICI training, your Sentinel rail profile will be updated and your Sponsor will then order you a Rail Sentinel card to enable you to progress your career.</p>
<p>To learn more about the Industry Common Induction ICI training, check out our ICI training courses.</p>
		<p><strong>Step 3: LU or Network Rail Medical, Drug and Alcohol Screening</strong></p>
        <p>Once you have been sponsored and designated an individual Sentinel number, you must then undertake a full Network Rail approved Medical, Drug and Alcohol test, which must be completed at a Network Rail approved centre.  It is imperative that all employees are compliant with the relevant drugs and alcohol policies to ensure that safety is not compromised.</p>
<p>These tests will be conducted before any offer of employment will be made for jobs near or on the track.  Once you’ve passed the medicals, you’ll be able to be considered for jobs and other training that will be required to work on the railway near or on the track.</p>
<p>The Medical Examination will cover the following: </p>
<ul class="pl-4">
	<li>Eyesight l Hearing </li>
	<li>Co-ordination </li>
	<li>Height vs weight (bmi) </li>
	<li>Colour vision l </li>
	<li>General medical history </li>
	<li>Current medication </li>
	<li>The drugs and alcohol screening will test for the following: </li>
	<li> Alcohol </li>
	<li>Drugs – illegal and legal</li>
</ul>
<br/>
<p><strong>Step 4: PTS Training – Personal track safety course</strong></p>
<p>Safety awareness and personal safety are critical to working on the railway.</p>
<p>The Personal Track Safety course help rail workers become confident in managing their own personal safety and to obtain the PTS card.  It is a mandatory two-part qualification needed to work safely on or near a railway.
The first part is an PTS network rail e-learning training module and a practical PTS course training day on the track.  You can learn more about our PTS courses here.
</p>
<p><strong>Wrapping Up</strong></p>
<p>Working on the railway can provide you with a fulfilling career that provides you lots of opportunity to develop and grow as you progress in your career.
Getting started can often be the trickiest hurdle to overcome.</p>
<h3 class="mb-2">What Is a PTS Card?</h3>
<p>The PTS Card or Personal Track Safety Card, enables individuals to legally work on or nearby Network Rail train tracks. The card is issued through the Sentinel card services by Network Rail’s chosen identity card scheme called Sentinel and is valid for 5 years.</p>
<p>Personal Track Safety Course or PTS Course covers a series of safe working practices that protect workers against being hit by trains, electrocutions, trips and falls.  Having a PTS card makes you more employable within the railway.
</p><p>If you’re new to Track Safety, it’s best to start with knowing what a PTS card actually is.  Technically, when people refer to PTS card, they’re really referring to having the PTS competence on their Sentinel card.</p>
<p>Anyone looking to work on or near the railway line requires a Personal Track Safety card which is obtained by completing the Initial Personal Track Safety Course or PTS course from an approved training provider.
</p><p>When you’ve completed your PTS course, your Sentinel profile will be updated and updates uploaded into your sentinel card to reflect your new competence, allowing you to access work trackside.
</p>
<p><strong>Who Needs a PTS Course?</strong></p>
<p>Any rail staff who wants to work near or on the railway line in the UK will need a PTS card to do so.  It is not possible to work trackside without it.  This will need to be presented to the Controller of Site Safety (COSS) via your Sentinel smartcard to gain access.</p>
<p><strong>How Long Is The PTS Card For?</strong></p>
<p>Currently, Personal Track Safety competencies are valid for two years and endorsed on your Sentinel card, at which point you’ll need to take a PTS Renewal or re-certification course which will take two full days to complete, unlike the initial PTS course, which lasts for 2.5 days due to the Network rail e-learning elements involved.</p>
<p><strong>How Much Does the PTS Card Cost?</strong></p>
<p>If you’ve never taken or completed a PTS course before, you’ll need to take the PTS Initial – which will consist of PTS Network rail e-learning modules and a practical day being trackside before being certified.Should you already have taken a PTS course before but it has expired and need a renewal, there will be renewal cost for this.</p>
<p><strong>How to Apply for a PTS Card</strong></p>
<ul class="pl-4">
	<li>You need PTS Sponsorship – this can be the rail company you work for, a company you would like to work for or a rail recruitment and training company.</li>
	<li>You will then need to do your ICI lu training or ICI Network rail or both depending on the infrastructure where your employer do have jobs.</li>
	<li>Your Sponsor will initiate proceedings to order your Sentinel card which can take up to 11 working days to arrive once the order has been placed.</li>
	<li>You will need to undergo and pass a medical, drugs and alcohol test before attending a PTS course.</li>
	<li>Attend and pass the Initial Personal Track Safety course. This will be 2.5 days covering a practical and written exam.</li>

</ul>
<br/>
<p><strong>Training Course for the PTS Card</strong></p>
<p>As part of obtaining your Sentinel PTS card, you need to complete the Initial Personal Track Safety Course. The training course takes 2 to 2.5 days to complete depending on if it is your first time (PTS course – initial) or a PTS renewal course. By the end of the training, you should have an understanding of the Sentinel Scheme and how the Track Safety Handbook is relevant to you. The contents of the Initial PTS Course will help you stay safe and maintain a safe working environment around tracks.</p>
<p><strong>The units include:</strong></p>
	<ul class="pl-4">
    	<li>Introduction to working on the track</li>
		<li>Accessing and Exiting the Track</li>
		<li>Working Safely</li>
		<li>Communication and Teamwork skills</li>
		<li>Emergency Procedures</li>
		<li>Safe system of work</li>
		<li>AC Electric Equipment</li>
		<li>DCCR Electrification Equipment</li>
    </ul>
    <br/>
    <p><strong>PTS Network Rail e Learning module</strong></p>
    <p> Before taking the Initial PTS Course, you are required to complete a PTS Network rail e-learning module. Your login details will be sent to you by your Sentinel sponsor once you have booked your course.</p>
    <p>The Initial Personal Track Safety Course is assessed by both a practical assessment and a written assessment. You will need to pass both to pass the course.
    </p>
    <p><strong>Course eligibility</strong></p>
    <p>To be eligible for the Initial PTS Course, you will need to be above the age of 16, have passed a medical test, a drug and alcohol screening, as well as have a sponsorfrom an approved company. Check our joining instruction/pre-request for further details.</p>
<p>Upon completion of the PTS course, you will receive a PTS certificate which shows your competence to work on the track-side. Your competence as a PTS card holder will be endorsed on your Sentinel card electronically by the Sentinel card services.
</p>
	<table class="table table-bordered">
    	<tr>
        	<td>PTS</td>
            <td>Personal Track Safety for non-electrified lines</td>
            <td>COSS</td>
            <td>Controller of site safety</td>
        </tr>
        <tr>
        	<td>PTS AC</td>
            <td>Personal Track Safety for AC electrified lines</td>
            <td>PC</td>
            <td>Protection</td>
        </tr>
        <tr>
        	<td>PTS DC</td>
            <td>Personal Track Safety for DC electrified lines</td>
            <td>ES</td>
            <td>Engineering supervisor</td>
        </tr>
        <tr>
        	<td>LKT</td>
            <td>Lookout and site warden</td>
            <td>PICOP</td>
            <td>Person in charge of possession</td>
        </tr>
        <tr>
        	<td>LKT (P)</td>
            <td>Lookout trained to use Pee Wee</td>
            <td>SPICOP</td>
            <td>Senior PICOP</td>
        </tr>
        <tr>
        	<td>LKT (K)</td>
            <td>Lookout trained to use kango warning equip</td>
            <td>NP OLE/AC-i</td>
            <td>Nominated person</td>
        </tr>
        <tr>
        	<td>AOD: HS</td>
            <td>Handsignaller</td>
            <td>AP OLE/AC-i</td>
            <td>Authorised person</td>
        </tr>
        <tr>
        	<td>AOD:LXA</td>
            <td>Level crossing attendant</td>
            <td>RIO</td>
            <td>Rail Incident officer</td>
        </tr>
        <tr>
        	<td>AOD: PO</td>
            <td>Points operator</td>
            <td>BSN1</td>
            <td>Bridge strike nominee grade 1</td>
        </tr>
        <tr>
        	<td>IWA</td>
            <td>Individual working alone</td>
            <td>BSN 2</td>
            <td>Bridge strike nominee grade 2</td>
        </tr>
        <tr>
        	<td>TRKIND</td>
            <td>Track induction</td>
            <td>BSE</td>
            <td>Bridge strike examining engineer</td>
        </tr>
    </table>
                <br/>
                <br/>
            </div>
            </div>
            
            <hr class="hr"/>
    <h1 class="h1 mt-4 mb-3">What Is the Industry Common Induction?</h1>
    <div class="row">
    	<div class="col-md-12">
        	
        	<p>The Industry Common Industry (ICI) provides staff with a health and safety induction for working in construction sites, rail depots and station maintenance.  It has been developed by Network Rail, in partnership with ISLG (Infrastructure Safety Liaison Group) and RIAG (Rail Infrastructure Assurance Group).  It covers the safety procedures and risks that are common across the rail industry, whatever the role and type of site.</p>
           
			<p>Why ICI?</p>
            <p>The aim is for the ICI to become the entry level competence for working in the rail industry, covering the general induction information that is common to all.</p>
			<p>The aim is also to improve safety and productivity on site.</p>
            <p>Once you’re confident with the learning material, your Sponsor can apply for you to take the Competence Assessment, at a RTAS Network rail assessment centre – a railways training courses provider.  If you pass, the ICI competence will be recorded on your Sentinel card records.  You can then use your smartcard on site to prove your ICI competence.</p>


			
			<p><strong>How Long Does The Competence Last?</strong></p>
            <p>The ICI railsentinel competence will need to be re-certified every 60 months (5 years).</p>
            
            <p><strong>How to Take The ICI Competence</strong></p>
            <p>There is no classroom version of the ICI competence.  It is only in e-learning format which provides you with all the information and training required before taking the assessment.</p>
            <p>Should you wish to work track side, you’ll need to take your PTS competence, as ICI is only for non-trackside.</p>
            <br/>
            <h3>How to Take the Induction and Get Your ICI Competence</h3>
            <p>It is a 2-step process.  Your Sponsor will support you with it.</p>
            <p><strong>Step 1: Induction</strong></p>
            <p>The induction is delivered as a short e-learning module.  Your Sponsor or employer will set you up with a login to the e-learning induction.</p>
<p>The e-learning takes about one hour to complete.   It is organised in short sections, each one taking no more than 15 -20 minutes.  You do not have to study them all in one session.  You can review each section as many times as you wish.</p>
<p>Before proceeding, you must be confident that you have a good understanding of all the topics.  Many screens are interactive, and you will need to explore them to see all the information.</p>
<p><strong>Step 2: Assessment</strong></p>
<p>When you’re confident you know the topics covered in the induction, speak to your Sponsor to book you a place at a local Assessment Centre.</p>
<p>When you arrive for your appointment at the Assessment Centre, the assessor will check your identity and explain what you need to do.  The Assessment is a computer-based test that takes 40 minutes.  It is a ‘closed book’ test, and you must score 80% or higher to pass.</p>
<p>If you pass the Assessment, you will gain your ICI competence on your Sentinel card.  If you don’t have a Sentinel card, your Sponsor will order one for you.</p>
<p>You must do the online assessment at an approved assessment centre with an invigilator present, and you have to pass it to gain your ICI.  This can be done at our Approved Assessment Centre at Techno CTA Ltd London E16.</p>


            <br/>
            <br/>
		</div>
        </div>
    </div>
</div>

<!-- About section end-->