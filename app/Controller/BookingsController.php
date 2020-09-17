<?php



class BookingsController extends AppController{

    var $uses = array('Booking','Course','User','TransactionLog','Location','Sector') ;

    var $components = array('Auth', 'Session', 'Email', 'RequestHandler');
	var $helpers = array('Html', 'Form','Csv');
    

    function beforeFilter() {

        parent::beforeFilter();

        

        $this->Auth->allow('admin_deleteBooking','admin_export');

    }

//   function admin_bookingList($id = NULL) {

//         $this->layout = "admin";

// 		//$order = array('Booking.id'=>'DESC');

		

// 		$this->paginate = array(



// 			'Limit'=>10

// 		);

// 		$bookinglist = $this->paginate('Booking');

// 		//pr($bookinglist); die();

// 		$this->set(compact('bookinglist'));

//     }

    function admin_bookingList($id = NULL) {
        $this->layout = "admin";
		//pr($this->request->data); die;
		$payStatus = $this->TransactionLog->find('all', array('fields' => array('DISTINCT TransactionLog.status'),'conditions'=>array('TransactionLog.status !='=>'AuthCode: 376297')));
		$course_list = $this->Course->find('all',array('conditions'=>array('Course.is_active'=>"0"),'order'=> array('Course.course_name'=> 'ASC')));

		//$end = date('Y-m');
		$end = date("Y-m", strtotime("+1 month"));
		$start = date("Y-m", strtotime("-1 month"));

		$getValue = array();
        $getvalue = $_GET;
       // pr($getvalue); die;
		$filterval = array_filter($_GET);
		$result = array();
		 //pr($filterval); die;
		foreach ($filterval as $key => $val) {
            if ($key == "status") {
                if($val=="Declined"){
					$result['TransactionLog.status'] = "Declined";
				}else{
					 $result['TransactionLog.status'] = $val;
				}
            }elseif($key == "course_name"){
            	$result['Course' . '.' . $key] = $val;  
            }elseif($key == "booking_date"){
            	$date = date('Y-m-d',strtotime($val));
            	$result['TransactionLog.transaction_datetime_txt like'] = $date."%" ;
            }else{
				$result[$key] = $val;
			}
		}
		if (!empty($filterval)) {

            $conditions[] = $result;
            $conditions[] = array('TransactionLog.transaction_datetime <' => $end, 'TransactionLog.transaction_datetime >=' => $start);  
        } else {
		$conditions[] = array('TransactionLog.status !=' =>'AuthCode: 376297');
		$conditions[] = array('TransactionLog.transaction_datetime <' => $end, 'TransactionLog.transaction_datetime >=' => $start);  
        }
		//pr($result); die;
	//pr($conditions);die();
		$order = array('TransactionLog.id'=> 'DESC');
		$this->paginate = array(
			'conditions' => $conditions,

			'order' => $order,
			'limit' => 20

		);

		
		$bookinglist =  $this->paginate('TransactionLog');
		//pr($bookinglist);
		$locationNameArr = array(); 
		foreach ($bookinglist as $bookinglistV) {
			$locID = $bookinglistV['Course']['location_id'];
		
		$locationNameArr[] = $this->Location->find('first',array('conditions' => array('Location.id' => $locID)));
		}

	
        $this->set(compact('bookinglist','payStatus','getvalue','course_list','locationNameArr'));

    }

    function admin_bookingListExport(){
    		$this->layout="admin";

		$sector = $this->Sector->find('all');
	$end = date("Y-m", strtotime("+1 month"));
		$start = date("Y-m", strtotime("-1 month"));
		$getValue = array();
        $getvalue = $_GET;
       // pr($getvalue); die;
		$filterval = array_filter($_GET);
		$result = array();
		 //pr($filterval); die;
		foreach ($filterval as $key => $val) {
            if ($key == "status") {
                if($val=="Declined"){
					$result['TransactionLog.status'] = "Declined";
				}else{
					 $result['TransactionLog.status'] = $val;
				}
            }elseif($key == "course_name"){
            	$result['Course' . '.' . $key] = $val;  
            }elseif($key == "booking_date"){
            	$date = date('Y-m-d',strtotime($val));
            	$result['TransactionLog.transaction_datetime_txt like'] = $date."%" ;
            }else{
				$result[$key] = $val;
			}
		}
		if (!empty($filterval)) {

            $conditions[] = $result;
            $conditions[] = array('TransactionLog.transaction_datetime <' => $end, 'TransactionLog.transaction_datetime >=' => $start);  
        } else {
		$conditions[] = array('TransactionLog.status !=' =>'AuthCode: 376297');
		$conditions[] = array('TransactionLog.transaction_datetime <' => $end, 'TransactionLog.transaction_datetime >=' => $start);  
        }
		
		$order = array('TransactionLog.id'=> 'DESC');
		$bookinglist = $this->TransactionLog->find('all', array('conditions'=>$conditions,'order' => $order));
		//pr($bookinglist);die();
		// $this->paginate = array(
		// 	'conditions' => $conditions,

		// 	'order' => $order,
		// 	'limit' => 10

		// );

		
		// $bookinglist =  $this->paginate('TransactionLog');

	$this->set(compact('bookinglist','getvalue','sector'));
    }


    function admin_bookingHistory(){
    $this->layout = "admin";

	$payStatus = $this->TransactionLog->find('all', array('fields' => array('DISTINCT TransactionLog.status'),'conditions'=>array('TransactionLog.status !='=>'AuthCode: 376297')));
	$course_list = $this->Course->find('all',array('conditions'=>array('Course.is_active'=>"0"),'order'=> array('Course.course_name'=> 'ASC')));

	$start = date("d-m-y", strtotime("-1 month"));
pr($start);
	$getValue = array();
        $getvalue = $_GET;
       // pr($getvalue); die;
		$filterval = array_filter($_GET);
		$result = array();
		foreach ($filterval as $key => $val) {
            if ($key == "status") {
                if($val=="Declined"){
					$result['TransactionLog.status'] = "Declined";
					$result['TransactionLog.transaction_datetime  <='] = $start; 
				}else{
					$result['TransactionLog.status'] = $val;
					$result['TransactionLog.transaction_datetime  <='] = $start; 
				}
            }elseif($key == "course_name"){
            	$result['Course' . '.' . $key] = $val;  
            	$result['TransactionLog.transaction_datetime  <='] = $start;  
            }elseif($key == "booking_date"){
            	$var2 = date('m-Y',strtotime($val));
            	$date = explode("-", $var2);
            	$result['Month(TransactionLog.transaction_datetime_txt)'] = $date[0];
            	$result['Year(TransactionLog.transaction_datetime_txt)'] = $date[1];
            	$result['TransactionLog.transaction_datetime  <='] = $start; 
            }else{
				$result[$key] = $val;
				$result['TransactionLog.transaction_datetime  <='] = $start; 
			}
		}
		if (!empty($filterval)) {
            $conditions = $result;
        } else {
			$conditions[] = array('TransactionLog.status !=' =>'AuthCode: 376297');
       		$conditions[] = array('TransactionLog.transaction_datetime <=' => $start);
        }

    


	$order = array('TransactionLog.id'=> 'DESC');
	unset($conditions['url']);
	unset($conditions['TransactionLog.transaction_datetime  <=']);
	unset($conditions['Month(TransactionLog.transaction_datetime_txt)']);
	unset($conditions['Year(TransactionLog.transaction_datetime_txt)']);
	 

	$pArray = array(
			'conditions' => $conditions,
			'order' => $order,
			'limit' => 20

		);

		$this->paginate = $pArray;
		// pr($pArray);

		$bookinglist =  $this->paginate('TransactionLog');
		// pr($bookinglist);
		// date(format)ie;
	$locationNameArr = array(); 
		foreach ($bookinglist as $bookinglistV) {
			$locID = $bookinglistV['Course']['location_id'];
		
		$locationNameArr[] = $this->Location->find('first',array('conditions' => array('Location.id' => $locID)));
		}
	// 	pr($locationNameArr); die;
        $this->set(compact('bookinglist','getvalue','course_list','payStatus','locationNameArr'));
    }



    function admin_viewBooking($id = NULL) {

        $this->layout = "admin";

        $BookingDetail = $this->TransactionLog->find('first', array('conditions' => array('TransactionLog.id' => $id)));

        //pr($BookingDetail); die();

        $this->set(compact('BookingDetail'));

    }

	function admin_archiveExport(){
		
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
			}else{
				$result['Course.sector_id'] = $val;
			}
		}

		if (!empty($filterval)) {
		$conditions[] = $result;
 		 $conditions[] = array('Course.archive' => 1);
 		
        } else {
		       $conditions = 	array (
		        'OR' => array(
		            'Course.archive' => 1,
		           'Course.archivedate !=' => '',
		        )

		    );

			}
			   $order = array('Course.updated'=>'DESC');
	$courseList = $this->Course->find('all', array('conditions'=>$conditions,'order' => $order));
	
		  //$this->paginate = array(
			//'conditions'=>$conditions,
			//'order' => $order,
			//'limit' => 10
		//);

		//$courseList = $this->paginate('Course');
		//pr($courseList);
	$this->set(compact('courseList','getvalue','sector'));
	}
	
	
	function admin_archiveList(){

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
			}else{
				$result['Course.sector_id'] = $val;
			}
		}

		if (!empty($filterval)) {
		$conditions[] = $result;
 		 $conditions[] = array('Course.archive' => 1);
 		
        } else {
		       $conditions = 	array (
		        'OR' => array(
		            'Course.archive' => 1,
		           'Course.archivedate !=' => '',
		        )

		    );

			 // $conditions[] = array('Course.archive' => 1);
			 // $conditions[] = array('Course.archivedate' => '');
			}
			//pr($conditions);//die();
	   $order = array('Course.updated'=>'DESC');
		  $this->paginate = array(
			'conditions'=>$conditions,
			'order' => $order,
			'limit' => 20
		);

		$courseList = $this->paginate('Course');
		//pr($courseList);
	$this->set(compact('courseList','getvalue','sector'));
	}



	 function admin_deleteBooking($id = NULL) {

		$this->autoRender = FALSE;

		if ($this->TransactionLog->delete($id)) {

			$this->Session->setFlash('You have successfully deleted bookings detail');
			 $this->redirect($this->referer());
			//$this->redirect(array('controller' => 'bookings', 'action' => 'admin_bookingList'));

		}

	}
	
	function admin_export()
	{
		$this->response->download("Bookingdetail.csv");

		$data = $this->TransactionLog->find('all',array('fields'=>array("TransactionLog.id","TransactionLog.user_id","TransactionLog.course_id","TransactionLog.order_id","TransactionLog.amount_major","TransactionLog.status","TransactionLog.transaction_datetime_txt","TransactionLog.gateway_message","TransactionLog.integration_type")));
		//pr($data); die;
		$this->set(compact('data'));

		$this->layout = 'ajax';

		return;
		
	}
	
	/* function admin_searchBooking(){
		$this->autoRender = FALSE;
		//$order = $this->request->data['Booking']['order_id']= $this->request->data['Booking']['order_id'];
		pr($this->request->data); die;
	} */

	

}

