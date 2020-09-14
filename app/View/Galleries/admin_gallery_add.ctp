<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Add Gallery
                </div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align:center;margin-left: -392px;"> <?php echo $this->Session->flash(); ?></div>
                <?php echo $this->Form->create('Gallery',array('controller'=>'galleries','id'=>'galleryadd','type'=>'file')); ?>
                <div class="form-body">

                    <div class="form-group">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Title</label>
                             <div class="col-md-6">
                                 <input type="text" name="data[Gallery][title]" class="form-control" >
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
                            <input  type="file" name="data[GalleryImage][image][]" multiple="true" >
                            <p style="color: red">Press ctrl to select multiple images</p>
                        </div>
                    </div>
<br>
                </div>
                <div class="form-actions fluid">
                    <div class="col-md-offset-3 col-md-6">
                        <button class="btn green" type="submit">Save</button>
                        <a class="btn default" href="<?php echo $this->html->url(array('controller' => 'galleries', 'action' => 'admin_galleryListing')); ?>">
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
    var validator = $("#galleryadd").validate({
        rules: {
            'data[Gallery][title]':{
                required:true
            },
            'data[GalleryImage][image][]': {
                required: true
            }
          
        },
        messages: {
            'data[Gallery][title]':{
                required:"Title should not be blank."
            },
            'data[GalleryImage][image][]': {
                required: "Please upload image."
            }
            

        },
     

    });
</script>

