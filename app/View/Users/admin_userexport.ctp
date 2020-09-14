<?php


  $header_row = array("S.No.", "Individual Name", "Email", "Gender","Phone","Age","Ethnic","Disability");
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
 foreach($userList as $result){ 
 
  
  $name = $result['User']['first_name']." ".$result['User']['last_name'];
    $email = $result['User']['email_id'];
    $gender = $result['User']['gender'];
    $phone = $result['User']['phone'];
    $age = $result['User']['age'];
    $ethnic = $result['User']['ethnic'];
    $disability = $result['User']['disability'];
    
    $id =  $i;
    $header_row1 = array($id, $name,$email, $gender,$phone,$age,$ethnic,$disability);
     $this->CSV->addRow($header_row1);


  $i++;  } 
$filename='IndividualUser';
 echo  $this->CSV->render($filename);
   die();
?>