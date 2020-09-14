<?php


  $header_row = array("S.No.", "Location Name");
 $this->CSV->addRow($header_row);

     



$i=1;
 foreach($locationList as $result){ 
 
  
	
    $location =  $result['Location']['location']; 
  
   
 
    
    $id =  $i;
    $header_row1 = array($id, $location);
     $this->CSV->addRow($header_row1);


  $i++;  } 
$filename='LocationListing';
 echo  $this->CSV->render($filename);
   die();
?>