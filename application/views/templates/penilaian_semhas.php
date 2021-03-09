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
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/libs/wizard/wizard.css?1425466601');?>" />
        
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
            <?php foreach($data as $d) { 
            
                $id = $d->id;
                $status_dosen = $d->status_dosen;
                $abstrak = $d->abstrak;
                $bab1 = $d->bab1;
                $bab2 = $d->bab2;
                $bab3 = $d->bab3;
                $bab4 = $d->bab4;
                $bab5 = $d->bab5;
                $pendapat = $d->pendapat;
                $total = $d->total;
                $grade = $d->grade;
 } ?>

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
								<h2 class="text-primary">Form Penilaian Seminar Proposal</h2>
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
                                
                                
								<form class="form-horizontal form-validate floating-label" method="post" action="<?php echo base_url().'tugas/proses_penilaian_semhas/'. $nim.'/'. $id_pengajuan.'/'.$id_jadwal.'/'. $kd_dsn.'/'. $status_dopim;?>" novalidate="novalidate">
									<div class="card">
										<div class="card-head style-primary">
											<header>Tambah Penilaian</header>
										</div>
                                        
                                        
										<div class="card-body">
                                            
                                            <hr><hr>
											<h4>DATA MAHASISWA</h4>
											<hr>
											<div class ="row">
											<div class="col-sm-12">
											<div class="form-group">
												<label for="NIM" class="col-sm-2 control-label">NIM</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="Name1" name="nim" required data-rule-minlength="2" value="<?= $nim ?>" disabled
													/>
												</div>
											</div>
											</div>
                                                
                                            
                                                
                                            </div>
                                            
                                           

											<hr><hr>
                                            
                                            <div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body ">
							<div id="rootwizard1" class="form-wizard form-wizard-horizontal">
								<form class="form floating-label">
									<div class="form-wizard-nav">
										<div class="progress" style="width: 75%;"><div class="progress-bar progress-bar-primary" style="width: 0%;"></div></div>
										<ul class="nav nav-justified nav-pills">
											<li class="active"><a href="#tab1" data-toggle="tab"><span class="step">1</span> <span class="title">ABSTRAK</span></a></li>
											<li><a href="#tab2" data-toggle="tab"><span class="step">2</span> <span class="title">BAB I</span></a></li>
											<li><a href="#tab3" data-toggle="tab"><span class="step">3</span> <span class="title">BAB II</span></a></li>
											<li><a href="#tab4" data-toggle="tab"><span class="step">4</span> <span class="title">BAB III</span></a></li>
                                            <li><a href="#tab5" data-toggle="tab"><span class="step">5</span> <span class="title">BAB IV</span></a></li>
                                            <li><a href="#tab6" data-toggle="tab"><span class="step">6</span> <span class="title">BAB V</span></a></li>
                                            <li><a href="#tab7" data-toggle="tab"><span class="step">7</span> <span class="title">KESIMPULAN</span></a></li>
										</ul>
									</div><!--end .form-wizard-nav -->
									<div class="tab-content clearfix">
										<div class="tab-pane active" id="tab1">
											<br><br>
											<div class="row">
                                               <div class="col-sm-8">
                                                    <h4><center>Abstrak</center></h4>
                                                </div>
                                                <div class="col-sm-2">
                                                    <h4><center>Bobot</center></h4>
                                                </div>
                                                <div class="col-sm-2">
                                                    <h4><center>Nilai</center></h4>
                                                </div>
                                            </div>
                                            <hr>

											<input type="hidden" name="id" value="<?= $id ?>">
                                            
                                            <div class="row">
                                                
                                                <div class="col-sm-8">
                                                    
                                                    <p class="text-light"><ul>
                                                        <li>Abstrak memiliki unsur rumusan masalah</li>
                                                        <li>Abstrak memiliki unsur metodologi</li>
                                                        <li>Abstrak memiliki unsur hasil penelitian</li>
                                                        <li>Abstrak memiliki unsur kesimpulan</li>
                                                        <li>Bahasa Inggris di dalam abstrak sudah sesuai dengan Bahasa Indonesia di dalam abstrak dan kaidah Bahasa Inggris yang benar</li>
                                                        <li>Kata kunci mewakili isi dari tugas akhir</li>
                                                    </ul></p>
                                                </div>
                                                
                                                <div class="col-sm-2">
                                                    <center><h5><b>(0-3)</b></h5></center>
                                                </div>
                                                
                                                 <div class="col-sm-2">
                                                    <div class="form-group">
                                                       
                                                        <div class="col-sm-12">
                                                       <input type="number" min="0" max="3" id="abstrak" name="abstrak" value="<?php if($abstrak != '' or $abstrak != null) {echo $abstrak;} else{echo "0";} ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
										</div><!--end #tab1 -->
										<div class="tab-pane" id="tab2">
											<br><br>
                                            
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <h4><center>Bab I - Pendahuluan</center></h4>
                                                </div>
                                                <div class="col-sm-2">
                                                    <h4><center>Bobot</center></h4>
                                                </div>
                                                <div class="col-sm-2">
                                                    <h4><center>Nilai</center></h4>
                                                </div>
                                        </div>
                                            <hr>
                                             
											 <div class="row">
                                                
                                                <div class="col-sm-8">
                                                    
                                                    <p class="text-light"><ul>
                                                        <li>Rumusan masalah adalah masalah yang terjadi di dunia nyata atau masalah yang terdapat di bidang ilmu pengetahuan tersebut</li>
                                                        <li>Tujuan penelitian yang ditulis mampu menyelesaikan rumusan masalah</li>
                                                        <li>Batasan masalah relevan dengan penelitian</li>
                                                        <li>Hubungan latar belakang dengan rumusan masalah</li>
                                                        <li>Batasan masalah berisi batasan penelitian yang dilakukan</li>
                                                    </ul></p>
                                                </div>
                                                
                                                <div class="col-sm-2">
                                                    <center><h5><b>(0-10)</b></h5></center>
                                                </div>
                                                
                                                 <div class="col-sm-2">
                                                    <div class="form-group">
                                                       
                                                        <div class="col-sm-12">
                                                       <input type="number" min="0" max="10" id="bab1" name="bab1" value="<?php if($bab1 != '' or $bab1 != null) {echo $bab1;} else {echo "0";} ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										</div><!--end #tab2 -->
										<div class="tab-pane" id="tab3">
											<br><br>
											 <div class="row">
                                                <div class="col-sm-8">
                                                    <h4><center>Bab II - Landasan Teori</center></h4>
                                                </div>
                                                <div class="col-sm-2">
                                                    <h4><center>Bobot</center></h4>
                                                </div>
                                                <div class="col-sm-2">
                                                    <h4><center>Nilai</center></h4>
                                                </div>
                                        </div>
                                            <hr>

											
                                            <div class="row">
                                              
                                                <div class="col-sm-8">
                                                    
                                                    <p class="text-light"><ul>
                                                        <li>Landasan teori membahas hal-hal spesifik yang berhubungan dengan metodologi</li>
                                                        <li>Setiap kutipan termasuk gambar dan tabel yang tidak dibuat oleh penulis harus memiliki referensi</li>
                                                        <li>Referensi yang diletakkan di skripsi tercantum di daftar pustaka</li>
                                                        <li>Jurnal internasional dimasukkan di dalam daftar pustaka (minimal 2 artikel)</li>
                                                        <li>Paper konferensi internasional dimasukkan di dalam daftar pustaka (minimal 5 artikel)</li>
                                                        <li>Penelitian terdahulu yang berhubungan dengan topik penelitian (minimal 5 penelitian terdahulu</li>
                                                        <li>Tulisan di dalam landasan teori tidak mengandung unsur copy paste dari referensi yang dikutip (tulisan yang dikutip harus membentuk kalimat baru)</li>
                                                    </ul></p>
                                                </div>
                                                
                                                <div class="col-sm-2">
                                                    <center><h5><b>(0-15)</b></h5></center>
                                                </div>
                                                
                                                 <div class="col-sm-2">
                                                    <div class="form-group">
                                                       
                                                        <div class="col-sm-12">
                                                       <input type="number" min="0" max="15" id="bab2" name="bab2" value="<?php if($bab2 != '' or $bab2 != null) {echo $bab2;} else {echo "0";} ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										</div><!--end #tab3 -->
										<div class="tab-pane" id="tab4">
											<br><br>
											 <div class="row">
                                                <div class="col-sm-8">
                                                    <h4><center>Bab III - Metodologi</center></h4>
                                                </div>
                                                <div class="col-sm-2">
                                                    <h4><center>Bobot</center></h4>
                                                </div>
                                                <div class="col-sm-2">
                                                    <h4><center>Nilai</center></h4>
                                                </div>
                                        </div>
                                            <hr>

											
                                            <div class="row">
                                              
                                                <div class="col-sm-8">
                                                    
                                                    <p class="text-light"><ul>
                                                        <li>Kesesuaian metodologi penelitian dengan penyelesaian permasalahan</li>
                                                        <li>Arsitektur umum menggambarkan keseluruhan metode dan strategi yang diterapkan di tugas akhir</li>
                                                        <li>Arsitektur umum dijelaskan secara terperinci dan detail</li>
                                                        <li>Pemahaman metodologi penelitian</li>
                                                       
                                                    </ul></p>
                                                </div>
                                                
                                                <div class="col-sm-2">
                                                    <center><h5><b>(0-25)</b></h5></center>
                                                </div>
                                                
                                                 <div class="col-sm-2">
                                                    <div class="form-group">
                                                       
                                                        <div class="col-sm-12">
                                                       <input type="number" min="0" max="25" id="bab3" name="bab3" value="<?php if($bab3 != '' or $bab3 != null) {echo $bab3;} else {echo "0";} ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										</div><!--end #tab4 -->
                        
                        
                        <div class="tab-pane" id="tab5">
											<br><br>
                                     <div class="row">
                                                <div class="col-sm-8">
                                                    <h4><center>Bab IV - Implementasi</center></h4>
                                                </div>
                                                <div class="col-sm-2">
                                                    <h4><center>Bobot</center></h4>
                                                </div>
                                                <div class="col-sm-2">
                                                    <h4><center>Nilai</center></h4>
                                                </div>
                                        </div>
                                            <hr>

											
                                            <div class="row">
                                              
                                                <div class="col-sm-8">
                                                    
                                                    <p class="text-light"><ul>
                                                        <li>Kesesuaian implementasi dengan metodologi penelitian</li>
                                                        <li>Screenshot/gambar yang dibuat menunjukkan isi dari penelitian</li>
                                                        <li>Pengujian penelitian sesuai dengan metode yang digunakan</li>
                                                        <li>Setiap gam bar dan tabel memiliki penjelasan mengenai isi dari gambar dan tabel tersebut</li>
                                                        <li>Pembahasan harus sampai pada tahap kenapa hasil yang didapat bisa seperti yang dipaparkan</li>
                                                       
                                                    </ul></p>
                                                </div>
                                                
                                                <div class="col-sm-2">
                                                    <center><h5><b>(0-35)</b></h5></center>
                                                </div>
                                                
                                                 <div class="col-sm-2">
                                                    <div class="form-group">
                                                       
                                                        <div class="col-sm-12">
                                                       <input type="number" min="0" max="35" id="bab4" name="bab4" value="<?php if($bab4 != '' or $bab4 != null) {echo $bab4;} else {echo "0";} ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    </div>
                    <!-- end tab 5 -->
                    
                    <div class="tab-pane" id="tab6">
											<br><br>
                                      <div class="row">
                                                <div class="col-sm-8">
                                                    <h4><center>Bab V - Kesimpulan</center></h4>
                                                </div>
                                                <div class="col-sm-2">
                                                    <h4><center>Bobot</center></h4>
                                                </div>
                                                <div class="col-sm-2">
                                                    <h4><center>Nilai</center></h4>
                                                </div>
                                        </div>
                                            <hr>

											
                                            <div class="row">
                                              
                                                <div class="col-sm-8">
                                                    
                                                    <p class="text-light"><ul>
                                                        <li>Kesimpulan merepresentasikan hasil yang didapat</li>
                                                        <li>Saran merepresentasikan kelemahan dari hasil yang sudah didapat</li>
                                                       
                                                    </ul></p>
                                                </div>
                                                
                                                <div class="col-sm-2">
                                                    <center><h5><b>(0-2)</b></h5></center>
                                                </div>
                                                
                                                 <div class="col-sm-2">
                                                    <div class="form-group">
                                                       
                                                        <div class="col-sm-12">
                                                       <input type="number" min="0" max="2" id="bab5" name="bab5" value="<?php if($bab5 != '' or $bab5 != null) {echo $bab5;} else {echo "0";} ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    
                    </div>
                    <!-- end tab 6 -->
                        <div class="tab-pane" id="tab7">
											<br><br>  
                                                 <div class="row">
                                                <div class="col-sm-8">
                                                    <h4><center>Kemampuan</center></h4>
                                                </div>
                                                <div class="col-sm-2">
                                                    <h4><center>Bobot</center></h4>
                                                </div>
                                                <div class="col-sm-2">
                                                    <h4><center>Nilai</center></h4>
                                                </div>
                                        </div>
                                            <hr>

											
                                            <div class="row">
                                              
                                                <div class="col-sm-8">
                                                    
                                                    <p class="text-light">Kemampuan mengemukakan substansi dan pendapat dan sikap</p>
                                                </div>
                                                
                                                <div class="col-sm-2">
                                                    <center><h5><b>(0-10)</b></h5></center>
                                                </div>
                                                
                                                 <div class="col-sm-2">
                                                    <div class="form-group">
                                                       
                                                        <div class="col-sm-12">
                                                       <input type="number" min="0" max="10" id="pendapat" name="pendapat" value="<?php if($pendapat != '' or $pendapat != null) {echo $pendapat;} else {echo "0";} ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                        </div>
                    <!-- end tab 7 -->          
                                                
									</div><!--end .tab-content -->
									<ul class="pager wizard">
										<li class="previous first disabled"><a class="btn-raised" href="javascript:void(0);">First</a></li>
										<li class="previous disabled"><a class="btn-raised" href="javascript:void(0);">Previous</a></li>
										<li class="next last"><a class="btn-raised" href="javascript:void(0);">Last</a></li>
										<li class="next"><a class="btn-raised" href="javascript:void(0);">Next</a></li>
									</ul>
								</form>
							</div><!--end #rootwizard -->
						</div><!--end .card-body -->
					</div><!--end .card -->
					<em class="text-caption">Penilaian Semhas</em>
				</div><!--end .col -->
			</div>
                                          
											
                    <hr>
                                    <div class="row">
                                                <div class="col-sm-8">
                                                    <h4><center>Total</center></h4>
                                                </div>
                                                
                                                 <div class="col-sm-2">
                                                    <div class="form-group">
                                                       
                                                        <div class="col-sm-12">
                                                       <input type="number" min="0" max="100" id="total" name="total" value="<?php if($total != '' or $total != null) {echo $total;} else {echo "0";} ?>" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                            <hr>
                                        <div class="row">
                                                <div class="col-sm-8">
                                                    <h4><center>Grade</center></h4>
                                                </div>
                                                
                                                 <div class="col-sm-2">
                                                    <div class="form-group">
                                                       
                                                        <div class="col-sm-12">
                                                       <input type="text" id="grade" name="grade" value="<?php if($grade != '' or $grade != null) {echo $grade;} else {echo "E";} ?>" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
											
                                           
                                            
											
											
										</div><!--end .card-body -->
										<div class="card-actionbar">
											<div class="card-actionbar-row">
                                                <a href="<?php echo base_url('Tugas/list_mahasiswa_seminar/'. $id_jadwal); ?>"><button type="button" class="btn btn-flat btn-ink ink-reaction" value="back">Kembali</button></a>
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
        <script src="<?php echo base_url('assets/js/libs/wizard/jquery.bootstrap.wizard.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/App.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppNavigation.js');?>"></script>
		<script src="<?php echo base_url('ssets/js/core/source/AppOffcanvas.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppCard.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppForm.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppNavSearch.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppVendor.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/demo/Demo.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/demo/DemoFormLayouts.js');?>"></script>
        <script src="<?php echo base_url('assets/js/core/demo/DemoFormWizard.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/jquery-validation/dist/jquery.validate.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/jquery-validation/dist/additional-methods.min.js');?>"></script>
<div id="device-breakpoints"><div class="device-xs visible-xs" data-breakpoint="xs"></div><div class="device-sm visible-sm" data-breakpoint="sm"></div><div class="device-md visible-md" data-breakpoint="md"></div><div class="device-lg visible-lg" data-breakpoint="lg"></div></div>
          <script>
                $('input').keyup(function(){ // run anytime the value changes


    var firstValue = parseFloat($('#abstrak').val()); // get value of field
    var secondValue = parseFloat($('#bab1').val()); // convert it to a float
    var thirdValue = parseFloat($('#bab2').val());
    var fourthValue = parseFloat($('#bab3').val());
    var fifthValue = parseFloat($('#bab4').val());
    var sixthValue = parseFloat($('#bab5').val());
    var seventhValue = parseFloat($('#pendapat').val());
    var grade = '';
    
                    
    var sum = firstValue + secondValue + thirdValue + fourthValue +fifthValue + sixthValue + seventhValue;
    document.getElementById('total').value = sum;
                    
                    if(sum >= 81)
                    {
                        grade = 'A';
                    }
                    else if (sum >= 74 && sum <= 80)
                    {
                        grade = 'B+';
                    }
                    else if (sum >= 66 && sum <= 73)
                    {
                        grade = 'B';
                    }
                    else if (sum >= 59 && sum <= 65)
                    {
                        grade = 'C+';
                    }
                    else if (sum >= 51 && sum <= 58)
                    {
                        grade = 'C';
                    }
                    else if (sum >= 41 && sum <= 50)
                    {
                        grade = 'D';
                    }
                    else{
                        grade = 'E';
                    }
                    
                document.getElementById('grade').value = grade;    
                    
});
                
              $(function () {
  $("abstrak").keydown(function () {
    // Save old value.
    if (!$(this).val() || (parseInt($(this).val()) <= 3 && parseInt($(this).val()) >= 0))
    $(this).data("old", $(this).val());
  });
  $("abstrak").keyup(function () {
    // Check correct, else revert back to old value.
    if (!$(this).val() || (parseInt($(this).val()) <= 3 && parseInt($(this).val()) >= 0))
      ;
    else
      $(this).val($(this).data("old"));
  });
});
              $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Catatan Perbaikan Seminar Hasil' + <?= $nim ?>)
  modal.find('.modal-body input').val(recipient)
})
              
            </script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
