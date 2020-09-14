

<!-- Breadcrumb section -->
<div class="site-breadcrumb">
  <div class="container"> <a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index'));?>"><i class="fa fa-home"></i> Home</a><i class="fa fa-angle-right"></i><?= $this->Html->link(__($detail['Sector']['sector_name']), $this->request->referer()) ?><i class="fa fa-angle-right"></i> <span><?php echo $detail['Course']['course_name'];?></span> </div>
</div>
<!-- Breadcrumb section end -->

<section id="inner-headline-gallery" class="about-page">
  <div class="carousel-text" align="center">
	<h1><?php echo $detail['Course']['course_name'];?></h1>
    <h1>Pre-Requisite</h1>
  </div>
</section>

<!-- About section -->
<section class="about-section spad pt-0">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 about-text">
        <?php echo $detail['Course']['pre_requisite'];?>
      </div>
	   <div class="col-lg-12 table" align="right" style="border:none;">
      <button class="btn btn-success" onclick="goBack()"><i class="fa fa-angle-double-left" style="font-size:16px"></i> Back</button>
      </div>
	  
    </div>
  </div>
</section>
<!-- About section end-->
<script>
function goBack() {
    window.history.back();
}
</script>
