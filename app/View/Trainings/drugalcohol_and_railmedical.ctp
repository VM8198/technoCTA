<script>
    var SITEPATH = '<?php echo SITEPATH; ?>';
    //alert(SITEPATH);
</script>
<!-- Breadcrumb section -->
<div class="site-breadcrumb">
  <div class="container"> 
  	<a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index'));?>"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i> <span>Drug & Alcohol FAQs and Rail Medical Standards</span> 
  </div>
</div>
<!-- Breadcrumb section end -->

<section id="inner-headline-gallery" class="about-page">
  <div class="carousel-text" align="center">
    <h1>Drug & Alcohol FAQs and  <strong>Rail Medical Standards</strong></h1>
  </div>
</section>
<section class="about-section spad pt-0">
<div class="container"> 

    <div class="row">
      <?php foreach($pdfDetails as $result) { ?>
      <div class="col-md-3 mb-4">
          <h4>Rail Medical Standards</h4>
        <?php echo $this->html->image('references/image/'.$result['Pdf']['image'] ,array('class'=>'mb-2'));?>
        <a class="btn btn-warning" href="<?php echo SITEPATH .'app/webroot/img/references/pdf/'.$result['Pdf']['pdf_file']; ?>" download>Free Download</a>
      </div>
    <?php } ?>

   
   
      <?php foreach($drugPdfDetails as $result) { ?>
      <div class="col-md-3 mb-4">
         <h4>Drug & Alcohol FAQs</h4>
        <?php echo $this->html->image('references/image/'.$result['Pdf']['image'] ,array('class'=>'mb-2'));?>
        <a class="btn btn-warning" href="<?php echo SITEPATH .'app/webroot/img/references/pdf/'.$result['Pdf']['pdf_file']; ?>" download>Free Download</a>
      </div>
    <?php } ?>
    </div>
      
  
    </div>
</div>
</section>
<!-- About section end-->