<?php


  $header_row = array("S.No.", "Sector Name");
 $this->CSV->addRow($header_row);

     



$i=1;
 foreach($sectorList as $result){ 
 
  
	$Sname = $result['Sector']['sector_name'];
   
 
    
    $id =  $i;
    $header_row1 = array($id, $Sname);
     $this->CSV->addRow($header_row1);


  $i++;  } 
$filename='SectorListing';
 echo  $this->CSV->render($filename);
   die();
?>