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

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
			<div id="content">

				<section>
				<div class="section-body">
					
								<h1 class="text-primary">Pencarian Mahasiswa Bimbingan</h1>
		
								<div class="card">
								<div class="row">
									<div class="card-body">
                                        
                                        <?php if($set == "normal") { ?>
                                        <div class="row">
                                        <form class="form" role="form" action="<?php echo base_url('tugas/search_mahasiswa') ?>" method="post">
										<div class="col-sm-1"><select id="select2" name="batas" class="form-control">
												<option value="5" <?php if($_SESSION['def'] == 5) {echo "selected='selected'";} else {echo "selected='selected'";}?> > 5 </option>
												<option value="10" <?php if($_SESSION['def'] == 10) {echo "selected='selected'";} ?> > 10 </option>
												<option value="20" <?php if($_SESSION['def']==20) {echo "selected='selected'";} ?> > 20 </option>
												<option value="50" <?php if($_SESSION['def']==50) {echo "selected='selected'";} ?> > 50 </option>
												<option value="100" <?php if($_SESSION['def']==100) {echo "selected='selected'";} ?> > 100 </option>
                                                <option value="all" <?php if($_SESSION['def']=='all') {echo "selected='selected'";} ?> > All </option>
												</select>
												</div>
											<div class="col-sm-1"><input type="submit" value="submit" class="btn btn-default"></div>
                                            </form></div><?php } ?>
                                            
										<form class="form form-validate" role="form" action="<?php echo base_url('tugas/proses_cari_mahasiswa') ?>" method="post">
									
													<div class="col-sm-3">	
											<div class="form-group floating-label">
												<input type="text" class="form-control" id="regular2" name="key" value="<?php if($cari != NULL) { echo $cari;} else {echo "";} ?>">
						
												<label for="regular2">Nama Dosen</label>
											</div>
										</div>
						

											<div class="col-sm-3">
											<div class="form-group floating-label">
												<select id="select2" name="status_pemb" class="form-control">
													<option value="all" <?php if($status_pemb == '') echo "selected='selected'"; ?>>All</option>
													<option value="pembimbing1" <?php if($status_pemb == 'pembimbing1') echo "selected='selected'" ?>> Pembimbing 1</option>
													<option value="pembimbing2" <?php if($status_pemb == 'pembimbing2') echo "selected='selected'" ?> > Pembimbing 2</option>

												</select>

												<label for="regular2">Status Pembimbing</label>
											</div>
											</div>

											<div class="col-sm-3">
											<div class="form-group floating-label">
												<select id="select2" name="status" class="form-control">
													<option value="all"> All</option>
													<option value="belum sempro" <?php if($status == 'belum sempro') echo "selected='selected'" ?>> Sudah Pengajuan Judul</option>
													<option value="belum semhas" <?php if($status == 'belum semhas') echo "selected='selected'" ?>> Sudah Seminar Proposal</option>
													<option value="belum sidang" <?php if($status == 'belum sidang') echo "selected='selected'" ?>> Sudah Seminar Hasil</option>
													<option value="sudah sidang" <?php if($status == 'sudah sidang') echo "selected='selected'" ?>> Sudah Sidang</option>
													<option value="lulus" <?php if($status == 'lulus') echo "selected='selected'" ?>> Lulus</option>
												</select>

												<label for="regular2">Status Bimbingan</label>
											</div>
											</div>

											<div class="col-sm-2">
											<input type="hidden" class="form-control" id="regular2" name="page">
											<div><input type="submit" id="submitSearch" class="btn btn-default" value="Cari"></div>	
										</div>
										<div class="col-sm-1">							
											<div><button name="reset" class="btn btn-default" value="reset"><?php echo anchor('tugas/search_mahasiswa/','Reset'); ?></button></div>
										</div>
                                            
                                            
                                                     <br><br>
                                            
                                                <div class="row">
                                    <div class="col-sm-6">
                                        Total Data : <?= $jumlah ?> data
                                    </div>
                                    <div class="col-sm-6">
                                        
                                        <div class="pull-right">
                                            <button class="btn btn-info" name="cetak" value="cetak"><span><i class="fa fa-print"></i></span> CETAK</button>
                                        </div>
                                    </div>
                                </div>
											</form>

										</div>

											<div class="col-lg-12">
                                                
								<div class="card">
									<div class="card-body">
                                       
										<div class="table-responsive">
											<table class="table no-margin">
												<thead>
													<tr>
														<th>#</th>
														<th>NIM</th>
														<th>Nama</th>
														<th>Status</th>
                                                        <th>Tahun Lulus</th>
														<th>Pembimbing 1</th>
														<th>Pembimbing 2</th>
													</tr>
												</thead>
												<tbody>
														<?php 
														foreach($data as $d)
															{	
																switch($d->status) {
			case 'pengajuan judul' : $statusnya = "sedang pengajuan judul";break;
			case 'belum sempro' : $statusnya = "sudah pengajuan judul";break;
			case 'belum semhas' : $statusnya = "sudah seminar proposal";break;
			case 'belum sidang' : $statusnya = "sudah seminar hasil";break;
			case 'sudah sidang' : $statusnya = "sudah sidang";break;
			case 'lulus' : $statusnya = "lulus";break; }
																echo "<tr>
																	<td>".$no++."</td>
																	<td>$d->nim</td>
																	<td>$d->nama</td>
																	<td>$statusnya</td>
                                                                    <td>$d->tahun_lulus</td>
																	<td>$d->pembimbing1</td>
																	<td>$d->pembimbing2</td>
																	</tr>

																";
																

															} 



														?>
												</tbody>
											</table>
                                           
										</div><!--end .table-responsive -->
                                        <div class="row">
                                             
                                            <div class="col-sm-5">Total Mahasiswa : <?= $jumlah ?> orang</div>
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-3"><ul class="pagination"><?= $pagination ?></ul></div>
										
                                      
									</div><!--end .card-body -->

								</div><!--end .card -->

							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END RESPONSIVE TABLE 1 -->
									</div>
								</div><!--end .card -->
							</div> <!--end .col -->
					
						<!-- END RESPONSIVE TABLE 1 -->

					</div>
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->

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
		 <script>
                    $(document).ready(function(){
                        $(".test").click(function(e){
                            var x = e.currentTarget.attributes.value.nodeValue;
                            $("input[name=skripsi]").val(x);
                            return false;
                            
                        });
                    });
                </script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
