<?php

class CoursesController extends AppController{
    var $uses = array('Course','Sector');
    var $components = array('Auth', 'Session', 'Email', 'RequestHandler');

    function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow('railway_safety','construction','plant_operation','small_tools','health_safety','booknow');
    }
    
    function admin_addCourse(){
        $this->layout="admin";
       // pr($this->request->data); die;

        $SectorName = $this->Sector->find('all');
        $this->set(compact('SectorName'));
       // pr($this->request->data); die;
        if(!empty($this->request->data)){
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
		 //pr($secDetail);die;
         $this->set(compact('courseDetail','secDetail'));
        // pr($courseDetail); die;
         if (!empty($this->request->data)) {
            $this->Course->id = $id;
            if ($this->Course->save($this->data)) {
                $this->Session->setFlash('Content has been updated successfully.', 'default', array('class' => 'success'));
                $this->redirect(array('controller' => 'courses', 'action' => 'admin_courseList'));
            }
        }
    }
     function admin_deleteCourse($id = NULL) {
        $this->autoRender = FALSE;
        if ($this->Course->delete($id)) {
            $this->Session->setFlash('You have successfully deleted course');
            $this->redirect(array('controller' => 'courses', 'action' => 'admin_courseList'));
        }
    }

    function booknow(){
         $this->layout="Home";
         //$data = $this->Course->find('all');
         //$this->set(compact('data'));

        $getvalue = array();
        $getvalue = $_GET;
        //pr($getvalue); die;
        $filterval = array_filter($getvalue);
      
        $result = array();
            foreach($filterval as $key => $val){
                        $result['Course' . '.' . $key] = $val;             
                }
                
        $order = array('Course.id' => 'DESC');
        $this->paginate = array(
            'order' => $order,
            'conditions' => $result,
            'limit' => 10
        );
        $list = $this->paginate('Course');
        //pr($list); die;
        $this->set(compact('rows','list','getvalue'));

    }

    function filter(){
        $this->layout = "Home";
        $fromdate = $this->request->data['Course']['from_date'];
        pr($fromdate); die;
        $todate = $this->request->data['Course']['to_date'];
        if(!empty($this->request->data)){
            $data = $this->Course->find('all');
        }
    }

    
    function railway_safety(){
        $this->layout="Home";
        $sectorId = $this->Sector->find('first',array('conditions'=>array('Sector.sector_name'=>'Railway Safety')));
        $id = $sectorId['Sector']['id'];
        //pr($id); die();
        $courseList = $this->Course->find('all',array('conditions'=>array('Course.sector_id'=>$id)));
        $this->set(compact('courseList','sectorId'));
    }
    function construction(){
        $this->layout="Home";
        $sectorId = $this->Sector->find('first',array('conditions'=>array('Sector.sector_name'=>'Construction')));
        $id = $sectorId['Sector']['id'];
        $courseList = $this->Course->find('all',array('conditions'=>array('Course.sector_id'=>$id)));
        $this->set(compact('courseList','sectorId'));
    }
    function plant_operation(){
        $this->layout="Home";
        $sectorId = $this->Sector->find('first',array('conditions'=>array('Sector.sector_name'=>'Plant Operation')));
        $id = $sectorId['Sector']['id'];
        $courseList = $this->Course->find('all',array('conditions'=>array('Course.sector_id'=>$id)));
        $this->set(compact('courseList','sectorId'));
    }
    function small_tools(){
        $this->layout="Home";
        $sectorId = $this->Sector->find('first',array('conditions'=>array('Sector.sector_name'=>'Small Tools')));
        $id = $sectorId['Sector']['id'];
        $courseList = $this->Course->find('all',array('conditions'=>array('Course.sector_id'=>$id)));
        $this->set(compact('courseList','sectorId'));
    }
    function health_safety(){
        $this->layout="Home";
        $sectorId = $this->Sector->find('first',array('conditions'=>array('Sector.sector_name'=>'Health and Safety')));
        $id = $sectorId['Sector']['id'];
        $courseList = $this->Course->find('all',array('conditions'=>array('Course.sector_id'=>$id)));
        $this->set(compact('courseList','sectorId'));
    }
	
}
