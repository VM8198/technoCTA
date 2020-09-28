<?php



//use Cake\I18n\FrozenTime;



class CoursesController extends AppController{



	var $uses = array('Course','Sector','Location','TransactionLog','Bookinglog','Coursedetail');



	var $components = array('Auth', 'Session', 'Email', 'RequestHandler');

 var $helpers = array('Html', 'Form','Csv'); 





	function beforeFilter() {



		parent::beforeFilter();

		$this->Auth->allow('railway_safety','construction','plant_operation','small_tools','health_safety',

		'booknow','upcomingcourse','pre_requisite','preRequisite','mycourse','drug_medical','booking_details');



	}



	



	function admin_addCourse(){



		$this->layout="admin";



		$SectorName = $this->Sector->find('all');



		$location = $this->Location->find('all');



		$this->set(compact('SectorName','location'));



 // pr($this->request->data);

 // die();

		if(!empty($this->request->data)){

		    $start_date = $this->request->data[Course] [start_date];

			$start_date1 = implode(", ",$start_date);

			$start_time = $this->request->data[Course] [start_time];

			$start_time1 = implode(", ",$start_time);

			$end_time = $this->request->data[Course] [end_time];

			$end_time1 = implode(", ",$end_time);

			$this->request->data[Course] [start_date] = $start_date1;

			$this->request->data[Course] [start_time] = $start_time1;

			$this->request->data[Course] [end_time] = $end_time1;
			  //pr($this->request->data['Course']['pdf']['name']); die;
			if(!empty($this->request->data['Course']['pdf']['name'])){        
                    $file = $this->request->data['Course']['pdf']['name'];
                    //pr($this->request->data['Course']['pdf']['tmp_name']); die;
                    $ext = substr(strtolower(strrchr($file, '.')), 1);                  
                    $arr_ext = array('pdf');
                    if (in_array($ext, $arr_ext)) {
                       $filename = time() . $this->request->data['Course']['pdf']['name'];
                    move_uploaded_file($this->request->data['Course']['pdf']['tmp_name'], $filename);
                        $this->request->data['Course']['pdf'] = $filename; 
                    }                
              }else{
              	$this->request->data[Course] [pdf] = " ";
              }

             if($this->Course->save($this->data)){

				$this->Session->setFlash("Course has been added successfully");

				$this->redirect(array('controller'=>'courses','action'=>'admin_courseList')); 

             }

        }



	}
	
	function admin_courseListExport(){
		$this->layout="admin";

		$sector = $this->Sector->find('all');

		$getValue = array();

        $getvalue = $_GET;

		$filterval = array_filter($_GET);

		$result = array();

		//pr($getvalue); die;

		foreach ($filterval as $key => $val) {

            if ($key == "rail_id") {

				$result['Course.sector_id'] = $val;
				$result['Course.archive'] = 0;

            }else if($key == "nonrail_id"){
            	$result['Course.sector_id'] = $val;
				$result['Course.archive'] = 0;
            }else{

			$result['Course.sector_id'] = $val;
			$result['Course.archive'] = 0;

			}

		}

		if (!empty($filterval)) {

            $conditions = $result;

        } else {
        $conditions = array('Course.archive' => 0);
			//$conditions = array();

        }
        $order = array('Course.sector_id'=>'ASC','Course.id'=>'DESC');
		$courseList = $this->Course->find('all', array('conditions'=>$conditions,'order' => $order));
		 // $this->paginate = array(

			//'conditions'=>$conditions,

			//'order' => $order,

			//'limit' => 10

		//);

		//$courseList = $this->paginate('Course');
	//	pr($courseList);die;

		$this->set(compact('courseList','getvalue','sector'));
	}





	function admin_courseList(){



		$this->layout="admin";

		$sector = $this->Sector->find('all');

		$getValue = array();

        $getvalue = $_GET;

		$filterval = array_filter($_GET);

		$result = array();

		//pr($getvalue); die;

		foreach ($filterval as $key => $val) {

            if ($key == "rail_id") {

				$result['Course.sector_id'] = $val;
				$result['Course.archive'] = 0;

            }else if($key == "nonrail_id"){
            	$result['Course.sector_id'] = $val;
				$result['Course.archive'] = 0;
            }else{

//			$result['Course.sector_id'] = $val;
			$result['Course.archive'] = 0;

			}

		}

		if (!empty($filterval)) {

            $conditions = $result;

        } else {
        $conditions = array('Course.archive' => 0);
			//$conditions = array();

        }
        $order = array('Course.sector_id'=>'ASC','Course.id'=>'DESC');
		  $this->paginate = array(

			'conditions'=>$conditions,

			'order' => $order,

			'limit' => 20

		);

		$courseList = $this->paginate('Course');
		//pr($courseList);die;

		$this->set(compact('courseList','getvalue','sector'));
		}

	function admin_courseHistory(){
		$this->layout="admin";

		$sector = $this->Sector->find('all');

		$getValue = array();

        $getvalue = $_GET;

		$filterval = array_filter($_GET);

		$result = array();

		// pr($getvalue); die;

		foreach ($filterval as $key => $val) {

            if ($key == "rail_id") {
				$result['Course.sector_id'] = $val;
				$result['Course.archive'] = 0;

            }else if($key == "nonrail_id"){
            	$result['Course.sector_id'] = $val;
				$result['Course.archive'] = 0;
            }else{
			$result['Course.sector_id'] = $val;
			$result['Course.archive'] = 0;

			}

		}

		if (!empty($filterval)) {

            $conditions = $result;

        } else {
        $conditions = array('Course.archive' => 0);
			//$conditions = array();
        }
        // pr($conditions); die;
        $order = array('Course.sector_id'=>'ASC','Course.id'=>'DESC');
		  $this->paginate = array(

			'conditions'=>$conditions,

			'order' => $order,

			'limit' => 20

		);

		$courseList = $this->paginate('Course');
		//pr($courseList);die;

		$this->set(compact('courseList','getvalue','sector'));
		}

	function admin_editCourse($id=NULL){
		$this->layout="admin";
		
	$courseDetail = $this->Course->find('first', array('conditions' => array('Course.id' => $id)));
	$secDetail = $this->Sector->find('all');
	$location = $this->Location->find('all');
	$this->set(compact('courseDetail','secDetail','location'));

	 if( $this->request->is('ajax') ) {
	 			$sTime = explode(",",$_POST['sTime']);
		 		$eTime = explode(",",$_POST['eTime']);
		 		$courseDate =  explode(",",$_POST['Course']);
		 		$courseId =$_POST['courseId'];

	
		$courseArchive = $this->Course->find('first', array('conditions' => array('Course.id' => $courseId)));
		
		$start_date = $courseArchive['Course'] ['start_date'];
		$start_date1 = explode(",",$start_date);
		
		$start_time = $courseArchive['Course'] ['start_time'];
		$start_time1 = explode(",",$start_time);

		$end_time = $courseArchive['Course'] ['end_time'];
		$end_time1 = explode(",",$end_time);

		$archivedate = $courseArchive['Course'] ['archivedate'];
		$archivedate1 = explode(",",$archivedate);

		$archive_stime = $courseArchive['Course'] ['archive_stime'];
		$archive_stime1 = explode(",",$archive_stime);

		$archive_etime = $courseArchive['Course'] ['archive_etime'];
		$archive_etime1 = explode(",",$archive_etime);

		$field = array();
	
		$rfield = array_diff($start_date1, $courseDate ); 
		
		$startTime2 = array_intersect_key($start_time1, $rfield ); 
		$endTime2 = array_intersect_key($end_time1, $rfield ); 
		
		$archiveStartDate = array_merge($archivedate1,$courseDate);
		$archiveStartTime = array_merge($archive_stime1,$sTime);
		$archiveStartEnd = array_merge($archive_etime1,$eTime);
	
		$courseListdate1 = implode(",",$rfield);
		$StartTime1 = implode(",",$startTime2);
		$EndTime1 = implode(",",$endTime2);
		
		if (empty($archivedate)) {
		$archiveStartDate1 = $_POST['Course'];
		$archiveStartTime1 = 	$_POST['sTime'];
		$archiveStartEnd1 =  $_POST['eTime'];
		
		}
		else{
			
		$archiveStartDate1 = implode(",",$archiveStartDate);
		$archiveStartTime1 = implode(",",$archiveStartTime);
		$archiveStartEnd1 = implode(",",$archiveStartEnd);
		}
		
	
		
		$data['id'] = $courseId;
		$data['start_date'] = $courseListdate1;
		$data['start_time'] = $StartTime1;
		$data['end_time'] = $EndTime1;
		$data['archivedate'] = $archiveStartDate1;
		$data['archive_stime'] = $archiveStartTime1;
		$data['archive_etime'] = $archiveStartEnd1;
		if (count($start_date1) == 1 || empty($rfield)) {
			$data['archive'] = 1;
		}
		else{ 
			
			$data['archive'] = 0;
		}
	
	
	if($this->Course->save($data))
			{
			$this->Session->setFlash('Archive successfully.', 'default', array('class' => 'success'));
				if (count($start_date1) == 1) {

				echo "admin_courseList";
				die();
			
			}else{

				echo $courseId;
				die();
			
				
			}
				die();
			}
			else{
				echo "error";
				//die();
			}

 	}
 
	elseif($this->request->is('post')){

		$this->Course->id = $id;
			if (!empty($this->request->data)) {
				echo "else";
				//print_r($this->request->data);die();
		$this->Course->id = $id;
		$start_date = $this->request->data['Course'] ['start_date'];
		$start_date1 = implode(",",$start_date);
		$start_time = $this->request->data['Course'] ['start_time'];
		$start_time1 = implode(",",$start_time);
		$end_time = $this->request->data['Course'] ['end_time'];
		$end_time1 = implode(",",$end_time);
		$this->request->data['Course'] ['start_date'] = $start_date1;
		$this->request->data['Course'] ['start_time'] = $start_time1;
		$this->request->data['Course'] ['end_time'] = $end_time1;

		// pr($this->request->data); die();		
	if(!empty($this->request->data['Course']['pdf']['name'])){    
 $file = $this->request->data['Course']['pdf']['name'];
    //pr($this->request->data['Course']['pdf']['tmp_name']); die;
$ext = substr(strtolower(strrchr($file, '.')), 1);                  
 $arr_ext = array('pdf');
        if (in_array($ext, $arr_ext)) {
        $filename = time() . $this->request->data['Course']['pdf']['name'];
       unlink($courseDetail['Course']['pdf']); 
                    move_uploaded_file($this->request->data['Course']['pdf']['tmp_name'], $filename);
                        $this->request->data['Course']['pdf'] = $filename; 
                    }                
              }else{
              $this->request->data['Course']['pdf'] = $courseDetail['Course']['pdf'];
              }


				if ($this->Course->save($this->data)) {

					$this->Session->setFlash('Content has been updated successfully.', 'default', array('class' => 'success'));

					$this->redirect(array('controller' => 'courses', 'action' => 'admin_courseList'));

				}

			}
		}
	
		
}


	

	function admin_editArchiveCourse($id=NULL){
			$this->layout="admin";
		
	$courseDetail = $this->Course->find('first', array('conditions' => array('Course.id' => $id)));
	$secDetail = $this->Sector->find('all');
	$location = $this->Location->find('all');
	$this->set(compact('courseDetail','secDetail','location'));

	 if( $this->request->is('ajax') ) {
	 			$sTime = explode(",",$_POST['sTime']);
		 		$eTime = explode(",",$_POST['eTime']);
		 		$courseDate =  explode(",",$_POST['Course']);
		 		$courseId =$_POST['courseId'];

	
		$courseArchive = $this->Course->find('first', array('conditions' => array('Course.id' => $courseId)));
		
		$start_date = $courseArchive['Course'] ['archivedate'];
		$start_date1 = explode(",",$start_date);
		
		$start_time = $courseArchive['Course'] ['archive_stime'];
		$start_time1 = explode(",",$start_time);

		$end_time = $courseArchive['Course'] ['archive_etime'];
		$end_time1 = explode(",",$end_time);

		$archivedate = $courseArchive['Course'] ['start_date'];
		$archivedate1 = explode(",",$archivedate);

		$archive_stime = $courseArchive['Course'] ['start_time'];
		$archive_stime1 = explode(",",$archive_stime);

		$archive_etime = $courseArchive['Course'] ['end_time'];
		$archive_etime1 = explode(",",$archive_etime);



		$field = array();
	
		$rfield = array_diff($start_date1, $courseDate ); 

		$startTime2 = array_intersect_key($start_time1, $rfield ); 
		$endTime2 = array_intersect_key($end_time1, $rfield ); 
	
		$archiveStartDate = array_merge($archivedate1,$courseDate);
		$archiveStartTime = array_merge($archive_stime1,$sTime);
		$archiveStartEnd = array_merge($archive_etime1,$eTime);

		$courseListdate1 = implode(",",$rfield);
		$StartTime1 = implode(",",$startTime2);
		$EndTime1 = implode(",",$endTime2);
		

		if (empty($archivedate)) {
		$archiveStartDate1 = $_POST['Course'];
		$archiveStartTime1 = 	$_POST['sTime'];
		$archiveStartEnd1 =  $_POST['eTime'];
		
		}
		else{
			
		$archiveStartDate1 = implode(",",$archiveStartDate);
		$archiveStartTime1 = implode(",",$archiveStartTime);
		$archiveStartEnd1 = implode(",",$archiveStartEnd);
		}
	$data['id'] = $courseId;
	$data['archivedate'] = $courseListdate1;
	$data['archive_stime'] = $StartTime1;
	$data['archive_etime'] = $EndTime1;
	$data['start_date'] = $archiveStartDate1;
	$data['start_time'] = $archiveStartTime1;
	$data['end_time'] = $archiveStartEnd1;
	$data['archive'] = 0;
	


	if($this->Course->save($data))
			{
			$this->Session->setFlash('Unarchive successfully.', 'default', array('class' => 'success'));
				//echo "success";
				die();
			}
			else{
				echo "error";
				die();
			}

 	}
 
	}





	 function admin_viewCourse($id=NULL){



		$this->layout ="admin";



		$courseView = $this->Course->find('first',array('conditions'=>array('Course.id'=>$id)));



		$this->set(compact('courseView'));



		//pr($courseView); die;



	 }



	 function admin_deleteCourse($id = NULL) {
		$this->autoRender = FALSE;
		if ($this->Course->delete($id)) {
			$this->Session->setFlash('You have successfully deleted course');
			$this->redirect(array('controller' => 'courses', 'action' => 'admin_courseList'));
		}
	}


	function admin_archiveCourse($id = NULL) {
		$this->autoRender = FALSE;
		if ($this->request->isPost()) {
		$courseId=$this->request->data['courseId'];
		foreach ($courseId as $value) {
			$this->Course->updateAll(array('Course.archive' => 1), array('Course.id' => $value));
			}
			echo 1; die;
		}
	 
	}

	function admin_unarchiveCourse($id = NULL) {
		$this->autoRender = FALSE;
		if ($this->request->isPost()) {
		$courseId=$this->request->data['courseId'];
		foreach ($courseId as $value) {
		$this->Course->updateAll(array('Course.archive' => 0), array('Course.id' => $value));
			
		}
		echo 1; die;
	 
	}
}





	function admin_active($id = NULL) {

	if ($this->Course->updateAll(array('Course.is_active' => 0), array('Course.id' => $id))) {

			$this->Session->setFlash('Course has been Enabled');
			$this->redirect($this->referer());
		}
	}







	function admin_deactive($id = NULL) {



		if ($this->Course->updateAll(array('Course.is_active' => 1), array('Course.id' => $id))) {



			$this->Session->setFlash('Course has been Disabled');



			$this->redirect($this->referer());



		}



	}

	



	function railway_safety(){
		$this->layout="Home";	
		$location = $this->Location->find('all');

		$course = $this->Course->find('all',array('conditions'=>array('Course.sector_id' => "1",'Course.is_active'=>"0",'Course.archive'=>"0"),'order'=> array('Course.course_name'=> 'ASC')));

		$getvalue = array();
		$getvalue = $_GET;
		$filterval = array_filter($getvalue);
		$result = array();
		foreach($filterval as $key => $val){
			$result['Course' . '.' . $key] = $val;             
			}

			if(!empty($filterval)){
						$conditions[] = $result;
						$conditions[] = array('Course.archive'=>"0");
					}
					else
					{
						$conditions = array('Course.sector_id' => "1",'Course.is_active'=>"0",'Course.archive'=>"0");
				}
						$order = array('Course.course_name'	=> 'ASC');



		$this->paginate = array(

			'conditions' => $conditions,

			'order'		=> $order,
			'limit' => 20
		);

		$list =  $this->paginate('Course');
		$count = $this->Course->find('count',array('conditions' => $conditions));

		$this->set(compact('list','getvalue','location','count','course'));

		return $course;



	}











	function construction(){

		$this->layout="Home";

		$location = $this->Location->find('all');	

		// $course = $this->Course->find('all',array('conditions'=>array('Course.sector_id' => "2",'Course.is_active'=>"0",'Course.archive'=>"0"),'order'=> array('Course.course_name'=> 'ASC')));

		$getvalue = array();
		$getvalue = $_GET;
		
		$filterval = array_filter($getvalue);

		$result = array();

			foreach($filterval as $key => $val){
						$result['Course' . '.' . $key] = $val;             
				}
				if(!empty($filterval)){
					$conditions = $result;
					$conditions['Course.archive'] = 0;
					$conditions['Course.sector_id'] = '2';

				}else{
					$conditions = array('Course.sector_id' => "2",'Course.is_active'=>"0",'Course.archive'=>"0");
			}

		$order = array('Course.course_name'=> 'ASC');

		$pArray = array(
			'conditions' => $conditions,
		 	'order'		=> $order,
			'limit'		=>	10
		);

		unset($pArray['conditions']['Course.url']);
		$this->paginate = $pArray;

		$list =  $this->paginate('Course');

		$count = $this->Course->find('count', $pArray);

		$course = $this->Course->find('all',$pArray);

		$list =  $this->paginate('Course');


		$this->set(compact('list','getvalue','location' ,'count','course'));

		return $course;

	}



	function plant_operation(){

$this->layout="Home";

		$location = $this->Location->find('all');	

		// $course = $this->Course->find('all',array('conditions'=>array('Course.sector_id' => "2",'Course.is_active'=>"0",'Course.archive'=>"0"),'order'=> array('Course.course_name'=> 'ASC')));

		$getvalue = array();
		$getvalue = $_GET;
		
		$filterval = array_filter($getvalue);

		$result = array();

			foreach($filterval as $key => $val){
						$result['Course' . '.' . $key] = $val;             
				}
				if(!empty($filterval)){
					$conditions = $result;
					$conditions['Course.archive'] = 0;
					$conditions['Course.sector_id'] = '3';

				}else{
					$conditions = array('Course.sector_id' => "3",'Course.is_active'=>"0",'Course.archive'=>"0");
			}

		$order = array('Course.course_name'=> 'ASC');

		$pArray = array(
			'conditions' => $conditions,
		 	'order'		=> $order,
			'limit'		=>	10
		);

		unset($pArray['conditions']['Course.url']);
		$this->paginate = $pArray;

		$list =  $this->paginate('Course');

		$count = $this->Course->find('count', $pArray);

		$course = $this->Course->find('all',$pArray);

		$list =  $this->paginate('Course');


		$this->set(compact('list','getvalue','location' ,'count','course'));

		return $course;

	}







	function small_tools(){

$this->layout="Home";

		$location = $this->Location->find('all');	

		// $course = $this->Course->find('all',array('conditions'=>array('Course.sector_id' => "2",'Course.is_active'=>"0",'Course.archive'=>"0"),'order'=> array('Course.course_name'=> 'ASC')));

		$getvalue = array();
		$getvalue = $_GET;
		
		$filterval = array_filter($getvalue);

		$result = array();

			foreach($filterval as $key => $val){
						$result['Course' . '.' . $key] = $val;             
				}
				if(!empty($filterval)){
					$conditions = $result;
					$conditions['Course.archive'] = 0;
					$conditions['Course.sector_id'] = '4';

				}else{
					$conditions = array('Course.sector_id' => "4",'Course.is_active'=>"0",'Course.archive'=>"0");
			}

		$order = array('Course.course_name'=> 'ASC');

		$pArray = array(
			'conditions' => $conditions,
		 	'order'		=> $order,
			'limit'		=>	10
		);

		unset($pArray['conditions']['Course.url']);
		$this->paginate = $pArray;

		$list =  $this->paginate('Course');

		$count = $this->Course->find('count', $pArray);

		$course = $this->Course->find('all',$pArray);

		$list =  $this->paginate('Course');


		$this->set(compact('list','getvalue','location' ,'count','course'));

		return $course;

	}







	function health_safety(){
$this->layout="Home";

		$location = $this->Location->find('all');	

		// $course = $this->Course->find('all',array('conditions'=>array('Course.sector_id' => "2",'Course.is_active'=>"0",'Course.archive'=>"0"),'order'=> array('Course.course_name'=> 'ASC')));

		$getvalue = array();
		$getvalue = $_GET;
		
		$filterval = array_filter($getvalue);

		$result = array();

			foreach($filterval as $key => $val){
						$result['Course' . '.' . $key] = $val;             
				}
				if(!empty($filterval)){
					$conditions = $result;
					$conditions['Course.archive'] = 0;
					$conditions['Course.sector_id'] = '5';

				}else{
					$conditions = array('Course.sector_id' => "5",'Course.is_active'=>"0",'Course.archive'=>"0");
			}

		$order = array('Course.course_name'=> 'ASC');

		$pArray = array(
			'conditions' => $conditions,
		 	'order'		=> $order,
			'limit'		=>	10
		);

		unset($pArray['conditions']['Course.url']);
		$this->paginate = $pArray;

		$list =  $this->paginate('Course');

		$count = $this->Course->find('count', $pArray);

		$course = $this->Course->find('all',$pArray);

		$list =  $this->paginate('Course');


		$this->set(compact('list','getvalue','location' ,'count','course'));

		return $course;

	}







	function booknow(){



		$this->layout="Home";



		// $course = $this->Course->find('all',array('conditions'=>array('Course.is_active'=>"0",'Course.archive'=>"0"),'order'=> array('Course.course_name'=> 'ASC')));



		$location = $this->Location->find('all');



		$getvalue = array();



		$getvalue = $_GET;



		 // pr($getvalue); die;



		$filterval = array_filter($getvalue);



		//pr($filterval); die;



		$result = array();



			foreach($filterval as $key => $val){
						$result['Course' . '.' . $key] = $val;

				}

				if(!empty($filterval)){
					$conditions = $result;
					$conditions['Course.archive'] = 0;

				}else{
					$conditions = array('Course.is_active'=>"0",'Course.archive'=>"0");
				}


		$order = array('Course.course_name'=> 'ASC');

		$pArray = array(
			'conditions' => $conditions,
		 	'order'		=> $order,
			'limit'		=>	10
		);		


		$count = $this->Course->find('count', $pArray);

		unset($pArray['conditions']['Course.url']);
		$this->paginate = $pArray;

		$course = $this->Course->find('all', $pArray);

		$list =  $this->paginate('Course');

		$this->set(compact('list','getvalue','location','count','course'));

		return $course;
	}



	



  /*    function getnewcourseajax() {



        $sectorId = $this->data['sectorId'];



		$data = $this->Course->find('all',array('fields'=>'start_date'), array('conditions' => array('Course.sector_id'=>$sectorId)));



        //pr ($data) ; die;



	    $start = date('d-m-Y',strtotime("now"));



		//echo $start;



        $conditions = array('Course.start_date >' =>$start,'Course.sector_id'=>$sectorId );



        $course = $this->Course->find('all', array('conditions' =>  $conditions));



		//pr($course); die;



        //$this->set(compact('course'));



		return $course;



	 }



	*/



	



	function pre_requisite(){



		$data = " Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 



			labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 



			nisi ut aliquip ex ea commodo consequat.";



			//echo $data;



			return $data;



			



			



	}



 



	function upcomingcourse(){



		//echo $_SERVER[ 'REQUEST_URI' ];



		$start = date('d-m-Y',strtotime("now"));



		if(($_SERVER[ 'REQUEST_URI' ])=="/TechnoCTA/Construction/Code/courses/railway_safety" ){



        $conditions = array('Course.start_date >' =>$start,'Course.sector_id'=> 1);



        $course = $this->Course->find('all', array('conditions' =>  $conditions));



		}else if(($_SERVER[ 'REQUEST_URI' ])=="/TechnoCTA/Construction/Code/courses/construction"){



		$conditions = array('Course.start_date >' =>$start,'Course.sector_id'=> 2);



        $course = $this->Course->find('all', array('conditions' =>  $conditions));



		}else if(($_SERVER[ 'REQUEST_URI' ])=="/TechnoCTA/Construction/Code/courses/plant_operation"){



		$conditions = array('Course.start_date >' =>$start,'Course.sector_id'=> 3);



        $course = $this->Course->find('all', array('conditions' =>  $conditions));



		}else if(($_SERVER[ 'REQUEST_URI' ])=="/TechnoCTA/Construction/Code/courses/small_tools"){



		$conditions = array('Course.start_date >' =>$start,'Course.sector_id'=> 4);



        $course = $this->Course->find('all', array('conditions' =>  $conditions));



		}else if(($_SERVER[ 'REQUEST_URI' ])=="/TechnoCTA/Construction/Code/courses/health_safety"){



		$conditions = array('Course.start_date >' =>$start,'Course.sector_id'=> 5);



        $course = $this->Course->find('all', array('conditions' =>  $conditions));



		}



		return $course;



	}

	

	function preRequisite($id=NULL){

		$this->layout ="Home";

		$detail = $this->Course->find('first',array('conditions'=>array('Course.id' => $id)));

		//pr($detail); die;

		$this->set(compact('detail'));

	}

	

	function mycourse(){

		$this->layout ="Home";

		$user_id = $this->Auth->user('id');

		//pr($user_id); die;

		$course =  $this->TransactionLog->find('all', array('conditions' => array('User.id' => $user_id)));

		//pr($course); die;

		$this->set(compact('course'));

	}

	

	function admin_bookedcourse($id =NUll){

		$this->layout ="admin";

		//pr($id); die;

		$course =  $this->TransactionLog->find('all', array('conditions' => array('User.id' => $id)));

		foreach($course as $result){

		$no = $result['User']['sentinel'];

		 $num = explode(",", $no);

		}

		/* foreach($course as $result){

		$name = $result['User']['first_name'];

		 $name1 = explode(",", $name);

		}

		$count = Count($name1); */

		//pr($count); die;

		$this->set(compact('course','num'));

	}

	

	function drug_medical(){

		$this->layout="Home";

		$location = $this->Location->find('all');

		$course = $this->Course->find('all',array('conditions'=>array('Course.sector_id' => "6",'Course.is_active'=>"0",'Course.archive'=>"0"),'order'=> array('Course.course_name'=> 'ASC')));
		$getvalue = array();
		$getvalue = $_GET;
		$filterval = array_filter($getvalue);
		$result = array();
			foreach($filterval as $key => $val){

						$result['Course' . '.' . $key] = $val;  
				}
				if(!empty($filterval)){
					$conditions = $result;
				}else{
					$conditions = array('Course.sector_id' => "6",'Course.is_active'=>"0",'Course.archive'=>"0");
				}
		$order = array('Course.course_name'=> 'ASC');
		$this->paginate = array(
			'conditions' => $conditions,
			'order'		=> $order,
			'limit' => 20
		);
		$list =  $this->paginate('Course');
		$count = $this->Course->find('count',array('conditions' => $conditions));
// pr($count); die();
		$this->set(compact('list','getvalue','location','count','course'));

		return $course;

	}

	

	function booking_details(){

		$this->layout="Home";

		$id = $_GET['id'];

		$details = $this->Bookinglog->find('first',array('conditions'=>array('Bookinglog.id'=>$id)));
		$userid = $details['Bookinglog']['user_id'];
		$course_id = $details['Bookinglog']['course_id'];

		$coursedetails = $this->Course->find('first',array('conditions'=>array('Course.id'=>$course_id)));
		$findcoursedetail = $this->Coursedetail->find('first',array('conditions'=>array('bookinglogid'=>$id, 'userid'=>$userid)));

		//pr($coursedetails); die;

			$this->set(compact('details','coursedetails','findcoursedetail'));

		

	}



}



