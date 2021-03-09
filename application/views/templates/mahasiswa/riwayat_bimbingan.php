<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Portal TA Mahasiswa</title>
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
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/jquery.datatables.min.css');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/font-awesome.min.css?1422529194');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/material-design-iconic-font.min.css?1421434286');?>" />
          <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom_css.css');?>">
 		
        
		<style type="text/css">
			.nav li .active {
				background-color: #c1c1c1;
			}
            .customli li {
                list-style: none;
            }
            .pagination .line {
 		 		display :inline-block;
 		 	}

 		 	.spacing {
 		 		padding-left : 5px;
 		 		padding-right: 5px;

 		 	}
		</style>
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="../../../assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed ">

		<!-- BEGIN HEADER-->
		<?php $this->load->view('templates/mahasiswa/templates/header.php');?>
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
                        
              <?php if($message != '' AND $message != NULL) {


echo "

					<div class=\"section-body\">
						<div class=\"alert alert-success\" role=\"alert\">
							<strong>Selamat! </strong>". $message."</div>";
							 } ?>
						<div class="row">
							<div class="col-lg-12">
								<div class="card card-tiles style-default-light">
                                    
									<!-- BEGIN BLOG POST HEADER -->
									<div class="row style-primary">
										<div class="col-sm-9">
											<div class="card-body style-default-dark">
												<h2>PORTAL TUGAS AKHIR</h2>
											</div>
										</div><!--end .col -->
										<div class="col-sm-3">
											<div class="card-body">
								
												<div class="visible-xs">
													
												</div>
											</div>
										</div><!--end .col -->
									</div><!--end .row -->
									<!-- END BLOG POST HEADER -->

									<div class="row">

										<!-- BEGIN BLOG POST TEXT -->
										<div class="col-md-9">
											<article class="style-default-bright">
												<div class="card-body">
                                                    <h3>Riwayat Bimbingan Pra-<?php switch($jenis_seminar) {
                                                        
    case 'sempro': echo "Seminar Proposal";break;
    case 'semhas': echo "Seminar Hasil"; break;
    case 'sidang': echo "Sidang Meja Hijau"; break;
                                                    }?></h3>
                                                    <hr>
                                                    <?php if($form == '3') { ?>
                                                    <div class="section-body">
						                              <div class="alert alert-info" role="alert">
							                             <strong><h3>Hasil Uji Kelayakan Pengajuan Judul: </h3></strong>
                                                          <h5><?php if($hasil_uji_kelayakan != '' OR $hasil_uji_kelayakan != NULL) { echo $hasil_uji_kelayakan; } else { echo "Tidak Ada Catatan Perbaikan";} ?></h5>
                                                      </div>
                                                    </div>
                                                    <?php } ?>
                                                    
                                                    <div class="section-body">
                                                    
                                                        <h4>Filter: </h4>
                                                        <div class="row">
                                                            <form class="form" method="post" action="<?php echo base_url('mahasiswa/riwayat_bimbingan_filter/'.$jenis_seminar);?>">
                                                                <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    
                                                                    <select class="form-control" name="judul">
																
                                                                        <option value="all">Semua Judul Yang Pernah Diajukan</option>
                                                                        <?php foreach($judul as $j) { ?>
                                                                        <option value="<?= $j->id_pengajuan ?>" <?php if($_SESSION['judul'] == $j->id_pengajuan) {echo "selected='selected'";} ?>><?= $j->judul ?></option>
                                                                        <?php } ?>
														              </select>
														              <label>Judul</label>
                                                                </div>
                                                                </div>
                                                                
                                                                <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    
                                                                    <select class="form-control" name="dosen">
																
                                                                        <option value="all">Semua Pembimbing <?php if($form == '5') {echo "/Penguji"; }?></option>
                                                                        <option value="pembimbing1" <?php if($_SESSION['dosen'] == 'pembimbing1') {echo "selected='selected'";} ?>>Pembimbing 1</option>
                                                                        <option value="pembimbing2" <?php if($_SESSION['dosen'] == 'pembimbing2') {echo "selected='selected'";} ?>>Pembimbing 2</option>
                                                                        <?php if($form == '5') { ?>
                                                                            <option value="penguji1" <?php if($_SESSION['dosen'] == 'penguji1') {echo "selected='selected'";} ?>>Penguji 1</option>
                                                                            <option value="penguji2" <?php if($_SESSION['dosen'] == 'penguji2') {echo "selected='selected'";} ?>>Penguji 2</option>
                                                                        <?php } ?>
                                                           
														              </select>
														              <label>Pembimbing</label>
                                                                </div>
                                                                </div>
                                                                
                                                                <div class="col-sm-2">
                                                                    <button type="submit" class="btn btn-primary">SET</button>
                                                                
                                                                    <?php if($_SESSION['dosen'] != 'all') { ?>
                                                                    <a href="<?php echo base_url('mahasiswa/cetak_lembar_kendali_bimbingan/'.$jenis_seminar); ?>"><button type="button" class="btn btn-info">PRINT</button></a>
                                                                    <?php } ?>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
													<div class="table-responsive">
        
									<table id="" class="table table-striped table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th class="sort-numeric">Judul</th>
												<th class="sort-alpha">Tanggal Penyerahan</th>
												<th class="sort-numeric">Tanggal Selesai Diperiksa</th>
												<th class="sort-numeric">Tanggal Terima Kembali</th>
												<th class="sort-alpha">Catatan</th>
												<th class="sort-numeric">Pembimbing</th>
												<th><center>Action</center></th>
											</tr>
										</thead>
										<tbody>
										<!-- content of table -->
                                            <?php 
													
													foreach($data as $d){ 
												?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $d->judul ?></td>
													<td><?php echo $d->tgl_penyerahan ?></td>
													<td><?php echo $d->tgl_selesai_diperiksa ?></td>
													<td><?php echo $d->tgl_terima_kembali ?></td>
													<td><?php echo $d->catatan ?></td>
													<td><?php echo $d->pembimbing ?></td>
                                                    <td><ul class="list-table"><li><?php echo anchor('mahasiswa/edit_riwayat_bimbingan/'.$d->id.'/'.$jenis_seminar,'<i class="fa fa-pencil" title="Edit"></i>'); ?></li>
													<li><?php echo anchor('mahasiswa/delete_riwayat_bimbingan/'.$d->id.'/'. $jenis_seminar,'<i class="fa fa-trash-o title="Hapus" OnClick="return confirm(\'Yakin Ingin Menghapus Data ini ?\')"></i>',array('class'=>'delete_skripsi',
						'onclick'=>"return confirmDialog('Yakin Ingin Menghapus?');")

                                                                         ); ?></li>
                                                       </ul></td>
												</tr>
												<?php } ?>


											<?php if($jumlah == NULL) {echo "<tr><td colspan='10'><center>No data Available</center></td></tr>";} ?>
										<!-- End of content of table -->
												
										<!-- End of content of table -->
										</tbody>

									</table>
								</div>

								<div class="row">
									<div class="col-sm-5"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><span><i class="fa fa-plus-square"></i></span> Tambah Riwayat</button></div>
                                    
                                    
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Tambah Riwayat Bimbingan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" method="post" action="<?php echo base_url().'mahasiswa/proses_tambah_riwayat_bimbingan/'.$id_pengajuan.'/'.$jenis_seminar ;?>" enctype="multipart/form-data">
            <input type="hidden" id="id_pengajuan" name ='id_pengajuan' value="<?= $id_pengajuan ?>">
            
           <div class="row">
												<div class="col-sm-4">
													<div class="form-group">
														<input type="date" class="form-control" id="tgl_penyerahan" name='tgl_penyerahan'>
														<label for="tgl_penyerahan">Tanggal Penyerahan</label>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<input type="date" class="form-control" id="tgl_selesai_diperiksa" name='tgl_selesai_diperiksa'>
														<label for="tgl_selesai_diperiksa">Tanggal Selesai Diperiksa</label>
													</div>
												</div>
                                                <div class="col-sm-4">
													<div class="form-group">
														<input type="date" class="form-control" id="tgl_terima_kembali" name='tgl_terima_kembali'>
														<label for="tgl_terima_kembali">Tanggal Terima Kembali</label>
													</div>
												</div>
											</div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea class="form-control" id="message-text" name="catatan"></textarea>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
														<select class="form-control" name="pembimbing">
																
                                                            <option value="pembimbing1">Pembimbing 1</option>
                                                            <option value="pembimbing2">Pembimbing 2</option>
                                                            <?php if($form == '5') { ?>
                                                                <option value="penguji1">Penguji 1</option>
                                                                <option value="penguji2">Penguji 2</option>
                                                            <?php } ?>
                                                           
														</select>
														<label>Catatan Bimbingan Dengan Pembimbing</label>
													</div>
													
											
                </div>
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
                                    
									<div class="col-sm-4"> Total Data : <?= $jumlah ?> data</div>

									<!--<div class="col-xs-1"><?= $pagination ?></div>-->
									<div class="col-sm-3"><ul class="pagination"><?= $pagination ?></ul></div>
								</div>
								
												</div><!--end .card-body -->
											</article>
										</div><!--end .col -->
										<!-- END BLOG POST TEXT -->

										<!-- BEGIN MENUBAR -->
										<div class="col-md-3">
											<?php $this->load->view('templates/mahasiswa/templates/menubar.php') ?>
										</div><!--end .col -->
										<!-- END MENUBAR -->

									</div><!--end .row -->
								</div><!--end .card -->
							</div><!--end .col -->
						</div><!--end .row -->

					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->

			

		</div><!--end #base-->
		<!-- END BASE -->

		<!-- BEGIN JAVASCRIPT -->
		<script src="<?php echo base_url('assets/js/libs/jquery/jquery-1.11.2.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/jquery/jquery-migrate-1.2.1.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/bootstrap/bootstrap.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/spin.js/spin.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/libs/DataTables/jquery.dataTables.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/core/demo/DemoTableDynamic.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/DataTables/search.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/autosize/jquery.autosize.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/nanoscroller/jquery.nanoscroller.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/App.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppNavigation.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppOffcanvas.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppCard.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppForm.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppNavSearch.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppVendor.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/demo/Demo.js'); ?>"></script>
        <script>
            $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Tambah Riwayat Bimbingan')
  modal.find('.modal-body input').val(recipient)
})
        </script>
        
		<!-- END JAVASCRIPT -->

	</body>
</html>
