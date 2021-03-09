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

			foreach($tanggal as $t)
			{
				$tgl = $t->jadwal;
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
										<?php if($penilaian_sempro == null) { ?>
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
												<h4>FORM PENILAIN KELAYAKAN ISI PROPOSAL</h4>
											</div>
										</div>

										<div class="row">
											<table border='1' width='100%'>
												<tr>
													<td colspan='3'><center><b>Mahasiswa</b></center></td>
													<td colspan='3' style="padding-left:5px;padding-right: 5px">Hari/Tanggal : <?php echo $hari." / ".$tanggals." ".$bulan." ".$tahun ;?></td>
												</tr>
												<tr>
													<td colspan='3' style="padding-left:5px;padding-right: 5px">Nama : <?= $nama ?></td>
													<td colspan='3' style="padding-left:5px;padding-right: 5px">Waktu : </td>
												</tr>
												<tr>
													<td colspan='3' style="padding-left:5px;padding-right: 5px">NIM : <?= $nim ?></td>
													<td colspan='3' style="padding-left:5px;padding-right: 5px">Bidang Tugas Akhir : <?= $ilmu1 ?> atau <?= $ilmu2 ?></td>
												</tr>
												<tr>
													<td colspan='3'><center><b>PEMBIMBING</b></center></td>
                                                    <td colspan='3' style="padding-left:5px;padding-right: 5px">Dosen Penilai: <?= $dsn ?></td>
													
												</tr>
												<tr>
													<td style="padding-left:5px;padding-right: 5px">Nama </td>
													<td colspan='2' style="padding-left:5px;padding-right: 5px"><?= $pembimbing1 ?></td>
                                                    <td colspan='3' rowspan='4' style="padding-left:5px;padding-right: 5px">Judul Tugas Akhir : <?= $judul_diseminarkan ?></td>
												</tr>
												<tr>
													<td style="padding-left:5px;padding-right: 5px">NIP </td>
													<td colspan='2' style="padding-left:5px;padding-right: 5px"><?= $nip1 ?></td>
												</tr>
												<tr>
													<td style="padding-left:5px;padding-right: 5px">Nama </td>
													<td colspan='2' style="padding-left:5px;padding-right: 5px"><?= $pembimbing2 ?></td>
												</tr>
												<tr>
													<td style="padding-left:5px;padding-right: 5px">NIP </td>
													<td colspan='2' style="padding-left:5px;padding-right: 5px"><?= $nip2 ?></td>
												</tr>
												<tr>
													<td colspan='6'><center>HASIL SEMINAR PROPOSAL</center></td>
												</tr>
												<tr>
													<td><center><b>No</b></center></td>
													<td><center><b>Komponen Penilaian</b></center></td>
													<td><center><b>Terima<span>*)</span></b></center></td>
													<td><center><b>Perbaiki<span>*)</span></b></center></td>
													<td><center><b>Ganti<span>*)</span></b></center></td>
													<td><center><b>Keterangan</b></center></td>
												</tr>
												<tr>
													<td><center>1</center></td>
													<td>&nbsp Judul Skripsi</td>
													<td><?php if($judul_skripsi == 'terima') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($judul_skripsi == 'perbaiki') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($judul_skripsi == 'ganti') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td style="padding-left:5px;padding-right: 5px"><?= $catatan_judul_skripsi ?></td>
												</tr>

												<tr>
													<td><center>2</center></td>
													<td>&nbsp Latar Belakang</td>
													<td><?php if($latar_belakang == 'terima') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($latar_belakang == 'perbaiki') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($latar_belakang == 'ganti') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td style="padding-left:5px;padding-right: 5px"><?= $catatan_latar_belakang ?></td>
												</tr>

												<tr>
													<td><center>3</center></td>
													<td>&nbsp Rumusan Masalah</td>
													<td><?php if($rumusan_masalah == 'terima') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($rumusan_masalah == 'perbaiki') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($rumusan_masalah == 'ganti') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td style="padding-left:5px;padding-right: 5px"><?= $catatan_rumusan_masalah ?></td>
												</tr>

												<tr>
													<td><center>4</center></td>
													<td>&nbsp Landasan Teori</td>
													<td><?php if($landasan_teori == 'terima') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($landasan_teori == 'perbaiki') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($landasan_teori == 'ganti') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td style="padding-left:5px;padding-right: 5px"><?= $catatan_landasan_teori ?></td>
												</tr>

												<tr>
													<td><center>5</center></td>
													<td>&nbsp Penelitian Terdahulu</td>
													<td><?php if($penelitian_terdahulu == 'terima') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($penelitian_terdahulu == 'perbaiki') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($penelitian_terdahulu == 'ganti') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td style="padding-left:5px;padding-right: 5px"><?= $catatan_penelitian_terdahulu ?></td>
												</tr>

												<tr>
													<td><center>6</center></td>
													<td>&nbsp Data yang Digunakan</td>
													<td><?php if($data_digunakan == 'terima') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($data_digunakan == 'perbaiki') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($data_digunakan == 'ganti') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td style="padding-left:5px;padding-right: 5px"><?= $catatan_data_digunakan ?></td>
												</tr>

												<tr>
													<td><center>7</center></td>
													<td>&nbsp Metodologi<br>&nbsp (Arsitektur Umum)</td>
													<td><?php if($metodologi == 'terima') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($metodologi == 'perbaiki') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($metodologi == 'ganti') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td style="padding-left:5px;padding-right: 5px"><?= $catatan_metodologi ?></td>
												</tr>

												<tr>
													<td><center>8</center></td>
                                                    <!-- arsitektur_umum itu sebenarnya daftar pustaka di db, karena banyak yang harus diubah, jadi dibiarkan saja -->
													<td>&nbsp Daftar Pustaka</td>
													<td><?php if($arsitektur_umum == 'terima') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($arsitektur_umum == 'perbaiki') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($arsitektur_umum == 'ganti') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td style="padding-left:5px;padding-right: 5px"><?= $catatan_arsitektur_umum ?></td>
												</tr>
											</table>
										</div>

										<br>
										<div class="row">
											<div class="col-xs-8">
												<div class="box">
													<center> <?php if($kelayakan_sempro == 'layak') {echo "Layak/<strike>Tidak Layak</strike>";} else {echo "<strike>Layak</strike>/Tidak Layak";}?><br>
													<i>(pilih salah satu)</i></center>
												</div>
											</div>
											<div class="col-xs-4">
												<center>
												Medan,.....................................<br>
												Ketua Program Studi<br><br><br>
												</center>
												(..............................................................)<br>
												NIP. 
											</div>
										</div>
                                        
                                        <?php } else { $nomors = 1; foreach($penilaian_sempro as $ps) { ?>
                                        
                                        
                                        <div class="<?php if($nomors > 1){echo "page-break"; } $nomors+=1 ; ?> row">
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
												<h4>FORM PENILAIN KELAYAKAN ISI PROPOSAL</h4>
											</div>
										</div>

										<div class="row">
											<table border='1' width='100%'>
												<tr>
													<td colspan='3'><center><b>Mahasiswa</b></center></td>
													<td colspan='3' style="padding-left:5px;padding-right: 5px">Hari/Tanggal : <?php echo $hari." / ".$tanggals." ".$bulan." ".$tahun ;?></td>
												</tr>
												<tr>
													<td colspan='3' style="padding-left:5px;padding-right: 5px">Nama : <?= $nama ?></td>
													<td colspan='3' style="padding-left:5px;padding-right: 5px">Waktu : </td>
												</tr>
												<tr>
													<td colspan='3' style="padding-left:5px;padding-right: 5px">NIM : <?= $nim ?></td>
													<td colspan='3' style="padding-left:5px;padding-right: 5px">Bidang Tugas Akhir : <?= $ilmu1 ?> atau <?= $ilmu2 ?></td>
												</tr>
												<tr>
													<td colspan='3'><center><b>PEMBIMBING</b></center></td>
                                                    <td colspan='3' style="padding-left:5px;padding-right: 5px">Dosen Penilai: <?= $ps->Nama_dosen ?></td>
													
												</tr>
												<tr>
													<td style="padding-left:5px;padding-right: 5px">Nama </td>
													<td colspan='2' style="padding-left:5px;padding-right: 5px"><?= $pembimbing1 ?></td>
                                                    <td colspan='3' rowspan='4' style="padding-left:5px;padding-right: 5px">Judul Tugas Akhir : <?= $judul_diseminarkan ?></td>
												</tr>
												<tr>
													<td style="padding-left:5px;padding-right: 5px">NIP </td>
													<td colspan='2' style="padding-left:5px;padding-right: 5px"><?= $nip1 ?></td>
												</tr>
												<tr>
													<td style="padding-left:5px;padding-right: 5px">Nama </td>
													<td colspan='2' style="padding-left:5px;padding-right: 5px"><?= $pembimbing2 ?></td>
												</tr>
												<tr>
													<td style="padding-left:5px;padding-right: 5px">NIP </td>
													<td colspan='2' style="padding-left:5px;padding-right: 5px"><?= $nip2 ?></td>
												</tr>
												<tr>
													<td colspan='6'><center>HASIL SEMINAR PROPOSAL</center></td>
												</tr>
												<tr>
													<td><center><b>No</b></center></td>
													<td><center><b>Komponen Penilaian</b></center></td>
													<td><center><b>Terima<span>*)</span></b></center></td>
													<td><center><b>Perbaiki<span>*)</span></b></center></td>
													<td><center><b>Ganti<span>*)</span></b></center></td>
													<td><center><b>Keterangan</b></center></td>
												</tr>
												<tr>
													<td><center>1</center></td>
													<td>&nbsp Judul Skripsi</td>
													<td><?php if($ps->judul_skripsi == 'terima') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($ps->judul_skripsi == 'perbaiki') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($ps->judul_skripsi == 'ganti') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td style="padding-left:5px;padding-right: 5px"><?= $ps->catatan_judul_skripsi ?></td>
												</tr>

												<tr>
													<td><center>2</center></td>
													<td>&nbsp Latar Belakang</td>
													<td><?php if($ps->latar_belakang == 'terima') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($ps->latar_belakang == 'perbaiki') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($ps->latar_belakang == 'ganti') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td style="padding-left:5px;padding-right: 5px"><?= $ps->catatan_latar_belakang ?></td>
												</tr>

												<tr>
													<td><center>3</center></td>
													<td>&nbsp Rumusan Masalah</td>
													<td><?php if($ps->rumusan_masalah == 'terima') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($ps->rumusan_masalah == 'perbaiki') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($ps->rumusan_masalah == 'ganti') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td style="padding-left:5px;padding-right: 5px"><?= $ps->catatan_rumusan_masalah ?></td>
												</tr>

												<tr>
													<td><center>4</center></td>
													<td>&nbsp Landasan Teori</td>
													<td><?php if($ps->landasan_teori == 'terima') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($ps->landasan_teori == 'perbaiki') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($ps->landasan_teori == 'ganti') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td style="padding-left:5px;padding-right: 5px"><?= $ps->catatan_landasan_teori ?></td>
												</tr>

												<tr>
													<td><center>5</center></td>
													<td>&nbsp Penelitian Terdahulu</td>
													<td><?php if($ps->penelitian_terdahulu == 'terima') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($ps->penelitian_terdahulu == 'perbaiki') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($ps->penelitian_terdahulu == 'ganti') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td style="padding-left:5px;padding-right: 5px"><?= $ps->catatan_penelitian_terdahulu ?></td>
												</tr>

												<tr>
													<td><center>6</center></td>
													<td>&nbsp Data yang Digunakan</td>
													<td><?php if($ps->data_digunakan == 'terima') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($ps->data_digunakan == 'perbaiki') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($ps->data_digunakan == 'ganti') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td style="padding-left:5px;padding-right: 5px"><?= $ps->catatan_data_digunakan ?></td>
												</tr>

												<tr>
													<td><center>7</center></td>
													<td>&nbsp Metodologi<br>&nbsp (Arsitektur Umum)</td>
													<td><?php if($ps->metodologi == 'terima') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($ps->metodologi == 'perbaiki') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($ps->metodologi == 'ganti') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td style="padding-left:5px;padding-right: 5px"><?= $ps->catatan_metodologi ?></td>
												</tr>

												<tr>
													<td><center>8</center></td>
                                                    <!-- arsitektur_umum itu sebenarnya daftar pustaka di db, karena banyak yang harus diubah, jadi dibiarkan saja -->
													<td>&nbsp Daftar Pustaka</td>
													<td><?php if($ps->arsitektur_umum == 'terima') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($ps->arsitektur_umum == 'perbaiki') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td><?php if($ps->arsitektur_umum == 'ganti') {echo "<center><i class='fa fa-check'></i></center>";} ?></td>
													<td style="padding-left:5px;padding-right: 5px"><?= $ps->catatan_arsitektur_umum ?></td>
												</tr>
											</table>
										</div>

										<br>
										<div class="row">
											<div class="col-xs-8">
												<div class="box">
													<center> <?php if($ps->kelayakan_sempro == 'layak') {echo "Layak/<strike>Tidak Layak</strike>";} else {echo "<strike>Layak</strike>/Tidak Layak";}?><br>
													<i>(pilih salah satu)</i></center>
												</div>
											</div>
											<div class="col-xs-4">
												<center>
												Medan,.....................................<br>
												Ketua Program Studi<br><br><br>
												</center>
												(..............................................................)<br>
												NIP. 
											</div>
										</div>
                                        
                                        
                                        
                                        <?php } } ?>


										
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


