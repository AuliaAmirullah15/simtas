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
            .test {
            top: 20px;
            right: 0;
            left:70%;

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
                $tanggal_sidang = $d->tanggal_sidang;

			}
            
            $dayName = date("l", strtotime($tanggal_sidang));

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
	
	$orderdate = explode('-', $tanggal_sidang);
$tahun = $orderdate[0];
$month   = $orderdate[1];
$tanggal  = $orderdate[2];

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
												<h3><b><u>SURAT KETERANGAN</u></b></h3>
                                                <h5>Nomor :      /UN5.2.1.14/</h5>
											</div>
										</div>

										<div class="row">
											<p style="text-align: justify">Dekan Fakultas Ilmu Komputer dan Teknologi Informasi Universitas Sumatera Utara menerangkan bahwa:</p>
                                            
                                            <center>
                                            <div class="row">
                                            <table>
                                                <tr>
                                                    <td width="52%">Nama</td>
                                                    <td>: &nbsp; </td>
                                                    <td><?= $nama ?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>NIM</td>
                                                    <td>: &nbsp; </td>
                                                    <td><?= $nim ?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>Program Studi</td>
                                                    <td>: &nbsp;</td>
                                                    <td><?= $prodi ?></td>
                                                </tr>
                                            </table>
                                            </div>
                                            </center>
                                            
                                            <p style="text-align: justify">Benar telah <b>LULUS</b> Sidang Ujian Meja Hijau (Skripsi) pada Program Studi <?= $prodi ?>, Fakultas Ilmu Komputer dan Teknologi Informasi semester Genap T.A 2017/2018 yang dilaksana pada hari <?= $hari ?> tanggal <?php echo $tanggal ." ". $bulan . " ". $tahun ; ?>, dan berhak menyandang gelar <b>Sarjana Komputer (S.Kom.)</b>. Ijazah dan Transkrip Nilai dalam proses. </p>
                                            
                                            <p class="text-align: justify">Demikian Surat Keterangan ini dibuat, untuk dapat dipergunakan seperlunya.</p>
                                            
                                            <div class="col-sm-6 test">
                                                <table>
                                                    <tr>
                                                        <td>Medan,</td>
                                                    </tr>
                                                    <tr>
                                                        <td>a.n. Dekan</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Wakil Dekan I</td>
                                                    </tr>
                                                    <tr>
                                                        <td height="50px"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dr. Elviawaty Muisa Zamzami, ST, MT, MM</td>
                                                    </tr>
                                                    <tr>
                                                        <td>NIP. 19700716 200501 2 002</td>
                                                    </tr>
                                                </table>
                                                
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


