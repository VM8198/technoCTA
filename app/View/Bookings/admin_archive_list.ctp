<?php
$page = $this->params['paging']['Course']['page'];
$counter = ($page * 10) - 10 + 1;
//pr($counter);die;
?>
<div class="row">
			  <div class="col-md-12">
			<Form action="archiveList">
            <div class="row">
				<div class="col-sm-3"><label>Rail Course</label>
				<Select type="text" class="form-control" name="rail_id">
                  <option value="">Select Option</option>
                  <?php foreach($sector as $result) {
					if($result['Sector']['id']=="1"){	?>
                  <option value="<?php echo $result['Sector']['id']; ?>"<?php
                            if (!empty($getvalue['rail_id'])) {
                                 echo ($getvalue['rail_id'] == $result['Sector']['id'])? "selected" : ""; 
                            }
                          ?>><?php echo $result['Sector']['sector_name']; ?></option>
					<?php }} ?>
                </Select>
              </div>
			  <div class="col-sm-3"><label>Non-Rail Course</label>
				<Select type="text" class="form-control" name="rail_id">
                  <option value="">Select Option</option>
                 <?php foreach($sector as $result) { 
					if($result['Sector']['id']!="1"){?>
                  <option value="<?php echo $result['Sector']['id']; ?>"<?php
                            if (!empty($getvalue['nonrail_id'])) {
                                 echo ($getvalue['nonrail_id'] == $result['Sector']['id'])? "selected" : ""; 
                            }
                          ?>><?php echo $result['Sector']['sector_name']; ?></option>
					<?php } } ?>
                </Select>
              </div>
              <div class="col-sm-3">
			  <button class="btn green filter-btn" type="submit">Filter</button>
              </div>
            </div>
            </Form>
          </div>
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title" style="border-bottom:none;">
                        <div class="caption">
                            <i class="fa fa-reorder"></i>Archive Listing
                        </div>
                       <button type="submit" class="btn green download"><?php echo $this->Html->link('Download', array( 'controller' => 'bookings', 'action' => 'admin_archiveExport','?' => array('rail_id' => $_GET['rail_id'],'nonrail_id' => $_GET['nonrail_id']))); ?>
                   <label>&nbsp;&nbsp;</label>
                        <!--end-->
                    </div>
                    <div class="table-scrollable" style="margin-top:30px;">
                      <!--  <div style="color:green">   <?php //echo $this->Session->flash(); ?> </div>-->
						 <div style="color:red;text-align: center;font-size: 18px;" id="msg_ajax"><?php echo $this->Session->flash(); ?> </div>
                        <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                            <thead>

                                <tr>
                                    <th style="text-align:center" >S.No.</th>
                                    <th style="text-align:center" >Sector Name</th>
                                    <th style="text-align:center">Location</th>
                                    <th style="text-align:center" >Course Name</th>
                                    <th style="text-align:center" >Duration </th>
                                    <th style="text-align:center" colspan="2">Action</th>

                                </tr>

                            </thead>
                             <tfoot>
                        <tr>
                           <td colspan="9" class="rounded-foot-left"><em><?php echo $this->element('admin_paging_links'); ?></em></td>
                        </tr>
                    </tfoot>
                            <tbody>
                                <?php $i=1; foreach($courseList as $result) { ?>
                              
                                <tr>
                                      <td><?php echo $i; ?></td>
                                      <td><?php echo $result['Sector']['sector_name']; ?></td>
                                      <td><?php echo $result['Location']['location']; ?></td>
                                      <td><?php echo $result['Course']['course_name']; ?></td>
                                      <td><?php echo $result['Course']['duration']; ?></td>


									  <!--  <td><?php if ($result['Course']['is_active'] == 1) { ?>
                                    <a href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'admin_active', $result['Course']['id'])); ?>"><?php echo $this->html->image('test-fail-icon.png', array('title' => 'Disabled')); ?></a>
                                    <?php } else if ($result['Course']['is_active'] == 0) { ?>
                                    <a href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'admin_deactive', $result['Course']['id'])); ?>"><?php echo $this->html->image('test-pass-icon.png', array('title' => 'Enabled')); ?></a>
                                   <?php } ?></td> -->


                <td><a href="<?php echo $this->html->url(array('controller'=>'courses','action'=>'admin_viewCourse',$result['Course']['id']));?>"><?php echo $this->html->image('view.ico',array('title' => 'View'));?></a></td>

                   <td><a href="<?php echo $this->html->url(array('controller'=>'courses','action'=>'admin_editArchiveCourse',$result['Course']['id']));?>"><?php echo $this->html->image('user_edit.png',array('title' => 'Edit'));?></a></td>

              <!--     <td>

                    <input type="checkbox" name="archives" class="checkk" id='free_promo_<?php echo $result['Course']['id'];?>' value="<?php echo $result['Course']['id'] ?>" >
                  </td>  -->
                  
             <!--       <td><?php
                        echo $this->Html->link('<i class="fa fa-archive" aria-hidden="true"></i>', array(
                                        'controller' => 'courses',
                                        'action' => 'admin_unarchiveCourse',
                                        $result['Course']['id']
                                            ), array(
                                        'escape' => false,
                                        'confirm' => 'Are you sure?',
                                        'title' => 'Archive'
                                          ));?></td> -->
                                </tr>
                            
                              <?php $i++;} ?>       
                            </tbody>
                        </table>
                        
                    </div>
                   <!--  <button class="btn btn-success" type="button" name="send_archive" id="send_archive">Unarchive</button> -->                    
                </div>
            </div>
        </div>

<?php echo $this->html->script("/admin_assets/js/jquery.min.js"); ?>
<script>
$(document).ready(function(){
$('#send_archive').on('click',function(){
var test=[];
$("input:checkbox[name=archives]:checked").each(function(){
    test.push($(this).val());
});
//var n_id=$('#n_id').val();
if(test.length>0)
{
$.ajax({
        dataType: "html",
        type: "POST",
        evalScripts: true,
        url: '<?php echo Router::url(array('controller'=>'courses','action'=>'admin_unarchiveCourse'));?>',
        data: ({'courseId':test}),
        success: function (data){
          // alert(data)
            if(data='1')
            {
              $("html, body").animate({ scrollTop: 0 }, "slow");
              document.getElementById("msg_ajax").innerHTML = "You have successfully Unarchived the courses.";
 //              setTimeout(function(){  window.location.href = 'https://techno.sdssoftltd.co.uk/admin/bookings/archiveList';
 // }, 5000);
            }else
            {
              window.location.reload();
            }
        }
    });
    }
    
    else
    {
        alert('Please select at least one course');
    }


});

});

</script>
