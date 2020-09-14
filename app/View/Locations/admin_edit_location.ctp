<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<div class="row">
    <div class="col-md-12">
 <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Edit Location
                </div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align:center;margin-left: -392px;"> <?php echo $this->Session->flash(); ?></div>
                <?php echo $this->Form->create("Location", array('controller'=>'locations','autocomplete' => 'off','id' => 'locationedit', 'class' => 'form-horizontal')); ?>
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Location Name:</label>
                        <div class="col-md-6">
                            <input type="text" name="data[Location][location]"  class="form-control" value="<?php echo $locDetail['Location']['location']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Complete Location:</label>
                        <div class="col-md-6">
                            <input type="text" name="data[Location][complete_location]"  class="form-control" value="<?php echo $locDetail['Location']['complete_location'];?>">
                        </div>
                    </div>   
                </div>
                <div class="form-actions fluid">
                    <div class="col-md-offset-3 col-md-6">
                        <button class="btn green" type="submit">Submit</button>
                        <a class="btn default" href="<?php echo $this->html->url(array('controller' => 'locations','action' => 'admin_locationList')); ?>">
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
    var validator = $("#locationedit").validate({
        rules: {
            'data[Location][location]':{
                required:true
            }
        },
        messages:{
            'data[Location][location]':{
                required:"Location should not be blank."
            }
        },
    });
</script>