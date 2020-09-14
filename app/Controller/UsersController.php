
<?php
// session_start();
class UsersController extends AppController {
	var $uses = array('User','Course','Booking','TransactionLog','Bookinglog','SponsorList','Coursedetail');
	var $components = array('Auth', 'Session', 'Email', 'RequestHandler');
	 var $helpers = array('Html', 'Form','Csv'); 
	function beforeFilter() {
		$this->Auth->allow('admin_login','companyregister','login','individualregister','logout','checkEmail','resetPassword','setForgotPassword','individualbooking','individualnonrail','companyrailbooking','companynonrail','verify','dashboard','profile','companyprofile','changepassword','login','agreementEmail','electricSign','sponserlist','sendsmslocaltext','sendsms_byspring','sendSMS','sponsorMail');
	}
	function admin_login() {

		// pr($_SESSION); die();

		$this->layout = 'admin_layout';
		if (!empty($this->request->data)) {
			if ($this->Auth->login()) {
		// die("heelo");

				// if ($_SESSION['Auth']['User']['user_type'] == "admin") {
					$this->redirect(array('controller' => 'users', 'action' => 'admin_dashboard'));
				// }
			} else {
				$this->Session->setFlash("<font size='3' color='red'>please enter valid email_id and password </font>");
			}
		}
	}
	
	function sendsmslocaltext(){
		$this->autoRender = false;
		
	/* 	$apiKey = urlencode('hCaJW+PPAEg-p8ETC8xgh9c91jsX40gDn2w5yFh3BO');
	
	// Message details
	$numbers = array(918869843679);
	$sender = urlencode('Jims Autos');
	$message = rawurlencode('This is your message');
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.txtlocal.com/send/');
	curl_setopt($ch, CURLOPT_POST, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
		 */
		
		$username = "ruby13@technocta.co.uk";
		$hash = "79b84c60e892a073abcc3f4d1680608c9e9b5059";

		// Config variables. Consult http://api.txtlocal.com/docs for more info.
		$test = "0";

		// Data for text message. This is the text message data.
		$sender = "API Test"; // This is who the message appears to be from.
		$numbers = "+918869843679"; // A single number or a comma-seperated list of numbers
		$message = "This is a test message from the php API Script.";
		// 612 chars or less
		// A single number or a comma-seperated list of numbers
		$message = urlencode($message);
		$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
		$ch = curl_init('https://api.txtlocal.com/send/');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch); // This is the result from the API
		curl_close($ch);
		echo "<pre>";
		print_r($result);exit;
	} 
	
	/* function sendsms_byspring(){
		$this->autoRender = false;
		$mobileno =8869843679;
		$message = urlencode('Hi, this is a test message');
		$sender = 'SEDEMO'; 
		$apikey = '6ubqq88255zc9v0071n9856gxsl09p10i';
		  $baseurl = 'https://instantalerts.co/api/web/send?apikey='.$apikey;
		$url = $baseurl.'&sender='.$sender.'&to='.$mobileno.'&message='.$message;    
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
	    echo $response;
		// Use file get contents when CURL is not installed on server.
		if(!$response){
			$response = file_get_contents($url);
		}
	} */
	
	/* function sendSMS($conten){
		$ch = curl_init('https://api.smsbroadcast.co.uk/api-adv.php');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec ($ch);
        curl_close ($ch);
        return $output;    

	}
	 */
	function admin_logout() {
		if ($this->Auth->logout()) {
			$this->redirect(array("controller" => 'users', "action" => "admin_login"));
		}
	}
	function admin_dashboard() {
		$this->layout = 'admin';
		$count = $this->User->find('count', array('conditions' => array('User.user_type' => 'User')));
		$order = array('User.id'=>'DESC');
		$conditions = array('User.user_type' => 'User');
		$this->paginate = array(
			'order' => $order,
			'conditions' => $conditions,
			'limit' => 4
		);
		$user = $this->paginate('User');
		
		$order = array('User.id'=>'DESC');
		$conditions = array('User.user_type' => 'Company');
		$this->paginate = array(
			'order' => $order,
			'conditions' => $conditions,
			'limit' => 4
		);
		$user1 = $this->paginate('User');
		
		$course = $this->Course->find('count');
		$order = array('Course.id'=>'DESC');
		  $this->paginate = array(
			'order' => $order,
			'limit' => 4
		);
		$courseList = $this->paginate('Course');
		$bookcount = $this->TransactionLog->find('count',array('conditions' => array('TransactionLog.status' => 'success')));
		
		$conditions =  array('TransactionLog.status' => 'success');
		$order = array('TransactionLog.id'=>'DESC');
		  $this->paginate = array(
			'conditions' => $conditions,
			'order' => $order,
			'limit' => 4
		);
		$booking = $this->paginate('TransactionLog');
		
		$this->set(compact('count','course','user','courseList','booking','bookcount','user1'));
		
	}

	function admin_userexport(){
		$this->layout = 'admin';
		$getValue = array();
        $getvalue = $_GET;
		$filterval = array_filter($_GET);
		$result = array();
		foreach ($filterval as $key => $val) {
            if ($key == "user") {
                $result['User.first_name LIKE'] = "%".$val."%";
				$result['User.user_type'] = 'User';
            }else{
			$result['email_id LIKE'] = $val."%";
				$result['User.user_type'] = 'User';
			}
		}
		if (!empty($filterval)) {
            $conditions = $result;
        } else {
			$conditions = array('User.user_type' => 'User');
        }
        $order = array('User.id' => 'DESC');
		// $this->paginate = array(
		// 	'order' => $order,
		// 	'conditions' => $conditions,	
		// );
		// $userList = $this->paginate('User');
		$userList = $this->User->find('all', array('conditions' => $conditions,'order' =>array('User.id' => 'DESC')));
		//pr($userList);die();
	

   $this->set(compact('userList'));

    // $this->layout = null;
    // $this->autoLayout = false;
    // Configure::write('debug', '0');
	}

	function admin_cuserexport(){
			$this->layout = 'admin';
		$getValue = array();
        $getvalue = $_GET;
		$filterval = array_filter($_GET);
		//pr($filterval); die;
		$result = array();
		foreach ($filterval as $key => $val) {
            if ($key == "company") {
                $result['company LIKE'] = "%".$val."%";
				$result['User.user_type'] = 'Company';
            }elseif ($key == "email") {
            	$result['email_id LIKE'] = $val."%";
            	$result['User.user_type'] = 'Company';
            }else{
				$result['companyemail LIKE'] = $val."%";
				//$result['email_id LIKE'] = $val."%";
				$result['User.user_type'] = 'Company';
			}
		}
		//pr($result); die;
		if (!empty($filterval)) {
            $conditions = $result;
        } else {
			$conditions = array('User.user_type' => 'Company');
        }
        $order = array('User.id' => 'DESC');
		// $this->paginate = array(
		// 	'order' => $order,
		// 	'conditions' => $conditions,	
		// );
		// $userList = $this->paginate('User');
		$userList = $this->User->find('all', array('conditions' => $conditions,'order' =>array('User.id' => 'DESC')));
		//pr($userList);die();
	 $this->set(compact('userList'));
		
	}

	function admin_userListing() {
		$this->layout = 'admin';
		$order = array('User.id' => 'DESC');
		$this->User->virtualFields = array(
        'user' => "CONCAT(User.first_name, ' ', User.last_name)");
		$getValue = array();
        $getvalue = $_GET;
		$filterval = array_filter($_GET);
		$result = array();
		foreach ($filterval as $key => $val) {
            if ($key == "user") {
                $result['user LIKE'] = "%".$val."%";
				$result['User.user_type'] = 'User';
            }else{
			$result['email_id LIKE'] = $val."%";
				$result['User.user_type'] = 'User';
			}
		}
		if (!empty($filterval)) {
            $conditions = $result;
        } else {
			$conditions = array('User.user_type' => 'User');
        }
		//pr($getvalue); die;
		$this->paginate = array(
			'order' => $order,
			'conditions' => $conditions,
			'limit' => 20
		);
		$userList = $this->paginate('User');
		$count = $this->User->find('count', array('conditions' => $conditions));
		//pr($userList); die;
		$this->set(compact('userList', 'getvalue', 'count','name'));
	}
	function admin_companyListing(){
		$this->layout = 'admin';
		$order = array('User.id' => 'DESC');
		$getValue = array();
        $getvalue = $_GET;
		$filterval = array_filter($_GET);
		//pr($filterval); die;
		$result = array();
		foreach ($filterval as $key => $val) {
            if ($key == "company") {
                $result['company LIKE'] = "%".$val."%";
				$result['User.user_type'] = 'Company';
            }elseif ($key == "email") {
            	$result['email_id LIKE'] = $val."%";
            	$result['User.user_type'] = 'Company';
            }else{
				$result['companyemail LIKE'] = $val."%";
				//$result['email_id LIKE'] = $val."%";
				$result['User.user_type'] = 'Company';
			}
		}
		//pr($result); die;
		if (!empty($filterval)) {
            $conditions = $result;
        } else {
			$conditions = array('User.user_type' => 'Company');
        }
		$this->paginate = array(
			'order' => $order,
			'conditions' => $conditions,
			'limit' => 20
		);
		$userList = $this->paginate('User');
		$count = $this->User->find('count', array('conditions' => $conditions));
		//pr($userList); //die;
		$this->set(compact('userList', 'getvalue', 'count'));
	}
	function admin_active($id = NULL) {
		if ($this->User->updateAll(array('User.is_active' => 1), array('User.id' => $id))) {
			$this->Session->setFlash('User has been activated');
			$this->redirect($this->referer());
		}
	}
	function admin_deactive($id = NULL) {
		if ($this->User->updateAll(array('User.is_active' => 0), array('User.id' => $id))) {
			$this->Session->setFlash('User has been deactivated');
			$this->redirect($this->referer());
		}
	}
	function admin_activeCompany($id = NULL) {
		if ($this->User->updateAll(array('User.is_active' => 1), array('User.id' => $id))) {
			$this->Session->setFlash('Company has been activated');
			$this->redirect($this->referer());
		}
	}
	function admin_deactiveCompany($id = NULL) {
		if ($this->User->updateAll(array('User.is_active' => 0), array('User.id' => $id))) {
			$this->Session->setFlash('Company has been deactivated');
			$this->redirect($this->referer());
		}
	}
	function admin_changePassword() {
		$this->layout = 'admin';
		$user_id = $this->Auth->user('id');
		if (!empty($this->request->data)) {
			$oldpassword = $this->Auth->password($this->request->data['User']['old_password']);
			$newpassword = $this->request->data['User']['new_password'];
			$count = $this->User->find('count', array(
				'conditions' => array(
					'User.password' => $oldpassword,
					'User.id' => $user_id
				)
			));
			if ($count > 0) {
				$datapass['User']['password'] = $this->Auth->password($newpassword);
				$this->User->id = $user_id;
				$this->User->save($datapass);
				$this->Session->setFlash('You have successfully changed your password.');
				$this->redirect(array('controller' => 'users', 'action' => 'admin_changePassword'));
			} else {
				$this->Session->setFlash('Please enter correct old password.');
			}
		}
	}
	function admin_viewUser($id = NULL) {
		$this->layout = "admin";
		$userDetail = $this->User->find('first', array('conditions' => array('User.id' => $id)));
		//pr($userDetail); die;
		$this->set(compact('userDetail'));
	}
	function admin_viewCompany($id = NULL) {
		$this->layout = "admin";
		$userDetail = $this->User->find('first', array('conditions' => array('User.id' => $id)));
		$name = $userDetail['User']['first_name'];
		$lastname = $userDetail['User']['last_name'];
		$name1 = explode(",", $name);
		$name2 = explode(",", $lastname);
		$this->set(compact('userDetail','name1','name2'));
	}
	function admin_deleteUser($id = NULL) {
		$this->autoRender = FALSE;
		if ($this->User->delete($id)) {
			$this->Session->setFlash('You have successfully deleted user');
			$this->redirect(array('controller' => 'users', 'action' => 'admin_userListing'));
		}
	}
	
	function admin_deleteCompany($id = NULL) {
		$this->autoRender = FALSE;
		if ($this->User->delete($id)) {
			$this->Session->setFlash('You have successfully deleted company');
			$this->redirect(array('controller' => 'users', 'action' => 'admin_companyListing'));
		}
	}
	
	function companyregister(){
		$this->autoRender = false;
		$forgotRandStr = $this->getrandomstr();
		if (!empty($this->request->data)) {
			//pr($this->request->data); die;
			$this->request->data['User']['company'] = $this->request->data['User']['company'];
			$this->request->data['User']['company_position'] = $this->request->data['User']['company_position'];
			$this->request->data['User']['first_name'] = $this->request->data['User']['first_name'];
			$this->request->data['User']['last_name'] = $this->request->data['User']['last_name'];
			$this->request->data['User']['email_id'] = $this->request->data['User']['email_id'];
			$this->request->data['User']['username'] = $this->request->data['User']['email_id'];
			$this->request->data['User']['phone'] = $this->request->data['User']['phone'];
			$this->request->data['User']['user_type'] = 'Company';
			$this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
			
			if ($this->User->save($this->data)) {
                $id = $this->User->getLastInsertID();
				$name = $this->request->data['User']['first_name'];
				$company = $this->request->data['User']['company'];
				$email = $this->request->data['User']['email_id'];
				$subject = "Techno CTA Registration Mail";
				// $message = 'Dear '. $name .'<br><br> '.'You have successfully registered on the website under '.$company.' Company.'.'<br><br>'.'Regards'.'<br>'.'Techno CTA Team';
				
				$message = "Dear <span style='color:#666666'>" . $company . "</span>,<br/><br/>";
				$message .= "You have successfully registered with Techno CTA website.<br/>";
				$message .= "<p>Activate your account by clicking on the below url:</p> <br/>";
				$message .= "<a href=" . SITEPATH . "users/verify/" . $forgotRandStr . "/" . ">Click Here</a><br/><br/>";
				$message .= "<br/>Thanks & Regards, <br/>Techno CTA Team";
				
				App::import('Vendor', 'phpmailer', array(
				'file' => 'phpmailer/class.phpmailer.php'));
				$message = $message;
				//$to = 'keshav.rawat7@hotmail.com';
				$to = 'booking@technocta.co.uk';
				$mail = new PHPMailer();
				$mail->IsHTML(true);
				$mail->SetFrom($to, 'Techno CTA');
				$mail->AddReplyTo($to, "Techno CTA");
				$mail->Subject = $subject; 
				$mail->Body = $message;
				$mail->AddAddress(trim($email));
				
				if (!$mail->Send()) {
					echo $mail->ErrorInfo;
					$datafor['User']['random_str'] = $forgotRandStr;
					$this->User->id = $id;
					//pr($id); die;
					if ($this->User->save($datafor)) {
						$id = $this->User->getLastInsertID();
						 $this->Session->setFlash("Thank you for registration. Please check your email to activate your account. If you do not find the mail in inbox then please check in spam folder.", 'default', array(), 'form1');
						$this->redirect(array('controller' => 'homes', 'action' => 'index'));
					}else {
						  $this->Session->setFlash("Some thing went wrong.", 'default', array(), 'form1');
                        $this->redirect(array('controller' => 'homes', 'action' => 'index'));
					}
				} else {
					$resultnew = "1";
                    $datafor['User']['random_str'] = $forgotRandStr;
                    $this->User->id = $id;
					//pr($id); die;
                    if ($this->User->save($datafor)) {
                         $this->Session->setFlash("Thank you for registration. Please check your email to activate your account. If you do not find the mail in inbox then please check in spam folder.", 'default', array(), 'form1');
                        $this->redirect(array('controller' => 'homes', 'action' => 'index'));
                    } else {
                        $this->Session->setFlash("Some thing went wrong.", 'default', array(), 'form1');
                        $this->redirect(array('controller' => 'homes', 'action' => 'index'));
                    }
				}
			}
		}	
	}
	 
	function individualregister(){
		$this->autoRender = false;
		$forgotRandStr = $this->getrandomstr();
		//pr($forgotRandStr) ; die;
		if (!empty($this->request->data)) {
			//pr($this->request->data); die;
			$this->request->data['User']['first_name'] = $this->request->data['User']['first_name'];
			$this->request->data['User']['last_name'] = $this->request->data['User']['last_name'];
			$this->request->data['User']['email_id'] = $this->request->data['User']['email_id'];
			$this->request->data['User']['username'] = $this->request->data['User']['email_id'];
			$this->request->data['User']['phone'] = $this->request->data['User']['phone'];
			$this->request->data['User']['user_type'] = 'User';
			$this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
			
			if ($this->User->save($this->data)) {
                $id = $this->User->getLastInsertID();
				//pr($id); die;
				$name = $this->request->data['User']['first_name'];
				$email = $this->request->data['User']['email_id'];
				$subject = "Techno CTA Registration Mail";
			
				$message = "Dear <span style='color:#666666'>" . ucfirst($name) . "</span>,<br/><br/>";
				$message .= "You have successfully registered with Techno CTA website.<br/>";
				$message .= "<p>Activate your account by clicking on the below url:</p> <br/>";
				$message .= "<a href=" . SITEPATH . "users/verify/" . $forgotRandStr . "/" . ">Click Here</a><br/><br/>";
				$message .= "<br/>Thanks & Regards, <br/>Techno CTA Team";
			
			
				App::import('Vendor', 'phpmailer', array(
				'file' => 'phpmailer/class.phpmailer.php'));
				$message = $message;
				// $to = 'keshav.rawat7@hotmail.com';
					$to = 'booking@technocta.co.uk';
				
				$mail = new PHPMailer();
				$mail->IsHTML(true);
				$mail->SetFrom($to, 'Techno CTA');
				$mail->AddReplyTo($to, "Techno CTA");
				$mail->Subject = $subject;
				$mail->Body = $message;
				$mail->AddAddress(trim($email));
				
				if (!$mail->Send()) {
					echo $mail->ErrorInfo;
					$datafor['User']['random_str'] = $forgotRandStr;
					$this->User->id = $id;
					//pr($id); die;
					if ($this->User->save($datafor)) {
						$id = $this->User->getLastInsertID();
						 $this->Session->setFlash("Thank you for registration. Please check your email to activate your account. If you do not find the mail in inbox then please check in spam folder.", 'default', array(), 'form1');
						$this->redirect(array('controller' => 'homes', 'action' => 'index'));
					}else {
						  $this->Session->setFlash("Some thing went wrong.", 'default', array(), 'form1');
                        $this->redirect(array('controller' => 'homes', 'action' => 'index'));
					}
				} else {
					$resultnew = "1";
                    $datafor['User']['random_str'] = $forgotRandStr;
                    $this->User->id = $id;
					//pr($id); die;
                    if ($this->User->save($datafor)) {
                    	 $this->Session->setFlash("Thank you for registration. Please check your email to activate your account. If you do not find the mail in inbox then please check in spam folder.", 'default', array(), 'form1');
                       // $this->Session->setFlash("<script>alert('Thank you for registration. Please check your email to activate your account. If you do not find the mail in inbox then please check in spam folder.');</script>");
                        $this->redirect(array('controller' => 'homes', 'action' => 'index'));
                    } else {
                    	 $this->Session->setFlash("Some thing went wrong.", 'default', array(), 'form1');
                        //$this->Session->setFlash("<script>alert('Some thing went wrong.');</script>");
                        $this->redirect(array('controller' => 'homes', 'action' => 'index'));
                    }
				}
			}
		}
	}
    function verify($forgotRandStr = null) {
    	//echo $forgotRandStr; die;
        $count = $this->User->find('count', array(
            'conditions' => array(
                'User.random_str' => $forgotRandStr,
                'User.is_active' => '0'
            )
        ));
        $userDetails = $this->User->find('first', array(
            'conditions' => array(
                'User.random_str' => $forgotRandStr,
            )
        ));
        if ($count > 0) {
            $data['User']['is_active'] = '0';
            $id = $this->User->id = $userDetails['User']['id'];
			//pr($id); die;
            if ($this->User->save($data)) {
				if ($this->User->updateAll(array('User.is_active' => 1), array('User.id' => $id))) {
                //$this->Session->setFlash("<script>alert('Your account has been activated. Please log in.');</script>");
                $this->Session->setFlash("Your account has been activated. Please log in.", 'default', array(), 'form1');
                $this->redirect(array('controller' => 'homes', 'action' => 'index'));
				}
            }
        } else {
        	 $this->Session->setFlash("You have already activated via email,Please log in.", 'default', array(), 'form1');
            //$this->Session->setFlash("<script>alert('You have already activated via email,Please log in.');</script>");
            $this->redirect(array('controller' => 'homes', 'action' => 'index'));
        }
    }
	
	function login() {
		$this->autoRender = false;
		$username = $this->data['email_id'];
		$password =  $this->Auth->password($this->data['password']);
	 //  pr($username);
		// pr($password); die; 
		$userDetail = $this->User->find('first', array('conditions' => array('User.username' => $username,'User.password'=>$password)));
		if(empty($userDetail)){
			echo "Empty";
		}
		// echo $userDetail['User'];
		$userDetail['User']['first_name'] = $username;
		$userDetail['User']['is_active'] = 1;
		// $userDetail['User']['user_type'] == "User";
		// $name = $userDetail['User']['first_name']. " " .$userDetail['User']['last_name'];
		$name = $userDetail['User']['first_name'];
		echo "name ===>> ".$username;
		$companyName = explode(",",$name);
		$name = $companyName[0];
		if (!empty($this->request->data)) {
			if(($userDetail['User']['is_active'] == 0 )){
				echo 0;
			}else{
				if (($userDetail['User']['is_active'] == 1 )||($userDetail['User']['is_active'] == 1 )) {
					if ($this->Auth->login($userDetail['User'])) {
						if (!empty($this->request->data['User']['remember'])) {
                        if ($this->request->data['User']['remember'] == 1) {
                            setcookie('username', $_SESSION['Auth']['User']['username'], time() + 60 * 60 * 24 * 365, "/");
                            setcookie('password', $this->request->data['User']['password'], time() + 60 * 60 * 24 * 365, "/");
                        }
                    }else {
                    
                    } 

                    
					$this->Session->setFlash( $name ." have successfully logged in", 'default', array(), 'form1');
						echo 2;
					
				
					
					} else {
					}
				}else {
					echo 1;
				}
			}
		}
	}
	 function checkEmail(){
		$this->autoRender = false;
		$email = $this->request->data['User']['email_id'];
		$count = $this->User->find('count', array('conditions' => array('User.email_id' => $email)));
		if ($count == 0) {
			echo "true";
			exit;
		} else {
			echo "false";
			exit;
		}
	}
	
	 function logout() {
		if ($this->Auth->logout()) {
			$this->Session->setFlash("You have successfully logged out", 'default', array(), 'form1');
		   $this->redirect(array("controller" => 'homes', "action" => "index"));
		}
	}
	  function resetPassword() {
		 
		 
		$email = $this->request->data['email'];
		$userCount = $this->User->find('count', array(
			'conditions' => array(
				'User.email_id' => $email
			)
		));
		 if ($userCount == 0) {
            $this->Session->setFlash('Please enter correct email id.', 'default', array('class' => 'errormessage'));
            $this->redirect($this->referer());
        } else {
            $userinfo = $this->User->find('first', array('conditions' => array('User.email_id' => $email)));
            $Name = $userinfo['User']['first_name'] . "" . $userinfo['User']['last_name'];
        }
		 $forgotRandStr = $this->getrandomstr();
		$from = $email;
		$subject = "Password Request";
		App::import('Vendor', 'phpmailer', array(
			'file' => 'phpmailer/class.phpmailer.php'));
		$message = "<p>Dear '" . $Name . "',
				 </p>
				 <p>Please<a href=" . SITEPATH . "users/setForgotPassword" . "/" . $forgotRandStr . "> Click Here</a> to Change your Password  </p>
				 <p>For any assistance or queries you can contact  info@technocta.co.uk  or contact tel:  0207 055 0877  </p>
				 <p>Regards,  </p>
				 <p>Techno CTA Team</p>";
		//$to = 'geeteshwari.sds@gmail.com';
		$to = 'booking@technocta.co.uk';			 
		$mail = new PHPMailer();
		$mail->IsHTML(true);
		$mail->SetFrom($to, 'Techno CTA Team');
		$mail->AddReplyTo($to, "Techno CTA Team");
		$mail->Subject = $subject;
		$mail->Body = $message;
		$mail->AddAddress(trim($email));
		if (!$mail->Send()) {
			echo $mail->ErrorInfo;
		} else {
			$resultnew = "1";
		}
		if ($resultnew) {
			$userDetails = $this->User->find('first', array(
				'conditions' => array(
					'User.email_id' => $email
				)
			));
			$datafor['User']['forgot_str'] = $forgotRandStr;
			$this->User->id = $userDetails['User']['id'];
			$this->User->save($datafor);
			//print_r("Please check your Email to reset your password");die;
			echo 1;
			exit;
			} else {
			//print_r("Incorrect email please try again.");die;
			echo 2;
			exit;
		}
	}
	function setForgotPassword($forgotRandStr = NULL) {
		 $this->layout = "Home";
		$userDetails = $this->User->find('first', array(
			'conditions' => array(
				'User.forgot_str' => $forgotRandStr
			)
		));
		$this->set(compact('userDetails'));
		if (!empty($this->request->data)) {
			$pass = $this->Auth->password($this->request->data['User']['password']);
			$id = $this->request->data['User']['id'];
			$rand = "";
			$updated = $this->User->updateAll(array('User.password' => "'$pass'"), array('User.id' => $id));
			if ($updated) {
				$this->Session->setFlash('Password has been changed successfully', 'default', array(),'form1');
				$this->redirect(array("controller" => 'homes', "action" => "index"));
			} else {
				$this->Session->setFlash('Password is not changed .Please try again.', 'default', array(),'form1');
				$this->redirect(array("controller" => 'homes', "action" => "index"));
			}
		}
	}
	function getrandomstr() {
		$length = 10;
		$characters = "0123456789abcdefghijklmnopqrstuvwxyz";
		$string = "";
		for ($p = 0; $p < $length; $p++) {
			@$string .= $characters[mt_rand(0, strlen($characters))];
		}
		return $string;
	}  
	
	function individualbooking(){
		$this->autoRender = false;
		$id = $this->Auth->User('id');
		//pr($this->request->data);die;
		if (!empty($this->request->data)) {
			$comname = $this->request->data['User']['sponsor_company'];
			if (in_array("Other", $comname)){
			$com_name = $comname[1];
			}else{
			$com_name = implode(" ",$this->request->data['User']['sponsor_company']);	
			}
			//pr($com_name); die;
			if(!empty($id)&&($_SESSION['Auth']['User']['user_type']=="User")){
				$this->User->id = $id;
				$this->request->data['User']['sponsor_name']=$this->request->data['User']['sponsor_name'];
				$this->request->data['User']['sponsor_company']=$com_name;
				$this->request->data['User']['sponsor_phone']=$this->request->data['User']['sponsor_phone'];
				//pr($this->request->data['User']['sponsor_phone']);die;
				if ($this->User->save($this->data)) {
					$this->request->data['Bookinglog']['course_id']=$this->request->data['User']['course_id'];
					$this->request->data['Bookinglog']['course_name']=$this->request->data['User']['course_name']; 
					$this->request->data['Bookinglog']['course_date']=$this->request->data['User']['start_date'];
					$this->request->data['Bookinglog']['start_time']=$this->request->data['User']['start_time'];
					$this->request->data['Bookinglog']['end_time']=$this->request->data['User']['end_time'];
					$this->request->data['Bookinglog']['price_inc_vat']=$this->request->data['User']['price_incvat'];
					$this->request->data['Bookinglog']['email_id']=$this->request->data['User']['email_id'];
					$this->request->data['Bookinglog']['sponsor_name']=$this->request->data['User']['sponsor_name'];
				$this->request->data['Bookinglog']['sponsor_company']= $com_name;
				$this->request->data['Bookinglog']['sponsor_phone']=$this->request->data['User']['sponsor_phone'];
					$this->request->data['Bookinglog']['companyemail']=$this->request->data['User']['companyemail'];
					$this->request->data['Bookinglog']['user_id']=$this->User->id;
					$this->Bookinglog->save($this->data);

					$this->TransactionLog->save(array(
												    'user_id' => $this->User->id,
												    'course_id' => $this->request->data['User']['course_id'],
												));

					$lastid = $this->Bookinglog->getLastInsertID();
					//$this->Session->setFlash('Thank you for registration.');
					$this->redirect(array('controller' => 'courses', 'action' => 'booking_details',"?" => array(
              'id'=>$lastid
              )));
				}
			}
			
		}
	}
	
	function companyrailbooking(){
		$this->autoRender = false; 
		$id = $this->Auth->User('id');
		//pr($this->request->data); die;
		if (!empty($this->request->data)) {
			
			$comname = $this->request->data['User']['sponsor_company'];
			if (in_array("Other", $comname)){
			$com_name = $comname[1];
			}else{
			$com_name = implode(" ",$this->request->data['User']['sponsor_company']);	
			}
			//pr($com_name); die;
			if(!empty($id)&&($_SESSION['Auth']['User']['user_type']=="Company")){
				$this->User->id = $id;
				$firstname =$this->request->data['first_name'];
				$firstname1 = implode(",", $firstname);
				
				$lastname = $this->request->data['last_name'];
				$lastname1 =implode(",", $lastname);
				$sentinel = $this->request->data['sentinel'];
				$sentinel1 = implode(",",$sentinel);
				$this->request->data['User']['first_name'] = $firstname1;
				$this->request->data['User']['last_name'] = $lastname1;
				$this->request->data['User']['sentinel'] = $sentinel1;
				$this->request->data['User']['sponsor_company']=$com_name;
				//pr($this->data); die;
					if ($this->User->save($this->data)) {
					$this->request->data['Bookinglog']['course_id']=$this->request->data['User']['course_id'];
					$this->request->data['Bookinglog']['course_name']=$this->request->data['User']['course_name']; 
					$this->request->data['Bookinglog']['course_date']=$this->request->data['User']['start_date'];
					$this->request->data['Bookinglog']['start_time']=$this->request->data['User']['start_time'];
					$this->request->data['Bookinglog']['end_time']=$this->request->data['User']['end_time'];
					$this->request->data['Bookinglog']['price_inc_vat']=$this->request->data['User']['price_incvat'];
					$this->request->data['Bookinglog']['sponsor_name']=$this->request->data['User']['sponsor_name'];
					$this->request->data['Bookinglog']['sponsor_company']=$com_name;
					$this->request->data['Bookinglog']['sponsor_phone']=$this->request->data['User']['sponsor_phone'];
					$this->request->data['Bookinglog']['companyemail']=$this->request->data['User']['companyemail'];
					$this->request->data['Bookinglog']['companysentinel']=$sentinel1;
					$this->request->data['Bookinglog']['user_id']=$this->User->id;
					$this->Bookinglog->save($this->data);
					$lastid = $this->Bookinglog->getLastInsertID();
					$this->TransactionLog->save(array(
												    'user_id' => $this->User->id,
												    'course_id' => $this->request->data['User']['course_id'],
												));
						//$this->Session->setFlash('Thank you for registration.');
						$this->redirect(array('controller' => 'homes', 'action' => 'sign',"?" => array(
              'id'=>$lastid
              )));
					}
			}
		}
	}
	
	function individualnonrail(){
		$this->autoRender = false;
		$id = $this->Auth->User('id'); 
		if (!empty($this->request->data)) {
			$this->User->id = $id;
			$this->request->data['Bookinglog']['course_id']=$this->request->data['User']['course_id'];
					$this->request->data['Bookinglog']['course_name']=$this->request->data['User']['course_name']; 
					$this->request->data['Bookinglog']['course_date']=$this->request->data['User']['start_date'];
					$this->request->data['Bookinglog']['start_time']=$this->request->data['User']['start_time'];
					$this->request->data['Bookinglog']['end_time']=$this->request->data['User']['end_time'];
					$this->request->data['Bookinglog']['price_inc_vat']=$this->request->data['User']['price_incvat'];
					$this->request->data['Bookinglog']['email_id']=$this->request->data['User']['email_id'];
					$this->request->data['Bookinglog']['user_id']=$this->User->id;
					//pr($this->request->data); die;
					$this->Bookinglog->save($this->data);
					$lastid = $this->Bookinglog->getLastInsertID();
			if(!empty($id)&&($_SESSION['Auth']['User']['user_type']=="User")){
				//$this->Session->setFlash('Thank you for registration.');
				$this->redirect(array('controller' => 'courses', 'action' => 'booking_details',"?" => array(
              'id'=>$lastid
              )));	
			}
			
		}
	}
	
	function companynonrail(){
		$this->autoRender = false;
		$id = $this->Auth->User('id');
		//pr($this->request->data); die;
		if (!empty($this->request->data)) {
			if(!empty($id)&&($_SESSION['Auth']['User']['user_type']=="Company")){
				$this->User->id = $id;
				$firstname =$this->request->data['first_name'];
				$firstname1 = implode(",", $firstname);
				$lastname = $this->request->data['last_name'];
				$lastname1 =implode(",", $lastname);
				//pr(array($firstname1,$lastname1)); die;
				$this->request->data['User']['first_name'] = $firstname1;
				$this->request->data['User']['last_name'] = $lastname1;
				$this->request->data['User']['sentinel'] = $sentinel1;
				if ($this->User->save($this->data)) {
					$this->request->data['Bookinglog']['course_id']=$this->request->data['User']['course_id'];
					$this->request->data['Bookinglog']['course_name']=$this->request->data['User']['course_name']; 
					$this->request->data['Bookinglog']['course_date']=$this->request->data['User']['start_date'];
					$this->request->data['Bookinglog']['start_time']=$this->request->data['User']['start_time'];
					$this->request->data['Bookinglog']['end_time']=$this->request->data['User']['end_time'];
					$this->request->data['Bookinglog']['price_inc_vat']=$this->request->data['User']['price_incvat'];
					$this->request->data['Bookinglog']['companyemail']=$this->request->data['User']['companyemail'];
					$this->request->data['Bookinglog']['user_id']=$this->User->id;
					//pr($this->request->data); die;
					$this->Bookinglog->save($this->data);
					$lastid = $this->Bookinglog->getLastInsertID();
					//$this->Session->setFlash('Thank you for registration.');
					$this->redirect(array('controller' => 'homes', 'action' => 'sign',"?" => array(
              'id'=>$lastid
              )));	
				}
			}
		}
	}
	
	function profile(){
		$this->layout="Home";
		$user_id = $this->Auth->user('id');
		$user = $this->User->find('first', array('conditions' => array('User.id' => $user_id)));
		$this->set(compact('user'));
		//pr($this->request->data); die;
		if (!empty($this->request->data)) {
			if(!empty($user_id)&&($_SESSION['Auth']['User']['user_type']=="User")){
				$this->User->id = $user_id;
				//pr($user_id); die;
				if ($this->User->save($this->data)) {
					$this->Session->setFlash('You have successfully updated your profile.','default', array(), 'form1');
					$this->redirect(array('controller' => 'users', 'action' => 'profile'));
				}
			}
			
		}
	}
	
	function companyprofile(){
		$this->layout="Home";
		$user_id = $this->Auth->user('id');
		//pr($this->request->data); die;
		$user = $this->User->find('first', array('conditions' => array('User.id' => $user_id)));
		//pr($user); die;
		$this->set(compact('user'));
		if (!empty($this->request->data)) {
			if(!empty($user_id)&&($_SESSION['Auth']['User']['user_type']=="Company")){
				$this->User->id = $user_id;
				//pr($user_id); die;
				if ($this->User->save($this->data)) {
					$this->Session->setFlash('You have successfully updated your profile.' ,'default', array(), 'form1');
					$this->redirect(array('controller' => 'users', 'action' => 'companyprofile'));
				}
			}
			
		}
	}
	
	function changepassword(){
		$this->layout="Home";
		$user_id = $this->Auth->user('id');
		if (!empty($this->request->data)) {
			$oldpassword = $this->Auth->password($this->request->data['User']['old_password']);
			$newpassword = $this->request->data['User']['new_password'];
			$count = $this->User->find('count', array(
				'conditions' => array(
					'User.password' => $oldpassword,
					'User.id' => $user_id
				)
			));
			if ($count > 0) {
				$datapass['User']['password'] = $this->Auth->password($newpassword);
				$this->User->id = $user_id;
				$this->User->save($datapass);
				$this->Session->setFlash('You have successfully changed your password.' ,'default', array(), 'form1');
				$this->redirect(array('controller' => 'users', 'action' => 'profile'));
			} else {
				$this->Session->setFlash('Please enter correct old password.','default', array(), 'form1');
				$this->redirect(array('controller' => 'users', 'action' => 'profile'));
			}
		}
	}
	
	public function agreementEmail() {
        $this->autoRender = false;
		$transaction = $this->TransactionLog->find('first',array('order'=>'TransactionLog.id DESC')) ;
		if($transaction['TransactionLog']['status']=="Success"){
		$userid = $transaction['TransactionLog']['user_id'];
		$userdetail = $this->User->find('first',array('conditions'=>array('User.id'=>$userid)));
            $useremail = $userdetail['User']['email_id'];
			//pr($transaction); die;
            //$from ="geeteshwari.sds@gmail.com";
               $from = 'info@technocta.co.uk';
            $subject = "Agreement Mail";
            App::import('Vendor', 'phpmailer', array(
                'file' => 'phpmailer/class.phpmailer.php'));
            		$message = "<p>Hello ,
				 </p>
				 <p>Please<a href=" . SITEPATH . "users/electricSign" . "/" . $userid . "> Click Here</a> to sign the document </p>
				 <p>For any assistance or queries you can contact support@technocta.com  </p>
				 <p>Regards,  </p>
				 <p>Techno CTA Team</p>";
            $to = $useremail;
            $mail = new PHPMailer();
            $mail->IsHTML(true);
            $mail->SetFrom($from, 'Techno CTA Team');
            $mail->AddReplyTo($from, "Techno CTA Team");
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->AddAddress(trim($to));
            if (!$mail->Send()) {
                echo $mail->ErrorInfo;
				echo json_encode(array('error_code' => 1, 'response_string' => 'unsuccess'));
                exit;
            } else {
                $resultnew = "1";
				echo json_encode(array('error_code' => 0, 'response_string' => 'success'));
            }
		}else{
			echo json_encode(array('error_code' => 1, 'response_string' => 'unsuccess..'));
		}
    }
	
	function electricSign(){
		$this->layout="Home";
	}
	
	function sponserlist(){
		$this->autoRender = false;
		$name = $this->data['name'];
		$sponsorlist = $this->SponsorList->find('all',array('conditions'=>array('SponsorList.sponsor_name LIKE'=>'%'.$name.'%'),'fields'=>array('SponsorList.sponsor_name')));
		//pr ($sponsorlist); die; 
		$i=1;
		foreach($sponsorlist as $list){
			echo "<li class='liClass' id='m".$i."'>".$list['SponsorList']['sponsor_name']."<li>"; 
			$i++;
		}
	}

	
	function sponsorMail(){
		 $this->autoRender = false;
		$id = $this->data['id'];
		// $id= 334;
		//echo $id; die; 
		$book =$this->Bookinglog->find('first',array('conditions'=>array('Bookinglog.id'=>$id),'order' =>array('Bookinglog.id'=>'DESC')));
		$userid = $book['Bookinglog']['user_id'];
		$course_id = $book['Bookinglog']['course_id'];
		$sp_name=$book['Bookinglog']['sponsor_name'];
		$tran = $this->Course->find('first',array('conditions'=>array('Course.id'=>$course_id)));
		// print_r($tran);

		$pdf = $tran['Course']['pdf'];
		$email = $book['Bookinglog']['companyemail'];
		$useremail=$book['Bookinglog']['email_id'];
		$user = $this->User->find('first',array('conditions'=>array('User.id'=>$userid)));
		$username=$user['User']['first_name'];
		$str = $book['Bookinglog']['sponsor_company'];
        $sponsor_name = explode("-",$str);
		$course = $book['Bookinglog']['course_name'];
		$course_date = $book['Bookinglog']['course_date'];
		$currDateTime = date("d-m-Y H:i:s");
		$data['userid'] = $userid;
		$data['bookinglogid'] = $id;
		$data['courseid'] = $course_id;


		$this->Coursedetail->save($data);

		App::import('Vendor', 'dompdf', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));
        $html =
        '<html><body>
		<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
    <caption style="font-size: 20px;color: #449ac6;padding: 10px 0;border: 1px solid #666;">TRAINING SPONSORSHIP AGREEMENT COURSE DETAILS</caption>';
	// if(!empty($book['Bookinglog']['sponsor_company'])){
	// $html .= '<tr style="line-height: 20px;">
 //        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Sponsor Name</td>
 //        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$book['Bookinglog']['sponsor_company'].'</td>
	// </tr>';
	// }
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
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Candidate Email </td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$book['Bookinglog']['email_id'].'</td>
	</tr>
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Candidate Phone </td>
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
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">COURSE LOCATION</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">Techno CTA Ltd, 7 pier Parade, North Woolwich, E16 2LJ.'.$tran['Location']['location'].'</td>
    </tr>
    
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Telephone</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">0207 055 0877</td>
    </tr>
</table>';

$html .='
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
        file_put_contents('coursedetails.pdf', $output);

        // adminCourse detail

         $html1 =
        '<html><body>
		<table style="width:700px; height: auto; padding: 20px;font-size: 14px;
    font-family: sans-serif;  border-collapse: collapse;">
    <caption style="font-size: 20px;color: #449ac6;padding: 10px 0;border: 1px solid #666;">TRAINING SPONSORSHIP AGREEMENT COURSE BOOKING FORM</caption>';
	if(!empty($book['Bookinglog']['sponsor_company'])){
	$html1 .= '<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Sponsor Name</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$book['Bookinglog']['sponsor_company'].'</td>
	</tr>';
	}
	if($book['User']['user_type']=="Company"){
		$name = explode(',',$book['User']['first_name']);
		$html1 .= '<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Number of Candidate</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.count($name).'</td>
	</tr>';
	}else{
		$html1 .= '<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Candidate Name</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$book['User']['first_name']." ". $book['User']['last_name'].'</td>
	</tr>';
	}
	$html1 .= '<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Course Title</td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$tran['Course']['course_name'].'</td>
	</tr>
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Candidate Email </td>
        <td width="40%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;" colspan="2">'.$book['Bookinglog']['email_id'].'</td>
	</tr>
	<tr style="line-height: 20px;">
        <td width="20%" style="padding: 6px;border: 1px solid   #666;border-collapse: collapse;">Candidate Phone </td>
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
		//pr($html); die;
        $dompdf1 = new DOMPDF();
        $papersize = 'legal';
        $orientation = 'landscape';
        $dompdf1->load_html($html1);
        $dompdf1->set_paper($papersize, $orientation);
        $dompdf1->render();
        // echo $dompdf1->output();
        $output = $dompdf1->output();
        file_put_contents('admin_coursedetails.pdf', $output);


        //echo $pdf; die;
		$from ="booking@technocta.co.uk";
            $subject = $sponsor_name[0]."- COURSE DETAILS -".$course . " " .
            $course_date;
            App::import('Vendor', 'phpmailer', array(
                'file' => 'phpmailer/class.phpmailer.php'));
            
            		$CompanyMessage = "<p>Hello ".$sp_name.",
				 </p>
				 <p>The above course has been requested to be booked by your sponsored candidate. </p>
				 <p>Please also find attached to this email course detail for your distribution to the candidate</p>

				 <p>For any further assistance or queries you can contact Techno CTA on call  0207 055 0877  </p>
				 <p>Thanks & Regards,  </p>
				 <p>Techno CTA Team</p>";

				 	$AdminMessage = "<p>Hello Admin,
				 </p>
				 <p>The above course has been requested to be booked by  ".$username.". </p>
				
				 

				 <p>Please also find attached to this email copy of course details of the candidate.</p>
				 <p>For any further assistance or queries you can contact Techno CTA on call  0207 055 0877  </p>
				 <p>Thanks & Regards,  </p>
				 <p>Techno CTA Team</p>";

				 $message = "<p>Hello ".$username.",
				 </p>
				 <p>Thank you for booking with Techno CTA, Booking details are attached to this email.</p>
				 
				 <p>For any further assistance or queries you can contact Techno CTA on call  0207 055 0877  </p>
				 <p>Thanks & Regards,  </p>
				 <p>Techno CTA Team</p>";

            $to = $useremail;
            // $to = "deepika11.sds@gmail.com";
           
            $mail = new PHPMailer();
            $mail->IsHTML(true);
            $mail->SetFrom($from, 'Techno CTA Team');
            $mail->AddReplyTo($from, "Techno CTA Team");
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->AddAddress(trim($to));
            $mail->addAttachment('coursedetails.pdf');
			// $mail->addAttachment('TermsAndConditions.pdf');
			// $mail->addAttachment($pdf);
            // $Adminemail1='booking@technocta.co.uk , priyagarg.sds@gmail.com, ak07389@gmail.com';
               //$Adminemail1 = 'jyotik.sds@gmail.com';
			//$Adminemail1 = 'khatrriidepain@gmail.com';
			// $Adminemail1 = 'ay4629520@gmil.com, depain@sdssoftwares.co.uk';


			// $Adminemail1 ='deepika11.sds@gmail.com';
			$Adminemail1 ='booking@technocta.co.uk';
			$AdminMail = new PHPMailer();
            $AdminMail->IsHTML(true);
            $AdminMail->SetFrom($from, 'Techno CTA Team');
            $AdminMail->AddReplyTo($from, "Techno CTA Team");
            $AdminMail->Subject = $subject;
            $AdminMail->Body = $AdminMessage;
            $AdminMail->AddAddress(trim($Adminemail1));
     		$AdminMail->addAttachment('admin_coursedetails.pdf');
			// $AdminMail->addAttachment('TermsAndConditions.pdf');
			// $AdminMail->addAttachment($pdf);

			$Companymail1 = $email;
			// $Companymail1 = "deepikasharma1890@gmail.com";
			$Companymail = new PHPMailer();
            $Companymail->IsHTML(true);
            $Companymail->SetFrom($from, 'Techno CTA Team');
            $Companymail->AddReplyTo($from, "Techno CTA Team");
            $Companymail->Subject = $subject;
            $Companymail->Body = $CompanyMessage;
            $Companymail->AddAddress(trim($Companymail1));
     		$Companymail->addAttachment('coursedetails.pdf');
			// $Companymail->addAttachment('TermsAndConditions.pdf');
			// $Companymail->addAttachment($pdf);

            if (!$mail->Send()) {
                echo $mail->ErrorInfo;
				echo 1;
                exit;
            } else {
            	   $Companymail->Send();
            	if(!$AdminMail->Send()){
            		echo $AdminMail->ErrorInfo;
            	}
                $resultnew = "1";
				echo 2;
            }
	}
}
	?>	