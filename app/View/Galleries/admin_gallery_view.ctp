<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Gallery Images
                </div>
            </div>
           <div class="table" style="margin-top:30px;">
                <div style="color:green"></div>
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                    <tbody>
                    <tr>
                        <td style="width:200px;"><?php echo $posttitle['Gallery']['title']; ?></td>
                        <?php foreach($gallery as $result) { ?>
                        <td align="left"><?php echo $this->html->image('galleryimage/'.$result['GalleryImage']['image'] ,array('width'=>'50px','height'=>'50')); ?></img></td>
                    <?php } ?>
                    </tr>
                  </tbody></table>

            </div>
                  
        </div>
    </div>
</div>
