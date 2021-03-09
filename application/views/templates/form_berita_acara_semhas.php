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
			}



			foreach($pembanding as $p)
			{
				$pembanding1 = $p->pemband1;
				$pembanding2 = $p->pemband2;
				$nip3 = $p->NIP3;
				$nip4 = $p->NIP4;

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
            
            $nilai_semhas = 0;
            foreach($nilai_pembimbing1 as $p1)
            {
                $total1 = $p1->total;
                $nilai_semhas += $total1;
            }
            
            foreach($nilai_pembimbing2 as $p2)
            {
                $total2 = $p2->total;
                $nilai_semhas += $total2;
            }
            
            foreach($nilai_pembanding1 as $p3)
            {
                $total3 = $p3->total;
                $nilai_semhas += $total3;
            }
            
            foreach($nilai_pembanding2 as $p4)
            {
                $total4 = $p4->total;
                $nilai_semhas += $total4;
            }
            
            if($pembagi_dosen_hadir != 0)
            {
            $nilai_semhas = $nilai_semhas / $pembagi_dosen_hadir;
            }
            
			//$dosen = array('','$pembimbing1','$pembimbing2','$pembanding1','$pembanding2');

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
							<li class="active">Berita Acara Seminar Hasil</li>
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
												<h4>BERITA ACARA SEMINAR HASIL</h4>
											</div>
										</div>

										<div class="row">
											<table border='1' width='100%'>
												<tr>
													<td colspan='2'><center><b>Mahasiswa</b></center></td>
													<td colspan='3' style="padding-left:5px;padding-right: 5px">Hari/Tanggal : <?php echo $hari." / ".$tanggals." ".$bulan." ".$tahun ;?></td>
												</tr>
												<tr>
													<td colspan='2' style="padding-left:5px;padding-right: 5px">Nama : <?= $nama ?></td>
													<td colspan='3' style="padding-left:5px;padding-right: 5px">Waktu : </td>
												</tr>
												<tr>
													<td colspan='2' style="padding-left:5px;padding-right: 5px">NIM : <?= $nim ?></td>
													<td colspan='3' style="padding-left:5px;padding-right: 5px">Bidang Tugas Akhir : <?= $ilmu1 ?> atau <?= $ilmu2 ?></td>
												</tr>
												<tr>
													<td colspan='5' style="padding-left:5px;padding-right: 5px">Judul Tugas Akhir : <?= $judul ?></td>
												</tr>
												<tr>
													<td colspan='2'><center><b>PEMBIMBING</b></center></td>
													<td colspan='3'><center><b>PEMBANDING</b></center></td>
												</tr>
												<tr>
													<td style="padding-left:5px;padding-right: 5px">Nama </td>
													<td style="padding-left:5px;padding-right: 5px"><?= $pembimbing1 ?></td>
													<td style="padding-left:5px;padding-right: 5px">Nama</td>
													<td colspan='2' style="padding-left:5px;padding-right: 5px"><?= $pembanding1 ?></td>
												</tr>
												<tr>
													<td style="padding-left:5px;padding-right: 5px">NIP </td>
													<td style="padding-left:5px;padding-right: 5px"><?= $nip1 ?></td>
													<td style="padding-left:5px;padding-right: 5px">NIP</td>
													<td colspan='2' style="padding-left:5px;padding-right: 5px"><?= $nip3 ?></td>
												</tr>
												<tr>
													<td style="padding-left:5px;padding-right: 5px">Nama </td>
													<td style="padding-left:5px;padding-right: 5px"><?= $pembimbing2 ?></td>
													<td style="padding-left:5px;padding-right: 5px">Nama</td>
													<td colspan='2' style="padding-left:5px;padding-right: 5px"><?= $pembanding2 ?></td>
												</tr>
												<tr>
													<td style="padding-left:5px;padding-right: 5px">NIP </td>
													<td style="padding-left:5px;padding-right: 5px"><?= $nip2 ?></td>
													<td style="padding-left:5px;padding-right: 5px">NIP</td>
													<td colspan='2' style="padding-left:5px;padding-right: 5px"><?= $nip4 ?></td>
												</tr>
												<tr>
													<td colspan='5'><center>HASIL SEMINAR PROPOSAL</center></td>
												</tr>
												<tr>
													<td><center><b>No</b></center></td>
													<td colspan='2'><center><b>Nama Dosen</b></center></td>
													<td><center><b>Nilai Angka</b></center></td>
													<td><center><b>Tanda Tangan</b></center></td>
												</tr>
												<tr>
																<td><center>1</center></td>
																<td colspan='2' style="padding-left:5px;padding-right: 5px"><?= $pembimbing1 ?></td>
                                                                <td><center><?= $total1 ?></center></td>
																<td></td>
															</tr>
													<tr>
																<td><center>2</center></td>
																<td colspan='2' style="padding-left:5px;padding-right: 5px"><?= $pembimbing2 ?></td>
																<td><center><?= $total2 ?></center></td>
																<td></td>
															</tr>
													<tr>
																<td><center>3</center></td>
																<td colspan='2' style="padding-left:5px;padding-right: 5px"><?= $pembanding1 ?></td>
                                                                <td><center><?= $total3 ?></center></td>
																<td></td>
															</tr>
													<tr>
																<td><center>4</center></td>
																<td colspan='2' style="padding-left:5px;padding-right: 5px"><?= $pembanding2 ?></td>
                                                                <td><center><?= $total4 ?></center></td>
																<td></td>
													</tr>
													
													<tr>
														<td></td>
														<td colspan='2'>&nbsp NILAI SEMINAR HASIL*</td>
                                                        <td><center><?php if($pembagi_dosen_hadir != 0) {echo $nilai_semhas;} ?></center></td>
													</tr>

											</table>
										</div>

										<br>
										<div class="row">
										<h5 class="text-light"><i> *Nilai seminar hasil adalah rata-rata dari nilai yang diberikan oleh seluruh dosen</i></h5>
										</div>
										<div class="row">
											<div class="col-xs-8">
										
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


