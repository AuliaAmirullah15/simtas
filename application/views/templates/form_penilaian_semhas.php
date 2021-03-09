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
		.box {
			border: 3px solid black;
			width: 200px;
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
				$judul = $d->judul;
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
							<li class="active">Form Penilaian Seminar Hasil</li>
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
                                        <?php if($penilaian_semhas == '' or $penilaian_semhas == null) { ?>
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

						
											<div class="col-xs-12 text-center">
												<h4>FORM PENILAIN SEMINAR HASIL</h4>
											</div>
									

										<div class="row">
											<div class="col-xs-4">
												<h4 class="text-light">Nama</h4>
												<h4 class="text-light">NIM</h4>
												<h4 class="text-light">Judul</h4>
											</div>
											<div class="col-xs-8">
												<h4 class="text-light">: <?= $nama ?></h4>
												<h4 class="text-light">: <?= $nim ?></h4>
												<h4 class="text-light">: <?= $judul ?></h4>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-12">
												<table border='1' width="100%" style="font-size: 12px;">
													<thead>
														<tr>
															<td style="padding-left:5px;padding-right: 5px"><center><b>No</b></center></td>
															<td style="padding-left:5px;padding-right: 0px"><center><b>Kriteria Penilaian</b></center></td>
															<td style="padding-left:5px;padding-right: 5px"><center><b>Bobot</b></center></td>
															<td style="padding-left:5px;padding-right: 5px"><center><b>Nilai<br>Angka</b></center></td>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><center><b>1</b></center></td>
															<td><center><b>Abstrak</b></center></td>
															<td></td>
															<td></td>
														</tr>

														<tr>
															<td></td>
															<td style="padding-left:5px;padding-right: 0px"><ul>
																<li>Abstrak memiliki unsur rumusan masalah</li>
																<li>Abstrak memiliki unsur metodologi</li>
																<li>Abstrak memiliki unsur hasil penelitian</li>
																<li>Abstrak memiliki unsur kesimpulan</li>
																<li>Bahasa Inggris di dalam abstrak sudah sesuai dengan Bahasa Indonesia di dalam abstrak dan kaidah Bahasa Inggris yang benar</li>
																<li>Kata kunci mewakili isi dari tugas akhir</li>
															</ul></td>
															<td><center>0-3</center></td>
															<td></td>
														</tr>

														<tr>
															<td><center><b>2</b></center></td>
															<td><center><b>BAB I - PENDAHULUAN</b></center></td>
															<td></td>
															<td></td>
														</tr>

														<tr>
															<td></td>
															<td style="padding-left:5px;padding-right: 0px"><ul>
																<li>Rumusan masalah adalah masalah yang terjadi di dunia nyata atau masalah yang terdapat di bidang ilmu pengetahuan tersebut</li>
																<li>Tujuan penelitian yang ditulis mampu menyelesaikan rumusan masalah</li>
																<li>Batasan masalah relevan dengan penelitian</li>
																<li>Hubungan latar belakang dengan rumusan masalah</li>
																<li>Batasan masalah berisi batasan penelitian yang dilakukan</li>
															</ul></td>
															<td><center>0-10</center></td>
															<td></td>
														</tr>

														<tr>
															<td><center><b>3</b></center></td>
															<td><center><b>BAB II - Landasan Teori</b></center></td>
															<td></td>
															<td></td>
														</tr>

														<tr>
															<td></td>
															<td style="padding-left:5px;padding-right: 0px"><ul>
																<li>Landasan teori membahas hal-hal spesifik yang berhubungan dengan metodologi</li>
																<li>Setiap kutipan termasuk gambar dan tabel yang tidak dibuat oleh penulis harus memiliki referensi</li>
																<li>Referensi yang diletakkan di skripsi tercantum di daftar pustaka</li>
																<li>Jurnal internasional dimasukkan di dalam daftar pustaka (minimal 2 artikel)</li>
																<li>Paper konferensi internasional dimasukkan di dalam daftar pustaka (minimal 5 artikel)</li>
																<li>Penelitian terdahulu yang berhubungan dengan topik penelitian (minimal 5 penelitian terdahulu)</li>
																<li>Tulisan di dalam landasan teori tidak mengandung unsur copy paste dari referensi yang dikutip (tulisan yang dikutip harus membentuk kalimat baru)</li>
															</ul></td>
															<td><center>0-15</center></td>
															<td></td>
														</tr>

														<tr>
															<td><center><b>4</b></center></td>
															<td><center><b>BAB III - Metodologi</b></center></td>
															<td></td>
															<td></td>
														</tr>

														<tr>
															<td></td>
															<td style="padding-left:5px;padding-right: 0px"><ul>
																<li>Kesesuaian metodologi penelitian dengan penyelesaian permasalahan</li>
																<li>Arsitektur umum menggambarkan keseluruhan metode dan strategi yang diterapkan di tugas akhir</li>
																<li>Arsitektur umum dijelaskan secara terperinci dan detail</li>
																<li>Pemahaman metodologi penelitian</li>
															</ul></td>
															<td><center>0-25</center></td>
															<td></td>
														</tr>

														<tr>
															<td><center><b>5</b></center></td>
															<td><center><b>BAB IV - Implemetasi</b></center></td>
															<td></td>
															<td></td>
														</tr>

														<tr>
															<td></td>
															<td style="padding-left:5px;padding-right: 0px"><ul>
																<li>Kesesuaian implementasi dengan metodologi penelitian</li>
																<li>Screenshot/gambar yang dibuat menunjukkan isi dari penelitian</li>
																<li>Pengujian penelitian sesuai dengan metode yang digunakan</li>
																<li>Setiap gam bar dan tabel memiliki penjelasan mengenai isi dari gambar dan tabel tersebut</li>
																<li>Pembahasan harus sampai pada tahap kenapa hasil yang didapat bisa seperti yang dipaparkan</li>
															</ul></td>
															<td><center>0-35</center></td>
															<td></td>
														</tr>

														<tr>
															<td><center><b>6</b></center></td>
															<td><center><b>BAB V - Kesimpulan</b></center></td>
															<td></td>
															<td></td>
														</tr>

														<tr>
															<td></td>
															<td style="padding-left:5px;padding-right: 0px"><ul>
																<li>Kesimpulan merepresentasikan hasil yang didapat</li>
																<li>Saran merepresentasikan kelemahan dari hasil yang sudah didapat</li>
															</ul></td>
															<td><center>0-2</center></td>
															<td></td>
														</tr>

														<tr>
															<td><center>7</center></td>
															<td style="padding-left:5px;padding-right: 0px"><ul>
																<li>Kemampuan mengemukakan substansi dan pendapat dan sikap</li>
															</ul></td>
															<td><center>0-10</center></td>
															<td></td>
														</tr>

														<tr>
															<td><br></td>
															<td></td>
															<td></td>
															<td></td>
														</tr>

														<tr>
															<td></td>
															<td style="padding-left:5px;padding-right: 0px"><b>TOTAL NILAI</b></td>
															<td><center>100</center></td>
															<td></td>
														</tr>

													</tbody>

												</table>
											</div>
										</div>

									

										

										<br>
										<div class="row">
											<div class="col-xs-8">
												<b><p>Panduan Nilai</p>
												<h6 class="text-light">81 - 100 = A </h6>
												<h6 class="text-light">74 - 80   = B+</h6>
												<h6 class="text-light">66 – 73   = B</h6>
												<h6 class="text-light">59 - 65   = C+</h6>
												<h6 class="text-light">51 - 58   = C</h6>
												<h6 class="text-light">41 - 50   = D</h6>
												<h6 class="text-light">  0 - 40   = E</h6>
											</div>
											<div class="col-xs-4">
												<center>
												Medan,.....................................<br>
												Pembimbing/Pembanding<br><br><br>
												</center>
												(..............................................................)<br>
												NIP. 
											</div>
										</div>
                                    <?php } else { $nomors = 1; foreach($penilaian_semhas as $ps) { ?>
                                            <div class="<?php if($nomors > 1) {echo "page-break";} $nomors++; ?> row">
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

						
											<div class="col-xs-12 text-center">
												<h4>FORM PENILAIN SEMINAR HASIL</h4>
											</div>
									

										<div class="row">
											<div class="col-xs-4">
												<h4 class="text-light">Nama</h4>
												<h4 class="text-light">NIM</h4>
												<h4 class="text-light">Judul</h4>
											</div>
											<div class="col-xs-8">
												<h4 class="text-light">: <?= $nama ?></h4>
												<h4 class="text-light">: <?= $nim ?></h4>
												<h4 class="text-light">: <?= $judul ?></h4>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-12">
												<table border='1' width="100%" style="font-size: 12px;">
													<thead>
														<tr>
															<td style="padding-left:5px;padding-right: 5px"><center><b>No</b></center></td>
															<td style="padding-left:5px;padding-right: 0px"><center><b>Kriteria Penilaian</b></center></td>
															<td style="padding-left:5px;padding-right: 5px"><center><b>Bobot</b></center></td>
															<td style="padding-left:5px;padding-right: 5px"><center><b>Nilai<br>Angka</b></center></td>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><center><b>1</b></center></td>
															<td><center><b>Abstrak</b></center></td>
															<td></td>
															<td></td>
														</tr>

														<tr>
															<td></td>
															<td style="padding-left:5px;padding-right: 0px"><ul>
																<li>Abstrak memiliki unsur rumusan masalah</li>
																<li>Abstrak memiliki unsur metodologi</li>
																<li>Abstrak memiliki unsur hasil penelitian</li>
																<li>Abstrak memiliki unsur kesimpulan</li>
																<li>Bahasa Inggris di dalam abstrak sudah sesuai dengan Bahasa Indonesia di dalam abstrak dan kaidah Bahasa Inggris yang benar</li>
																<li>Kata kunci mewakili isi dari tugas akhir</li>
															</ul></td>
															<td><center>0-3</center></td>
                                                            <td><center><?= $ps->abstrak ?></center></td>
														</tr>

														<tr>
															<td><center><b>2</b></center></td>
															<td><center><b>BAB I - PENDAHULUAN</b></center></td>
															<td></td>
															<td></td>
														</tr>

														<tr>
															<td></td>
															<td style="padding-left:5px;padding-right: 0px"><ul>
																<li>Rumusan masalah adalah masalah yang terjadi di dunia nyata atau masalah yang terdapat di bidang ilmu pengetahuan tersebut</li>
																<li>Tujuan penelitian yang ditulis mampu menyelesaikan rumusan masalah</li>
																<li>Batasan masalah relevan dengan penelitian</li>
																<li>Hubungan latar belakang dengan rumusan masalah</li>
																<li>Batasan masalah berisi batasan penelitian yang dilakukan</li>
															</ul></td>
															<td><center>0-10</center></td>
                                                            <td><center><?= $ps->bab1 ?></center></td>
														</tr>

														<tr>
															<td><center><b>3</b></center></td>
															<td><center><b>BAB II - Landasan Teori</b></center></td>
															<td></td>
															<td></td>
														</tr>

														<tr>
															<td></td>
															<td style="padding-left:5px;padding-right: 0px"><ul>
																<li>Landasan teori membahas hal-hal spesifik yang berhubungan dengan metodologi</li>
																<li>Setiap kutipan termasuk gambar dan tabel yang tidak dibuat oleh penulis harus memiliki referensi</li>
																<li>Referensi yang diletakkan di skripsi tercantum di daftar pustaka</li>
																<li>Jurnal internasional dimasukkan di dalam daftar pustaka (minimal 2 artikel)</li>
																<li>Paper konferensi internasional dimasukkan di dalam daftar pustaka (minimal 5 artikel)</li>
																<li>Penelitian terdahulu yang berhubungan dengan topik penelitian (minimal 5 penelitian terdahulu)</li>
																<li>Tulisan di dalam landasan teori tidak mengandung unsur copy paste dari referensi yang dikutip (tulisan yang dikutip harus membentuk kalimat baru)</li>
															</ul></td>
															<td><center>0-15</center></td>
                                                            <td><center><?= $ps->bab3 ?></center></td>
														</tr>

														<tr>
															<td><center><b>4</b></center></td>
															<td><center><b>BAB III - Metodologi</b></center></td>
															<td></td>
															<td></td>
														</tr>

														<tr>
															<td></td>
															<td style="padding-left:5px;padding-right: 0px"><ul>
																<li>Kesesuaian metodologi penelitian dengan penyelesaian permasalahan</li>
																<li>Arsitektur umum menggambarkan keseluruhan metode dan strategi yang diterapkan di tugas akhir</li>
																<li>Arsitektur umum dijelaskan secara terperinci dan detail</li>
																<li>Pemahaman metodologi penelitian</li>
															</ul></td>
															<td><center>0-25</center></td>
                                                            <td><center><?= $ps->bab3 ?></center></td>
														</tr>

														<tr>
															<td><center><b>5</b></center></td>
															<td><center><b>BAB IV - Implemetasi</b></center></td>
															<td></td>
															<td></td>
														</tr>

														<tr>
															<td></td>
															<td style="padding-left:5px;padding-right: 0px"><ul>
																<li>Kesesuaian implementasi dengan metodologi penelitian</li>
																<li>Screenshot/gambar yang dibuat menunjukkan isi dari penelitian</li>
																<li>Pengujian penelitian sesuai dengan metode yang digunakan</li>
																<li>Setiap gam bar dan tabel memiliki penjelasan mengenai isi dari gambar dan tabel tersebut</li>
																<li>Pembahasan harus sampai pada tahap kenapa hasil yang didapat bisa seperti yang dipaparkan</li>
															</ul></td>
															<td><center>0-35</center></td>
                                                            <td><center><?= $ps->bab4 ?></center></td>
														</tr>

														<tr>
															<td><center><b>6</b></center></td>
															<td><center><b>BAB V - Kesimpulan</b></center></td>
															<td></td>
															<td></td>
														</tr>

														<tr>
															<td></td>
															<td style="padding-left:5px;padding-right: 0px"><ul>
																<li>Kesimpulan merepresentasikan hasil yang didapat</li>
																<li>Saran merepresentasikan kelemahan dari hasil yang sudah didapat</li>
															</ul></td>
															<td><center>0-2</center></td>
                                                            <td><center><?= $ps->bab5 ?></center></td>
														</tr>

														<tr>
															<td><center>7</center></td>
															<td style="padding-left:5px;padding-right: 0px"><ul>
																<li>Kemampuan mengemukakan substansi dan pendapat dan sikap</li>
															</ul></td>
															<td><center>0-10</center></td>
                                                            <td><center><?= $ps->pendapat ?></center></td>
														</tr>

														<tr>
															<td><br></td>
															<td></td>
															<td></td>
															<td></td>
														</tr>

														<tr>
															<td></td>
															<td style="padding-left:5px;padding-right: 0px"><b>TOTAL NILAI</b></td>
															<td><center>100</center></td>
                                                            <td><center><?= $ps->total ?></center></td>
														</tr>

													</tbody>

												</table>
											</div>
										</div>

									

										

										<br>
										<div class="row">
											<div class="col-xs-8">
												<b><p>Panduan Nilai</p>
												<h6 class="text-light">81 - 100 = A </h6>
												<h6 class="text-light">74 - 80   = B+</h6>
												<h6 class="text-light">66 – 73   = B</h6>
												<h6 class="text-light">59 - 65   = C+</h6>
												<h6 class="text-light">51 - 58   = C</h6>
												<h6 class="text-light">41 - 50   = D</h6>
												<h6 class="text-light">  0 - 40   = E</h6>
											</div>
											<div class="col-xs-4">
												<center>
												Medan,.....................................<br>
												<?php switch($ps->penilai) {
                                                        case 'pembimbing1'; echo "Pembimbing 1"; break;
                                                        case 'pembimbing2'; echo "Pembimbing 2"; break;
                                                        case 'pembanding1'; echo "Pembanding 1"; break;
                                                        case 'pembbanding2'; echo "Pembanding 2"; break;
                                                    }
                                                    ?><?php if($ps->ttd != '') { ?>
                                    
                                                    <img src="<?php echo base_url('ttd_dosen/'. $ps->ttd); ?>" height="50px" width="50px">
                                                    
                                                <?php } else {echo "<br>"; } ?>
                                                    
                                                    <br>
												
												(<?= $ps->Nama_dosen ?>)<br>
                                                    NIP. <?php if($ps->NIP == '') {echo ".............................................";} else { echo $ps->NIP ; } ?></center>
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


