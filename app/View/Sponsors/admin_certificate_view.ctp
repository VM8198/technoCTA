<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Certificate Details
                </div>
            </div>

            <div class="table" style="margin-top:30px;">
                <div style="color:green">   <?php echo $this->Session->flash(); ?> </div>
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">

                    <tr>
                        <td style="width:200px;">Title</td>
                        <td align = "left"><?php echo $pdfview['Certificate']['title']; ?></td>
						</tr>
						<tr>
						<td style="width:200px;">Image</td>						
                        <td align = "left"><?php echo $this->html->image('references/image/'.$pdfview['Certificate']['image'] ,array('width'=>'50px','height'=>'50')); ?>
                        <a href="<?php echo 'http://techno.sdssoftltd.co.uk/app/webroot/img/references/pdf/'.$pdfview['Certificate']['pdf_file']; ?>" download>Download</a></td>
                    </tr>
                </table>

            </div>                    
        </div>
    </div>
</div>