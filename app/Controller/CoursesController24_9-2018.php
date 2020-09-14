<?php

class CoursesController extends AppController{
	var $uses = array('Course','Sector','Location');
	var $components = array('Auth', 'Session', 'Email', 'RequestHandler');

	function beforeFilter() {
		parent::beforeFilter();

		$this->Auth->allow('railway_safety','construction','plant_operation','small_tools','health_safety',
		'booknow','upcomingcourse','pre_requisite');
	}
	
	function admin_addCourse(){
		$this->layout="admin";
		$SectorName = $this->Sector->find('all');
		$location = $this->Location->find('all');
		$this->set(compact('SectorName','location'));
			if (!empty($this->request->data['Course']['pre_requisite']['name'])) {
				$file = $this->request->data['Course']['pre_requisite']['name'];
				//pr($file); die;
				$ext = substr(strtolower(strrchr($file, '.')), 1);
                $arr_ext = array('pdf', 'doc', 'docx');
				if (in_array($ext, $arr_ext)) {
					$filename = time() . $this->request->data['Course']['pre_requisite']['name'];
					move_uploaded_file($this->request->data['Course']['pre_requisite']['tmp_name'], "img/prerequisite/" . $filename);
					$this->request->data['Course']['pre_requisite'] = $filename;
					
					if($this->Course->save($this->data)){
					$this->Session->setFlash("Course has been added successfully");
					$this->redirect(array('controller'=>'courses','action'=>'admin_courseList')); 
				   }
				}
			}
				if(!empty($this->request->data)){
					$this->request->data['Course']['pre_requisite'] = $this->request->data['Course']['pre_requisite']['name'];
					if($this->Course->save($this->data)){
					$this->Session->setFlash("Course has been added successfully");
					$this->redirect(array('controller'=>'courses','action'=>'admin_courseList')); 
				   }
				}
	}
	function admin_courseList(){
		$this->layout="admin";
		$order = array('Course.id'=>'DESC');
		  $this->paginate = array(
			'order' => $order,
			'limit' => 10
		);
		$courseList = $this->paginate('Course');
		//pr($courseList);die;
		$this->set(compact('courseList'));
	}
		 
	function admin_editCourse($id=NULL){
		$this->layout="admin";
		 $courseDetail = $this->Course->find('first', array('conditions' => array('Course.id' => $id)));
		 $secDetail = $this->Sector->find('all');
		 $location = $this->Location->find('all');
		 $this->set(compact('courseDetail','secDetail','location'));
			$this->Course->id = $id;
			if (!empty($this->request->data['Course']['pre_requisite']['name'])) {
				$file = $this->request->data['Course']['pre_requisite']['name'];
				$ext = substr(strtolower(strrchr($file, '.')), 1);
                $arr_ext = array('pdf', 'doc', 'docx');
				if (in_array($ext, $arr_ext)) {
					$filename = time() . $this->request->data['Course']['pre_requisite']['name'];
					move_uploaded_file($this->request->data['Course']['pre_requisite']['tmp_name'], "img/prerequisite/" . $filename);
					$this->request->data['Course']['pre_requisite'] = $filename;
					$this->request->data['Course']['id'] = $id;
					if($this->Course->save($this->data)){
						$this->Session->setFlash("Course has been updated successfully");
						$this->redirect(array('controller'=>'courses','action'=>'admin_courseList')); 
					}
				}
			}
			if(!empty($this->request->data)){
					$this->Course->id = $id;
					$this->request->data['Course']['pre_requisite'] = $this->request->data['Course']['pre_requisite']['name'];
					if($this->Course->save($this->data)){
					$this->Session->setFlash("Course has been updated successfully");
					$this->redirect(array('controller'=>'courses','action'=>'admin_courseList')); 
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

	
	function railway_safety(){
		$this->layout="Home";	
		$location = $this->Location->find('all');
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
					$conditions = array('Course.sector_id' => "1");
				}
				
		$order = array('Course.id'=> 'DESC');
		$this->paginate = array(
			'conditions' => $conditions,
			'order'		=> $order,
			'limit' => 10
		);
		$list =  $this->paginate('Course');
		$count = $this->Course->find('count',array('conditions' => $conditions));
		//pr($count); die;
		$this->set(compact('list','getvalue','location','count'));
	}


	function construction(){
		$this->layout="Home";
		$location = $this->Location->find('all');
		$getvalue = array();
		$getvalue = $_GET;
		//pr($getvalue); die;
		$filterval = array_filter($getvalue);
	  
		$result = array();
			foreach($filterval as $key => $val){
						$result['Course' . '.' . $key] = $val;             
				}

				if(!empty($filterval)){
					$conditions = $result;
				}else{
					$conditions = array('Course.sector_id' => "2");
				}
				
		$order = array('Course.id'=> 'DESC');
		$this->paginate = array(
			'conditions' => $conditions,
			'order'		=> $order,
			'limit' => 10
		);
		$list =  $this->paginate('Course');
		$count = $this->Course->find('count',array('conditions' => $conditions));
		//pr($count); die;
		$this->set(compact('list','getvalue','location' ,'count'));
	}
	function plant_operation(){
		$this->layout="Home";
		// $sectorId = $this->Sector->find('first',array('conditions'=>array('Sector.sector_name'=>'Plant Operation')));
		// $id = $sectorId['Sector']['id'];
		// $courseList = $this->Course->find('all',array('conditions'=>array('Course.sector_id'=>$id)));
		// $this->set(compact('courseList','sectorId'));

		$location = $this->Location->find('all');
		$getvalue = array();
		$getvalue = $_GET;
		//pr($getvalue); die;
		$filterval = array_filter($getvalue);
	  
		$result = array();
			foreach($filterval as $key => $val){
						$result['Course' . '.' . $key] = $val;             
				}

				if(!empty($filterval)){
					$conditions = $result;
				}else{
					$conditions = array('Course.sector_id' => "3");
				}
				
		$order = array('Course.id'=> 'DESC');
		$this->paginate = array(
			'conditions' => $conditions,
			'order'		=> $order,
			'limit' => 10
		);
		$list =  $this->paginate('Course');
		$count = $this->Course->find('count',array('conditions' => $conditions));
		//pr($count); die;
		$this->set(compact('list','getvalue','location','count'));
	}

	function small_tools(){
		$this->layout="Home";
		// $sectorId = $this->Sector->find('first',array('conditions'=>array('Sector.sector_name'=>'Small Tools')));
		// $id = $sectorId['Sector']['id'];
		// $courseList = $this->Course->find('all',array('conditions'=>array('Course.sector_id'=>$id)));
		// $this->set(compact('courseList','sectorId'));

		$location = $this->Location->find('all');
		$getvalue = array();
		$getvalue = $_GET;
		//pr($getvalue); die;
		$filterval = array_filter($getvalue);
	  
		$result = array();
			foreach($filterval as $key => $val){
						$result['Course' . '.' . $key] = $val;             
				}

				if(!empty($filterval)){
					$conditions = $result;
				}else{
					$conditions = array('Course.sector_id' => "4");
				}
				
		$order = array('Course.id'=> 'DESC');
		$this->paginate = array(
			'conditions' => $conditions,
			'order'		=> $order,
			'limit' => 10
		);
		$list =  $this->paginate('Course');
		$count = $this->Course->find('count',array('conditions' => $conditions));
		//pr($count); die;
		$this->set(compact('list','getvalue','location','count'));
	}

	function health_safety(){
		$this->layout="Home";
		// $sectorId = $this->Sector->find('first',array('conditions'=>array('Sector.sector_name'=>'Health and Safety')));
		// $id = $sectorId['Sector']['id'];
		// $courseList = $this->Course->find('all',array('conditions'=>array('Course.sector_id'=>$id)));
		// $this->set(compact('courseList','sectorId'));

		$location = $this->Location->find('all');
		$getvalue = array();
		$getvalue = $_GET;
		//pr($getvalue); die;
		$filterval = array_filter($getvalue);
	  
		$result = array();
			foreach($filterval as $key => $val){
						$result['Course' . '.' . $key] = $val;             
				}

				if(!empty($filterval)){
					$conditions = $result;
				}else{
					$conditions = array('Course.sector_id' => "5");
				}
				
		$order = array('Course.id'=> 'DESC');
		$this->paginate = array(
			'conditions' => $conditions,
			'order'		=> $order,
			'limit' => 10
		);
		$list =  $this->paginate('Course');
		$count = $this->Course->find('count',array('conditions' => $conditions));
		//pr($count); die;
		$this->set(compact('list','getvalue','location','count'));
	}

	function booknow(){
		$this->layout="Home";
		
		$location = $this->Location->find('all');
		$getvalue = array();
		$getvalue = $_GET;
		//pr($getvalue); die;
		$filterval = array_filter($getvalue);
		//pr($filterval); die;
		$result = array();
			foreach($filterval as $key => $val){
						$result['Course' . '.' . $key] = $val;             
				}

				if(!empty($filterval)){
					$conditions = $result;
				}else{
					$conditions = "";
				}
				
		$order = array('Course.id'=> 'DESC');
		$this->paginate = array(
		'conditions' => $conditions,
	 	'order'		=> $order,
		'limit'		=>	10
		);
		$list =  $this->paginate('Course');
		//$list = $this->Course->find('all',array('conditions' => $conditions));
		$count = $this->Course->find('count');
		//pr($count); die;
		$this->set(compact('list','getvalue','location','count'));

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
}
