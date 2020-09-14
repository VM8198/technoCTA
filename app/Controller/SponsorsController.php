<?php

Class SponsorsController extends AppController{

     var $uses = array('Sponsor','SponsorImage','Certificate');
     var $components =array('Auth','Session');

     function beforeFilter() {

         $this->Auth->allow();

         parent::beforeFilter();

     }
	 
	 function admin_addSponsor(){
        $this->layout="admin";
        if (!empty($this->request->data)) {
            if ($this->Sponsor->save($this->data)) {
                $titleId = $this->Sponsor->getLastInsertID();
                if (!empty($titleId)) {
                    $allowedExts = array("gif", "jpeg", "JPG", "jpg", "png");
                    foreach ($this->request->data['SponsorImage']['image'] as $value) {
                        $temp = explode(".", $value["name"]);
                        $extension = end($temp);
                        $filename = time() . $value["name"];
                        move_uploaded_file($value["tmp_name"], "img/sponsorimage/" . $filename);
                        $data['SponsorImage']['image'] = $filename;
                        $data['SponsorImage']['title_id'] = $titleId;
                        $this->SponsorImage->create();
                        $this->SponsorImage->saveAll($data);
                    }
                }
                $this->Session->setFlash('Sponsor has been added successfully');
                $this->redirect(array('controller' => 'sponsors', 'action' => 'admin_sponsorList'));
            }
        }
	 }
	 
	function admin_sponsorList(){
		 $this->layout ="admin";
		  $order = array('Sponsor.id' => 'DESC');
        $this->paginate = array(
            'order' => $order,
            'limit' => 10
        );

        $sponsor = $this->paginate('Sponsor');
        //pr($gallery);        exit();
        $this->set(compact('sponsor'));
	}
	 
	function admin_sponsorView($id =Null){
		$this->layout="admin";
        $posttitle = $this->Sponsor->find('first',array('conditions' => array('Sponsor.id' => $id)));
        $sponsor = $this->SponsorImage->find('all',array('conditions' => array('SponsorImage.title_id' => $id)));
        $this->set(compact('sponsor','posttitle'));
	}

	function admin_sponsorEdit($id = NULL) {
        $this->layout = "admin";
        $sponsorImage = $this->SponsorImage->find('all', array('conditions' => array('SponsorImage.title_id' => $id)));
        $sponsorDetail = $this->Sponsor->find('first', array('conditions' => array('Sponsor.id' => $id)));
        $this->set(compact('sponsorDetail','sponsorImage'));
        if (!empty($this->request->data)) {
            $this->Sponsor->id = $id;
            if ($this->Sponsor->save($this->data)) {
                $allowedExts = array("gif", "jpeg", "JPG", "jpg", "png");
                if (!empty($this->request->data['SponsorImage']['image'][0]['name'])) {
                    foreach ($this->request->data['SponsorImage']['image'] as $value) {
                        $temp = explode(".", $value["name"]);
                        $extension = end($temp);
                        $filename = time() . $value["name"];
                        move_uploaded_file($value["tmp_name"], "img/sponsorimage/" . $filename);
                        $data['SponsorImage']['image'] = $filename;
                        $data['SponsorImage']['title_id'] = $id;
                        $this->SponsorImage->create();
                        $this->SponsorImage->saveAll($data);
                    }
                }

                $this->Session->setFlash('Sponsor has been updated successfully');
                $this->redirect(array('controller' => 'sponsors', 'action' => 'admin_sponsorList'));
            }
        }
    }
	
	function admin_deleteSponImage($id= NULL){
		 $this->autoRender = false;        

        if($this->SponsorImage->delete($id)){

          

          $this->redirect($this->referer());

       }
	}
	
	function admin_sponsorDelete($id=Null){
		$this->autoRender = FALSE;

        if ($this->Sponsor->delete($id)) {

            $this->Session->setFlash('Sponsor has been deleted successfully ');

            $this->redirect(array('controller' => 'sponsors', 'action' => 'admin_sponsorList'));

        }
	}
	
	function admin_certificateAdd(){
		$this->layout="admin";
		$title = $this->request->data['Certificate']['title'];
		if(!empty($this->request->data)){
			//pr($this->request->data); die;
			// if (!empty($this->request->data['Certificate']['image']['name'])){
                $file =$this->request->data['Certificate']['image']['name'];
                $ext = substr(strtolower(strrchr($file, '.')), 1);
                $arr_ext = array('pdf','jpg','png', 'doc', 'docx', 'txt');
                if (in_array($ext, $arr_ext)) {
                $filename = time() . $this->request->data['Certificate']['image']['name'];
                 move_uploaded_file($this->request->data['Certificate']['image']['tmp_name'], "img/references/image/" . $filename);
                 $data['Certificate']['image'] = $filename;
             }
                 $file1 = $this->request->data['Certificate']['pdf_file']['name'];
				 $ext1 = substr(strtolower(strrchr($file1, '.')), 1);
                    $arr_ext1 = array('pdf');
                    if (in_array($ext1, $arr_ext1)) {
						$filename1 = time() . $this->request->data['Certificate']['pdf_file']['name'];
						 move_uploaded_file($this->request->data['Certificate']['pdf_file']['tmp_name'],"img/references/pdf/" . $filename1);
						$data['Certificate']['title'] = $this->request->data['Certificate']['title'];
						$data['Certificate']['pdf_file'] = $filename1;
						//pr($data); die;
						if ($this->Certificate->saveAll($data)) {
								$this->Session->setFlash('You have successfully added the certificate.');
								$this->redirect(array('controller' => 'sponsors', 'action' => 'admin_certificateListing'));
						}else{
							$this->Session->setFlash('The certificate could not be saved.');
						}
					}
				// }
				// else{
				// 	$this->Session->setFlash('The certificate could not be saved.');
				// }
			//}
		}
	}
	
		function admin_certificateListing(){

		$this->layout ="admin";

		$order = array('Certificate.id' => 'DESC');

		$this->paginate = array(

			'order' => $order,

			'limit' => 10

		);

		$docs = $this->paginate('Certificate');

		//pr($pdf); die;

		$this->set(compact('docs'));

	}
	
	function admin_certificateView($id=NULL){

		$this->layout ="admin";

		$pdfview = $this->Certificate->find('first',array('conditions'=>array('Certificate.id' => $id)));

		$this->set(compact('pdfview'));

		//pr($pdfdetail); die;

	}
	
	function admin_certificateEdit($id = NULL){

		$this->layout="admin";

		$pdfDetails = $this->Certificate->find('first' , array('conditions'=> array('Certificate.id'=>$id)));

		$this->set(compact('pdfDetails'));

		if(!empty($this->request->data)){
			//pr($this->request->data);die();

			$this->Certificate->id = $id;

				$file =	$this->request->data['Certificate']['image']['name'];

                $ext = substr(strtolower(strrchr($file, '.')), 1);

                $arr_ext = array('pdf','jpg','png', 'doc', 'docx', 'txt');

                if (in_array($ext, $arr_ext)) {

                $filename = time() . $this->request->data['Certificate']['image']['name'];

                 move_uploaded_file($this->request->data['Certificate']['image']['tmp_name'], "img/references/image/" . $filename);
             }
                
                 if(!empty($filename)){
                 	$data['Certificate']['image'] = $filename;
                 }
                 

                 $file1 = $this->request->data['Certificate']['pdf_file']['name'];

				 $ext1 = substr(strtolower(strrchr($file1, '.')), 1);

                 $arr_ext1 = array('pdf');

                    if (in_array($ext1, $arr_ext1)) {

						$filename1 = time() . $this->request->data['Certificate']['pdf_file']['name'];

						 move_uploaded_file($this->request->data['Certificate']['pdf_file']['tmp_name'],"img/references/pdf/" . $filename1);
					}
						//$data['Pdf']['title'] = $this->request->data['Pdf']['title'];
						 if(!empty($filename1)){
						 $data['Certificate']['pdf_file'] = $filename1;
						 }
						
$data['Certificate']['title'] = $this->request->data['Certificate']['title'];
						if ($this->Certificate->save($data)) {

								$this->Session->setFlash('You have successfully updated the certificate.');

								$this->redirect(array('controller' => 'sponsors', 'action' => 'admin_certificateListing'));

						}

					

				else{

				$this->Session->setFlash('Pdf has been updated successfully');

				$this->redirect(array('controller' => 'trainings', 'action' => 'admin_pdfListing'));
				}				

			}

		}
		
		function admin_certificateDelete($id = NULL) {

		$this->autoRender = FALSE;

		if ($this->Certificate->delete($id)) {

			$this->Session->setFlash('You have successfully deleted certificate');

			$this->redirect($this->referer());

		}

	}


}

?>