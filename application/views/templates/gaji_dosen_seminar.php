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
		<meta prefix="og: http://ogp.me/ns#" property="og:title" content="HideSeek jQuery plugin" />
  		<meta prefix="og: http://ogp.me/ns#" property="og:type" content="website" />
  		<meta prefix="og: http://ogp.me/ns#" property="og:image" content="http://vdw.github.io/HideSeek/images/hideseek_logo.png" />
  		<meta prefix="og: http://ogp.me/ns#" property="og:url" content="http://vdw.github.io/HideSeek/" />
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
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/jquery.datatables.min.css');?>" />
 		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/vendor/normalize.css');?>">
 		
 		 
 		 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/vendor/github.css');?>">
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
			<div class="section-header">
						<ol class="breadcrumb">
							<li class="active">Gaji Dosen Seminar</li>
						</ol>
					</div>
			<?php if($message != ' ' AND $message != null) {

							echo "

					<div class=\"section-body\">
						<div class=\"alert alert-success\" role=\"alert\">
							<strong>Well done!</strong>". $message."</div>"; } ?>
			<div class="section-body contain-lg">

			<div class="card">
							<div class="card-body">
							<?php foreach($gaji as $fee) 
							{
								$pembimbing1 = $fee->pembimbing1;
								$pembimbing2 = $fee->pembimbing2;
								$pembanding1 = $fee->pembanding1;
								$pembanding2 = $fee->pembanding2;
							} ?>
							<?php $i =1; ?>
								<form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'tugas/update_gaji';?>" >

									<!-- PEMBIMBING -->
									<?php while($i <= 2) { ?>
									<div class="form-group">
										<label for="pembimbing<?php echo $i;?>" class="col-sm-2 control-label">Pembimbing <?php echo $i;?> </label>
										<div class="col-sm-10">
											<div class="input-group">
												<span class="input-group-addon"><i>Rp</i></span>
												<div class="input-group-content">

													<input type="number" class="form-control" name="<?php if($i==1) {echo 'pembimbing1';} else{echo 'pembimbing2';}?>" value="<?php if($i== 1) {echo $pembimbing1;} else {echo $pembimbing2;}?>">
												
												</div>
												<span class="input-group-addon">.00</span>
											</div>
										</div>
									</div><!--end PEMBIMBING  -->
									<?php $i++; } ?>
								
									<!-- PEMBANDING -->
									<?php $i = 1 ?>
									<?php while($i <= 2) { ?>
									<div class="form-group">
										<label for="pembanding<?php echo $i;?>" class="col-sm-2 control-label">Pembanding <?php echo $i;?> </label>
										<div class="col-sm-10">
											<div class="input-group">
												<span class="input-group-addon"><i>Rp</i></span>
												<div class="input-group-content">
													<input type="number" class="form-control" name="<?php if($i==1) {echo 'pembanding1';} else{echo 'pembanding2';}?>" value="<?php if($i == 1) {echo $pembanding1;} else {echo $pembanding2;} ?>">
												</div>
												<span class="input-group-addon">.00</span>
											</div>
										</div>
									</div><!--end PEMBIMBING 1 -->
									<?php $i++; } ?>
									
									<div class="form-group">
										
										<div class="col-sm-2 control-label">
											<div class="input-group">
												<div class="input-group-btn">
													<button type="submit" class="btn btn-default" onclick="return confirm('Apakah anda yakin mengedit kolom fee?')">SAVE</button>
												</div>
											</div>
										</div>
									</div><!--end .form-group -->

								</form>
							</div><!--end .card-body -->
						</div><!--end .card -->
					</div>
					</section>
				</div>
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
		<script src="<?php echo base_url('assets/js/libs/DataTables/search.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/vendor/jquery.hideseek.min.js');?>"></script>
 		<script type="text/javascript" src="<?php echo base_url('assets/js/vendor/rainbow-custom.min.js');?>"></script>
 		<script type="text/javascript" src="<?php echo base_url('assets/js/vendor/jquery.anchor.js');?>"></script>
 		<script src="<?php echo base_url('assets/js/initializers.js');?>"></script>
		<!-- END JAVASCRIPT -->

		<?php if(!empty($set)){ ?>
			<script type="text/javascript">
				$(document).ready(function() {
					$(".pagination a").click(function() {
						var link = $(this).get(0).href;
					    var form = $('.form');
					    form.attr('action', link);
					    form.submit();
					    return false;
					});

				});
			</script>
		<?php } ?>
	</body>
</html>
