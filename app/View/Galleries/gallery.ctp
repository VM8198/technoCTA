<script>
		var SITEPATH = '<?php echo SITEPATH; ?>';
		//alert(SITEPATH);
</script>
<?php $site = SITEPATH; ?>
<!-- Breadcrumb section -->
<div class="site-breadcrumb">
  <div class="container"> <a href="<?php echo $this->html->url(array('controller' => 'homes', 'action' => 'index'));?>"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i> <span>Gallery</span> </div>
</div>
<!-- Breadcrumb section end -->

<section id="inner-headline-gallery" class="about-us">
  <div class="carousel-text" align="center">
    <h1>Our<b> Gallery</b></h1>
  </div>
</section>
<section id="signages" >
  <div class="container">
  <?php $i=1; foreach($gallery as $result) { ?>
    <div class="col-sm-12">
	 	<h2><?php echo $result['Gallery']['title']; ?></h2>
		<hr>
      <div class="grid cs-style-4" >
       <div class="gallery row" id="lightgallery<?php echo $i;?>">
	   
			<?php foreach($result['GalleryImage'] as $image) {   ?>
				<?php $imgpath = SITEPATH . "app/webroot/img/galleryimage/" . $image['image']; //pr($imgpath); ?>
                    <?php $imgpath1 = "$site" . "homes/resizeimage/" . $image['image'] . '/300/200'; ?>
					<div class="col-sm-3" data-src="<?php echo $imgpath;?>">
						<div class="img-gallery">
							<?php  echo $this->html->image('/img/galleryimage/'.$image['image'] ,array('width'=>'250px','height'=>'200')); ?>
						</div>
					</div>
			<?php } ?>
		</div>
        <br />
	  </div>
    </div>
		<?php $i++; } ?>
  </div>
</section>
