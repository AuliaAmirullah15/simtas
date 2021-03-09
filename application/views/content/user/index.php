<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?= $title ?></title>

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

		<?php $this->load->view('headfoot/user/header') ?>

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
							<li class="active">A R C H I V E</li>
						</ol>
					</div>
					<div class="section-body contain-lg">
                        <!-- BEGIN SEARCH HEADER -->
							<div class="card-head style-primary">
								<div class="tools pull-left">
									<form action="<?php echo base_url().'User/search';?>" method="post" class="navbar-search" role="search">
										<div class="form-group">
											<input type="text" class="form-control" name="cari" placeholder="Enter your keyword">
										</div>
										<button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
									</form>
								</div>
							</div><!--end .card-head -->
							<!-- END SEARCH HEADER -->
                        
						<div class="row">
							<div class="col-lg-12">
								<div class="card card-tiles style-default-light">
									<div class="row">

										<!-- BEGIN ARTICLES -->
										<div class="col-sm-9">
											<article>
												<div class="card-body style-default-dark">
                                                    <h2>List Archive File</h2>
                                                    <div class="opacity-75">Jumlah Archive : <?= $jumlah ?> Files</div>
												</div>
												<div class="card-body style-default-bright">
													<div class="list-results list-results-underlined">
								    <h4><?php echo str_replace("%20"," ",$arsip); ?></h4>
                                                        <hr><hr>
                                            <!-- BEGIN RESULTS LIST -->
                                            <?php foreach($file as $file) { ?>
                                                <div class="col-xs-12">
													<p>
<!--														<a class="text-medium text-lg text-primary" href="<?php echo base_url().'/sharing_folder/'.$file->nama_folder.'/'.$file->nama_file;?>"><?= $file->nama_file ?></a>-->
                                                        
                                                        <a class="text-medium text-lg text-primary" href="<?php echo base_url().'User/download_file/'.$file->id_folder.'/'.$file->id_file;?>"><?= $file->nama_file ?></a>
													</p>
													<div class="contain-xs pull-left">
														<?= $file->deskripsi_file ?>
													</div>
												</div><!--end .col -->
											<?php } ?>
                                            <!-- END RESULTS LIST -->
											</div><!--end .list-results -->
											
                                                    
                                                </div>
											</article><!-- end article -->
										</div><!-- .col -->
										<!-- END ARTICLES -->

										<!-- BEGIN BLOG MENUBAR -->
										<div class="col-sm-3">
											<div class="card-body">
												<h3 class="text-light">Archives</h3>
                                                <ul class="nav nav-pills nav-stacked nav-transparent">
                                                        <li <?php if($arsip == 'Semua File') {echo 'class="active"';} ?>><a href="<?php echo base_url().'User/index';?>"><span class="badge pull-right"><?= $all ?></span>Semua File</a>
                                                       
                                                    </li>
												</ul>
                                                <ul class="nav nav-pills nav-stacked nav-transparent">
                                                        <li <?php if($arsip == 'populer') {echo 'class="active"';} ?>><a href="<?php echo base_url().'User/populer';?>"><span class="badge pull-right"></span>Populer Download</a></li>
												</ul>
												<ul class="nav nav-pills nav-stacked nav-transparent">
                                                    <?php foreach($direktori as $dir){ ?>
                                                        <li <?php if(str_replace("%20"," ",$arsip) == $dir->nama_folder) {echo 'class="active"';} ?>><a href="<?php echo base_url().'User/arsip_file/'.$dir->id.'/'.$dir->nama_folder;?>"><span class="badge pull-right"><?= $dir->jumlah ?></span><?= $dir->nama_folder ?></a></li>
                                                    <?php } ?>
												</ul>
											</div><!-- .card-body -->
										</div><!--end .col -->

										<!-- BEGIN BLOG MENUBAR -->
									</div><!-- .row -->
								</div>
							</div><!--end .col -->
						</div><!--end .row -->

						<!-- BEGIN PAGINATION -->
								<div class="row">
									
									<div class="col-sm-12"><center>Jumlah Archive : <?= $jumlah ?> Files</center> </div>
								</div>

								<div class="row">
									<!--<div class="col-xs-1"><?= $pagination ?></div>-->
									<div class="col-sm-12"><center><ul class="pagination"><?= $pagination ?></center></ul></div>
								</div>
						<!-- END PAGINATION -->

					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->

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
