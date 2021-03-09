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
            @media all {
	.page-break	{ display: none; }
}

@media print {
	.page-break	{ display: block; page-break-before: always; }
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
			$prodi = $n->nama_PS;
		}

		foreach($dosen as $dsn)
		{
			$dopim1 = $dsn->dopim1;
			$dopim2 = $dsn->dopim2;
			$nip1 = $dsn->nip1;
			$nip2 = $dsn->nip2;
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
							<li class="active">Lembar Kendali Bimbingan Skripsi Pra Seminar Proposal</li>
							<?php var_dump($form) ;?>
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
									</div> <!--end .card-head -->
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
												<h4>LEMBAR KENDALI BIMBINGAN SKRIPSI<br> PRA SEMINAR PROPOSAL</h4>
											</div>
										</div>

										<!-- BEGIN DESCRIPTION -->
										<div class="row">
											<div class="col-xs-4">
												<h4 class="text-light">Pembimbing I</h4>
												<h4 class="text-light">Pembimbing II</h4>
												<br>
												<h4 class="text-light">NIM</h4>
												<h4 class="text-light">Nama</h4>
												<h4 class="text-light">Program Studi</h4>
											</div><!--end .col -->
											<div class="col-xs-5">
												<h4 class="text-light">: <?= $dopim1 ?></h4>
												<h4 class="text-light">: <?= $dopim2 ?></h4>
												<br>
												<h4 class="text-light">: <?= $nim ?></h4>
												<h4 class="text-light">: <?= $nama ?></h4>
												<h4 class="text-light">: <?= $prodi ?></h4>
											</div>
											<div class="col-xs-3">
												<div class="well">
													<div class="clearfix">
														<center>FORM 1-A</center>
													</div>
												</div>
											</div><!--end .col -->
										</div><!--end .row -->
										<!-- END  -->

										<div class="row">
											<div class="col-xs-12 text-center">
												<h4><b>Rencana Judul Skripsi</b></h4>
											</div>
										</div>

										<div class="row">
										<div class="col-xs-12">
										<div class="box" style="padding-right: 5px; padding-left: 15px;">
											<?= $judul ?>
										</div>
										</div>
										</div>
										<br>
										<div class="row">
											<div class="col-xs-12 text-center">
												<table border='1' width="100%">
													<tbody>
														<tr height="30px">
															
															<td rowspan='2' width="5%">No</td>
															<td colspan='3'>Tanggal Bimbingan</td>
															<td rowspan='2' width="65%">Catatan</td>
														</tr>

														<tr height="30px">
															<td width="10%">Penyerahan</td>
															<td width="10%">Selesai Diperiksa</td>
															<td width="10%">Terima Kembali</td>
														</tr>
															<?php 

															for($i = 1;$i<=5;$i++)
															{
																echo "<tr height='30px'>
																	<td>$i</td>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>";
															}

															?>
													</tbody>
												</table>

											</div><!--end .col -->
										</div>
										<br>
										<div class="row">

											<div class="col-xs-4">
												
													<table class="boxes text-center" border='3' width="70%">
														<tr height="25px">
															<td>Rencana Tanggal <br>Seminar Proposal</td>
														</tr>
														<tr height="25px">
														<td></td>
														</tr>
													</table>
												
											</div>
											<div class="col-xs-5">

											</div>
											<div class="col-xs-3">

												
												<center><h5 class="text-light">Medan, <?php echo $tanggals.' '.$bulan.' '.$tahun; ?>
													<br>
													Pembimbing I,
													<br><br><br><br>
												</h5></center>
												<h5><center>( <?= $dopim1 ?> )</center></h5>
												<h5>NIP. <?= $nip1 ?> </h5>
											
											</div>
										</div>

<br><br>


											<!-- BEGIN INVOICE HEADER -->
										<div class="row page-break">
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
												<h4>LEMBAR KENDALI BIMBINGAN SKRIPSI<br> PRA SEMINAR PROPOSAL</h4>
											</div>
										</div>

										<!-- BEGIN DESCRIPTION -->
										<div class="row">
											<div class="col-xs-4">
												<h4 class="text-light">Pembimbing I</h4>
												<h4 class="text-light">Pembimbing II</h4>
												<br>
												<h4 class="text-light">NIM</h4>
												<h4 class="text-light">Nama</h4>
												<h4 class="text-light">Program Studi</h4>
											</div><!--end .col -->
											<div class="col-xs-5">
												<h4 class="text-light">: <?= $dopim1 ?></h4>
												<h4 class="text-light">: <?= $dopim2 ?></h4>
												<br>
												<h4 class="text-light">: <?= $nim ?></h4>
												<h4 class="text-light">: <?= $nama ?></h4>
												<h4 class="text-light">: <?= $prodi ?></h4>
											</div>
											<div class="col-xs-3">
												<div class="well">
													<div class="clearfix">
														<center>FORM 1-A</center>
													</div>
												</div>
											</div><!--end .col -->
										</div><!--end .row -->
										<!-- END  -->

										<div class="row">
											<div class="col-xs-12 text-center">
												<h4><b>Rencana Judul Skripsi</b></h4>
											</div>
										</div>

										<div class="row">
										<div class="col-xs-12">
										<div class="box" style="padding-right: 5px; padding-left: 15px;">
											<?= $judul ?>
										</div>
										</div>
										</div>
										<br>
										<div class="row">
											<div class="col-xs-12 text-center">
												<table border='1' width="100%">
													<tbody>
														<tr height="30px">
															
															<td rowspan='2' width="5%">No</td>
															<td colspan='3'>Tanggal Bimbingan</td>
															<td rowspan='2' width="65%">Catatan</td>
														</tr>

														<tr height="30px">
															<td width="10%">Penyerahan</td>
															<td width="10%">Selesai Diperiksa</td>
															<td width="10%">Terima Kembali</td>
														</tr>
															<?php 

															for($i = 1;$i<=5;$i++)
															{
																echo "<tr height='30px'>
																	<td>$i</td>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>";
															}

															?>
													</tbody>
												</table>

											</div><!--end .col -->
										</div>
										<br>
										<div class="row">

											<div class="col-xs-4">
												
													<table class="boxes text-center" border='3' width="70%">
														<tr height="25px">
															<td>Rencana Tanggal <br>Seminar Proposal</td>
														</tr>
														<tr height="25px">
														<td></td>
														</tr>
													</table>
												
											</div>
											<div class="col-xs-5">

											</div>
											<div class="col-xs-3">

												
												<center><h5 class="text-light">Medan, <?php echo $tanggals.' '.$bulan.' '.$tahun; ?>
													<br>
													Pembimbing II,
													<br><br><br><br>
												</h5></center>
												<h5><center>( <?= $dopim2 ?> )</center></h5>
												<h5>NIP. <?= $nip2 ?> </h5>
											
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


