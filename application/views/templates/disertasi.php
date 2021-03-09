<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

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
	<?php error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);?>

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
				<section class="style-default-bright">
					<div class="section-header">
						<h2 class="text-primary">Disertasi</h2>
					</div>
					<?php if($message != ' ' ) { ?>

					<div class="section-body">
						<div class="alert alert-success" role="alert">
							<strong>Well done!</strong> <?php echo $message ;?>
				</div>
				<?php } ?>
					
						<div class="row">
							<article class="margin-bottom-xxl">
									<p class="lead">
									<?php if(empty($set) ) { ?>
									<form class="form" role="form" action="<?php echo base_url('tugas/disertasi') ?>" method="post">
										<div class="col-sm-1"><select id="select2" name="batas" class="form-control">
												<option value="5" <?php if($batas== 5) {echo "selected='selected'";} else {echo "selected='selected'";}?> > 5 </option>
												<option value="10" <?php if($batas == 10) {echo "selected='selected'";} ?> > 10 </option>
												<option value="20" <?php if($batas==20) {echo "selected='selected'";} ?> > 20 </option>
												<option value="50" <?php if($batas==50) {echo "selected='selected'";} ?> > 50 </option>
												<option value=100 <?php if($batas==100) {echo "selected='selected'";} ?> > 100 </option>
												</select>
												</div>
											<div class="col-sm-1"><input type="submit" value="submit" class="btn btn-default"></div>
									<?php } ?>
									</p>
								</article>
							</form>
						</div><!--end .row -->

						<div class="row">
							<div >
								<div class="">
									<div class="card-body">
										<form class="form" role="form" action="<?php echo base_url('tugas/search_disertasi') ?>" method="post">
									<div class="row">
										<div class="col-sm-3">	
											<div class="form-group floating-label">
												<input type="text" class="form-control" id="regular2" name="key" value="<?php if($cari != NULL) { echo $cari;} else {echo "";} ?>" >
						
												<label for="regular2">Nama Dosen</label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group floating-label">
												<input type="text" class="form-control" id="regular2" name="skripsi" value="<?php if($skripsi != NULL) { echo $skripsi;} else {echo "";} ?>" >
						
												<label for="regular2">Judul Skripsi</label>
											</div>
										</div>
										<div class ="col-sm-3">
											<div class="form-group floating-label">
												<input type="text" class="form-control" id="regular2" name="nim" value="<?php if($nim != NULL) { echo $nim;} else {echo "";} ?>" >
						
												<label for="regular2">NIM</label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group floating-label">
												<select id="select2" name="prodi" class="form-control">
												<option value="all" <?php if($prodi == NULL) {echo "selected='selected'" ;} ?> > All </option>

												<?php foreach($studi as $prodi2)
												{?>

													<option value = "<?php echo $prodi2->nama_PS?>" <?php if($prodi2->nama_PS == $prodi) {echo "selected='selected'";} ?> ><?php echo $prodi2->nama_PS; ?> </option>
												<?php 
											}



												?>
												</select>
												<label for="regular2">Program Studi</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<input type="date" class="form-control" id="placeholder2" name="tgl_awal" value="<?php if($tgl_mulai != NULL) { echo $tgl_mulai;} else {echo "";} ?>">
												<label for="placeholder2">Tanggal Awal</label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<input type="date" class="form-control" id="placeholder2" name="tgl_akhir" value="<?php if($tgl_akhir != NULL) { echo $tgl_akhir;} else {echo "";} ?>">
												<label for="placeholder2">Tanggal Selesai</label>
											</div>
										</div>
										
										<div class="col-sm-3">
											<div class="form-group">
												<select id="select2" name="pilihan" class="form-control">
												<option value="all" <?php if($pil=='all') {echo "selected='selected'";} else {echo "selected='selected'";}?> > All </option>
												<option value="pengajuan judul" <?php if($pil=='pengajuan judul') {echo "selected='selected'";} ?> > Pengajuan Judul </option>
												<option value="seminar proposal" <?php if($pil=='seminar proposal') {echo "selected='selected'";} ?> > Seminar Proposal </option>
												<option value="seminar hasil" <?php if($pil=='seminar hasil') {echo "selected='selected'";} ?> > Seminar Hasil </option>
												<option value="sidang" <?php if($pil=='sidang') {echo "selected='selected'";} ?> > Sidang </option>
												<option value="sudah sidang" <?php if($pil=='sudah sidang') {echo "selected='selected'";} ?> > Sudah Sidang </option>
												<option value="lulus" <?php if($pil=='lulus') {echo "selected='selected'";} ?> > Lulus </option>
												</select>
												<label for="select2">Status Skripsi</label>
											</div>
										</div>
										<div class="col-sm-2">
											<input type="hidden" class="form-control" id="regular2" name="page">
											<div><input type="submit" id="submitSearch" class="btn btn-default" value="Cari"></div>	
										</div>
										<div class="col-sm-1">							
											<div><input type="reset" name="reset" class="btn btn-default" value="reset"></div>
										</div>
									</div>
										</form>
									</div><!--end .card-body -->
								</div><!--end .card -->
							<div class="col-lg-12">
								<div class="table-responsive">
									<table id="" class="table table-striped table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th class="sort-numeric">Nomor Disertasi</th>
												<th class="sort-numeric">NIM</th>
												<th class="sort-alpha">Nama</th>
												<th class="sort-alpha">Prodi</th>
												<th class="sort-alpha">Judul Skripsi</th>
												<th>Pembimbing 1</th>
												<th>Pembimbing 2</th>
												<th>Tanggal Lulus</th>
												<th>Status</th>
												<th colspan="2"><center>Action</center></th>
											</tr>
										</thead>
										<tbody>
										<!-- content of table -->
												<?php 
													$no = 1;
													foreach($data as $d){ 
												?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $d->id_disertasi ?></td>
													<td><?php echo $d->nim ?></td>
													<td><?php echo $d->nama ?></td>
													<td><?php echo $d->nama_PS ?></td>
													<td><?php echo $d->judul_skripsi ?></td>
													<td><?php echo $d->Dosen_Pembimbing1 ?></td>
													<td><?php echo $d->Dosen_Pembimbing2 ?></td>
													<td><?php echo $d->Tgl_lulus ?></td>
													<td><?php echo $d->status ?></td>
													<td><button type="button" class="btn btn-info"><?php echo anchor('tugas/update_disertasi/'.$d->id_disertasi,'Edit'); ?></button></td>
													<td><button type="button" class="btn btn-warning"><?php echo anchor('tugas/delete_disertasi/'.$d->id_disertasi,'Hapus',array('class'=>'delete_disertasi',
						'onclick'=>"return confirmDialog();")

													); ?></button></td>
												</tr>
												<?php } ?>


										<!-- End of content of table -->
										</tbody>
									</table>
									

									<div class="row">
									<div class="col-sm-6"><button class="btn btn-success"><?php echo anchor('tugas/add_disertasi/','Tambah Data',array('class'=>'add_disertasi')); ?></button></button></div>
									<div class="col-sm-4">Total Data : <?= $jumlah ?> data </div>

									<!--<div class="col-xs-1"><?= $pagination ?></div>-->
									<div class="col-sm-2"><?= $pagination ?></div>
								</div>
								</div><!--end .table-responsive -->
							</div><!--end .col -->
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
