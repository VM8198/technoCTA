<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Add Certificate
                </div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align:center;margin-left: -392px;"> <?php echo $this->Session->flash(); ?></div>
                <?php echo $this->Form->create('Certificate',array('controller'=>'trainings','id'=>'pdfadd','type'=>'file','enctype'=>'multipart/form-data')); ?>
                <div class="form-body">

                    <div class="form-group">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Title</label>
                             <div class="col-md-6">
								<input type="text" name="data[Certificate][title]" class="form-control" value="Accreditation Certificate"  />
                                <div id="category" style='color:red;'></div>
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
                            <input  type="file" name="data[Certificate][image]" accept="image/x-png,image/gif,image/jpeg">
							<label for="data[Certificate][image]" class="error"></label>
                        </div>
                    </div>
					<br>
					<br>
					<br>
					<br>
					<br>
				    <div class="form-group">
                          <label class="col-md-3 control-label">PDF</label>
                        <div class="col-md-6">
                            <input  type="file" name="data[Certificate][pdf_file]" accept=".pdf">
                            <label for="data[Certificate][pdf_file]" class="error"></label>
                        </div>
                    </div>
					</div>
					<br>
					<br>
					<div class="form-actions fluid">
                    <div class="col-md-offset-3 col-md-6">
                        <button class="btn green" type="submit" id="btnsubmit">Upload</button>
                        <a class="btn default" href="<?php echo $this->html->url(array('controller' => 'sponsors', 'action' => 'admin_certificateListing')); ?>">
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
    var validator = $("#pdfadd").validate({
        rules: {
           
            'data[Certificate][title]':{
                required:true
            },
            'data[Certificate][pdf_file]':{
                required:true
            }
        },
        messages: {
           
            'data[Certificate][title]': {
                required: "Title should not be blank."
            },
            'data[Certificate][pdf_file]':{
                required:"Please select pdf. "
            }

        }
    });
</script>
