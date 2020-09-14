
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
                            <input type="text" name="data[Course][start_date][]" class="form-control date1">
                        </div>
               
                      
                        <div class="col-md-4">
                              <label class=" control-label">Start Time:</label>
                             <select type="text" name="data[Course][start_time][]" id="timepicker" class="form-control">
                                <option class="" value="12:00am" >12:00am</option>
                                <option class="ui-timepicker-am" value="12:30am" >12:30am</option>
                                <option class="ui-timepicker-am" value="1:00am" >1:00am</option>
                                <option class="ui-timepicker-am" value="1:30am" >1:30am</option>
                                <option class="ui-timepicker-am" value="2:00am" >2:00am</option>
                                <option class="ui-timepicker-am" value="2:30am" >2:30am</option>
                                <option class="ui-timepicker-am" value="3:00am" >3:00am</option>
                                <option class="ui-timepicker-am" value="3:30am" >3:30am</option>
                                <option class="ui-timepicker-am" value="4:00am" >4:00am</option>
                                <option class="ui-timepicker-am" value="4:30am" >4:30am</option>
                                <option class="ui-timepicker-am" value="5:00am" >5:00am</option>
                                <option class="ui-timepicker-am" value="5:30am" >5:30am</option>
                                <option class="ui-timepicker-am" value="6:00am" >6:00am</option>
                                <option class="ui-timepicker-am" value="6:30am" >6:30am</option>
                                <option class="ui-timepicker-am" value="7:00am" >7:00am</option>
                                <option class="ui-timepicker-am" value="7:30am" >7:30am</option>
                                <option class="ui-timepicker-am" value="8:00am" >8:00am</option>
                                <option class="ui-timepicker-am" value="8:30am" >8:30am</option>
                                <option class="ui-timepicker-am" value="9:00am" >9:00am</option>
                                <option class="ui-timepicker-am" value="9:30am<" >9:30am</option>
                                <option class="ui-timepicker-am" value="10:00am" >10:00am</option>
                                <option class="ui-timepicker-am" value="10:30am" >10:30am</option>
                                <option class="ui-timepicker-am" value="11:00am" >11:00am</option>
                                <option class="ui-timepicker-am" value="11:30am" >11:30am</option>
                                <option class="" value="12:00pm" >12:00pm</option>
                                <option class="ui-timepicker-pm" value="12:30pm" >12:30pm</option>
                                <option class="ui-timepicker-pm" value="1:00pm" >1:00pm</option>
                                <option class="ui-timepicker-pm" value="1:30pm" >1:30pm</option>
                                <option class="ui-timepicker-pm" value="2:00pm" >2:00pm</option>
                                <option class="ui-timepicker-pm" value="2:30pm" >2:30pm</option>
                                <option class="ui-timepicker-pm" value="3:00pm" >3:00pm</option>
                                <option class="ui-timepicker-pm" value="3:30pm" >3:30pm</option>
                                <option class="ui-timepicker-pm" value="4:00pm" >4:00pm</option>
                                <option class="ui-timepicker-pm" value="4:30pm" >4:30pm</option>
                                <option class="ui-timepicker-pm" value="5:00pm" >5:00pm</option>
                                <option class="ui-timepicker-pm" value="5:30pm" >5:30pm</option>
                                <option class="ui-timepicker-pm" value="6:00pm" >6:00pm</option>
                                <option class="ui-timepicker-pm" value="6:30pm" >6:30pm</option>
                                <option class="ui-timepicker-pm" value="7:00pm" >7:00pm</option>
                                <option class="ui-timepicker-pm" value="7:30pm" >7:30pm</option>
                                <option class="ui-timepicker-pm" value="8:00pm" >8:00pm</option>
                                <option class="ui-timepicker-pm" value="8:30pm" >8:30pm</option>
                                <option class="ui-timepicker-pm" value="9:00pm" >9:00pm</option>
                                <option class="ui-timepicker-pm" value="9:30pm<" >9:30pm</option>
                                <option class="ui-timepicker-pm" value="10:00pm" >10:00pm</option>
                                <option class="ui-timepicker-pm" value="10:30pm" >10:30pm</option>
                                <option class="ui-timepicker-pm" value="11:00pm" >11:00pm</option>
                                <option class="ui-timepicker-pm" value="11:30pm" >11:30pm</option>
                             </select>
                        </div>
     
                        
                        <div class="col-md-4">
                            <label class=" control-label">End Time:</label>
                             <select type="text" name="data[Course][end_time][]" id="timepicker1" class="form-control">
                             <option class="" value="12:00am" >12:00am</option>
                                <option class="ui-timepicker-am" value="12:30am" >12:30am</option>
                                <option class="ui-timepicker-am" value="1:00am" >1:00am</option>
                                <option class="ui-timepicker-am" value="1:30am" >1:30am</option>
                                <option class="ui-timepicker-am" value="2:00am" >2:00am</option>
                                <option class="ui-timepicker-am" value="2:30am" >2:30am</option>
                                <option class="ui-timepicker-am" value="3:00am" >3:00am</option>
                                <option class="ui-timepicker-am" value="3:30am" >3:30am</option>
                                <option class="ui-timepicker-am" value="4:00am" >4:00am</option>
                                <option class="ui-timepicker-am" value="4:30am" >4:30am</option>
                                <option class="ui-timepicker-am" value="5:00am" >5:00am</option>
                                <option class="ui-timepicker-am" value="5:30am" >5:30am</option>
                                <option class="ui-timepicker-am" value="6:00am" >6:00am</option>
                                <option class="ui-timepicker-am" value="6:30am" >6:30am</option>
                                <option class="ui-timepicker-am" value="7:00am" >7:00am</option>
                                <option class="ui-timepicker-am" value="7:30am" >7:30am</option>
                                <option class="ui-timepicker-am" value="8:00am" >8:00am</option>
                                <option class="ui-timepicker-am" value="8:30am" >8:30am</option>
                                <option class="ui-timepicker-am" value="9:00am" >9:00am</option>
                                <option class="ui-timepicker-am" value="9:30am<" >9:30am</option>
                                <option class="ui-timepicker-am" value="10:00am" >10:00am</option>
                                <option class="ui-timepicker-am" value="10:30am" >10:30am</option>
                                <option class="ui-timepicker-am" value="11:00am" >11:00am</option>
                                <option class="ui-timepicker-am" value="11:30am" >11:30am</option>
                                <option class="" value="12:00pm" >12:00pm</option>
                                <option class="ui-timepicker-pm" value="12:30pm" >12:30pm</option>
                                <option class="ui-timepicker-pm" value="1:00pm" >1:00pm</option>
                                <option class="ui-timepicker-pm" value="1:30pm" >1:30pm</option>
                                <option class="ui-timepicker-pm" value="2:00pm" >2:00pm</option>
                                <option class="ui-timepicker-pm" value="2:30pm" >2:30pm</option>
                                <option class="ui-timepicker-pm" value="3:00pm" >3:00pm</option>
                                <option class="ui-timepicker-pm" value="3:30pm" >3:30pm</option>
                                <option class="ui-timepicker-pm" value="4:00pm" >4:00pm</option>
                                <option class="ui-timepicker-pm" value="4:30pm" >4:30pm</option>
                                <option class="ui-timepicker-pm" value="5:00pm" >5:00pm</option>
                                <option class="ui-timepicker-pm" value="5:30pm" >5:30pm</option>
                                <option class="ui-timepicker-pm" value="6:00pm" >6:00pm</option>
                                <option class="ui-timepicker-pm" value="6:30pm" >6:30pm</option>
                                <option class="ui-timepicker-pm" value="7:00pm" >7:00pm</option>
                                <option class="ui-timepicker-pm" value="7:30pm" >7:30pm</option>
                                <option class="ui-timepicker-pm" value="8:00pm" >8:00pm</option>
                                <option class="ui-timepicker-pm" value="8:30pm" >8:30pm</option>
                                <option class="ui-timepicker-pm" value="9:00pm" >9:00pm</option>
                                <option class="ui-timepicker-pm" value="9:30pm<" >9:30pm</option>
                                <option class="ui-timepicker-pm" value="10:00pm" >10:00pm</option>
                                <option class="ui-timepicker-pm" value="10:30pm" >10:30pm</option>
                                <option class="ui-timepicker-pm" value="11:00pm" >11:00pm</option>
                                <option class="ui-timepicker-pm" value="11:30pm" >11:30pm</option>
                             </select>
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
                        <label class="col-md-3 control-label">Pre-Requisite Pdf: </label>
                        <div class="col-md-6">
                            <?php echo $this->Form->file('pdf', array('id' => 'filedocxpdf','name'=>'data[Course][pdf]','accept'=>'.pdf')); ?>
                            <!--<input type="text" class="ckeditor" id="filedocxpdf" name="data[Course][pre_requisite]"  >-->
                            <p style="color: red">Please select only pdf files.Course name and the file name should be the same.</p>
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
$(document).ready(function(){
  var counter = 1;
  $("#AddField").click(function () {
    // alert("fgdf");
      if(counter>25){
              alert("Only 25 textboxes allow");
              return false;
      }   
      var newTextBoxDiv = $(document.createElement('div'))
      .attr("id", 'textdiv' + counter);
      newTextBoxDiv.after().html('<div class="col-md-4"> <label class="form-text">Course Date</label> <input type="text" name="data[Course][start_date][]" class="form-control date1"></div><div class="col-md-4"> <label class="form-text"> Start Time</label> <select type="text" name="data[Course][start_time][]" class="form-control"> <option class="" value="12:00am" >12:00am</option> <option class="ui-timepicker-am" value="12:30am" >12:30am</option> <option class="ui-timepicker-am" value="1:00am" >1:00am</option> <option class="ui-timepicker-am" value="1:30am" >1:30am</option> <option class="ui-timepicker-am" value="2:00am" >2:00am</option> <option class="ui-timepicker-am" value="2:30am" >2:30am</option> <option class="ui-timepicker-am" value="3:00am" >3:00am</option> <option class="ui-timepicker-am" value="3:30am" >3:30am</option> <option class="ui-timepicker-am" value="4:00am" >4:00am</option> <option class="ui-timepicker-am" value="4:30am" >4:30am</option> <option class="ui-timepicker-am" value="5:00am" >5:00am</option> <option class="ui-timepicker-am" value="5:30am" >5:30am</option> <option class="ui-timepicker-am" value="6:00am" >6:00am</option> <option class="ui-timepicker-am" value="6:30am" >6:30am</option> <option class="ui-timepicker-am" value="7:00am" >7:00am</option> <option class="ui-timepicker-am" value="7:30am" >7:30am</option> <option class="ui-timepicker-am" value="8:00am" >8:00am</option> <option class="ui-timepicker-am" value="8:30am" >8:30am</option> <option class="ui-timepicker-am" value="9:00am" >9:00am</option> <option class="ui-timepicker-am" value="9:30am<" >9:30am</option> <option class="ui-timepicker-am" value="10:00am" >10:00am</option> <option class="ui-timepicker-am" value="10:30am" >10:30am</option> <option class="ui-timepicker-am" value="11:00am" >11:00am</option> <option class="ui-timepicker-am" value="11:30am" >11:30am</option> <option class="" value="12:00pm" >12:00pm</option> <option class="ui-timepicker-pm" value="12:30pm" >12:30pm</option> <option class="ui-timepicker-pm" value="1:00pm" >1:00pm</option> <option class="ui-timepicker-pm" value="1:30pm" >1:30pm</option> <option class="ui-timepicker-pm" value="2:00pm" >2:00pm</option> <option class="ui-timepicker-pm" value="2:30pm" >2:30pm</option> <option class="ui-timepicker-pm" value="3:00pm" >3:00pm</option> <option class="ui-timepicker-pm" value="3:30pm" >3:30pm</option> <option class="ui-timepicker-pm" value="4:00pm" >4:00pm</option> <option class="ui-timepicker-pm" value="4:30pm" >4:30pm</option> <option class="ui-timepicker-pm" value="5:00pm" >5:00pm</option> <option class="ui-timepicker-pm" value="5:30pm" >5:30pm</option> <option class="ui-timepicker-pm" value="6:00pm" >6:00pm</option> <option class="ui-timepicker-pm" value="6:30pm" >6:30pm</option> <option class="ui-timepicker-pm" value="7:00pm" >7:00pm</option> <option class="ui-timepicker-pm" value="7:30pm" >7:30pm</option> <option class="ui-timepicker-pm" value="8:00pm" >8:00pm</option> <option class="ui-timepicker-pm" value="8:30pm" >8:30pm</option> <option class="ui-timepicker-pm" value="9:00pm" >9:00pm</option> <option class="ui-timepicker-pm" value="9:30pm<" >9:30pm</option> <option class="ui-timepicker-pm" value="10:00pm" >10:00pm</option> <option class="ui-timepicker-pm" value="10:30pm" >10:30pm</option> <option class="ui-timepicker-pm" value="11:00pm" >11:00pm</option> <option class="ui-timepicker-pm" value="11:30pm" >11:30pm</option> </select></div><div class="col-md-4"> <label class="form-text">End Time</label> <select type="text" name="data[Course][end_time][]" class="form-control"> <option class="" value="12:00am" >12:00am</option> <option class="ui-timepicker-am" value="12:30am" >12:30am</option> <option class="ui-timepicker-am" value="1:00am" >1:00am</option> <option class="ui-timepicker-am" value="1:30am" >1:30am</option> <option class="ui-timepicker-am" value="2:00am" >2:00am</option> <option class="ui-timepicker-am" value="2:30am" >2:30am</option> <option class="ui-timepicker-am" value="3:00am" >3:00am</option> <option class="ui-timepicker-am" value="3:30am" >3:30am</option> <option class="ui-timepicker-am" value="4:00am" >4:00am</option> <option class="ui-timepicker-am" value="4:30am" >4:30am</option> <option class="ui-timepicker-am" value="5:00am" >5:00am</option> <option class="ui-timepicker-am" value="5:30am" >5:30am</option> <option class="ui-timepicker-am" value="6:00am" >6:00am</option> <option class="ui-timepicker-am" value="6:30am" >6:30am</option> <option class="ui-timepicker-am" value="7:00am" >7:00am</option> <option class="ui-timepicker-am" value="7:30am" >7:30am</option> <option class="ui-timepicker-am" value="8:00am" >8:00am</option> <option class="ui-timepicker-am" value="8:30am" >8:30am</option> <option class="ui-timepicker-am" value="9:00am" >9:00am</option> <option class="ui-timepicker-am" value="9:30am<" >9:30am</option> <option class="ui-timepicker-am" value="10:00am" >10:00am</option> <option class="ui-timepicker-am" value="10:30am" >10:30am</option> <option class="ui-timepicker-am" value="11:00am" >11:00am</option> <option class="ui-timepicker-am" value="11:30am" >11:30am</option> <option class="" value="12:00pm" >12:00pm</option> <option class="ui-timepicker-pm" value="12:30pm" >12:30pm</option> <option class="ui-timepicker-pm" value="1:00pm" >1:00pm</option> <option class="ui-timepicker-pm" value="1:30pm" >1:30pm</option> <option class="ui-timepicker-pm" value="2:00pm" >2:00pm</option> <option class="ui-timepicker-pm" value="2:30pm" >2:30pm</option> <option class="ui-timepicker-pm" value="3:00pm" >3:00pm</option> <option class="ui-timepicker-pm" value="3:30pm" >3:30pm</option> <option class="ui-timepicker-pm" value="4:00pm" >4:00pm</option> <option class="ui-timepicker-pm" value="4:30pm" >4:30pm</option> <option class="ui-timepicker-pm" value="5:00pm" >5:00pm</option> <option class="ui-timepicker-pm" value="5:30pm" >5:30pm</option> <option class="ui-timepicker-pm" value="6:00pm" >6:00pm</option> <option class="ui-timepicker-pm" value="6:30pm" >6:30pm</option> <option class="ui-timepicker-pm" value="7:00pm" >7:00pm</option> <option class="ui-timepicker-pm" value="7:30pm" >7:30pm</option> <option class="ui-timepicker-pm" value="8:00pm" >8:00pm</option> <option class="ui-timepicker-pm" value="8:30pm" >8:30pm</option> <option class="ui-timepicker-pm" value="9:00pm" >9:00pm</option> <option class="ui-timepicker-pm" value="9:30pm<" >9:30pm</option> <option class="ui-timepicker-pm" value="10:00pm" >10:00pm</option> <option class="ui-timepicker-pm" value="10:30pm" >10:30pm</option> <option class="ui-timepicker-pm" value="11:00pm" >11:00pm</option> <option class="ui-timepicker-pm" value="11:30pm" >11:30pm</option> </select></div>');
      newTextBoxDiv.appendTo("#textdiv");
      counter++;
  
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
    $('body').on('focus',".date1", function(){
        $(this).datepicker({
        minDate: 0,
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: "dd/mm/yy"
        
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
        </style>