<?php





class TrainingsController extends AppController{


	var $uses = array('Pdf','PdfImage','PdfDocument');


	var $components = array('Auth', 'Session', 'Email', 'RequestHandler');


	


	function beforeFilter() {


		parent::beforeFilter();


	


		$this->Auth->allow('training_reference_materials','handbook_network_rail','handbooks_london','network_rail','pts_card','sentinel','industryCommonInduction','workingonrail','drugalcohol_and_railmedical','drugalcoholtesting','drugalcohol');


	}


	


function admin_pdfAdd(){


		$this->layout="admin";


		//$title = $this->request->data['Pdf']['title'];


		if(!empty($this->request->data)){


			if (!empty($this->request->data['Pdf']['image']['name'])){


                $file =$this->request->data['Pdf']['image']['name'];


                $ext = substr(strtolower(strrchr($file, '.')), 1);


                $arr_ext = array('pdf','jpg','png', 'doc', 'docx', 'txt');


                if (in_array($ext, $arr_ext)) {


                $filename = time() . $this->request->data['Pdf']['image']['name'];


                 move_uploaded_file($this->request->data['Pdf']['image']['tmp_name'], "img/references/image/" . $filename);


                 $data['Pdf']['image'] = $filename;
                 	}
                 }

                 $file1 = $this->request->data['Pdf']['pdf_file']['name'];


				 $ext1 = substr(strtolower(strrchr($file1, '.')), 1);


                    $arr_ext1 = array('pdf', 'doc', 'docx');


                    if (in_array($ext1, $arr_ext1)) {


						$filename1 = time() . $this->request->data['Pdf']['pdf_file']['name'];


						 move_uploaded_file($this->request->data['Pdf']['pdf_file']['tmp_name'],"img/references/pdf/" . $filename1);


						$data['Pdf']['title'] = $this->request->data['Pdf']['title'];


						$data['Pdf']['pdf_file'] = $filename1;


						if ($this->Pdf->saveAll($data)) {


								$this->Session->setFlash('You have successfully added the file.');


								$this->redirect(array('controller' => 'trainings', 'action' => 'admin_pdfListing'));


						}else{


							$this->Session->setFlash('The file could not be saved.');


						}


					}


				}


				// else{


				// 	$this->Session->setFlash('The file could not be saved.');


				//}


			//}


		//}


	} 


	


	function admin_pdfListing(){


		$this->layout ="admin";


		$order = array('Pdf.id' => 'DESC');


		$this->paginate = array(


			'order' => $order,


			'limit' => 20


		);


		$docs = $this->paginate('Pdf');


		//pr($pdf); die;


		$this->set(compact('docs'));


	}


	function admin_pdfView($id=NULL){


		$this->layout ="admin";


		$pdfview = $this->Pdf->find('first',array('conditions'=>array('Pdf.id' => $id)));


		$this->set(compact('pdfview'));


		//pr($pdfdetail); die;


	}





	function admin_pdfEdit($id = NULL){


		$this->layout="admin";


		$pdfDetails = $this->Pdf->find('first' , array('conditions'=> array('Pdf.id'=>$id)));


		$this->set(compact('pdfDetails'));


		if(!empty($this->request->data)){


			$this->Pdf->id = $id;


				$file =	$this->request->data['Pdf']['image']['name'];


                $ext = substr(strtolower(strrchr($file, '.')), 1);


                $arr_ext = array('pdf','jpg','png', 'doc', 'docx', 'txt');


                if (in_array($ext, $arr_ext)) {


                $filename = time() . $this->request->data['Pdf']['image']['name'];


                 move_uploaded_file($this->request->data['Pdf']['image']['tmp_name'], "img/references/image/" . $filename);
                  $data['Pdf']['image'] = $filename;

                 	}
                

                 $file1 = $this->request->data['Pdf']['pdf_file']['name'];


				 $ext1 = substr(strtolower(strrchr($file1, '.')), 1);


                 $arr_ext1 = array('pdf', 'doc', 'docx');


                    if (in_array($ext1, $arr_ext1)) {


						$filename1 = time() . $this->request->data['Pdf']['pdf_file']['name'];


						 move_uploaded_file($this->request->data['Pdf']['pdf_file']['tmp_name'],"img/references/pdf/" . $filename1);
						 $data['Pdf']['pdf_file'] = $filename1;
						 	}

						//$data['Pdf']['title'] = $this->request->data['Pdf']['title'];


						


						if ($this->Pdf->save($data)) {


								$this->Session->setFlash('You have successfully updated the file.');


								$this->redirect(array('controller' => 'trainings', 'action' => 'admin_pdfListing'));


						}


					//}


				else


				$this->Session->setFlash('Pdf has been updated successfully');


				$this->redirect(array('controller' => 'trainings', 'action' => 'admin_pdfListing'));				


			}


		}


	function admin_pdfDelete($id = NULL) {


		$this->autoRender = FALSE;


		if ($this->Pdf->delete($id)) {


			$this->Session->setFlash('You have successfully deleted file');


			$this->redirect($this->referer());


		}


	}


	


	function training_reference_materials(){


		$this->layout ="Home";


		$pdf = $this->Pdf->find('all');


		//pr($gallery); die();


		$this->set(compact('pdf'));


	}


	function handbook_network_rail(){


		$this->layout ="Home";


		$order = array('Pdf.id' => 'DESC');


		$pdfDetails = $this->Pdf->find('all',array('order'=>$order,'conditions'=>array('Pdf.title'=>'Handbooks- Network Rail')));


		$this->set(compact('pdfDetails'));


	


	}


	function handbooks_london(){


		$this->layout="Home";


		$order = array('Pdf.id' => 'DESC');


		$pdfDetails = $this->Pdf->find('all', array('order'=>$order,'conditions'=>array('Pdf.title'=>'Handbooks - London Underground')));


		$this->set(compact('pdfDetails'));


	}


	function network_rail(){


		$this->layout="Home";


		$order = array('Pdf.id' => 'DESC');


		$pdfDetails = $this->Pdf->find('all', array('order'=>$order,'conditions'=>array('Pdf.title'=>'Keypoints Card - Network Rail')));


		$this->set(compact('pdfDetails'));


	}


	function sentinel(){


		$this->layout="Home";


		$order = array('Pdf.id' => 'DESC');


		$pdfDetails = $this->Pdf->find('all', array('order'=>$order,'conditions'=>array('Pdf.title'=>'SENTINEL')));


		$this->set(compact('pdfDetails'));


	}


	function pts_card(){


		$this->layout="Home";


	}


	function industryCommonInduction(){


		$this->layout="Home";


		


	}
	function workingonrail(){
		$this->layout="Home";
	}

	function drugalcohol_and_railmedical(){

		$this->layout="Home";

		$order = array('Pdf.id' => 'DESC');

		$pdfDetails = $this->Pdf->find('all', array('order'=>$order,'conditions'=>array('Pdf.title'=>'Rail Medical Standards')));
		$drugPdfDetails = $this->Pdf->find('all', array('order'=>$order,'conditions'=>array('Pdf.title'=>'Drug & Alcohol FAQs')));
		//pr($pdfDetails); die;
		$this->set(compact('pdfDetails','drugPdfDetails'));

		

	}
	
	function drugalcoholtesting(){

		$this->layout="Home";

		$order = array('Pdf.id' => 'DESC');

		$pdfDetails = $this->Pdf->find('all', array('order'=>$order,'conditions'=>array('Pdf.title'=>'Drug and Alcohol Testing')));
		//pr($pdfDetails); die;
		$this->set(compact('pdfDetails'));

	}

}


?> 