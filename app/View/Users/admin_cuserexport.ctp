<?php


  $header_row = array("S.No.", " Name ", " Email   ","Phone      ","Company Name","Company Position");
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
  
    $phone = $result['User']['phone'];
    $company = $result['User']['company'];

    $company_position = $result['User']['company_position'];
    
    $id =  $i;
    $header_row1 = array($id, $name,$email,$phone,$company,$company_position);
     $this->CSV->addRow($header_row1);


  $i++;  } 
$filename='CompanyListing';
 echo  $this->CSV->render($filename);
   die();
?>