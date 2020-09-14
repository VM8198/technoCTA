
<?php
class UsersController extends AppController {
	var $uses = array('User','Course','Booking','TransactionLog','Bookinglog');
	var $components = array('Auth', 'Session', 'Email', 'RequestHandler');
	function beforeFilter() {
		$this->Auth->allow('companyregister','individualregister','logout','checkEmail','resetPassword','setForgotPassword','individualbooking','individualnonrail','companyrailbooking','companynonrail','verify','dashboard','profile','companyprofile','changepassword','login');
	}
	function admin_login() {
		$this->layout = 'admin_layout';
		if (!empty($this->request->data)) {
			if ($this->Auth->login()) {
				if ($_SESSION['Auth']['User']['user_type'] == "admin") {
					$this->redirect(array('controller' => 'users', 'action' => 'admin_dashboard'));
				}
			} else {
				$this->Session->setFlash("<font size='3' color='red'>please enter valid email_id and password </font>");
			}
		}
	}
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
			'limit' => 10
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
		$result = array();
		foreach ($filterval as $key => $val) {
            if ($key == "company") {
                $result['company LIKE'] = "%".$val."%";
				$result['User.user_type'] = 'Company';
            }else{
				$result['companyemail LIKE'] = $val."%";
				$result['User.user_type'] = 'Company';
			}
		}
		if (!empty($filterval)) {
            $conditions = $result;
        } else {
			$conditions = array('User.user_type' => 'Company');
        }
		$this->paginate = array(
			'order' => $order,
			'conditions' => $conditions,
			'limit' => 10
		);
		$userList = $this->paginate('User');
		$count = $this->User->find('count', array('conditions' => $conditions));
		//pr($userList); die;
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
				$subject = "Techno CTA  Registration mail";
				$message = 'Hello '. $name .'<br><br> '.'You have successfully registered on the website under '.$company.' Company.'.'<br><br>'.'Regards'.'<br>'.'Techno CTA Team';
				
				$message = "Dear <span style='color:#666666'>" . $company . "</span>,<br/><br/>";
				$message .= "You have successfully registered.<br/>";
				$message .= "<b>Activate your account by clicking on the below url:</b> <br/>";
				$message .= "<a href=" . "https://techno.sdssoftltd.co.uk/" . "users/verify/" . $forgotRandStr . "/" . ">Click Here</a><br/><br/>";
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
				$mail->AddAddress(trim($email));
				
				if (!$mail->Send()) {
					echo $mail->ErrorInfo;
					$datafor['User']['random_str'] = $forgotRandStr;
					$this->User->id = $id;
					//pr($id); die;
					if ($this->User->save($datafor)) {
						$id = $this->User->getLastInsertID();
						$this->Session->setFlash("<script>alert('Thank you for registration. Please check your email to activate your account.If you will not found mail in inbox then please check in spam folder.');</script>");
						$this->redirect(array('controller' => 'homes', 'action' => 'index'));
					}else {
						 $this->Session->setFlash("<script>alert('Some thing went wrong.');</script>");
                        $this->redirect(array('controller' => 'homes', 'action' => 'index'));
					}
				} else {
					$resultnew = "1";
                    $datafor['User']['random_str'] = $forgotRandStr;
                    $this->User->id = $id;
					//pr($id); die;
                    if ($this->User->save($datafor)) {
                        $this->Session->setFlash("<script>alert('Thank you for registration. Please check your email to activate your account.If you will not found mail in inbox then please check in spam folder.');</script>");
                        $this->redirect(array('controller' => 'homes', 'action' => 'index'));
                    } else {
                        $this->Session->setFlash("<script>alert('Some thing went wrong.');</script>");
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
				$subject = "Techno CTA  Registration mail";
			
				$message = "Dear <span style='color:#666666'>" . $name . "</span>,<br/><br/>";
				$message .= "You have successfully registered.<br/>";
				$message .= "<b>Activate your account by clicking on the below url:</b> <br/>";
				$message .= "<a href=" . "https://techno.sdssoftltd.co.uk/" . "users/verify/" . $forgotRandStr . "/" . ">Click Here</a><br/><br/>";
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
				$mail->AddAddress(trim($email));
				
				if (!$mail->Send()) {
					echo $mail->ErrorInfo;
					$datafor['User']['random_str'] = $forgotRandStr;
					$this->User->id = $id;
					//pr($id); die;
					if ($this->User->save($datafor)) {
						$id = $this->User->getLastInsertID();
						$this->Session->setFlash("<script>alert('Thank you for registration. Please check your email to activate your account.If you will not found mail in inbox then please check in spam folder.');</script>");
						$this->redirect(array('controller' => 'homes', 'action' => 'index'));
					}else {
						 $this->Session->setFlash("<script>alert('Some thing went wrong.');</script>");
                        $this->redirect(array('controller' => 'homes', 'action' => 'index'));
					}
				} else {
					$resultnew = "1";
                    $datafor['User']['random_str'] = $forgotRandStr;
                    $this->User->id = $id;
					//pr($id); die;
                    if ($this->User->save($datafor)) {
                        $this->Session->setFlash("<script>alert('Thank you for registration. Please check your email to activate your account.If you will not found mail in inbox then please check in spam folder.');</script>");
                        $this->redirect(array('controller' => 'homes', 'action' => 'index'));
                    } else {
                        $this->Session->setFlash("<script>alert('Some thing went wrong.');</script>");
                        $this->redirect(array('controller' => 'homes', 'action' => 'index'));
                    }
				}
			}
		}
	}
    function verify($forgotRandStr = null) {
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
                $this->Session->setFlash("<script>alert('Your account has been activated. Please log in.');</script>");
                $this->redirect(array('controller' => 'homes', 'action' => 'index'));
				}
            }
        } else {
            $this->Session->setFlash("<script>alert('You have already activated via email,Please log in.');</script>");
            $this->redirect(array('controller' => 'homes', 'action' => 'index'));
        }
    }
	
	function login() {
		$this->autoRender = false;
		$username = $this->data['email_id'];
		$password =  $this->Auth->password($this->data['password']);
	 /* pr($username);
		pr($password); die; */
		$userDetail = $this->User->find('first', array('conditions' => array('User.username' => $username,'User.password'=>$password)));
		if (!empty($this->request->data)) {
			if(($userDetail['User']['is_active'] == 0 && $userDetail['User']['user_type'] == "User")||($userDetail['User']['is_active'] == 0 && $userDetail['User']['user_type'] == "Company")){
				echo 0;
			}else{
				if (($userDetail['User']['is_active'] == 1 && $userDetail['User']['user_type'] == "User")||($userDetail['User']['is_active'] == 1 && $userDetail['User']['user_type'] == "Company")) {
					if ($this->Auth->login($userDetail['User'])) {
						if (!empty($this->request->data['User']['remember'])) {
                        if ($this->request->data['User']['remember'] == 1) {
                            setcookie('username', $_SESSION['Auth']['User']['username'], time() + 60 * 60 * 24 * 365, "/");
                            setcookie('password', $this->request->data['User']['password'], time() + 60 * 60 * 24 * 365, "/");
                        }
                    }else {
                    } 
					$this->Session->setFlash("You have successfully logged in", 'default', array(), 'form1');
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
				 <p>For any assistance or queries you can contact support@technocta.com  </p>
				 <p>Regards,  </p>
				 <p>Techno CTA Team</p>";
		$to = 'geeteshwari.sds@gmail.com';
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
		if (!empty($this->request->data)) {
			if(!empty($id)&&($_SESSION['Auth']['User']['user_type']=="User")){
				$this->User->id = $id;
				if ($this->User->save($this->data)) {
					$this->request->data['Bookinglog']['course_id']=$this->request->data['User']['course_id'];
					$this->request->data['Bookinglog']['course_name']=$this->request->data['User']['course_name']; 
					$this->request->data['Bookinglog']['course_date']=$this->request->data['User']['start_date'];
					$this->request->data['Bookinglog']['start_time']=$this->request->data['User']['start_time'];
					$this->request->data['Bookinglog']['end_time']=$this->request->data['User']['end_time'];
					$this->request->data['Bookinglog']['price_inc_vat']=$this->request->data['User']['price_incvat'];
					$this->request->data['Bookinglog']['email_id']=$this->request->data['User']['email_id'];
					$this->request->data['Bookinglog']['user_id']=$this->User->id;
					$this->Bookinglog->save($this->data);
					$lastid = $this->Bookinglog->getLastInsertID();
					$this->Session->setFlash('Thank you for registration.');
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
					if ($this->User->save($this->data)) {
					$this->request->data['Bookinglog']['course_id']=$this->request->data['User']['course_id'];
					$this->request->data['Bookinglog']['course_name']=$this->request->data['User']['course_name']; 
					$this->request->data['Bookinglog']['course_date']=$this->request->data['User']['start_date'];
					$this->request->data['Bookinglog']['start_time']=$this->request->data['User']['start_time'];
					$this->request->data['Bookinglog']['end_time']=$this->request->data['User']['end_time'];
					$this->request->data['Bookinglog']['price_inc_vat']=$this->request->data['User']['price_incvat'];
					$this->request->data['Bookinglog']['email_id']=$this->request->data['User']['companyemail'];
					$this->request->data['Bookinglog']['user_id']=$this->User->id;
					$this->Bookinglog->save($this->data);
					$lastid = $this->Bookinglog->getLastInsertID();
						$this->Session->setFlash('Thank you for registration.');
						$this->redirect(array('controller' => 'courses', 'action' => 'booking_details',"?" => array(
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
				$this->Session->setFlash('Thank you for registration.');
				$this->redirect(array('controller' => 'courses', 'action' => 'booking_details',"?" => array(
              'id'=>$lastid
              )));	
			}
			
		}
	}
	
	function companynonrail(){
		$this->autoRender = false;
		$id = $this->Auth->User('id');
		
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
					$this->request->data['Bookinglog']['email_id']=$this->request->data['User']['companyemail'];
					$this->request->data['Bookinglog']['user_id']=$this->User->id;
					//pr($this->request->data); die;
					$this->Bookinglog->save($this->data);
					$lastid = $this->Bookinglog->getLastInsertID();
					$this->Session->setFlash('Thank you for registration.');
					$this->redirect(array('controller' => 'courses', 'action' => 'booking_details',"?" => array(
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
					$this->Session->setFlash('You have successfully updated your profile.');
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
					$this->Session->setFlash('You have successfully updated your profile.');
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
				$this->Session->setFlash('You have successfully changed your password.');
				$this->redirect(array('controller' => 'users', 'action' => 'profile'));
			} else {
				$this->Session->setFlash('Please enter correct old password.');
				$this->redirect(array('controller' => 'users', 'action' => 'profile'));
			}
		}
	}
	
	
}
	?>	