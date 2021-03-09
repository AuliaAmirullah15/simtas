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
		.teks{
			text-align : justify;
		}
		.paddinggo {
			padding : 0px;
			margin : 0px;
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
				$pembimbing1 = $d->pembimbing1;
				$pembimbing2 = $d->pembimbing2;
				$nip1 = $d->NIP1;
				$nip2 = $d->NIP2;
				$ilmu1 = $d->ilmu1;
				$ilmu2 = $d->ilmu2;
				$judul = $d->judul;
                $ttd1 = $d->ttd1;
                $ttd2 = $d->ttd2;
			}

			foreach($pembanding as $p)
			{
				$pembanding1 = $p->pemband1;
				$pembanding2 = $p->pemband2;
				$nip3 = $p->NIP3;
				$nip4 = $p->NIP4;

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
							<li class="active">Berita Acara Sidang</li>
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

									
											<div class="col-xs-12 text-center">
												<h4>BERITA ACARA SIDANG MEJA HIJAU</h4>
											</div>

								
											<h5 class="text-light teks">Pada hari ini:...................... Tanggal: ......... Bulan: .................. Tahun Dua Ribu ............................ bertempat di ruang rapat/Seminar Program Studi S-1 Teknologi Informasi Fasilkom-TI USU telah dilangsungkan Ujian Sarjana/ Skripsi mahasiswa:</h5>
								

										<div class="row">
											<div class="col-xs-4">
												<h5 class="text-light">Nama</h5>
												<h5 class="text-light">NIM</h5>
												<h5 class="text-light">Judul Skripsi</h5>
											</div>

											<div class="col-xs-8">
												<h5 class="text-light">: <?= $nama ?></h5>
												<h5 class="text-light">: <?= $nim ?></h5>
												<h5 class="text-light">: <?= $judul ?></h5>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-4">
												<h5 class="text-light">Pembimbing</h5>
												<h5 class="text-light">Co. Pembimbing</h5>
											</div>
											<div class="col-xs-8">
												<h5 class="text-light">: <?= $pembimbing1 ?></h5>
												<h5 class="text-light">: <?= $pembimbing2 ?></h5>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-12"><h5 class="text-light">Yang diuji oleh Panitia Pelaksana Ujian Sarjana Komputer :</h5></div>
										</div>

										<div class="row">
											<div class="col-xs-4">
												<h5 class="text-light">Ketua</h5>
												<h5 class="text-light">Sekretaris</h5>
												<h5 class="text-light">Anggota 1</h5>
												<h5 class="text-light">Anggota 2</h5>
											</div>
											<div class="col-xs-8">
												<h5 class="text-light">: ....................................................................</h5>
												<h5 class="text-light">: ....................................................................</h5>
												<h5 class="text-light">: ....................................................................</h5>
												<h5 class="text-light">: ....................................................................</h5>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-12">
												<h5 class="text-light">Dinyatakan : <b>LULUS/TIDAK LULUS</b></h5>
												<h5 class="text-light">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <b>Dengan Kriteria : [ ] Memuaskan<br>
													&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp[ ] Sangat Memuaskan<br>
													&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp[ ] Cumlaude
												</b>
												</h5>
												<h5 class="text-light">Catatan</h5><b>
												<h5 class="text-light">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp1. Nilai Ujian Sarjana : </h5>
												<h5 class="text-light">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp2. IPK &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </h5></b>
												<h5 class="text-light">demikian berita acara ujian ini diperbuat dengan sebenarnya</h5>
												<center><h5 class="text-light"><b>PANITIA PELAKSANA UJIAN</b></h5></center>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-6 text-center">
												<h5 class="text-light">Ketua Program Studi</h5>
												<br><br>
												<h5 class="text-light">M. Anggia Muchtar, S.T, MM.IT</h5>
												<h5 class="text-light">NIP. 19800110 200801 1 010</h5>

											</div>

											<div class="col-xs-6"><center>
												<h5 class="text-light">Ketua Penguji</h5><?php if($ttd1 != '') { ?>
                                    
                                                    <img src="<?php echo base_url('ttd_dosen/'. $ttd1); ?>" width="50px" height="50px">
                                                    
                                                <?php } else {echo "<br>"; } ?>
                                                    
                                                    <br>
                                                <h5 class="text-light">(<?= $pembimbing1 ?>)</h5>
<!--												<h5 class="text-light">(............................................................)</h5></center>-->
                                                <h5 class="text-light">NIP. <?php if($nip1 == '') { echo "..................................................";} else { echo $nip1; } ?></h5></center>

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


