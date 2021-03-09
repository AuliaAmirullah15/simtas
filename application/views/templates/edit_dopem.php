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
        <style>
            #display {
                color: indianred;
                font-weight: 200;
                font-style: oblique;
                font: bold;
            }
        </style>
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed">

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

                <?php
                
                foreach($pembanding as $p) {
                    $nim = $p->nim;
                    $pembanding1 = $p->pembanding1;
                    $pembanding2 = $p->pembanding2;
                }
                
                ?>
				<section>
				<div class="section-body">

				
					<div class="section-body contain-lg">
						<?php if($message != '' OR $message != NULL) { 
    echo 

					"<div class=\"alert alert-success\" role=\"alert\">
							<strong>".$message."</strong></div>";}?>
						<!-- BEGIN HORIZONTAL FORM -->
						<div class="row">
							<ol class="breadcrumb">
											<li><a href="<?php echo base_url('tugas/penentuan_pembanding');?>">Daftar Penentuan Pembanding</a></li>
											<li class="active">Penentuan Pembimbing</li>
										</ol>

							<div class="col-lg-12">
								
									<div class="card">
										<div class="card-head style-primary">
											<header>Pengajuan Judul</header>
										</div>

									<form class="form-horizontal form-validate floating-label" method="post" action="<?php echo base_url().'tugas/proses_update_pembanding_kaprodi/'.$nim;?>" novalidate="novalidate">
										<div class="card-body">
											<h4>Dosen Pembanding</h4>
											<hr>
											<div class="form-group">
												<label for="Pembanding" class="col-sm-2 control-label">Pembanding 1</label>
												<div class="col-sm-10">
													<select id="pembanding1" name="pembanding1" class="form-control">
						                              <?php foreach($dosen2 as $d) {
                                                            if($d->Kode_dosen == 'NO') {
                                                        ?>
                                                        
                                                         <option value="<?= $d->Kode_dosen ?>" <?php if($pembanding1 == 'NULL' or $pembanding1 == 'NO') { echo "selected='selected'";} ?>><?= $d->Nama_dosen ?></option>
                                                        
                                                        <?php } else { ?>
                                                        
                                                        <option value="<?= $d->Kode_dosen ?>" <?php if($d->Kode_dosen == $pembanding1) { echo "selected='selected'";} ?>><?= $d->Nama_dosen ?></option>
                                                        
                                                        <?php }} ?>
                                                        

											
													</select>
													
												</div>
											</div>
											<div class="form-group">
												<label for="Pembanding" class="col-sm-2 control-label">Pembanding 2</label>
												<div class="col-sm-10">
														<select id="pembanding2" name="pembanding2" class="form-control">
						                                  
                                                         <?php foreach($dosen3 as $t) {
                                                            
                                                            if($t->Kode_dosen == 'NO') { 
                                                            ?>
                                                                 <option value="<?= $t->Kode_dosen ?>" <?php if($pembanding2 == 'NULL' or $pembanding2 == 'NO') { echo "selected='selected'";} ?>><?= $t->Nama_dosen ?></option>
                                                            <?php } else { ?>
                                                        <option value="<?= $t->Kode_dosen ?>" <?php if($t->Kode_dosen == $pembanding2) { echo "selected='selected'";} ?>><?= $t->Nama_dosen ?></option>
                                                        
                                                        <?php } } ?>
											
													</select>
												</div>
											</div>
											
                                            <div id="display">
                                            </div>
										<div class="card-actionbar">
											<div class="card-actionbar-row">
                                                <a href="<?php echo base_url('Tugas/penentuan_pembanding');?>" class="btn btn-flat btn-primary ink-reaction update">Kembali</a>
												<button type="submit" class="btn btn-flat btn-primary ink-reaction update" value="update">Update</button>
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
		<script src="<?php echo base_url('assets/js/core/source/AppOffcanvas.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppCard.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppForm.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppNavSearch.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppVendor.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/demo/Demo.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/demo/DemoFormLayouts.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/jquery-validation/dist/jquery.validate.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/jquery-validation/dist/additional-methods.min.js');?>"></script>
        <script>
            //, attr, order

var sortSelect = function (select, attr, order) {
    if(attr === 'text'){
        if(order === 'asc'){
            $(select).html($(select).children('option').sort(function (x, y) {
                return $(x).text().toUpperCase() < $(y).text().toUpperCase() ? -1 : 1;
            }));
            $(select).get(0).selectedIndex = 0;
            e.preventDefault();
        }// end asc
        if(order === 'desc'){
            $(select).html($(select).children('option').sort(function (y, x) {
                return $(x).text().toUpperCase() < $(y).text().toUpperCase() ? -1 : 1;
            }));
            $(select).get(0).selectedIndex = 0;
            e.preventDefault();
        }// end desc
    }
};

////, attr, order
//$(document).ready(function () {
//
//        sortSelect('#pembimbing1', 'text', 'asc');
//
//    ; // event listener click
//
//});        
        </script>
		<!-- END JAVASCRIPT -->
                

	</body>
</html>
