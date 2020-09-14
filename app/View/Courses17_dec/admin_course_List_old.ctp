<?php
$page = $this->params['paging']['Course']['page'];
$counter = ($page * 10) - 10 + 1;
//pr($counter);die;
?>
<div class="row">
    
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title" style="border-bottom:none;">
                        <div class="caption">
                            <i class="fa fa-reorder"></i>Course listing
                        </div>
                        
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
                                    <th style="text-align:center" >Sector Name</th>
                                    <th style="text-align:center" >Course Name</th>
                                    <th style="text-align:center" >Duration </th>
                                    <th style="text-align:center" >Start Date</th>
                                    <th style="text-align:center" >End Date</th>
                                    <th style="text-align:center" >Number of Delegates</th>
                                    <th style="text-align:center">Price per Delegate</th>
                                    <th style="text-align:center">Expiry competence</th>
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
                                      <td><?php echo $result['Course']['course_name']; ?></td>
                                      <td><?php echo $result['Course']['duration']; ?></td>
                                      <td><?php echo $result['Course']['start_date']; ?></td>
                                      <td><?php echo $result['Course']['end_date']; ?></td>
<<<<<<< .mine
                                     <td><?php echo $result['Course']['price']; ?></td>
                                   <td><a href="<?php echo $this->html->url(array('controller'=>'courses','action'=>'admin_editCourse',$result['Course']['id']));?>"><?php echo $this->html->image('user_edit.png',array('title' => 'Edit'));?></a></td> 
                                   <td><?php
                                    echo $this->Html->link('<i class="glyphicon glyphicon-trash"></i>', array(
||||||| .r67
                                     <td><?php echo $result['Course']['fee']; ?></td>
                                   <td><a href="<?php echo $this->html->url(array('controller'=>'courses','action'=>'admin_editCourse',$result['Course']['id']));?>"><?php echo $this->html->image('user_edit.png',array('title' => 'Edit'));?></a></td> 
                                   <td><?php
                                    echo $this->Html->link('<i class="glyphicon glyphicon-trash"></i>', array(
=======
                                      <td><?php echo $result['Course']['delegates_no']; ?></td>
                                      <td><?php echo $result['Course']['delegate_price']; ?></td>
                                      <td><?php echo $result['Course']['expiry']; ?></td>
                                      <td><a href="<?php echo $this->html->url(array('controller'=>'courses','action'=>'admin_editCourse',$result['Course']['id']));?>"><?php echo $this->html->image('user_edit.png',array('title' => 'Edit'));?></a></td> 
                                       <td><?php
                                       echo $this->Html->link('<i class="glyphicon glyphicon-trash"></i>', array(
>>>>>>> .r74
                                        'controller' => 'courses',
                                        'action' => 'admin_deleteCourse',
                                        $result['Course']['id']
                                            ), array(
                                        'escape' => false,
                                        'confirm' => 'Are you sure?',
                                        'title' => 'Delete'
                                          ));?></td>
                                </tr>
                            
                              <?php $i++;} ?>       
                            </tbody>
                        </table>
                        
                    </div>                    
                </div>
            </div>
        </div>