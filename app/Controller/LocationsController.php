<?php 
class LocationsController extends AppController{
	var $uses = array('Location');
	var $components = array('Auth','Session','Email','RequestHandler');
 var $helpers = array('Html', 'Form','Csv'); 
	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow();
	}

	function admin_addLocation(){
		$this->layout = "admin";
		//pr($this->request->data); die;
		if(!empty($this->request->data)){
			 if($this->Location->save($this->data)){
				$this->Session->setFlash("Location has been added successfully");
				$this->redirect(array('controller'=>'locations','action'=>'admin_locationList')); 
             }
		}
	}
	
	function admin_locationExport(){
		$this->layout ="admin";
		$order = array('Location.id'=>'DESC');
		$locationList = $this->Location->find('all', array('order' => $order));
		$this->set(compact('locationList'));
	}
	
	
	function admin_locationList(){
		$this->layout ="admin";
		$order = array('Location.id'=>'DESC');
		$this->paginate = array(
			'order'=>$order,
			'limit'=> 10
			);
		$locationList = $this->paginate('Location');
	
		$this->set(compact('locationList'));
		//pr($locationList); die;
	}
	function admin_editLocation($id = null){
		$this->layout ="admin";
		$locDetail = $this->Location->find('first',array('conditions'=>array('Location.id'=>$id)));
		$this->set(compact('locDetail'));
		//pr($locDetail); die;
		if (!empty($this->request->data)) {
            $this->Location->id = $id;
            if ($this->Location->save($this->data)) {
                $this->Session->setFlash('Location has been updated successfully.', 'default', array('class' => 'success'));
                $this->redirect(array('controller' => 'locations', 'action' => 'admin_locationList'));
            }
        }
	}
	function admin_deleteLocation($id=null){
		 $this->autoRender = FALSE;
        if ($this->Location->delete($id)) {
            $this->Session->setFlash('You have successfully deleted location');
            $this->redirect(array('controller' => 'locations', 'action' => 'admin_locationList'));
        }
	}
}
?>