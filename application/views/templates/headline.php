<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	
		<title>SISFO TA</title>
		<link rel="shortcut icon" href="<?php echo base_url('assets/img/usu.png') ; ?>" />

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<meta prefix="og: http://ogp.me/ns#" property="og:title" content="HideSeek jQuery plugin" />
  		<meta prefix="og: http://ogp.me/ns#" property="og:type" content="website" />
  		<meta prefix="og: http://ogp.me/ns#" property="og:image" content="http://vdw.github.io/HideSeek/images/hideseek_logo.png" />
  		<meta prefix="og: http://ogp.me/ns#" property="og:url" content="http://vdw.github.io/HideSeek/" />
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/bootstrap.css?1422792965');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/materialadmin.css?1425466319');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/font-awesome.min.css?1422529194');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/material-design-iconic-font.min.css?1421434286');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/jquery.datatables.min.css');?>" />
 		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/vendor/normalize.css');?>">
 		<link rel="stylesheet" href="<?php echo base_url().'assets/csss_engine1/style.css';?>">
		<link rel="stylesheet" href="<?php echo base_url().'assets/csss_engine1/ie.css';?>">
 		
 		 
 		 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/vendor/github.css');?>">
 		 <link href="<?php echo base_url().'assets/css/flexslider.css';?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url().'assets/css/prettyPhoto.css';?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url().'assets/css/animate.css';?>" rel="stylesheet" type="text/css" media="all" />
	
	<style type="text/css">
		.spacer {
			padding-top: 70px;
		}
	</style>
 		 	<script>


		
		//PrettyPhoto
		jQuery(document).ready(function() {
			$("a[rel^='prettyPhoto']").prettyPhoto();
		});
		
		//BlackAndWhite
		$(window).load(function(){
			$('.client_img').BlackAndWhite({
				hoverEffect : true, // default true
				// set the path to BnWWorker.js for a superfast implementation
				webworkerPath : true,
				// for the images with a fluid width and height 
				responsive:true,
				// to invert the hover effect
				invertHoverEffect: false,
				// this option works only on the modern browsers ( on IE lower than 9 it remains always 1)
				intensity:1,
				speed: { //this property could also be just speed: value for both fadeIn and fadeOut
					fadeIn: 300, // 200ms for fadeIn animations
					fadeOut: 300 // 800ms for fadeOut animations
				},
				onImageReady:function(img) {
					// this callback gets executed anytime an image is converted
				}
			});
		});
		
	</script>
		<script src="<?php echo base_url().'assets/js/jquery.prettyPhoto.js';?>" type="text/javascript"></script>
	<script src="<?php echo base_url().'assets/js/jquery.nicescroll.min.js';?>" type="text/javascript"></script>
	<script src="<?php echo base_url().'assets/js/superfish.min.js';?>" type="text/javascript"></script>
	<script src="<?php echo base_url().'assets/js/jquery.flexslider-min.js';?>" type="text/javascript"></script>
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed ">

	<!-- BEGIN HEADER -->
		<?php $this->load->view('main_templates/header') ?>
		<?php error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);?>
	<!-- END HEADER -->



			<!-- SLIDER -->
				<div class="csslider1 autoplay spacer">

		<input name="cs_anchor1" id="cs_slide1_0" type="radio" class="cs_anchor slide">
		<input name="cs_anchor1" id="cs_slide1_1" type="radio" class="cs_anchor slide">
		<input name="cs_anchor1" id="cs_slide1_2" type="radio" class="cs_anchor slide">
		<input name="cs_anchor1" id="cs_play1" type="radio" class="cs_anchor" checked="">
		<input name="cs_anchor1" id="cs_pause1_0" type="radio" class="cs_anchor pause">
		<input name="cs_anchor1" id="cs_pause1_1" type="radio" class="cs_anchor pause">
		<input name="cs_anchor1" id="cs_pause1_2" type="radio" class="cs_anchor pause">
		<ul>
			<?php $no=1; foreach($headline as $h) { if($no==1){?>
			<li class="cs_skeleton"><img src="<?php echo base_url().'cover_artikel/'.$h->gambar;?>" style="width: 100%;"></li>
			<?php } ?>
			<li class="<?php if($no==1) {echo "num0";} else if($no==2) {echo "num1";} else {echo "num2";}?> img slide"> <img src="<?php echo base_url().'cover_artikel/'.$h->gambar;?>"></li>
			<?php $no++;} ?>
		</ul>
		<div class="cs_description">
			<?php $no =1 ; foreach($headline as $t) { ?>
			<label class="<?php if($no==1) {echo "num0";} else if($no==2) {echo "num1";} else {echo "num2";}?>"><span class="cs_title"><span class="cs_wrapper"><?php echo anchor('tugas/detail_berita/'.$t->id,$t->judul); ?></span></span></label>
			<?php $no++;} ?>
		</div>
		
		<div class="cs_arrowprev">
			<label class="num0" for="cs_slide1_0"><span><i></i><b></b></span></label>
			<label class="num1" for="cs_slide1_1"><span><i></i><b></b></span></label>
			<label class="num2" for="cs_slide1_2"><span><i></i><b></b></span></label>
		</div>
		<div class="cs_arrownext">
			<label class="num0" for="cs_slide1_0"><span><i></i><b></b></span></label>
			<label class="num1" for="cs_slide1_1"><span><i></i><b></b></span></label>
			<label class="num2" for="cs_slide1_2"><span><i></i><b></b></span></label>
		</div>
		<div class="cs_bullets">
			<?php $no=1; foreach($headline as $j) { ?>
			<label class="<?php if($no==1) {echo "num0";} else if($no==2) {echo "num1";} else {echo "num2";}?>" for="cs_slide"> <span class="cs_point"></span>
				<span class="cs_thumb"><img src="<?php echo base_url().'cover_artikel/'.$j->gambar;?>" alt='mecca' width='100' height='75'></span></label>
			<?php $no++;} ?>
		</div>
		</div>


			<!-- END SLIDER -->
	
		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->


			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-header">
						<ol class="breadcrumb">
							<li class="active">Berita Lainnya</li>
						</ol>
					</div>
					<div class="section-body">
						<div class="row">
							<div class="col-lg-12">


								<!-- BEGIN BLOG MASONRY -->
								<div class="card card-type-blog-masonry style-default-bright">
									<div class="row">

										<?php $nomor = 1;foreach($data as $d) {  ?>

										<?php if($nomor % 2 != 0) { ?>

										<div class="col-md-3">
											<article>
												<div class="blog-image">
													<img src="<?php echo base_url('cover_artikel/'.$d->gambar); ?>" alt="" />
												</div>
												<div class="card-body blog-text">
													<div class="opacity-50">Posted on <?= $d->tanggal_posting ?> by <a href="#"><?= $d->author ?></a></div>
													<h3><a class="link-default" href="<?php echo base_url('tugas/detail_berita/'.$d->id); ?>"><?= $d->judul ?></a></h3>
													<?php $kata = explode(".",$d->konten);?>
													<?php echo $kata[0]."."; ?>
													<?php echo $kata[1]."."; ?>
									
												</div>
											</article><!-- end /article -->

										<?php } else if($nomor % 8 == 0) { ?>

										<article>
												<div class="blog-image">
													<img class="img-responsive" src="<?php echo base_url('cover_artikel/'.$d->gambar); ?>" alt="" />
												</div>
												<div class="card-body blog-text style-primary-dark">
													<div class="opacity-50">Posted on <?= $d->tanggal_posting ?> by <a href="#"><?= $d->author ?></a></div>
													<h3><a class="link-default" href="<?php echo base_url('tugas/detail_berita/'.$d->id); ?>"><?= $d->judul ?></a></h3>
												<?php $kata = explode(".",$d->konten);?>
													<?php echo $kata[0]."."; ?>
													<?php echo $kata[1]."."; ?>
											
												</div>
											</article><!-- end /article -->
										</div><!--end .col -->
										<?php } else { ?>
											<article>
												<div class="blog-image">
													<img src="<?php echo base_url('cover_artikel/'.$d->gambar); ?>" alt="" />
												</div>
												<div class="card-body blog-text">
													<div class="opacity-50">Posted on <?= $d->tanggal_posting ?> by <a href="#"><?= $d->author ?></a></div>
													<h3><a class="link-default" href="<?php echo base_url('tugas/detail_berita/'.$d->id); ?>"><?= $d->judul ?></a></h3>
													<?php $kata = explode(".",$d->konten);?>
													<?php echo $kata[0]."."; ?>
													<?php echo $kata[1]."."; ?>
									
										
												</div>
											</article><!-- end /article -->
										</div><!--end .col -->


										<?php } $nomor++;} ?>
										
									</div><!--end .row -->
								</div><!--end .card -->

								<!-- END BLOG MASONRY -->

							</div><!--end .col -->
						</div><!--end .row -->

						<!-- BEGIN PAGINATION -->
								<div class="row">
									
									<div class="col-sm-12"><center>Jumlah Berita : <?= $jumlah ?> Berita</center> </div>
								</div>

								<div class="row">
									<!--<div class="col-xs-1"><?= $pagination ?></div>-->
									<div class="col-sm-12"><center><ul class="pagination"><?= $pagination ?></center></ul></div>
								</div>
						<!-- END PAGINATION -->

					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->

			

		</div><!--end #base-->
		<!-- END BASE -->

		<!-- BEGIN JAVASCRIPT -->
		<script src="<?php echo base_url('assets/js/libs/jquery/jquery-1.11.2.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/libs/jquery/jquery-migrate-1.2.1.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/libs/bootstrap/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/libs/spin.js/spin.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/autosize/jquery.autosize.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/DataTables/jquery.dataTables.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/nanoscroller/jquery.nanoscroller.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/App.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppNavigation.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppOffcanvas.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppCard.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppForm.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppNavSearch.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppVendor.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/demo/Demo.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/demo/DemoTableDynamic.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/DataTables/search.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/vendor/jquery.hideseek.min.js');?>"></script>
 		<script type="text/javascript" src="<?php echo base_url('assets/js/vendor/rainbow-custom.min.js');?>"></script>
 		<script type="text/javascript" src="<?php echo base_url('assets/js/vendor/jquery.anchor.js');?>"></script>
 		<script src="<?php echo base_url('assets/js/initializers.js');?>"></script>
		<!-- END JAVASCRIPT -->
	</body>
</html>
