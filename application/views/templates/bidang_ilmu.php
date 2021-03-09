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

						<!-- BEGIN VERTICAL FORM -->
						
						<div class="section-header">
										<ol class="breadcrumb">
											<li><a href="<?php echo base_url('tugas/prodi');?>">List Prodi</a></li>
                                            <li><a href="<?php echo base_url('tugas/update_prodi/'.$pro);?>">Edit Program Studi</a></li>
                                            
											<li class="active">Bidang Ilmu</li>
										</ol>
					</div>
						<div class="row">
							
							
							<div class="col-lg-12 col-md-8">
                                <?php if($access == 1) { ?>
								<form class="form" method="post" action="<?php echo base_url().'tugas/insert_bidang';?>" /> 
									<div class="card">
										<div class="card-head style-primary">
											<header>Tambah Data Bidang Ilmu</header>
										</div>
										<div class="card-body">
											<div class="form-group">
												<select id="prodi" name="prodi" class="form-control">
												<?php
													foreach($prodi as $prodi)
													{
                                                        if($prodi->id_PS == $pro)
                                                        {
                                                            echo "<option value='".$prodi->id_PS."' selected>".$prodi->nama_PS."</option>";
                                                        }
                                                        else
                                                        {
														echo "<option value='".$prodi->id_PS."'>".$prodi->nama_PS."</option>";
                                                        }
                                                        
													}

												 ?>
											</select>
											</div>
											<div class="form-group">
												<input type="text" class="form-control" id="Username1" name="bidang_ilmu">
												<label for="Username1">Bidang Ilmu</label>
											</div>
											
										</div><!--end .card-body -->
										<div class="card-actionbar">
											<div class="card-actionbar-row">
												<button type="submit" class="btn btn-flat btn-primary ink-reaction">Edit</button>
											</div>
										</div>
									</div><!--end .card -->
								
								</form>
                            <?php } else {
                            
                            foreach($data as $data) {
                                $bidang_ilmu = $data->bidang_ilmu;
                                $id = $data->id;
                                $prd = $data->prodi;
                            }
                            
                            ?>
                                <form class="form" method="post" action="<?php echo base_url().'tugas/update_bidang/'.$pro.'/'.$id;?>" /> 
									<div class="card">
										<div class="card-head style-primary">
											<header>Edit Data Bidang Ilmu</header>
										</div>
										<div class="card-body">
											<div class="form-group">
												<select id="prodi" name="prodi" class="form-control">
												<?php
													foreach($prodi as $prodi)
													{ 
                                                        if($prodi->id_PS == $prd)
                                                        {
                                                            echo "<option value='".$prodi->id_PS."' selected>".$prodi->nama_PS."</option>";
                                                        }
                                                        else {
														echo "<option value='".$prodi->id_PS."'>".$prodi->nama_PS."</option>";
                                                        }
													}

												 ?>
											</select>
											</div>
											<div class="form-group">
												<input type="text" class="form-control" id="Username1" name="bidang_ilmu" value="<?= $bidang_ilmu ?>">
												<label for="Username1">Bidang Ilmu</label>
											</div>
											
										</div><!--end .card-body -->
										<div class="card-actionbar">
											<div class="card-actionbar-row">
												<button type="submit" class="btn btn-flat btn-primary ink-reaction">Edit</button>
											</div>
										</div>
									</div><!--end .card -->
								
								</form>
                            
                            <?php } ?>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END VERTICAL FORM -->
                
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
        <script src="<?php echo base_url('assets/js/libs/autosize/jquery.autosize.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/DataTables/jquery.dataTables.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/nanoscroller/jquery.nanoscroller.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/core/demo/DemoTableDynamic.js');?>"></script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
