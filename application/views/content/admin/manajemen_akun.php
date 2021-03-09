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
         <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989';?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990';?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990';?>" />
    
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
							<li class="active">Manajemen Akun</li>
						</ol>
					</div>
					<div class="section-body contain-lg">
                        <?php if($message != "" OR $message != null) {  if($message == "Berhasil Menambah Akun Baru"  OR $message == "Berhasil Menghapus Folder" OR $message == "Berhasil Menghapus Akun") { ?>
                        
                        <div class="alert alert-callout alert-success" role="alert">
					<strong>Selamat !</strong> <?= $message ?>
				</div>
                        
                        <?php } else { ?>
                        
                          <div class="alert alert-callout alert-warning" role="alert">
					<strong>Maaf !</strong> <?= $message ?>
				</div>
                        <?php } } ?>
                        
                      
                        <div class="col-lg-offset-1 col-md-12">
								<div class="card">
                                    <div class="card-head style-primary">
                                            <a class="btn btn-icon-toggle" href="<?php echo base_url().'Admin/tambah_akun/';?>"><i class="fa fa-plus"></i></a>
											<header>Tambah Akun</header>
										</div>
									<div class="card-body">
                                        <div class="table-responive">
										<table id="datatable1" class="table table-striped table-hover">
											<thead>
												<tr>
													<th>No</th>
													<th>Username</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
                                                <?php $no = 1; foreach($data as $data) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data->username ?></td>
                                                     <td class="text-right">
                                                    <a href="<?php echo base_url().'admin/edit_akun/'.$data->id;?>"><button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit Akun"><i class="fa fa-pencil"></i></button></a>
                                                    <a href="<?php echo base_url().'admin/hapus_akun/'.$data->id ;?>"><button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Hapus Akun" onclick="return confirm('Anda Yakin Ingin Menghapus Akun ini?');"><i class="fa fa-trash-o"></i></button></a>
									</td>
                                                
                                                </tr>
                                                <?php } ?>
                                            </tbody>
										</table>
                                            
                                        </div>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END DEFAULT TABLE -->
                        
                        
						
                        
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
    	<script src="<?php echo base_url().'assets/js/libs/DataTables/jquery.dataTables.min.js';?>"></script>
		<script src="<?php echo base_url().'assets/js/libs/bootstrap/bootstrap.min.js';?>"></script>
		<script src=".<?php echo base_url().'assets/js/libs/spin.js/spin.min.js';?>"></script>
        <script src="<?php echo base_url().'assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js';?>"></script>
        <script src="<?php echo base_url().'assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js';?>"></script>
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
		<script src="<?php echo base_url().'assets/js/core/demo/DemoTableDynamic.js';?>"></script>
        
        
        
        
		<!-- END JAVASCRIPT -->

	</body>
</html>
