<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Add PDF Files
                </div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align:center;margin-left: -392px;"> <?php echo $this->Session->flash(); ?></div>
                <?php echo $this->Form->create('Pdf',array('controller'=>'trainings','id'=>'pdfadd','type'=>'file','enctype'=>'multipart/form-data')); ?>
                <div class="form-body">
                   
                    <div class="form-group">
                          <label class="col-md-3 control-label">PDF</label>
                        <div class="col-md-6">
                            <input  type="file" name="data[PdfDocument][pdf_file][]" multiple="true" >
							<p style="color: red">Press ctrl to select multiple images</p>
							<label for="data[PdfDocument][pdf_file][]" class="error"></label>
                        </div>
                    </div>
					<br>
					<br>
					</div>
					<div class="form-actions fluid">
                    <div class="col-md-offset-3 col-md-6">
                        <button class="btn green" type="submit">Save</button>
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
			'data[PdfDocument][pdf_file][]':{
				required:true
			}
          
        },
        messages: {
			'data[PdfDocument][pdf_file][]':{
				required:"Please upload pdf."
            }

        },
     

    });
</script>

