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
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/bootstrap.css?1422792965');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/materialadmin.css?1425466319');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/font-awesome.min.css?1422529194');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/material-design-iconic-font.min.css?1421434286');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/materialadmin_print.css?1419847669"  media="print');?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/garis.css');?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/materialadmin_print.css?1419847669');?>"  media="print"/>
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed menubar-pin menubar-first ">

		<!-- BEGIN HEADER-->
			<!-- BEGIN HEADER-->
			<?php $this->load->view('main_templates/header') ?>
		<?php error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);?>
		<!-- END HEADER-->

		<!-- BEGIN BASE-->
		<div id="base">

		<!-- Get Data -->

			<?php foreach($assesment as $asses) {
				$nim = $asses ->nim;
				$nama = $asses->nama;


			}
			?>

		<!-- End og getting data
			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-header">
						<ol class="breadcrumb">
							<li class="active">Formulir Assesment</li>
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

										<!-- BEGIN INVOICE HEADER -->
										<div class="row">
											<div class="col-xs-2">
												<h1 class="text-light"><img src="<?php echo base_url('assets/img/usu.png');?>" width = '100%' height='100%'/></h1>
											</div>
											<div class="col-xs-10 text-center">
												<h3 class="text-light text-default-light">KEMENTERIAN RISET,TEKNOLOGI DAN PENDIDIKAN TINGGI <br>
												<b>UNIVERSITAS SUMATERA UTARA </b><br>
												FAKULTAS ILMU KOMPUTER DAN TEKNOLOGI INFORMASI<br>
												PROGRAM STUDI S-1 TEKNOLOGI INFORMASI<br>
												<h5>JL.Alumni No.3 Kampus USU, Medan - 20155 <br>
												Telp.Fax.:061 8222129, E-mail: <u>tek.informasi@usu.ac.id</u>. Laman : http://it.usu.ac.id</h5></h3>

											</div>
										<hr id='garis' width ="100%">
										<hr id='line' width="100%">
										</div><!--end .row -->
										
										<!-- END INVOICE HEADER -->

										<br/>

										<div class="row">
											<div class="col-xs-12 text-center">
												<h4>FORMULIR ASSESMENT</h4>
											</div>
										</div>

										<!-- Assesment ke-->
										<div class="row">
											<div class="col-xs-4">
												<h4 class="text-light">Assesment Ke</h4>
												
											</div><!--end .col -->
											<div class="col-xs-8">
												<h4 class="edge text-light">:</h4>		
											</div><!--end .col -->	
										</div><!--end .row -->
										<!-- END  -->

										<!-- Nama -->
										<div class="row">
											<div class="col-sm-4">
												<h4 class="text-light">Nama</h4>
												
											</div><!--end .col -->
											<div class="col-sm-1">
												<h4 class="text-light">:</h4></div>
											<div class="col-sm-7">
												<h4 class="edge text-light"> <?= $nama ?> </h4>
											</div><!--end .col -->	
										</div><!--end .row -->
										<!-- END  -->

										<!-- Nim -->
										<div class="row">
											<div class="col-xs-4">
												<h4 class="text-light">NIM</h4>
												
											</div><!--end .col -->
											<div class="col-xs-1">
												<h4 class="text-light">:</h4></div>
											<div class="col-xs-7">
												<h4 class="text-light"> <?= $nim ?> </h4>
											</div><!--end .col -->	
										</div><!--end .row -->
										<!-- END  -->

										<!-- Judul -->
										<div class="row">
											<div class="col-xs-4">
												<h4 class="text-light">Judul</h4>
												
											</div><!--end .col -->
											<div class="col-xs-8">
												<h4 class="text-light">:</h4>		
											</div><!--end .col -->	
										</div><!--end .row -->
										<!-- END  -->

										<!-- Judul Rekomendasi-->
										<div class="row">
											<div class="col-xs-4">
												<h4 class="text-light">Judul Direkomendasikan oleh</h4>
												
											</div><!--end .col -->
											<div class="col-xs-8">
											
												<div class="checkbox checkbox-styled">
														:
														<label>
															<input type="checkbox" value="">
															<span>Mahasiswa</span>
														</label>
													</div>

												<div class="checkbox checkbox-styled">
														
														<label>
															&nbsp<input type="checkbox" value="">
															<span>Dosen Nama :</span>
														</label>
													</div>

												<div class="checkbox checkbox-styled">
														
														<label>
															&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
															<span>Tanda Tangan :</span>
														</label>
													</div>


										</div><!--end .row -->


									</div>

										<div class="row" style="clear:both;">
											<div class="col-xs-4">
												<h4 class="text-light">Area Tugas Akhir</h4>
												
											</div><!--end .col -->
											<div class="col-xs-8">

												<div class="checkbox checkbox-styled">
														:
														<label>
															<input type="checkbox" value="">
															<span>Multimedia</span>
														</label>
													</div>

												<div class="checkbox checkbox-styled">
														
														<label>
															&nbsp<input type="checkbox" value="">
															<span>Knowledge Management dan Data Science</span>
														</label>
													</div>

												<div class="checkbox checkbox-styled">
														
														<label>
															&nbsp<input type="checkbox" value="">
															<span>Computer System </span>
														</label>
													</div>

													
												
											</div><!--end .col -->	
										</div><!--end .row -->
										<!-- END  -->

										<div class="row">
											<div class="col-xs-4">
												<h4 class="text-light">Status Proposal</h4>
												
											</div><!--end .col -->
											<div class="col-xs-8">
												<div class="checkbox checkbox-styled">
														:
														<label>
															<div class="col-xs-6"><input type="checkbox" value="">
															<span>Diterima Perbaikan Besar</span></div>
															<div class="col-xs-6"><input type="checkbox" value="">
															<span>Diterima</span></div>
														

														</label>
												</div>

												<div class="checkbox checkbox-styled">
														
														<label>
															<div class="col-xs-6"><input type="checkbox" value="">
															<span>Perbaikan Kecil</span></div>
															<div class="col-xs-6"><input type="checkbox" value="">
															<span>Ditolak dan Ganti Judul</span></div>
														</label>
													</div>		
												
											</div><!--end .col -->	
										</div><!--end .row -->
										<!-- END  -->

										<div class="row">
											<div class="col-xs-4">
												<h4 class="text-light">Calon Dosen Pembimbing1</h4>
												
											</div><!--end .col -->
											<div class="col-xs-8">
												<h4 class="text-light">:</h4>		
												
											</div><!--end .col -->	
										</div><!--end .row -->
										<!-- END  -->

										<div class="row">
											<div class="col-xs-4">
												<h4 class="text-light">Calon Dosen Pembimbing2</h4>
												
											</div><!--end .col -->
											<div class="col-xs-8">
												<h4 class="text-light">:</h4>		
												
											</div><!--end .col -->	
										</div><!--end .row -->
										<!-- END  -->
										<br/>

										<!-- BEGIN INVOICE PRODUCTS -->
										<div class="row">
											<div class="col-xs-12">
												<table border='1' width="100%">
													<tbody>
														<tr height="100px">
															
															<td width="25%">Judul Tugas Akhir</td>
															<td width="75%"></td>
														</tr>

														<tr height="200px">
															
															<td width="25%">Rumusan Masalah</td>
															<td width="75%"></td>
														</tr>
														<tr height="250px">
															
															<td width="25%">Metodologi</td>
															<td width="75%"></td>
														</tr>
														<tr height="180px">
															
															<td width="25%">Landasan Teori</td>
															<td width="75%"></td>
														</tr>
														<tr height="100px">
															
															<td width="25%">Referensi</td>
															<td width="75%"></td>
														</tr>
														
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
		<script src="<?php echo base_url('assets/js/core/demo/Demo.js');?>"></script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
