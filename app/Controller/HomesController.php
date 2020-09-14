<?php

Class HomesController extends AppController{

    

     var $uses = array('Home','Gallery','GalleryImage','Sector','Course','Location','Content','Sponsor','SponsorImage','TransactionLog','Bookinglog','User','Ccoursedetail');

     var $components =array('Auth','Session');

     

     function beforeFilter() {

         $this->Auth->allow('index','getCourse','getcourseajax','getlocationajax','sign','digital_sign','send_document','testpdf','sms_clicksend','booking_document','confirm_mail','course_save');

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

	

    function course_save()

    {

        $this->layout ='Home';

        $this->autoRender=false;

        $user_id = $this->Auth->user('id');

        $id = $_POST['id'];

        $currDateTime = date("d-m-Y H:i:s");

         $book =$this->Bookinglog->find('first',array('conditions'=>array('Bookinglog.id'=>$id),'order' =>array('Bookinglog.id'=>'DESC')));

         $course_id = $book['Bookinglog']['course_id'];

         $user_id = $book['Bookinglog']['user_id'];

        $tran = $this->Course->find('first',array('conditions'=>array('Course.id'=>$course_id)));

        $course_name = $tran['Course']['course_name'];

        $pdf = $tran['Course']['pdf'];

        $user = $this->User->find('first',array('conditions'=>array('User.id'=>$user_id)));

        $userids=$user['User']['id'];

        // pr($user);die();



        $data['userid'] = $userids;

        $data['bookinglogid'] = $id;

        $data['courseid'] = $course_id;

        // pr($data); die();

            if ($this->Ccoursedetail->save($data)) {



                App::import('Vendor', 'dompdf', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));

                App::import('Vendor', 'phpmailer', array('file' => 'phpmailer/class.phpmailer.php'));

                $html =

        '<html><body>

        <table style="width:700px; height: auto; padding: 20px;font-size: 14px;

    font-family: sans-serif;  border-collapse: collapse;">

    <caption style="font-size: 20px;color: #449ac6;padding: 10px 0;border: 1px solid #666;">TRAINING SPONSORSHIP AGREEMENT COURSE DETAILS</caption>';

    if(!empty($book['Bookinglog']['sponsor_company'])){

    $html .= '<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Sponsor Name</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$book['Bookinglog']['sponsor_company'].'</td>

    </tr>';

    }

    if($book['User']['user_type']=="Company"){

        $name = explode(',',$book['User']['first_name']);

        $html .= '<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Number of Candidate</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.count($name).'</td>

    </tr>';

    }else{

        $html .= '<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Candidate Name</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$book['User']['first_name']." ". $book['User']['last_name'].'</td>

    </tr>';

    }

    $html .= '<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Course Title</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$tran['Course']['course_name'].'</td>

    </tr>

    <tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE DATE </td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$book['Bookinglog']['course_date'].'</td>

    </tr>

    <tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE TIME</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Start '.$book['Bookinglog']['start_time'].' </td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Finish '.$book['Bookinglog']['end_time'].'</td>

    </tr>

    <tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE DURATION</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$tran['Course']['duration'].'</td>

    </tr>

    <tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE LOCATION</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">Techno CTA Ltd, 7 pier Parade, North Woolwich, E16 2LJ . '.$tran['Location']['location'].'</td>

    </tr>

    <tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Telephone</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">0207 055 0877</td>

    </tr>

    <tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Car Parking</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">Pay & Display & some restriction parking; permit holders only</td>

    </tr>

    <tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Car Parking</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">Pay & Display & some restriction parking; permit holders only</td>

    </tr>

    <tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Smoking Policy</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">Smoking is not permitted inside the training centre.</td>

    </tr>

    <tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Refreshments</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">Hot and Cold drinks will be available on site</td>

    </tr>

    <tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Mobile Phone Policy</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">No phones or any gadgets are permitted in the training rooms</td>

    </tr>

    

</table>';



$html .='<table style="width:700px; height: auto; padding: 20px;font-size: 14px;

        font-family: sans-serif;  border-collapse: collapse;">

        <tr style="line-height: 20px;">

                    <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COMPANY :  Techno CTA</td>

                    <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">DATE :  '.$currDateTime.'</td>

                    

            </tr>          

            </table>

        </body></html>';

        //pr($html); die;

        $dompdf = new DOMPDF();

        $papersize = 'legal';

        $orientation = 'landscape';

        $dompdf->load_html($html);

        $dompdf->set_paper($papersize, $orientation);

        $dompdf->render();

        echo $dompdf->output();

        $output = $dompdf->output();

        file_put_contents('Coursedetails.pdf', $output);

// ///////////////////FOR ADMIN

        $html1 =

        '<html><body>

        <table style="width:700px; height: auto; padding: 20px;font-size: 14px;

    font-family: sans-serif;  border-collapse: collapse;">

    <caption style="font-size: 20px;color: #449ac6;padding: 10px 0;border: 1px solid #666;">TRAINING SPONSORSHIP AGREEMENT COURSE DETAILS</caption>';

    if(!empty($book['Bookinglog']['sponsor_company'])){

    $html1.= '<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Sponsor Name</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$book['Bookinglog']['sponsor_company'].'</td>

    </tr>';

    }

    if($book['User']['user_type']=="Company"){

        $fname = explode(',',$book['User']['first_name']);

        $lname = explode(',',$book['User']['last_name']);
        $sno = explode(',',$book['Bookinglog']['companysentinel']);

        $count = count($fname);

        $html1 .= '<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Number of Candidate</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.count($fname).'</td>

    </tr>';

        for ($i = 0; $i < $count; $i++) {

            $html1 .= '<tr style="line-height: 20px;">

    <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Candidate Details</td>
    <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Name - ' .$fname[$i].' '.$lname[$i].'</td>
    <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Sentinel no -  '.$sno[$i].'</td>

    </tr>';
    
        }



    }else{

        $html1 .= '<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"> Name</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$book['User']['first_name']." ". $book['User']['last_name'].'</td>

    </tr>';

    }

    $html1 .= '<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Course Title</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$tran['Course']['course_name'].'</td>

    </tr>

    <tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Email </td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$user['User']['email_id'].'</td>

    </tr>

    <tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Phone </td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$user['User']['phone'].'</td>

    </tr>

    <tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE DATE </td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$book['Bookinglog']['course_date'].'</td>

    </tr>

    <tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE TIME</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Start '.$book['Bookinglog']['start_time'].' </td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Finish '.$book['Bookinglog']['end_time'].'</td>

    </tr>

    <tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE DURATION</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$tran['Course']['duration'].'</td>

    </tr>

    

    

</table>';



$html1 .='<table style="width:700px; height: auto; padding: 20px;font-size: 14px;

        font-family: sans-serif;  border-collapse: collapse;">

        <tr style="line-height: 20px;">

                    <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COMPANY :  Techno CTA</td>

                    <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">DATE :  '.$currDateTime.'</td>

                    

            </tr>          

            </table>

        </body></html>';
// print_r($html1); die();
       

        $dompdf1 = new DOMPDF();

        $papersize = 'legal';

        $orientation = 'landscape';

        $dompdf1->load_html($html1);

        $dompdf1->set_paper($papersize, $orientation);

        $dompdf1->render();

        // echo $dompdf1->output();

        $output = $dompdf1->output();

        file_put_contents('admin_coursedetails.pdf', $output);

       

        if($user['User']['user_type']=="Company"){

                $n = explode(",", $user['User']['first_name']);

                     $name = $n[0];

                }else{

                    $name = $user['User']['first_name'];

                }





                // USER EMAIL



                $user_email = $user['User']['email_id'];

                // $user_email = 'vaishali16.sds@gmail.com';

                $str = $book['Bookinglog']['sponsor_company'];

                $sponsorCompany = explode("-",$str);

                //$user_email = "jyotik.sds@gmail.com";



                 // USER MAIL

                $subject = "Confirmation Of Booking ".$tran['Course']['course_name']. " ".$book['Bookinglog']['course_date'];

                $message = "Hello <span style='color:#666666'>" . $name . "</span>,<br/><br/>";

              

                  $message .= "Thank you for booking with Techno CTA, Booking details are attached to this email.<br/>

                    

                     <p>For any further assistance or queries you can contact Techno CTA on call 0207 055 0877<br/><br/>";



                $message .= "<br/>Thanks & Regards, <br/>Techno CTA Team";

                

                

                $message = $message;

                $to = 'booking@technocta.co.uk';

                $mail = new PHPMailer();

                $mail->IsHTML(true);

                $mail->SetFrom($to, 'Techno CTA');

                $mail->AddReplyTo($to, "Techno CTA");

                $mail->Subject = $subject;

                $mail->Body = $message;

                $mail->addAttachment('Coursedetails.pdf');

                $mail->AddAddress(trim($user_email));



                // ADMIN MAIL
                $email_a_e = 'booking@technocta.co.uk';
                // $email_a_e='depain@sdssoftwares.co.uk';                 

                $subject_a_e = $sponsorCompany[0]."- Confirmation Of Booking  and Joining Instructions ".$tran['Course']['course_name']. " ".$book['Bookinglog']['course_date'];

                        

                        $message_a_e = "Hello Admin,<br/><br/>";

                    

                        $message_a_e .= "<p>The above course is booked by  ".$book['Bookinglog']['sponsor_company']." Company. </p>

                                    	Candidate details and course details are in the attached file..<br/><br/>";



                        $message_a_e .= "<br/>Thanks & Regards, <br/>Techno CTA Team";

                        

                       

                        $message_a_e = $message_a_e;

                        $to_a_e = 'booking@technocta.co.uk';

                        // $to_a_e = 'sdssoftform@gmail.com';

                        $mail_a_e = new PHPMailer();

                        $mail_a_e->IsHTML(true);

                        $mail_a_e->SetFrom($to_a_e, 'Techno CTA');

                        $mail_a_e->AddReplyTo($to_a_e, "Techno CTA");

                        // $mail1->AddCC('depain@sdssoftwares.co.uk');

                        //$mail_a_e->AddCC('khatrriidepain@gmail.com,hr@sdssoftwares.co.uk');

                        $mail_a_e->Subject = $subject_a_e;

                        $mail_a_e->Body = $message_a_e;

                        $mail_a_e->addAttachment('admin_coursedetails.pdf');

                        // $mail_a_e->addAttachment('TermsAndConditions.pdf');

                        // $mail_a_e->addAttachment($pdf);

                        $mail_a_e->AddAddress(trim($email_a_e));

                         // $email1='depain@sdssoftwares.co.uk';



                // COMPANY EMAIL

                $email_s= $book['Bookinglog']['companyemail'];

                // $email_s= 'vaishali16.sds@gmail.com';

              

                if(!empty($email_s)){

               

                $subject_s =  $sponsorCompany[0]."- Confirmation Of Booking.".$tran['Course']['course_name']. " ".$book['Bookinglog']['course_date'];

                        

                        $message_s = "Hello ,<br/><br/>";

                        $message_s .= "<p>Thank you for booking with Techno CTA, Booking details are attached to this email.</p>

                       

                                      

                                      <p>For any further assistance or queries you can contact Techno CTA on call 0207 055 0877</p>



                                        Please check the attachment.<br/><br/>";

                        $message_s .= "<br/>Thanks & Regards, <br/>Techno CTA Team";

                        

                        

                        $message_s = $message_s;

                        $to_s = 'booking@technocta.co.uk';

                        $mail_s = new PHPMailer();

                        $mail_s->IsHTML(true);

                        $mail_s->SetFrom($to_s, 'Techno CTA');

                        $mail_s->AddReplyTo($to_s, "Techno CTA");

                        $mail_s->Subject = $subject_s;

                        $mail_s->Body = $message_s;

                        $mail_s->addAttachment('Coursedetails.pdf');

                        // $mail_s->addAttachment('TermsAndConditions.pdf');

                        // $mail_s->addAttachment($pdf);

                        $mail_s->AddAddress(trim($email_s));

                }



                  if (!$mail->Send()) {

                echo $mail->ErrorInfo;

                echo 1;

                exit;

            }else{

                $mail_a_e->Send();

                    $mail_s->Send();

                    $this->redirect(array('controller' => 'homes', 'action' => 'sign?id='.$id));



            }

           

}







        

}

    

	public function sign() {

	$this->layout ='Home';

	$user_id = $this->Auth->user('id');

	$id = $_GET['id'];

	//$user_id = $_GET['u_id'];

	//echo($u_id); die;

		 //$tran = $this->TransactionLog->find('first',array('conditions'=>array('TransactionLog.user_id'=>$user_id),'order' =>array('TransactionLog.id'=>'DESC')));

		 //$course_name = $tran['Course']['course_name'];

		 //pr($course_name); die;

		 //$id= $tran['TransactionLog']['id'];

		 $currDateTime = date("d-m-Y H:i:s");

		 $book =$this->Bookinglog->find('first',array('conditions'=>array('Bookinglog.id'=>$id),'order' =>array('Bookinglog.id'=>'DESC')));

       

		 $course_id = $book['Bookinglog']['course_id'];

		 $user_id = $book['Bookinglog']['user_id'];

		$tran = $this->Course->find('first',array('conditions'=>array('Course.id'=>$course_id)));

		$course_name = $tran['Course']['course_name'];

        $pdf = $tran['Course']['pdf'];

		$user = $this->User->find('first',array('conditions'=>array('User.id'=>$user_id)));

         $userids=$user['User']['id'];



         $data['userid'] = $userids;

        $data['bookinglogid'] = $id;

        $data['courseid'] = $course_id;



        $cc_d = $this->Ccoursedetail->find('first',array('conditions'=>array('Ccoursedetail.userid'=>$user_id,'Ccoursedetail.courseid'=>$course_id,'Ccoursedetail.bookinglogid'=>$id)));

		  // echo "<pre>";

    //      // print_r($book['User']);die();

		 $this->set(compact('tran','book','cc_d'));

		 //pr($this->request->data); die;

		 if(!empty($this->request->data)){

			$this->Bookinglog->id = $id;

				$file =	$this->request->data['Bookinglog']['sign']['name'];

                $ext = substr(strtolower(strrchr($file, '.')), 1);

                $arr_ext = array('jpg','png');

                if (in_array($ext, $arr_ext)) {

                $filename = time() . $this->request->data['Bookinglog']['sign']['name'];

                 move_uploaded_file($this->request->data['Bookinglog']['sign']['tmp_name'], "img/Sign/" . $filename);

                 $data['Bookinglog']['sign'] = $filename;

				if ($this->Bookinglog->save($data)) {

     App::import('Vendor', 'dompdf', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));

        $html =

        '<html><body>

		<table style="width:700px; height: auto; padding: 20px;font-size: 14px;

    font-family: sans-serif;  border-collapse: collapse;">

    <caption style="font-size: 20px;color: #449ac6;padding: 10px 0;border: 1px solid #666;">TRAINING SPONSORSHIP AGREEMENT COURSE BOOKING FORM</caption>';

	if(!empty($book['Bookinglog']['sponsor_company'])){

	$html .= '<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Sponsor Name</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$book['Bookinglog']['sponsor_company'].'</td>

	</tr>';

	}

	if($book['User']['user_type']=="Company"){

		$name = explode(',',$book['User']['first_name']);

		$html .= '<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Number of Candidate</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.count($name).'</td>

	</tr>';

	}else{

		$html .= '<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Candidate Name</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$book['User']['first_name']." ". $book['User']['last_name'].'</td>

	</tr>';

	}

	$html .= '<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Course Title</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$tran['Course']['course_name'].'</td>

	</tr>

	<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE DATE </td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$book['Bookinglog']['course_date'].'</td>

	</tr>

	<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE TIME</td>

		<td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Start '.$book['Bookinglog']['start_time'].' </td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Finish '.$book['Bookinglog']['end_time'].'</td>

	</tr>

	<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE DURATION</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$tran['Course']['duration'].'</td>

	</tr>

	<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE LOCATION</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$tran['Location']['location'].'</td>

    </tr>

	<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Telephone</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">0207 055 0877</td>

    </tr>

	<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Car Parking</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">Pay & Display & some restriction parking; permit holders only</td>

    </tr>

	<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Car Parking</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">Pay & Display & some restriction parking; permit holders only</td>

    </tr>

	<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Smoking Policy</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">Smoking is not permitted inside the training centre.</td>

    </tr>

	<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Refreshments</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">Hot and Cold drinks will be available on site</td>

    </tr>

	<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Mobile Phone Policy</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">No phones or any gadgets are permitted in the training rooms</td>

    </tr>

</table>';

if(preg_match('/,/', $user['User']['first_name'])){ 

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

		$name = explode(',',$user['User']['first_name']);

		$lastname = explode(',',$user['User']['last_name']);

		$sentinel = explode(',',$user['User']['sentinel']);

		if(!empty($name[$i])){

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

		} }

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

            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$user['User']['first_name'].'</td>

            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$user['User']['last_name'].'</td>

            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$user['User']['sentinel'].'</td>

        </tr>

	

</table>'; 

}

$html .='<table style="width:700px; height: auto; padding: 20px;font-size: 14px;font-family: sans-serif;  border-collapse: collapse;">

    <tr style="line-height: 20px;">

            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>

            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Cost Rate:</td>

            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Training (per person)</td>

            <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">&pound; '.$tran['Course']['delegate_price'].'</td>

    </tr>

    <tr style="line-height: 20px;">

            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>

            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Total Cost Inc Vat:</td>

            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">&pound; '.$book['Bookinglog']['price_inc_vat'].'</td>

    </tr>

</table>

<table style="width:700px; height: auto; padding: 20px;font-size: 14px;font-family: sans-serif;  border-collapse: collapse;">

	<tr style="line-height: 20px;">

				<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">ELECTRONICAL SIGNATURE:</td>

				<td width="75%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"><img src="https://demo.sdssoftltd.co.uk/techno/app/webroot/img/Sign/'.$filename.'" height="80" width="100"></td> </tr>

		</table>

		<table style="width:700px; height: auto; padding: 20px;font-size: 14px;

		font-family: sans-serif;  border-collapse: collapse;">

		<tr style="line-height: 20px;">

					<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COMPANY :  Techno CTA</td>

					<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">DATE :  '.$currDateTime.'</td>

					

			</tr>          

			</table>

		</body></html>';

		//pr($html); die;

        $dompdf = new DOMPDF();

        $papersize = 'legal';

        $orientation = 'landscape';

        $dompdf->load_html($html);

        $dompdf->set_paper($papersize, $orientation);

        $dompdf->render();

        echo $dompdf->output();

        $output = $dompdf->output();

        file_put_contents('sign_document.pdf', $output);

		//echo  file_put_contents; die;

		

				if($user['User']['user_type']=="Company"){

				$n = explode(",", $user['User']['first_name']);

					 $name = $n[0];

				}else{

					$name = $user['User']['first_name'];

				}

				//echo $user['User']['user_type']; die;

				$user_email = $user['User']['email_id'];

                $str = $book['Bookinglog']['sponsor_company'];

                $sponsorCompany = explode("-",$str);

				//pr($user_email);

				//$user_email = "jyotik.sds@gmail.com";

				$subject = "Confirmation Of Booking  and Joining Instructions ".$tran['Course']['course_name']. " ".$book['Bookinglog']['course_date'];

				$message = "Hello <span style='color:#666666'>" . $name . "</span>,<br/><br/>";

                // $message .= 'Thank you for booking the course on our website <br> Please find attached e-sign document with course details.<br/>';

                  $message .= "The above course has been booked and the booking form has been signed by your Sponsor.<br/>

                    <p>Copy of Joining Instructions have been attached to this email for your attention, </p>



                    <p>48 hours prior to the course date you will receive a text reminder of the course on the mobile number you have provided at the time of booking.</p>



                <p>If you have any further questions, please do not hesitate to contact us on 0207 055 0877</p>



                    Please check the attachment.<br/><br/>";



                $message .= "<br/>Thanks & Regards, <br/>Techno CTA Team";

				

				App::import('Vendor', 'phpmailer', array(

				'file' => 'phpmailer/class.phpmailer.php'));

				$message = $message;

				$to = 'booking@technocta.co.uk';

				$mail = new PHPMailer();

				$mail->IsHTML(true);

				$mail->SetFrom($to, 'Techno CTA');

				$mail->AddReplyTo($to, "Techno CTA");

				$mail->Subject = $subject;

				$mail->Body = $message;

				//$mail->addAttachment('TermsAndConditions.pdf');

				$mail->addAttachment($pdf);

				$mail->AddAddress(trim($user_email));

				

				//$email1='ak07389@gmail.com';

                // $email_a_e='vaishali16.sds@gmail.com'; 

                //$email_a_e='khatrriidepain@gmail.com,hr@sdssoftwares.co.uk'; 

                $email_a_e='depain@sdssoftwares.co.uk'; 



                // $email1='booking@technocta.co.uk , ruby13@technocta.co.uk';

				//$email1='jyotik.sds@gmail.com';

				$subject_a_e = $sponsorCompany[0]."- Confirmation Of Booking  and Joining Instructions ".$tran['Course']['course_name']. " ".$book['Bookinglog']['course_date'];

						

						$message_a_e = "Hello Admin,<br/><br/>";

                    

                        $message_a_e .= "<p>Thank you for booking the above course with Techno CTA.</p>

                                    <p>The course has been booked and Booking Form has E-signed.</p>

                                      <p>Please<a href=" . SITEPATH . "homes/booking_document" . "?id=" . $id . "> Click Here</a> to print the Booking Form</p>

                                     <p>Joining Instructions and Terms & Conditions are attached to this email for your distribution.</p>

<p>If you have any questions, please do not hesitate to contact us on 0207 055 0877</p>



                                        Please check the attachment.<br/><br/>";



                        $message_a_e .= "<br/>Thanks & Regards, <br/>Techno CTA Team";

						

						App::import('Vendor', 'phpmailer', array(

						'file' => 'phpmailer/class.phpmailer.php'));

						$message_a_e = $message_a_e;

						$to_a_e = 'booking@technocta.co.uk';

						$mail_a_e = new PHPMailer();

						$mail_a_e->IsHTML(true);

						$mail_a_e->SetFrom($to_a_e, 'Techno CTA');

						$mail_a_e->AddReplyTo($to_a_e, "Techno CTA");

						$mail1->AddCC('depain@sdssoftwares.co.uk');

                        //$mail_a_e->AddCC('khatrriidepain@gmail.com,hr@sdssoftwares.co.uk');

						$mail_a_e->Subject = $subject_a_e;

						$mail_a_e->Body = $message_a_e;

						$mail_a_e->addAttachment('sign_document.pdf');

						$mail_a_e->addAttachment('TermsAndConditions.pdf');

						$mail_a_e->addAttachment($pdf);

						$mail_a_e->AddAddress(trim($email_a_e));

						

						

					//$email1='khatrriidepain@gmail.com, hr@sdssoftwares.co.uk';

                    $email1='depain@sdssoftwares.co.uk';

				$email_s= $book['Bookinglog']['companyemail'];

				//pr($email_s); die;

				if(!empty($email_s)){

				//$email_s= "jyotik.sds@gmail.com";

				$subject_s =  $sponsorCompany[0]."- Confirmation Of Booking and Joining Instructions ".$tran['Course']['course_name']. " ".$book['Bookinglog']['course_date'];

						

						$message_s = "Hello ,<br/><br/>";

                        $message_s .= "<p>Thank you for booking the above course with Techno CTA.</p>

                        <p>The course has been booked and Booking Form has E-signed.</p>

                                      <p>Please<a href=" . SITEPATH . "homes/booking_document" . "?id=" . $id . "> Click Here</a> to print the Booking Form </p>

                                     <p>Copy of the E-signed booking form is attached to this email for your perusal</p>

<p>If you have any questions, please do not hesitate to contact us on 0207 055 0877</p>



                                        Please check the attachment.<br/><br/>";

                        $message_s .= "<br/>Thanks & Regards, <br/>Techno CTA Team";

						

						App::import('Vendor', 'phpmailer', array(

						'file' => 'phpmailer/class.phpmailer.php'));

						$message_s = $message_s;

						$to_s = 'booking@technocta.co.uk';

						$mail_s = new PHPMailer();

						$mail_s->IsHTML(true);

						$mail_s->SetFrom($to_s, 'Techno CTA');

						$mail_s->AddReplyTo($to_s, "Techno CTA");

						$mail_s->Subject = $subject_s;

						$mail_s->Body = $message_s;

						$mail_s->addAttachment('sign_document.pdf');

						$mail_s->addAttachment('TermsAndConditions.pdf');

						$mail_s->addAttachment($pdf);

						$mail_s->AddAddress(trim($email_s));

				}

				//echo $user['User']['user_type']; die;

				 if (!$mail->Send()||!$mail1->Send()) {

                //if (!$mail1->Send()) {

					echo $mail->ErrorInfo;

					echo $mail1->ErrorInfo;

					echo $mail_s->ErrorInfo;

                     $this->Session->setFlash("Some thing went wrong.",'default', array(), 'form1');

                        $this->redirect(array('controller' => 'homes', 'action' => 'index'));

						

					}else {

						//echo $$email_s; die;

                       

						if(!empty($email_s)){

						if($mail_s->Send()){

						if($user['User']['user_type']=="User"){

							$this->Session->setFlash("Thank you for E-Sign.",'default', array(), 'form1');

                        $this->redirect(array('controller' => 'homes', 'action' => 'index'));

						}else{

						//$this->Session->setFlash("<script>alert('Thank you for booking.');</script>");

						$this->redirect($this->webroot."app/webroot/Payzone/index.php?id=".$book['Bookinglog']['course_id']."&amount=".$book['Bookinglog']['price_inc_vat']."&userId=".$user_id."&username=".$name[0]." ".$lastname[0]."&userType=".$user['User']['user_type']);

						}

						}

                    }else{

                            if($user['User']['user_type']=="User"){

                            $this->Session->setFlash("Thank you for E-Sign.",'default', array(), 'form1');

                        $this->redirect(array('controller' => 'homes', 'action' => 'index'));

                        }else{

                        //$this->Session->setFlash("<script>alert('Thank you for booking.');</script>");

                        $this->redirect($this->webroot."app/webroot/Payzone/index.php?id=".$book['Bookinglog']['course_id']."&amount=".$book['Bookinglog']['price_inc_vat']."&userId=".$user_id."&username=".$name[0]." ".$lastname[0]."&userType=".$user['User']['user_type']);

                        }

                        }

					}

				}

			}

		}

	}

	

	function digital_sign(){

		 $this->layout ='Home';

		 $user_id = $this->Auth->user('id');

		 $id = $this->data['id'];

		 // echo $id; die();

		 //$tran = $this->TransactionLog->find('first',array('conditions'=>array('TransactionLog.user_id'=>$user_id),'order' =>array('TransactionLog.id'=>'DESC')));

		 //$id= $tran['TransactionLog']['id'];

		$book =$this->Bookinglog->find('first',array('conditions'=>array('Bookinglog.id'=>$id),'order' =>array('Bookinglog.id'=>'DESC')));

		 $course_id = $book['Bookinglog']['course_id'];

         //echo $course_id; die();

		  $user_id = $book['Bookinglog']['user_id'];

          //echo $user_id; die();

		$currDateTime = date("d-m-Y H:i:s");



		$tran = $this->Course->find('first',array('conditions'=>array('Course.id'=>$course_id)));

		$course_name = $tran['Course']['course_name'];

         // echo $course_name; die();

        $pdf = $tran['Course']['pdf'];

        /**

         * Send Email For First Time

         **/



        if($book['Bookinglog']['email_status']){

            if($user['User']['user_type']=="User"){

               // $user = $this->Course->find('first',array('conditions'=>array('Course.id'=>$course_id)));

                    echo '1';

                    die();

                }else{

                echo '2'; die(); 

            }

        }



      // echo $pdf; die;

		$user = $this->User->find('first',array('conditions'=>array('User.id'=>$user_id)));

		 $this->set(compact('tran','book'));

		 //pr($user); die;

		$image_sign = $this->data['img'];

		//echo $image_sign; die;

		if(!empty($this->request->data)){

			$this->Bookinglog->id = $id;

				$data['Bookinglog']['sign'] = $image_sign;

						if ($this->Bookinglog->save($data)) {

							App::import('Vendor', 'dompdf', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));

							

				 $html =

        '<html><body>

		<table style="width:700px; height: auto; padding: 20px;font-size: 14px;

    font-family: sans-serif;  border-collapse: collapse;">

    <caption style="font-size: 20px;color: #449ac6;padding: 10px 0;border: 1px solid #666;">TRAINING SPONSORSHIP AGREEMENT COURSE BOOKING FORM</caption>';

	if(!empty($book['Bookinglog']['sponsor_company'])){

	$html .= '<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Sponsor Name</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$book['Bookinglog']['sponsor_company'].'</td>

	</tr>';

	}

	if($book['User']['user_type']=="Company"){

		$name = explode(',',$book['User']['first_name']);

		$html .= '<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Number of Candidate</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.count($name).'</td>

	</tr>';

	}else{

		$html .= '<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Candidate Name</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$book['User']['first_name']." ". $book['User']['last_name'].'</td>

	</tr>';

	}

	$html .= '<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Course Title</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$tran['Course']['course_name'].'</td>

	</tr>

	<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE DATE </td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$book['Bookinglog']['course_date'].'</td>

	</tr>

	<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE TIME</td>

		<td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Start '.$book['Bookinglog']['start_time'].' </td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Finish '.$book['Bookinglog']['end_time'].'</td>

	</tr>

	<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE DURATION</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$tran['Course']['duration'].'</td>

	</tr>

	<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE LOCATION</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$tran['Location']['location'].'</td>

    </tr>

	<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Telephone</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">0207 055 0877</td>

    </tr>

	<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Car Parking</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">Pay & Display & some restriction parking; permit holders only</td>

    </tr>

	<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Car Parking</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">Pay & Display & some restriction parking; permit holders only</td>

    </tr>

	<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Smoking Policy</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">Smoking is not permitted inside the training centre.</td>

    </tr>

	<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Refreshments</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">Hot and Cold drinks will be available on site</td>

    </tr>

	<tr style="line-height: 20px;">

        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Mobile Phone Policy</td>

        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">No phones or any gadgets are permitted in the training rooms</td>

    </tr>

</table>';

if(preg_match('/,/', $user['User']['first_name'])){ 

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

		$name = explode(',',$user['User']['first_name']);

		$lastname = explode(',',$user['User']['last_name']);

		$sentinel = explode(',',$user['User']['sentinel']);

		if(!empty($name[$i])){

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

		} }

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

            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$user['User']['first_name'].'</td>

            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$user['User']['last_name'].'</td>

            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">'.$user['User']['sentinel'].'</td>

        </tr>

	

</table>'; 

}

$html .='<table style="width:700px; height: auto; padding: 20px;font-size: 14px;font-family: sans-serif;  border-collapse: collapse;">

    <tr style="line-height: 20px;">

            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>

            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Cost Rate:</td>

            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Training (per person)</td>

            <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">&pound; '.$tran['Course']['delegate_price'].'</td>

    </tr>

    <tr style="line-height: 20px;">

            <td width="10%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"></td>

            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Total Cost Inc Vat:</td>

            <td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">&pound; '.$book['Bookinglog']['price_inc_vat'].'</td>

    </tr>

</table>

<table style="width:700px; height: auto; padding: 20px;font-size: 14px;font-family: sans-serif;  border-collapse: collapse;">

	<tr style="line-height: 20px;">

				<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">ELECTRONICAL SIGNATURE:</td>

				<td width="75%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;"><img src="'. str_replace(' ', '+',$image_sign).'" height="80" width="100"></td></tr>

		</table>

		<table style="width:700px; height: auto; padding: 20px;font-size: 14px;

		font-family: sans-serif;  border-collapse: collapse;">

		<tr style="line-height: 20px;">

					<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COMPANY :  Techno CTA</td>

					<td width="25%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">DATE :  '.$currDateTime.'</td>

					

			</tr>          

			</table>

		</body></html>';

		//pr($html); die;

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

				

				if($user['User']['user_type']=="Company"){

				$n = explode(",", $user['User']['first_name']);

					 $name = $n[0];

				}else{

					$name = $user['User']['first_name'];

				}

				$user_email = $user['User']['email_id'];

				//$user_email = "jyotik.sds@gmail.com";

                $str = $book['Bookinglog']['sponsor_company'];

                $sponsorCompany = explode("-",$str);



				$subject = "Confirmation Of Booking and Joining Instructions ".$tran['Course']['course_name']. " ".$book['Bookinglog']['course_date'];

				$message = "Hello <span style='color:#666666'>" . $name . "</span>,<br/><br/>";

				// $message .= 'Thank you for booking the course on our website <br> Please find attached e-sign document with course details.<br/>';

                  $message .= "The above course has been booked and the booking form has been signed by your Sponsor.<br/>

                    <p>Copy of Joining Instructions have been attached to this email for your attention. </p>



                    <p>48 hours prior to the course date you will receive a text reminder of the course on the mobile number you have provided at the time of booking.</p>



                <p>If you have any further questions, please do not hesitate to contact us on 0207 055 0877</p>



                    Please check the attachment.<br/><br/>";



				$message .= "<br/>Thanks & Regards, <br/>Techno CTA Team";

				

				App::import('Vendor', 'phpmailer', array(

				'file' => 'phpmailer/class.phpmailer.php'));

				$message = $message;

				//$to = 'geetchhoker1234@gmail.com';

                $to = 'booking@technocta.co.uk';

				$mail = new PHPMailer();

				$mail->IsHTML(true);

				$mail->SetFrom($to, 'Techno CTA');

				$mail->AddReplyTo($to, "Techno CTA");

				$mail->Subject = $subject;

				$mail->Body = $message;

				// $mail->addAttachment('TermsAndConditions.pdf');

				// $mail->addAttachment($course_name.'.pdf');

                $mail->addAttachment($pdf);

				$mail->AddAddress(trim($user_email));

				

			   //$email1='khatrriidepain@gmail.com, hr@sdssoftwares.co.uk';

               $email1='depain@sdssoftwares.co.uk';

             //$email1='depain@sdssoftwares.co.uk, ruby13@technocta.co.uk, ak0789@gmail.com';

				//$email1='jyotik.sds@gmail.com';

               $str = $book['Bookinglog']['sponsor_company'];

                $sponsorCompany = explode("-",$str);

				$subject1 = $sponsorCompany[0]."- Confirmation Of Booking and Joining Instructions ".$tran['Course']['course_name']. " ".$book['Bookinglog']['course_date'];

						

						$message1 = "Hello Admin,<br/><br/>";

					

                        $message1 .= "<p>Thank you for booking the above course with Techno CTA website</p>

                                <p>The course has been booked and Booking Form has E-signed.</p>

                                      <p>Please<a href=" . SITEPATH . "homes/booking_document" . "?id=" . $id . "> Click Here</a> to print the Booking Form</p>

                                     <p> Copy of the E-signed booking form is attached to this email for your perusal.</p>

<p>If you have any questions, please do not hesitate to contact us on 0207 055 0877</p>



                                        Please check the attachment.<br/><br/>";



						$message1 .= "<br/>Thanks & Regards, <br/>Techno CTA Team";

						

						App::import('Vendor', 'phpmailer', array(

						'file' => 'phpmailer/class.phpmailer.php'));

						$message1 = $message1;

						$to1 = 'booking@technocta.co.uk';

						$mail1 = new PHPMailer();

						$mail1->IsHTML(true);

						$mail1->SetFrom($to1, 'Techno CTA');

						$mail1->AddReplyTo($to1, "Techno CTA");

						// $mail1->AddCC('depain@sdssoftwares.co.uk');

                        $mail1->AddCC('abhishekkr.sds@gmail.com');

						$mail1->Subject = $subject1;

						$mail1->Body = $message1;

						$mail1->addAttachment('esign_document.pdf');

						$mail1->addAttachment('TermsAndConditions.pdf');

						$mail1->addAttachment($pdf);

						$mail1->AddAddress(trim($email1));

					

						//$email1='depain@sdssoftwares.co.uk';

				$email_s= $book['Bookinglog']['companyemail'];

				//pr($email_s); die;

				if(!empty($email_s)){

				//$email_s= "jyotik.sds@gmail.com";

				$subject_s =  $sponsorCompany[0]."- Confirmation Of Booking and Joining Instructions ".$tran['Course']['course_name']. " ".$book['Bookinglog']['course_date'];

						

						$message_s = "Hello,<br/><br/>";

						$message_s .= "<p>Thank you for booking the above course with Techno CTA website</p>

                                    <p>The course has been booked and Booking Form has E-signed.</p>

									  <p>Please<a href=" . SITEPATH . "homes/booking_document" . "?id=" . $id . "> Click Here</a> to print the Booking Form </p>

                                     <p> Joining Instructions and Terms & Conditions are attached to this email for your distribution.</p>

<p>If you have any questions, please do not hesitate to contact us on 0207 055 0877</p>



										Please check the attachment.<br/><br/>";

						$message_s .= "<br/>Thanks & Regards, <br/>Techno CTA Team";

						

						App::import('Vendor', 'phpmailer', array(

						'file' => 'phpmailer/class.phpmailer.php'));

						$message_s = $message_s;

						$to_s = 'booking@technocta.co.uk';

						$mail_s = new PHPMailer();

						$mail_s->IsHTML(true);

						$mail_s->SetFrom($to_s, 'Techno CTA');

						$mail_s->AddReplyTo($to_s, "Techno CTA");

						$mail_s->Subject = $subject_s;

						$mail_s->Body = $message_s;

						$mail_s->addAttachment('esign_document.pdf');

						$mail_s->addAttachment('TermsAndConditions.pdf');

						$mail_s->addAttachment($pdf);

						$mail_s->AddAddress(trim($email_s));

				}

				

				// if (!$mail->Send()||!$mail1->Send()) {

                if (!$mail1->Send()) {

					echo $mail->ErrorInfo;

					

					}else {

                        $mail->Send();

						if(!empty($email_s)){

						if($mail_s->Send()){

						$this->Bookinglog->id = $id;

				        $data['Bookinglog']['email_status'] = 1;

						$this->Bookinglog->save($data);

						if($user['User']['user_type']=="User"){

							echo 1;

							die;

						}else{

						echo 2; die;

						}

						}

						}else{

                           if($user['User']['user_type']=="User"){

                            echo 1;

                            die;

                        }else{

                        echo 2; die;

                        } 

                        }

					}

									

				}

						

		} 

	}

	

	function sms_clicksend(){

	$this->autoRender=false;

	$tran = $this->Bookinglog->find('all',array('order'=>array('Bookinglog.id'=>'DESC')));

	//pr($tran); die;

		foreach($tran as $row){

			//$phone = $row['User']['phone'];

			$phone = "918077583035";

			$time = $row['Bookinglog']['start_time'];

		    $course_date = $row['Bookinglog']['course_date'] ;

			//echo "<br>";

		    $date = date('d/m/Y', strtotime(' +2 day'));

			//echo "<br>";

			//echo "hello";

			 if($date == $course_date){

				 

		 App::import('Vendor', 'vendor', array('file' => 'vendor' . DS . 'autoload.php'));

		// Configure HTTP basic authorization: BasicAuth

		$config = ClickSend\Configuration::getDefaultConfiguration()

              ->setUsername('geeteshwari.sds')

              ->setPassword('2991DDC1-00C8-B327-13EA-3E9E28595648');



		$apiInstance = new ClickSend\Api\SMSApi(new GuzzleHttp\Client(),$config);

		$msg = new \ClickSend\Model\SmsMessage();

		$msg->setBody("Thanks for booking with Techno CTA

		Your training is on $course_date at $time please bring 2 proofs ID’s, 1 from list A and 1 from list B

		A.	Passport, driving license, Biometric ID, EU ID Card or Citizens Card

		B.	Bank statement, National Insurance card or Inland Revenue letter

			Techno CTA Ltd, Address 7 Pier Parade, London E16 2LJ

			0207 055 0877

			Nearest DLR King George V

			Buses: 474 stop North Woolwich police station

					DO NOT REPLY TO THIS TEXT

							Thanks

			"); 

		$msg->setTo($phone);

		$msg->setSource("sdk");



		// \ClickSend\Model\SmsMessageCollection | SmsMessageCollection model

		$sms_messages = new \ClickSend\Model\SmsMessageCollection(); 

		$sms_messages->setMessages([$msg]);



			try {

				$result = $apiInstance->smsSendPost($sms_messages);

				//print_r($result);

			} catch (Exception $e) {

				echo 'Exception when calling SMSApi->smsSendPost: ', $e->getMessage(), PHP_EOL;

			}

		  }

		}

	}

	

	function booking_document(){

		$this->layout="Home";

		//$this->autoRender=false;

		$id = $_GET['id'];

		 $book =$this->Bookinglog->find('first',array('conditions'=>array('Bookinglog.id'=>$id),'order' =>array('Bookinglog.id'=>'DESC')));

		 $course_id = $book['Bookinglog']['course_id'];

		 $user_id = $book['Bookinglog']['user_id'];

		$tran = $this->Course->find('first',array('conditions'=>array('Course.id'=>$course_id)));

		$course_name = $tran['Course']['course_name'];

		$user = $this->User->find('first',array('conditions'=>array('User.id'=>$user_id)));

		 //pr($user); die;

		 $this->set(compact('tran','book'));

	}



    function confirm_mail($orderid = NULL){

         $this->autoRender = false;

        if($this->Auth->login()){

             $uid = $this->Auth->user('id');

             $userinfo = $this->User->findById($uid);

        }

        $book =$this->Bookinglog->find('first',array('conditions'=>array('Bookinglog.user_id'=>$uid),'order' =>array('Bookinglog.id'=>'DESC')));

        $book_id =$book['Bookinglog']['id'];

        $userid = $book['Bookinglog']['user_id'];

        $user_type = $book['User']['user_type'];

        if($user_type=="Company"){

        $n = explode(",", $userinfo['User']['first_name']);

          $name = $n[0];

        }else{

              $name = $userinfo['User']['first_name'];

         }

        // $name = $userinfo['User']['first_name'];

        $course_type = $book['Course']['sector_id'];

        $pdf = $book['Course']['pdf'];

        $sponsor_name = $book['Bookinglog']['sponsor_company'];

        $sponsor_email = $book['Bookinglog']['companyemail'];

        $course = $book['Bookinglog']['course_name'];

        $course_date = $book['Bookinglog']['course_date'];

      

        if($course_type==1){



            if($user_type == 'User'){

            $email = $userinfo['User']['email_id'];

             $from ="booking@technocta.co.uk";

            $subject = "Booking Confirmation ".$course . " ".$course_date ."   Booking ID:".$orderid;

            App::import('Vendor', 'phpmailer', array(

                'file' => 'phpmailer/class.phpmailer.php'));

                    

            $message = "<p>Dear " .$name. ",

                 </p>

                 <p>Thank you for booking the above course with Techno CTA website.</p>

                 <p>Copy of the Booking Form has been sent to your Sponsor for signing.</p>

                 <p>You can contact your Sponsor to remind them to sign the Booking Form which will be automatically get sent to Techno Booking Admin.</p>

                 <p>Please find attached copy of the booking Terms and Conditions.</p>

                 <p>Copy of Joining Instructions will be sent once the Booking Form has been signed by your Sponsor.</p>

                 <p>The Course Booking is ONLY confirmed when we are in receipt of the Signed Booking Form from your sponsor.</p>

                 <p>If you have any questions, please do not hesitate to contact us on 0207 055 0877.</p>

                 <p>Please quote your BOOKING IDreference on the subject of this email when contacting Techno CTA would be helpful.</p>

                 <p>Thanks & Regards, </p>

                 <p>Techno CTA Team</p>";

            $to = $email;

            $mail = new PHPMailer();

            $mail->IsHTML(true);

            $mail->SetFrom($from, 'Techno CTA Team');

            $mail->AddReplyTo($from, "Techno CTA Team");

            $mail->Subject = $subject;

            $mail->Body = $message;

            $mail->addAttachment('TermsAndConditions.pdf');

            $mail->AddAddress(trim($email));

            if (!$mail->Send()) {

                echo $mail->ErrorInfo;

                 $this->redirect(array('controller' => 'homes', 'action' => 'index'));

            } else {

                $resultnew = "1";

                $this->Session->setFlash("Thank you for Booking. Please check your email . If you do not find the mail in inbox then please check in spam folder.", 'default', array(), 'form1');

               $this->redirect(array('controller' => 'homes', 'action' => 'index'));

            }

            }else{

            $email = $sponsor_email;

            $cc ="abhishekkr.sds@gmail.com";

             $from ="booking@technocta.co.uk";

            $subject = "Booking Confirmation ".$course . " ".$course_date;

            App::import('Vendor', 'phpmailer', array(

                'file' => 'phpmailer/class.phpmailer.php'));

                    

            $message = "<p>Dear " .$name. ",

                 </p>

                 <p>Thank you for booking the above course with Techno CTA website.</p>

                 <p>Please find attached copy of the E-signedBooking form and Terms & Conditions.</p>

                 <p>Thanks & Regards, </p>

                 <p>Techno CTA Team</p>";

            $to = $email;

            $mail = new PHPMailer();

            $mail->IsHTML(true);

            $mail->SetFrom($from, 'Techno CTA Team');

            $mail->AddReplyTo($from, "Techno CTA Team");

            $mail->AddCC($cc);

            $mail->AddBCC($userinfo['User']['email_id']);

            $mail->Subject = $subject;

            $mail->Body = $message;

            $mail->addAttachment('TermsAndConditions.pdf');

            $mail->AddAddress(trim($email));

            if (!$mail->Send()) {

                echo $mail->ErrorInfo;

                 $this->redirect(array('controller' => 'homes', 'action' => 'index'));

            } else {

                $resultnew = "1";

                $this->Session->setFlash("Thank you for Booking. Please check your email . If you do not find the mail in inbox then please check in spam folder.", 'default', array(), 'form1');

               $this->redirect(array('controller' => 'homes', 'action' => 'index'));

            }

            }

          

        }elseif($course_type==6){



            if($user_type == 'User'){

            $email = $userinfo['User']['email_id'];

            $from ="booking@technocta.co.uk";

            $subject = "Booking Confirmation Medical and Drug & Alcohol Screening ".$course_date;

            App::import('Vendor', 'phpmailer', array(

                'file' => 'phpmailer/class.phpmailer.php'));

                    

            $message = "<p>Hello,

                 </p>

                 <p>Thank you for booking the above course with Techno CTA website.</p>

                 <p>Please find attached copy of the booking Details confirmation.</p>

                 <p>Please quote your BOOKING ID reference when contacting Techno CTA.</p>

                 <p>If you have any further questions, please do not hesitate to contact us on 0207 055 0877</p>

                 <p>Thanks & Regards,  </p>

                 <p>Techno CTA Team</p>";

            $to = $email;

            $mail = new PHPMailer();

            $mail->IsHTML(true);

            $mail->SetFrom($from, 'Techno CTA Team');

            $mail->AddReplyTo($from, "Techno CTA Team");

            $mail->Subject = $subject;

            $mail->Body = $message;

            $mail->AddAddress(trim($email));

            if (!$mail->Send()) {

                echo $mail->ErrorInfo;

                 $this->redirect(array('controller' => 'homes', 'action' => 'index'));

            } else {

                $resultnew = "1";

                $this->Session->setFlash("Thank you for Booking. Please check your email . If you do not find the mail in inbox then please check in spam folder.", 'default', array(), 'form1');

               $this->redirect(array('controller' => 'homes', 'action' => 'index'));

            }

            }else{

            $email = $sponsor_email;

            // pr($email ); die;

            $from ="booking@technocta.co.uk";

            $subject = "Booking Confirmation Medical and Drug & Alcohol Screening ".$course_date;

            App::import('Vendor', 'phpmailer', array(

                'file' => 'phpmailer/class.phpmailer.php'));

                    

            $message = "<p>Hello,

                 </p>

                 <p>Thank you for booking the above course with Techno CTA website.</p>

                 <p>Please find attached copy of the booking Details confirmation.</p>

                 <p>Please quote your BOOKING ID reference when contacting Techno CTA.</p>

                 <p>If you have any further questions, please do not hesitate to contact us on 0207 055 0877</p>

                 <p>Thanks & Regards,  </p>

                 <p>Techno CTA Team</p>";

            $to = $email;

            $mail = new PHPMailer();

            $mail->IsHTML(true);

            $mail->SetFrom($from, 'Techno CTA Team');

            $mail->AddReplyTo($from, "Techno CTA Team");

            $mail->AddCC('jyotik.sds@gmail.com');

            $mail->AddBCC($userinfo['User']['email_id']);

            $mail->Subject = $subject;

            $mail->Body = $message;

            // $mail->addAttachment('TermsAndConditions.pdf');

            $mail->AddAddress(trim($email));

            if (!$mail->Send()) {

                echo $mail->ErrorInfo;

                 $this->redirect(array('controller' => 'homes', 'action' => 'index'));

            } else {

                $resultnew = "1";

                $this->Session->setFlash("Thank you for Booking. Please check your email . If you do not find the mail in inbox then please check in spam folder.", 'default', array(), 'form1');

               $this->redirect(array('controller' => 'homes', 'action' => 'index'));

            }

            }



        }else{



            if($course == "IOSH Managing Safely" || $course == "IOSH Working Safely"){ 

            if($user_type == 'User'){

            $email = $userinfo['User']['email_id'];

             // $email = "jyotik.sds@gmail.com";

             $from ="booking@technocta.co.uk";

            $subject = "Booking Confirmation & Joining Instructions ".$course . " ".$course_date;

            App::import('Vendor', 'phpmailer', array(

                'file' => 'phpmailer/class.phpmailer.php'));

                    

            $message = "<p>Dear,

                 </p>

                 <p>Thank you for booking the above course with Techno CTA website.</p>

                 <p>Please find attached copy of the Terms and Conditions of booking and Joining Instructions for your attention.</p>

                 <p>Please quote your Booking ID reference when contacting Techno CTA would be helpful.</p>

                 <p>48 hours prior to the course date you will receive a text reminder of the course.</p>

                 <p>If you have any further questions, please do not hesitate to contact us on 0207 055 0877</p>

                 <p>Thanks & Regards,  </p>

                 <p>Techno CTA Team</p>";

            $to = $email;

            $mail = new PHPMailer();

            $mail->IsHTML(true);

            $mail->SetFrom($from, 'Techno CTA Team');

            $mail->AddReplyTo($from, "Techno CTA Team");

            $mail->Subject = $subject;

            $mail->Body = $message;

            $mail->addAttachment('TermsAndConditions.pdf');

            $mail->addAttachment($pdf);

            $mail->AddAddress(trim($email));

            if (!$mail->Send()) {

                echo $mail->ErrorInfo;

                 $this->redirect(array('controller' => 'homes', 'action' => 'index'));

            } else {

                $resultnew = "1";

                $this->Session->setFlash("Thank you for Booking. Please check your email . If you do not find the mail in inbox then please check in spam folder.", 'default', array(), 'form1');

               $this->redirect(array('controller' => 'homes', 'action' => 'index'));

            }

            }else{

             //$email = $userinfo['User']['email_id'];

            $email = $sponsor_email;

            $from ="booking@technocta.co.uk";

            $subject = "Booking Confirmation & Joining Instructions ".$course . " ".$course_date;

            App::import('Vendor', 'phpmailer', array(

                'file' => 'phpmailer/class.phpmailer.php'));

                    

            $message = "<p>Dear,

                 </p>

                 <p>Thank you for booking the above course with Techno CTA website.</p>

                 <p>Please find attached copy of the Terms and Conditions of booking and Joining Instructions for your attention.</p>

                 <p>Please quote your BOOKING ID reference when contacting Techno CTA would be helpful.</p>

                 <p>If you have any further questions, please do not hesitate to contact us on 0207 055 0877</p>

                 <p>Thanks & Regards,  </p>

                 <p>Techno CTA Team</p>";

            $to = $email;

            $mail = new PHPMailer();

            $mail->IsHTML(true);

            $mail->SetFrom($from, 'Techno CTA Team');

            $mail->AddReplyTo($from, "Techno CTA Team");

            $mail->AddCC('jyotik.sds@gmail.com');

            $mail->AddBCC($userinfo['User']['email_id']);

            $mail->Subject = $subject;

            $mail->Body = $message;

            $mail->addAttachment('TermsAndConditions.pdf');

            $mail->addAttachment($pdf);

            $mail->AddAddress(trim($email));

            if (!$mail->Send()) {

                echo $mail->ErrorInfo;

                 $this->redirect(array('controller' => 'homes', 'action' => 'index'));

            } else {

                $resultnew = "1";

                $this->Session->setFlash("Thank you for Booking. Please check your email . If you do not find the mail in inbox then please check in spam folder.", 'default', array(), 'form1');

               $this->redirect(array('controller' => 'homes', 'action' => 'index'));

            }

            }



        }else{



            if($user_type == 'User'){

            $email = $userinfo['User']['email_id'];

             // $email = "jyotik.sds@gmail.com";

             $from ="booking@technocta.co.uk";

            $subject = "Confirmation of Booking ".$course . " ".$course_date;

            App::import('Vendor', 'phpmailer', array(

                'file' => 'phpmailer/class.phpmailer.php'));

                    

            $message = "<p>Dear,

                 </p>

                 <p>Thank you for booking the above course with Techno CTA website.</p>

                 <p>48 hours prior to the course date you will receive a text reminder of the course on the mobile number you have provided at the time of booking.</p>

                 <p>If you have any further questions, please do not hesitate to contact us on 0207 055 0877</p>

                 <p>Thanks & Regards,  </p>

                 <p>Techno CTA Team</p>";

            $to = $email;

            $mail = new PHPMailer();

            $mail->IsHTML(true);

            $mail->SetFrom($from, 'Techno CTA Team');

            $mail->AddReplyTo($from, "Techno CTA Team");

            $mail->Subject = $subject;

            $mail->Body = $message;

            $mail->addAttachment('TermsAndConditions.pdf');

            // $mail_s->addAttachment($pdf);

            $mail->AddAddress(trim($email));

            if (!$mail->Send()) {

                echo $mail->ErrorInfo;

                 $this->redirect(array('controller' => 'homes', 'action' => 'index'));

            } else {

                $resultnew = "1";

                $this->Session->setFlash("Thank you for Booking. Please check your email . If you do not find the mail in inbox then please check in spam folder.", 'default', array(), 'form1');

               $this->redirect(array('controller' => 'homes', 'action' => 'index'));

            }



            }else{



             //$email = $userinfo['User']['email_id'];

            $email = $sponsor_email;

            $from ="booking@technocta.co.uk";

            $subject = "Confirmation of Booking ".$course . " ".$course_date;

            App::import('Vendor', 'phpmailer', array(

                'file' => 'phpmailer/class.phpmailer.php'));

                    

            $message = "<p>Dear,

                 </p>

                 <p>Thank you for booking the above course with Techno CTA website.</p>

                 <p>If you have any further questions, please do not hesitate to contact us on 0207 055 0877</p>

                  <p>Please quote your BOOKING ID reference when contacting Techno CTA would be helpful.</p>

                 <p>Thanks & Regards,  </p>

                 <p>Techno CTA Team</p>";

            $to = $email;

            $mail = new PHPMailer();

            $mail->IsHTML(true);

            $mail->SetFrom($from, 'Techno CTA Team');

            $mail->AddReplyTo($from, "Techno CTA Team");

            $mail->AddCC('jyotik.sds@gmail.com');

            $mail->AddBCC($userinfo['User']['email_id']);

            $mail->Subject = $subject;

            $mail->Body = $message;

            $mail->addAttachment('TermsAndConditions.pdf');

            // $mail_s->addAttachment($pdf);

            $mail->AddAddress(trim($email));

            if (!$mail->Send()) {

                echo $mail->ErrorInfo;

                 $this->redirect(array('controller' => 'homes', 'action' => 'index'));

            } else {

                $resultnew = "1";

                $this->Session->setFlash("Thank you for Booking. Please check your email . If you do not find the mail in inbox then please check in spam folder.", 'default', array(), 'form1');

               $this->redirect(array('controller' => 'homes', 'action' => 'index'));

            }

            }

        }



    }



    }	

}

