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
		
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="../../../assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed ">

		<!-- BEGIN HEADER-->
		<?php $this->load->view('templates/mahasiswa/templates/header') ?>
		<?php error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);?>
		<!-- END HEADER-->

		<!-- BEGIN BASE-->
		<div id="base">

		<?php
			foreach($data as $d)
			{
				$nama = $d->nama;
				$nim = $d->nim;
				$pembimbing1 = $d->pembimbing1;
				$pembimbing2 = $d->pembimbing2;
				$nip1 = $d->NIP1;
				$nip2 = $d->NIP2;
				$ilmu1 = $d->ilmu1;
				$ilmu2 = $d->ilmu2;
				$judul = $d->judul;
				$prodi = $d->nama_PS;
			}
            
            foreach($izin_seminar as $i)
            {
                $id = $i->id;
                $nim = $i->nim;
                $id_pengajuan = $i->id_pengajuan;
                $pembimbing1 = $i->pembimbing1;
                $pembimbing2 = $i->pembimbing2;
                $jenis_seminar = $i->jenis_seminar;
                $rencana_tgl_seminar = $i->rencana_tgl_seminar;
            }
            
            foreach($ttd_pembimbing as $tp)
            {
                $ttd1 = $tp->ttd1;
                $ttd2 = $tp->ttd2;
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
							<li class="active">Form Persetujuan Seminar Hasil</li>
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
												<h5>Jalan Universitas No.9A Kampus USU, Medan 20155 <br>
												Tel/Fax.:061 8228048, e-mail: fasilkomti@usu.ac.id, laman : http://fasilkom-ti.usu.ac.id</h5></h3>

											</div>
								
										<hr id='line' width="100%">
										</div><!--end .row -->
										<!-- END INVOICE HEADER -->

										<div class="row">
											<div class="col-xs-12 text-center">
												<h4>FORM PERSETUJUAN SEMINAR HASIL</h4>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-3">
												<h4 class="text-light">Nama</h4> 
												<h4 class="text-light">NIM</h4> 
												<h4 class="text-light">Program Studi</h4> 
												<h4 class="text-light">Judul Skripsi</h4> 
											</div>
											<div class="col-xs-9">
												<h4 class="text-light">: <?= $nama ?></h4> 
												<h4 class="text-light">: <?= $nim ?></h4> 
												<h4 class="text-light">: <?= $prodi ?></h4> 
												<h4 class="text-light">: <?= $judul ?></h4> 
											</div>
										</div>

										<div class="row">
											<div class="col-xs-3">
												<h4 class="text-light">Hari/Tanggal</h4> 
												<h4 class="text-light">Pukul</h4> 
												
											</div>
											<div class="col-xs-9">
												<h4 class="text-light">: ....................................................................</h4> 
												<h4 class="text-light">: ....................................................................</h4> 
											</div>
										</div>
										
										<div class="row">
											<div class="col-xs-12">
												<h4 class="text-light">Telah memenuhi persyaratan dan disetujui untuk <b>Seminar Hasil</b>.</h4>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-12">
												<h4>Pembimbing 1</h4>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-3">
												<h4 class="text-light">Nama</h4> 
												<h4 class="text-light">NIP</h4> 
											</div>
											<div class="col-xs-5">
												<h4 class="text-light">: <?= $pembimbing1 ?></h4> 
												<h4 class="text-light">: <?php if(empty($nip1)) {echo "......................................................................";} else{ echo $nip1;} ?></h4> 
											</div>
											<div class="col-xs-4">
											<h4>1. <?php if($pembimbing1 != '0000-00-00') { if($ttd1 != '') { ?>   <img src="<?php echo base_url('ttd_dosen/'. $ttd1); ?>" width="60px" height="60px">  <?php } } ?></h4>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-12">
												<h4>Pembimbing 2</h4>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-3">
												<h4 class="text-light">Nama</h4> 
												<h4 class="text-light">NIP</h4> 
											</div>
											<div class="col-xs-5">
												<h4 class="text-light">: <?= $pembimbing2 ?></h4> 
												<h4 class="text-light">: <?php if(empty($nip2)) {echo "......................................................................";} else{ echo $nip2;} ?></h4> 
											</div>
											<div class="col-xs-4">
											<h4>2. <?php if($pembimbing2 != '0000-00-00') { if($ttd2 != '') { ?>   <img src="<?php echo base_url('ttd_dosen/'. $ttd2); ?>" width="60px" height="60px">  <?php } } ?></h4>
											</div>
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


