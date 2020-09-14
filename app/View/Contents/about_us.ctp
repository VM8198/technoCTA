

<!-- Breadcrumb section -->
<div class="site-breadcrumb">
  <div class="container"> <a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index'));?>"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i> <span>About Us</span> </div>
</div>
<!-- Breadcrumb section end -->

<section id="inner-headline-gallery" class="about-page">
  <div class="carousel-text" align="center">
    <h1><?php echo $aboutUs['Content']['title']?></h1>
  </div>
</section>

<!-- About section -->
<section class="about-section spad pt-0">
  <div class="container">
    <div class="row">
     
        <?php echo $aboutUs['Content']['description']?>
      
    </div>
  </div>
</section>
<!-- About section end-->
