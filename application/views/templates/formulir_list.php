<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<?php 
		if(!isset($_SESSION['username']))
		{
			redirect('tugas/login');
		}
	?>
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
 		
 		 
 		 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/vendor/github.css');?>">
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
	
		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
			<div id="content">
					<div class="section-body">
						<div class="row">
						<?php echo anchor('tugas/get_assesment/'.$id,'<div class="col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body text-center ink-reaction btn-raised btn-primary">
										<p>FORMULIR ASSESMENT</p>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->',array('class'=>'get_assement',
						'onclick'=>"return confirmDialog();")

													); ?>
							
							<div class="col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body text-center ink-reaction btn-raised btn-primary">
										<p>Hasil Validasi Berkas Mahasiswa Seminar Proposal</p>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							
							<div class="col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body text-center ink-reaction btn-raised btn-primary">
										<p>Hasil Validasi Berkas Mahasiswa Seminar Hasil</p>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
					
							<div class="col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body text-center ink-reaction btn-raised btn-primary">
										<p>Hasil Validasi Berkas Mahasiswa Sidang</p>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							
						</div><!--end .row -->


						<div class="row">
							<div class="col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body text-center ink-reaction btn-raised btn-primary">
										<p>Hasil Validasi Berkas Mahasiswa Setelah Sidang</p>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							
							<div class="col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body text-center ink-reaction btn-raised btn-primary">
										<p>Hasil Validasi Berkas Mahasiswa Berita Acara Seminar Proposal</p>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							
							<div class="col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body text-center ink-reaction btn-raised btn-primary">
										<p>Form Penilaian Seminar Proposal</p>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->

							<div class="col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body text-center ink-reaction btn-raised btn-primary">
										<p>Berita Acara Seminar Hasil</p>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							
						</div><!--end .row -->
						
					</div><!--end .section-body -->

			</div><!--end #content-->
			<!-- END CONTENT -->

			<!-- BEGIN MENUBAR-->
				<?php $this->load->view('main_templates/menu_bar') ?>
			<!-- END MENUBAR -->

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
