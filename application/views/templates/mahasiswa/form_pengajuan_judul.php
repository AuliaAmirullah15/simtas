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
			border : 3px solid black;
			height : 150px ;
		}

		.box-light
		{
			margin-top : 5px;
			border : 3px solid black;
			height : 80px;
		}

		.checkbox-styled:not(ie8).disabled ~ span:before, .radio-styled:not(ie8).disabled ~ span:before, .checkbox-styled:not(ie8) input[disabled] ~ span:before, .radio-styled:not(ie8) input[disabled] ~ span:before, .checkbox-styled:not(ie8) input[readonly] ~ span:before, .radio-styled:not(ie8) input[readonly] ~ span:before {
			border-color: #000000;
		}
		.checkbox-styled:not(ie8).disabled:checked ~ span:before, .radio-styled:not(ie8).disabled:checked ~ span:before, .checkbox-styled:not(ie8) input[disabled]:checked ~ span:before, .radio-styled:not(ie8) input[disabled]:checked ~ span:before, .checkbox-styled:not(ie8) input[readonly]:checked ~ span:before, .radio-styled:not(ie8) input[readonly]:checked ~ span:before {
			border-color: #000000;
		}
		.well {
			padding :0px;
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

	<?php
		foreach($data as $d)
		{
			$nim = $d->nim;
			$judul_diajukan_dosen = $d->judul_diajukan;
			$judul_diajukan_mhs = $d->judul_diajukan_mahasiswa;
			$uji_kelayakan_judul = $d->status_kelayakan;
			$hasil_uji_kelayakan = $d->hasil_uji_kelayakan;
			$calon_dopim1 = $d->calon_dopim1;
			$calon_dopim2 = $d->calon_dopim2;
			$tgl = $d->tgl_pengajuan;
			$judul = $d->judul;
			$latar_belakang = $d->latar_belakang;
			$rumusan_masalah = $d->rumusan_masalah;
			$metodologi = $d->metodologi;
			$referensi = $d->referensi;
			$upload = $d->upload;
			$ilmu1 = $d->ilmu1;
			$ilmu2 = $d->ilmu2;
		}

		foreach($nama as $n)
		{
			$nama = $n->nama;
		}

		foreach($dosen as $dosen)
		{
			$dopim1 = $dosen->dopim1;
			$dopim2 = $dosen->dopim2;
		}

        $tgl_now = date('Y-m-d');
        	$orderdate = explode('-', $tgl_now);
$tahun = $orderdate[0];
$month   = $orderdate[1];
$tanggals  = $orderdate[2];

switch($month)
{
	case '1' : $bulan = 'Januari';break;
	case '2' : $bulan = 'Februari';break;
	case '3' : $bulan = 'Maret';break;
	case '4' : $bulan = 'April';break;
	case '5' : $bulan = 'Mei';break;
	case '6' : $bulan = 'Juni';break;
	case '7' : $bulan = 'Juli';break;
	case '8' : $bulan = 'Agustus';break;
	case '9' : $bulan = 'September';break;
	case '10' : $bulan = 'Oktober';break;
	case '11' : $bulan = 'November';break;
	case '12' : $bulan = 'Desember';break;
}



	?>

		<!-- BEGIN HEADER-->
		<?php $this->load->view('templates/mahasiswa/templates/header.php');?>
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
					<div class="section-header">
						<ol class="breadcrumb">
							<li class="active">Form Pengajuan Judul</li>
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
												<h4>FORM PENGAJUAN JUDUL</h4>
											</div>
										</div>

										<!-- BEGIN INVOICE DESCRIPTION -->
										<div class="row">
											<div class="col-xs-4">
												<h4 class="text-light">Nama</h4>
												<h4 class="text-light">NIM</h4>
												<h4 class="text-light">Judul diajukan oleh*</h4>
												<br>
												<h4 class="text-light">Bidang Ilmu(tulis dua bidang)</h4>

												<h4 class="text-light">Uji Kelayakan Judul**</h4>
												<br>
												<h4 class="text-light">Hasil Uji Kelayakan Judul : </h4>
											</div><!--end .col -->
											<div class="col-xs-6">
												<h4 class="text-light">: <?= $nama ?></h4>
												<h4 class="text-light">: <?= $nim ?></h4>
												<ul class="list-test">
													<li class="lt"><div class="form-group">
														<div class="input-group">
															<div class="input-group-addon">
																<div class="checkbox checkbox-inline checkbox-styled">
																	<label>
																		<input type="checkbox" <?php if($judul_diajukan_dosen == 'dosen'){
																			echo "checked";}?> disabled>
																	</label>
																</div>
															</div>
															<div class="input-group-content">
																<h4 class="text-light">Dosen</h4>
															</div>
														</div>
														</div><!--end .form-group -->
													</li>
													<li class="lt"><div class="form-group">
														<div class="input-group">
															<div class="input-group-addon">
																<div class="checkbox checkbox-inline checkbox-styled">
																	<label>
																		<input type="checkbox" <?php if($judul_diajukan_mhs == 'mahasiswa'){
																			echo "checked";}?> disabled>
																	</label>
																</div>
															</div>
															<div class="input-group-content">
																<h4 class="text-light">Mahasiswa</h4>
															</div>
														</div>
														</div><!--end .form-group -->
													</li>
												</ul>
												<h4 class="text-light">: <?php 
												if(isset($ilmu1) AND isset($ilmu2)) {

												echo "<b>".$ilmu1."</b> atau <b>". $ilmu2."</b>";}

												else
												{
													echo ".............................. atau ..................................";
												}
												 ?></h4>
												
												 <ul class="list-tes">
													<li class="lti"><div class="form-group">
														<div class="input-group">
															<div class="input-group-addon">
																<div class="checkbox checkbox-inline checkbox-styled">
																	<label>
																		<input type="checkbox" <?php if($uji_kelayakan_judul == 'diterima'){
																			echo "checked";}?> disabled>
																	</label>
																</div>
															</div>
															<div class="input-group-content">
																<h4 class="text-light">Diterima</h4>
															</div>
														</div>
														</div><!--end .form-group -->
													</li>
													<li class="lt"><div class="form-group">
														<div class="input-group">
															<div class="input-group-addon">
																<div class="checkbox checkbox-inline checkbox-styled">
																	<label>
																		<input type="checkbox" <?php if($uji_kelayakan_judul == 'ditolak'){
																			echo "checked";}?> disabled>
																	</label>
																</div>
															</div>
															<div class="input-group-content">
																<h4 class="text-light">Ditolak</h4>
															</div>
														</div>
														</div><!--end .form-group -->
													</li>
												</ul>
											</div><!--end .col -->
											<div class="col-xs-2">
												<div class="well">
													<div class="clearfix">
														<?php if(isset($upload))
															{
																echo "<img src='".base_url()."foto/".$upload."' width='100%' height='100%'>";
															}
															else
															{
																echo "Foto Terbaru";
															}
														?>
													</div>
												</div>
											</div><!--end .col -->
										</div><!--end .row -->
										<!-- END INVOICE DESCRIPTION -->


										<div class="row">
										<div class="box">
											<?= $hasil_uji_kelayakan ?>
										</div>

										</div>

										<div class="row">

											<div class="col-xs-8">
											<h4 class="text-light">Calon Dosen Pembimbing I : <?= $dopim1 ?></h4>
											<br>
											<h4 class="text-light">Calon Dosen Pembimbing II: <?= $dopim2 ?></h4>
											</div>
											<div class="col-xs-4">

												<div class="box-light">
												<center><h5 class="text-light">Paraf Calon Dosen Pembimbing 1</h5></center>
												</div>
											</div>
										</div>

										<div class="row">
										<div class ="col-xs-8">

										</div>

										<div class="col-xs-4">
										<br>
											<center><p>Medan,<?php echo $tanggals.' '.$bulan.' '.$tahun; ?></p>
											<p>Ka. Laboratorium Penelitian, </p></center> 
										</div>
										</div>
										<br><br>
										<div class="row">
										<div class ="col-xs-8">
										<p class="text-light">*<i>Centang salah satu atau keduanya</i></p>
										<p class="text-light">**<i>Pilih salah satu</i></p>
										</div>

										<div class="col-xs-4">
											<center><p>(Dani Gunawan,ST.,MT)</p>
											<p>NIP. 198209152012121002</p></center> 
										</div>
										</div>
                                        <br><br><br>

										<div class="row">
											<div class="col-xs-12 text-center">
												<h4>RINGKASAN JUDUL YANG DIAJUKAN</h4>
											</div>
											<br><br>
											<h6 class="text-light">*Semua kolom di bawah ini diisi oleh mahasiswa yang sudah mendapat judul</h6>
										</div>

										<div class="row">
											<div class="col-xs-12">
												<table border='1' width="100%">
													<tbody>
														<tr style="margin: 20px;">
															<td width="25%" style="padding: 5px;">Judul/Topik Skripsi</td>
															<td width="75%" style="padding: 5px;"><?= $judul ?></td>
														</tr>

														<tr>
															
															<td width="25%" style="padding: 5px;">Latar Belakang dan Penelitian Terdahulu</td>
															<td width="75%" style="padding: 5px;"><?= $latar_belakang ?></td>
														</tr>
														<tr>
															
															<td width="25%" style="padding: 5px;">Rumusan Masalah</td>
															<td width="75%" style="padding: 5px;"><?= $rumusan_masalah ?></td>
														</tr>
														<tr>
															
															<td width="25%" style="padding: 5px;">Gambaran Arsitektur Penelitian</td>
															<td width="75%" style="padding: 5px;"><?php if($metodologi == "<p>Enter text...</p>") { echo " ";} else{echo $metodologi;} ?></td>
														</tr>
														<tr>
															
															<td width="25%" style="padding: 5px;">Referensi</td>
															<td width="75%" style="padding: 5px;"><?php if($referensi == "<p>Enter Text...</p>") { echo " ";} else{echo $referensi;} ?></td>
														</tr>
													</tbody>
												</table>

											</div><!--end .col -->
										</div>

										<div class="row">
											<div class="col-xs-8">

											</div>

											<div class="col-xs-4">
												<center><p>Medan,<?php echo $tanggals.' '.$bulan.' '.$tahun; ?></p>
												<p>Mahasiswa yang Mengajukan</p>
												<br>
												<br>
												<p>(<?= $nama ?>)</p> 
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


