<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?= $title ?></title>

        
        <?php 
		if(!isset($_SESSION['username']))
		{
			redirect('Admin/login');
		}
        
        if(isset($_SESSION['level']) != '1')
        {
            redirect('Admin/login');
        }
	?>
        
		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
         <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/custom.css';?>" />
		<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/bootstrap.css?1422792965';?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/materialadmin.css?1425466319';?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/font-awesome.min.css?1422529194';?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/material-design-iconic-font.min.css?1421434286';?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/libs/dropzone/dropzone-theme.css?1424887864';?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/libs/jquery-ui/jquery-ui-theme.css?1423393666';?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/libs/bootstrap-colorpicker/bootstrap-colorpicker.css?1424887860';?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/libs/bootstrap-tagsinput/bootstrap-tagsinput.css?1424887862';?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/libs/typeahead/typeahead.css?1424887863';?>" />
         <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dropzone.css';?>" />
        
    
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed menubar-pin ">

		<?php $this->load->view('headfoot/admin/header') ?>

		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->
            <?php foreach($data as $data) {
                    $id = $data->id;
                    $nama_folder = $data->nama_folder;
            } ?>

			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-header">
						<ol class="breadcrumb">
                            <li><a href="<?php echo base_url().'Admin/index';?>">Dashbord</a></li>
                            <li><a href="<?php echo base_url().'Admin/detail_folder/'.$id;?>"><?= $nama_folder ?></a></li>
							<li class="active">Upload File Baru</li>
						</ol>
					</div>
					<div class="section-body contain-lg">
                        <?php if($message != "" OR $message != null) {  if($message == "Berhasil Menambah Folder Baru"  OR $message == "Berhasil Menghapus Folder") { ?>
                        
                        <div class="alert alert-callout alert-success" role="alert">
					<strong>Selamat !</strong> <?= $message ?>
				</div>
                        
                        <?php } else { ?>
                        
                          <div class="alert alert-callout alert-warning" role="alert">
					<strong>Maaf !</strong> <?= $message ?>
				</div>
                        <?php } } ?>
					
                      	<!-- BEGIN BLOG POST TEXT -->
										<div class="col-md-12">
											<article class="style-default-bright">
												<div class="card-body">
												<!-- Start Form Pengajuan Judul -->
													<form class="form" method="post" action="<?php echo base_url().'admin/proses_upload/'.$id;?>" enctype="multipart/form-data">
									<div class="card">
										<div class="card-head style-primary">
											<header>Upload File</header>
										</div>
										<div class="card-body floating-label">
										<h4>Upload File </h4>
										<hr>
								        
                                        <div class="form-group">
												<input type="text" class="form-control" id="Username2" name="judul_file">
												<label for="Username2">Judul File</label>
											</div>
											<div class="form-group">
                                                <textarea class="form-control" name="deskripsi"></textarea>
												<label for="Password2">Deskripsi File</label>
											</div>
                            
            
                                        <div class="form-group">
										<input name="berkas[]" id="berkas" type="file" multiple="multiple">
										<label for="upload" class="control-label">Upload File</label>
                                        </div>
                                            
	
											
										</div><!--end .card-body -->
										<div class="card-actionbar">
											<div class="card-actionbar-row">
												<button type="submit" class="btn btn-flat btn-primary ink-reaction" name="tombol" value="upload">Upload</button>
											</div>
										</div>
									</div><!--end .card -->
									
								</form>
												</div><!--end .card-body -->
											</article>
										</div><!--end .col -->
										<!-- END BLOG POST TEXT -->
                        
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->

			<?php $this->load->view('headfoot/admin/menubar') ?>

		</div><!--end #base-->
		<!-- END BASE -->

		<!-- BEGIN JAVASCRIPT -->
      
<script type="text/javascript" src="<?php echo base_url().'assets/js/dropzone.js';?>"></script>
        <script src="<?php echo base_url().'assets/js/libs/moment/moment.min.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/libs/jquery/jquery-1.11.2.min.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/libs/jquery/jquery-migrate-1.2.1.min.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/libs/bootstrap/bootstrap.min.js';?>"></script>
		<script src=".<?php echo base_url().'assets/js/libs/spin.js/spin.min.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/libs/autosize/jquery.autosize.min.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/libs/nanoscroller/jquery.nanoscroller.min.js';?>"></script>
        <script src="<?php echo base_url().'assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/core/source/App.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/core/source/AppNavigation.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/core/source/AppOffcanvas.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/core/source/AppCard.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/core/source/AppForm.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/core/source/AppNavSearch.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/core/source/AppVendor.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/core/demo/Demo.js';?>"></script>
        <script src="<?php echo base_url().'assets/js/libs/jquery-validation/dist/jquery.validate.min.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/libs/jquery-validation/dist/additional-methods.min.js';?>"></script>
        <script src="<?php echo base_url().'assets/js/libs/jquery-ui/jquery-ui.min.js';?>"></script>
        <script src="<?php echo base_url().'assets/js/libs/multi-select/jquery.multi-select.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/libs/inputmask/jquery.inputmask.bundle.min.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/libs/typeahead/typeahead.bundle.min.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/libs/dropzone/dropzone.min.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/core/demo/DemoFormComponents.js';?>"></script>
        
        
        
		<!-- END JAVASCRIPT -->

	</body>
</html>
