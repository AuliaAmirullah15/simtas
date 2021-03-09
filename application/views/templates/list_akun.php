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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom_css.css');?>">
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
				<section class="style-default-bright">
					<div class="section-header">
				
						<h2 class="text-primary">List Akun</h2>
					</div>
					<div class="section-body">

						<?php if($message != '' AND $message != null) {

							echo "

					<div class=\"section-body\">
						<div class=\"alert alert-success\" role=\"alert\">
							<strong>Well done!</strong> ". $message."</div>"; } ?> 
                        
        						<div class="table-responsive">
									<table id="datatable1" class="table table-striped table-hover">
									<?php if($active == 'akun') { ?>
										<thead>
											<tr>
												<th>No</th>
												<th class="sort-numeric">NIM</th>
												<th class="sort-alpha">Nama</th>
												<th class="sort-numeric">Username </th>
												<th class="sort-numeric">Prodi</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<!-- content of table -->
												<?php 
													
													$no = 1; foreach($data as $d){ 
												?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $d->nim ?></td>
													<td><?php echo $d->nama ?></td>
													<td><?php echo $d->username ?></td>
													<td><?php echo $d->nama_PS ?></td>
                                                    <td><ul class="list-table"><li><?php echo anchor('tugas/update_akun/'.$d->nim,'<i class="fa fa-pencil" title="Edit"></i>'); ?></li>
													<li><?php echo anchor('tugas/delete_akun/akun/'.$d->username,'<i class="fa fa-trash-o title="Hapus" OnClick="return confirm(\'Yakin Ingin Menghapus Data ini ?\')"></i>',array('class'=>'delete_akun',
						'onclick'=>"return confirmDialog('Yakin Ingin Menghapus?');")

                                                                         ); ?></li></ul></td>
												</tr>
												<?php } ?>
										<!-- End of content of table -->
										</tbody>
									<?php } else if($active == 'akun_user') { ?>
                                        
                                        <thead>
											<tr>
												<th>No</th>
												<th class="sort-alpha">Nama</th>
												<th class="sort-numeric">Username </th>
												<th class="sort-numeric">Prodi</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<!-- content of table -->
												<?php 
													
													$no = 1; foreach($data as $d){ if($d->username == 'admin') { continue; } 
												?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $d->nama ?></td>
													<td><?php echo $d->username ?></td>
													<td><?php echo $d->prodi ?></td>
                                                    <td><ul class="list-table"><li><?php echo anchor('tugas/update_akun_user/'.$d->username,'<i class="fa fa-pencil" title="Edit"></i>'); ?></li>
													<li><?php echo anchor('tugas/delete_akun/akun_user/'.$d->username,'<i class="fa fa-trash-o title="Hapus" OnClick="return confirm(\'Yakin Ingin Menghapus Data ini ?\')"></i>',array('class'=>'delete_akun',
						'onclick'=>"return confirmDialog('Yakin Ingin Menghapus?');")

                                                                         ); ?></li></ul></td>
												</tr>
												<?php } ?>
										<!-- End of content of table -->
										</tbody>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        <?php } else { ?>

										<thead>
											<tr>
												<th>No</th>
												<th class="sort-numeric">ID Dosen</th>
												<th class="sort-alpha">Nama Dosen</th>
												<th class="sort-numeric">Username </th>
												<th class="sort-numeric">Program Studi</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<!-- content of table -->
												<?php 
													
													$no = 1; foreach($data as $d){ 
												?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $d->Kode_dosen ?></td>
													<td><?php echo $d->Nama_dosen ?></td>
													<td><?php echo $d->username ?></td>
													<td><?php echo $d->nama_PS ?></td>
													<td><button type="button" class="btn btn-info"><?php echo anchor('tugas/update_akun_dosen/'.$d->Kode_dosen,'Edit'); ?></button>
													<button type="button" class="btn btn-warning" OnClick="return confirm('Yakin Ingin Menghapus Data ini ?')"><?php echo anchor('tugas/delete_akun/akun dosen/'.$d->username,'Hapus',array('class'=>'delete_akun',
						'onclick'=>"return confirmDialog('Yakin Ingin Menghapus?');")

													); ?></button></td>
												</tr>
												<?php } ?>
										<!-- End of content of table -->
										</tbody>

									<?php } ?>
									</table>
									</div>
								<div class="row">
									<?php if($active == 'akun') { ?>
									<div class="col-sm-6"><?php echo anchor('tugas/tambah_akun/','<button type="button" class="btn btn-success"><span><i class="fa fa-plus-square"></i></span> Tambah Akun</button>',array('class'=>'tambah_akun')); ?></div>
								<?php } else { ?>
										<div class="col-sm-6"><button type="button" class="btn btn-success"><?php echo anchor('tugas/tambah_akun_dosen/akun','Tambah Akun',array('class'=>'tambah_akun')); ?></button></div>
								<?php } ?>
									
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
