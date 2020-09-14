<div class="container-fluid" >
<div class="row">
  <h2>Report Listing </h2>
  <form action="reportListing">






  <div class="col-md-2">
  <label for="inputdefault">From Date</label>
  </div>
  <div class="col-md-4 report">
    <div class="form-group course-form">
      <input class="form-control" name="from_date" id="date" value="<?php if(!empty($getvalue['from_date'])){
		  echo ($getvalue['from_date']);
	  }else{}?>" type="text">
	  </div>
    </div>
	 <div class="col-md-2">
  <label for="inputdefault">To Date</label>
  </div>
	  <div class="col-md-4 report">
    <div class="form-group course-form">
      <input class="form-control" name="to_date" id="date1" value="<?php if(!empty($getvalue['to_date'])){
		  echo ($getvalue['to_date']);
	  }else{}?>" type="text">
	  </div>
    </div>
	<!--<div class="col-md-2">
	<label for="inputdefault">Start Time</label>
	</div>
	<div class="col-md-4 report">
    <div class="form-group course-form">
	<select class="form-control" name="data[Report][time]" id="timepicker">
        <option>Start Time</option>
        <?php// $i=1; foreach($booking as $result){ ?>
        <option value ="<?php //echo $result['Course']['start_time'] ?>"><?php //echo $result['Course']['start_time']; ?></option>
        <?php //$i++; //} ?>
      </select>
	  </div>
    </div> -->


<!-- 	<div class="col-md-2">
	<label for="sel1">Course Name</label>
	</div>
	<div class="col-md-4 report">
    <div class="form-group">
      <select class="form-control" name="course_id" id="sel1">
        <option value="">Course Name</option>
			  <?php foreach ($booking as $value) { ?>
                            <option value="<?php echo $value['Course']['id']; ?>"<?php
                            if (!empty($getvalue['course_id'])) {
                                 echo ($getvalue['course_id'] == $value['Course']['id'])? "selected" : "";
                            };
                            ?>><?php echo $value['Course']['course_name']; ?></option>
                                <?php } ?>
      </select>
	  </div>
    </div> -->


<div class="col-md-2">
  <label for="inputdefault">User Type</label>
  </div>
    <div class="col-md-4 report">
    <div class="form-group course-form">
     <select class="form-control" name="userType" onchange="getUserType(this);">
      <option value=''>Select UserType</option>
       <option value="User">Individual</option>
       <option value="Company">Organisation</option>
     </select>
    </div>
    </div>


<!-- <div class="col-md-2">
  <label for="sel1">Individual Category</label>
  </div>
    <div class="col-md-4 report">
    <div class="form-group">
      <select class="form-control" name="individualCat" id="individualCat" onchange="individualC(this);">
        <option value="">Individual</option>
       </select>
    </div>
    </div> -->

<!-- <div class="col-md-2">
  <label for="sel1">Individual Type</label>
  </div>
    <div class="col-md-4 report">
    <div class="form-group">
      <select class="form-control" name="individualData" id="individualData">
        <option value="">Select Type</option>
       </select>
    </div>
    </div> -->

    <div class="col-md-2">
  <label for="sel1">Individual Gender</label>
  </div>
    <div class="col-md-4 report">
    <div class="form-group">
      <select class="form-control"  name="Gender" id="myBtn">
       <option  value=''>Select Gender</option>
      <option  value='Male'>Male</option>
      <option  value='Female'>Female</option>
       </select>
    </div>
    </div>

    <div class="col-md-2">
  <label for="sel1">Individual Marital Status</label>
  </div>
    <div class="col-md-4 report">
    <div class="form-group">
      <select class="form-control" name="Marital" id="myBtn1">
   <option  value=''>Select Marital Status</option>
    <option  value='Single'>Single</option>
    <option  value='Married'>Married</option>
    <option  value='Civil Partnership'>Civil Partnership</option>
    <option  value='Separated/ Divorce'>Separated/ Divorce</option>
       </select>
    </div>
    </div>

  
      <div class="col-md-2">
  <label for="sel1">Individual Age group</label>
  </div>
    <div class="col-md-4 report">
    <div class="form-group">
      <select class="form-control" name="Age" id="myBtn2">
   <option  value=''>Select Age group</option>
    <option  value='16-24'>16-24</option>
    <option  value='25-29'>25-29</option>
    <option  value='30-34'>30-34</option>
    <option  value='35-39'>35-39</option>
    <option  value='40-44'>40-44</option>
    <option  value='45-49'>45-49</option>
    <option  value='50-54'>50-54</option>
    <option  value='55-59'>55-59</option>
    <option  value='60-64'>60-64</option>
    <option  value='65+'>65+</option>
       </select>
    </div>
    </div> 

        <div class="col-md-2">
  <label for="sel1">Individual Ethnic Group</label>
  </div>
    <div class="col-md-4 report">
    <div class="form-group">
      <select class="form-control" name="Ethnic" id="myBtn3">
<option  value=''>Select Ethnic Group</option>
    <option  value='White'>White</option>
    <option  value='Mixed/Multiple Ethnicity'>Mixed/Multiple Ethnicity</option>
    <option  value='Asian or Asian British'>Asian or Asian British</option>
    <option  value='African/Caribbean/Black British'>African/Caribbean/Black British</option>
       </select>
    </div>
    </div> 

<div class="col-md-2">
  <label for="sel1">Individual Disability</label>
  </div>
    <div class="col-md-4 report">
    <div class="form-group">
      <select class="form-control" name="Disability" id="myBtn4">
    <option  value=''>Select Disability</option>
    <option  value='Yes'>Yes</option>
    <option  value='No'>No</option>
       </select>
    </div>
    </div>


      <div class="col-md-2">
  <label for="sel1">Category Name</label>
  </div>
  <div class="col-md-4 report">
    <div class="form-group" >

      <select class="form-control" name="category_id" id="sel1" onchange="getselectval(this);" multiple="">
        <!-- <option value="">Category Name</option> -->
        <option value="rail" <?php
                            if (!empty($getvalue['category_id'])) {
                                 echo ($getvalue['category_id'] == "rail")? "selected" : "";
                            };
                            ?>>Rail Course</option>
        <option value="non-rail" <?php
                            if (!empty($getvalue['category_id'])) {
                                 echo ($getvalue['category_id'] == "non-rail")? "selected" : "";
                            };
                            ?>>Non-Rail Course</option>
      
      </select>
    </div>
    </div>

<div class="col-md-2">
  <label for="sel1">Sector Name</label>
  </div>
    <div class="col-md-4 report">
    <div class="form-group">
      <select class="form-control" name="sectorid" id="sectorid" onchange="getselectval2(this);">
        <option value="">Sector Name</option>
       
      
      </select>
    </div>
    </div>

  <div class="col-md-2">
  <label for="sel1">Course Name</label>
  </div>
    <div class="col-md-4 report">
    <div class="form-group">
      <select class="form-control couserId" name="course_id" id="sel1">
        <option value="">Course Name</option>
    
      
      </select>
    </div>
    </div>
  
	
	
	<!--<div class="col-md-2">
	<label for="sel1">Count</label>
	</div>
	<div class="col-md-4 report">
    <div class="form-group course-form">
      <input class="form-control" name="data[Report][count]" id="" type="text">
	  </div>
    </div>-->
    <div class="col-md-2">
  <label for="inputdefault">Location</label>
  </div>
  <div class="col-md-4 report">
    <div class="form-group course-form">
	  <select  multiple class="form-control" name="location_id[]" id="sel1">
        <!-- <option value="">Location</option> -->
			  <?php foreach ($location as $value) { ?>
                   <option value="<?php echo $value['Location']['id']; ?>"<?php
                   if (!empty($getvalue['location_id'])) {
                   echo ($getvalue['location_id'] == $value['Location']['id'])? "selected" : "";
				   };?>><?php echo $value['Location']['location']; ?></option>
             <?php } ?>
			  
      </select>
	  </div>
    </div>
    <div class="col-md-2">
	<label for="sel1">Payment Status</label>
	</div>
	<div class="col-md-4 report">
    <div class="form-group">
     <select class="form-control" name="status" id="statuss" >
   <!--      <option value="">Payment Status</option> -->
		 <?php foreach ($payStatus as $value) { ?>
                            <option value="<?php echo $value['TransactionLog']['status']; ?>"<?php
                            if (!empty($getvalue['status'])) {
                                 echo ($getvalue['status'] == $value['TransactionLog']['status'])? "selected" : "";
                            };
                            ?>><?php if($value['TransactionLog']['status']=="Declined"){echo "Pending"; }else{ echo $value['TransactionLog']['status'];}?></option>
                                <?php } ?>
      </select>
	  </div>
    </div>


<!-- 	<div class="col-md-2">
  <label for="inputdefault">Course Fee</label>
  </div>
  <div class="col-md-4 report">
    <div class="form-group course-form">
	   <select class="form-control" name="delegate_price" id="sel1">
        <option value="">Course Fee</option>
		 <?php foreach ($price as $value) { ?>
                            <option  id="sel2" value="<?php echo $value['Course']['delegate_price']; ?>"<?php
                            if (!empty($getvalue['delegate_price'])) {
                                 echo ($getvalue['delegate_price'] == $value['Course']['delegate_price'])? "selected" : "";
                            };
                            ?>><?php echo $value['Course']['delegate_price']; ?></option>
                                <?php } ?>
      </select>
	  </div>
    </div> -->


	<!--<div class="col-md-2">
  <label for="inputdefault">Paid Amount</label>
  </div>
  <div class="col-md-4 report">
    <div class="form-group course-form">
      <input class="form-control" name="data[Report][amount]" id="" type="text">
	  </div>
    </div>-->
	<div class="col-md-12 report-btn">
	<button type="submit" class="btn green" >Submit</button>


 <button type="submit" class="btn green download"><?php echo $this->Html->link('EXPORT', array( 'controller' => 'reports', 'action' => 'admin_export','?' => array('from_date' => $_GET['from_date'],'to_date' => $_GET['to_date'],'userType' => $_GET['userType'],'Gender' => $_GET['Gender'],'Marital' => $_GET['Marital'],'Age' => $_GET['Age'],'Ethnic' => $_GET['Ethnic'],'Disability' => $_GET['Disability'],'sectorid' => $_GET['sectorid'],'course_id' => $_GET['course_id'],'location_id' => $_GET['location_id'],'status' => $_GET['status'],'delegate_price' => $_GET['delegate_price']))); ?> </button>
	</div>
   </form>
</div>
</div>
<?php
$page = $this->params['paging']['TransactionLog']['page'];
$counter = ($page * 10) - 10 + 1;
//pr($counter);die;
?> 


<div class="col-md-12 report-table">
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Booking ID </th>
      <th scope="col">Name</th>
      
      <th scope="col">Email</th>
      <?php 
      $utype = $_GET['userType'];
      if($utype == 'User'){?>
        <th scope="col">Gender</th>
        <th scope="col">Age</th>
        <th scope="col">Ethnic Group</th>
        <th scope="col">Marital Status</th>
         
     <?php } ?>
     <?php 
      $utype = $_GET['userType'];
      if($utype == 'Company'){?>
         <th scope="col">Company Name</th>
           <?php } ?>
      
	  <th scope="col">Booking Date</th>
      <th scope="col">Course Name</th>
	  <th scope="col">Location</th>
	  <th scope="col">Status</th>
	  <th scope="col">Course Fee</th>
    </tr>
  </thead>
   <tfoot>
     <tr>
        <td colspan="9" class="rounded-foot-left" style="text-align:center;
"><em><?php echo $this->element('admin_paging_links'); ?></em></td>
     </tr>
  </tfoot>
  <tbody>
   <?php $i=1; 
   foreach($bookinglist as $result){ ?>
   <tr>
    <td><?php echo $result['TransactionLog']['order_id'];?></td>
    <td><?php echo $result['User']['first_name']." ".$result['User']['last_name'];?></td>
  
     <td><?php echo $result['User']['email_id'];?></td>
     <?php 
      $utype = $_GET['userType'];
      if($utype == 'User'){?>

    <td><?php echo $result['User']['gender'];?></td>
     <td><?php echo $result['User']['age'];?></td>
     <td><?php echo $result['User']['ethnic'];?></td>
     <td><?php echo $result['User']['maritalstatus'];?></td>
          <?php } ?>
           <?php 
      $utype = $_GET['userType'];
      if($utype == 'Company'){?>
        <td><?php echo $result['User']['company'];?></td>
         <?php } ?>
   <td><?php echo date('d-m-Y', strtotime($result['TransactionLog']['transaction_datetime_txt']));?></td>
   <td><?php echo $result['Course']['course_name']; ?></td>
   <td><?php if($result['Course']['location_id']="1"){ echo "London"; } ?></td>
   <td><?php if($result['TransactionLog']['status']=="Declined"){echo "Pending"; }else{ echo $result['TransactionLog']['status'];}?></td>
   <td><?php if(!empty ($result['Course']['delegate_price'])){?><span>&#163;</span><?php  echo $result['Course']['delegate_price']; }?></td>
   </tr>
   <?php $i++; } ?>
  </tbody>
</table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<?php echo $this->Html->script('jquery-ui.js'); ?>
<?php echo $this->Html->script('jquery.datetimepicker.js'); ?>

<?php echo $this->Html->css('jquery-ui.css'); ?>
<?php echo  $this->Html->script('ckeditor/ckeditor.js'); ?>
<?php echo $this->Html->script('jquery-clockpicker.min.js'); ?>
<?php echo $this->Html->css('jquery-clockpicker.min.css'); ?>

<script>
    $(document).ready(function() {
        $("#date").datepicker({
            dateFormat: "yy-mm-dd",
            yearRange: 'c-48:c+99',
            changeMonth: true,
          changeYear: true,
        });
	});
</script>
<script>
    $(document).ready(function() {
        $("#date1").datepicker({
            dateFormat: "yy-mm-dd",
            yearRange: 'c-48:c+99',
            changeMonth: true,
          changeYear: true,
        });
	});
</script>
<script>
// var input = $('#timepicker');
// input.clockpicker({
// autoclose: true
// });
</script>

<style>
    .btn.green.download a{ color:#ffffff;
        
    }
</style>

<?php if (!empty($getvalue['category_id'])) { ?>
<script type="text/javascript">

      window.onload = function() {
          var catName = '<?php echo $getvalue['category_id'];?>' ;
          var sectorId = '<?php echo $getvalue['sectorid'];?>' ;
           
  $.ajax({
        type: "POST",
        url: '<?php echo Router::url(array('controller'=>'reports','action'=>'admin_showAfterFilter'));?>',
        data: ({'catName':catName,'sectorId':sectorId}),
        success: function (data){
           
            $("#sectorid").html(data);
        
           //console.log(data);
            
        }
    });
          }
  // window.onload = function() {
  //   //alert('hihii');
  //       var indivCatName = '<?php echo $getvalue['individualCat'];?>' ;
  //       var indivData = '<?php echo $getvalue['individualData'];?>' ;


  //  $.ajax({
  //       type: "POST",
  //       url: '<?php echo Router::url(array('controller'=>'reports','action'=>'admin_showuserType'));?>',
  //       data: ({'indivCatName':indivCatName,'indivData':indivData}),
  //       success: function (data){
           
  //          // $("#sectorid").html(data);
        
  //          //console.log(data);
            
  //       }
  //   });
  //         }
      
   

</script>

 <?php } ?>
<script>
 

  function getselectval(sel) {
 var value =sel.options[sel.selectedIndex].text;

 var select1 = document.getElementById("sel1");
    var selected1 = [];
    for (var i = 0; i < select1.length; i++) {
        if (select1.options[i].selected) selected1.push(select1.options[i].value);
    }
    

 $.ajax({
        type: "POST",
        url: '<?php echo Router::url(array('controller'=>'reports','action'=>'admin_reportListing'));?>',
        data: ({'couserType':value,'courseArr': selected1}),
        success: function (data){
          
        
            $("#sectorid").html(data);
            
        }
    });
}

function getselectval2(sel){
 var svalue =sel.options[sel.selectedIndex].value;
  // alert(svalue);
 
 $.ajax({
        type: "POST",
        url: '<?php echo Router::url(array('controller'=>'reports','action'=>'admin_getcourseList'));?>',
        data: ({'sectorId':svalue}),
        success: function (data){
           
        
            $(".couserId").html(data);
            
        }
    });

}

function getUserType(sel){
  var utype =sel.options[sel.selectedIndex].value;
  if (utype != "User") {
  var btn = document.getElementById("myBtn");
  btn.setAttribute("disabled", "");

  var btn1 = document.getElementById("myBtn1");
  btn1.setAttribute("disabled", "");
     
  var btn2 = document.getElementById("myBtn2");
  btn2.setAttribute("disabled", "");
  
  var btn3 = document.getElementById("myBtn3");
  btn3.setAttribute("disabled", "");
    
  var btn4 = document.getElementById("myBtn4");
  btn4.setAttribute("disabled", "");
  }
  
}

// function getUserType(sel){
//   var utype =sel.options[sel.selectedIndex].value;
  
//   $.ajax({
//         type: "POST",
//         url: '<?php echo Router::url(array('controller'=>'reports','action'=>'admin_getuserType'));?>',
//         data: ({'utype':utype}),
//         success: function (data){
           
//         //console.log(data)
//         $("#individualCat").html(data);
            
//         }
//     });
// }

function individualC(sel){
    var indiC =sel.options[sel.selectedIndex].value;
     $.ajax({
        type: "POST",
        url: '<?php echo Router::url(array('controller'=>'reports','action'=>'admin_getuserType'));?>',
        data: ({'afterType':indiC}),
        success: function (data){
            $("#individualData").html(data);
       // console.log(data)
       
            
        }
    });
}



</script>


