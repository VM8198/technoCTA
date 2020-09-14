<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<div class="row">
    <div class="col-md-12">
 <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Edit Sector
                </div>
            </div>
            <div class="portlet-body form">
              <div style="color:red;text-align:center;margin-left: -392px;"> <?php echo $this->Session->flash(); ?></div>
                <?php echo $this->Form->create("Sector", array('controller'=>'sectors','id' => 'sectoredit', 'class' => 'form-horizontal')); ?>
                <div class="form-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Sector Name:</label>
                        <div class="col-md-6">
                            <input type="text" name="data[Sector][sector_name]"  class="form-control" value="<?php echo $sectorDetail['Sector']['sector_name'];?>">
                        </div>
                    </div>
                </div>
                <div class="form-actions fluid">
                    <div class="col-md-offset-3 col-md-6">
                        <button class="btn green" type="submit">Submit</button>
                        <a class="btn default" href="<?php echo $this->html->url(array('controller' => 'sectors','action' => 'admin_sectorList')); ?>">
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
    var validator = $("#sectoredit").validate({
        rules: {
            'data[Sector][sector_name]':{
                required:true
            }
        },
        messages: {
            'data[Sector][sector_name]':{
                required:"Sector name should not be blank."
            }
        },
     

    });
    
</script>