<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<?php 
		if(!isset($_SESSION['username']))
		{
			redirect('tugas/login');
		}
	?>
	<head>
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
		<style>
		.padding-col {
			margin-top :100px;
		}
		</style>
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
				<?php 
					if($message != '')
				{

					if($message == 'belum_pilih_gambar' || $message == 'Headline Tidak Bisa Lebih Dari 3, Unset judul yang sekarang jadi Headline'){
						echo "
					<div class='row'>
					<div class='col-lg-12'>
		
					<div class='alert alert-warning' role='alert'>
					<strong>Maaf!</strong> $message
				</div></div></div>";
			} else {
					echo "
					<div class='row'>
					<div class='col-lg-12'>
		
					<div class='alert alert-success' role='alert'>
					<strong>Well done!</strong> $message
				</div></div></div>";
				}
			}


			?>
			<div class="row">
			<div class="col-lg-12">
								<h2 class="text-primary">List Berita</h2>
							</div><!--end .col -->
			</div>
						<!-- BEGIN HORIZONTAL FORM -->
							<div class="row">

								
							<div class="card">
							<div class="card-body">
						
							<div class="col-lg-12">
								<div class="table-responsive">
									<table id="datatable1" class="table table-striped table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th>Judul</th>
												<th>Author</th>
												<th class="sort-numeric">Tanggal Upload</th>
												<th class="sort-alpha">Status</th>
												<th class="sort-alpha">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1; foreach($data as $d) { ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $d->judul ?></td>
												<td><?= $d->author ?></td>
												<td><?= $d->tanggal_posting ?></td>
												<td><?= $d->status ?></td>
												<td>
												<?php echo anchor('tugas/edit_berita/'.$d->id,'<button type="button" class="btn btn-warning" >Edit</button>'); ?>
														<?php if($d->status == 'display') { ?>
														<?php echo anchor('tugas/hidden_berita/'.$d->id,'<button type="button" class="btn btn-success" >Hidden</button>'); ?>

														<?php } else { ?>

													<?php echo anchor('tugas/display_berita/'.$d->id,'<button type="button" class="btn btn-info" >Display</button>'); ?><?php } ?>
													<?php if($d->headline == '0') { ?><?php echo anchor('tugas/set_headline/'.$d->id, '<button type="button" class="btn btn-danger">SET Headline</button>'); ?><?php } else { ?><?php echo anchor('tugas/unset_headline/'.$d->id, '<button type="button" class="btn btn-success">UNSET Headline</button>'); ?><?php } ?>
												</td></tr>

											<?php } ?>
											
										</tbody>
									</table>
								</div><!--end .table-responsive -->
							</div><!--end .col -->
							</div>
							</div>
						</div><!--end .row -->
						<!-- END DATATABLE 1 -->
						
					

					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->

			<!-- BEGIN MENUBAR-->
				<?php $this->load->view('main_templates/menu_bar') ?>
			<!-- END MENUBAR -->

			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS RIGHT -->

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
