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
													<p class="lead">Catatan Seminar Proposal</p>

													<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table no-margin">
												<thead>
													<tr>
														<th>No</th>
														<th>Judul</th>
														<th>Tanggal Seminar</th>
                                                        <th>Kelayakan Seminar Proposal</th>
														<th>Action</th>
														
													</tr>
												</thead>
												<tbody>
													<?php $no=1; if($sempro != null) { foreach($sempro as $s) {?>
                                                    
                                                        <th><?= $no++ ?></th>
                                                        <th><?= $s->judul ?></th>
                                                        <th><?= $s->jadwal ?></th>
                                                        <th><?php echo ucwords($s->status_kelayakan) ; ?></th>
                                                    <th><a href="<?php echo base_url('Mahasiswa/penilaian_sempro/'. $s->nim.'/'. $s->id_pengajuan.'/'. $s->id_jadwal_seminar);?>"><button class="btn btn-primary">Lihat</button></a></th>
                                                    
                                                    <?php } } else { ?>
                                                    
                                                        <th colspan="5"><center>Belum Ada Data, Anda Belum Mengikuti Seminar Proposal</center></th>
                                                    
                                                    
                                                    <?php } ?>
													
												</tbody>
											</table>
										</div><!--end .table-responsive -->
									</div><!--end .card-body -->
                                    
                                    
                                    
                                    
								</div><!--end .card -->
							</div><!--end .col -->
												</div><!--end .card-body -->
                                                
                                                <div class="card-body">
													<p class="lead">Catatan Seminar Hasil</p>

													<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table no-margin">
												<thead>
													<tr>
														<th>No</th>
														<th>Judul</th>
														<th>Tanggal Seminar</th>
                                                        <th>Kelayakan Seminar Hasil</th>
                                                        <th><center>Action</center></th>
														
													</tr>
												</thead>
												<tbody>
													<?php $no=1; if($sempro != null) { foreach($semhas as $s) {?>
                                                    <tr>
                                                        <th><?= $no++ ?></th>
                                                        <th><?= $s->judul ?></th>
                                                        <th><?= $s->jadwal ?></th>
                                                        <th><?php echo ucwords($s->status_kelayakan) ; ?></th>
                                                    <th><a href="<?php echo base_url('Mahasiswa/penilaian_semhas/'. $s->nim.'/'. $s->id_pengajuan.'/'. $s->id_jadwal_seminar);?>"><button class="btn btn-primary">Lihat Penilaian</button></a>
                                                    <a href="<?php echo base_url('Mahasiswa/catatan_semhas/'. $s->nim.'/'. $s->id_pengajuan.'/'. $s->id_jadwal_seminar);?>"><button class="btn btn-info">Lihat Catatan</button></a>
                                                    </th>
                                                    </tr>
                                                    <?php } } else { ?>
                                                    
                                                        <th colspan="5"><center>Belum Ada Data, Anda Belum Mengikuti Seminar Hasil</center></th>
                                                    
                                                    
                                                    <?php } ?>
													
												</tbody>
											</table>
										</div><!--end .table-responsive -->
									</div><!--end .card-body -->
                                                        </div></div></div>
                                                
                                                
                                                <div class="card-body">
													<p class="lead">Catatan Sidang Meja Hijau</p>

													<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table no-margin">
												<thead>
													<tr>
														<th>No</th>
														<th>Judul</th>
														<th>Tanggal Seminar</th>
                                                        <th>Kelayakan Sidang Meja Hijau</th>
														<th>Action</th>
														
													</tr>
												</thead>
												<tbody>
													<?php $no=1; if($sidang != null) { foreach($sidang as $s) {?>
                                                    <tr>
                                                        <th><?= $no++ ?></th>
                                                        <th><?= $s->judul ?></th>
                                                        <th><?= $s->jadwal ?></th>
                                                        <th><?php echo ucwords($s->status_kelayakan) ; ?></th>
                                                    <th><a href="<?php echo base_url('Mahasiswa/catatan_perbaikan_sidang/'. $s->nim.'/'. $s->id_pengajuan.'/'. $s->id_jadwal_seminar.'/'. $s->status_kelayakan);?>"><button class="btn btn-primary">Lihat</button></a></th>
                                                    
                                                    <?php } } else { ?>
                                                    
                                                        <th colspan="5"><center>Belum Ada Data, Anda Belum Mengikuti Sidang Meja Hijau</center></th>
                                                    
                                                    
                                                    <?php } ?>
                                                    </tr>
												</tbody>
											</table>
										</div><!--end .table-responsive -->
									</div><!--end .card-body -->
                                                        </div></div></div>
                                    
                                    
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
