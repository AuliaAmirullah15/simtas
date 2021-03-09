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
				$judul = $d->judul_skripsi;
				$prodi = $d->nama_PS;

			}
            
            foreach($pembimbing as $p)
            {
                $pembimbing1 = $p->pembimbing1;
                $pembimbing2 = $p->pembimbing2;
                $ttd1 = $p->ttd1;
                $ttd2 = $p->ttd2;
                $nip1 = $p->nip1;
                $nip2 = $p->nip2;
                $dosen1 = $p->dosen1;
                $dosen2 = $p->dosen2;
            }
            
            foreach($pembanding as $p)
            {
                $pembanding1 = $p->pembanding1;
                $pembanding2 = $p->pembanding2;
                $ttd3 = $p->ttd3;
                $ttd4 = $p->ttd4;
                $nip3 = $p->nip3;
                $nip4 = $p->nip4;
                $dosen3 = $p->dosen3;
                $dosen4 = $p->dosen4;
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
							<li class="active">Form Persetujuan Penggandaan Skripsi </li>
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
												<h4>FORM PERSETUJUAN PENGGANDAAN SKRIPSI</h4>
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
											<h4 class="text-light">Telah menyelesaikan perbaikan skripsi dan disetujui untuk melakukan penggandaan.</h4>
										</div>

										<div class="row">
										<h4 class="text-light"><b>Penguji I</b></h4>
										<div class="col-xs-3"><h4 class="text-light">Nama</h4>
										<h4 class="text-light">NIP</h4>
										</div>

										<div class="col-xs-5">
											<h4 class="text-light">: <?= $dosen1 ?></h4> 
												<h4 class="text-light">: <?php if(empty($nip1)) {echo "......................................................................";} else{ echo $nip1;} ?></h4> 
										</div>

										<div class="col-xs-4">
											<h4 class="text-light">1.</h4>
										</div>
										</div>

										<div class="row">
										<h4 class="text-light"><b>Penguji II</b></h4>
										<div class="col-xs-3"><h4 class="text-light">Nama</h4>
										<h4 class="text-light">NIP</h4>
										</div>

										<div class="col-xs-5">
											   <h4 class="text-light">: <?= $dosen2 ?></h4> 
												<h4 class="text-light">: <?php if(empty($nip2)) {echo "......................................................................";} else{ echo $nip2;} ?></h4> 
										</div>

										<div class="col-xs-4">
											<h4 class="text-light">2.</h4>
										</div>
										</div>

										<div class="row">
										<h4 class="text-light"><b>Penguji III</b></h4>
										<div class="col-xs-3"><h4 class="text-light">Nama</h4>
										<h4 class="text-light">NIP</h4>
										</div>

										<div class="col-xs-5">
											   <h4 class="text-light">: <?= $dosen1 ?></h4> 
												<h4 class="text-light">: <?php if(empty($nip3)) {echo "......................................................................";} else{ echo $nip3;} ?></h4> 
										</div>

										<div class="col-xs-4">
											<h4 class="text-light">3.</h4>
										</div>
										</div>

										<div class="row">
										<h4 class="text-light"><b>Penguji IV</b></h4>
										<div class="col-xs-3"><h4 class="text-light">Nama</h4>
										<h4 class="text-light">NIP</h4>
										</div>

										<div class="col-xs-5">
											   <h4 class="text-light">: <?= $dosen2 ?></h4> 
												<h4 class="text-light">: <?php if(empty($nip4)) {echo "......................................................................";} else{ echo $nip4;} ?></h4> 
										</div>

										<div class="col-xs-4">
											<h4 class="text-light">4.</h4>
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


