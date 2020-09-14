<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Edit Gallery
                </div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align:center;margin-left: -392px;"> <?php echo $this->Session->flash(); ?></div>
                <?php echo $this->Form->create('Gallery',array('controller'=>'galleries','id'=>'galleryadd','type'=>'file','onsubmit'=>"return selectCategory()")); ?>
                <div class="form-body">

                    <div class="form-group">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Title</label>
                             <div class="col-md-6">
                                <input type="text" class="form-control" name="data[Gallery][title]" value="<?php echo $galleryDetail['Gallery']['title']; ?>">
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
                            <input type="file" name="data[GalleryImage][image][]" multiple="true">
                            <p style="color: red">Press ctrl to select multiple images</p>
<!--                        <input type="hidden" name="width" value="200"/>-->
                            <!-- <?php echo $this->Html->image( $list['Gallery']['image'], array('width' => '50px', 'height' => '50px')); ?>  -->            
                       </div>
                        
                        </div>
                        <br>
                    <br>
                    <div class="form-group">
                        <div class="row">
                       <label class="col-md-3 control-label"></label> 
                        <div class="col-md-9">
                            <br/>
                            <input type="hidden" name="width" value="200"/>
                            <?php foreach ($galleryImage as $result) { ?>
                                <div class="smline col-sm-3">
                                    <?php echo $this->Html->image('galleryimage/' . $result['GalleryImage']['image'],array('width'=>'100px','height'=>'100px')); ?>
                                        
                                    <span> <?php echo $this->Html->link('<i class="glyphicon glyphicon-trash"></i>',array('controller' => 'galleries', 'action' => 'admin_deleteGallImage',$result['GalleryImage']['id']), array('escape' => false,'alt' =>'delete','title'=>'delete','confirm' => 'Are you sure?You want to Delete')); ?></span>
                                </div>
                                <?php } ?>
                       </div>
                        </div>

                        </div>

                </div>
                <br/> <br/><br/><br/>
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
<script type="text/javascript">
    var validator = $("#galleryadd").validate({
        rules: {
            'data[Gallery][title]': {
                required: true
            }
          
        },
        messages: {
            'data[Gallery][title]': {
                required: "Title Should not blank!"
            }

        },
     

    });
    </script>

<style>
.smline {

    margin-bottom: 20px;
}
</style>