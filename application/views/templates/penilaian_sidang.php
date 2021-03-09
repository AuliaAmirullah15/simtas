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
            <?php foreach($data as $d) { 
            
                $id = $d->id;
                $status_dosen = $d->status_dosen;
                $sistematika = $d->sistematika;
                $substansi = $d->substansi;
                $kemampuan_substansi = $d->kemampuan_substansi;
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
								<h2 class="text-primary">Form Penilaian Sidang Meja Hijau</h2>
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
									<div class="card">
										<div class="card-head style-primary">
											<header>Tambah Penilaian</header>
										</div>

										<div class="card-body">
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
                                            <h4>Catatan Perbaikan Sidang</h4>
                                            <?php if($catatan != null) {?>
                                                <div class="col-sm-12">
                                                    <div class="table-responsive">
                                                <table id="" class="table table-striped table-hover">
                                                    <thead>
											<tr>
												<th>No</th>
												<th class="sort-numeric">Catatan</th>
												<th class="sort-alpha">Action</th>
											</tr>
										</thead>
                                                    <tbody>
                                                        <?php $no = 1; foreach($catatan as $c) { ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $c->catatan_perbaikan ?></td>
                                                            <td><a href="<?php echo base_url('Tugas/hapus_catatan_sidang/'. $c->id.'/'. $c->nim.'/'. $c->id_jadwal_seminar.'/'.$id_pengajuan);?>"><button class="btn btn-warning" onclick="return confirm('Anda yakin menghapus catatan ini? Anda tidak akan melihat catatan ini di kemudian hari!')">Hapus</button></a></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                            
                                            <?php }  ?>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Tambah Catatan</button>
                                            
                                            <!--- MODAL POPUP -->
                                            
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal form-validate floating-label" method="post" action="<?php echo base_url().'tugas/tambah_catatan_perbaikan/'. $nim.'/'. $id_pengajuan.'/'.$id_jadwal.'/'. $kd_dsn.'/'. $status_dopim;?>" novalidate="novalidate">
          <div class="form-group">
            <label for="message-text" class="col-form-label">Catatan Perbaikan:</label>
            <textarea class="form-control" id="message-text" name="catatan_perbaikan" required></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
          
          </form>
      </div>
    </div>
  </div>
</div>
                                            <form class="form-horizontal form-validate floating-label" method="post" action="<?php echo base_url().'tugas/proses_penilaian_sidang/'. $nim.'/'. $id_pengajuan.'/'.$id_jadwal.'/'. $kd_dsn.'/'. $status_dopim;?>" novalidate="novalidate">
                                            
                                            <!--- END MODAL POPUP -->
                                            <hr>
                                            <h4>Penilaian</h4>
                                            <div class="row">
                                              <div class="col-sm-2">
                                                  <h4><center>No</center></h4>
                                              </div>
                                               <div class="col-sm-6">
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
                                                
                                                <div class="col-sm-2">
                                                    <p><center>1</center></p>
                                                </div>
                                                <div class="col-sm-6">
                                                    
                                                    <p class="text-light">Sistematika Penulisan</p>
                                                </div>
                                                
                                                <div class="col-sm-2">
                                                    <center><h5><b>(1-25)</b></h5></center>
                                                </div>
                                                
                                                 <div class="col-sm-2">
                                                    <div class="form-group">
                                                       
                                                        <div class="col-sm-12">
                                                       <input type="number" min="1" max="25" id="sistematika" name="sistematika" value="<?php if($sistematika != '' or $sistematika != null) {echo $sistematika;} else{echo "1";} ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <hr>
                                            
                                            <div class="row">
                                                
                                                <div class="col-sm-2">
                                                    <p><center>2</center></p>
                                                </div>
                                                <div class="col-sm-6">
                                                    
                                                    <p class="text-light">Substansi</p>
                                                </div>
                                                
                                                <div class="col-sm-2">
                                                    <center><h5><b>(1-25)</b></h5></center>
                                                </div>
                                                
                                                 <div class="col-sm-2">
                                                    <div class="form-group">
                                                       
                                                        <div class="col-sm-12">
                                                       <input type="number" min="1" max="25" id="substansi" name="substansi" value="<?php if($substansi != '' or $substansi != null) {echo $substansi;} else{echo "1";} ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <hr>
                                            
                                            <div class="row">
                                                
                                                <div class="col-sm-2">
                                                    <p><center>3</center></p>
                                                </div>
                                                <div class="col-sm-6">
                                                    
                                                    <p class="text-light">Kemampuan menguasai substansi</p>
                                                </div>
                                                
                                                <div class="col-sm-2">
                                                    <center><h5><b>(1-25)</b></h5></center>
                                                </div>
                                                
                                                 <div class="col-sm-2">
                                                    <div class="form-group">
                                                       
                                                        <div class="col-sm-12">
                                                       <input type="number" min="1" max="25" id="kemampuan_substansi" name="kemampuan_substansi" value="<?php if($kemampuan_substansi != '' or $kemampuan_substansi != null) {echo $kemampuan_substansi;} else{echo "1";} ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

											
                                            <div class="row">
                                               <div class="col-sm-2">
                                                    <p><center>4</center></p>
                                                </div>
                                                <div class="col-sm-6">
                                                    
                                                    <p class="text-light">Kemampuan mengemukakan pendapat</p>
                                                </div>
                                                
                                                <div class="col-sm-2">
                                                    <center><h5><b>(1-25)</b></h5></center>
                                                </div>
                                                
                                                 <div class="col-sm-2">
                                                    <div class="form-group">
                                                       
                                                        <div class="col-sm-12">
                                                       <input type="number" min="1" max="25" id="pendapat" name="pendapat" value="<?php if($pendapat != '' or $pendapat != null) {echo $pendapat;} else {echo "1";} ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											
                    <hr>
                                    <div class="row">
                                                <div class="col-sm-8">
                                                    <h4><center>Total</center></h4>
                                                </div>
                                                
                                                 <div class="col-sm-2">
                                                    <div class="form-group">
                                                       
                                                        <div class="col-sm-12">
                                                       <input type="number" min="0" max="100" id="total" name="total" value="<?php if($total != '' or $total != null) {echo $total;} else {echo "4";} ?>" class="form-control" disabled>
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


    var firstValue = parseFloat($('#sistematika').val()); // get value of field
    var secondValue = parseFloat($('#substansi').val()); // convert it to a float
    var thirdValue = parseFloat($('#kemampuan_substansi').val());
    var fourthValue = parseFloat($('#pendapat').val());
   
    var grade = '';
    var sum = firstValue + secondValue + thirdValue + fourthValue;
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
                
              $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Catatan Perbaikan Sidang ' + <?= $nim ?>)
  modal.find('.modal-body input').val(recipient)
})
            
            </script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
