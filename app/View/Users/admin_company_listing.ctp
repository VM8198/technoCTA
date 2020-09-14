<?php
$page = $this->params['paging']['User']['page'];
$counter = ($page * 10) - 10 + 1;
//pr($counter);die;
?>
<?php //pr($getvalue['companyemail']); die;?>
<div class="row">
     <div class="col-md-12">
            <Form action="companyListing">
            <div class="row">
				<div class="col-sm-3">
				<input type="text" class="form-control" placeholder="Company Name" name="company" value="<?php if(!empty($getvalue['company'])){
		  echo ($getvalue['company']);
	  }else{}?>">
              </div>
			  <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="Company Email ID" name="companyemail" value="<?php if(!empty($getvalue['companyemail'])){
		  echo ($getvalue['companyemail']);
	  }else{}?>">
              </div>
          <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="Email ID" name="email" value="<?php if(!empty($getvalue['email'])){
      echo ($getvalue['email']);
    }else{}?>">
              </div>
              <div class="col-sm-3">
			  <button class="btn green"  type="submit">Filter</button>
              </div>
            </div>
            </Form>
          </div>
	
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title" style="border-bottom:none;">
                        <div class="caption">
                            <i class="fa fa-reorder"></i>Company listing
                        </div>
                        <div class="total_user">Total User: <?php echo  $count;?></div>
                         <button type="submit" class="btn green download"><?php echo $this->Html->link('Download', array( 'controller' => 'users', 'action' => 'admin_cuserexport','?' => array('company' => $_GET['company'],'companyemail' => $_GET['companyemail'],'email' => $_GET['email']))); ?> </button>
                   <label>&nbsp;&nbsp;</label>
                        <!--end-->
                    </div>
                    <div class="table-scrollable" style="margin-top:30px;">
                      <!--  <div style="color:green">   <?php //echo $this->Session->flash(); ?> </div>-->
						 <div style="color:green;text-align: center;font-size: 18px;"><?php echo $this->Session->flash(); ?> </div>
                        <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                            <thead>

                                <tr>
                                    <th style="text-align:center" >S.No.</th>
									<th style="text-align:center" >Company Name</th>
									<th style="text-align:center" >Company Position</th>
                                    <th style="text-align:center">Company Email ID</th>
                                    <th style="text-align:center">Contact Number</th>
                                    <th style="text-align:center" colspan="4">Action</th>

                                </tr>

                            </thead>
                             <tfoot>
                        <tr>
                           <td colspan="9" class="rounded-foot-left"><em><?php echo $this->element('admin_paging_links'); ?></em></td>
                        </tr>
                    </tfoot>
                            <tbody>
                                <?php $i=1; foreach($userList as $result) { ?>
                              
                                <tr>
                                      <td><?php echo $i; ?></td>
									   <td><!--<a href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'admin_bookedcourse',$result['User']['id']));?>">--><?php echo $result['User']['company']; ?><!--</a>--></td>
									  <td><?php echo $result['User']['company_position']; ?></td>
                                      <td><?php echo $result['User']['companyemail']; ?></td>
                                     <td><?php echo $result['User']['phone']; ?></td>
                                    <td><?php if ($result['User']['is_active'] == 0) { ?>
                                    <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_activeCompany', $result['User']['id'])); ?>"><?php echo $this->html->image('test-fail-icon.png', array('title' => 'Deactive')); ?></a>
                                    <?php } else if ($result['User']['is_active'] == 1) { ?>
                                    <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_deactiveCompany', $result['User']['id'])); ?>"><?php echo $this->html->image('test-pass-icon.png', array('title' => 'Active')); ?></a>
                                   <?php } ?></td>
                                   <td><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_viewCompany', $result['User']['id'])); ?>"><?php echo $this->html->image('view.ico',array('title' => 'View'));?></a></td>
                                     <td><?php
                                    echo $this->Html->link('<i class="glyphicon glyphicon-trash"></i>', array(
                                        'controller' => 'users',
                                        'action' => 'admin_deleteCompany',
                                        $result['User']['id']
                                            ), array(
                                        'escape' => false,
                                        'confirm' => 'Are you sure?',
                                        'title' => 'Delete',
                                        'style' => 'color: #428bca;'
                                    ));
                                    ?></td>


                                      </td>
                                </tr>
                            
                           <?php $i++;} ?>
                                
                                   
                            </tbody>
                        </table>
                        
                    </div>                    
                </div>
            </div>
        </div>
<!--code added by anup-->
<script>
       function selectsort() {
        var value = $("#sortdata1").val();
        //alert(value);
        var value1 = $("#sortdata2").val();
        if (value1 == "") {
            alert("Please select first sort by name");
            return false;
        }
       if (value == "ASC") {
            window.location.href = SITEPATH + "admin/users/userListing/" + value1 +'/'+ value;
        } else if (value == "DESC") {
            window.location.href = SITEPATH + "admin/users/userListing/" + value1 +'/'+ value;
        }
    }
</script>
