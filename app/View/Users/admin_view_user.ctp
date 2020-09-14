<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i>User Details
                </div>
            </div>
           <div class="table" style="margin-top:30px;">
                <div style="color:green">                </div><table class="table table-striped table-bordered table-hover" style="text-align:center;">
                    <tbody>
					
                    <tr>
                        <td style="width:200px;">Name</td>
                        <td align="left"><?php echo $userDetail['User']['first_name']," " , $userDetail['User']['last_name']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Email</td>
                        <td align="left"><?php echo $userDetail['User']['email_id'];?></td>
                    </tr>
                      <tr>
                        <td style="width:200px;">Phone Number </td>
                        <td align="left"><?php echo $userDetail['User']['phone'];?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">Gender</td>
                        <td align="left"><?php echo $userDetail['User']['gender'];?></td>
                    </tr>
					<tr>
                        <td style="width:200px;">Marital Status</td>
                        <td align="left"><?php echo $userDetail['User']['maritalstatus'];?></td>
                    </tr>
					<tr>
                        <td style="width:200px;">Age Group</td>
                        <td align="left"><?php echo $userDetail['User']['age'];?></td>
                    </tr>
					<tr>
                        <td style="width:200px;">Ethnic Group</td>
                        <td align="left"><?php echo $userDetail['User']['ethnic'], " - " , $userDetail['User']['sub_ethnic'];?></td>
                    </tr>
					<tr>
                        <td style="width:200px;">Disability</td>
                        <td align="left"><?php echo $userDetail['User']['disability'];?></td>
                    </tr>
                  
                  </tbody></table>

            </div>
                  
        </div>
    </div>
</div>

