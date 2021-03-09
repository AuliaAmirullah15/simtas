<!DOCTYPE html>
<html lang="en">
	<head>
	<?php 
		if(!isset($_SESSION['username']))
		{
			redirect('tamu');
		}
	?>
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
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed ">

			<!-- BEGIN HEADER-->
		<?php $this->load->view('main_templates/header') ?>
		<?php error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);?>
		<!-- END HEADER-->

		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					
					<div class="section-body contain-lg">

						<!-- BEGIN VERTICAL FORM -->
						<?php
							foreach($disertasi as $dis)
							{
								$id=$dis->id_disertasi;
								$nim=$dis->nim;
								$nama=$dis->nama;
								$prodi=$dis->kode_PS;
								$judul=$dis->judul_skripsi;
								$pembimbing1=$dis->kode_pembimbing1;
								$pembimbing2=$dis->kode_pembimbing2;
								$tgl=$dis->Tgl_lulus;


								
							}
						?>
						<div class="row">
							
							
							<div class="col-lg-12 col-md-8">
								<form class="form" method="post" action="<?php echo base_url().'tugas/update_dis';?>" /> 
									<div class="card">
										<div class="card-head style-primary">
											<header>Edit Data Disertasi</header>
										</div>
										<div class="card-body">

											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<input type="text" class="form-control" id="Firstname1" name="id_disertasi" value="<?php
														echo $id;?>" disabled>
														<input type="hidden" name="id_disertasi" value="<?php echo $id;?>" >
														<label for="Nomor Disertasi">Nomor Disertasi</label>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<input type="text" class="form-control" id="Lastname1" name="nim" value="<?php
														echo $nim;?>">
														<label for="Lastname1">NIM</label>
													</div>
												</div>
											</div>

											<div class="form-group">
												<input type="text" class="form-control" id="Username1" name="nama" value="<?php
														echo $nama;?>">
												<label for="Username1">Nama</label>
											</div>
											<div class="form-group">
												
												<select class="form-control" name="kode_PS">
													<?php
														foreach($prodi2 as $pro)
														{
															if($pro->id_PS == $prodi)
															echo "<option value='$pro->id_PS' selected='selected'>$pro->nama_PS</option>";
															else 
																echo "<option value='$pro->id_PS'>$pro->nama_PS</option>";
														}


													?>


												</select>
												<label for="Program Studi">Program Studi</label>
											</div>
											<div class="form-group">
												<input type="text" class="form-control" id="Password1" name="judul_skripsi" value="<?php
														echo $judul;?>">
												<label for="Judul Skripsi">Judul Skripsi</label>
											</div>
											<div class="form-group">
												
												<select class="form-control" name="kode_pembimbing1">
													<?php
														foreach($dosen as $dsn)
														{
															if($dsn->Kode_dosen == $pembimbing1)
															echo "<option value='$dsn->Kode_dosen' selected='selected'>$dsn->Nama_dosen</option>";
															else
															echo "<option value='$dsn->Kode_dosen'>$dsn->Nama_dosen</option>";
														}


													?>


												</select>
												<label for="Pembimbing 1">Pembimbing 1</label>
											</div>
											<div class="form-group">
												<select class="form-control" name="kode_pembimbing2">
													<?php
														foreach($dosen as $dsn)
														{
															if($dsn->Kode_dosen == $pembimbing2)
															echo "<option value='$dsn->Kode_dosen' selected='selected'>$dsn->Nama_dosen</option>";
															else
															echo "<option value='$dsn->Kode_dosen'>$dsn->Nama_dosen</option>";
														}


													?>


												</select>
												<label for="Pembimbing 2">Pembimbing 2</label>
											</div>
																						<div class="form-group">
												<input type="date" class="form-control" id="Password1"
												name="Tgl_lulus" value="<?php
														echo $tgl;?>">
												<label for="Tanggal Lulus">Tanggal Lulus</label>
											</div>
											
										</div><!--end .card-body -->
										<div class="card-actionbar">
											<div class="card-actionbar-row">
												<button type="submit" class="btn btn-flat btn-primary ink-reaction">Edit</button>
											</div>
										</div>
									</div><!--end .card -->
									<em class="text-caption">Vertical layout with static </em>
								</form>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END VERTICAL FORM -->

						

					</div>
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
		<script src="<?php echo base_url('assets/js/libs/moment/moment.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/nanoscroller/jquery.nanoscroller.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/App.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppNavigation.js');?>"></script>
		<script src="<?php echo base_url('ssets/js/core/source/AppOffcanvas.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppCard.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppForm.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppNavSearch.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppVendor.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/demo/Demo.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/demo/DemoFormLayouts.js');?>"></script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
