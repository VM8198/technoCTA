<?php
Class HomesController extends AppController{
    
     var $uses = array('Home','Gallery','GalleryImage','Sector','Course','Location','Content','Sponsor','SponsorImage','TransactionLog','Bookinglog');
     var $components =array('Auth','Session');
     
     function beforeFilter() {
         $this->Auth->allow('index','getCourse','getcourseajax','getlocationajax','sign','digital_sign');
         parent::beforeFilter();
     }
     
     function index(){
         $this->layout ='Home';
		 $gallery = $this->GalleryImage->find('all',array('limit'=> 4));
         $sector = $this->Sector->find('all');
         $course = $this->Course->find('all',array('order'=> array('Course.course_name'=> 'ASC')));
         $location = $this->Location->find('all');
		 $training_courses = $this->Content->find('first',array('conditions'=>array('Content.title'=>'Our Training Courses')));
		 $index = $this->Content->find('first',array('conditions'=>array('Content.title'=>'Why Choose Techno CTA Ltd')));
         $sponsor = $this->SponsorImage->find('all',array('conditions' => array('SponsorImage.title_id' =>1)));
		 $heading = $this->Content->find('first',array('conditions'=>array('Content.title'=>'Welcome heading')));
		  $content = $this->Content->find('first',array('conditions'=>array('Content.title'=>'Welcome content')));
		 //pr($sponsor); die;
		 $this->set(compact('gallery','course','sector','location','training_courses','posttitle','sponsor','index','heading','content'));
		 return $sponsor;
     }
     function getCourse(){
        $course = array();
        $SId = $sector['Sector']['id'];
        if(isset($SId)){
            $course = $this->Sector->Course->find('list', array(
                'fields' => array(
                    'id',
                    'course_name',
                ),
                'conditions' => array(
                    'Course.sector_id' => $SId
                )
            ));
        }
        header('Content-Type: application/json');
        echo json_encode($course);
        exit();
     }
     function getcourseajax() {
        $sectorId = $this->data['sectorId'];
        //pr($sectorId);die;
        $course = $this->Course->find('all', array('conditions' => array('Course.sector_id' => $sectorId)));
        $this->set(compact('course'));
    }
    function getlocationajax() {
        $coursename = $this->data['coursename'];
        //pr($coursename);die;
        $course = $this->Course->find('all', array('conditions' => array('Course.course_name' => $coursename)));
        $this->set(compact('course'));
    }
	
	function sign(){
		  header("Content-type: text/css; charset: UTF-8");
		 $this->layout ='Home';
		 $user_id = $this->Auth->user('id');
		 $tran = $this->TransactionLog->find('first',array('conditions'=>array('TransactionLog.user_id'=>$user_id),'order' =>array('TransactionLog.id'=>'DESC')));
		 $id= $tran['TransactionLog']['id'];
		 //pr($tran); die;
		 //$name= $tran['User']['first_name'];
		 
		 $book =$this->Bookinglog->find('first',array('conditions'=>array('Bookinglog.user_id'=>$user_id),'order' =>array('Bookinglog.id'=>'DESC')));
		 $this->set(compact('tran','book'));
		//echo $image_sign; die;
		 if(!empty($this->request->data)){
			$this->TransactionLog->id = $id;
				$file =	$this->request->data['TransactionLog']['sign']['name'];
                $ext = substr(strtolower(strrchr($file, '.')), 1);
                $arr_ext = array('jpg','png');
                if (in_array($ext, $arr_ext)) {
                $filename = time() . $this->request->data['TransactionLog']['sign']['name'];
                 move_uploaded_file($this->request->data['TransactionLog']['sign']['tmp_name'], "img/Sign/" . $filename);
                 $data['TransactionLog']['sign'] = $filename;
						if ($this->TransactionLog->save($data)) {
							App::import('Vendor', 'dompdf', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));
							ini_set ( " memory_limit ", " 3072M ");
				$html =
				'<html><body>
		<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
    <caption style="font-size: 22px;color: #449ac6;padding: 10px 0;border: 1px solid #666;">TRAINING SPONSERSHIP AGREEMENT COURSE BOOKING FORM</caption>
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Order ID</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$tran['TransactionLog']['order_id'].'</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
	</tr>
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Course Title</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$tran['Course']['course_name'].'</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
	</tr>
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE DATE </td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$book['Bookinglog']['course_date'].'</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
	</tr>
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE TIME</td>
		<td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Start '.$book['Bookinglog']['start_time'].'</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Finish '.$book['Bookinglog']['end_time'].'</td>
	</tr>
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE DURATION</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$tran['Course']['duration'].'</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
	</tr>
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE LOCATION</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">7 Woodman Parade, North Woolwich, E18 2LL</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
    </tr>
</table>';
if(preg_match('/,/', $tran['User']['first_name'])){ 
$html .='<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
	<tr style="line-height: 20px;">
        <td width="5%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"> </td>
        <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">First Name</td>
        <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Last Name</td>
        <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Sentinel No</td>
	
            <!--<td width="5%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"> </td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">First Name</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Last Name</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Sentinel No</td>-->
    </tr>';
	for($i=0;$i<=12;$i++){
		$name = explode(',',$tran['User']['first_name']);
		$lastname = explode(',',$tran['User']['last_name']);
		$sentinel = explode(',',$tran['User']['sentinel']);
		$html .='<tr style="line-height: 20px;">
            <td width="5%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$i.'</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$name[$i].'</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$lastname[$i].'</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$sentinel[$i].'</td>
                <!--<td width="5%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">2 </td>
                <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
                <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
                <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>-->
	</tr>';
	}
	$html .='</table>';
}else{
	$html .='<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
	<tr style="line-height: 20px;">
        <td width="5%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"> </td>
        <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">First Name</td>
        <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Last Name</td>
        <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Sentinel No</td>
    </tr> 
    <tr style="line-height: 20px;">
            <td width="5%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">1</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$tran['User']['first_name'].'</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$tran['User']['last_name'].'</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$tran['User']['sentinel'].'</td>
        </tr>
	
</table>'; 
}
$html .='<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
    <tr style="line-height: 20px;">
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Cost Rate:</td>
            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Training (per person)</td>
            <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">&pound; '.$tran['Course']['delegate_price'].'</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
    </tr>
    <tr style="line-height: 20px;">
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Total Cost Inc Vat:</td>
            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">&pound; '.$tran['TransactionLog']['amount_major'].'</td>
            <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
    </tr>
	</table>
	<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
    <tr style="line-height: 20px;">
        <td width="100%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">
            <b style=" font-size: 22px;">Training Sponsorship Agreement/Course Bookings<br><br></b>
            <b style="color: red; font-size: 20px;">
                Terms and Conditions <br><br>
                Course Bookings<br><br>
               </b> Online booking is completed via the Techno CTA Ltd website. However, a booking is only regarded as confirmed once a signed booking form has been received by the candidate’s Primary/Sub sponsor. Any bookings made by a sub-sponsor or broker must provide confirmation that the primary sponsor has been made aware and agrees to the training or assessment of each candidate.
            <br>
            <b style="color: red; font-size: 22px;"> <br>Payment<br><br></b> The course fee per candidate will be the fee published in the literature of the company on the date the booking is made. All fees quoted are exclusive of VAT which will be charged at the current rate. Our VAT registration number is 252 4473 13.
            <br>
            <br> Full payment is required when the course is booked by Sponsor or Individual Candidate using our Online Booking via Techno CTA website. Most types debit card and credit cards are accepted with the exception of Diners and American Express cards.
            <br>
            <br> Techno CTA Ltd reserve the right to cancel or refuse services agreed (training and assessments). Techno CTA Ltd does not accept cheques as a method of payment.
            <br>
            <br>
            <b style="color: red; font-size: 22px;"> <br>Course Cancellations<br><br></b> In the event you wish to cancel this booking you must complete cancellation form that should be done before 7 days of actual course planned, otherwise the full course fees will be charged.
            <br>
            <br> Should you wish to make changes to the booking, please contact Techno CTA Ltd; no charges will be applied if the changes are notified more than 7 days prior to the course start date.
            <br>
            <br> If cancellation occurs within 7 days of the course start date, the course fee becomes payable in full.
            <br>
            <br> If cancellation occurs within 48 hours of the course start date, the course fee becomes payable 20%.
            <br>
            <br> If cancellation occurs within 24 hours of the course start date, the course fee becomes non-refundable.
            <br>
            <br>

        </td>
    </tr>
</table>

<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
    <tr width="100%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Course Cancellation</tr>
    <tr style="line-height: 20px;">

        <td width="50%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">within 7 days </td>
        <td width="50%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Full refund </td>

    </tr>
    <tr style="line-height: 20px;">

        <td width="50%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">within 48 hours</td>
        <td width="50%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">80% refund </td>

    </tr>
    <tr style="line-height: 20px;">

        <td width="50%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">within 24 hours </td>
        <td width="50%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">0% refund </td>

    </tr>
</table>
<br>

<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
    <tr style="line-height: 20px;">
        <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">
            <b style=" font-size: 22px;">Allow 5-10 workings days for refund.<br><br></b> Should you wish to make changes to the booking, please contact Techno CTA Ltd, no charges will be applied if the changes are notified more than 7 days prior to the course start date.
            <br>
            <br> Techno CTA Ltd will endeavour to run all published courses and any changes to course dates or times will be notified as soon as possible. We reserve the right to cancel or reschedule courses and accept no consequential liability or any other claim irrespective of notice given for any changes made by Techno CTA Ltd.
            <br>
            <br> Techno CTA Ltd will endeavour to run all published courses and any changes to course dates or times will be notified as soon as possible. We reserve the right to cancel or reschedule courses and accept no consequential liability or any other claim irrespective of notice given for any changes made by Techno CTA Ltd.
            <br>
            <br>

            <b style="color: red; font-size: 22px;"> <br>Medical, Drugs and Alcohol Requirements<br><br></b> The minimum Network Rail medical fitness standards NR/L2/0HS/00124 and NR/L1/0HS/051 Drugs and Alcohol Policy must be met prior to attending the course. The medical and drug and alcohol results must be registered on the Rail Sentinel website by the approved provider prior to the course start date.
            <br>
            <br>
            <b style="color: red; font-size: 22px;"> <br>Personal Identification<br><br></b> All delegates must produce photo I.D in the form of a new type driving license, Driving Licence with photo, Passport or similar to ensure candidates meet with eligibility to reside and work within the UK. Sponsor to advise the delegate(s)
            <br>
            <br> Candidates must be able to converse adequately with the spoken English language to make emergency phone calls and recite phonetic alphabet. Failure to meet this requirement may result in refusal to continue with a training course.
            <br>
            <br>

        </td>
    </tr>
</table>
<br>

<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
    <tr style="line-height: 20px;">
        <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">
            <b style=" font-size: 22px;">SPONSORSHIP<br><br></b>

            <b style="color: #000; font-size: 16px; font-weight:bold;"> Where required under our Company Competency Management Systems, I hereby confirm that we currently sponsor the
candidates listed below and all preceding assessments have been carried out on the candidate(s) where necessary. I also
confirm that the candidate remains medically fit in accordance with their last medical and if attending their first safety
critical training course, the candidate must have a record on the Sentinel database of a valid / current Alcohol and Drugs
screen certification. You are also signing to confirm you have authorisation and the delegates are under your Sponsorship
if you are not the Primary Sponsor of any of the named candidates to undertake the training detailed within this booking
form.</b>
            <br>
            <br> I agree to the above terms and conditions of the booking form.
            <br>
            <br>

            <b style="color: red; font-size: 16px;"> <br>In signing this form the Sponsor/Sentinel Coordinator is authorising training/assessment to take place &
confirming all the terms and conditions of booking. Also confirming that the delegate(s) have a logbook
which is current with the sufficient amount of endorsed entries and has had the pre-requisite number of
workplace assessments.<br><br></b>

        </td>
    </tr>
</table>
<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
font-family: sans-serif;  border-collapse: collapse;">
<tr style="line-height: 20px;">
			<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">AUTHORISED PERSON:</td>
			<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"> </td>
			<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">POSITION:</td>
			<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"> </td>
	</tr>
	</table>
	<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
	font-family: sans-serif;  border-collapse: collapse;">
	<tr style="line-height: 20px;">
				<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">ELECTRONICAL SIGNATURE:</td>
				<td width="75%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"><img src="http://techno.sdssoftltd.co.uk/app/webroot/img/Sign/'.$filename.'" height="80" width="100"></td> </tr>
		</table>
		<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
		font-family: sans-serif;  border-collapse: collapse;">
		<tr style="line-height: 20px;">
					<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COMPANY:</td>
					<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"> </td>
					<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">DATE:</td>
					<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"> </td>
			</tr>          
	 </tr>
			</table>
		</body></html>';
		echo $html; die;
				$dompdf = new DOMPDF();
				$papersize = 'A4';
				$orientation = 'landscape';
				$dompdf = new Dompdf(array('enable_remote' => false));
				$dompdf = new Dompdf(array('debugKeepTemp' => true));
				$dompdf->load_html(utf8_decode($html), Configure::read('App.encoding'));
				$dompdf->set_paper($papersize, $orientation);
				$dompdf->render();
				echo $dompdf->output();
				$output = $dompdf->output();
				file_put_contents('esign_document.pdf', $output);
				//echo  file_put_contents; die;
				
						$name = $tran['User']['first_name'];
						$email = $tran['User']['email_id'];
						$subject = "Course Booking Details";
						
						$message = "Dear <span style='color:#666666'>" . $name . "</span>,<br/><br/>";
						$message .= 'Thank you for booking the course on our website <a href="https://techno.sdssoftltd.co.uk/">https://techno.sdssoftltd.co.uk/ </a><br> Please find attached e-sign document with course details.<br/>';
						$message .= "<br/>Thanks & Regards, <br/>Techno CTA Team";
						
						App::import('Vendor', 'phpmailer', array(
						'file' => 'phpmailer/class.phpmailer.php'));
						$message = $message;
						$to = $email;
						$mail = new PHPMailer();
						$mail->IsHTML(true);
						$mail->SetFrom($to, 'Techno CTA');
						$mail->AddReplyTo($to, "Techno CTA");
						$mail->Subject = $subject;
						$mail->Body = $message;
						$mail->addAttachment('esign_document.pdf');
						$mail->AddAddress(trim($email));
						
						
						$subject1 = "Course Booking Details";
						
						$message1 = "Hello Admin,<br/><br/>";
						$message1 .= $name.' booked the course and e-signed the document.';
						$message1 .= "<br/>Thanks & Regards, <br/>Techno CTA Team";
						
						App::import('Vendor', 'phpmailer', array(
						'file' => 'phpmailer/class.phpmailer.php'));
						$message = $message1;
						$to1 = 'khatrriidepain@gmail.com';
						$mail1 = new PHPMailer();
						$mail1->IsHTML(true);
						$mail1->SetFrom($to, 'Techno CTA');
						$mail1->AddReplyTo($to, "Techno CTA");
						$mail1->Subject = $subject;
						$mail1->Body = $message;
						$mail1->addAttachment('esign_document.pdf');
						$mail1->AddAddress(trim($to1));
						
						
						if (!$mail->Send()||!$mail1->Send()) {
							echo $mail->ErrorInfo;
							 $this->Session->setFlash("<script>alert('Some thing went wrong.');</script>");
								$this->redirect(array('controller' => 'homes', 'action' => 'index'));
								
							}else {
								$this->Session->setFlash("<script>alert('Thank you for booking.');</script>");
								$this->redirect(array('controller' => 'homes', 'action' => 'index'));
							}
									
							}
						}
				}
	}
	
	function digital_sign(){
		 $this->layout ='Home';
		 $user_id = $this->Auth->user('id');
		 $tran = $this->TransactionLog->find('first',array('conditions'=>array('TransactionLog.user_id'=>$user_id),'order' =>array('TransactionLog.id'=>'DESC')));
		 $id= $tran['TransactionLog']['id'];
		 //echo $id; die;
		 $book =$this->Bookinglog->find('first',array('conditions'=>array('Bookinglog.user_id'=>$user_id),'order' =>array('Bookinglog.id'=>'DESC')));
		 $this->set(compact('tran','book'));
		 //pr($tran); die;
		$image_sign = $this->data['img'];
		//echo $image_sign; die;
		if(!empty($this->request->data)){
			$this->TransactionLog->id = $id;
				$data['TransactionLog']['sign'] = $image_sign;
						if ($this->TransactionLog->save($data)) {
							App::import('Vendor', 'dompdf', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));
							
				$html =
				'<html><body>
		<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
    <caption style="font-size: 22px;color: #449ac6;padding: 10px 0;border: 1px solid #666;">TRAINING SPONSERSHIP AGREEMENT COURSE BOOKING FORM</caption>
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Order ID</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$tran['TransactionLog']['order_id'].'</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
	</tr>
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Course Title</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$tran['Course']['course_name'].'</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
	</tr>
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE DATE </td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$book['Bookinglog']['course_date'].'</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
	</tr>
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE TIME</td>
		<td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Start '.$book['Bookinglog']['start_time'].'</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Finish '.$book['Bookinglog']['end_time'].'</td>
	</tr>
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE DURATION</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$tran['Course']['duration'].'</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
	</tr>
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE LOCATION</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">7 Woodman Parade, North Woolwich, E18 2LL</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
    </tr>
</table>';
if(preg_match('/,/', $tran['User']['first_name'])){ 
$html .='<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
	<tr style="line-height: 20px;">
        <td width="5%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"> </td>
        <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">First Name</td>
        <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Last Name</td>
        <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Sentinel No</td>
	
            <!--<td width="5%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"> </td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">First Name</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Last Name</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Sentinel No</td>-->
    </tr>';
	for($i=0;$i<=12;$i++){
		$name = explode(',',$tran['User']['first_name']);
		$lastname = explode(',',$tran['User']['last_name']);
		$sentinel = explode(',',$tran['User']['sentinel']);
		$html .='<tr style="line-height: 20px;">
            <td width="5%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.($i+1).'</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$name[$i].'</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$lastname[$i].'</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$sentinel[$i].'</td>
                <!--<td width="5%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">2 </td>
                <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
                <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
                <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>-->
	</tr>';
	}
	$html .='</table>';
}else{
	$html .='<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
	<tr style="line-height: 20px;">
        <td width="5%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"> </td>
        <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">First Name</td>
        <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Last Name</td>
        <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Sentinel No</td>
    </tr> 
    <tr style="line-height: 20px;">
            <td width="5%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">1</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$tran['User']['first_name'].'</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$tran['User']['last_name'].'</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$tran['User']['sentinel'].'</td>
        </tr>
	
</table>'; 
}
$html .= '<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
    <tr style="line-height: 20px;">
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Cost Rate:</td>
            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Training (per person)</td>
            <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">&pound; '.$tran['Course']['delegate_price'].'</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
    </tr>
  <!-- <tr style="line-height: 20px;">
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">  Total Cost Rate:</td>
            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">&pound;</td>
            <td width="30%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Vat 20%</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">&pound;</td>
    </tr>-->
    <tr style="line-height: 20px;">
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Total Cost Inc Vat:</td>
            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">&pound; '.$tran['TransactionLog']['amount_major'].'</td>
            <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
			
	</tr>
	</table>
	<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
    <tr style="line-height: 20px;">
        <td width="100%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">
            <b style=" font-size: 22px;">Training Sponsorship Agreement/Course Bookings<br><br></b>
            <b style="color: red; font-size: 20px;">
                Terms and Conditions <br><br>
                Course Bookings<br><br>
               </b> Online booking is completed via the Techno CTA Ltd website. However, a booking is only regarded as confirmed once a signed booking form has been received by the candidate’s Primary/Sub sponsor. Any bookings made by a sub-sponsor or broker must provide confirmation that the primary sponsor has been made aware and agrees to the training or assessment of each candidate.
            <br>
            <b style="color: red; font-size: 22px;"> <br>Payment<br><br></b> The course fee per candidate will be the fee published in the literature of the company on the date the booking is made. All fees quoted are exclusive of VAT which will be charged at the current rate. Our VAT registration number is 252 4473 13.
            <br>
            <br> Full payment is required when the course is booked by Sponsor or Individual Candidate using our Online Booking via Techno CTA website. Most types debit card and credit cards are accepted with the exception of Diners and American Express cards.
            <br>
            <br> Techno CTA Ltd reserve the right to cancel or refuse services agreed (training and assessments). Techno CTA Ltd does not accept cheques as a method of payment.
            <br>
            <br>
            <b style="color: red; font-size: 22px;"> <br>Course Cancellations<br><br></b> In the event you wish to cancel this booking you must complete cancellation form that should be done before 7 days of actual course planned, otherwise the full course fees will be charged.
            <br>
            <br> Should you wish to make changes to the booking, please contact Techno CTA Ltd; no charges will be applied if the changes are notified more than 7 days prior to the course start date.
            <br>
            <br> If cancellation occurs within 7 days of the course start date, the course fee becomes payable in full.
            <br>
            <br> If cancellation occurs within 48 hours of the course start date, the course fee becomes payable 20%.
            <br>
            <br> If cancellation occurs within 24 hours of the course start date, the course fee becomes non-refundable.
            <br>
            <br>

        </td>
    </tr>
</table>

<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
    <tr width="100%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Course Cancellation</tr>
    <tr style="line-height: 20px;">

        <td width="50%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">within 7 days </td>
        <td width="50%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Full refund </td>

    </tr>
    <tr style="line-height: 20px;">

        <td width="50%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">within 48 hours</td>
        <td width="50%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">80% refund </td>

    </tr>
    <tr style="line-height: 20px;">

        <td width="50%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">within 24 hours </td>
        <td width="50%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">0% refund </td>

    </tr>
</table>
<br>

<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
    <tr style="line-height: 20px;">
        <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">
            <b style=" font-size: 22px;">Allow 5-10 workings days for refund.<br><br></b> Should you wish to make changes to the booking, please contact Techno CTA Ltd, no charges will be applied if the changes are notified more than 7 days prior to the course start date.
            <br>
            <br> Techno CTA Ltd will endeavour to run all published courses and any changes to course dates or times will be notified as soon as possible. We reserve the right to cancel or reschedule courses and accept no consequential liability or any other claim irrespective of notice given for any changes made by Techno CTA Ltd.
            <br>
            <br> Techno CTA Ltd will endeavour to run all published courses and any changes to course dates or times will be notified as soon as possible. We reserve the right to cancel or reschedule courses and accept no consequential liability or any other claim irrespective of notice given for any changes made by Techno CTA Ltd.
            <br>
            <br>

            <b style="color: red; font-size: 22px;"> <br>Medical, Drugs and Alcohol Requirements<br><br></b> The minimum Network Rail medical fitness standards NR/L2/0HS/00124 and NR/L1/0HS/051 Drugs and Alcohol Policy must be met prior to attending the course. The medical and drug and alcohol results must be registered on the Rail Sentinel website by the approved provider prior to the course start date.
            <br>
            <br>
            <b style="color: red; font-size: 22px;"> <br>Personal Identification<br><br></b> All delegates must produce photo I.D in the form of a new type driving license, Driving Licence with photo, Passport or similar to ensure candidates meet with eligibility to reside and work within the UK. Sponsor to advise the delegate(s)
            <br>
            <br> Candidates must be able to converse adequately with the spoken English language to make emergency phone calls and recite phonetic alphabet. Failure to meet this requirement may result in refusal to continue with a training course.
            <br>
            <br>

        </td>
    </tr>
</table>
<br>

<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
    <tr style="line-height: 20px;">
        <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">
            <b style=" font-size: 22px;">SPONSORSHIP<br><br></b>

            <b style="color: #000; font-size: 16px; font-weight:bold;"> Where required under our Company Competency Management Systems, I hereby confirm that we currently sponsor the
candidates listed below and all preceding assessments have been carried out on the candidate(s) where necessary. I also
confirm that the candidate remains medically fit in accordance with their last medical and if attending their first safety
critical training course, the candidate must have a record on the Sentinel database of a valid / current Alcohol and Drugs
screen certification. You are also signing to confirm you have authorisation and the delegates are under your Sponsorship
if you are not the Primary Sponsor of any of the named candidates to undertake the training detailed within this booking
form.</b>
            <br>
            <br> I agree to the above terms and conditions of the booking form.
            <br>
            <br>

            <b style="color: red; font-size: 16px;"> <br>In signing this form the Sponsor/Sentinel Coordinator is authorising training/assessment to take place &
confirming all the terms and conditions of booking. Also confirming that the delegate(s) have a logbook
which is current with the sufficient amount of endorsed entries and has had the pre-requisite number of
workplace assessments.<br><br></b>

        </td>
    </tr>
</table>
<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
font-family: sans-serif;  border-collapse: collapse;">
<tr style="line-height: 20px;">
			<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">AUTHORISED PERSON:</td>
			<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"> </td>
			<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">POSITION:</td>
			<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"> </td>
	</tr>
	</table>
	<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
	font-family: sans-serif;  border-collapse: collapse;">
	<tr style="line-height: 20px;">
				<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">ELECTRONICAL SIGNATURE:</td>
				<td width="75%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"><img src="'. str_replace(' ', '+',$image_sign).'" height="80" width="100"></td> </tr>
		</table>
		<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
		font-family: sans-serif;  border-collapse: collapse;">
		<tr style="line-height: 20px;">
					<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COMPANY:</td>
					<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"> </td>
					<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">DATE:</td>
					<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"> </td>
			</tr>          
	 </tr>
			</table>


    </table>
		
		</body></html>';
		//echo $html; die;
				$dompdf = new DOMPDF();
				$papersize = 'A4';
				$orientation = 'landscape';
				$dompdf = new Dompdf(array('enable_remote' => true));
				$dompdf = new Dompdf(array('debugKeepTemp' => true));
				$dompdf->load_html(utf8_decode($html), Configure::read('App.encoding'));
				$dompdf->set_paper($papersize, $orientation);
				$dompdf->render();
				echo $dompdf->output();
				$output = $dompdf->output();
				file_put_contents('esign_document.pdf', $output);
				//echo  file_put_contents; die;
				
						$name = $tran['User']['first_name'];
						$email = $tran['User']['email_id'];
						$subject = "Course Booking Details";
						
						$message = "Dear <span style='color:#666666'>" . $name . "</span>,<br/><br/>";
						$message .= 'Thank you for booking the course on our website <a href="https://techno.sdssoftltd.co.uk/">https://techno.sdssoftltd.co.uk/ </a><br> Please find attached e-sign document with course details.<br/>';
						$message .= "<br/>Thanks & Regards, <br/>Techno CTA Team";
						
						App::import('Vendor', 'phpmailer', array(
						'file' => 'phpmailer/class.phpmailer.php'));
						$message = $message;
						$to = $email;
						$mail = new PHPMailer();
						$mail->IsHTML(true);
						$mail->SetFrom($to, 'Techno CTA');
						$mail->AddReplyTo($to, "Techno CTA");
						$mail->Subject = $subject;
						$mail->Body = $message;
						$mail->addAttachment('esign_document.pdf');
						$mail->AddAddress(trim($email));
						
						
						$subject1 = "Course Booking Details";
						
						$message1 = "Hello Admin,<br/><br/>";
						$message1 .= $name.' booked the course and e-signed the document.';
						$message1 .= "<br/>Thanks & Regards, <br/>Techno CTA Team";
						
						App::import('Vendor', 'phpmailer', array(
						'file' => 'phpmailer/class.phpmailer.php'));
						$message = $message1;
						$to1 = 'khatrriidepain@gmail.com';
						$mail1 = new PHPMailer();
						$mail1->IsHTML(true);
						$mail1->SetFrom($to, 'Techno CTA');
						$mail1->AddReplyTo($to, "Techno CTA");
						$mail1->Subject = $subject;
						$mail1->Body = $message;
						$mail1->addAttachment('esign_document.pdf');
						$mail1->AddAddress(trim($to1));
						
						
						if (!$mail->Send()||!$mail1->Send()) {
							echo $mail->ErrorInfo;
								
							}else {
								echo 2; die;
							}
									
							}
						
				} 
	}
	
	function testpdf(){
		  header("Content-type: text/css; charset: UTF-8");
		 $this->layout ='Home';
		 $user_id = $this->Auth->user('id');
		 $tran = $this->TransactionLog->find('first',array('conditions'=>array('TransactionLog.user_id'=>$user_id),'order' =>array('TransactionLog.id'=>'DESC')));
		 $id= $tran['TransactionLog']['id'];
		 //pr($tran); die;
		 //$name= $tran['User']['first_name'];
		 
		 $book =$this->Bookinglog->find('first',array('conditions'=>array('Bookinglog.user_id'=>$user_id),'order' =>array('Bookinglog.id'=>'DESC')));
		 $this->set(compact('tran','book'));
		//echo $image_sign; die;
		 if(!empty($this->request->data)){
			$this->TransactionLog->id = $id;
				$file =	$this->request->data['TransactionLog']['sign']['name'];
                $ext = substr(strtolower(strrchr($file, '.')), 1);
                $arr_ext = array('jpg','png');
                if (in_array($ext, $arr_ext)) {
                $filename = time() . $this->request->data['TransactionLog']['sign']['name'];
                 move_uploaded_file($this->request->data['TransactionLog']['sign']['tmp_name'], "img/Sign/" . $filename);
                 $data['TransactionLog']['sign'] = $filename;
						if ($this->TransactionLog->save($data)) {
							App::import('Vendor', 'dompdf', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));
				$html =
				'<html><body>
		<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
    <caption style="font-size: 22px;color: #449ac6;padding: 10px 0;border: 1px solid #666;">TRAINING SPONSERSHIP AGREEMENT COURSE BOOKING FORM</caption>
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Order ID</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$tran['TransactionLog']['order_id'].'</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
	</tr>
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Course Title</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$tran['Course']['course_name'].'</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
	</tr>
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE DATE </td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$book['Bookinglog']['course_date'].'</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
	</tr>
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE TIME</td>
		<td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Start '.$book['Bookinglog']['start_time'].'</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Finish '.$book['Bookinglog']['end_time'].'</td>
	</tr>
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE DURATION</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$tran['Course']['duration'].'</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
	</tr>
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE LOCATION</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">7 Woodman Parade, North Woolwich, E18 2LL</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
    </tr>
</table>';
if(preg_match('/,/', $tran['User']['first_name'])){ 
$html .='<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
	<tr style="line-height: 20px;">
        <td width="5%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"> </td>
        <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">First Name</td>
        <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Last Name</td>
        <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Sentinel No</td>
	
            <!--<td width="5%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"> </td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">First Name</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Last Name</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Sentinel No</td>-->
    </tr>';
	for($i=0;$i<=12;$i++){
		$name = explode(',',$tran['User']['first_name']);
		$lastname = explode(',',$tran['User']['last_name']);
		$sentinel = explode(',',$tran['User']['sentinel']);
		$html .='<tr style="line-height: 20px;">
            <td width="5%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$i.'</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$name[$i].'</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$lastname[$i].'</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$sentinel[$i].'</td>
                <!--<td width="5%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">2 </td>
                <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
                <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
                <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>-->
	</tr>';
	}
	$html .='</table>';
}else{
	$html .='<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
	<tr style="line-height: 20px;">
        <td width="5%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"> </td>
        <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">First Name</td>
        <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Last Name</td>
        <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Sentinel No</td>
    </tr> 
    <tr style="line-height: 20px;">
            <td width="5%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">1</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$tran['User']['first_name'].'</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$tran['User']['last_name'].'</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$tran['User']['sentinel'].'</td>
        </tr>
	
</table>'; 
}
$html .='<table style="width:700px; height: auto; padding: 20px;font-size: 14px;font-family: sans-serif;  border-collapse: collapse;">
    <tr style="line-height: 20px;">
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Cost Rate:</td>
            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Training (per person)</td>
            <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">&pound; '.$tran['Course']['delegate_price'].'</td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
    </tr>
    <tr style="line-height: 20px;">
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Total Cost Inc Vat:</td>
            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">&pound; '.$tran['TransactionLog']['amount_major'].'</td>
            <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>
    </tr>
</table>
<table style="width:700px; height: auto; padding: 20px;font-size: 14px;font-family: sans-serif;  border-collapse: collapse;">
	<tr style="line-height: 20px;">
				<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">ELECTRONICAL SIGNATURE:</td>
				<td width="75%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"><img src="http://techno.sdssoftltd.co.uk/app/webroot/img/Sign/'.$filename.'" height="80" width="100"></td> </tr>
		</table>
		<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
		font-family: sans-serif;  border-collapse: collapse;">
		<tr style="line-height: 20px;">
					<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COMPANY:</td>
					<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"> </td>
					<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">DATE:</td>
					<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"> </td>
			</tr>          
			</table>
		</body></html>';
		//echo $html; die;
				$dompdf = new DOMPDF();
				$papersize = 'A4';
				$orientation = 'landscape';
				$dompdf = new Dompdf(array('enable_remote' => false));
				$dompdf = new Dompdf(array('debugKeepTemp' => true));
				$dompdf->load_html(utf8_decode($html), Configure::read('App.encoding'));
				$dompdf->set_paper($papersize, $orientation);
				$dompdf->render();
				echo $dompdf->output();
				$output = $dompdf->output();
				file_put_contents('esign_document.pdf', $output);
				//echo  file_put_contents; die;
				
						$name = $tran['User']['first_name'];
						$email = $tran['User']['email_id'];
						//echo $email; die;
						$subject = "Course Booking Details";
						
						$message = "Dear <span style='color:#666666'>" . $name . "</span>,<br/><br/>";
						$message .= 'Thank you for booking the course on our website <a href="https://techno.sdssoftltd.co.uk/">https://techno.sdssoftltd.co.uk/ </a><br> You will get the e-sign document with course details.<br> Please find the file in the attachment.<br/>';
						$message .= "<br/>Thanks & Regards, <br/>Techno CTA Team";
						
						App::import('Vendor', 'phpmailer', array(
						'file' => 'phpmailer/class.phpmailer.php'));
						$message = $message;
						$to = 'contact@techno.sdssoftltd.co.uk';
						$mail = new PHPMailer();
						$mail->IsHTML(true);
						$mail->SetFrom($to, 'Techno CTA');
						$mail->AddReplyTo($to, "Techno CTA");
						$mail->Subject = $subject;
						$mail->Body = $message;
						$mail->addAttachment('esign_document.pdf');
						$mail->AddAddress(trim($email));
						
						
						$subject1 = "Course Booking Details";
						
						$message1 = "Hello Admin,<br/><br/>";
						$message1 .= $name.' has been booked the course and get the e-sign document with course details.<br> Please find the file in the attachment.<br/>';
						$message1 .= "<br/>Thanks & Regards, <br/>Techno CTA Team";
						
						App::import('Vendor', 'phpmailer', array(
						'file' => 'phpmailer/class.phpmailer.php'));
						$message = $message1;
						$to1 = 'contact@techno.sdssoftltd.co.uk';
						$mail1 = new PHPMailer();
						$mail1->IsHTML(true);
						$mail1->SetFrom($to, 'Techno CTA');
						$mail1->AddReplyTo($to, "Techno CTA");
						$mail1->Subject = $subject;
						$mail1->Body = $message;
						$mail1->addAttachment('esign_document.pdf');
						$mail1->AddAddress(trim($to1));
						
						
						if (!$mail->Send()||!$mail1->Send()) {
							echo $mail->ErrorInfo;
							 $this->Session->setFlash("<script>alert('Some thing went wrong.');</script>");
								$this->redirect(array('controller' => 'homes', 'action' => 'index'));
								
							}else {
								$this->Session->setFlash("<script>alert('Thank you for booking.');</script>");
								$this->redirect(array('controller' => 'homes', 'action' => 'index'));
							}
									
							}
						}
				}
	}
	
		function send_document(){
		$this->autoRender = false;
		App::import('Vendor', 'dompdf', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));
				$html =
				'<html><body>
		<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
    <tr style="line-height: 20px;">
        <td width="100%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">
            <b style=" font-size: 22px;">Training Sponsorship Agreement/Course Bookings<br><br></b>
            <b style="color: red; font-size: 20px;">
                Terms and Conditions <br><br>
                Course Bookings<br><br>
               </b> Online booking is completed via the Techno CTA Ltd website. However, a booking is only regarded as confirmed once a signed booking form has been received by the candidate’s Primary/Sub sponsor. Any bookings made by a sub-sponsor or broker must provide confirmation that the primary sponsor has been made aware and agrees to the training or assessment of each candidate.
            <br>
            <b style="color: red; font-size: 22px;"> <br>Payment<br><br></b> The course fee per candidate will be the fee published in the literature of the company on the date the booking is made. All fees quoted are exclusive of VAT which will be charged at the current rate. Our VAT registration number is 252 4473 13.
            <br>
            <br> Full payment is required when the course is booked by Sponsor or Individual Candidate using our Online Booking via Techno CTA website. Most types debit card and credit cards are accepted with the exception of Diners and American Express cards.
            <br>
            <br> Techno CTA Ltd reserve the right to cancel or refuse services agreed (training and assessments). Techno CTA Ltd does not accept cheques as a method of payment.
            <br>
            <br>
            <b style="color: red; font-size: 22px;"> <br>Course Cancellations<br><br></b> In the event you wish to cancel this booking you must complete cancellation form that should be done before 7 days of actual course planned, otherwise the full course fees will be charged.
            <br>
            <br> Should you wish to make changes to the booking, please contact Techno CTA Ltd; no charges will be applied if the changes are notified more than 7 days prior to the course start date.
            <br>
            <br> If cancellation occurs within 7 days of the course start date, the course fee becomes payable in full.
            <br>
            <br> If cancellation occurs within 48 hours of the course start date, the course fee becomes payable 20%.
            <br>
            <br> If cancellation occurs within 24 hours of the course start date, the course fee becomes non-refundable.
            <br>
            <br>

        </td>
    </tr>
</table>
<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
    <tr width="100%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Course Cancellation</tr>
    <tr style="line-height: 20px;">

        <td width="50%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">within 7 days </td>
        <td width="50%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Full refund </td>

    </tr>
    <tr style="line-height: 20px;">

        <td width="50%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">within 48 hours</td>
        <td width="50%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">80% refund </td>

    </tr>
    <tr style="line-height: 20px;">

        <td width="50%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">within 24 hours </td>
        <td width="50%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">0% refund </td>

    </tr>
</table>
<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
    <tr style="line-height: 20px;">
        <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">
            <b style=" font-size: 22px;">Allow 5-10 workings days for refund.<br><br></b> Should you wish to make changes to the booking, please contact Techno CTA Ltd, no charges will be applied if the changes are notified more than 7 days prior to the course start date.
            <br>
            <br> Techno CTA Ltd will endeavour to run all published courses and any changes to course dates or times will be notified as soon as possible. We reserve the right to cancel or reschedule courses and accept no consequential liability or any other claim irrespective of notice given for any changes made by Techno CTA Ltd.
            <br>
            <br> Techno CTA Ltd will endeavour to run all published courses and any changes to course dates or times will be notified as soon as possible. We reserve the right to cancel or reschedule courses and accept no consequential liability or any other claim irrespective of notice given for any changes made by Techno CTA Ltd.
            <br>
            <br>

            <b style="color: red; font-size: 22px;"> <br>Medical, Drugs and Alcohol Requirements<br><br></b> The minimum Network Rail medical fitness standards NR/L2/0HS/00124 and NR/L1/0HS/051 Drugs and Alcohol Policy must be met prior to attending the course. The medical and drug and alcohol results must be registered on the Rail Sentinel website by the approved provider prior to the course start date.
            <br>
            <br>
            <b style="color: red; font-size: 22px;"> <br>Personal Identification<br><br></b> All delegates must produce photo I.D in the form of a new type driving license, Driving Licence with photo, Passport or similar to ensure candidates meet with eligibility to reside and work within the UK. Sponsor to advise the delegate(s)
            <br>
            <br> Candidates must be able to converse adequately with the spoken English language to make emergency phone calls and recite phonetic alphabet. Failure to meet this requirement may result in refusal to continue with a training course.
            <br>
            <br>

        </td>
    </tr>
</table>
<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
    <tr style="line-height: 20px;">
        <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">
            <b style=" font-size: 22px;">SPONSORSHIP<br><br></b>

            <b style="color: #000; font-size: 16px; font-weight:bold;"> Where required under our Company Competency Management Systems, I hereby confirm that we currently sponsor the
candidates listed below and all preceding assessments have been carried out on the candidate(s) where necessary. I also
confirm that the candidate remains medically fit in accordance with their last medical and if attending their first safety
critical training course, the candidate must have a record on the Sentinel database of a valid / current Alcohol and Drugs
screen certification. You are also signing to confirm you have authorisation and the delegates are under your Sponsorship
if you are not the Primary Sponsor of any of the named candidates to undertake the training detailed within this booking
form.</b>
            <br>
            <br> I agree to the above terms and conditions of the booking form.
            <br>
            <br>

            <b style="color: red; font-size: 16px;"> <br>In signing this form the Sponsor/Sentinel Coordinator is authorising training/assessment to take place &
confirming all the terms and conditions of booking. Also confirming that the delegate(s) have a logbook
which is current with the sufficient amount of endorsed entries and has had the pre-requisite number of
workplace assessments.<br><br></b>

        </td>
    </tr>
</table>
		</body></html>';
		//echo $html; die;
				$dompdf = new DOMPDF();
				$papersize = 'A4';
				$orientation = 'landscape';
				$dompdf = new Dompdf(array('enable_remote' => false));
				$dompdf = new Dompdf(array('debugKeepTemp' => true));
				$dompdf->load_html(utf8_decode($html), Configure::read('App.encoding'));
				$dompdf->set_paper($papersize, $orientation);
				$dompdf->render();
				echo $dompdf->output();
				$output = $dompdf->output();
				file_put_contents('document.pdf', $output);
				
				$name = 'geet';
				$email = 'geeteshwari.sds@gmail.com';
				$subject = "document";
				
				$message = "Dear <span style='color:#666666'>" . $name . "</span>,<br/><br/>";
				$message .= "You have successfully registered.<br/>";
				$message .= "<b>Activate your account by clicking on the below url:</b> <br/>";
				$message .= "<br/>Thanks & Regards, <br/>Techno CTA Team";
				
				App::import('Vendor', 'phpmailer', array(
				'file' => 'phpmailer/class.phpmailer.php'));
				$message = $message;
				$to = 'geeteshwari.sds@gmail.com';
				$mail = new PHPMailer();
				$mail->IsHTML(true);
				$mail->SetFrom($to, 'Techno CTA');
				$mail->AddReplyTo($to, "Techno CTA");
				$mail->Subject = $subject;
				$mail->Body = $message;
				$mail1->addAttachment('document.pdf');
				$mail->AddAddress(trim($email));
				
				if (!$mail->Send()) {
					echo $mail->ErrorInfo;
						 $this->Session->setFlash("<script>alert('Some thing went wrong.');</script>");
                        $this->redirect(array('controller' => 'homes', 'action' => 'index'));
					
				} else {
					$resultnew = "1";
                        $this->Session->setFlash("<script>alert('Thank you for registration. Please check your email to activate your account. If you do not find the mail in inbox then please check in spam folder.');</script>");
                        $this->redirect(array('controller' => 'homes', 'action' => 'index'));
                  
				}
	}
	
	
}
