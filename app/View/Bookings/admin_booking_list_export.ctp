<?php


  $header_row = array("S.No.", "Booking Date","Booking ID","Payment Status","Course Name");
 $this->CSV->addRow($header_row);

     



$i=1;
 foreach($bookinglist as $result){ 
 
  
	$transaction_datetime_txt =  $result['TransactionLog']['transaction_datetime_txt']; 
    $order_id =  $result['TransactionLog']['order_id']; 
   
    if($result['TransactionLog']['status']=="Declined"){
      $status =  "Pending"; 
    }else{
     $status = $result['TransactionLog']['status'];
   }
    $course_name = $result['Course']['course_name'];


 
    
    $id =  $i;
    $header_row1 = array($id, $transaction_datetime_txt,$order_id,$status,$course_name);
     $this->CSV->addRow($header_row1);


  $i++;  } 
$filename='BookingListing';
 echo  $this->CSV->render($filename);
   die();
?>