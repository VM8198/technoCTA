

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
      <?php if( $detail['Course']['sector_id'] == 1 ){ ?>
        <div class="col-lg-12 table" align="right" style="border:none;">
        <button class="btn btn-success" onclick="goBack()"><i class="fa fa-angle-double-left" style="font-size:16px"></i> Back</button>
        </div>
     <?php } ?>
     <?php if( $detail['Course']['sector_id'] == 2 ){ ?>
        <div class="col-lg-12 table" align="right" style="border:none;">
        <button class="btn btn-success" onclick="goBack1()"><i class="fa fa-angle-double-left" style="font-size:16px"></i> Back</button>
        </div>
     <?php } ?>
     <?php if( $detail['Course']['sector_id'] == 3 ){ ?>
        <div class="col-lg-12 table" align="right" style="border:none;">
        <button class="btn btn-success" onclick="goBack2()"><i class="fa fa-angle-double-left" style="font-size:16px"></i> Back</button>
        </div>
     <?php } ?>
     <?php if( $detail['Course']['sector_id'] == 4 ){ ?>
        <div class="col-lg-12 table" align="right" style="border:none;">
        <button class="btn btn-success" onclick="goBack3()"><i class="fa fa-angle-double-left" style="font-size:16px"></i> Back</button>
        </div>
     <?php } ?>
     <?php if( $detail['Course']['sector_id'] == 5 ){ ?>
        <div class="col-lg-12 table" align="right" style="border:none;">
        <button class="btn btn-success" onclick="goBack4()"><i class="fa fa-angle-double-left" style="font-size:16px"></i> Back</button>
        </div>
     <?php } ?>
     <?php if( $detail['Course']['sector_id'] == 6 ){ ?>
        <div class="col-lg-12 table" align="right" style="border:none;">
        <button class="btn btn-success" onclick="goBack5()"><i class="fa fa-angle-double-left" style="font-size:16px"></i> Back</button>
        </div>
     <?php } ?>
	  
	  
    </div>
  </div>
</section>
<!-- About section end-->
<script>
function goBack() {
  window.location.href = "https://technocta.sdssoftltd.co.uk/courses/railway_safety";
}
function goBack1() {
  window.location.href = "https://technocta.sdssoftltd.co.uk/courses/construction";
}
function goBack2() {
  window.location.href = "https://technocta.sdssoftltd.co.uk/courses/plant_operation";
}
function goBack3() {
  window.location.href = "https://technocta.sdssoftltd.co.uk/courses/small_tools";
}
function goBack4() {
  window.location.href = "https://technocta.sdssoftltd.co.uk/courses/health_safety";
}
function goBack5() {
  window.location.href = "https://technocta.sdssoftltd.co.uk/courses/drug_medical";
}
</script>
