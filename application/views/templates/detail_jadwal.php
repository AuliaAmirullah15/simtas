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
 		 <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/material-design-iconic-font.min.css?1421434286');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/materialadmin_print.css?1419847669');?>"  media="print"/>
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

		<?php

		foreach($gaji3 as $j) {
			$gaji_pembimbing1 = $j->pembimbing1;
		}

		foreach($gaji4 as $k)
		{
			$gaji_pembimbing2 = $k->pembimbing2;
		}

		foreach($gaji1 as $l) {
			$gaji_pembanding1 = $l->pembanding1;
		}

		foreach($gaji2 as $m)
		{
			$gaji_pembanding2 = $m->pembanding2;
		}


		?>
			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">

			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
				<div id="content">
				<section>
					<div class="section-header">
						<ol class="breadcrumb">
							<li class="active">Detail Pendanaan Seminar</li>
						</ol>
					</div>
					<div class="section-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="card card-printable style-default-light">
									<div class="card-head">
										<div class="tools">
											<div class="btn-group">
												<a class="btn btn-floating-action btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="md md-print"></i></a>
											</div>
										</div>
									</div><!--end .card-head -->
									<h2 class="text-light"><b><center>Detail Pendanaan</center></b></h2>
									<div class="card-body style-default-bright">
									<h4> List Mahasiswa </h4>
										<!-- BEGIN INVOICE HEADER -->
										<div class="row">
										<?php $i = 1 ; ?>
											<?php foreach($data as $data) { 
													if(((($i+1)%5) == 1 OR $i == 1) AND $i != (($i%5) == 0)) {

											?>
											<div class="col-xs-4">
												<?php echo $data->nama ; ?> <br>
											

											<?php } else if(($i%5) == 0){ echo $data->nama ; ?>

												</div>
											<?php  } 

												else{ echo $data->nama ; ?><br>
												<?php } $i++;
											} ?>

										</div><!--end .row -->
										
										<!-- END INVOICE HEADER -->

										<br/>

										<div class="row">
											<div class="col-xs-12 text-center">
												<h4>Gaji</h4>
											</div>
										</div>

										

										<!-- BEGIN INVOICE PRODUCTS -->
										<div class="row">
											<div class="col-xs-12">
												<table border='1' width="100%">
													<thead>
														<th>No</th>
														<th>Nama Dosen</th>
														<th>Pembimbing 1</th>
														<th>Pembimbing 2</th>
														<th>Pembanding 1</th>
														<th>Pembanding 2</th>
													</thead>
													<tbody>
														<?php $no = 1; foreach($pembimbing1 as $pembimbing1) { ?>
														<tr>
														<td><?= $no++ ?></td>
														<td><?= $pembimbing1->Nama_dosen ?></td>
														<td><?= $pembimbing1->banyak_membimbing1 ?></td>
														<td><?php foreach($pembimbing2 as $pemb2) { 
															if($pemb2->pembimbing2 == $pembimbing1->pembimbing1) {echo $pemb2->banyak_membimbing2;} }
															?></td>
														<td><?php foreach($pembanding1 as $pemband1 ) { 
															if($pemband1->pembanding1 == $pembimbing1->pembimbing1) {echo $pemband1->banyak_membanding1;} }
															?></td>

														<td><?php foreach($pembanding2 as $pemband2 ) { 
															if($pemband2->pembanding2 == $pembimbing1->pembimbing1) {echo $pemband2->banyak_membanding2;} }
															?></td></tr>
														<?php } foreach($pembimbing2 as $pembi2) { ?>
														<tr>
														<td><?= $no++ ?></td>
														<td><?= $pembi2->Nama_dosen ?></td>
														<td></td>
														<td><?= $pembi2->banyak_membimbing2 ?></td>
														<td><?php foreach($pembanding1 as $pembandi1 ) { 
															if($pembandi1->pembanding1 == $pembi2->pembimbing2) {echo $pembandi1->banyak_membanding1;} }
															?></td>

														<td><?php foreach($pembanding2 as $pembandi2 ) { 
															if($pembandi2->pembanding2 == $pembi2->pembimbing2) {echo $pembandi2->banyak_membanding2;} }
															?></td></tr>
														<?php } foreach($pembanding1 as $pembandin1) { ?>
														<tr>
														<td><?= $no++ ?></td>
														<td><?= $pembandin1->Nama_dosen ?></td>
														<td></td>
														<td></td>
														<td><?= $pembandin1->banyak_membanding1 ?></td>

														<td><?php foreach($pembanding2 as $pembandin2 ) { 
															if($pembandin2->pembanding2 == $pembandin1->pembanding1) {echo $pembandin2->banyak_membanding2;} }
															?></td></tr>
														<?php } ?>
													</tbody>
												</table>
											</div><!--end .col -->
										</div><!--end .row -->
										<!-- END INVOICE PRODUCTS -->
										<div class="col-xs-12 text-right">
											<h6>Koordinator Tugas Akhir</h6>
										</div>
										<div  class="col-xs-12">
										<table height="100px">
										</table>
										</div>
										<div class="col-xs-12 text-right">
											<h6>Romi Fadillah Rahmat, B.Comp.Sc.,M.Sc.</h6>
										</div>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
						</div><!--end .row -->
					</div><!--end .section-body -->
				</section>
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

		<?php if(!empty($set)){ ?>
			<script type="text/javascript">
				$(document).ready(function() {
					$(".pagination a").click(function() {
						var link = $(this).get(0).href;
					    var form = $('.form');
					    form.attr('action', link);
					    form.submit();
					    return false;
					});

				});
			</script>
		<?php } ?>
	</body>
</html>
