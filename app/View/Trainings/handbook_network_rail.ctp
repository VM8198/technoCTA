<script>
    var SITEPATH = '<?php echo SITEPATH; ?>';
    //alert(SITEPATH);
</script>

<!-- Breadcrumb section -->
<div class="site-breadcrumb">
  <div class="container"> 
  	<a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index'));?>"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i> <span>Handbooks-Network Rail</span> 
  </div>
</div>
<!-- Breadcrumb section end -->

<section id="inner-headline-gallery" class="about-page">
  <div class="carousel-text" align="center">
    <h1>Handbooks-<strong>Network Rail</strong></h1>
  </div>
</section>
<section class="about-section spad pt-0">
<div class="container"> 
	<h4>Handbooks- Network Rail</h4>
    <div class="row">
      <?php  foreach($pdfDetails as $result) { ?>
      <div class="col-md-3 mb-4">
        <?php echo $this->html->image('references/image/'.$result['Pdf']['image'] ,array('class'=>'mb-2'));?>
        <a class="btn btn-warning" target="_blank" href="<?php echo SITEPATH .'app/webroot/img/references/pdf/'.$result['Pdf']['pdf_file']; ?>" download>Free Download</a>
      </div>
    <?php } ?>
    </div>
</div></section>

<!-- About section end-->