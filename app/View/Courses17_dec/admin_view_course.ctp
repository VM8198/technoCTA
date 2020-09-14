
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
                                        $courseView['Course']['id']
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
                        <td style="width:200px;">Sector Name:</td>
                        <td align = "left"><?php echo $courseView['Sector']['sector_name'] ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Location Name:</td>
                        <td align = "left"><?php echo $courseView['Location']['location'] ?></td>
                    </tr>
					<tr>
                        <td style="width:200px;">Course Name:</td>
                        <td align = "left"><?php echo $courseView['Course']['course_name']; ?></td>
                    </tr>

                    <tr>
                        <td style="width:200px;">Duration:</td>
                        <td align = "left"><?php echo $courseView['Course']['duration'] ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Course Date:</td>
                        <td align = "left"><?php echo $courseView['Course']['start_date'] ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Start Time:</td>
                        <td align = "left"><?php echo $courseView['Course']['start_time'] ?></td>
                    </tr>
					                     <tr>
                        <td style="width:200px;">End Time:</td>
                        <td align = "left"><?php echo $courseView['Course']['end_time'] ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">No.of Delegates per Session:</td>
                        <td align = "left"><?php echo $courseView['Course']['delegates_no'] ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Price Per Delegate(excl VAT):</td>
                        <td align = "left"><?php echo $courseView['Course']['delegate_price'] ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Expiry Competence:</td>
                        <td align = "left"><?php echo $courseView['Course']['expiry'] ?></td>
                    </tr>
					<tr>
                        <td style="width:200px;">Instruction:</td>
                        <td align = "left"><?php echo $courseView['Course']['pre_requisite']; ?></td>
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