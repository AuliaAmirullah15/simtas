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
		<style type="text/css">
			.nav li .active {
				background-color: #c1c1c1;
			}
            .customli li {
                list-style: none;
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
					<div class="section-body contain-lg">
                        
              <?php if($error != '' AND $error != null) {

if($error == 'berhasil upload')
{

							echo "

					<div class=\"section-body\">
						<div class=\"alert alert-success\" role=\"alert\">
							<strong>Selamat! </strong> Anda berhasil mengupload <b>Berkas Persyaratan Seminar Proposal</b></div>";
}
    else if ($error == 'Simpan Sementara Berhasil')
    {
        echo "

					<div class=\"section-body\">
						<div class=\"alert alert-success\" role=\"alert\">
							<strong>Selamat! </strong> ".$error."</b></div>";
    }
else
{
echo "

					<div class=\"section-body\">
						<div class=\"alert alert-warning\" role=\"alert\">
							<strong>Maaf! </strong>". $error."</div>";
}
							 } ?>
						<div class="row">
							<div class="col-lg-12">
								<div class="card card-tiles style-default-light">
                                    
									<!-- BEGIN BLOG POST HEADER -->
									<div class="row style-primary">
										<div class="col-sm-9">
											<div class="card-body style-default-dark">
												<h2>PORTAL TUGAS AKHIR</h2>
											</div>
										</div><!--end .col -->
										<div class="col-sm-3">
											<div class="card-body">
								
												<div class="visible-xs">
													
												</div>
											</div>
										</div><!--end .col -->
									</div><!--end .row -->
									<!-- END BLOG POST HEADER -->

									<div class="row">

										<!-- BEGIN BLOG POST TEXT -->
										<div class="col-md-9">
											<article class="style-default-bright">
												<div class="card-body">
													<?php if((isset($status_kelayakan)) == 'diterima') { ?>
														<a href="<?php echo base_url().'mahasiswa/status_validasi_berkas_sempro'; ?>"><p class="lead">Cetak Form Validasi Berkas Mahasiswa Seminar Proposal</p></a>
                                                    
                                                        <a href="<?php echo base_url().'mahasiswa/riwayat_bimbingan/sempro'; ?>"><p class="lead">Riwayat Bimbingan Pra Seminar Proposal</p></a>

<!--														<a href="<?php echo base_url().'mahasiswa/status_validasi_berkas_sempro'; ?>"><p class="lead">Status Validasi Berkas Mahasiswa Seminar Proposal</p></a>-->

													<?php } ?>
                                                    
                                                    <hr><hr>
                                                     <h3 class="text-light"><strong>Pengumuman</strong></h3>
                                                    <p class="text-light">Untuk dapat mengupload berkas, lakukan tahap-tahap berikut: </p>
                                                    <ul class="customli">
                                                        <li>1. Isi Riwayat Bimbingan baik Dengan Pembimbing 1 ataupun Pembimbing 2 dengan Jumlah Bimbingan (keduanya) Minimal 3 kali</li>
                                                        <li>2. Minta verifikasi Pembimbing 1 dan/atau Pembimbing 2 Untuk Mengizinkan Mengikuti Seminar Proposal </li>
                                                        <li>3. Tombol Upload Berkas Akan Terbuka Jika Semua Pembimbing Sudah Mengizinkan Untuk Mengikuti Seminar Proposal</li>
                                                        <li>4. Upload Berkas Untuk Divalidasi</li>
                                                    </ul>
                                                    
                                                    
                                                    <h3 class="text-light"><strong>Berkas</strong></h3>
                                                    <p class="text-light">Berikut ini berkas yang perlu dipersiapkan sebelum Seminar Proposal : </p>
                                                    <ul class="customli">
                                                        <li>1. Fotokopi KRS/KHS mahasiswa (awal-akhir/berjalan) </li>
                                                        <li>2. Fotokopi tanda lunas SPP awal - SPP akhir (semester berjalan) </li>
                                                        <li>3. Lembar Kendal Pra-Seminar Proposal (Form 1-A)</li>
                                                    </ul>
                                                    <p class="text-light">Berkas di atas harus diupload dalam format <strong>zip</strong> atau <strong>rar</strong>.</p>
                                                    <p class="text-light">Format File : SeminarProposal_Nim_Nama.rar / SeminarProposal_Nim_Nama.zip</p>
                                                    
                                                    <?php foreach($mahasiswa as $m) { $state = $m->upload_sempro; } if($state == 1) { 
                                                        
                                                    foreach($sementara as $sem){ $oberkas_sementara = $sem->orig_name; 
                                                    $rberkas_sementara = $sem->nama_file; 
                                                            }
                                                    
                                                                                                                                     
                                                    ?>
                                                    
                                                    <form class="form" method="post" action="<?php echo base_url().'mahasiswa/post_berkas/sempro';?>" enctype="multipart/form-data">
													<br>
                            
                                                    <?php if($oberkas_sementara != null) {
                                                    echo "Berkas Yang Disimpan Sementara : <a href='". base_url('berkas_mahasiswa/'.$rberkas_sementara)."'>".$rberkas_sementara."</a>";
                                                        
                                                    echo "<input type='hidden' name='berkas_old' value='". $rberkas_sementara."' >";
                                                    
                                                    } ?>
                                                        
													<input type="file" name="berkas" <?php 
    if($jumlah_izin_new < $jlh_penguji) {echo "disabled";}  
                                                           ?>>
                                                    <button type="submit" class="btn btn-warning" name="simpan" value="simpan_sementara" 
                                                            <?php 
    if($jumlah_izin_new < $jlh_penguji) {echo "disabled";} 
                                                            ?>>
													Simpan Sementara</button>
													<button type="submit" class="btn btn-success" name="submit" value="submit" OnClick="return confirm('Yakin Berkas Ini Sudah Benar? Anda tidak akan dapat mengeditnya lagi')" 
                                                            <?php
    if($jumlah_izin_new < $jlh_penguji) {echo "disabled";}  
                                                            ?>>
													Submit</button>
													</form><?php } ?>
                                                    
                                                       <div class="table-responsive">
											<table class="table no-margin">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama File</th>
														<th>Tanggal Upload</th>
														
													</tr>
												</thead>
												<tbody>
                                                    
													<?php 
												    $no = 1;
                                                    if($berkas != NULL) {
													foreach($berkas as $o)
														{
                                                            $orderdate = explode('-', $o->tgl_upload);
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

															echo "<tr>
																<td>$no</td>
																<td><a href='". base_url('berkas_mahasiswa/'.$o->nama_file)."'>".$o->orig_name."</a></td>
																<td>".$tanggals." ".$bulan." ".$tahun."</td>
															</tr>";
															$no++;
														}
                                                    } else { echo "<tr><td colspan='3'><center>No Data Available</center></td></tr>";}
													?>
													
												</tbody>
											</table>
										</div>

												</div><!--end .card-body -->
											</article>
										</div><!--end .col -->
										<!-- END BLOG POST TEXT -->

										<!-- BEGIN MENUBAR -->
										<div class="col-md-3">
											<?php $this->load->view('templates/mahasiswa/templates/menubar.php') ?>
										</div><!--end .col -->
										<!-- END MENUBAR -->

									</div><!--end .row -->
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
