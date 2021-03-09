<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Custom File Inputs | Codrops</title>
		<meta name="description" content="Demo for the tutorial: Styling and Customizing File Inputs the Smart Way" />
		<meta name="keywords" content="cutom file input, styling, label, cross-browser, accessible, input type file" />
		<meta name="author" content="Osvaldas Valutis for Codrops" />
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/normalize.css';?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/demo.css';?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/component.css';?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/custom.css';?>" />
		<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/normalize.css';?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/demo.css';?>" />
		
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/bootstrap.css?1422792965';?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/materialadmin.css?1425466319';?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/font-awesome.min.css?1422529194';?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/material-design-iconic-font.min.css?1421434286';?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/libs/dropzone/dropzone-theme.css?1424887864';?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/libs/jquery-ui/jquery-ui-theme.css?1423393666';?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/libs/bootstrap-colorpicker/bootstrap-colorpicker.css?1424887860';?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/libs/bootstrap-tagsinput/bootstrap-tagsinput.css?1424887862';?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/libs/typeahead/typeahead.css?1424887863';?>" />
        
        <style>
            .inputfile-6 + label {
                border: 1px solid #0aa89e;
    background-color: #B2EBF2;
    padding: 0;
            }
            
            .inputfile-6 + label {
                color: #0aa89e;
            }
        </style>
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- remove this if you use Modernizr -->
		<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
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
                            
                        
					<input type="file" name="berkas[]" id="file-7" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
					<label for="file-7"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
                                            
                                            	<div class="card-actionbar">
											<div class="card-actionbar-row">
												<button type="submit" class="btn btn-flat btn-primary ink-reaction" name="tombol" value="upload">Upload</button>
											</div>
										</div>
                                                    
                                                            </div></div>
                                                        
                                                        
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
			

		<script src="<?php echo base_url().'assets/js/custom-file-input.js';?>"></script>
        <script src="<?php echo base_url().'assets/js/custom-file-input.js';?>"></script>
        <script src="<?php echo base_url().'assets/js/jquery-v1.min.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/jquery.custom-file-input.js';?>"></script>
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

		<!-- // If you'd like to use jQuery, check out js/jquery.custom-file-input.js
		<script src="js/jquery-v1.min.js"></script>
		<script src="js/jquery.custom-file-input.js"></script>
		-->

	</body>
</html>
