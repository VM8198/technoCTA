<?php

 $line= $orders[0]['TransactionLog'];
  $header_row = array("Booking ID","Name","Gender","Email","Company Name","Age","Booking Date", "Course Name", "Location", "Status", "Course Fee");
 $this->CSV->addRow($header_row);
 // foreach ($orders as $order)
 // {
 //      $line = $order['TransactionLog'];
 //       $this->CSV->addRow($line);
     
 // }
 // $filename='TransactionLog';
 // echo  $this->CSV->render($filename);
   

//    foreach ($orders as $row):
// 	foreach ($row['course_id'] as &$cell):
// 		// Escape double quotation marks
// 		$cell = '"' . preg_replace('/"/','""',$cell) . '"';
// 	endforeach;
// 	echo implode(',', $row['course_id']) . "\n";
// endforeach;


$i=1;
 foreach($orders as $result){ 
 
  if($result['TransactionLog']['status']=="Declined"){
    $statuss = "Pending"; }else{ $statuss = $result['TransactionLog']['status'];
  }
   if($result['Course']['location_id']="1"){
    $location =  "London";
     } 
   if(!empty ($result['Course']['delegate_price'])){
     $cfee =  $result['Course']['delegate_price'];
      }
    $line = $result['Course']['course_name'];
    $date = date('d-m-Y', strtotime($result['TransactionLog']['transaction_datetime_txt']));
    $id =  $result['TransactionLog']['order_id'];
  $name = $result['User']['first_name']." ".$result['User']['last_name'];
    $email = $result['User']['email_id'];
     $company = $result['User']['company'];
     $gender = $result['User']['gender'];
    $age = $result['User']['age'];
    $header_row1 = array($id,$name,$gender,$email,$company,$age, $date,$line, $location, $statuss, $cfee);
     $this->CSV->addRow($header_row1);


  $i++;  } 
$filename='TransactionLog';
 echo  $this->CSV->render($filename);
   
?>