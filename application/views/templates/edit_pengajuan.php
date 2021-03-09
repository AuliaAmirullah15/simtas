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
						<?php if($message != '' OR $message != NULL) { 
    echo 

					"<div class=\"alert alert-warning\" role=\"alert\">
							<strong>".$message."</strong></div>";}?>
						<!-- BEGIN HORIZONTAL FORM -->
						<div class="row">
							<ol class="breadcrumb">
											<li><a href="<?php echo base_url('tugas/pengajuan_judul');?>">Pengajuan Judul</a></li>
											<li class="active">Detail Pengajuan Judul</li>
										</ol>


<?php
							foreach($data as $d)
							{
								$id_pengajuan = $d->id_pengajuan;
								$nim = $d->nim;
								$judul = $d->judul;
								$pembimbing1 = $d->pembimbing1;
								$pembimbing2 = $d->pembimbing2;
							}

						?>


							<div class="col-lg-12">
								
									<div class="card">
										<div class="card-head style-primary">
											<header>Pengajuan Judul</header>
										</div>

									<form class="form-horizontal form-validate floating-label" method="post" action="<?php echo base_url().'tugas/update_dopim/'.$nim.'/'.$id_pengajuan;?>" novalidate="novalidate">
										<div class="card-body">
											<h4>Dosen Pembimbing</h4>
											<hr>
											<div class="form-group">
												<label for="SK Pembimbing" class="col-sm-2 control-label">Pembimbing 1</label>
												<div class="col-sm-10">
													<select id="pembimbing1" name="pembimbing1" class="form-control">
						                              <option value=""></option>
														<?php foreach($dosen as $dosen)
														{ ?>

                                                            
															<option value="<?php echo $dosen->Kode_dosen; ?>" <?php if($dosen->Kode_dosen == $pembimbing1) {echo "selected";}?>><?php echo $dosen->Nama_dosen ; ?></option>

														<?php }?>

											
													</select>
													
												</div>
											</div>
											<div class="form-group">
												<label for="SK Pembimbing" class="col-sm-2 control-label">Pembimbing 2</label>
												<div class="col-sm-10">
														<select id="pembimbing2" name="pembimbing2" class="form-control">
						                                  
                                                             <option value=""></option>
														<?php foreach($dosen2 as $dosen2)
														{ ?>


															<option value="<?php echo $dosen2->Kode_dosen; ?>" <?php if($dosen2->Kode_dosen == $pembimbing2) {echo "selected";}?>><?php echo $dosen2->Nama_dosen ; ?></option>

														<?php }?>

											
													</select>
												</div>
											</div>
											
										<div class="card-actionbar">
											<div class="card-actionbar-row">
												<button type="submit" class="btn btn-flat btn-primary ink-reaction" value="update">Update</button>
											</div>
										</div>
									</div><!--end .card -->
								</form>

									<form class="form-horizontal form-validate floating-label" method="post" action="<?php echo base_url().'tugas/update_pengajuan/'.$id_pengajuan;?>" >
										<div class="card-body">
											<h4>Pengajuan Judul</h4>
											<hr>
											<div class="form-group">
												<label for="SK Pembimbing" class="col-sm-2 control-label">NIM</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim;?>" disabled/>
                                                    <input type="hidden" class="form-control" id="nim" name="nim" value="<?php echo $nim;?>"/>
													
												</div>
											</div>
											<div class="form-group">
												<label for="SK Pembimbing" class="col-sm-2 control-label">Judul</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul;?>" disabled/>
													<input type="hidden" class="form-control" id="judul" name="judul" value="<?php echo $judul;?>"/>
												</div>
											</div>
											<div class="form-group">
												<label for="SK Pembimbing" class="col-sm-2 control-label">Uji Kelayakan Judul</label>
												<div class="col-sm-10">
													<select id="select2" name="uji_kelayakan_judul" class="form-control">
						
												<option value="diterima">Diterima </option>
												<option value="ditolak">Ditolak</option>

											
												</select>
												</div>
											</div>
											<div class="form-group">
														<label for="hasil" class="col-sm-2 control-label">Hasil Uji Kelayakan Judul</label>
														<div class="col-sm-10">
															<textarea class="form-control" id="hasil" name="hasil" rows="3" ></textarea>
														</div>
													</div>
										
										<div class="card-actionbar">
											<div class="card-actionbar-row">
												<button type="submit" class="btn btn-flat btn-primary ink-reaction" value="save" OnClick="return confirm('Yakin Data ini Sudah Diterima/Ditolak ?')">Save</button>
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
