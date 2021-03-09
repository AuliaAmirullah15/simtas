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
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/materialadmin_print.css?1419847669');?>"  media="print"/>
		<style>
		.box {
			border: 3px solid black;
			width: 200px;
		}

		.teks{
			text-align : justify;
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
		<?php $this->load->view('main_templates/header') ?>
		<?php error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);?>
		<!-- END HEADER-->

		<!-- BEGIN BASE-->
		<div id="base">

		<?php
			foreach($data as $d)
			{
				$nama = $d->nama;
				$nim = $d->nim;
				$judul = $d->judul;
				$prodi = $d->nama_PS;
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
							<li class="active">Kata Pengantar Sidang</li>
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
												<h4>KATA PEMBUKAAN<br> UJIAN SARJANA LENGKAP </h4>
											</div>
										</div>

										<div class="row">
										<h4 class="text-light teks">Kami, atas nama Pemerintah Republik Indonesia, cq. Kementerian Riset, Teknologi dan Pendidikan Tinggi, pada hari ini memanggil Saudara/i mahasiswa Program Studi <?php if(!empty($prodi)) {echo $prodi;} else { echo "............................................";}?>, Fasilkom-TI USU: </h4>

										</div>
										<div class="row">
											<div class="col-xs-4">
												<h4 class="text-light">Nama</h4>
												<h4 class="text-light">NIM</h4>
												<h4 class="text-light">Judul</h4>
											</div>
											<div class="col-xs-8">
												<h4 class="text-light">: <?= $nama ?></h4>
												<h4 class="text-light">: <?= $nim ?></h4>
												<h4 class="text-light">: <?= $judul ?></h4>
											</div>
										</div>

										<div class="row">
											<h4 class="text-light teks">Untuk diuji oleh Panitia, guna mendapatkan Ijazah Sarjana ...............................................  dari Fasilkom-TI USU dan mengharapkan agar saudara memberikan jawaban-jawaban dari pertanyaan-pertanyaan yang diajukan kepada saudara secara tepat dan tidak berbelit-belit.</h4>
										</div>

											<div class="row">
											<h4 class="text-light teks">Dengan ini kami membuka ujian ini dengan resmi, -> (ketuk palu)… selanjutnya pelaksanaan ujian kami serahkan kepada Ketua Panitia Ujian.</h4>
										</div>
										<br>


											<div class="row">
											<h4 class="text-light teks">Sekian dan terima kasih</h4>
										</div>
										<br>


										<div class="row">
											<div class="col-xs-3">
												<h4 class="text-light">Keputusan Rektor</h4>
												<h4 class="text-light">1. Memuaskan</h4>
												<h4 class="text-light">2. Sangat Memuaskan</h4>
												<h4 class="text-light">3. Cumlaude</h4>

											</div>

											<div class="col-xs-9">
												<h4 class="text-light">No. 116/PT05/SK/Q.85</h4>
												<h4 class="text-light">IPK 2,00 s/d 2,75</h4>
												<h4 class="text-light">IPK 2,76 s/d 3,50</h4>
												<h4 class="text-light">IPK 3,51 – 4,00 (dengan lama studi terjadwal</h4>
												<h4 class="text-light">  ditambah 1 tahun [ n + 1 ] dan tidak ada nilai D)</h4>
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
		<script src="<?php echo base_url('assets/js/core/demo/Demo.js'); ?>"></script>
		<!-- END JAVASCRIPT -->
	</body>
</html>


