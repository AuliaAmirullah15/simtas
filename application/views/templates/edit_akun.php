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
								<ol class="breadcrumb">
											<li><a href="<?php echo base_url('tugas/akun');?>">List Akun Mahasiswa</a></li>
											<li class="active">Edit Akun Mahasiswa</li>
										</ol>
							</div>


<?php
							foreach($data as $d)
							{
								$nim = $d->nim;
								$nama = $d->nama;
								$username = $d->username;
								$ps = $d->id_PS;
                                $upload_sempro = $d->upload_sempro;
                                $uji_program = $d->uji_program;
                                $upload_semhas = $d->upload_semhas;
                                $upload_sidang = $d->upload_sidang;
                                $upload_validasi = $d->upload_validasi;
							}

						?>


							<div class="col-lg-12">
								<form class="form-horizontal form-validate floating-label" method="post" action="<?php echo base_url().'tugas/edit_akun/'.$nim;?>" novalidate="novalidate">
									<div class="card">
										<div class="card-head style-primary">
											<header>Edit Akun</header>
										</div>

										<div class="card-body">
											<h4>Edit Akun</h4>
											<hr>
										
										<div class="row">
											<div class="col-sm-6">
											<div class="form-group">
												<label for="NIM" class="col-sm-4 control-label">NIM</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="Name1" name="nim" disabled data-rule-minlength="2" value="<?php echo $nim ;?>"
													/>
												</div>
											</div>
											</div>

											<div class="col-sm-6">
											<div class="form-group">
												<label for="NIM" class="col-sm-4 control-label">Username</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" disabled
													/>
												</div>
											</div>
											</div>

										</div>
										<div class="form-group">
												<label for="nama" class="col-sm-2 control-label">Nama</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama;?>"/>
												</div>
											</div>
                                            <?php if($_SESSION['prodi'] != '') { ?>
                                            
                                                <input type="hidden" name="id_PS" value="<?= $_SESSION['prodi'] ?>">
                                            
                                            <?php } else { ?>
											<div class="form-group">
												<label for="select2" class="col-sm-2 control-label">Program Studi</label>
												<div class="col-sm-10">
												<select id="select2" name="id_PS" class="form-control">
													
												<?php 
												foreach($prodi as $pro)
												{
												?>

												<option value="<?= $pro->id_PS ?>" <?php if($pro->id_PS == $ps) echo "selected ='selected'";?>><?= $pro->nama_PS ?> </option>

												<?php
												} ?>
												</select>
												</div>
											</div>
                                            <?php } ?>
											<div class="form-group">
												<label for="nama" class="col-sm-2 control-label">Password Baru</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="password" name="password" />
												</div>
											</div>
                                            
                                            <hr>
                                            <h4 class="text-light"><strong>Upload Berkas</strong></h4>
                                            
                                            <div class="form-group">
                                                <div class="col-sm-4">
												<label for="select2" class="col-sm-4 control-label">Upload Berkas Sempro</label>
												<div class="col-sm-8">
												<select id="select2" name="berkas_sempro" class="form-control">
													
												<option value="1" <?php if($upload_sempro == '1') {echo "selected='selected'";}?>>Allowed</option>
                                                <option value="0" <?php if($upload_sempro == '0') {echo "selected='selected'";}?>>Not Allowed</option>
                                                    
												</select>
												</div>
                                                </div>
                                                
                                                 <div class="col-sm-4">
												<label for="select2" class="col-sm-4 control-label">Upload Berkas Uji Progam</label>
												<div class="col-sm-8">
												<select id="select2" name="berkas_uji_program" class="form-control">
													
												<option value="1" <?php if($uji_program == '1') {echo "selected='selected'";}?>>Allowed</option>
                                                <option value="0" <?php if($uji_program == '0') {echo "selected='selected'";}?>>Not Allowed</option>
                                                    
												</select>
												</div>
                                                </div>
                                                
                                                <div class="col-sm-4">
												<label for="select2" class="col-sm-4 control-label">Upload Berkas Seminar Hasil</label>
												<div class="col-sm-8">
												<select id="select2" name="berkas_seminar_hasil" class="form-control">
													
												<option value="1" <?php if($upload_semhas == '1') {echo "selected='selected'";}?>>Allowed</option>
                                                <option value="0" <?php if($upload_semhas == '0') {echo "selected='selected'";}?>>Not Allowed</option>
                                                    
												</select>
												</div>
                                                </div>
                                            </div>
                                            
                                             <div class="form-group">
                                                <div class="col-sm-4">
												<label for="select2" class="col-sm-4 control-label">Upload Berkas Sidang</label>
												<div class="col-sm-8">
												<select id="select2" name="berkas_sidang" class="form-control">
													
												<option value="1" <?php if($upload_sidang == '1') {echo "selected='selected'";}?>>Allowed</option>
                                                <option value="0" <?php if($upload_sidang == '0') {echo "selected='selected'";}?>>Not Allowed</option>
                                                    
												</select>
												</div>
                                                </div>
                                                
                                                 <div class="col-sm-4">
												<label for="select2" class="col-sm-4 control-label">Upload Berkas Validasi Aplikasi</label>
												<div class="col-sm-8">
												<select id="select2" name="berkas_validasi_aplikasi" class="form-control">
													
												<option value="1" <?php if($upload_validasi == '1') {echo "selected='selected'";}?>>Allowed</option>
                                                <option value="0" <?php if($upload_validasi == '0') {echo "selected='selected'";}?>>Not Allowed</option>
                                                    
												</select>
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
                        
                        <div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<h4>Judul Tugas Akhir</h4>
											<hr>
								            
                                            <div class="table-responsive">
									<table id="datatable1" class="table table-striped table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th class="sort-alpha">Judul</th>
                                                <th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
                                            <?php $no = 1; foreach($judul as $judul) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $judul->judul ?></td>
                                                <td><?= $judul->status_kelayakan ?></td>
                                                <?php if($judul->status_kelayakan == 'diterima') { ?>
                                                <td><?php echo anchor('tugas/ganti_judul/'.$judul->id_pengajuan.'/'.$nim,'<button type="button" class="btn btn-warning" OnClick="return confirm(\'Yakin Mahasiswa Ini Mengulang Pengajuan Judul?\')">Tolak</button>'); ?></td>
                                                <?php } else { ?>
                                                <td></td> <?php } ?>
                                            
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                            </div>
									   </div><!--end .card -->
                                    </div>
							</div><!--end .col -->

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
            <script src="<?php echo base_url('assets/js/libs/DataTables/jquery.dataTables.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/nanoscroller/jquery.nanoscroller.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/core/demo/DemoTableDynamic.js');?>"></script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
