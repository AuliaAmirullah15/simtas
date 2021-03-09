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
            .customli li{
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
							<strong>Selamat! </strong> Anda berhasil mengupload <b>Berkas Persyaratan Validasi Aplikasi</b></div>";
}
   else if($error == 'Simpan Sementara Berhasil')
{

							echo "

					<div class=\"section-body\">
						<div class=\"alert alert-success\" role=\"alert\">
							<strong>Selamat! </strong> Simpan Sementara Berhasil</b></div>";
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
													<a href="<?php echo base_url().'mahasiswa/form_persetujuan_penggandaan'; ?>"><p class="lead">Form Persetujuan Penggandaan Skripsi</p></a>		
													<a href="<?php echo base_url().'mahasiswa/form_jurnal'; ?>"><p class="lead">Form Jurnal</p></a> 
<!--													<a href="<?php echo base_url().'mahasiswa/validasi_berkas_penggandaan'; ?>"><p class="lead">Cetak Validasi Berkas Penggandaan Skripsi</p></a>-->
                                            
                                            <a href="<?php echo base_url().'mahasiswa/status_validasi_berkas_penggandaan'; ?>"><p class="lead">Cetak Validasi Berkas Penggandaan Skripsi</p></a>
<!--													<a href="<?php echo base_url().'mahasiswa/status_validasi_berkas_penggandaan'; ?>"<p class="lead">Status Validasi Berkas Penggandaan Skripsi</p></a>-->
                            
                                                 <hr><hr>
                                                    
                                                    <h3 class="text-light"><strong>Berkas</strong></h3>
                                                    <p class="text-light">Berikut ini file yang harus dikirim kepada Penguji: </p>
                                                    <ul class="customli">
                                                      
                                                        <li>1. CD skripsi (CdSkripsi_Nim_Nama.zip / CdSkripsi_Nim_Nama.rar)</li>
                                                        <li>2. Kode sumber aplikasi (KodeAplikasi_Nim_Nama.zip / KodeAplikasi_Nim_Nama.rar)</li>
                                                        <li>3. Jurnal (Jurnal_Nim_Nama.zip / Jurnal_Nim_Nama.rar)</li>
                                                        <li>4. Program exe (ProgramExe_Nim_Nama.zip / Program_Nim_Nama.rar)</li>
                                                    </ul>
                                                    <p class="text-light">Berkas di atas harus diupload satu per satu</p>
                                                   

													
                                                  
                                                    
                                                    <form class="form" method="post" action="<?php echo base_url().'mahasiswa/berkas_validasi_penguji';?>" enctype="multipart/form-data">
													<br>
                                                      
                                                    <select name="jenis_berkas">
                                                        <option value="cd">CD Skripsi</option>
                                                        <option value="kode">Kode</option>
                                                        <option value="jurnal">Jurnal</option>
                                                        <option value="program">Program</option>
                                                    </select>
													<input type="file" name="berkas">
													<button type="submit" class="btn btn-success" name="submit" value="submit" OnClick="return confirm('Yakin Berkas Ini Sudah Benar? Anda tidak akan dapat mengeditnya lagi')">
													Submit</button>
													</form>
                                                    
                                                       <div class="table-responsive">
											<table class="table no-margin">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama File</th>
														<th>Jenis File</th>
														
													</tr>
												</thead>
												<tbody>
                                                    
													<?php 
												    $no = 1;
                                                    if($berkas != NULL) {
													foreach($berkas as $o)
														{ ?>
                                                            <?php if($o->cd != '') { ?>
															<tr>
																<td><?php echo $no ; $no += 1;?></td>
																<td><a href="<?php echo base_url('berkas_mahasiswa/'.$o->cd) ?>"><?= $o->cd ?></a></td>
																<td>CD Skripsi</td>
															</tr>
                                                            <?php } if($o->kode != '') { ?>
                                                            <tr>
																<td><?php echo $no ; $no += 1;?></td>
																<td><a href="<?php echo base_url('berkas_mahasiswa/'.$o->kode) ?>"><?= $o->kode ?></a></td>
																<td>Kode Program</td>
															</tr>
                                                    
                                                    
                                                            <?php }  if($o->jurnal != '') { ?>
                                                            <tr>
																<td><?php echo $no ; $no += 1;?></td>
																<td><a href="<?php echo base_url('berkas_mahasiswa/'.$o->jurnal) ?>"><?= $o->jurnal ?></a></td>
																<td>Jurnal</td>
															</tr>
                                                    
                                                    
                                                            <?php } if($o->program != '') { ?>
                                                            <tr>
																<td><?php echo $no ; $no += 1;?></td>
																<td><a href="<?php echo base_url('berkas_mahasiswa/'.$o->program) ?>"><?= $o->program ?></a></td>
																<td>Program Exe</td>
															</tr>
                                                    
                                                    
                                                            <?php } ?>
                                                    <?php
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
