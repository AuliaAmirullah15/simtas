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
			}
            
            foreach($penilaian_uji_program as $pu)
            {
                $nim = $pu->nim;
                $penilai = $pu->penilai;
                $kemampuan_dasar = $pu->kemampuan_dasar;
                $kecocokan = $pu->kecocokan;
                $kasus = $pu->kasus;
                $ui = $pu->ui;
                $validasi = $pu->validasi;
                $total = $pu->total;
                $dopim1 = $pu->dopim1;
                $dopim2 = $pu->dopim2;
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
							<li class="active">Form Penilaian Uji Program</li>
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
<!--
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
										</div>end .row 
-->
										<!-- END INVOICE HEADER -->
<!--

										<div class="row">
											<div class="col-xs-12 text-center">
												<h4>FORM PENILAIAN UJI PROGRAM</h4>
											</div>
										</div>

										<div class="row">
											<table border='1' width='100%'>
												<tr>
													<td colspan='2'><center><b>Mahasiswa</b></center></td>
													<td colspan='3'>&nbsp Hari/Tanggal : </td>
												</tr>
												<tr>
													<td colspan='2'>&nbsp Nama : <?= $nama ?></td>
													<td colspan='3'>&nbsp Waktu : </td>
												</tr>
												<tr>
													<td colspan='2'>&nbsp NIM : <?= $nim ?></td>
													<td colspan='3'>&nbsp Bidang Tugas Akhir : <?= $ilmu1 ?> atau <?= $ilmu2 ?></td>
												</tr>
												<tr>
													<td colspan='2'><center><b>PEMBIMBING</b></center></td>
													<td colspan='3' rowspan='5' style="padding-left:5px;padding-right:5px;">Judul Tugas Akhir : <?= $judul ?></td>
												</tr>
												<tr>
													<td>&nbsp Nama </td>
													<td style="padding-left: 10px;"><?= $pembimbing1 ?></td>
												</tr>
												<tr>
													<td>&nbsp NIP </td>
													<td style="padding-left: 10px;"><?= $nip1 ?></td>
												</tr>
												<tr>
													<td>&nbsp Nama </td>
													<td style="padding-left: 10px;"><?= $pembimbing2 ?></td>
												</tr>
												<tr>
													<td>&nbsp NIP </td>
													<td style="padding-left: 10px;"><?= $nip2 ?></td>
												</tr>
												<tr>
													<td colspan='5'><center>HASIL PENILAIAN UJI PROGRAM</center></td>
												</tr>
												<tr>
													<td><center><b>No</b></center></td>
													<td colspan='3'><center><b>Komponen Penilaian</b></center></td>
													<td><center><b>Nilai Angka</b></center></td>
												</tr>
												<tr>
													<td><center>1</center></td>
													<td colspan='3'>&nbsp Kemampuan dasar pemrograman (0-40)</td>
													<td></td>
												</tr>
												<tr>
													<td><center>2</center></td>
													<td colspan='3'>&nbsp Kecocokan metode/algoritma dengan sintaks program (0-10)</td>
													<td></td>
												</tr>
												<tr>
													<td><center>3</center></td>
													<td colspan='3'>&nbsp Penguasaan pemrograman berdasarkan kasus pada skripsi (0-20)</td>
													<td></td>
												</tr>
												<tr>
													<td><center>4</center></td>
													<td colspan='3'>&nbsp Penguasaan pembuatan User Interface (0-10)</td>
													<td></td>
												</tr>
												<tr>
													<td><center>5</center></td>
													<td colspan='3'>&nbsp Validasi output program (0-20)</td>
													<td></td>
												</tr>
												<tr>
													<td></td>
													<td colspan='3'><center>NILAI UJI PROGRAM</center></td>
													<td></td>
												</tr>
												
											</table>
										</div>

										<br>
										<div class="row">
											<div class="col-xs-8">
										
											</div>
											<div class="col-xs-4">
												<h5><center>
												Medan,.....................................<br>
												Pembimbing I,<br><br><br><br>
												
												( <?= $pembimbing1 ?> ) </center></h5>
												<h5>NIP. <?= $nip1 ?></h5>
											</div>
										</div>

		<br><br><br>
-->
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

										<div class="row">
											<div class="col-xs-12 text-center">
												<h4>FORM PENILAIAN UJI PROGRAM</h4>
											</div>
										</div>

										<div class="row">
											<table border='1' width='100%'>
												<tr>
													<td colspan='2'><center><b>Mahasiswa</b></center></td>
													<td colspan='3'>&nbsp Hari/Tanggal : </td>
												</tr>
												<tr>
													<td colspan='2'>&nbsp Nama : <?= $nama ?></td>
													<td colspan='3'>&nbsp Waktu : </td>
												</tr>
												<tr>
													<td colspan='2'>&nbsp NIM : <?= $nim ?></td>
													<td colspan='3'>&nbsp Bidang Tugas Akhir : <?= $ilmu1 ?> atau <?= $ilmu2 ?></td>
												</tr>
												<tr>
													<td colspan='2'><center><b>PEMBIMBING</b></center></td>
													<td colspan='3' rowspan='5' style="padding-left:5px;padding-right:5px;">Judul Tugas Akhir : <?= $judul ?></td>
												</tr>
												<tr>
													<td>&nbsp Nama </td>
													<td style="padding-left: 10px;"><?= $pembimbing1 ?></td>
												</tr>
												<tr>
													<td>&nbsp NIP </td>
													<td style="padding-left: 10px;"><?= $nip1 ?></td>
												</tr>
												<tr>
													<td>&nbsp Nama </td>
													<td style="padding-left: 10px;"><?= $pembimbing2 ?></td>
												</tr>
												<tr>
													<td>&nbsp NIP </td>
													<td style="padding-left: 10px;"><?= $nip2 ?></td>
												</tr>
												<tr>
													<td colspan='5'><center>HASIL PENILAIAN UJI PROGRAM</center></td>
												</tr>
												<tr>
													<td><center><b>No</b></center></td>
													<td colspan='3'><center><b>Komponen Penilaian</b></center></td>
													<td><center><b>Nilai Angka</b></center></td>
												</tr>
												<tr>
													<td><center>1</center></td>
													<td colspan='3'>&nbsp Kemampuan dasar pemrograman (0-40)</td>
                                                    <td><center><?= $kemampuan_dasar ?></center></td>
												</tr>
												<tr>
													<td><center>2</center></td>
													<td colspan='3'>&nbsp Kecocokan metode/algoritma dengan sintaks program (0-10)</td>
                                                    <td><center><?= $kecocokan ?></center></td>
												</tr>
												<tr>
													<td><center>3</center></td>
													<td colspan='3'>&nbsp Penguasaan pemrograman berdasarkan kasus pada skripsi (0-20)</td>
                                                    <td><center><?= $kasus ?></center></td>
												</tr>
												<tr>
													<td><center>4</center></td>
													<td colspan='3'>&nbsp Penguasaan pembuatan User Interface (0-10)</td>
                                                    <td><center><?= $ui ?></center></td>
												</tr>
												<tr>
													<td><center>5</center></td>
													<td colspan='3'>&nbsp Validasi output program (0-20)</td>
                                                    <td><center><?= $validasi ?></center></td>
												</tr>
												<tr>
													<td></td>
													<td colspan='3'><center>NILAI UJI PROGRAM</center></td>
                                                    <td><center><?= $total ?></center></td>
												</tr>
												
											</table>
										</div>

										<br>
										<div class="row">
											<div class="col-xs-8">
										
											</div>
											<div class="col-xs-4">
												<h5><center>
												Medan,.....................................<br>
												<?php if($penilai == 'pembimbing1') {echo "Pembimbing I";} else {echo "Pembimbing II";}?>,<br><br><br><br>
												
												( <?php if($penilai == 'pembimbing1') {echo $dopim1;} else {echo $dopim2;}?> ) </center></h5>
												<h5>NIP. <?php if($penilai == 'pembimbing1') {echo $nip1;} else {echo $nip2;}?></h5>
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


