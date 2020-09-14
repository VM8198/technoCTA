
<!-- Breadcrumb section -->
<div class="site-breadcrumb">
  <div class="container"> <a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index'));?>"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i> <span>Terms & Conditions</span> </div>
</div>
<!-- Breadcrumb section end -->

<section id="inner-headline-gallery" class="team-page">
  <div class="carousel-text" align="center">
       <h1><?php echo $terms['Content']['title']?></h1>
  </div>
</section>
<section class="about-section spad pt-0">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 about-text">
        <?php echo $terms['Content']['description']?>
      </div>
    </div>
  </div>
</section>

<!-- About section end-->
