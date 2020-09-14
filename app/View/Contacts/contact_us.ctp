
<?php
 //echo $this->Html->script('map');
 ?>
<!-- Breadcrumb section -->
<div class="site-breadcrumb">
  <div class="container"> <a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index'));?>"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i> <span>Contact</span> </div>
</div>
<!-- Breadcrumb section end --> 

<!-- Courses section -->
<section class="contact-page spad pt-0">
  <div class="container">
    <div class="map-section">
      <div class="contact-info-warp">
        <div class="contact-info">
          <h4>Address</h4>
          <p>7 Pier Parade, london E16 2LJ</p>
          <p>7 Woodman Parade, London E16 2LL</p>
        </div>
        <div class="contact-info">
          <h4>Phone</h4>
          <p><a href="tel:02070550877">0207-0550-877</a></p>
        </div>
        <div class="contact-info">
          <h4>Email</h4>
          <p><a href="mailto:info@technocta.co.uk">info@technocta.co.uk</a></p>
        </div>
       <!-- <div class="contact-info">
          <h4>Working time</h4>
          <p>Monday - Friday: 08 AM - 06 PM</p>
        </div>-->
      </div>
      <!-- Google map -->
      <div class="map" id="map"></div>
    </div>
    <div class="contact-form spad pb-0">
      <div class="section-title text-center" id="contact_id">
        <h3>GET IN TOUCH</h3>
        <p>Contact us for more details</p> 
      </div>

       <div style="color:red;text-align:center;font-size:18px;position: relative;" id="successMsg"><?php echo $this->Session->flash(); ?> </div>
          <?php echo $this->Form->create('Contact', array('class' => 'comment-form --contact', 'id' => 'contactForm')); ?>    
        <div class="row">
          <div class="col-lg-4">
              <input type="text" name="data[Contact][name]" placeholder="Your Name">
          </div>
          <div class="col-lg-4">
            <input type="text" name="data[Contact][email]" placeholder="Your Email">
          </div>
          <div class="col-lg-4">
            <input type="text" name="data[Contact][phone]" maxlength="14" onkeypress="javascript:return isNumber(event)" placeholder="Phone Number">
          </div>
          <div class="col-lg-12">
              <textarea name="data[Contact][message]" placeholder="Message"></textarea>
            <div class="text-center form">
              <button class="site-btn" id="contact_dis" disabled="">SUBMIT</button>
            </div>
          </div>
        </div>
      <?php echo $this->form->end(); ?>
    </div>
  </div>
</section>
<!-- Courses section end-->
<!-- <script type="text/javascript">
    var validator = $("#contactForm").validate({
        rules: {
            'data[Contact][name]':{
                required:true
            },
            'data[Contact][email]':{
                required:true,
                email:true
            },
            'data[Contact][phone]':{
                required: true
            },
            'data[Contact][message]':{
                required:true
            }
          
        },
        messages: {
            'data[Contact][name]':{
                required:"Name should not be blank."
            },
            'data[Contact][email]':{
                required:"Email should not be blank."
            },
            'data[Contact][phone]':{
                required: "Phone number should not be blank. "
            },
            'data[Contact][message]':{
                required:"Message should not be blank."
            }
        },
     

    });
</script> -->
<script type="text/javascript">

    // WRITE THE VALIDATION SCRIPT.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    

</script>
<script>
setTimeout(function() {
    $('#flashMessage').fadeOut('fast');
}, 10000);
</script>
