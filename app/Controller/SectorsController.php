<?php 
class SectorsController extends AppController{
	var $uses = array('Sector');
	var $components = array('Auth', 'Session', 'Email', 'RequestHandler');
	 var $helpers = array('Html', 'Form','Csv'); 
	function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow();
    }
	
	function admin_addSector(){
		$this->layout ="admin";
		//pr($this->request->data); die;
		if(!empty($this->request->data)){
			$this->request->data['Sector']['sector_name'] = $this->request->data['Sector']['sector_name']; 
			//pr($this->request->data['Sector']['sector_name']); die;
			if($this->Sector->save($this->data)){
                $this->Session->setFlash("Sector has been added successfully");
				$this->redirect(array('controller'=>'sectors','action'=>'admin_sectorList')); 
             }
		}
	}
	
	function admin_sectorListExport(){
		$this->layout="admin";
         
		$sectorList = $this->Sector->find('all', array('order' =>array('Sector.id' => 'DESC')));
		//pr($sectorList);die;
        $this->set(compact('sectorList'));
	}
	
	function admin_sectorList(){
		$this->layout="admin";
		 $order = array('Sector.id'=>'DESC');
          $this->paginate = array(
            'order' => $order,
            'limit' => 10
        );
        $sectorList = $this->paginate('Sector');
		//pr($sectorList); die;
        $this->set(compact('sectorList'));
	}
	function admin_editSector ($id=null){
		$this->layout="admin";
		 $sectorDetail = $this->Sector->find('first', array('conditions' => array('Sector.id' => $id)));
        $this->set(compact('sectorDetail'));
        
       //pr($sectorDetail); die();
        if (!empty($this->request->data)) {
            $this->Sector->id = $id;
            if ($this->Sector->save($this->data)) {
                $this->Session->setFlash('Sector has been updated successfully.', 'default', array('class' => 'success'));
                $this->redirect(array('controller' => 'sectors', 'action' => 'admin_sectorList'));
            }
        }
	}
	
	  function admin_deleteSector($id = NULL) {
        $this->autoRender = FALSE;
        if ($this->Sector->delete($id)) {
            $this->Session->setFlash('You have successfully deleted Sector');
            $this->redirect(array('controller' => 'sectors', 'action' => 'admin_sectorList'));
        }
    }

}
?>