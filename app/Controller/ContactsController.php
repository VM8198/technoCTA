<?php
class ContactsController extends AppController {

    var $uses = array('Contact');
    var $components = array('Auth', 'Session', 'Email', 'RequestHandler');

    function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow('contact_us','contact_us1');
    }
    
    function contact_us(){
        $this->layout="Home";
       //pr($this->request->data); die();
		if(!empty($this->request->data)){
                   $name = $this->request->data['Contact']['name'];
                   $email1 = $this->request->data['Contact']['email'];
                   $phone = $this->request->data['Contact']['phone'];
                   $message = $this->request->data['Contact']['message'];
                   //pr(array($name,$email1,$phone,$message)); die();
					if($this->Contact->save($this->data)){
					$subject = "Contact Details";
					App::import('Vendor', 'phpmailer', array('file' => 'phpmailer/class.phpmailer.php'));
					$message = "
						 <p>Name: " . $name . "</p>
						 <p>Email: " . $email1 . "</p>                
						 <p>Phone Number: " . $phone . "</p>
						 <p>Message: " . $this->request->data['Contact']['message'] . "</p><br> 
						 <p> Thanks & Regards </p>" .$this->request->data['Contact']['name'];
					//$to = 'nitintom11@gmail.com';
          $to = 'geeteshwari.sds@gmail.com';
					$mail = new PHPMailer();
					$mail->IsHTML(true);
					$mail->SetFrom($to, 'Techno CTA');
					$mail->AddReplyTo($to, "Techno CTA");
					$mail->Subject = $subject;
					$mail->Body = $message;
					$mail->AddAddress(trim($to));
					if (!$mail->Send()) {
						echo $mail->ErrorInfo;
					} else {
						$resultnew = "1";
						$this->Session->setFlash('Thank you for contacting us , We will get back to you soon.', 'default', array('class' => 'success'));
						$this->redirect(array('controller' => 'contacts', 'action' => 'contact_us','#'=>'contact_id'));
					}
				}
		}
    }
     function contact_us1(){
        $this->layout="Home";
       // pr($this->request->data); die();
		if(!empty($this->request->data)){
                   $name = $this->request->data['Contact']['name'];
                   $email = $this->request->data['Contact']['email'];				   				   
                   $phone = $this->request->data['Contact']['phone'];
                   $message = $this->request->data['Contact']['message'];
                   //pr(array($name,$email,$message));                   die();
					if($this->Contact->save($this->data)){
					$subject = "Contact Details";
					App::import('Vendor', 'phpmailer', array(
					'file' => 'phpmailer/class.phpmailer.php'));
					$message = "
                  <p>Name: " . $name . "</p>
                  <p>Email: " . $email . "</p>   				  <p>Phone Number: " . $phone . "</p>
                  <p>Message: " . $this->request->data['Contact']['message'] . "</p><br>
				  <p> Thanks & Regards </p>" .$this->request->data['Contact']['name'];
                  //$to = 'nitintom11@gmail.com';
                   $to = 'geeteshwari.sds@gmail.com';
                  $mail = new PHPMailer();
                  $mail->IsHTML(true);
                  $mail->SetFrom($to, 'Techno CTA');
                  $mail->AddReplyTo($to, "Techno CTA");
                  $mail->Subject = $subject;
                  $mail->Body = $message;
                  $mail->AddAddress(trim($to));
                  if (!$mail->Send()) {
                echo $mail->ErrorInfo;
            } else {
                $resultnew = "1";
                $this->Session->setFlash('Thank you for contacting us , We will get back to you soon.', 'default', array('class' => 'success'));
                $this->redirect(array('controller' => 'homes', 'action' => 'index','#'=>'contact_id'));
            }
		}
                  
		}
    }
	
	 function admin_contactList(){
       $this->layout = "admin";
       $order = array('Contact.id'=>'DESC');
       $this->paginate = array(
            'order' => $order,
           
            'limit' => 10
        );
        $contactList = $this->paginate('Contact');
		$count = $this->Contact->find('count');
		//pr($count);die;
        $this->set(compact('contactList','count'));
    }
    
    function admin_contactView($id=NULL){
        $this->layout = "admin";
        $contactDetail = $this->Contact->find('first',array('conditions'=>array('Contact.id'=>$id)));
        $this->set(compact('contactDetail'));
    }
	 function admin_delete($id = NULL) {
        $this->autoRender = false;
        if ($this->Contact->delete($id)) {
            $this->Session->setFlash('Contact details has been deleted successfully.');
            $this->redirect(array('controller' => 'contacts', 'action' => 'admin_contactList'));
        }
    }
}