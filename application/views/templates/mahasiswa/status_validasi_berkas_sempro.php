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
							<?php if($detail == 1) { ?>						
													<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table no-margin">
											
												<thead>
													<tr>

														<th>No</th>
														<th>Judul</th>
														<th>Tanggal Pengajuan</th>
														<th>Status Validasi Berkas</th>
													</tr>
												</thead>
												<tbody>
													<?php 
													
													$no = 1;
													foreach($data as $d)
														{

														if($berkas == 1)
														{
															echo "<tr>
																<td>$no</td>
																<td>$d->judul</td>
																<td>$d->tgl_pengajuan</td>
																<td>". anchor('mahasiswa/show_validasi_berkas_sempro/'.$d->id,'<button type="button" class="btn btn-success">Lihat</button>') ."
                                                                ". anchor('mahasiswa/form_validasi_berkas_sempro/'. $d->id,'<button type="button" class="btn btn-warning">Cetak</button>')."</td>
															</tr>";
														}

														else if($berkas == 2)
														{
															echo "<tr>
																<td>$no</td>
																<td>$d->judul</td>
																<td>$d->tgl_pengajuan</td>
																<td>". anchor('mahasiswa/show_validasi_berkas_semhas/'.$d->id,'<button type="button" class="btn btn-info">Lihat</button>') ." ".anchor('mahasiswa/form_validasi_berkas_semhas/'. $d->id,'<button type="button" class="btn btn-warning">Cetak</button>') ." </td>
															</tr>";
														}

														else if($berkas == 3)
														{
															echo "<tr>
																<td>$no</td>
																<td>$d->judul</td>
																<td>$d->tgl_pengajuan</td>
																<td>". anchor('mahasiswa/show_validasi_berkas_sidang/'.$d->id,'<button type="button" class="btn btn-info">Lihat</button>') ."
                                                                ".anchor('mahasiswa/form_validasi_berkas_sidang/'. $d->id,'<button type="button" class="btn btn-warning">Cetak</button>') ." </td>
															</tr>";
														}

														else if($berkas == 4)
														{
															echo "<tr>
																<td>$no</td>
																<td>$d->judul</td>
																<td>$d->tgl_pengajuan</td>
																<td>". anchor('mahasiswa/show_validasi_berkas_penggandaan/'.$d->id,'<button type="button" class="btn btn-info">Lihat</button>') ."
                                                                ".anchor('mahasiswa/form_validasi_berkas_penggandaan/'. $d->id,'<button type="button" class="btn btn-warning">Cetak</button>') ." </td>
															</tr>";
														}
															
															$no++;
														}

														

													?>
													
												</tbody>
												
											</table>
										</div><!--end .table-responsive -->
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
<?php } else { 

if($berkas == 1)
{

foreach($data as $d) {
	$judul = $d->judul;
	$id = $d->id;
	$tgl = $d->tgl_pengajuan;
	$id_pengajuan_judul = $d->id_pengajuan_judul;
	$fotokopi_krs = $d->fotokopi_krs;
	$fotokopi_kelunasan_spp = $d->fotokopi_kelunasan_spp;
	$lembar_kendali_prasempro = $d->lembar_kendali_prasempro;
}
}

else if($berkas == 2)
{
foreach($data as $d) {
	$judul = $d->judul;
	$id = $d->id;
	$tgl = $d->tgl_pengajuan;
	$id_pengajuan_judul = $d->id_pengajuan_judul;
	$fotokopi_krs = $d->fotokopi_krs;
	$fotokopi_kelunasan_spp = $d->fotokopi_kelunasan_spp;
	$lembar_kendali_prasemhas = $d->lembar_kendali_prasemhas;
	$fotokopi_sk_dopim = $d->fotokopi_sk_dopim;
	}
}

else if($berkas == 3)
{
foreach($data as $d) {
	$judul = $d->judul;
	$id = $d->id;
	$tgl = $d->tgl_pengajuan;
	$id_pengajuan_judul = $d->id_pengajuan_judul;
	$fotokopi_krs = $d->fotokopi_krs;
	$fotokopi_slip_spp = $d->fotokopi_slip_spp;
	$lembar_kendali_prasidang = $d->lembar_kendali_prasidang;
	$sk_dopim = $d->sk_dopim;
	$buku_bimbingan = $d->buku_bimbingan;
	$kartu_kemajuan_mahasiswa = $d->kartu_kemajuan_mahasiswa;
	$draf_jurnal = $d->draf_jurnal;
	}
}

else if($berkas == 4)
{
foreach($data as $d) {
	$judul = $d->judul;
	$id = $d->id;
	$tgl = $d->tgl_pengajuan;
	$id_pengajuan_judul = $d->id_pengajuan_judul;
	$cd_kode_jurnal = $d->cd_kode_jurnal;
	$form_persetujuan = $d->form_persetujuan;
	$fotokopi_bebas = $d->fotokopi_bebas;
}

}


 ?>

<h4><strong>Judul : <?= $judul ?></strong></h4>
<h5 class="text-light">Tanggal Pengajuan: <?= $tgl ?></h5>
<div class="row">


											<div class="col-xs-12">
												<table border='1' width="100%">
													<thead>
														<th width="5%"><center>No</center></th>
														<th width="75%"><center>BERKAS</center></th>
														<th width="20%"><center>PETUGAS</center></th>
													</thead>
													<tbody>
													<?php if($berkas == 1 ){ ?>
														<tr height="50px">
															<td><center>1</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Fotokopi KRS/KHS mahasiswa (awal-akhir/berjalan)</td>
															<td><center><?php if($fotokopi_krs == 'unchecked') { echo "<i class='md md-clear'></i>"; } 
															else if($fotokopi_krs == 'checked') {echo "<i class='md md-check'></i>";} else{ echo "";} ?></center></td>
														</tr>

														<tr height="50px">
															<td><center>2</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Fotokopi tanda lunas SPP awal-SPP akhir (semester berjalan)</td>
															<td><center><?php if($fotokopi_kelunasan_spp == 'unchecked') { echo "<i class='md md-clear'></i>"; } 
															else if($fotokopi_kelunasan_spp == 'checked') {echo "<i class='md md-check'></i>";} else{ echo "";} ?></center></td>
														</tr>

														<tr height="50px">
															<td><center>3</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Lembar kendali Pra-Seminar Proposal (Form 1-A)</td>
															<td><center><?php if($lembar_kendali_prasempro == 'unchecked') { echo "<i class='md md-clear'></i>"; } 
															else if($lembar_kendali_prasempro == 'checked') {echo "<i class='md md-check'></i>";} else{ echo "";} ?></center></td>
														</tr>
													<?php } else if($berkas == 2) { ?>
													<tr height="50px">
															<td><center>1</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Fotokopi KRS/KHS mahasiswa (awal-akhir/berjalan)</td>
															<td><center><?php if($fotokopi_krs == 'unchecked') { echo "<i class='md md-clear'></i>"; } 
															else if($fotokopi_krs == 'checked') {echo "<i class='md md-check'></i>";} else{ echo "";} ?></center></td>
														</tr>

														<tr height="50px">
															<td><center>3</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Fotokopi SK Dosen Pembimbing Skripsi</td>
															<td><center><?php if($fotokopi_sk_dopim == 'unchecked') { echo "<i class='md md-clear'></i>"; } 
															else if($fotokopi_sk_dopim == 'checked') {echo "<i class='md md-check'></i>";} else{ echo "";} ?></center></td>
														</tr>

														<tr height="50px">
															<td><center>3</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Fotokopi tanda lunas SPP awal-SPP akhir (semester berjalan)</td>
															<td><center><?php if($fotokopi_kelunasan_spp == 'unchecked') { echo "<i class='md md-clear'></i>"; } 
															else if($fotokopi_kelunasan_spp == 'checked') {echo "<i class='md md-check'></i>";} else{ echo "";} ?></center></td>
														</tr>

														<tr height="50px">
															<td><center>4</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Lembar kendali Pra-Seminar Hasil (Form 1-B)</td>
															<td><center><?php if($lembar_kendali_prasemhas == 'unchecked') { echo "<i class='md md-clear'></i>"; } 
															else if($lembar_kendali_prasemhas == 'checked') {echo "<i class='md md-check'></i>";} else{ echo "";} ?></center></td>
														</tr>

													<?php } else if($berkas == 3) { ?>

														<tr height="50px">
															<td><center>1</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Buku bimbingan skripsi</td>
															<td><center><?php if($buku_bimbingan == 'unchecked') { echo "<i class='md md-clear'></i>"; } 
															else if($buku_bimbingan == 'checked') {echo "<i class='md md-check'></i>";} else{ echo "";} ?></center></td>
														</tr>

														<tr height="50px">
															<td><center>2</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Kartu kemajuan mahasiswa</td>
															<td><center><?php if($kartu_kemajuan_mahasiswa == 'unchecked') { echo "<i class='md md-clear'></i>"; } 
															else if($kartu_kemajuan_mahasiswa == 'checked') {echo "<i class='md md-check'></i>";} else{ echo "";} ?></center></td>
														</tr>

														<tr height="50px">
															<td><center>3</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Lembar kendali Pra-Sidang Meja Hijau (Form 1-C)</td>
															<td><center><?php if($lembar_kendali_prasidang == 'unchecked') { echo "<i class='md md-clear'></i>"; } 
															else if($lembar_kendali_prasidang == 'checked') {echo "<i class='md md-check'></i>";} else{ echo "";} ?></center></td>
														</tr>

														<tr height="50px">
															<td><center>4</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Draf Jurnal</td>
															<td><center><?php if($draf_jurnal == 'unchecked') { echo "<i class='md md-clear'></i>"; } 
															else if($draf_jurnal == 'checked') {echo "<i class='md md-check'></i>";} else{ echo "";} ?></center></td>
														</tr>


														<tr height="50px">
															<td><center>5</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Fotokopi KRS dan KHS semester awal-akhir</td>
															<td><center><?php if($fotokopi_krs == 'unchecked') { echo "<i class='md md-clear'></i>"; } 
															else if($fotokopi_krs == 'checked') {echo "<i class='md md-check'></i>";} else{ echo "";} ?></center></td>
														</tr>

														<tr height="50px">
															<td><center>6</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Fotokopi slip SPP Awal sampai Akhir</td>
															<td><center><?php if($fotokopi_slip_spp == 'unchecked') { echo "<i class='md md-clear'></i>"; } 
															else if($fotokopi_slip_spp == 'checked') {echo "<i class='md md-check'></i>";} else{ echo "";} ?></center></td>
														</tr>

														<tr height="50px">
															<td><center>7</center></td>
															<td style="padding-left: 5px; padding-right: 5px">SK dosen pembimbing</td>
															<td><center><?php if($sk_dopim == 'unchecked') { echo "<i class='md md-clear'></i>"; } 
															else if($sk_dopim == 'checked') {echo "<i class='md md-check'></i>";} else{ echo "";} ?></center></td>
														</tr>


													<?php } else if($berkas == 4) { ?>

													<tr height="50px">
															<td><center>1</center></td>
															<td style="padding-left: 5px; padding-right: 5px">CD skripsi + kode sumber aplikasi + jurnal</td>
															<td><center><?php if($cd_kode_jurnal == 'unchecked') { echo "<i class='md md-clear'></i>"; } 
															else if($cd_kode_jurnal == 'checked') {echo "<i class='md md-check'></i>";} else{ echo "";} ?></center></td>
														</tr>

														<tr height="50px">
															<td><center>2</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Form persetujuan penggandaan skripsi </td>
															<td><center><?php if($form_persetujuan == 'unchecked') { echo "<i class='md md-clear'></i>"; } 
															else if($form_persetujuan == 'checked') {echo "<i class='md md-check'></i>";} else{ echo "";} ?></center></td>
														</tr>

														<tr height="50px">
															<td><center>3</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Fotokopi bebas pustaka USU dan Fasilkom-TI = 1 lembar</td>
															<td><center><?php if($fotokopi_bebas == 'unchecked') { echo "<i class='md md-clear'></i>"; } 
															else if($fotokopi_bebas == 'checked') {echo "<i class='md md-check'></i>";} else{ echo "";} ?></center></td>
														</tr>

													<?php } ?>
													</tbody>
												</table>

											</div><!--end .col -->
										</div>
										<br><br>
											<h4>Notes: </h4>
										<h5>Jika belum ada tanda checklist atau silang, berkas belum dilakukan validasi oleh petugas</h5>
										<p><i class="md md-check"></i> Berkas telah divalidasi</p>
										<p><i class="md md-clear"></i> Berkas telah divalidasi, tetapi ditolak. Silahkan mensubmit kembali berkas yang ditolak</p>
										<?php } ?>

									
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
