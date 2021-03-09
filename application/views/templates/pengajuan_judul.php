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
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990');?>" />
        <style>
            .validasi{
                font-size: 10pt;
                font-style: italic;
                color: coral;
            }
        </style>
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
				<?php if($message != '' AND $message != null) { if($message == 'Stambuk Belum Diinput')
{
    	echo "
						
							

					<div class=\"section-body\">
						<div class=\"alert alert-warning\" role=\"alert\">
							<strong>Maaf! </strong>". $message."</div>"; 
    
} else {
						
								echo "
						
							

					<div class=\"section-body\">
						<div class=\"alert alert-success\" role=\"alert\">
							<strong>Selamat! </strong>". $message."</div>"; 
						}
                                                              }

							?>
					<div class="col-lg-12">
								<h1 class="text-primary">Pengajuan Judul</h1>
							</div><!--end .col -->
				
					<div class="section-body contain-lg">
						<div class="col-lg-12">
								<div class="card">
                                    
                                    
									<div class="card-body">
                                        
                                        <div class="row">
							
								<article class="margin-bottom-xxl">
									<p class="lead">
									
<!--
									<form class="form" role="form" action="<?php echo base_url('tugas/pengajuan_judul') ?>" method="post">
										<div class="col-sm-1"><select id="select2" name="pengajuan_judul" class="form-control">
												<option value="belum" <?php if($_SESSION['pengajuan'] == 'belum') {echo "selected='selected'";} ?> > Belum Divalidasi </option>
                                                
                                                <option value="sudah" <?php if($_SESSION['pengajuan'] == 'sudah') {echo "selected='selected'";} ?> > Sudah Divalidasi </option>
												
                                                <option value="all" <?php if($_SESSION['pengajuan']=='all') {echo "selected='selected'";} ?> > All </option>
                                            
                                                 <option value="penolakan" <?php if($_SESSION['pengajuan']=='penolakan') {echo "selected='selected'";} ?> > Riwayat Penolakan </option>
												</select>
												</div>
											<div class="col-sm-1"><input type="submit" value="submit" class="btn btn-default"></div>
								
									</p>
								</article>
							</form>
-->
						</div><!--end .row -->
                                    
                                    
										<div class="table-responsive">
											<table id="datatable1" class="table table-striped table-hover">
                                                <?php if($_SESSION['pengajuan'] != 'penolakan') { ?>
												<thead>
													<tr>
														<th>No</th>
                                                        
														<th>NIM</th>
                                                        <th>Id Pengajuan</th>
														<th>Judul</th>
														<th>Tanggal Pengajuan</th>
														<th>Status Validasi</th>
														<th>Jenis Tugas Akhir</th>
                                                        <th>File</th>
<!--														<th>Action</th>-->
													</tr>
												</thead>
												<tbody>
													<?php
														$no = 1;
                                                        $num = "000000000";
                                                        $length_n = strlen($num);
                                                    
														foreach($data as $d)
														{ 
															?>
															
																<tr>
																	<td><?= $no ?></td>
                                                                    
																	<td><?= $d->nim ?></td>
                                                                    <td>
                                                                        
                                                                        
                                                                        <?php  $length = strlen($d->id_pengajuan);
                                                                            $end = $length_n - $length;
                                                                            $word = substr($num,0, $end);
                                                            
                                                                                echo "PJD". $word.''.$d->id_pengajuan; ?></td>
																	<td><?= $d->judul ?></td>
																	<td><?= $d->tgl_pengajuan ?> </td>
																	<td><?= $d->status_validasi ?></td>
																	<td><?= $d->jenis_TA ?></td>
                                                                    <td><?php if($d->file != null) {echo anchor('tugas/tampil_berkas/'.$d->file,$d->file) ;} ?></td>
<!--
                                                                    <?php if($d->status_validasi == 'belum') { ?><td><?php echo anchor('tugas/validasi_pengajuan/'.$d->id_pengajuan.'/sudah','<button type="button" onclick="return confirm(\'Yakin Data Ini Sudah Anda Download, Lihat dan benar ingin divalidasi?\')" class="btn btn-success">Validasi</button>') ; ?>
                                                                    
                                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="<?= $d->id_pengajuan ?>">Tolak</button>
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form name="myForm" method="post" action="<?php echo base_url('Tugas/validasi_pengajuan_tolak'); ?>" onsubmit="return validateForm(this)">
      <div class="modal-body">
        
          
            <input type="hidden" class="form-control" id="id_pengajuan" name="id_pengajuan" >
          <div class="form-group">
            <label for="message-text" class="col-form-label">Catatan Perbaikan:</label>
            <textarea class="form-control" id="catatan" name="catatan"></textarea>
          </div>
          <p class="validasi" id="validasi"></p>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin Data Ini Ditolak?')">Tolak</button>
      </div>
        </form>
    </div>
  </div>
</div>
                                                                    
                                                                    
                                                                    </td>
                                                                    <?php } else {?>
                                                                    <td></td>
                                                                    <?php } ?>
-->
<!--																	<td><?php echo anchor('tugas/edit_pengajuan/'.$d->id_pengajuan,'<button type="button" class="btn btn-success">Lihat</button>') ; ?></td>-->

															<?php 
															$no++;
														}


													?>
													
												</tbody>
                                                <?php } else { ?>
                                                
                                                <thead>
                                                    <tr>
														<th>No</th>
                                                        
														<th>NIM</th>
                                                        <th>Id Pengajuan</th>
														<th>Judul</th>
														<th>Tanggal Pengajuan</th>
                                                        <th>Tanggal Penolakan</th>
														<th>Status Validasi</th>
														<th>Jenis Tugas Akhir</th>
                                                        <th>File</th>
                                                        <th>Catatan Validasi</th>
													</tr>
                                                
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; 
                                                              $num = "000000000";
                                                        $length_n = strlen($num);
                                                              
                                                              foreach($data as $d) { ?>
                                                    <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $d->nim ?></td>
                                                    <td><?php  $length = strlen($d->id_pengajuan);
                                                                            $end = $length_n - $length;
                                                                            $word = substr($num,0, $end);
                                                            
                                                                                echo "PJD". $word.''.$d->id_pengajuan; ?></td>
                                                    <td><?= $d->judul ?></td>
                                                    <td><?= $d->tgl_pengajuan ?></td>
                                                    <td><?= $d->waktu_penolakan ?></td>
                                                    <td><?= $d->status_validasi ?></td>
                                                    <td><?= $d->jenis_TA ?></td>
                                                    <td><?php if($d->file != null) {echo anchor('tugas/tampil_berkas/'.$d->file,$d->file) ;} ?></td>
                                                    <td><?= $d->catatan_validasi ?></td>
                                                    
                                                    </tr>
                                                    <?php $no++; } ?>
                                                
                                                    
                                                </tbody>
                                                <?php } ?>
											</table>
										</div><!--end .table-responsive -->
									</div><!--end .card-body -->
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
		<script src="<?php echo base_url('assets/js/core/demo/DemoTableDynamic.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/jquery-validation/dist/jquery.validate.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/jquery-validation/dist/additional-methods.min.js');?>"></script>

		<script src="<?php echo base_url('assets/js/libs/DataTables/jquery.dataTables.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js');?>"></script>
        <script>
            $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
            $('#exampleModal').on('show.bs.modal', function (event) {
//                return confirm('Yakin Data Ini Ditolak?')
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  var num = "000000000"
  var length_n = num.length
  var pjg = recipient.toString().length
                
  var end = length_n - pjg
  var word = num.substring(0, end)
  modal.find('.modal-title').text('Tolak Pengajuan Judul dengan ID Pengajuan: PJD' + word +''+recipient)
  document.forms["myForm"]["id_pengajuan"].value = recipient
})
            
            function validateForm(oForm) {
    var catatan = document.forms["myForm"]["catatan"].value;
    
    
    if (catatan == "" ) {
        document.getElementById("validasi").innerHTML = "Catatan tidak boleh kosong";
        return false;
    }
    else if(catatan.length < 10)
    {
        document.getElementById("validasi").innerHTML = "Catatan setidaknya terdiri dari 10 karakter";
        return false;
    }
    
         
    }
        </script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
