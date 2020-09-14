<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Edit Training Reference Materials
                </div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align:center;margin-left: -392px;"> <?php echo $this->Session->flash(); ?></div>
                <?php echo $this->Form->create('Pdf',array('controller'=>'trainings','id'=>'pdfedit','type'=>'file','enctype'=>'multipart/form-data')); ?>
                <div class="form-body">

                    <div class="form-group">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Training Reference Materials</label>
                             <div class="col-md-6">
                                <p class="form-control"><?php echo $pdfDetails['Pdf']['title']; ?></p>
                               
                                <div id="category" style='color:red;'></div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Image</label>
                        <div class="col-md-9">
                            <input type="file" name="data[Pdf][image]" accept="image/x-png,image/gif,image/jpeg">
                            <label for="data[Pdf][image]" class="error"></label><br>
                            <?php echo $this->Html->image('references/image/'. $pdfDetails['Pdf']['image'],array('width'=>'100px','height'=>'100px')); ?>
                            <br> <br>
                        </div>

                    </div> 
					<div class="form-group">
                        <label class="col-md-3 control-label">File</label>
                        <div class="col-md-6">
                            <input  type="file" name="data[Pdf][pdf_file]" accept=".pdf,.docx" value="<?php echo 'references/pdf/'.$pdfDetails['Pdf']['pdf_file']; ?>">
							<p style="color: red">Press select word document and PDF files</p>
                            <label for="data[Pdf][pdf_file]" class="error"></label><br>
                            <a href=""> <?php echo 'references/pdf/'.$pdfDetails['Pdf']['pdf_file']; ?></a>
						
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-3 control-label"></label> 
                            <div class="col-md-9">
                                <br/>
                                <input type="hidden" name="width" value="200"/>
                                <div class="smline col-sm-3">
    							
    								<!-- <a href="<?php echo 'references/pdf/'.$pdfDetails['Pdf']['pdf_file']; ?>" download>Download</a> -->       
                                    <!-- <span> <?php echo $this->Html->link('<i class="glyphicon glyphicon-trash"></i>', array('controller' => 'trainings', 'action' => 'admin_delete',$pdfDetails['Pdf']['id']), array('escape' => false,'alt' =>'delete','title'=>'delete','confirm' => 'Are you sure?You want to Delete')); ?></span> -->
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
                <br/> <br/><br/><br/>
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
<!--<script type="text/javascript">
      function selectCategory() {
        var e = document.getElementById("selectCaterory");
        var optionSelIndex = e.options[e.selectedIndex].value;
        if (optionSelIndex == "selectCategory") {
            $('#category').html('Please select Title');
            return false;
        }
    }
</script>-->
<!-- <script type="text/javascript">
    var validator = $("#pdfedit").validate({
        rules: {
            'data[Pdf][image]': {
                required: true
            },
            'data[Pdf][pdf_file]':{
                required:true
            }
        },
        messages: {
            'data[Pdf][image]': {
                required: "Please select image."
            },
            'data[Pdf][pdf_file]':{
                required:"Please select pdf. "
            }
        }
    });
</script> -->


<style>
.smline {

    margin-bottom: 20px;
}
</style>
