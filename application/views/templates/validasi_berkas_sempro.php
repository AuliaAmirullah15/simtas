<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<?php 
		if(!isset($_SESSION['username']))
		{
			redirect('tugas/login');
		}
	?>
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
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990');?>" />
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed ">

		<!-- BEGIN HEADER-->
			<?php $this->load->view('main_templates/header') ?>
		<?php error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);?>
		<!-- END HEADER-->

		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
			<div id="content">
			<?php if($message != '' AND $message != null) {

				if($message == 'Data Gagal Divalidasi')
				{
					echo "
						
							

					<div class=\"section-body\">
						<div class=\"alert alert-danger\" role=\"alert\">
							<strong>Maaf! </strong>".$message."</div>"; 
				}
				
				else {
								echo "
						
							

					<div class=\"section-body\">
						<div class=\"alert alert-success\" role=\"alert\">
							<strong>Selamat! </strong>".$message."</div>"; 
						}} ?>
				<?php if($number == '2') { ?>
				<ol class="breadcrumb">
											<li><a href="<?php echo base_url('tugas/'.$link);?>"><?= $crumb ?></a></li>
											<li class="active"><?= $judul; ?></li>
										</ol>
				<?php } ?>
				<section class="style-default-bright">
					<div class="section-header">

						<h2 class="text-primary"><?= $judul ?></h2>
					</div>
					<div class="section-body">
					

						<!-- BEGIN DATATABLE 1 -->
						<div class="row">
				


							<div class="col-md-8">
								<article class="margin-bottom-xxl">
									<p class="lead">
										
					
									</p>
								</article>
							</div><!--end .col -->
						</div><!--end .row -->
						<div class="row">
					
					<?php if($number == 1) { ?>
							<div class="col-lg-12">
								<div class="table-responsive">
									<table id="datatable1" class="table table-striped table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th class="sort-numeric">Tanggal Pengajuan Judul</th>
												<th class="sprt-alpha">NIM</th>
												<th>Judul</th>
												<th>Jenis TA</th>
												<th>Status Pengecekan</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<!-- content of table -->
												<?php 

													$no = 1;
													foreach($data as $u){ 

														if($berkas == 1) {
												?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $u->tgl_pengajuan ?></td>
													<td><?php echo $u->nim ?></td>
													<td><?php echo $u->judul ?></td>
													<td><?php echo $u->jenis_TA ?></td>

													<?php if($u->fotokopi_krs == 'belum dikonfirmasi') { ?>
													<td style="color: #F44336"><strong>BELUM DICEK</strong></td>

													<?php } else if($u->fotokopi_kelunasan_spp == 'belum_dikonfirmasi') { ?>
													<td style="color: #F44336"><strong>BELUM DICEK</strong></td>

													<?php } else if($u->lembar_kendali_prasempro == 'belum dikonfirmasi') { ?>
													<td style="color: #F44336"><strong>BELUM DICEK</strong></td>

													<?php } else { ?>
													<td style="color: #4CAF50"><strong>SUDAH DICEK</strong></td>
													<?php } ?>
													<td><?php echo anchor('tugas/update_validasi_berkas_sempro/'.$u->id."/next",'<button type="button" class="btn btn-info">Edit</button>'); ?></td>
												</tr>
												<?php } else if($berkas == 2) { ?>

												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $u->tgl_pengajuan ?></td>
													<td><?php echo $u->nim ?></td>
													<td><?php echo $u->judul ?></td>
													<td><?php echo $u->jenis_TA ?></td>

													<?php if($u->fotokopi_krs == 'belum dikonfirmasi') { ?>
													<td style="color: #F44336"><strong>BELUM DICEK</strong></td>

													<?php } else if($u->fotokopi_kelunasan_spp == 'belum_dikonfirmasi') { ?>
													<td style="color: #F44336"><strong>BELUM DICEK</strong></td>

													<?php } else if($u->lembar_kendali_prasemhas == 'belum dikonfirmasi') { ?>
													<td style="color: #F44336"><strong>BELUM DICEK</strong></td>

													<?php } else if($u->fotokopi_sk_dopim == 'belum dikonfirmasi') { ?>
													<td style="color: #F44336"><strong>BELUM DICEK</strong></td>

													<?php } else { ?>
													<td style="color: #4CAF50"><strong>SUDAH DICEK</strong></td>
													<?php } ?>
													<td><?php echo anchor('tugas/update_validasi_berkas_semhas/'.$u->id."/next",'<button type="button" class="btn btn-info">Edit</button>'); ?></td>
												</tr>

												<?php } else if($berkas == 3) { ?>

												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $u->tgl_pengajuan ?></td>
													<td><?php echo $u->nim ?></td>
													<td><?php echo $u->judul ?></td>
													<td><?php echo $u->jenis_TA ?></td>

													<?php if($u->fotokopi_krs == 'belum dikonfirmasi') { ?>
													<td style="color: #F44336"><strong>BELUM DICEK</strong></td>

													<?php } else if($u->fotokopi_slip_spp == 'belum_dikonfirmasi') { ?>
													<td style="color: #F44336"><strong>BELUM DICEK</strong></td>

													<?php } else if($u->lembar_kendali_prasidang == 'belum dikonfirmasi') { ?>
													<td style="color: #F44336"><strong>BELUM DICEK</strong></td>

													<?php } else if($u->sk_dopim == 'belum dikonfirmasi') { ?>
													<td style="color: #F44336"><strong>BELUM DICEK</strong></td>

													<?php } else if($u->buku_bimbingan == 'belum dikonfirmasi') { ?>
													<td style="color: #F44336"><strong>BELUM DICEK</strong></td>

													<?php } else if($u->kartu_kemajuan_mahasiswa == 'belum dikonfirmasi') { ?>
													<td style="color: #F44336"><strong>BELUM DICEK</strong></td>

													<?php } else if($u->draf_jurnal == 'belum dikonfirmasi') { ?>
													<td style="color: #F44336"><strong>BELUM DICEK</strong></td>

													<?php } else { ?>
													<td style="color: #4CAF50"><strong>SUDAH DICEK</strong></td>
													<?php } ?>
													<td><?php echo anchor('tugas/update_validasi_berkas_sidang/'.$u->id."/next",'<button type="button" class="btn btn-info">Edit</button>'); ?></td>
												</tr>


												<?php } else if($berkas == 4) { ?>

												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $u->tgl_pengajuan ?></td>
													<td><?php echo $u->nim ?></td>
													<td><?php echo $u->judul ?></td>
													<td><?php echo $u->jenis_TA ?></td>

													<?php if($u->cd_kode_jurnal == 'belum dikonfirmasi') { ?>
													<td style="color: #F44336"><strong>BELUM DICEK</strong></td>

													<?php } else if($u->form_persetujuan == 'belum_dikonfirmasi') { ?>
													<td style="color: #F44336"><strong>BELUM DICEK</strong></td>

													<?php } else if($u->fotokopi_bebas == 'belum dikonfirmasi') { ?>
													<td style="color: #F44336"><strong>BELUM DICEK</strong></td>

													<?php } else { ?>
													<td style="color: #4CAF50"><strong>SUDAH DICEK</strong></td>
													<?php } ?>
													<td><?php echo anchor('tugas/update_validasi_penggandaan_skripsi/'.$u->id."/next",'<button type="button" class="btn btn-info">Edit</button>'); ?></td>
												</tr>

												<?php } } ?>


										<!-- End of content of table -->
										</tbody>
									</table >
									
								</div><!--end .table-responsive -->
							</div><!--end .col -->
						<?php } else { 
							if($berkas == 1) {

							foreach($data as $d) {
							$id = $d->id;
							$fotokopi_krs = $d->fotokopi_krs;
							$fotokopi_kelunasan_spp = $d->fotokopi_kelunasan_spp;
							$lembar_kendali_prasempro = $d->lembar_kendali_prasempro;
							} 

							 ?>

						<form class="form-horizontal" method="post" action="<?php echo base_url().'tugas/update_proses_berkas_sempro/'.$id;?>">
											<div class="col-xs-12">
												<table border='1' width="100%">
													<thead>
														<th width="5%"><center>No</center></th>
														<th width="75%"><center>BERKAS</center></th>
														<th width="20%"><center>PETUGAS</center></th>
													</thead>
													<tbody>
														<tr height="50px">
															<td><center>1</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Fotokopi KRS/KHS mahasiswa (awal-akhir/berjalan)</td>
															<td style="padding-left: 10px;padding-right: 10px;"><select style="background-color: #e5e5e5;" class="form-control" id="fotokopi_krs" name="fotokopi_krs" >
																	<option value='belum dikonfirmasi' <?php if($fotokopi_krs == 'belum_dikonfirmasi') {echo "selected = 'selected'";}?> >Belum Dikonfirmasi</option>
																	<option value='checked' <?php if($fotokopi_krs == 'checked') {echo "selected = 'selected'";}?>>Diterima</option>
																	<option value='unchecked' <?php if($fotokopi_krs == 'unchecked') {echo "selected = 'selected'";}?>>Ditolak</option>
															</select></td>
														</tr>

														<tr height="50px">
															<td><center>2</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Fotokopi tanda lunas SPP awal-SPP akhir (semester berjalan)</td>
															<td style="padding-left: 10px;padding-right: 10px;"><select style="background-color: #e5e5e5;" class="form-control" id="fotokopi_kelunasan_spp" name="fotokopi_kelunasan_spp" >
																	<option value='belum dikonfirmasi' <?php if($fotokopi_kelunasan_spp == 'belum_dikonfirmasi') {echo "selected = 'selected'";}?>>Belum Dikonfirmasi</option>
																	<option value='checked' <?php if($fotokopi_kelunasan_spp == 'checked') {echo "selected = 'selected'";}?>>Diterima</option>
																	<option value='unchecked' <?php if($fotokopi_kelunasan_spp == 'unchecked') {echo "selected = 'selected'";}?>>Ditolak</option>
															</select></td>
														</tr>

														<tr height="50px">
															<td><center>3</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Lembar kendali Pra-Seminar Proposal (Form 1-A)</td>
															<td style="padding-left: 10px;padding-right: 10px;"><select style="background-color: #e5e5e5;" class="form-control" id="lembar_kendali_prasempro" name="lembar_kendali_prasempro" >
																	<option value='belum dikonfirmasi' <?php if($lembar_kendali_prasempro== 'belum_dikonfirmasi') {echo "selected = 'selected'";}?>>Belum Dikonfirmasi</option>
																	<option value='checked' <?php if($lembar_kendali_prasempro== 'checked') {echo "selected = 'selected'";}?>>Diterima</option>
																	<option value='unchecked' <?php if($lembar_kendali_prasempro== 'unchecked') {echo "selected = 'selected'";}?>>Ditolak</option>
															</select></td>
														</tr>

													</tbody>
												</table>
												<div class="card-actionbar">
											<div class="card-actionbar-row">
												<button type="submit" class="btn btn-flat btn-primary ink-reaction" value="save">Save</button>
											</div>
										</div>
											</div><!--end .col -->
										</div>
										<br><br>
						</form>
						<?php } else if($berkas == 2) { 


							
							foreach($data as $d) {
							$id = $d->id;
							$fotokopi_krs = $d->fotokopi_krs;
							$fotokopi_kelunasan_spp = $d->fotokopi_kelunasan_spp;
							$lembar_kendali_prasemhas = $d->lembar_kendali_prasemhas;
							$fotokopi_sk_dopim = $d->fotokopi_sk_dopim;
							}
							?>

						<form class="form-horizontal" method="post" action="<?php echo base_url().'tugas/update_proses_berkas_semhas/'.$id;?>">
											<div class="col-xs-12">
												<table border='1' width="100%">
													<thead>
														<th width="5%"><center>No</center></th>
														<th width="75%"><center>BERKAS</center></th>
														<th width="20%"><center>PETUGAS</center></th>
													</thead>
													<tbody>
														<tr height="50px">
															<td><center>1</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Fotokopi KRS/KHS mahasiswa (awal-akhir/berjalan)</td>
															<td style="padding-left: 10px;padding-right: 10px;"><select style="background-color: #e5e5e5;" class="form-control" id="fotokopi_krs" name="fotokopi_krs" >
																	<option value='belum dikonfirmasi' <?php if($fotokopi_krs == 'belum_dikonfirmasi') {echo "selected = 'selected'";}?> >Belum Dikonfirmasi</option>
																	<option value='checked' <?php if($fotokopi_krs == 'checked') {echo "selected = 'selected'";}?>>Diterima</option>
																	<option value='unchecked' <?php if($fotokopi_krs == 'unchecked') {echo "selected = 'selected'";}?>>Ditolak</option>
															</select></td>
														</tr>

														<tr height="50px">
															<td><center>2</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Fotokopi SK Dosen Pembimbing Skripsi</td>
															<td style="padding-left: 10px;padding-right: 10px;"><select style="background-color: #e5e5e5;" class="form-control" id="fotokopi_sk_dopim" name="fotokopi_sk_dopim" >
																	<option value='belum dikonfirmasi' <?php if($fotokopi_sk_sopim == 'belum_dikonfirmasi') {echo "selected = 'selected'";}?>>Belum Dikonfirmasi</option>
																	<option value='checked' <?php if($fotokopi_sk_dopim == 'checked') {echo "selected = 'selected'";}?>>Diterima</option>
																	<option value='unchecked' <?php if($fotokopi_sk_dopim == 'unchecked') {echo "selected = 'selected'";}?>>Ditolak</option>
															</select></td>
														</tr>

														<tr height="50px">
															<td><center>3</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Fotokopi tanda lunas SPP awal-SPP akhir (semester berjalan)</td>
															<td style="padding-left: 10px;padding-right: 10px;"><select style="background-color: #e5e5e5;" class="form-control" id="fotokopi_kelunasan_spp" name="fotokopi_kelunasan_spp" >
																	<option value='belum dikonfirmasi' <?php if($fotokopi_kelunasan_spp == 'belum_dikonfirmasi') {echo "selected = 'selected'";}?>>Belum Dikonfirmasi</option>
																	<option value='checked' <?php if($fotokopi_kelunasan_spp == 'checked') {echo "selected = 'selected'";}?>>Diterima</option>
																	<option value='unchecked' <?php if($fotokopi_kelunasan_spp == 'unchecked') {echo "selected = 'selected'";}?>>Ditolak</option>
															</select></td>
														</tr>

														<tr height="50px">
															<td><center>4</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Lembar kendali Pra-Seminar Hasil (Form 1-B)</td>
															<td style="padding-left: 10px;padding-right: 10px;"><select style="background-color: #e5e5e5;" class="form-control" id="lembar_kendali_prasemhas" name="lembar_kendali_prasemhas" >
																	<option value='belum dikonfirmasi' <?php if($lembar_kendali_prasemhas== 'belum_dikonfirmasi') {echo "selected = 'selected'";}?>>Belum Dikonfirmasi</option>
																	<option value='checked' <?php if($lembar_kendali_prasemhas== 'checked') {echo "selected = 'selected'";}?>>Diterima</option>
																	<option value='unchecked' <?php if($lembar_kendali_prasemhas== 'unchecked') {echo "selected = 'selected'";}?>>Ditolak</option>
															</select></td>
														</tr>

													</tbody>
												</table>
												<div class="card-actionbar">
											<div class="card-actionbar-row">
												<button type="submit" class="btn btn-flat btn-primary ink-reaction" value="save">Save</button>
											</div>
										</div>
											</div><!--end .col -->
										</div>
										<br><br>
						</form>

						<?php } else if($berkas == 3) {

							foreach($data as $d)
							{
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

						 ?>

							<form class="form-horizontal" method="post" action="<?php echo base_url().'tugas/update_proses_berkas_sidang/'.$id;?>">
											<div class="col-xs-12">
												<table border='1' width="100%">
													<thead>
														<th width="5%"><center>No</center></th>
														<th width="75%"><center>BERKAS</center></th>
														<th width="20%"><center>PETUGAS</center></th>
													</thead>
													<tbody>
														<tr height="50px">
															<td><center>1</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Buku bimbingan skripsi</td>
															<td style="padding-left: 10px;padding-right: 10px;"><select style="background-color: #e5e5e5;" class="form-control" id="buku_bimbingan" name="buku_bimbingan" >
																	<option value='belum dikonfirmasi' <?php if($buku_bimbingan == 'belum_dikonfirmasi') {echo "selected = 'selected'";}?> >Belum Dikonfirmasi</option>
																	<option value='checked' <?php if($buku_bimbingan == 'checked') {echo "selected = 'selected'";}?>>Diterima</option>
																	<option value='unchecked' <?php if($buku_bimbingan == 'unchecked') {echo "selected = 'selected'";}?>>Ditolak</option>
															</select></td>
														</tr>

														<tr height="50px">
															<td><center>2</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Kartu Kemajuan Mahasiswa</td>
															<td style="padding-left: 10px;padding-right: 10px;"><select style="background-color: #e5e5e5;" class="form-control" id="kartu_kemajuan_mahasiswa" name="kartu_kemajuan_mahasiswa" >
																	<option value='belum dikonfirmasi' <?php if($kartu_kemajuan_mahasiswa == 'belum_dikonfirmasi') {echo "selected = 'selected'";}?> >Belum Dikonfirmasi</option>
																	<option value='checked' <?php if($kartu_kemajuan_mahasiswa == 'checked') {echo "selected = 'selected'";}?>>Diterima</option>
																	<option value='unchecked' <?php if($kartu_kemajuan_mahasiswa == 'unchecked') {echo "selected = 'selected'";}?>>Ditolak</option>
															</select></td>
														</tr>

														<tr height="50px">
															<td><center>3</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Lembar kendali Pra-Sidang Meja Hijau (Form 1-C)</td>
															<td style="padding-left: 10px;padding-right: 10px;"><select style="background-color: #e5e5e5;" class="form-control" id="lembar_kendali_prasidang" name="lembar_kendali_prasidang" >
																	<option value='belum dikonfirmasi' <?php if($lembar_kendali_prasidang == 'belum_dikonfirmasi') {echo "selected = 'selected'";}?> >Belum Dikonfirmasi</option>
																	<option value='checked' <?php if($lembar_kendali_prasidang == 'checked') {echo "selected = 'selected'";}?>>Diterima</option>
																	<option value='unchecked' <?php if($lembar_kendali_prasidang == 'unchecked') {echo "selected = 'selected'";}?>>Ditolak</option>
															</select></td>
														</tr>

														<tr height="50px">
															<td><center>4</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Draf Jurnal</td>
															<td style="padding-left: 10px;padding-right: 10px;"><select style="background-color: #e5e5e5;" class="form-control" id="draf_jurnal" name="draf_jurnal" >
																	<option value='belum dikonfirmasi' <?php if($draf_jurnal == 'belum_dikonfirmasi') {echo "selected = 'selected'";}?> >Belum Dikonfirmasi</option>
																	<option value='checked' <?php if($draf_jurnal == 'checked') {echo "selected = 'selected'";}?>>Diterima</option>
																	<option value='unchecked' <?php if($draf_jurnal == 'unchecked') {echo "selected = 'selected'";}?>>Ditolak</option>
															</select></td>
														</tr>

														<tr height="50px">
															<td><center>5</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Fotokopi KRS dan KHS semester awal-akhir </td>
															<td style="padding-left: 10px;padding-right: 10px;"><select style="background-color: #e5e5e5;" class="form-control" id="fotokopi_krs" name="fotokopi_krs" >
																	<option value='belum dikonfirmasi' <?php if($fotokopi_krs == 'belum_dikonfirmasi') {echo "selected = 'selected'";}?> >Belum Dikonfirmasi</option>
																	<option value='checked' <?php if($fotokopi_krs == 'checked') {echo "selected = 'selected'";}?>>Diterima</option>
																	<option value='unchecked' <?php if($fotokopi_krs == 'unchecked') {echo "selected = 'selected'";}?>>Ditolak</option>
															</select></td>
														</tr>

														<tr height="50px">
															<td><center>6</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Fotokopi slip SPP Awal sampai Akhir</td>
															<td style="padding-left: 10px;padding-right: 10px;"><select style="background-color: #e5e5e5;" class="form-control" id="fotokopi_slip_spp" name="fotokopi_slip_spp" >
																	<option value='belum dikonfirmasi' <?php if($fotokopi_slip_spp == 'belum_dikonfirmasi') {echo "selected = 'selected'";}?>>Belum Dikonfirmasi</option>
																	<option value='checked' <?php if($fotokopi_slip_spp == 'checked') {echo "selected = 'selected'";}?>>Diterima</option>
																	<option value='unchecked' <?php if($fotokopi_slip_spp == 'unchecked') {echo "selected = 'selected'";}?>>Ditolak</option>
															</select></td>
														</tr>

														<tr height="50px">
															<td><center>7</center></td>
															<td style="padding-left: 5px; padding-right: 5px">SK Dosen Pembimbing</td>
															<td style="padding-left: 10px;padding-right: 10px;"><select style="background-color: #e5e5e5;" class="form-control" id="sk_dopim" name="sk_dopim" >
																	<option value='belum dikonfirmasi' <?php if($sk_dopim == 'belum_dikonfirmasi') {echo "selected = 'selected'";}?>>Belum Dikonfirmasi</option>
																	<option value='checked' <?php if($sk_dopim == 'checked') {echo "selected = 'selected'";}?>>Diterima</option>
																	<option value='unchecked' <?php if($sk_dopim == 'unchecked') {echo "selected = 'selected'";}?>>Ditolak</option>
															</select></td>
														</tr>

													
													</tbody>
												</table>
												<div class="card-actionbar">
											<div class="card-actionbar-row">
												<button type="submit" class="btn btn-flat btn-primary ink-reaction" value="save">Save</button>
											</div>
										</div>
											</div><!--end .col -->
										</div>
										<br><br>
						</form>

						<?php } else if($berkas == 4) { 

							foreach($data as $d){
								$judul = $d->judul;
								$id = $d->id;
								$tgl = $d->tgl_pengajuan;
								$id_pengajuan_judul = $d->id_pengajuan_judul;
								$cd_kode_jurnal = $d->cd_kode_jurnal;
								$form_persetujuan = $d->form_persetujuan;
								$fotokopi_bebas = $d->fotokopi_bebas;
							}


							?>

							<form class="form-horizontal" method="post" action="<?php echo base_url().'tugas/update_proses_penggandaan_skripsi/'.$id;?>">
											<div class="col-xs-12">
												<table border='1' width="100%">
													<thead>
														<th width="5%"><center>No</center></th>
														<th width="75%"><center>BERKAS</center></th>
														<th width="20%"><center>PETUGAS</center></th>
													</thead>
													<tbody>
														<tr height="50px">
															<td><center>1</center></td>
															<td style="padding-left: 5px; padding-right: 5px">CD skripsi + kode sumber aplikasi + jurnal</td>
															<td style="padding-left: 10px;padding-right: 10px;"><select style="background-color: #e5e5e5;" class="form-control" id="cd_kode_jurnal" name="cd_kode_jurnal" >
																	<option value='belum dikonfirmasi' <?php if($cd_kode_jurnal == 'belum_dikonfirmasi') {echo "selected = 'selected'";}?> >Belum Dikonfirmasi</option>
																	<option value='checked' <?php if($cd_kode_jurnal == 'checked') {echo "selected = 'selected'";}?>>Diterima</option>
																	<option value='unchecked' <?php if($cd_kode_jurnal == 'unchecked') {echo "selected = 'selected'";}?>>Ditolak</option>
															</select></td>
														</tr>

														<tr height="50px">
															<td><center>2</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Form persetujuan penggandaan skripsi </td>
															<td style="padding-left: 10px;padding-right: 10px;"><select style="background-color: #e5e5e5;" class="form-control" id="form_persetujuan" name="form_persetujuan" >
																	<option value='belum dikonfirmasi' <?php if($form_persetujuan == 'belum_dikonfirmasi') {echo "selected = 'selected'";}?> >Belum Dikonfirmasi</option>
																	<option value='checked' <?php if($form_persetujuan == 'checked') {echo "selected = 'selected'";}?>>Diterima</option>
																	<option value='unchecked' <?php if($form_persetujuan == 'unchecked') {echo "selected = 'selected'";}?>>Ditolak</option>
															</select></td>
														</tr>

														<tr height="50px">
															<td><center>3</center></td>
															<td style="padding-left: 5px; padding-right: 5px">Fotokopi bebas pustaka USU dan Fasilkom-TI = 1 lembar</td>
															<td style="padding-left: 10px;padding-right: 10px;"><select style="background-color: #e5e5e5;" class="form-control" id="fotokopi_bebas" name="fotokopi_bebas" >
																	<option value='belum dikonfirmasi' <?php if($fotokopi_bebas == 'belum_dikonfirmasi') {echo "selected = 'selected'";}?> >Belum Dikonfirmasi</option>
																	<option value='checked' <?php if($fotokopi_bebas == 'checked') {echo "selected = 'selected'";}?>>Diterima</option>
																	<option value='unchecked' <?php if($fotokopi_bebas == 'unchecked') {echo "selected = 'selected'";}?>>Ditolak</option>
															</select></td>
														</tr>
													
													</tbody>
												</table>
												<div class="card-actionbar">
											<div class="card-actionbar-row">
												<button type="submit" class="btn btn-flat btn-primary ink-reaction" value="save">Save</button>
											</div>
										</div>
											</div><!--end .col -->
										</div>
										<br><br>
						</form>

						<?php } } ?>
						</div><!--end .row -->
						<!-- END DATATABLE 1 -->

						<hr class="ruler-xxl"/>

						

					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->

			<!-- BEGIN MENUBAR-->
				<?php $this->load->view('main_templates/menu_bar') ?>
			<!-- END MENUBAR -->

			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS RIGHT -->

		</div><!--end #base-->
		<!-- END BASE -->

		<!-- BEGIN JAVASCRIPT -->
		<script src="<?php echo base_url('assets/js/libs/jquery/jquery-1.11.2.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/libs/jquery/jquery-migrate-1.2.1.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/libs/bootstrap/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/libs/spin.js/spin.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/autosize/jquery.autosize.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/DataTables/jquery.dataTables.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/nanoscroller/jquery.nanoscroller.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/App.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppNavigation.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppOffcanvas.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppCard.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppForm.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppNavSearch.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppVendor.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/demo/Demo.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/demo/DemoTableDynamic.js');?>"></script>
		<!-- END JAVASCRIPT -->


	</body>
</html>
