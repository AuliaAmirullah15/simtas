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

              <?php foreach($detail as $detail) { 
                                $id = $detail->id;
                                $nama_folder = $detail->nama_folder;
                                $akses = $detail->akses;
                            } ?>
            
			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-header">
						<ol class="breadcrumb">
                            <li><a href="<?php echo base_url().'Admin/index';?>">Dashboard</a></li>
                           <li class="active"><?= $nama_folder ?></li>
						</ol>
					</div>
					<div class="section-body contain-lg">

                         <?php if($message != "" OR $message != null) {  if($message == "Berhasil Mengubah Detail Folder" OR $message == "Berhasil Menghapus Folder" OR $message == "Sukses Mengupload File" OR $message == "Sukses Menghapus File") { ?>
                        
                        <div class="alert alert-callout alert-success" role="alert">
					<strong>Selamat !</strong> <?= $message ?>
				</div>
                        
                        <?php } else { ?>
                        
                          <div class="alert alert-callout alert-warning" role="alert">
					<strong>Maaf !</strong> <?= $message ?>
				</div>
                        <?php } } ?>
                        
						<!-- BEGIN INVERSED FORM -->
						<div class="row">
							<div class="col-lg-12">
								<h4>Deskripsi Folder</h4>
							</div><!--end .col -->
							
                          
                            
							<div class="col-lg-offset-1 col-md-12">
								<form class="form" method="post" action="<?php echo base_url().'Admin/update_folder/'.$id."/".$nama_folder ; ?>">
									<div class="card style-default-dark">
								
										<div class="card-body form-inverse">
											
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<input type="text" class="form-control" name="nama_folder" value="<?= $nama_folder ?>" id="Firstname3">
														<label for="Firstname3">Nama Folder</label>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<div>
												<label class="radio-inline radio-styled">
													<input type="radio" name="akses" value="public" <?php if($akses == 'public') {echo "checked";} ?>><span>Public</span>
												</label>
												<label class="radio-inline radio-styled">
													<input type="radio" name="akses" value="private" <?php if($akses == 'private') {echo "checked";} ?>><span>Private</span>
												</label>
											</div>
													</div>
												</div>
                                            </div>
										</div><!--end .card-body -->
										<div class="card-actionbar">
											<div class="card-actionbar-row">
												<button type="submit" name="button" value="update" class="btn btn-flat btn-default-light ink-reaction">Simpan Perubahan</button>
                                                <button type="submit" name="button" value="delete" class="btn btn-flat btn-default-light ink-reaction" onclick="return confirm('Semua Data di Dalam Folder ini akan dihapus! Apakah Anda Yakin Ingin Menghapus Folder Ini?');">Hapus Folder</button>
											</div>
                                           
										</div>
									</div><!--end .card -->
								</form>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END INVERSED FORM -->
                      
                        <div class="col-lg-12">
								<h4>Files</h4>
							</div><!--end .col -->
                        <div class="col-lg-offset-1 col-md-12">
								<div class="card">
                                    <div class="card-head style-primary">
                                            <a class="btn btn-icon-toggle" href="<?php echo base_url().'Admin/file_uploaded/'.$id;?>"><i class="fa fa-plus"></i></a>
											<header>Upload File Baru</header>
										</div>
									<div class="card-body">
                                        <div class="table-responive">
										<table id="datatable1" class="table table-striped table-hover">
											<thead>
												<tr>
													<th>No</th>
													<th>Nama File</th>
                                                    <th>Judul File</th>
													<th>Tanggal Upload</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $no = 1; foreach($file as $file) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><a href="<?php echo base_url().'sharing_folder/'.$nama_folder.'/'.$file->nama_file;?>"><?= $file->nama_file ?></a></td>
                                                    <td><?= $file->judul_file ?></td>
                                                    <td><?= $file->tanggal_submit ?></td>
                                                    <td class="text-right">
                                                    <a href="<?php echo base_url().'admin/edit_file/'.$file->id;?>"><button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit File"><i class="fa fa-pencil"></i></button></a>
                                                    <a href="<?php echo base_url().'admin/hapus_file/'.$file->id.'/'.$id ;?>"><button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete File" onclick="return confirm('Anda Yakin Ingin Menghapus File ini?');"><i class="fa fa-trash-o"></i></button></a>
									</td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
										</table>
                                            <a href="<?php echo base_url().'Admin/file_uploaded/'.$id;?>"><button class="style-primary"><i class="fa fa-plus"></i> Upload File Baru</button></a>
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
