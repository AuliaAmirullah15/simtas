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

			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-header">
						<ol class="breadcrumb">
							<li class="active">Dashboard</li>
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
						<!-- BEGIN STRUCTURE  -->
						<div class="row">
							<div class="col-lg-12">
								<h4>Folder</h4>
							</div>
						</div><!--end .row -->
						<div class="row">
							<div class="col-lg-offset-1 col-md-8">
								<div class="panel-group" id="accordion1">
                                     <div class="card panel">
										<div class="card-head collapsed" data-toggle="collapse" data-parent="#accordion1" data-target="#accordion1-6">
											<header>Tambah Folder</header>
											<div class="tools">
												<a class="btn btn-icon-toggle"><i class="fa fa-plus"></i></a>
											</div>
										</div>
										<div id="accordion1-6" class="collapse">
                                        <form method="post" action="<?php echo base_url().'Admin/tambah_direktori';?>" >
                                        	<div class="card-body">
                                                <div>
												<label class="radio-inline radio-styled">
													<input type="radio" name="akses" value="public" checked><span>Public</span>
												</label>
												<label class="radio-inline radio-styled">
													<input type="radio" name="akses" value="private"><span>Private</span>
												</label>
                                                </div>
                                                <br>
                                          <div class="form-group">
												<input type="text" class="form-control" id="Username2" name="nama_folder" required data-rule-minlength="2">
												<label for="Username2">Nama Folder</label>
											</div>
                                                
                                                <div class="card-actionbar">
											<div class="card-actionbar-row">
												<button type="submit" class="btn btn-flat btn-primary ink-reaction">Create Folder</button>
											</div>
										</div>
                                        </div>
                                        </div>
									</div><!--end .panel -->
                                    
                                    <?php foreach($data as $data) { ?>
									<div class="card panel">
                                        
                                    <a href="<?php echo base_url().'Admin/detail_folder/'.$data->id ; ?>">
										<div class="card-head collapsed">
											<header><?= $data->nama_folder ?></header>
										</div>
                                    </a>
								
									</div><!--end .panel -->
                                    <?php } ?>
                                         
								</div><!--end .panel-group -->
								<em class="text-caption">File Sharing</em>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END STRUCTURE -->
                        
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->

			<?php $this->load->view('headfoot/admin/menubar') ?>

		</div><!--end #base-->
		<!-- END BASE -->

		<!-- BEGIN JAVASCRIPT -->
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
        
        
        
		<!-- END JAVASCRIPT -->

	</body>
</html>
