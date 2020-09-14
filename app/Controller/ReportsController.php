<?php 



Class ReportsController extends AppController{
 var $helpers = array('Html', 'Form','Csv'); 
	var $uses = array('Booking','Course','TransactionLog','Location','User','Sector') ;

	var $components = array('Auth', 'Session', 'Email', 'RequestHandler');



	function beforeFilter() {

		parent::beforeFilter();

        $this->Auth->allow('admin_export');

    }
 
 function admin_export() {
	$getValue1 = array();
    $getvalue1 = $_GET;
   
    $filterval1 = array_filter($_GET);
    $result1 = array();
   
     
    foreach ($filterval1 as $key => $val) {
      if ($key == "from_date") {
       $result1['transaction_datetime_txt >='] = $val;
				 }
		if ($key == "to_date") {
		$result1['transaction_datetime_txt <='] = $val;
		 }
		 elseif ($key == "userType") {
            	if ($val == 'Company') {
            		$result1['User.user_type'] = $val;
            	}
            	else{
            	}
           }
            elseif ($key == "Gender") {

          		 $gender =  $_GET['Gender'];
       		$result1['User.gender'] = $gender;
            		
            	}
           
        elseif ($key == "Marital") {
	        	$marital =  $_GET['Marital'];
        $result1['User.maritalstatus'] = $marital;
            	
           }
           elseif ($key == "Age") {
        $age =  $_GET['Age'];
        $result1['User.age'] = $age;
            		
           }
           	elseif ($key == 'Ethnic') {
           		  	
            	 	$Ethnic =  $_GET['Ethnic'];
            $result1['User.ethnic'] = $Ethnic;
            		
            	}
            elseif ($key == 'Disability') {
            	$Disability =  $_GET['Disability'];
            		 $result1['User.disability'] = $Disability;
            	
            	}
		 elseif ($key == "course_id") {
		$result1['course_id'] = $val;

            }
        elseif ($key == "sectorid") {

          $csector = $this->Course->find('all',array('conditions'=>array('Course.sector_id ' =>  $val)));
          foreach ($csector as $cvalue) {
          	$courseIdarr[] = $cvalue['Course']['id'];
          }
     
	$result1['TransactionLog.course_id IN '] = $courseIdarr;

            }

           elseif ($key == "location_id") {

                //$result1['Course.location_id IN'] = $val;
                  $result1['Course.location_id '] = $val;

            }elseif($key == "status"){

				if($val=="Declined"){

					$result1['TransactionLog.status'] = "Declined";

				}else{

					 $result1['TransactionLog.status'] = $val;
	}
  }elseif ($key == "delegate_price") {

                $result1['Course.delegate_price'] = $val;

            }
		 }

        if (!empty($filterval1)) {

            $conditions = $result1;

        } else {

			$conditions = array('TransactionLog.status !=' =>'AuthCode: 376297');

        }

		// $bookinglist = $this->paginate = array(
		// 			'conditions'=> $conditions,
		//       		'limit' => 30
		// );
		// $bookinglist =  $this->paginate('TransactionLog');

	$bookinglist = $this->TransactionLog->find('all',array('conditions'=>$conditions));

	 // $this->set('orders', $this->TransactionLog->find('all',array('fields' => array(' TransactionLog.status'),'conditions'=>array('TransactionLog.status !='=>'AuthCode: 376297'))));

	 // $this->set('orders', $this->TransactionLog->find('all',array('conditions' =>$conditions)));

	$payStatus = $this->TransactionLog->find('all', array('fields' => array('TransactionLog.status','TransactionLog.transaction_datetime_txt'),'conditions'=>$conditions));
	$booking = $this->TransactionLog->find('all', array('fields' => array('DISTINCT Course.id','Course.course_name')));
 

   //die();
  $this->set('orders', $bookinglist);
    $this->layout = null;
    $this->autoLayout = false;
    Configure::write('debug', '0');

	}


	function admin_getcourseList(){
		$this->layout="admin";
		
		if($_POST['sectorId']){
		$course = $this->Course->find('all',array('conditions'=>array('Course.sector_id' => $_POST['sectorId'])));
		echo "<option value=''>Select Course Name</option>";
		foreach ($course as $coursevalue) {
			echo "<option value= ".$coursevalue['Course']['id'].">".$coursevalue['Course']['course_name']."</option>";
		}
		die();
		}
	
	}

	function admin_showuserType(){
			$this->layout="admin";
			//if($_POST['utype'] == 'User'){
				$indivName = $_POST['indivCatName'];
				if ($indivName == 'All') {
					echo "All";
					$sel = 'selected'; die();
				}
				if ($indivName == 'Gender') {
					echo "Gender";
					$sel = 'selected'; die();
				}
		// echo "<option  value='All'>All</option>";
		// echo "<option  value='Gender'>Gender</option>";
		// echo "<option  value='Marital Status'>Marital Status</option>";
		// echo "<option  value='Age group'>Age group</option>";
		// echo "<option  value='Ethnic Group'>Ethnic Group</option>";
		// echo "<option  value='Disability'>Disability</option>";
		
		// die();
	//	}
	}

	
	function admin_getuserType(){
		$this->layout="admin";
			if($_POST['utype'] == 'User'){
				// $indivName = $_POST['indivCatName'];
				// if ($indivName == 'All') {
				// 	echo "hii";
				// 	$sel = 'selected'; die();
				// }
		echo "<option  value='All'>All</option>";
		echo "<option  value='Gender'>Gender</option>";
		echo "<option  value='Marital Status'>Marital Status</option>";
		echo "<option  value='Age group'>Age group</option>";
		echo "<option  value='Ethnic Group'>Ethnic Group</option>";
		echo "<option  value='Disability'>Disability</option>";
		
		die();
		}

		if($_POST['afterType'] == 'Gender'){
		// echo "<option  value=''>Select Gender</option>";
		echo "<option  value='Male'>Male</option>";
		echo "<option  value='Female'>Female</option>";
		die();
		}
		else if($_POST['afterType'] == 'Marital Status'){
		// echo "<option  value=''>Select Marital Status</option>";
		echo "<option  value='Single'>Single</option>";
		echo "<option  value='Married'>Married</option>";
		echo "<option  value='Civil Partnership'>Civil Partnership</option>";
		echo "<option  value='Separated/ Divorce'>Separated/ Divorce</option>";
		die();
		}
		else if($_POST['afterType'] == 'Age group'){
		// echo "<option  value=''>Select Age group</option>";
		echo "<option  value='16-24'>16-24</option>";
		echo "<option  value='25-29'>25-29</option>";
		echo "<option  value='30-34'>30-34</option>";
		echo "<option  value='35-39'>35-39</option>";
		echo "<option  value='40-44'>40-44</option>";
		echo "<option  value='45-49'>45-49</option>";
		echo "<option  value='50-54'>50-54</option>";
		echo "<option  value='55-59'>55-59</option>";
		echo "<option  value='60-64'>60-64</option>";
		echo "<option  value='65+'>65+</option>";

		die();
		}else if($_POST['afterType'] == 'Ethnic Group'){
		// echo "<option  value=''>Select Ethnic Group</option>";
		echo "<option  value='White'>White</option>";
		echo "<option  value='Mixed/Multiple Ethnicity'>Mixed/Multiple Ethnicity</option>";
		echo "<option  value='Asian or Asian British'>Asian or Asian British</option>";
		echo "<option  value='African/Caribbean/Black British'>African/Caribbean/Black British</option>";
		die();
		}else if($_POST['afterType'] == 'Disability'){
		// echo "<option  value=''>Select Disability</option>";
		echo "<option  value='Yes'>Yes</option>";
		echo "<option  value='No'>No</option>";

		die();
		}
		

	}

	function admin_showAfterFilter(){
		$this->layout="admin";
		
			if($_POST['catName'] == 'rail'){
		$sector = $this->Sector->find('all',array('conditions'=>array('Sector.id' => 1)));
		echo "<option value=''>Select Sector</option>";
		foreach ($sector as $sectorvalue) {
		if($sectorvalue['Sector']['id'] == $_POST['sectorId'] ) {
				$sid = 'selected';
			}
			else{
				$sid = '';
			}
		echo "<option ".$sid." value= ".$sectorvalue['Sector']['id']
			.">".$sectorvalue['Sector']['sector_name']."</option>";
		}
		die();
		}
		else if($_POST['catName'] == 'non-rail'){
		$sector = $this->Sector->find('all',array('conditions'=>array('Sector.id !=' => 1)));
		echo "<option value=''>Select Sector</option>";
		foreach ($sector as $sectorvalue) {
			
		if($sectorvalue['Sector']['id'] == $_POST['sectorId']) {
				$sid = 'selected';
			}
			else{
				$sid = '';
			}
		
			echo "<option ".$sid." value= ".$sectorvalue['Sector']['id']." >".$sectorvalue['Sector']['sector_name']."</option>";
		}
		die();
		}

		
	}

	function admin_showDataIndiv(){
		$this->layout="admin";
		
			if($_POST['catName'] == 'rail'){
		$sector = $this->Sector->find('all',array('conditions'=>array('Sector.id' => 1)));
		echo "<option value=''>Select Sector</option>";
		foreach ($sector as $sectorvalue) {
		if($sectorvalue['Sector']['id'] == $_POST['sectorId'] ) {
				$sid = 'selected';
			}
			else{
				$sid = '';
			}
		echo "<option ".$sid." value= ".$sectorvalue['Sector']['id']
			.">".$sectorvalue['Sector']['sector_name']."</option>";
		}
		die();
		}
		else if($_POST['catName'] == 'non-rail'){
		$sector = $this->Sector->find('all',array('conditions'=>array('Sector.id !=' => 1)));
		echo "<option value=''>Select Sector</option>";
		foreach ($sector as $sectorvalue) {
			
		if($sectorvalue['Sector']['id'] == $_POST['sectorId']) {
				$sid = 'selected';
			}
			else{
				$sid = '';
			}
		
			echo "<option ".$sid." value= ".$sectorvalue['Sector']['id']." >".$sectorvalue['Sector']['sector_name']."</option>";
		}
		die();
		}

		
	}

	function admin_reportListing(){

		$this->layout="admin";
	

		if($_POST['couserType'] == 'Rail Course' && count($_POST['courseArr']) == 1)       {
		$sector = $this->Sector->find('all',array('conditions'=>array('Sector.id' => 1)));
		echo "<option value=''>Select Sector</option>";
		foreach ($sector as $sectorvalue) {
		
		echo "<option value= ".$sectorvalue['Sector']['id']
			.">".$sectorvalue['Sector']['sector_name']."</option>";
		}
		die();
		}
		else if($_POST['couserType'] == 'Non-Rail Course' && count($_POST['courseArr']) == 1 ){
		$sector = $this->Sector->find('all',array('conditions'=>array('Sector.id !=' => 1)));
		echo "<option value=''>Select Sector</option>";
		foreach ($sector as $sectorvalue) {
			echo "<option value= ".$sectorvalue['Sector']['id']." >".$sectorvalue['Sector']['sector_name']."</option>";
		}
		die();
		}
		else if(count($_POST['courseArr']) == 2){
			$sector = $this->Sector->find('all');
		echo "<option value=''>Select Sector</option>";
		foreach ($sector as $sectorvalue) {
			echo "<option value= ".$sectorvalue['Sector']['id']." >".$sectorvalue['Sector']['sector_name']."</option>";
		}
		die();
		}


		$UserCount =$this->User->find('all',array('conditions'=>array('User.user_type'=> 'User')));
		$Individual_Users = count($UserCount);
		$CompanyCount =$this->User->find('all',array('conditions'=>array('User.user_type'=> 'Company')));
		$Organisation = count($CompanyCount);

		$booking = $this->TransactionLog->find('all', array('fields' => array('DISTINCT Course.id','Course.course_name')));

		$price = $this->TransactionLog->find('all', array('fields' => array('DISTINCT Course.delegate_price')));

		$payStatus = $this->TransactionLog->find('all', array('fields' => array('DISTINCT TransactionLog.status'),'conditions'=>array('TransactionLog.status !='=>'AuthCode: 376297')));

		//pr($booking); die;

		$location = $this->Location->find('all');

		$getValue = array();

        $getvalue = $_GET;

		$filterval = array_filter($_GET);

		$result = array();
	

		foreach ($filterval as $key => $val) {

            if ($key == "from_date") {
			$result['TransactionLog.transaction_datetime_txt >='] = $val;
				}

			if ($key == "to_date") {

            $result['TransactionLog.transaction_datetime_txt <='] = $val;

            }
            elseif ($key == "userType") {
            	if ($val == 'Company') {
            		$result['User.user_type'] = $val;
            	}
            	else{
            	}
           }

         elseif ($key == "Gender") {

           $gender =  $_GET['Gender'];
       		$result['User.gender'] = $gender;
            	}
           
        elseif ($key == "Marital") {
        		
        $marital =  $_GET['Marital'];
        $result['User.maritalstatus'] = $marital;
           }
        elseif ($key == "Age") {
       
        $age =  $_GET['Age'];
        $result['User.age'] = $age;
           }
        elseif ($key == 'Ethnic') {
           	$Ethnic =  $_GET['Ethnic'];
            $result['User.ethnic'] = $Ethnic;
		           
            	}
            elseif ($key == 'Disability') {
            		$Disability =  $_GET['Disability'];
            		 $result['User.disability'] = $Disability;
            	}


            elseif ($key == "course_id") {

                $result['course_id'] = $val;

            }
            elseif ($key == "sectorid") {

          $csector = $this->Course->find('all',array('conditions'=>array('Course.sector_id ' =>  $val)));
          foreach ($csector as $cvalue) {
          	$courseIdarr[] = $cvalue['Course']['id'];
          }
     
	$result['TransactionLog.course_id IN '] = $courseIdarr;

            }elseif ($key == "location_id") {

            	//$result['Course.location_id IN '] = $val;
                $result['Course.location_id'] = $val;

            }elseif($key == "status"){

				if($val=="Declined"){

					$result['TransactionLog.status'] = "Declined";

				}else{

					 $result['TransactionLog.status'] = $val;

				}

            }elseif ($key == "delegate_price") {

                $result['Course.delegate_price'] = $val;

            }

        
       }

        if (!empty($filterval)) {

            $conditions = $result;

        } else {

			$conditions = array('TransactionLog.status !=' =>'AuthCode: 376297');

        }
       // pr($conditions);

		$bookinglist = $this->paginate = array(

			'conditions'=>  $conditions,

			'limit' => 20



		);

		$bookinglist =  $this->paginate('TransactionLog');

		//pr($bookinglist); //die;

		  $this->set(compact('bookinglist','booking','getvalue','date','location','price','payStatus','Individual_Users','Organisation'));

	}

	

	/*  function admin_viewReport($id = NULL) {

        $this->layout = "admin";

		$date = $this->request->data['Report']['date']=$this->request->data['Report']['date'];

		//pr($id); die;

		if(!empty($date)){

			$conditions = array('transaction_datetime_txt LIKE' => $date . "%");

		}else{

			$conditions = array('Course.id' => $id);

		}

		$this->paginate = array(



			'conditions' => $conditions,

			'limit' => 10



		);

		$BookingDetail =  $this->paginate('TransactionLog');

        //pr($result); die();

        $this->set(compact('BookingDetail'));



    } */



}
 
 
?>