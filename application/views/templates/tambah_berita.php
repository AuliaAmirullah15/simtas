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
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/libs/summernote/summernote.css?1425218701';?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/libs/toastr/toastr.css?1425466569';?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/libs/dropzone/dropzone-theme.css?1424887864';?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/libs/jquery-ui/jquery-ui-theme.css?1423393666';?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/libs/typeahead/typeahead.css?1424887863';?>" />
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

	<?php if($shape == 2) {
		foreach($data as $d)
		{
			$id = $d->id;
			$title = $d->judul;
			$konten = $d->konten;
			$gambar = $d->gambar;
		}

	} 
	?>

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
								<?php if($judul == 'Edit Berita') { ?>
									<div class="section-header">
										<ol class="breadcrumb">
											<li><a href="<?php echo base_url('tugas/list_berita');?>">List Berita</a></li>
											<li class="active"><?= $judul ?></li>
										</ol>
									</div>
								<?php } else { ?>

									<h2 class="text-primary"><?= $judul ?></h2>
								<?php } ?>
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
								<form class="form-horizontal" method="post" action="<?php if($shape == 1) { echo base_url().'tugas/post_berita'; } else { echo base_url().'tugas/proses_edit_berita/'.$id ;}?>" enctype="multipart/form-data">
									<div class="card">
										<div class="card-head style-primary">
											<header><?= $judul ?></header>
										</div>
										<div class="card-body">

										
											
											<div class="form-group">
												<label for="judul" class="col-sm-2 control-label">Judul</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="judul" name="judul" <?php if($shape == 2) { echo "value = '".$title."'" ; } ?>/>
												</div>
											</div>

											<div class="form-group">
													<label for="cover" class="col-sm-2 control-label">Foto Cover</label>
													<div class="col-sm-10">
													<img id="uploadPreview" src="<?php if($shape == 2 ) {if($gambar){ echo base_url().'cover_artikel/'.$gambar;} } ?>" style="width: 150px; height: 150px;" /><br>
													<?php if($shape == 2) {if(empty($gambar)) { ?>
													<input id="uploadImage" type="file" name="uploadImage" onchange="PreviewImage();">
													<?php }} else { ?>
													<input id="uploadImage" type="file" name="uploadImage" onchange="PreviewImage();">
													<?php } ?>
													</div>
											</div>

											<div class="form-group">
														<label for="Firstname5" class="col-sm-2 control-label">Isi Berita</label>
														<div class="col-sm-10"><textarea id="ckeditor" class="form-control control-12-rows" placeholder="Enter text ..." name="konten"><?php if($shape == 2) { echo $konten;} ?></textarea></div>
												</div>

									
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
		<script src="<?php echo base_url().'assets/js/libs/ckeditor/ckeditor.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/libs/ckeditor/adapters/jquery.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/core/demo/DemoFormEditors.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/libs/summernote/summernote.min.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/libs/dropzone/dropzone.min.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/core/demo/Demo.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/core/demo/DemoFormComponents.js';?>"></script>

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

<script type="text/javascript">
	
	//get the input and UL list
var input = document.getElementById('filesToUpload');
var list = document.getElementById('fileList');

//empty list for now...
while (list.hasChildNodes()) {
    list.removeChild(ul.firstChild);
}

//for every file...
for (var x = 0; x < input.files.length; x++) {
    //add to list
    var li = document.createElement('li');
    li.innerHTML = 'File ' + (x + 1) + ':  ' + input.files[x].name;
    list.append(li);
}
</script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
