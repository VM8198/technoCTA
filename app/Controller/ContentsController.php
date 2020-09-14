<?php

class ContentsController extends AppController {
 
   var $uses = array('User','Content','Certificate');
   
   var $components = array('Auth', 'Session', 'Email', 'RequestHandler');

    function beforeRender() {
        
    }

    function beforeFilter() {
        $this->Auth->allow('about_us','our_team','our_facility','policy_certificate','recruitment','medical','terms_conditions',
		'appeals_policy','environmental_policy','bribery_policy','equality_policy','health_policy','railwaymedical','privacy_notice','quality_policy','accreditations');
    }

    function admin_contentListing() {
        $this->layout = 'admin';
        $order = array('Content.title' => 'ASC');
        $this->paginate = array(
            'order' => $order,
            'limit' => 10
        );
        $content = $this->paginate('Content');
        $this->set(compact('content'));
    }

	// function admin_addContent(){
	// 	$this->layout ="admin";
	// 	if(!empty($this->request->data)){
 //            //pr($this->request->data);exit;
 //            $this->request->data['Content']['title']= $this->request->data['Content']['title'];
 //             $this->request->data['Content']['description']= $this->request->data['Content']['description'];
 //             if($this->Content->save($this->data)){
                 
 //                   $this->Session->setFlash("Content has been added successfully");
 //              $this->redirect(array('controller'=>'contents','action'=>'admin_contentListing')); 
 //             }
 //        }
	// }
    function admin_editcontent($id = NULL) {
        $this->layout = "admin";
        $pageDetail = $this->Content->find('first', array('conditions' => array('Content.id' => $id)));
        $this->set(compact('pageDetail'));
        if (!empty($this->request->data)) {
            $this->Content->id = $id;
            if ($this->Content->save($this->data)) {
                $this->Session->setFlash('Content has been updated successfully.', 'default', array('class' => 'success'));
                $this->redirect(array('controller' => 'contents', 'action' => 'admin_contentListing'));
            }
        }
    }

    function admin_viewContent($id = NULL) {
        $this->layout = "admin";
        $contentDetail = $this->Content->find('first', array('conditions' => array('Content.id' => $id)));
        //pr($propertyDetail);exit;
        $this->set(compact('contentDetail'));
    }
	
	function about_us(){
		$this->layout="Home";
		$aboutUs = $this->Content->find('first', array('conditions' => array('Content.title' => 'About Us')));
        $this->Set(compact('aboutUs'));
	}
	function our_team(){
		$this->layout="Home";
	}
	function our_facility(){
		$this->layout="Home";
	}
	function policy_certificate(){
		$this->layout="Home";
		$policy = $this->Content->find('first', array('conditions' => array('Content.title' => 'POLICY')));
		
        $this->Set(compact('policy'));

	}
	function recruitment(){
		$this->layout="Home";
         $recruitment = $this->Content->find('first', array('conditions' => array('Content.title' => 'LABOUR SUPPLY-RECRUITMENT')));
		 //pr($recruitment); die;
        $this->Set(compact('recruitment'));
	}
	function medical(){
		$this->layout="Home";
		$medical = $this->Content->find('first', array('conditions' => array('Content.title' => 'MEDICAL RAIL & CONSTRUCTION- SAFETY CRITICAL MEDICAL')));
		//pr($medical); die;
        $this->Set(compact('medical'));
	}
	function terms_conditions(){
		$this->layout = "Home";
		$terms = $this->Content->find('first', array('conditions' => array('Content.title' => 'TERMS & CONDITIONS')));
        $this->Set(compact('terms'));
	}
	function appeals_policy(){
		$this->layout ="Home";
	}
	function bribery_policy(){
		$this->layout ="Home";
	}
	function environmental_policy(){
		$this->layout = "Home";
	}
	function equality_policy(){
		$this->layout = "Home";
	}
	function health_policy(){
		$this->layout ="Home";
	}
	function privacy_notice(){
		$this->layout ="Home";
	}
	function quality_policy(){
		$this->layout ="Home";
	}
	function accreditations(){
		$this->layout="Home";
		
		$order = array('Certificate.id' => 'DESC');

		$pdfDetails = $this->Certificate->find('all', array('order'=>$order,'conditions'=>array('Certificate.title'=>'Accreditation Certificate')));

		$this->set(compact('pdfDetails'));
	}
	
	function railwaymedical(){
		$this->layout="Home";
		$rail = $this->Content->find('first', array('conditions' => array('Content.title' => 'Rail Medical & Drug & Alcohol')));
		//pr($medical); die;
        $this->Set(compact('rail'));
	}
}
