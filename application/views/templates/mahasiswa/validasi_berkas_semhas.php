<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Portal TA Mahasiswa</title>
		<link rel="shortcut icon" href="<?php echo base_url('assets/img/usu.png') ; ?>" />

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/bootstrap.css?1422792965');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/materialadmin.css?1425466319');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/font-awesome.min.css?1422529194');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/material-design-iconic-font.min.css?1421434286');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/materialadmin_print.css?1419847669');?>"  media="print"/>
		<style>
		.list-test{
			list-style : none;
				padding : 0px;
			margin : 0px;
		}

		ul li{
			list-style : none;
			padding : 0px;
			margin : 0px;
			height : 25px;
		}

		.list-tes{
			list-style : none;
				padding : 0px;
			margin : 0px;
			display : inline-block;
		}

		ul li .lti{
			list-style : none;
			padding : 0px;
			margin : 0px;
			display : inline-block;
		}

		.box
		{
			border : 1px solid black;
			height : 30px ;
		}

		.box-light
		{
			margin-top : 5px;
			border : 3px solid black;
			height : 80px;
		}

		.boxes
		{
			
			height : 60px ;
			margin : 25px;

		}

		.box-light
		{
			margin-top : 5px;
			border : 3px solid black;
			height : 50px;
		}
		</style>
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="../../../assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed ">


		<!-- BEGIN HEADER-->
		<?php $this->load->view('templates/mahasiswa/templates/header.php');?>
		<!-- END HEADER-->


	<?php
		$nim = $_SESSION['username'];
		foreach($nama as $n)
		{
			$nama = $n->nama;
			$prodi = $n->nama_PS;
		}
	
	?>

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
							<li class="active">Form Validasi Berkas Mahasiswa Sebagai Persyaratan Seminar Hasil</li>
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
									<div class="card-body style-default-bright">

										

										<div class="row">
											<div class="col-xs-12 text-center">
												<h4>FORM VALIDASI BERKAS MAHASISWA<br> SEBAGAI PERSYARATAN SEMINAR HASIL</h4>
											</div>
										</div>

										<!-- BEGIN DESCRIPTION -->
										<div class="row">
											<div class="col-xs-4">
												<h4 class="text-light">Nama</h4>
												<h4 class="text-light">NIM</h4>
												<h4 class="text-light">Program Studi</h4>
											</div><!--end .col -->
											<div class="col-xs-5">
												<h4 class="text-light">: <?= $nama ?> </h4>
												<h4 class="text-light">: <?= $nim ?></h4>
												<h4 class="text-light">: <?= $prodi ?></h4>
											</div>
											<div class="col-xs-3">
											
											</div><!--end .col -->
										</div><!--end .row -->
										<!-- END  -->

										<br>
										<div class="row">
											<div class="col-xs-12">
												<table border='1' width="100%">
													<thead>
														<th width="5%"><center>No</center></th>
														<th width="75%"><center>BERKAS</center></th>
														<th width="20%"><center>PETUGAS</center></th>
													</thead>
													<tbody>
														<tr height="50px">
															<td><center>1</center></td>
															<td style="padding-left:5px; padding-right:5px;">Fotokopi KRS/KHS mahasiswa (awal-akhir/berjalan)</td>
															<td></td>
														</tr>

														<tr height="50px">
															<td><center>2</center></td>
															<td style="padding-left:5px; padding-right:5px;">Fotokopi SK dosen pembimbing skripsi</td>
															<td></td>
														</tr>

														<tr height="50px">
															<td><center>3</center></td>
															<td style="padding-left:5px; padding-right:5px;">Fotokopi tanda lunas SPP awal-SPP akhir (semester berjalan)</td>
															<td></td>
														</tr>

														<tr height="50px">
															<td><center>4</center></td>
															<td style="padding-left:5px; padding-right:5px;">Lembar kendali Pra-Seminar Hasil (Form 1-B)</td>
															<td></td>
														</tr>

													</tbody>
												</table>

											</div><!--end .col -->
										</div>
										

										
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
						</div><!--end .row -->
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->		

		</div><!--end #base-->
		<!-- END BASE -->

		<!-- BEGIN JAVASCRIPT -->
		<script src="<?php echo base_url('assets/js/libs/jquery/jquery-1.11.2.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/jquery/jquery-migrate-1.2.1.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/bootstrap/bootstrap.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/spin.js/spin.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/autosize/jquery.autosize.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/nanoscroller/jquery.nanoscroller.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/App.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppNavigation.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppOffcanvas.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppCard.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppForm.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppNavSearch.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppVendor.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/demo/Demo.js'); ?>"></script>
		<!-- END JAVASCRIPT -->

	</body>
</html>


