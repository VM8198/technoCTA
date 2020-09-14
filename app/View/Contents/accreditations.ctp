<!-- Breadcrumb section -->
<div class="site-breadcrumb">
  <div class="container"> <a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index'));?>"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i> <span>Accreditation Certificate</span> </div>
</div>
<!-- Breadcrumb section end -->
<section id="inner-headline-gallery" class="policy-certificate">
  <div class="carousel-text" align="center">
     <h1>Accreditation Certificate
 </h1>
  </div>
</section>

<section class="policy-section spad pt-0">
  <div class="container">
   <h4 class="mb-2">Certificates</h4>
    <div class="row">
	   <?php foreach($pdfDetails as $result) { ?>
      <div class="col-md-3 mb-4">
        <?php echo $this->html->image('references/image/'.$result['Certificate']['image'] ,array('class'=>'mb-2'));?>
        <a class="btn btn-warning" href="<?php echo SITEPATH .'app/webroot/img/references/pdf/'.$result['Certificate']['pdf_file']; ?>" download>Free Download</a>
      </div>
    <?php } ?>
    </div>
  </div>
</section>
		  