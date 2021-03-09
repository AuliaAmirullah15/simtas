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
				<section>
					
					<div class="section-body contain-lg">

						<!-- BEGIN HORIZONTAL FORM -->
						<div class="row">
							<div class="col-lg-12">
								<h2 class="text-primary">Akun dan Data Dosen</h2>
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
								<form class="form-horizontal" method="post" action="<?php echo base_url().'tugas/insert_adv/'.$activated;?>" enctype="multipart/form-data">
									<div class="card">
										<div class="card-head style-primary">
											<header>Tambah Dosen dan Akun Dosen</header>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label for="Kode Dosen" class="col-sm-4 control-label">Kode Dosen</label>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="Kode_dosen" name="Kode_dosen"/>
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="Nama Dosen" class="col-sm-4 control-label">Nama Dosen</label>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="Nama_dosen" name="Nama_dosen"/>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label for="Kode Dosen" class="col-sm-4 control-label">Username</label>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="username" name="username"/>
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="Nama Dosen" class="col-sm-4 control-label">Password</label>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="password" name="password"/>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="Pangkat" class="col-sm-2 control-label">Pangkat</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="Pangkat" name="Pangkat"
													/>
												</div>
											</div>
											<div class="form-group">
												<label for="Golongan" class="col-sm-2 control-label">Golongan</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="Golongan" name="Golongan"/>
												</div>
											</div>
											<div class="form-group">
												<label for="NIP" class="col-sm-2 control-label">NIP</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="NIP" name="NIP" />
												</div>
											</div>
												<div class="form-group">
												<label for="NIDN" class="col-sm-2 control-label">NIDN</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="NIDN" name="NIDN" />
												</div>
											</div>
											<div class="form-group">
												<label for="Kode Prodi" class="col-sm-2 control-label">Kode Prodi</label>
												<div class="col-sm-10">
													<select class="form-control" id="Kode_PS" name="Kode_PS" >
													<?php 
														foreach($prodi as $pro)
														{
															echo "<option value='$pro->id_PS'>$pro->nama_PS</option>";

														}
													?>

													</select>
												</div>
											</div>
                                           <div class="form-group">
													<label for="cover" class="col-sm-2 control-label">Tanda Tangan</label>
													<div class="col-sm-10">
													<img id="uploadPreview" src="<?php echo base_url().'assets/img/avatar1.jpg'; ?>" style="width: 150px; height: 150px;" /><br>
													
													<input id="uploadImage" type="file" name="uploadImage" onchange="PreviewImage();">
												
													</div>
											</div>
										</div><!--end .card-body -->
										<div class="card-actionbar">
											<div class="card-actionbar-row">
												<button type="submit" class="btn btn-flat btn-primary ink-reaction" value="save">Save</button>
											</div>
										</div>
									</div><!--end .card -->
									<em class="text-caption">Horizontal layout</em>
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
        <script type="text/javascript">
function PreviewImage() {
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
oFReader.onload = function (oFREvent)
 {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
};
};
</script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
