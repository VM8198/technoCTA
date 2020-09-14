<?php echo $this->Html->script('jquery.js'); ?> 
<?php echo $this->Html->script('jquery.validate.min.js'); ?> 
<!-- Reset password Start-->
  <div class="reset-page">
    <div class="password">
      <div class="password-header">
        <div style="color: red; text-align: center; font-size: 18px; position: relative; display: none;" id="successMsg"><?php echo $this->Session->flash('setpass'); ?></div>
        <h4 class="reset-title">Reset Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="col-sm-12">
          <div class="center-form">
          <?php echo $this->Form->create('User', array('controller'=>'users','action'=>'setForgotPassword','class' => 'comment-form --contact text-center', 'id' => 'setForgetPass')); ?>
             <input type="hidden" id="email" name="email" value="<?php echo $userDetails['User']['email_id']; ?>">
             <input type="hidden"  name="data[User][id]" value="<?php echo $userDetails['User']['id']; ?>">
             <div class="row">
              <div class="col-lg-12">
                 <div class="reset-input">

                <input type="password" class="contactmodal" id="UserPassword" name="data[User][password]" placeholder="New Password">
              </div>
              </div>
              <div class="col-lg-12">
                <input type="password" class="contactmodal" name="data[User][cPassword]" placeholder="Confirm Password">
              </div>
              <div class="col-lg-12">
                <div class="text-center">
                  <button class="site-btn modal-btn" type="submit">Submit</button>
                </div>
              </div>
            </div>

         <?php echo $this->Form->end(); ?>
         </div>
        </div>
      </div>
    </div>
  </div>

<!-- Reset password End-->
<script type="text/javascript">
var validator = $("#setForgetPass").validate({
          rules: {
            'data[User][password]': {
                  required: true
            },
            'data[User][cPassword]' : {
                  required: true,
                  equalTo: "#UserPassword" 
              }
          },
          messages:{
            'data[User][password]': {
                  required: "Password should not be blank."
             },
            'data[User][cPassword]': {
               required: "Confirm password should not be blank.",
               equalTo: "Both password must match."
          }
       }    
    });

</script>
<script>
setTimeout(function() {
    $('#successMsg').fadeOut('fast');
}, 10000);
</script>