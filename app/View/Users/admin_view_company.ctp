<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Company Details
                </div>
            </div>
           <div class="table" style="margin-top:30px;">
                <div style="color:green">                </div><table class="table table-striped table-bordered table-hover" style="text-align:center;">
                    <tbody>
					<tr>
                        <td style="width:200px;">Company Name</td>
                        <td align="left"><?php echo $userDetail['User']['company'];?></td>
                    </tr>
					<tr>
                        <td style="width:200px;">Company Position</td>
                        <td align="left"><?php echo $userDetail['User']['company_position'];?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">First Name</td>
                        <td align="left"><?php echo $userDetail['User']['first_name']; ?></td>
                    </tr>
					<tr>
                        <td style="width:200px;">Last Name</td>
                        <td align="left"><?php echo $userDetail['User']['last_name'];?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Email</td>
                        <td align="left"><?php echo $userDetail['User']['email_id'];?></td>
                    </tr>
                      <tr>
                        <td style="width:200px;">Phone Number </td>
                        <td align="left"><?php echo $userDetail['User']['phone'];?></td>
                    </tr>
                  </tbody></table>

            </div>
                  
        </div>
    </div>
</div>

