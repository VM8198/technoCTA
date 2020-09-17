<?php echo $this->Html->script('jquery.min.js');?>
<script>
    var SITEPATH = '<?php echo SITEPATH; ?>';
    //alert(SITEPATH);
</script>
<?php $site = SITEPATH; 
//echo $site; ?>
<?php
  if($this->Session->read('Auth')){
    $authId = $_SESSION['Auth']['User']['id'];
    $authFirstName = $_SESSION['Auth']['User']['first_name'];
    $authLastName = $_SESSION['Auth']['User']['last_name'];
    //echo $id;
  }
?>
<!-- Breadcrumb section -->
<div class="site-breadcrumb">
  <div class="container"> <a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index'));?>"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i> <span>Railway Safety</span> </div>
</div>
<!-- Breadcrumb section end -->

<section id="inner-headline-gallery" class="railway-page">
  <div class="carousel-text" align="center">
    <h1>Railway <strong>Safety</strong></h1>
  </div>
</section>
<div class="container" id="book_now">
  <div class="col-sm-12">
    <div class="row right-side"  id="newdataId">
     <!-- <div class="col-sm-2 pading-0">
        <div class="left-side">
           <button class="accordion" id="getpredata" name ="getpredata" onclick="getnewdata();" data-toggle="modal" data-target="#requiste" >Pre-Requisite</button>
        
          <button class="accordion" id="sectorId" name="sectorId"  data-toggle="modal" data-target="#upcoming"> Upcoming Courses</button>
         </div>
      </div>-->
  
          <div class="right-sides">
            <h2>Filter these courses by date range, course name or location</h2>
            <?php echo $this->Form->create('Course', array('controller' => 'courses', 'action' => 'railway_safety','type' => 'get', 'id' => 'search_course')); ?>
            <div class="row">
              <div class="col-sm-3">
                <div class="calender">
                  <input type="text" autocomplete="off" class="form-control testdate" data-toggle="datepicker" name="start_date" value="<?php if(!empty($getvalue['start_date'])) { echo ($getvalue['start_date']); } else { echo ""; } ?>" id="search" placeholder="Course Date">
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                </div>
              </div>
              <!--<div class="col-sm-3">
                <div class="calender">
                  <input type="text" autocomplete="off" class="form-control testdate" data-toggle="datepicker"  name="end_date" value="<?php //if(!empty($getvalue['end_date'])) { echo ($getvalue['end_date']); } else { echo ""; } ?>"  placeholder="End Date">
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                </div>
              </div>-->
         <div class="col-sm-3">
                <Select type="text" class="form-control" name="id">
                  <option value="">Course</option>
                  <?php foreach($course as $result) { ?>
                  <option value="<?php echo $result['Course']['id']; ?>"><?php echo $result['Course']['course_name']; ?></option>
                  <?php } ?>
                </Select>
              </div>
              <div class="col-sm-3">
                <Select type="text" class="form-control" name="location_id">
                  <option value="">Location</option>
                  <?php foreach($location as $result) { ?>
                  <option value="<?php echo $result['Location']['id']; ?>"><?php echo $result['Location']['location']; ?></option>
                  <?php } ?>
                </Select>
              </div>
              <div class="col-sm-3">
                <input type="submit" class="btn btn-success" value="Filter">
              </div>
            
            </div>
            <?php echo $this->form->end(); ?>
          </div>
          
          <!-- filter course -->
          <div class="table-responsive" id="coursename">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Course</th>
                <th>Duration</th>
                <th>Location</th>
                <th>No. of Delegates<br>per Session</th>
                <th>Price Per Delegates<br>excl VAT</th>
                <th>Expiry<br>Competence </th>
                <th>Course Date</th>
                <th>Start Time</th>
        <th>End Time</th>
                <th>Book Now</th>
         <th>Instruction</th>
              </tr>
            </thead>
            <tbody id="newCourse">
              <?php $i=1; foreach($course as $value) { ?>
                <tr>
          <td><?php echo $value['Course']['course_name']; ?></td>
          <td><?php echo $value['Course']['duration']; ?></td>
          <td><?php echo $value['Location']['location']; ?></td>
          <td><?php echo $value['Course']['delegates_no']; ?></br>
            <div style="color:#449ac6;font-size:13px;">
              <?php $count1 = $value['Course']['delegates_no'] - sizeof($value['TransactionLog']); 
              // pr(sizeof($value['TransactionLog'])); 
              if($count1==1){
                    echo "1 Space left.";
                  }else{
                  if($count1>0){
                    echo $count1 ." Spaces left";
                  }else{
                    echo "No space";
                  }
                  }
     //        if($authId == true) { 
     //         if($_SESSION['Auth']['User']['user_type']=="User"){
     //          if($count1==1){
          //  echo "1 Space left.";
          // }else{
          //  if($count1>0){
          //    echo $count1 ." Spaces left";
          //  }else{
          //    echo "No space";
          //  }
          // }
     //    }
     //    if($_SESSION['Auth']['User']['user_type']=="Company"){
     //        if($count1==4){
     //        echo "1 Space left.";
     //      }else{
     //        if($count1>=4){
     //          echo $count1 ." Spaces left";
     //        }else{
     //          echo "No space";
     //        }
     //      }
     //    }
     //  }
          ?>
          </div>
        </td>
          <td><span>&#163;</span><?php echo $value['Course']['delegate_price']; ?></td>
          <td><?php echo $value['Course']['expiry']; ?></td>

          <?php if($authId == true) { ?>
          <?php if($_SESSION['Auth']['User']['user_type']=="User"){?>
            <td><?php $date =explode( ',',$value['Course']['start_date']);
            ?>
          <Select type="text" class="form-control space-text" id="<?php echo $value['Course']['id']; ?>" style="width:122px;font-size: 13px;" onChange="ingdatefunction(this);">
                  <option value="" selected>Course Date</option>
                  <?php 
    
                  foreach($date as $result) { 
                        //$today =  date("d/m/Y");
                         //$currentMonth = date("m");
                       // echo $currentMonth;
                      //  $database =  date($result);
                      // echo $today." ";
                      // echo  $database ." ";
                       // $today =  date();
                       //$result1 = strtotime($result); 
                       // $today2 = strtotime($today); 
 //echo abs($result1 - $today2)." ";
                  // $endDate = date("d/m/Y", strtotime($result));
                   // echo  $endDate." ";

                  //echo $result." ";
                   // echo date_format($result1,"d/m/Y");
                    // $resultMonth = date( 'm', strtotime($result ));
                    // echo $resultMonth;
                   // $date = new DateTime($result);

                // $datediff =    $database - $today;
                 //echo $datediff;

// if($datediff > 0) 
              
//                {
 $date = str_replace('/', '-', $result);
                $curdate =  date('Y-m-d', strtotime($date));
                $date1 = str_replace('-', '',$curdate);
                if($date1 >= date('Ymd')){
                     ?>
 <option value="<?php echo $result; ?>"><?php echo $result; ?></option>
                  <?php } } 
                    //   } ?>
                </Select></td>
          <?php }?>
          <?php if($_SESSION['Auth']['User']['user_type']=="Company"){?>
            <td><?php $date =explode( ',',$value['Course']['start_date']);?>
          <Select type="text" class="form-control space-text" id="<?php echo $value['Course']['id']; ?>" style="width:122px;font-size: 13px;" onChange="datefunction(this);">
                  <option value="" selected>Course Date</option>
                  <?php foreach($date as $result) {
                //  echo   $olddate =  trim($result); 
                // echo" ";
                //   echo  $today1 =  date("d/m/Y");
                //  //   echo" ";
                //  // echo   $today2 = strtotime($today1);
                //  //  echo" ";
                //  // echo   $olddate1 = strtotime($olddate);
                //    if($olddate  > $today1){
                //     echo $olddate;
                //    }
                // @alka
                $date = str_replace('/', '-', $result);
                $curdate =  date('Y-m-d', strtotime($date));
                $date1 = str_replace('-', '',$curdate);
                 if($date1 >= date('Ymd')){
                    //  @alka
                    ?>
                  <option value="<?php echo $result; ?>"><?php echo $result; ?></option>
                  <?php }  
                  //@alka
                  } ?>
                </Select></td>
          <?php }?>
          
        <?php } else{ ?>
          <td><?php $date =explode( ',',$value['Course']['start_date']);?>

            <Select type="text" class="form-control space-text" id="<?php echo $value['Course']['id']; ?>" style="width:122px;font-size: 13px;" onChange="datefunction(this);">
                  <option value="" selected>Course Date</option>
                  <?php foreach($date as $result) {
                 $date = str_replace('/', '-', $result);
                $curdate =  date('Y-m-d', strtotime($date));
                
                  $date1 = str_replace('-', '',$curdate);
                 if($date1 >= date('Ymd')){
                  ?>
                  
                  <option value="<?php echo $result; ?>"><?php echo $result; ?></option>
                  <?php } } ?>
                </Select>

        <!--  <Select type="text" class="form-control" id="<?php //echo $value['Course']['id']; ?>" style="width:100px;font-size: 13px;"  data-toggle="modal" data-target="#myModal">
                  <option disabled="disabled" selected="selected" style="display:none">Course Date</option>
                 </Select> --></td>
             
          <?php }?>
          <td class="datess" id="dp<?php echo $value['Course']['id']; ?>"><?php //echo $value['Course']['start_time']; ?>
         
          </td>  
          <td style="display:none;">
          <?php for($i=0;$i<=20;$i++){ ?>
            <input type="hidden" id="<?php $time =explode( ',',$value['Course']['start_date']); print_r($time[$i]);?>" Value="<?php $time =explode( ',',$value['Course']['start_time']); print_r($time[$i]);?> ">
          <?php } ?>
          </td>             
          <td class="datess" id="dpQ<?php echo $value['Course']['id']; ?>"><?php //echo $value['Course']['end_time']; ?></td>
          <td style="display:none;">
          <?php for($i=0;$i<=20;$i++){ ?>
            <input type="hidden" id="p<?php $times =explode( ',',$value['Course']['start_date']); print_r($times[$i]);?>" Value="<?php $times =explode( ',',$value['Course']['end_time']); print_r($times[$i]);?> ">
          <?php } ?>
          </td>   
          <?php if($authId == true) { ?>
          <?php if($_SESSION['Auth']['User']['user_type']=="User"){?>
          <td>
            <?php if($count1<=0){ ?>
            <button class="btn btn-success pading-button disbale" data-toggle="modal" data-target="#Indivitualrail<?php echo $value['Course']['id']; ?>" disabled="">No Space</button>

          <?php }else{ ?>
            <button class="btn btn-success pading-button disbale" data-toggle="modal" data-target="#Indivitualrail<?php echo $value['Course']['id']; ?>" id="ing1<?php echo $value['Course']['id']; ?>" disabled="">Select Date</button>
         <?php } ?>
          </td>
          <?php }?>
          <?php if($_SESSION['Auth']['User']['user_type']=="Company"){?>
          <td>
            <?php 
            if($count1<=0){ ?>
            <button class="btn btn-success pading-button disbale" data-toggle="modal" data-target="#orgnisationrail<?php echo $value['Course']['id']; ?>"  disabled="">No Space</button>
             <?php }else{ ?>
              <button class="btn btn-success pading-button disbale" data-toggle="modal" data-target="#orgnisationrail<?php echo $value['Course']['id']; ?>" id="org1<?php echo $value['Course']['id']; ?>" disabled="">Select Date</button>
              <?php }?>
          </td>
          <?php }?>
          
          <?php } else{ ?>
          <td><button class="btn btn-success" data-toggle="modal" data-target="#myModal">Book Now</button>
          
          </td>
          <?php } ?>
          <td><?php if(!empty($value['Course']['pre_requisite'])){ ?>
          <a class="btn btn-success pading-button" href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'prerequisite',$value['Course']['id']));?>">Pre-Requisite</a>
          <?php } else { ?>
          <a class="btn btn-success pading-button"  style="display:none;" href="#">Pre-Requisite</a>
          <?php } ?>
          </td>
          
                </tr>
              <?php $i++;} ?>    
            </tbody>
          </table>
      
      <!--<ul class="pagination">
        <?php
         //echo ($this->Paginator->hasPrev()) ? $this->Paginator->prev('«', array('tag' => 'li'), null, null) : '<li class="disabled"><a href="#">«</a></li>';
         //echo $this->Paginator->numbers(array('separator' => false, 'tag' => 'li'));   
         //echo ($this->Paginator->hasNext()) ? $this->Paginator->next('»', array('tag' => 'li'), null, null) : '<li class="disabled"><a href="#">»</a></li>';
         ?>
      </ul>-->
        <?php if($count > 10) { ?>
        <div class="text-center">
          <ul class="pagination text-center">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?> 
          </ul>
        </div>
        <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div style="display:none">
    <input type="hidden" id="Blank" value="011">
    <p id="dp011"></p>
    <p id="dpQ011"></p>
    <button id="org1011"></button>
    <button id="ing1011"></button>
    <select id="011">
      <option></option>
    </select></div>
<script type="text/javascript">
function datefunction(obj) {
var i = obj.id;
var j = obj.value;
var p = j.trim(); // trim to condition Check in value
var datearray = p.split("/");
var q = datearray[1] + '/' + datearray[0] + '/' + datearray[2];
var getid = document.getElementById("Blank").value;
if (document.getElementById(i).value == '') {
    document.getElementById("org1" + i).disabled = true;
    document.getElementById("org1" + i).innerHTML = "Select Date";
    document.getElementById("dp" + i).innerHTML = " ";
    document.getElementById("dpQ" + i).innerHTML = " ";
} else if (p == days1 || p == days2 || p == samedays) {
    document.getElementById("alertshowmsg").innerHTML = "Last booking for online booking should be no later than 48 hours of the start date";
    document.getElementById("alertMsgs").style.display = "block";
    document.getElementById("org1" + i).disabled = true;
    document.getElementById("org1" + i).innerHTML = "Select Date";
    document.getElementById("dp" + i).innerHTML = " ";
    document.getElementById("dpQ" + i).innerHTML = " ";
} else if (new Date() > new Date(q)) {
    document.getElementById("alertshowmsg").innerHTML = "This course expired. Please choose another course or check the next date course.";
    document.getElementById("alertMsgs").style.display = "block";
    document.getElementById("ing1" + i).disabled = true;
    document.getElementById("ing1" + i).innerHTML = "Select Date";
    document.getElementById("dp" + i).innerHTML = " ";
    document.getElementById("dpQ" + i).innerHTML = " ";
} else {
  //Disabled previous button
    if (getid != i) {
        document.getElementById("org1" + getid).disabled = true;
        document.getElementById("org1" + getid).innerHTML = "Select Date";
        document.getElementById("dp" + getid).innerHTML = " ";
        document.getElementById("dpQ" + getid).innerHTML = " ";
        document.getElementById(getid).value = "";
    }
    var a = document.getElementById(j).value;
    var b = document.getElementById("p" + j).value;
    document.getElementById("dp" + i).innerHTML = a;
    document.getElementById("dpQ" + i).innerHTML = b;
    document.getElementById("sorg" + i).value = a;
    document.getElementById("eorg" + i).value = b;
    document.getElementById("date" + i).value = j;
    document.getElementById("org" + i).value = j;
    document.getElementById("org1" + i).disabled = false;
    document.getElementById("org1" + i).innerHTML = "Book Now";
    document.getElementById("Blank").value = i;
}
}
</script>

<script type="text/javascript">
function ingdatefunction(obj) {
    var i = obj.id;
    var j = obj.value;
    var p = j.trim(); // trim to condition Check in value
    var datearray = p.split("/");
    var q = datearray[1] + '/' + datearray[0] + '/' + datearray[2];
    var getid = document.getElementById("Blank").value;
    if (document.getElementById(i).value == '') {
        document.getElementById("ing1" + i).disabled = true;
        document.getElementById("ing1" + i).innerHTML = "Select Date";
        document.getElementById("dp" + i).innerHTML = " ";
        document.getElementById("dpQ" + i).innerHTML = " ";
    } else if (p == days1 || p == days2 || p == samedays) {
        document.getElementById("alertshowmsg").innerHTML = "Last booking for online booking should be no later than 48 hours of the start date";
        document.getElementById("alertMsgs").style.display = "block";
        document.getElementById("dp" + i).innerHTML = " ";
        document.getElementById("dpQ" + i).innerHTML = " ";
        document.getElementById("ing1" + i).disabled = true;
        document.getElementById("ing1" + i).innerHTML = "Select Date";
    } else if (new Date() > new Date(q)) {
        document.getElementById("alertshowmsg").innerHTML = "This course expired. Please choose another course or check the next date course.";
        document.getElementById("alertMsgs").style.display = "block";
        document.getElementById("ing1" + i).disabled = true;
        document.getElementById("ing1" + i).innerHTML = "Select Date";
        document.getElementById("dp" + i).innerHTML = " ";
        document.getElementById("dpQ" + i).innerHTML = " ";
    } else {
        //Disabled previous button
        if (getid != i) {
            document.getElementById("ing1" + getid).disabled = true;
            document.getElementById("ing1" + getid).innerHTML = "Select Date";
            document.getElementById("dp" + getid).innerHTML = " ";
            document.getElementById("dpQ" + getid).innerHTML = " ";
            document.getElementById(getid).value = "";
        }

        var a = document.getElementById(j).value;
        var b = document.getElementById("p" + j).value;
        document.getElementById("dp" + i).innerHTML = a;
        document.getElementById("dpQ" + i).innerHTML = b;
        document.getElementById("date" + i).value = j;
        document.getElementById("org" + i).value = j;
        document.getElementById("stime" + i).value = a;
        document.getElementById("etime" + i).value = b;
        document.getElementById("ing1" + i).disabled = false;
        document.getElementById("ing1" + i).innerHTML = "Book Now";
        document.getElementById("Blank").value = i;
    }
}
</script>