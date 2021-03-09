<!DOCTYPE html>
<html lang="en">
	<head>
	<?php 
		if(!isset($_SESSION['username']))
		{
			redirect('tugas/loginn');
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

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

				<!-- BEGIN CONTENT-->
			<div id="content">
			<?php
				foreach($data as $skr)
							{
								$nim=$skr->nim;
								$tahun_lulus=$skr->tahun_lulus;
								$sk_pembimbing=$skr->nomor_sk_pembimbing;
								$sk_pembanding=$skr->nomor_sk_pembanding;
								$nama=$skr->nama;
								$nama_PS=$skr->nama_PS;
								$judul=$skr->judul;
								$dopim1=$skr->Dosen_Pembimbing1;
								$dopim2=$skr->Dosen_Pembimbing2;
								$dopem1=$skr->Dosen_Pembanding1;
								$dopem2=$skr->Dosen_Pembanding2;
								$uji_program=$skr->nilai_uji_program;
								$semhas = $skr->nilai_semhas;
								$sidang = $skr->nilai_sidang;
								$total = $skr->total;
								$grade = $skr->grade;
                                $ilmu1 = $skr->ilmu1;
                                $ilmu2 = $skr->ilmu2;
							}




			?>
				<section>
				<div class="section-body">
					<ol class="breadcrumb">
											<li><a href="<?php echo base_url('tugas/skripsi');?>">List Skripsi</a></li>
											<li class="active">Detail Skripsi</li>
										</ol>
				
					<div class="section-body contain-lg">
						<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table no-margin">
												
												
													<tr>
														<td>NIM</td>
														<td>:</td>
														<td><?=$nim ?></td>
													</tr>
													<tr>
														<td>Tahun Lulus</td>
														<td>:</td>
														<td><?=$tahun_lulus ?></td>
													</tr>
													<tr>
														<td>Nomor SK Pembimbing</td>
														<td>:</td>
														<td><?=$sk_pembimbing ?></td>
													</tr>
													<tr>
														<td>Nomor SK Pembanding</td>
														<td>:</td>
														<td><?=$sk_pembanding ?></td>
													</tr>
													<tr>
														<td>Nama Lengkap</td>
														<td>:</td>
														<td><?=$nama ?></td>
													</tr>
													<tr>
														<td>Judul</td>
														<td>:</td>
														<td><?=$judul ?></td>
													</tr>
                                                    <tr>
														<td>Bidang Ilmu 1</td>
														<td>:</td>
														<td><?=$ilmu1 ?></td>
													</tr>
                                                    <tr>
														<td>Bidang Ilmu 2</td>
														<td>:</td>
														<td><?=$ilmu2 ?></td>
													</tr>
													<tr>
														<td>Pembimbing 1</td>
														<td>:</td>
														<td><?=$dopim1 ?></td>
													</tr>
													<tr>
														<td>Pembimbing 2</td>
														<td>:</td>
														<td><?=$dopim2 ?></td>
													</tr>
													<tr>
														<td>Pembanding 1</td>
														<td>:</td>
														<td><?=$dopem1 ?></td>
													</tr>
													<tr>
														<td>Pembanding 2</td>
														<td>:</td>
														<td><?=$dopem2 ?></td>
													</tr>
													<tr>
														<td>Nilai Uji Program</td>
														<td>:</td>
														<td><?=$uji_program ?></td>
													</tr>
													<tr>
														<td>Nilai Seminar Hasil</td>
														<td>:</td>
														<td><?=$semhas ?></td>
													</tr>
													<tr>
														<td>Nilai Sidang Meja Hijau</td>
														<td>:</td>
														<td><?=$sidang ?></td>
													</tr>
													<tr>
														<td>Total</td>
														<td>:</td>
														<td><?=$total ?></td>
													</tr>
													<tr>
														<td>Grade</td>
														<td>:</td>
														<td><?=$grade ?></td>
													</tr>




											</table>
										</div><!--end .table-responsive -->
									</div><!--end .card-body -->
									<div class="card-actionbar-row">
												  <a href="<?php echo base_url().'tugas/skripsi';?>"><button type="button" class="btn btn-success" ><span><i class="fa fa-mail-reply"></i></span> Kembali</button></a>
                                                  <a href="<?php echo base_url().'tugas/print_detail/'.$nim;?>"><button type="button" class="btn btn-info" ><span><i class="fa fa-print"></i></span> Cetak</button></a>
											</div>
								</div><!--end .card -->
							</div><!--end .col -->

						</div><!--end .row -->
						<!-- END RESPONSIVE TABLE 1 -->

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
		<!-- END JAVASCRIPT -->

	</body>
</html>
