<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<?php echo $this->Html->script('jquery-ui.js'); ?>
<?php echo $this->Html->script('jquery.datetimepicker.js'); ?>
<?php echo $this->Html->css('jquery-ui.css'); ?>
<script>
    $(document).ready(function() {
        $("#date").datepicker({
            dateFormat: "dd-mm-yy",
            yearRange: 'c+0:c+99',
            changeMonth: true,
          changeYear: true
        });

    });
</script>
<script>
    $(document).ready(function() {
        $("#date1").datepicker({
            dateFormat: "dd-mm-yy",
            yearRange: 'c+0:c+99',
            changeMonth: true,
          changeYear: true
        });

    });
</script>
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
                <?php echo $this->Form->create("Course", array('controller'=>'courses','autocomplete' => 'off','id' => 'courseadd', 'class' => 'form-horizontal')); ?>
                <div class="form-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Select Sector:</label>
                        <div class="col-md-6">
                            <select name="data[Course][sector_id]" class="form-control" >
                                <?php $i=1; foreach($SectorName as $result){ ?>
                                <option value ="<?php echo $result['Sector']['id'] ?>"><?php echo $result['Sector']['sector_name']; ?></option>
                                 <?php $i++; } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Course Name:</label>
                        <div class="col-md-6">
                            <input type="text" name="data[Course][course_name]"  class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Course Duration:</label>
                        <div class="col-md-6">
                            <input type="text" name="data[Course][duration]"  class="form-control">
                        </div>
                    </div>   
                    <div class="form-group">
                        <label class="col-md-3 control-label">Start Date:</label>
                        <div class="col-md-6">
                            <input type="text" name="data[Course][start_date]" id="date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">End Date:</label>
                        <div class="col-md-6">
                             <input type="text" name="data[Course][end_date]" id="date1" class="form-control">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label">Number of Delegates</label>
                        <div class="col-md-6">
<<<<<<< .mine
                            <input type="text" name="data[Course][delegates_number]" class="form-control">
||||||| .r67
                            <input type="text" name="data[Course][delegate_no]" class="form-control">
=======
                            <input type="text" name="data[Course][delegates_no]" class="form-control">
>>>>>>> .r74
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Price Per Delegate</label>
                        <div class="col-md-6">
                            <input type="text" name="data[Course][price]" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Expiry Competence</label>
                        <div class="col-md-6">
<<<<<<< .mine
                            <input type="text" name="data[Course][expiry_competence]" class="form-control">
||||||| .r67
                            <input type="text" name="data[Course][Expiry_com]" class="form-control">
=======
                            <input type="text" name="data[Course][expiry]" class="form-control">
>>>>>>> .r74
                        </div>
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
<script type="text/javascript">
    var validator = $("#courseadd").validate({
        rules: {
            'data[Course][course_name]':{
                required:true
            },
            'data[Course][duration]':{
                required:true
            },
            'data[Course][start_date]':{
                required:true
            },
            'data[Course][end_date]':{
                required:true
            },
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
            'data[Course][start_date]':{
                required:"Please select start date."
            },
            'data[Course][end_date]':{
                required:"Please select end date."
            },
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