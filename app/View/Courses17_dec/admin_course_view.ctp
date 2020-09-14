
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Course Details</div>
					
			<div class="button-del">	<?php
                                    echo $this->Html->link('Delete', array(
                                        'controller' => 'courses',
                                        'action' => 'admin_delete',
                                        $contactDetail['Course']['id']
                                            ), array(
                                        'escape' => false,
                                        'confirm' => 'Are you sure you want to delete this contact details?',
                                        'title' => 'Delete'
                                    ));
                                    ?>
					
			</div>		
                </div>
            </div>
            <div class="table" style="margin-top:30px;">
                <div style="color:green"><?php echo $this->Session->flash(); ?> </div>
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                    <tr>
                        <td style="width:200px;">Name:</td>
                        <td align = "left"><?php echo $contactDetail['Course']['name'] ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Email Address:</td>
                        <td align = "left"><?php echo $contactDetail['Course']['email'] ?></td>
                    </tr>
					<tr>
                        <td style="width:200px;">Phone Number</td>
                        <td align = "left"><?php echo $contactDetail['Course']['phone']; ?></td>
                    </tr>

                                        <tr>
                        <td style="width:200px;">Message:</td>
                        <td align = "left"><?php echo $contactDetail['']['message'] ?></td>
                    </tr>

                </table>                        
            </div>                    
        </div>
    </div>
</div>




<style>
    .button-del{ float: right;
    color: #fff;
    font-size: 18px;
    font-weight: 400;
    padding-bottom: 6px;
    }
    .button-del a{ color: #fff;}
    
</style>