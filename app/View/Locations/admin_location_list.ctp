<?php
$page = $this->params['paging']['Location']['page'];
$counter = ($page * 10) - 10 + 1;
//pr($counter);die;
?>
<div class="row">
    
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title" style="border-bottom:none;">
                        <div class="caption">
                            <i class="fa fa-reorder"></i>Location listing
                        </div>
                      <!-- <div class="caption" style="float: right;">
                            <button style="color: #449ac6;background: white;border: none;padding: 8px 10px;">Download</button>
                      </div>   -->
                       <button type="submit" class="btn green download"><?php echo $this->Html->link('Download', array( 'controller' => 'locations', 'action' => 'admin_locationExport')); ?>
                   <label>&nbsp;&nbsp;</label>
                        <!--end-->
                    </div>
                    <div class="table-scrollable" style="margin-top:30px;">
                      <!--  <div style="color:green">   <?php //echo $this->Session->flash(); ?> </div>-->
						 <div style="color:red;text-align: center;font-size: 18px;"><?php echo $this->Session->flash(); ?> </div>
                        <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                            <thead>

                                <tr>
                                    <th style="text-align:center" >S.No.</th>
                                    <th style="text-align:center" >Location Name</th>
                                    <th style="text-align:center" >Complete Location</th>
                                    <th style="text-align:center" colspan="2">Action</th>

                                </tr>

                            </thead>
                             <tfoot>
                        <tr>
                           <td colspan="9" class="rounded-foot-left"><em><?php echo $this->element('admin_paging_links'); ?></em></td>
                        </tr>
                    </tfoot>
                            <tbody>
                                <?php $i=1; foreach($locationList as $result) { ?>
                              
                                <tr>
                                      <td><?php echo $i; ?></td>
                                      <td><?php echo $result['Location']['location']; ?></td>
                                      <td><?php echo $result['Location']['complete_location']; ?></td> 
                                      <td><a href="<?php echo $this->html->url(array('controller'=>'locations','action'=>'admin_editLocation',$result['Location']['id']));?>"><?php echo $this->html->image('user_edit.png',array('title' => 'Edit'));?></a></td> 
                                       <td><?php
                                       echo $this->Html->link('<i class="glyphicon glyphicon-trash"></i>', array(
                                        'controller' => 'locations',
                                        'action' => 'admin_deleteLocation',
                                        $result['Location']['id']
                                            ), array(
                                        'escape' => false,
                                        'confirm' => 'Are you sure?',
                                        'title' => 'Delete',
                                          'style' => 'color: #428bca;'
                                          ));?></td>
                                </tr>
                            
                              <?php $i++;} ?>       
                            </tbody>
                        </table>
                        
                    </div>                    
                </div>
            </div>
        </div>