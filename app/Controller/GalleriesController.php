<?php

Class GalleriesController extends AppController {

    var $uses = array('Gallery','GalleryImage');
    var $components = array('Auth', 'Session', 'Email', 'RequestHandler');

    function beforeFilter() {
        $this->Auth->allow();
    }

//function admin_galleryAdd() {
//    $this->layout = 'admin';
//    if (!empty($this->request->data)) {
//        //pr($this->request->data); die();
//        if (!empty($this->request->data['Gallery']['image']['name'])) {
//            $allowextension = array('jpg', 'png','jpeg');
//            $temp = explode(".", $this->request->data['Gallery']['image']['name']);
//            $extension = end($temp);
//            $filename = time() . $this->request->data['Gallery']['image']['name'];
//            //pr($filename); die();
//            move_uploaded_file($this->request->data['Gallery']['image']['tmp_name'], "img/" . $filename);
//            $this->request->data['Gallery']['image'] = $filename;
//            $this->request->data['Gallery']['title'] = $this->request->data['Gallery']['title'];
//        }
//        if ($this->Gallery->save($this->request->data)) {
//            $this->Session->setFlash('You have successfully added the image.');
//            $this->redirect(array('controller' => 'galleries', 'action' => 'admin_galleryListing'));
//        }
//    }
//}
    
    function admin_galleryAdd(){
        
        $this->layout="admin";
        if (!empty($this->request->data)) {
            if ($this->Gallery->save($this->data)) {
                $GalleryId = $this->Gallery->getLastInsertID();
                if (!empty($GalleryId)) {
                    $allowedExts = array("gif", "jpeg", "JPG", "jpg", "png");
                    foreach ($this->request->data['GalleryImage']['image'] as $value) {
                        $temp = explode(".", $value["name"]);
                        $extension = end($temp);
                        $filename = time() . $value["name"];
                        move_uploaded_file($value["tmp_name"], "img/galleryimage/" . $filename);
                        $data['GalleryImage']['image'] = $filename;
                        $data['GalleryImage']['gallery_id'] = $GalleryId;
                        $this->GalleryImage->create();
                        $this->GalleryImage->saveAll($data);
                    }
                }
                $this->Session->setFlash('Gallery has been added successfully');
                $this->redirect(array('controller' => 'galleries', 'action' => 'admin_galleryListing'));
            }
        }
    }
    function admin_galleryListing() {
        $this->layout = 'admin';
        $order = array('Gallery.id' => 'DESC');
        $this->paginate = array(
            'order' => $order,
            'limit' => 10
        );
        $gallery = $this->paginate('Gallery');
        //pr($gallery);        exit();
        $this->set(compact('gallery'));
    }

   function admin_deleteGallImage($id = null) {
    $this->autoRender = false;        
        if($this->GalleryImage->delete($id)){
          
          $this->redirect($this->referer());
       }
    }

    function admin_galleryEdit($id = NULL) {
        $this->layout = "admin";
        $galleryImage = $this->GalleryImage->find('all', array('conditions' => array('GalleryImage.gallery_id' => $id)));
        $galleryDetail = $this->Gallery->find('first', array('conditions' => array('Gallery.id' => $id)));

        $this->set(compact('galleryDetail', 'galleryType', 'galleryStatus','galleryImage'));
        if (!empty($this->request->data)) {
            $this->Gallery->id = $id;
            if ($this->Gallery->save($this->data)) {

                $allowedExts = array("gif", "jpeg", "JPG", "jpg", "png");
                if (!empty($this->request->data['GalleryImage']['image'][0]['name'])) {
                    foreach ($this->request->data['GalleryImage']['image'] as $value) {
                        $temp = explode(".", $value["name"]);
                        $extension = end($temp);
                        $filename = time() . $value["name"];
                        move_uploaded_file($value["tmp_name"], "img/galleryimage/" . $filename);
                        $data['GalleryImage']['image'] = $filename;
                        $data['GalleryImage']['gallery_id'] = $id;
                        $this->GalleryImage->create();
                        $this->GalleryImage->saveAll($data);
                    }
                }

                $this->Session->setFlash('Gallery has been updated successfully');
                $this->redirect(array('controller' => 'galleries', 'action' => 'admin_galleryListing'));
            }
        }
    }
    
    function admin_galleryView($id =Null){
        $this->layout="admin";
        $posttitle = $this->Gallery->find('first',array('conditions' => array('Gallery.id' => $id)));
        $gallery = $this->GalleryImage->find('all',array('conditions' => array('GalleryImage.gallery_id' => $id)));
        //pr($gallery); die;
        $this->set(compact('gallery','posttitle'));
        
    }
    
     function admin_galleryDelete($id = NULL) {
        $this->autoRender = FALSE;
        if ($this->Gallery->delete($id)) {
            $this->Session->setFlash('Gallery has been deleted successfully ');
            $this->redirect(array('controller' => 'galleries', 'action' => 'admin_galleryListing'));
        }
    }
     function gallery(){
        $this->layout="Home";
		$gallery = $this->Gallery->find('all',array('order' => array('Gallery.id' =>'DESC')));
		//pr($gallery); die();
		$this->set(compact('gallery'));
    }
}