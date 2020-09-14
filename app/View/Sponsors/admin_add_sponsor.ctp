<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Add Accreditation
                </div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align:center;margin-left: -392px;"> <?php echo $this->Session->flash(); ?></div>
                <?php echo $this->Form->create('Sponsor',array('controller'=>'sponsors','id'=>'add','type'=>'file')); ?>
                <div class="form-body">

                    <div class="form-group">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Title</label>
                             <div class="col-md-6">
                                 <input type="text" name="data[Sponsor][title]" class="form-control" >
                        </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                   
                    <div class="form-group">
                          <label class="col-md-3 control-label">Image</label>
                        <div class="col-md-6">
                            <input  type="file" name="data[SponsorImage][image][]" multiple="true" >
                            <p style="color: red">Press ctrl to select multiple images</p>
                        </div>
                    </div>
<br>
                </div>
                <div class="form-actions fluid">
                    <div class="col-md-offset-3 col-md-6">
                        <button class="btn green" type="submit">Save</button>
                        <a class="btn default" href="<?php echo $this->html->url(array('controller' => 'sponsors', 'action' => 'admin_galleryListing')); ?>">
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
    var validator = $("#add").validate({
        rules: {
            'data[Sponsor][title]':{
                required:true
            },
            'data[SponsorImage][image][]': {
                required: true
            }
          
        },
        messages: {
            'data[Sponsor][title]':{
                required:"Title should not be blank."
            },
            'data[SponsorImage][image][]': {
                required: "Please upload image."
            }
            

        },
     

    });
</script>

