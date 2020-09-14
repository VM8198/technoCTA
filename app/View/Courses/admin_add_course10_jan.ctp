
<div class="row">
    <div class="col-md-12">
 <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Add Course
                </div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align:center;margin-left: -392px;"> <?php echo $this->Session->flash(); ?></div>
                <?php echo $this->Form->create("Course", array('controller'=>'courses','autocomplete' => 'off','id' => 'courseadd', 'class' => 'form-horizontal' ,'type'=>'file')); ?>
                <div class="form-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Sector: <span style="color: red;">&#42;</span></label>
                        <div class="col-md-6">
                            <select name="data[Course][sector_id]" class="form-control" >
                                <option>Select Sector</option>
                                <?php $i=1; foreach($SectorName as $result){ ?>
                                <option value ="<?php echo $result['Sector']['id'] ?>"><?php echo $result['Sector']['sector_name']; ?></option>
                                 <?php $i++; } ?>
                            </select>
                        </div>
                    </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Location: <span style="color: red;">&#42;</span></label>
                        <div class="col-md-6" >
                            <select name="data[Course][location_id]" class="form-control" >
                                <option>Select Location</option>
                                <?php $i=1; foreach($location as $result){ ?>
                                <option value ="<?php echo $result['Location']['id'] ?>"><?php echo $result['Location']['location']; ?></option>
                                 <?php $i++; } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Course Name: <span style="color: red;">&#42;</span></label>
                        <div class="col-md-6">
                            <input type="text" name="data[Course][course_name]"  class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Course Duration: <span style="color: red;">&#42;</span></label>
                        <div class="col-md-6">
                            <input type="text" name="data[Course][duration]"  class="form-control">
                        </div>
                    </div>   
                        
                    <div class="form-group">
                        <label class="col-md-3"></label>
                        <div class="col-md-6" style="padding:0;">
                        <div class="col-md-4">
                            <label class="control-label">Course Date:</label>
                            <input type="text" name="data[Course][start_date][]" class="form-control" id="date">
                        </div>
               
                      
                        <div class="col-md-4">
                              <label class=" control-label">Start Time:</label>
                             <input type="text" name="data[Course][start_time][]" id="timepicker" class="form-control">
                        </div>
     
                        
                        <div class="col-md-4">
                            <label class=" control-label">End Time:</label>
                             <input type="text" name="data[Course][end_time][]" id="timepicker1" class="form-control">
                        </div></div>
                        <label class="col-md-3">  
                       </label>
                    </div>
                      <div class="form-group">
                      <label class="col-md-3"></label>
                        <div class="col-md-6" style="padding:0;">
                      <div id="textdiv" ></div></div>
                        <label class="col-md-3">  </label>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3"></label>
                        <div class="col-md-6">
                       <button id="AddField" class="btn green greens" type="button">add</button>
                       <button class="removeButton btn green greens" type="button">remove</button>
                       </div></div>
                     <div class="form-group">
                        <label class="col-md-3 control-label">No.of Delegates per Session: <span style="color: red;">&#42;</span></label>
                        <div class="col-md-6">
                            <input type="text" name="data[Course][delegates_no]" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Price Per Delegate(excl VAT): <span style="color: red;">&#42;</span></label>
                        <div class="col-md-6">
                            <input type="text" name="data[Course][delegate_price]" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Expiry Competence: <span style="color: red;">&#42;</span></label>
                        <div class="col-md-6">
                            <input type="text" name="data[Course][expiry]" class="form-control">
                        </div>
                    </div>
                </div>
				 <div class="form-group">
                          <label class="col-md-3 control-label">Pre-Requisite: </label>
                        <div class="col-md-6">
                            <?php echo $this->Form->textarea('pre_requisite', array('class' => 'ckeditor','id' => 'filedocxpdf','name'=>'data[Course][pre_requisite]')); ?>
							<!--<input type="text" class="ckeditor" id="filedocxpdf" name="data[Course][pre_requisite]"  >
                            <p style="color: red">Please select only pdf and doc files.</p>-->
                        </div>
                    </div>
                <div class="form-actions fluid">
                    <div class="col-md-offset-3 col-md-6">
                        <button class="btn green" type="submit">Submit</button>
                        <a class="btn default" href="<?php echo $this->html->url(array('controller' => 'courses','action' => 'admin_courseList')); ?>">
                            Cancel</a>
                    </div>
                </div>
              
                <?php echo $this->form->end(); ?>
              
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>



<script type="text/javascript">
    var validator = $("#courseadd").validate({
        rules: {
            'data[Course][course_name]':{
                required:true
            },
            'data[Course][duration]':{
                required:true
            },
            /* 'data[Course][start_date]':{
                required:true
            },
            'data[Course][end_date]':{
                required:true
            }, */
            'data[Course][delegates_no]':{
                required:true
            },
            'data[Course][delegate_price]':{
                required:true
            },
            'data[Course][expiry]':{
                required: true
            }
          
        },
        messages: {
            'data[Course][course_name]':{
                required:"Course name should not be blank."
            },
             'data[Course][duration]':{
                required:"Duration should not be blank."
            },
            /* 'data[Course][start_date]':{
                required:"Please select start date."
            },
            'data[Course][end_date]':{
                required:"Please select end date."
            }, */
             'data[Course][delegates_no]':{
                required:"Number of delegates should not be blank."
            },
            'data[Course][delegate_price]':{
                required:"Price should not be blank."
            },
            'data[Course][expiry]':{
                required: "Expiry competence should not be blank. "
            }
        },
     

    });
    
</script>

<script type="text/javascript" language="javascript">
function checkfile(sender) {
    var validExts = new Array(".docx", ".doc", ".pdf");
    var fileExt = sender.value;
    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
    if (validExts.indexOf(fileExt) < 0) {
      alert("Please select only .doc , .docx , .pdf file types.");
	   document.getElementById("filedocxpdf").value = null;
      return false;
    }
    else return true;
}
</script>
<script>

    $('#date').datepicker({
    multidate: true,
	format: 'dd-mm-yyyy',
   startDate: new Date()
});

</script>
<script>
    var input = $('#timepicker');
input.clockpicker({
autoclose: true
});
</script>
<script>
var input = $('#timepicker1');
input.clockpicker({
autoclose: true
});
</script>
 <script type="text/javascript">
        //   $(document).ready(function () {
        //         $('#timepicker').timepicker({
        //             format: 'HH:mm'
        //         });
        //     });
        </script>
      
       <script>
$(document).ready(function(){
  
  var counter = 1;

  $("#AddField").click(function () {
    
    // alert("fgdf");
      if(counter>9){
              alert("Only 9 textboxes allow");
              return false;
      }   

      var newTextBoxDiv = $(document.createElement('div'))
          .attr("id", 'textdiv' + counter);
   
      newTextBoxDiv.after().html('<div class="col-md-4"><label class="form-text">Course Date</label><input type="text" name="data[Course][start_date][]"  class="form-control date"></div><div class="col-md-4"><label class="form-text"> Start Time</label><input type="text" name="data[Course][start_time][]" id="timepicker" maxlength="5" placeholder="--:--" class="form-control"></div><div class="col-md-4"><label class="form-text">End Time</label>  <input type="text" name="data[Course][end_time][]" maxlength="5" placeholder="--:--"  class="form-control timepicker1"></div>');
      
      newTextBoxDiv.appendTo("#textdiv");
     

      counter++;
  
          $('.date').datepicker({
    multidate: true,
	format: 'dd-mm-yyyy',
   startDate: new Date()
});
 


  });
   $("body").on("click",".removeButton",function(){
      if(counter==1){
        alert("No more textbox to remove");
        return false;
       }   
      counter--;
      $("#textdiv" + counter).remove();
         

       
   });


 
});
        </script>
        <style>
            .col-md-4{
                background-color:#fff;
            }
            .greens{
                 padding: 5px;
    font-size: 14px;
            }
            }
        </style>