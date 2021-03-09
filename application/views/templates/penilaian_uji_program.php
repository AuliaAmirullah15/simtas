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
            <?php foreach($data as $d){ 
    
                $nim = $d->nim;
                $penilai = $d->penilai;
                $kemampuan_dasar = $d->kemampuan_dasar;
                $kecocokan = $d->kecocokan;
                $kasus = $d->kasus;
                $ui = $d->ui;
                $validasi = $d->validasi;
                $total = $d->total;
    
}
            if($penilai == '' or $penilai == null)
            {
                $pengujinya = $status_dopim;
            }
            else
            {
                $pengujinya = $penilai;
            }
            
            ?>

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
			<div id="content">

				<section>
				<div class="section-body">

				
					<div class="section-body contain-lg">
						<?php if($message != '' OR $message != NULL) { echo 

					"<div class=\"alert alert-success\" role=\"alert\">
							<strong>".$message."</strong></div>";}?>
						<!-- BEGIN HORIZONTAL FORM -->
						<div class="row">

							<div class="col-lg-12">
								<h2 class="text-primary">Data Tugas Akhir</h2>
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
								<form class="form-horizontal form-validate floating-label" method="post" action="<?php echo base_url().'tugas/proses_penilaian_uji_program/'. $nim.'/'. $pengujinya;?>" novalidate="novalidate">
									<div class="card">
										<div class="card-head style-primary">
											<header>Penilaian Uji Program</header>
										</div>

										<div class="card-body">
											<h4>Data</h4>
											<hr>
											<div class ="row">
											<div class="col-sm-6">
											<div class="form-group">
												<label for="NIM" class="col-sm-4 control-label">NIM</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="Name1" name="nim" required data-rule-minlength="2" value="<?= $nim ?>" disabled
													/>
												</div>
											</div>
											</div>
                                                
                                                
                                            <div class="col-sm-6">
											<div class="form-group">
												<label for="NIM" class="col-sm-4 control-label">Pembimbing</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="Name1" name="pembimbing" required data-rule-minlength="2" value="<?php if($pembimbing == null or $pembimbing == '') {echo $status_dopim; } else { echo $pembimbing; } ?>" disabled
													/>
												</div>
											</div>
											</div>
                                                
											
											</div>
                                            
                                            <h4>Penilaian</h4>
                                                <hr>
                                            <div class="row">
                                            <div class="col-sm-6">
											<div class="form-group">
												<label for="SK Pembimbing" class="col-sm-8 control-label">Kemampuan dasar pemrograman (0-40)</label>
												<div class="col-sm-4">
													<input  min="0" max="40" type="number" class="form-control" id="kemampuan_dasar" name="kemampuan_dasar" value="<?php if($kemampuan_dasar != null or $kemampuan_dasar != '') {echo $kemampuan_dasar;} else {echo "0"; } ?>"/>
												</div>
											</div>
                                                </div>
                                                
                                            <div class="col-sm-6">
											<div class="form-group">
												<label for="SK Pembimbing" class="col-sm-8 control-label">Kecocokan metode/algoritma dengan sintaks program (0-10)</label>
												<div class="col-sm-4">
													<input min="0" max="10" type="number" class="form-control" id="kecocokan" name="kecocokan" value="<?php if($kecocokan != null or $kecocokan != '') {echo $kecocokan;} else {echo "0"; } ?>"/>
												</div>
											</div>
                                            </div>
                                            </div>
                                            
                                            <div class="row">
                                            <div class="col-sm-6">
											<div class="form-group">
												<label for="NIM" class="col-sm-8 control-label">Penguasaan pemrograman berdasarkan kasus pada skripsi (0-20)</label>
												<div class="col-sm-4">
													<input  min="0" max="20" type="number" class="form-control" id="kasus" name="kasus" value="<?php if($kasus != null or $kasus != '') {echo $kasus;} else {echo "0"; } ?>"
													/>
												</div>
											</div>
                                            </div>
                                                
                                            <div class="col-sm-6">
                                            <div class="form-group">
												<label for="NIM" class="col-sm-8 control-label">Penguasaan pembuatan User Interface (0-10)</label>
												<div class="col-sm-4">
													<input min="0" max="10" type="number" class="form-control" id="ui" name="ui" value="<?php if($ui != null or $ui != '') {echo $ui;} else {echo "0"; } ?>"
													/>
												</div>
											</div>
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="row">
                                            <div class="col-sm-6">
                                            <div class="form-group">
												<label for="NIM" class="col-sm-8 control-label">Validasi output program (0-20)</label>
												<div class="col-sm-4">
													<input min="0" max="20" type="number" class="form-control" id="validasi" name="validasi" value="<?php if($validasi != null or $validasi != '') {echo $validasi;} else {echo "0"; } ?>"
													/>
												</div>
											</div>
                                            </div>
                                                
                                            <div class="col-sm-6">
                                            <div class="form-group">
												<label for="NIM" class="col-sm-8 control-label">Total</label>
												<div class="col-sm-4">
													<input type="number" class="form-control" id="total" name="total" value="<?php if($total != null or $total != '') {echo $total;} else {echo "0";}?>" disabled
													/>
												</div>
											</div>
                                            </div>
                                            </div>
												
										</div><!--end .card-body -->
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
		<script src="<?php echo base_url('assets/js/libs/jquery-validation/dist/jquery.validate.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/jquery-validation/dist/additional-methods.min.js');?>"></script>
            
            <script>
                $('input').keyup(function(){ // run anytime the value changes


    var firstValue = Number($('#kemampuan_dasar').val()); // get value of field
    var secondValue = parseFloat($('#kecocokan').val()); // convert it to a float
    var thirdValue = parseFloat($('#kasus').val());
    var fourthValue = parseFloat($('#ui').val());
    var fifthValue = parseFloat($('#validasi').val());

    var sum = firstValue + secondValue + thirdValue + fourthValue +fifthValue;
    document.getElementById('total').value = sum;
});
                
            
            </script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
