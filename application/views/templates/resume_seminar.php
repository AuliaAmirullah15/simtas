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
		<style type="text/css">
			.custome .custom {
				padding-right: 5px;
				padding-left: 5px;
				padding-top :10px;
				padding-bottom: 10px;
			}

			.custome .custo {
				padding-right: 5px;
				padding-left: 5px;
				font-size : 12px;
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

<?php
	foreach ($fulltanggal as $jdw) {

		$tgl = $jdw->jadwal;
	}

	$dayName = date("l", strtotime($tgl));

switch($dayName)
{
	case 'Sunday' : $hari = 'Minggu';break;
	case 'Monday' : $hari = 'Senin';break;
	case 'Tuesday' : $hari = 'Selasa';break;
	case 'Wednesday' : $hari = 'Rabu';break;
	case 'Thursday' : $hari = 'Kamis';break;
	case 'Friday' : $hari = 'Jumat';break;
	case 'Saturday' : $hari = 'Sabtu';break;
}
	
	$orderdate = explode('-', $tgl);
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
							<li class="active">Resume Seminar</li>
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

										<?php if($tipe_seminar == 'seminar%20proposal') {  

											?>
										<div class="row">
											<div class="col-xs-12 text-center">
												<center><h4><u><strong>DAFTAR PENYAJI SEMINAR PROPOSAL MAHASISWA</strong></u></h4>
												<h5>Hari/Tanggal : <?= $hari ?> / <?php echo $tanggals." ".$bulan." ".$tahun; ?> </h5></center>

											</div>
										</div>

										

										<br>
										<div class="row">
											<table border='1' width='100%'>
												<thead class="custome">
													<th class="custom"><center>NO</center></th>
													<th class="custom"><center>NAMA/NIM</center></th>
													<th class="custom"><center>JUDUL SKRIPSI</center></th>
													<th class="custom"><center>PEMBIMBING I/II</center></th>
													<th class="custom"><center>PEMBANDING</center></th>
													<th class="custom"><center>MODERATOR/NOTULEN</center></th>
												</thead>
												<tbody class="custome">
												<?php $no = 1; foreach($data as $d) { ?>
													<tr>
														
														<td class="custo"><center><?= $no++ ?></center></td>
														<td class="custo"><p><?= $d->nama ?></p><p><?= $d->nim ?></p></td>
														<td class="custo"><?= $d->judul ?></td>
														<td class="custo"><p>1. <?= $d->dopim1 ?></p>
														<p>2. <?= $d->dopim2 ?></p></td>
														<td class="custo"></td>
														<td class="custo"></td>
														
													</tr>
												<?php } ?>
												</tbody>

											</table>
										</div>

										<?php } else if($tipe_seminar == 'seminar%20hasil') {  

											?>
										<div class="row">
											<div class="col-xs-12 text-center">
												<center><h4><u><strong>DAFTAR PENYAJI SEMINAR HASIL MAHASISWA</strong></u></h4>
												<h5>Hari/Tanggal : <?= $hari ?> / <?php echo $tanggals." ".$bulan." ".$tahun; ?></h5></center>

											</div>
										</div>

										

										<br>
										<div class="row">
											<table border='1' width='100%'>
												<thead class="custome">
													<th class="custom"><center>NO</center></th>
													<th class="custom"><center>NAMA/NIM</center></th>
													<th class="custom"><center>JUDUL SKRIPSI</center></th>
													<th class="custom"><center>PEMBIMBING I/II</center></th>
													<th class="custom"><center>PEMBANDING</center></th>
													<th class="custom"><center>MODERATOR/NOTULEN</center></th>
												</thead>
												<tbody class="custome">
												<?php $no = 1; foreach($data as $d) { ?>
													<tr>
														
														<td class="custo"><center><?= $no++ ?></center></td>
														<td class="custo"><p><?= $d->nama ?></p><p><?= $d->nim ?></p></td>
														<td class="custo"><?= $d->judul ?></td>
														<td class="custo"><p>1. <?= $d->dopim1 ?></p>
														<p>2. <?= $d->dopim2 ?></p></td>
														<td class="custo"><p>1. <?= $d->dopemb1 ?></p>
														<p>2. <?= $d->dopemb2 ?></p></td>
														<td class="custo"></td>
														
													</tr>
												<?php } ?>
												</tbody>

											</table>
										</div>

										<?php }else if($tipe_seminar == 'sidang') {  

											?>
										<div class="row">
											<div class="col-xs-12 text-center">
												<center><h4><u><strong>DAFTAR PENYAJI SIDANG MAHASISWA</strong></u></h4>
												<h5>Hari/Tanggal : <?= $hari ?> / <?php echo $tanggals." ".$bulan." ".$tahun; ?></h5></center>

											</div>
										</div>

										

										<br>
										<div class="row">
											<table border='1' width='100%'>
												<thead class="custome">
													<th class="custom"><center>NO</center></th>
													<th class="custom"><center>NAMA/NIM</center></th>
													<th class="custom"><center>JUDUL SKRIPSI</center></th>
													<th class="custom"><center>PEMBIMBING I/II</center></th>
													<th class="custom"><center>PEMBANDING</center></th>
													<th class="custom"><center>MODERATOR/NOTULEN</center></th>
												</thead>
												<tbody class="custome">
												<?php $no = 1; foreach($data as $d) { ?>
													<tr>
														
														<td class="custo"><center><?= $no++ ?></center></td>
														<td class="custo"><p><?= $d->nama ?></p><p><?= $d->nim ?></p></td>
														<td class="custo"><?= $d->judul ?></td>
														<td class="custo"><p>1. <?= $d->dopim1 ?></p>
														<p>2. <?= $d->dopim2 ?></p></td>
														<td class="custo"><p>1. <?= $d->dopemb1 ?></p>
														<p>2. <?= $d->dopemb2 ?></p></td>
														<td class="custo"></td>
														
													</tr>
												<?php } ?>
												</tbody>

											</table>
										</div>

										<?php } ?>
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
}
	</body>
</html>


