<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Add Training Reference Materials
                </div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align:center;margin-left: -392px;"> <?php echo $this->Session->flash(); ?></div>
                <?php echo $this->Form->create('Pdf',array('controller'=>'trainings','id'=>'pdfadd','type'=>'file','enctype'=>'multipart/form-data')); ?>
                <div class="form-body">

                    <div class="form-group">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Training Reference Materials</label>
                             <div class="col-md-6">
								<select  name="data[Pdf][title]" id="selectTitle" class="form-control">
								<option value="">Select Training Reference Materials</option>
                                <option value="Handbooks- Network Rail">Handbooks- Network Rail</option>
                                <option value="Handbooks - London Underground">Handbooks - London Underground</option>
                                <option value="Keypoints Card - Network Rail">Keypoints Card - Network Rail</option>
                                <option value="Sentinel">Sentinel</option>
								<option value="Rail Medical Standards">Rail Medical Standards</option>
								<option value="Drug & Alcohol FAQs">Drug & Alcohol FAQs</option>
								</select>
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
                            <input  type="file" name="data[Pdf][image]" accept="image/x-png,image/gif,image/jpeg">
							<label for="data[Pdf][image]" class="error"></label>
                        </div>
                    </div>
					<br>
					<br>
					<br>
					<br>
					<br>
				    <div class="form-group">
                          <label class="col-md-3 control-label">File</label>
                        <div class="col-md-6">
                            <input  type="file" name="data[Pdf][pdf_file]" accept=".pdf , .docx">
							<p style="color: red">Press select word document and PDF files</p>
                            <label for="data[Pdf][pdf_file]" class="error"></label>
                        </div>
                    </div>
					</div>
					<br>
					<br>
					<div class="form-actions fluid">
                    <div class="col-md-offset-3 col-md-6">
                        <button class="btn green" type="submit" id="btnsubmit">Submit</button>
                        <a class="btn default" href="<?php echo $this->html->url(array('controller' => 'trainings', 'action' => 'admin_pdfListing')); ?>">
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
            
            'data[Pdf][title]':{
                required:true
            },
            'data[Pdf][pdf_file]':{
                required:true
            }
        },
        messages: {
           
            'data[Pdf][title]': {
                required: "Title should not be blank."
            },
            'data[Pdf][pdf_file]':{
                required:"Please select pdf. "
            }

        }
    });
</script>
