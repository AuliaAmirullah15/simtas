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
            <?php foreach($data as $d) { 
            
                $id = $d->id;
                $judul_skripsi = $d->judul_skripsi;
                $catatan_judul_skripsi = $d->catatan_judul_skripsi;
                $latar_belakang = $d->latar_belakang;
                $catatan_latar_belakang = $d->catatan_latar_belakang;
                $rumusan_masalah = $d->rumusan_masalah;
                $catatan_rumusan_masalah = $d->catatan_rumusan_masalah;
                $landasan_teori = $d->landasan_teori;
                $catatan_landasan_teori = $d->catatan_landasan_teori;
                $penelitian_terdahulu = $d->penelitian_terdahulu;
                $catatan_penelitian_terdahulu = $d->catatan_penelitian_terdahulu;
                $data_digunakan = $d->data_digunakan;
                $catatan_data_digunakan = $d->catatan_data_digunakan;
                $metodologi = $d->metodologi;
                $catatan_metodologi = $d->catatan_metodologi;
                $arsitektur_umum = $d->arsitektur_umum;
                $catatan_arsitektur_umum = $d->catatan_arsitektur_umum;
                $seminar = $d->seminar;
                $jadwal = $d->jadwal;
                $kelayakan_sempro = $d->kelayakan_sempro;
 } ?>

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
								<h2 class="text-primary">Form Penilaian Seminar Proposal</h2>
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
								<form class="form-horizontal form-validate floating-label" method="post" action="<?php echo base_url().'tugas/proses_penilaian_sempro/'. $nim.'/'. $id_pengajuan.'/'.$id_seminar.'/'. $kd_dsn;?>" novalidate="novalidate">
									<div class="card">
										<div class="card-head style-primary">
											<header>Tambah Penilaian</header>
										</div>

										<div class="card-body">
											<h4>DATA MAHASISWA</h4>
											<hr>
											<div class ="row">
											<div class="col-sm-4">
											<div class="form-group">
												<label for="NIM" class="col-sm-4 control-label">NIM</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="Name1" name="nim" required data-rule-minlength="2" value="<?= $nim ?>" disabled
													/>
												</div>
											</div>
											</div>
                                                
                                            <div class="col-sm-4">
											<div class="form-group">
												<label for="NIM" class="col-sm-4 control-label">Nama</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="Name1" name="nama" required data-rule-minlength="2"
													value="<?= $nama ?>" disabled/>
												</div>
											</div>
											</div>
                                                
                                            <div class="col-sm-4">
											<div class="form-group">
												<label for="NIM" class="col-sm-4 control-label">Jenis Seminar</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="Name1" name="seminar" required data-rule-minlength="2"
													value="Seminar Proposal" disabled/>
												</div>
											</div>
											</div>
                                                
                                            </div>
                                            
                                            <div class ="row">
											<div class="col-sm-12">
											<div class="form-group">
												<label for="NIM" class="col-sm-2 control-label">Judul</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="Name1" name="judul" required data-rule-minlength="2" value="<?= $judul ?>" disabled
													/>
												</div>
											</div>
											</div>
                                                
                                           
                                                
                                            </div>

											<hr><hr>
                                               <h4>PENILAIAN</h4>
                                            <hr>

											
                                            <div class="row">
                                                <input type="hidden" name="id" value="<?= $id ?>">
                                                <div class="col-sm-2">
                                                    <p><b>Judul Skripsi : </b></p>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="status" class="col-sm-4 control-label">Status</label>
                                                        <div class="col-sm-8">
                                                        <select class="form-control" name="judul_skripsi">
                                                            <option value="terima" <?php if($judul_skripsi == 'diterima') {echo "selected='selected'";}?>>Terima</option>
                                                            <option value="perbaiki" <?php if($judul_skripsi == 'perbaiki') {echo "selected='selected'";}?>>Perbaiki</option>
                                                            <option value="ganti" <?php if($judul_skripsi == 'ganti') {echo "selected='selected'";}?>>Ganti</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-sm-7">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Catatan</label>
                                                        <div class="col-sm-10">
                                                        <textarea class="form-control" name="catatan_judul_skripsi">
                                                            <?= $catatan_judul_skripsi ?>
                                                        </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <hr>

											
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <p><b>Latar Belakang : </b></p>
                                                </div>
                                                
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="status" class="col-sm-4 control-label">Status</label>
                                                        <div class="col-sm-8">
                                                        <select class="form-control" name="latar_belakang">
                                                            <option value="terima" <?php if($latar_belakang == 'diterima') {echo "selected='selected'";}?>>Terima</option>
                                                            <option value="perbaiki" <?php if($latar_belakang == 'perbaiki') {echo "selected='selected'";}?>>Perbaiki</option>
                                                            <option value="ganti" <?php if($latar_belakang == 'ganti') {echo "selected='selected'";}?>>Ganti</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-sm-7">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Catatan</label>
                                                        <div class="col-sm-10">
                                                        <textarea class="form-control" name="catatan_latar_belakang">
                                                            <?= $catatan_latar_belakang ?>
                                                        </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <hr>

											
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <p><b>Rumusan Masalah : </b></p>
                                                </div>
                                                
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="status" class="col-sm-4 control-label">Status</label>
                                                        <div class="col-sm-8">
                                                        <select class="form-control" name="rumusan_masalah">
                                                            <option value="terima" <?php if($rumusan_masalah == 'diterima') {echo "selected='selected'";}?>>Terima</option>
                                                            <option value="perbaiki" <?php if($rumusan_masalah == 'perbaiki') {echo "selected='selected'";}?>>Perbaiki</option>
                                                            <option value="ganti" <?php if($rumusan_masalah == 'ganti') {echo "selected='selected'";}?>>Ganti</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-sm-7">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Catatan</label>
                                                        <div class="col-sm-10">
                                                        <textarea class="form-control" name="catatan_rumusan_masalah">
                                                            <?= $catatan_rumusan_masalah ?>
                                                        </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                             <hr>

											
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <p><b>Landasan Teori : </b></p>
                                                </div>
                                                
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="status" class="col-sm-4 control-label">Status</label>
                                                        <div class="col-sm-8">
                                                        <select class="form-control" name="landasan_teori">
                                                            <option value="terima" <?php if($landasan_teori == 'diterima') {echo "selected='selected'";}?>>Terima</option>
                                                            <option value="perbaiki" <?php if($landasan_teori == 'perbaiki') {echo "selected='selected'";}?>>Perbaiki</option>
                                                            <option value="ganti" <?php if($landasan_teori == 'ganti') {echo "selected='selected'";}?>>Ganti</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-sm-7">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Catatan</label>
                                                        <div class="col-sm-10">
                                                        <textarea class="form-control" name="catatan_landasan_teori">
                                                            <?= $catatan_landasan_teori ?>
                                                        </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                             <hr>

											
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <p><b>Penelitian Terdahulu : </b></p>
                                                </div>
                                                
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="status" class="col-sm-4 control-label">Status</label>
                                                        <div class="col-sm-8">
                                                        <select class="form-control" name="penelitian_terdahulu">
                                                            <option value="terima" <?php if($penelitian_terdahulu == 'diterima') {echo "selected='selected'";}?>>Terima</option>
                                                            <option value="perbaiki" <?php if($penelitian_terdahulu == 'perbaiki') {echo "selected='selected'";}?>>Perbaiki</option>
                                                            <option value="ganti" <?php if($penelitian_terdahulu == 'ganti') {echo "selected='selected'";}?>>Ganti</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-sm-7">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Catatan</label>
                                                        <div class="col-sm-10">
                                                        <textarea class="form-control" name="catatan_penelitian_terdahulu">
                                                            <?= $catatan_penelitian_terdahulu ?>
                                                        </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											
                                              <hr>

											
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <p><b>Data Yang Digunakan: </b></p>
                                                </div>
                                                
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="status" class="col-sm-4 control-label">Status</label>
                                                        <div class="col-sm-8">
                                                        <select class="form-control" name="data_digunakan">
                                                            <option value="terima" <?php if($data_digunakan == 'diterima') {echo "selected='selected'";}?>>Terima</option>
                                                            <option value="perbaiki" <?php if($data_digunakan == 'perbaiki') {echo "selected='selected'";}?>>Perbaiki</option>
                                                            <option value="ganti" <?php if($data_digunakan == 'ganti') {echo "selected='selected'";}?>>Ganti</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-sm-7">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Catatan</label>
                                                        <div class="col-sm-10">
                                                        <textarea class="form-control" name="catatan_data_digunakan">
                                                            <?= $catatan_data_digunakan ?>
                                                        </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                              <hr>

											
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <p><b>Metodologi: </b></p>
                                                </div>
                                                
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="status" class="col-sm-4 control-label">Status</label>
                                                        <div class="col-sm-8">
                                                        <select class="form-control" name="metodologi">
                                                            <option value="terima" <?php if($metodologi == 'diterima') {echo "selected='selected'";}?>>Terima</option>
                                                            <option value="perbaiki" <?php if($metodologi == 'perbaiki') {echo "selected='selected'";}?>>Perbaiki</option>
                                                            <option value="ganti" <?php if($metodologi == 'ganti') {echo "selected='selected'";}?>>Ganti</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-sm-7">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Catatan</label>
                                                        <div class="col-sm-10">
                                                        <textarea class="form-control" name="catatan_metodologi">
                                                            <?= $catatan_metodologi ?>
                                                        </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											
                                             <hr>

											
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <p><b>Daftar Pustaka: </b></p>
                                                </div>
                                                
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="status" class="col-sm-4 control-label">Status</label>
                                                        <div class="col-sm-8">
                                                        <select class="form-control" name="arsitektur_umum">
                                                            <option value="terima" <?php if($arsitektur_umum == 'diterima') {echo "selected='selected'";}?>>Terima</option>
                                                            <option value="perbaiki" <?php if($arsitektur_umum == 'perbaiki') {echo "selected='selected'";}?>>Perbaiki</option>
                                                            <option value="ganti" <?php if($arsitektur_umum == 'ganti') {echo "selected='selected'";}?>>Ganti</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-sm-7">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Catatan</label>
                                                        <div class="col-sm-10">
                                                        <textarea class="form-control" name="catatan_arsitektur_umum">
                                                            <?= $catatan_arsitektur_umum ?>
                                                        </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <hr>

											
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <p><b>Kelayakan Seminar Proposal: </b></p>
                                                </div>
                                                
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="status" class="col-sm-4 control-label">Status</label>
                                                        <div class="col-sm-8">
                                                        <select class="form-control" name="kelayakan_sempro">
                                                            <option value="layak" <?php if($kelayakan_sempro == 'layak') {echo "selected='selected'";}?>>Layak</option>
                                                            <option value="tidak" <?php if($kelayakan_sempro == 'tidak') {echo "selected='selected'";}?>>Tidak Layak</option>
                                                            
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                             
                                            </div>
											
											
										</div><!--end .card-body -->
										<div class="card-actionbar">
											<div class="card-actionbar-row">
                                                <a href="<?php echo base_url('Tugas/list_mahasiswa_seminar/'. $id_seminar); ?>"><button type="button" class="btn btn-flat btn-ink ink-reaction" value="back">Kembali</button></a>
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
