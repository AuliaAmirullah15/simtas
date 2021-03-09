<!DOCTYPE html>
<html lang="en">
	<head>
	<?php 
		if(!isset($_SESSION['username']))
		{
			redirect('tugas/login');
		}
	?>
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
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed ">

			<!-- BEGIN HEADER -->
		<?php $this->load->view('main_templates/header') ?>
		<?php error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);?>
	<!-- END HEADER -->

		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
			<div id="content">

				<section>
				<div class="section-body">

				
					<div class="section-body contain-lg">
						<?php if($message != '' OR $message != NULL) { echo 

					"<div class=\"alert alert-success\" role=\"alert\">
							<strong>".$message."</strong></div>";}?>
						<!-- BEGIN HORIZONTAL FORM -->
						<div class="row">

							<div class="col-lg-12">
								<h2 class="text-primary">Data Tugas Akhir</h2>
							</div><!--end .col -->
							<!--<div class="col-lg-7">
								<<article class="margin-bottom-xxl">
									<p class="lead">
										Of course Material Admin also has a horizontal layout.
										In this layout, the label is on the left side of the field.
										The label is right-aligned so that the relationship between the field and the tag is immediately visible.
									</p>
									<p>
										You can also use the inversed form inside a horizontal layout.
									</p>
								</article>
							</div><!--end .col -->
							<div class="col-lg-12">
								<form class="form-horizontal form-validate floating-label" method="post" action="<?php echo base_url().'tugas/proses_tambah_skripsi';?>" novalidate="novalidate">
									<div class="card">
										<div class="card-head style-primary">
											<header>Tambah Tugas Akhir</header>
										</div>

										<div class="card-body">
											<h4>Tugas Akhir</h4>
											<hr>
											<div class ="row">
											<div class="col-sm-2">
											<div class="form-group">
												<label for="NIM" class="col-sm-4 control-label">NIM</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="Name1" name="nim" required data-rule-minlength="2"
													/>
												</div>
											</div>
											</div>
                                                
                                             <div class="col-sm-3">
                                                <div class="form-group">
												<label for="select2" class="col-sm-4 control-label">Bulan Lulus</label>
												<div class="col-sm-8">
												<select id="select2" name="bulan_lulus" class="form-control">
												    <option value='1'>Januari</option>
                                                    <option value='2'>Februari</option>
                                                    <option value='3'>Maret</option>
                                                    <option value='4'>April</option>
                                                    <option value='5'>Mei</option>
                                                    <option value='6'>Juni</option>
                                                    <option value='7'>Juli</option>
                                                    <option value='8'>Agustus</option>
                                                    <option value='9' >September</option>
                                                    <option value='10'>Oktober</option>
                                                    <option value='11'>November</option>
                                                    <option value='12'>Desember</option>
												</select>
                                                    </div>
                                            
                                                </div>
                                                </div>

											<div class="col-sm-2">
											<div class="form-group">
												<label for="NIM" class="col-sm-4 control-label">Tahun Lulus</label>
												<div class="col-sm-8">
													<input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus"
													/>
												</div>
											</div>
											</div>

											<div class="col-sm-3">
											<div class="form-group">
												<label for="select2" class="col-sm-4 control-label">Program Studi</label>
												<div class="col-sm-8">
												<select id="select2" name="kode_PS" class="form-control">
													
												<?php 
												foreach($prodi as $pro)
												{
												?>

												<option value="<?= $pro->id_PS ?>" ><?= $pro->nama_PS ?> </option>

												<?php
												} ?>
												</select>
												</div>
											</div>
											</div>

											<div class="col-sm-2">
											<div class="form-group">
												<label for="select2" class="col-sm-4 control-label">Jenis Tugas Akhir</label>
												<div class="col-sm-8">
												<select id="select2" name="jenis_ta" class="form-control">
													
													<option value="skripsi">Skripsi</option>
													<option value="tesis">Tesis</option>
													<option value="disertasi">Disertasi</option>
												</select>
												</div>
											</div>
											</div>
											</div>
											<div class="form-group">
												<label for="SK Pembimbing" class="col-sm-2 control-label">Nomor SK Pembimbing</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="sk_pembimbing" name="sk_pembimbing"/>
												</div>
											</div>
											<div class="form-group">
												<label for="SK Pembimbing" class="col-sm-2 control-label">Nomor SK Pembanding</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="sk_pembanding" name="sk_pembanding"/>
												</div>
											</div>
											<div class="form-group">
												<label for="NIM" class="col-sm-2 control-label">Nama</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="nama" name="nama"
													/>
												</div>
											</div>
												<div class="form-group">
												<label for="status" class="col-sm-2 control-label">Status</label>
												<div class="col-sm-10">
													<select id="slect2" name="status" class="form-control">
													<option value="belum sempro">Belum Seminar Proposal</option>
													<option value="belum semhas">Belum Seminar Hasil</option>
													<option value="belum sidang">Belum Sidang</option>
													<option value="sudah sidang">Sudah Sidang</option>
													<option value="lulus">Lulus</option> 
													</select>
												</div>
											</div>
											<div class="form-group">
														<label for="Judul Skripsi" class="col-sm-2 control-label">Judul Skripsi</label>
														<div class="col-sm-10">
															<textarea class="form-control" id="judul_skripsi" name="judul" rows="3"></textarea>
														</div>
													</div>
											<div class="form-group">
												<label for="select2" class="col-sm-2 control-label">Pembimbing 1</label>
												<div class="col-sm-10">
												<select id="select2" name="kode_Pembimbing1" class="form-control">
												
                                                <option value="NO"></option>
												<?php 
												foreach($pembimbing as $pemb)
												{
												?>

												<option value="<?= $pemb->Kode_dosen ?>" ><?= $pemb->Nama_dosen ?> </option>

												<?php
												} ?>
												</select>
												</div>
											</div>

											<div class="form-group">
												<label for="select2" class="col-sm-2 control-label">Pembimbing 2</label>
												<div class="col-sm-10">
												<select id="select2" name="kode_Pembimbing2" class="form-control">
												
                                                <option value="NO"></option>
												<?php 
												foreach($pembimbing as $pemb)
												{
												?>

												<option value="<?= $pemb->Kode_dosen ?>" ><?= $pemb->Nama_dosen ?> </option>

												<?php
												} ?>
												</select>
												</div>
											</div>
											<div class="form-group">
												<label for="select2" class="col-sm-2 control-label">Pembanding 1</label>
												<div class="col-sm-10">
												<select id="select2" name="kode_Pembanding1" class="form-control">
												
                                                <option value="NO"></option>
												<?php 
												foreach($pembimbing as $pemb)
												{
												?>

												<option value="<?= $pemb->Kode_dosen ?>" ><?= $pemb->Nama_dosen ?> </option>

												<?php
												} ?>
												</select>
												</div>
											</div>
											<div class="form-group">
												<label for="select2" class="col-sm-2 control-label">Pembanding 2</label>
												<div class="col-sm-10">
												<select id="select2" name="kode_Pembanding2" class="form-control">
													
                                                <option value="NO"></option>
												<?php 
												foreach($pembimbing as $pemb)
												{
												?>

												<option value="<?= $pemb->Kode_dosen ?>" ><?= $pemb->Nama_dosen ?> </option>

												<?php
												} ?>
												</select>
												</div>
											</div>
									
										<h4>Tanggal</h4>
										<hr>
										<div class ="row">
											<div class="col-sm-4">
											<div class="form-group">
												<label for="NIM" class="col-sm-6 control-label">Seminar Proposal</label>
												<div class="col-sm-6">
													<input type="date" class="form-control" id="tgl_sempro" name="tgl_sempro"
													/>
												</div>
											</div>
											</div>

											<div class="col-sm-4">
											<div class="form-group">
												<label for="NIM" class="col-sm-6 control-label">Seminar Hasil</label>
												<div class="col-sm-6">
													<input type="date" class="form-control" id="tgl_semhas" name="tgl_semhas"
													/>
												</div>
											</div>
											</div>

											<div class="col-sm-4">
											<div class="form-group">
												<label for="NIM" class="col-sm-6 control-label">Sidang Meja Hijau</label>
												<div class="col-sm-6">
													<input type="date" class="form-control" id="tgl_sidang" name="tgl_sidang"
													/>
												</div>
											</div>
											</div>
											</div>

										<h4>Nilai</h4>
										<hr>
										<div class ="row">
											<div class="col-sm-2">
											<div class="form-group">
												<label for="NIM" class="col-sm-6 control-label">Uji Program</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="nilai_uji_program" name="nilai_uji_program" placeholder="100.000"
													/>
												</div>
											</div>
											</div>

											<div class="col-sm-3">
											<div class="form-group">
												<label for="NIM" class="col-sm-6 control-label">Seminar Hasil</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="nilai_semhas" name="nilai_semhas" placeholder="100.000"
													/>
												</div>
											</div>
											</div>

											<div class="col-sm-3">
											<div class="form-group">
												<label for="NIM" class="col-sm-6 control-label">Sidang Meja Hijau</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="nilai_sidang" name="nilai_sidang" placeholder="100.000"
													/>
												</div>
											</div>
											</div>

											<div class="col-sm-2">
											<div class="form-group">
												<label for="NIM" class="col-sm-6 control-label">Total</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="total" name="total" placeholder="100.000"
													/>
												</div>
											</div>
											</div>

											<div class="col-sm-2">
											<div class="form-group">
												<label for="NIM" class="col-sm-6 control-label">Grade</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="grade" name="grade" placeholder="B+"
													/>
												</div>
											</div>
											</div>
											</div>
										</div><!--end .card-body -->
										<div class="card-actionbar">
											<div class="card-actionbar-row">
												<button type="submit" class="btn btn-flat btn-primary ink-reaction" value="save">Save</button>
											</div>
										</div>
									</div><!--end .card -->
								</form>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END HORIZONTAL FORM -->

					</div>
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
		<script src="<?php echo base_url('assets/js/libs/moment/moment.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/nanoscroller/jquery.nanoscroller.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/App.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppNavigation.js');?>"></script>
		<script src="<?php echo base_url('ssets/js/core/source/AppOffcanvas.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppCard.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppForm.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppNavSearch.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppVendor.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/demo/Demo.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/demo/DemoFormLayouts.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/jquery-validation/dist/jquery.validate.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/jquery-validation/dist/additional-methods.min.js');?>"></script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
