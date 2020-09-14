<?php
$page = $this->params['paging']['Content']['page'];
$counter = ($page * 10) - 10 + 1;
//pr($counter);die;
?>
<div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title" style="border-bottom:none;">
                        <div class="caption">
                            <i class="fa fa-reorder"></i>Content Listing
                        </div>
                      <!--   <button type="submit" class="btn green download"><a href="#">Download</a> </button> -->
                    </div>
                    <div class="table" style="margin-top:30px;">
                        <div style="color:red;text-align: center;font-size: 18px;"><?php echo $this->Session->flash(); ?> </div>
                        <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                            <thead>

                                <tr>
                                    <th style="text-align:center" >S.No.</th>
                                    <th style="text-align:center" >Title</th>
                                    <th style="text-align:center">Description</th>
                                    <th style="text-align:center" colspan="2">Action</th>
                                </tr>
                            </thead>
							<tfoot>
                        <tr>
                           <td colspan="9" class="rounded-foot-left"><em><?php echo $this->element('admin_paging_links'); ?></em></td>
                        </tr>
                    </tfoot>
                            <tbody>
                           <?php $i=1; foreach($content as $result) { ?>
                               
                                <tr>
                                      <td><?php echo $i; ?></td>
                                      <td><?php echo $result['Content']['title']; ?></td>
                                      <td><?php echo substr($result['Content']['description'],0,100 ); ?></td>
                                      <td><a href="<?php echo $this->html->url(array('controller'=>'contents','action'=>'admin_viewContent',$result['Content']['id']));?>"><?php echo $this->html->image('view.ico',array('title' => 'View'));?></a></td>
                                      <td><a href="<?php echo $this->html->url(array('controller'=>'contents','action'=>'admin_editContent',$result['Content']['id']));?>"><?php echo $this->html->image('user_edit.png',array('title' => 'Edit'));?></a></td>
                                </tr>
                           <?php $i++;} ?>                                
                            </tbody>
                        </table>
                        
                    </div>                    
                </div>
            </div>
        </div>