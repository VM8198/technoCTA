<?php


  $header_row = array("S.No.", "Sector Name","Location","Course Name","Duration");
 $this->CSV->addRow($header_row);

     



$i=1;
 foreach($courseList as $result){ 
 
  
	$secName =  $result['Sector']['sector_name']; 
    $location =  $result['Location']['location']; 
    $courseName =  $result['Course']['course_name']; 
    $duration = $result['Course']['duration'];
   
 
    
    $id =  $i;
    $header_row1 = array($id, $secName,$location,$courseName,$duration);
     $this->CSV->addRow($header_row1);


  $i++;  } 
$filename='ArchiveListing';
 echo  $this->CSV->render($filename);
   die();
?>