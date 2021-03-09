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
        <style>
		.list-test{
			list-style : none;
				padding : 0px;
			margin : 0px;
		}

		.list-tes{
			list-style : none;
				padding : 0px;
			margin : 0px;
			display : inline-block;
		}

		ul li .lti{
			list-style : none;
			padding : 0px;
			margin : 0px;
			display : inline-block;
		}

		.box
		{
			border : 1px solid black;
			height : 30px ;
		}

		.box-light
		{
			margin-top : 5px;
			border : 3px solid black;
			height : 80px;
		}

		.boxes
		{
			
			height : 60px ;
			margin : 25px;

		}

		.box-light
		{
			margin-top : 5px;
			border : 3px solid black;
			height : 50px;
		}
            .colorize {
                background-color: beige;
                font-style: oblique;
            }
            
            .customli li {
                list-style: none;
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
        <?php 
		foreach($data as $d)
		{
			$nim = $d->nim;
            $id_pengajuan = $d->id_pengajuan;
			$judul_diajukan_dosen = $d->judul_diajukan;
			$judul_diajukan_mhs = $d->judul_diajukan_mahasiswa;
			$uji_kelayakan_judul = $d->status_kelayakan;
			$hasil_uji_kelayakan = $d->hasil_uji_kelayakan;
			$calon_dopim1 = $d->calon_dopim1;
			$calon_dopim2 = $d->calon_dopim2;
			$tgl = $d->tgl_pengajuan;
			$judul = $d->judul;
			$latar_belakang = $d->latar_belakang;
			$rumusan_masalah = $d->rumusan_masalah;
			$metodologi = $d->metodologi;
			$referensi = $d->referensi;
			$upload = $d->upload;
			$ilmu1 = $d->ilmu1;
			$ilmu2 = $d->ilmu2;
		}

		foreach($nama as $n)
		{
			$nama = $n->nama;
			$prodi = $n->nama_PS;
		}
        
        
		foreach($dopim as $dsn)
		{
			$dopim1 = $dsn->dopim1;
			$dopim2 = $dsn->dopim2;
			$nip1 = $dsn->nip1;
			$nip2 = $dsn->nip2;
		}
        
        foreach($pembanding as $p)
		{
			$dopem1 = $p->dopem1;
			$dopem2 = $p->dopem2;
			$nip3 = $p->nip3;
			$nip4 = $p->nip4;
		}

	?>


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
					
								<h1 class="text-primary">Revisi Skripsi</h1>
		
								<div class="card">
								<div class="row">
									<div class="card-body">
                                        <div class="row">
											<div class="col-xs-4">
												<h4 class="text-light">Pembimbing I </h4>
												<h4 class="text-light">Pembimbing II</h4>
                                                <h4 class="text-light">Pembanding I </h4>
												<h4 class="text-light">Pembanding II</h4>
												<br>
												<h4 class="text-light">NIM</h4>
												<h4 class="text-light">Nama</h4>
												<h4 class="text-light">Program Studi</h4>
											</div><!--end .col -->
											<div class="col-xs-5">
												<h4 class="text-light">: <?= $dopim1 ?></h4>
												<h4 class="text-light">: <?= $dopim2 ?></h4>
                                                <h4 class="text-light">: <?= $dopem1 ?></h4>
												<h4 class="text-light">: <?= $dopem2 ?></h4>
												<br>
												<h4 class="text-light">: <?= $nim ?></h4>
												<h4 class="text-light">: <?= $nama ?></h4>
												<h4 class="text-light">: <?= $prodi ?></h4>
											</div>
											
										</div><!--end .row -->
										<!-- END  -->

										<div class="row">
											<div class="col-xs-12 text-center">
												<h4><b>Judul Skripsi</b></h4>
											</div>
										</div>

										<div class="row">
										<div class="col-xs-12">
										<div class="box" style="padding-right: 5px; padding-left: 15px;">
											<?= $judul ?>
										</div>
										</div>
										</div>
										<br>
                                        
                                        <?php if($active != 'ijazah') { ?>
                                        <form name="frmactive" action="<?php echo base_url('Tugas/simpan_catatan/'. $kd_dsn.'/'. $nim.'/'. $id_pengajuan.'/'. $id_jadwal_seminar.'/'. $status_dosen) ; ?>" method="post">
										<div class="row">
											<div class="col-xs-12 text-center">
                                                <div class="table-responsive">
        
												
                                                    <?php if($perbaikan != null) { ?>
                                                    <table class="table" border='1' width="100%">
													<tbody>
														<tr class="colorize" height="30px">
															
															<td width="5%">No</td>
															<td width="20%">Dosen</td>
                                                            <td width="10%">Status Dosen</td>
															<td width="35%">Catatan Perbaikan</td>
                                                            <td width="5%"><input type="checkbox" id="checkAll" name="checkAll" value="all" <?php if($cek_verified == $pembandingnya) {echo "disabled";} ?>/></td>
                                                            <td>Keterangan/Reminder</td>
														</tr>
                                                        
                                                        <?php $no = 1; foreach($perbaikan as $p) { ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td><?= $p->Nama_dosen ?></td>
                                                                <td><?php switch($p->status_dosen) {
        case 'pembimbing1'; echo "Pembimbing 1";break;
        case 'pembimbing2'; echo "Pembimbing 2";break;
        case 'pembanding1'; echo "Pembanding 1";break;
        case 'pembanding2'; echo "Pembanding 2";break;
} ?></td>
                                                                <td><?= $p->catatan_perbaikan ?></td>
                                                                <input type="hidden" name="id[]" value="<?= $p->id?>">
                                                                <?php if($p->dosen == $kd_dsn) { ?>
                                                                <td><input type="checkbox" name="status_perbaikan[]" value="<?= $p->id ?>" <?php if($p->status_perbaikan == 'sudah') {echo "checked";} ?> <?php if($p->kunci == 'locked') {echo "disabled";}?>></td>
                                                                <td><textarea class="form-control" id="keterangan" name="keterangan[]" <?php if($status_dosen != 'pembimbing1') { if($cek_verified == $pembandingnya) {echo "disabled";} } else{ if($status == 'lulus') {echo "disabled";}} ?>><?= $p->keterangan_catatan ?></textarea></td>
                                                                <?php } else {?>
                                                                    <td><?php if($p->status_perbaikan == 'sudah') {echo "<center><i class='md md-check'></i></center>";} ?></td>
                                                                    <td><input type="hidden" name="keterangan[]" value="<?= $p->keterangan_catatan ?>"><?php if($p->keterangan_catatan != '') {echo "<b>Masih Ada Catatan Perbaikan, Mahasiswa Diharapkan menemui Dosen Bersangkutan</b>";} ?></td>
                                                                <?php } ?>
                                                            </tr>
                                                        <?php } ?>
                                                 
                                                        <tr>
                                                            <td colspan='5'></td>
                                                            <td><a href="<?php echo base_url('Tugas/bersihkan_catatan/'. $kd_dsn.'/'. $p->nim.'/'. $p->id_pengajuan.'/'. $p->id_jadwal_seminar.'/'. $status_dosen); ?>"><p id="btnClear">BERSIHKAN</p></a></td>
                                                        </tr>
                                                </tbody>
                                            </table>
														   <?php } ?>
													
                                                    
												
                                                </div>
											</div><!--end .col -->
                                            
                                          
                                            
										</div>
                                       <?php if($perbaikan != null) { ?>
                                       <div class="row">
                                       <div class="col-xs-2">
                                        
                                        <button type="submit" class="btn btn-primary" <?php if($status_dosen != 'pembimbing1') { if($cek_verified == $pembandingnya) {echo "disabled";} } else { if($status == 'lulus') {echo "disabled";}} ?>>Simpan Catatan</button>
                                           </div></div>
                                        <?php } ?>
                                        <br>
                                        </form>
                                    
                                         <div class="row">
                            <div class="col-xs-12">
                                <p class="text-light">Note:</p>
                                <ul>
                                    <li>Tombol <b>Verifikasi</b> Dapat Muncul Jika Semua Perbaikan Sudah Dicentang</li>
                                    <li>Tombol <b>Membolehkan Ambil Ijazah</b> Dapat Muncul Jika Semua Perbaikan Sudah Dicentang Dan Tidak Ada Tulisan Apapun Di Kolom Keterangan/Reminder</li>
                                    <li>Tombol <b>Verifikasi</b> Muncul Pada Setiap Penguji</li>
                                    <li>Tombol <b>Membolehkan Ambil Ijazah</b> Hanya Muncul Pada Pembimbing 1</li>
                                    
                                </ul>
                                <br>
                                <p class="text-light">Fungsi Tombol:</p>
                                <ul>
                                    <li>Tombol <b>Verifikasi</b> Hanya Akan Me-Lock Status Perbaikan Yang Sudah Dicentang Sehingga Mahasiswa Boleh Wisuda dan Tidak Mengizinkan Mahasiswa Mendapatkan Ijazah</li>
                                    <li>Tombol <b>Membolehkan Ambil Ijazah</b> Me-Lock dan Mengizinkan Mahasiswa Mendapatkan Ijazah</li>
                                    
                                </ul>
                            </div>
                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <?php if($cek_luluskan == $pembanding_lulus AND $status_dosen == 'pembimbing1') { ?>
                                                <!-- LOCKED ALL PERBAIKAN DARI DOSEN YANG BERSANGKUTAN DAN UBAH STATUS MAHASISWA LULUS -->
                                                <a href="<?php echo base_url('Tugas/aksi_perbaikan/luluskan/'. $kd_dsn.'/'. $nim.'/'. $id_pengajuan.'/'. $id_jadwal_seminar.'/'. $status_dosen) ;?>"><button class="btn btn-info" <?php if($status == 'lulus') {echo "disabled";}?>>Membolehkan Ambil Ijazah</button></a>
                                                <?php if($status == 'lulus') {echo "<p>Status Aksi : Sudah Mengklik Tombol \"Membolehkan Ambil Ijazah\"</p>";}else {echo "<p>Status Aksi : Belum Mengklik Tombol \"Membolehkan Ambil Ijazah\"</p>";}
                                                                                                                                
                                                                                                                                } else { ?>
                                                <a href="<?php echo base_url('Tugas/aksi_perbaikan/verifikasi/'. $kd_dsn.'/'. $nim.'/'. $id_pengajuan.'/'. $id_jadwal_seminar.'/'. $status_dosen) ;?>"><button class="btn btn-warning" <?php if(($cek_verifikasi < $pembandingnya) or ($cek_verified == $pembandingnya) ) {echo "disabled";}?>>Verifikasi</button></a>
                                                <?php 
                                                    if($cek_verified == $pembandingnya) { ?>    
                                                    <p>Status Verifikasi : Sudah Diverifikasi</p>
                                                <?php } else { ?>
                                                        
                                                        <p>Status Verifikasi : Belum Diverifikasi</p>
                                                        
                                                    <?php }} ?>
                                            </div>
                                        </div>
<?php } else { ?>
                                        
                            <div class="row">
											<div class="col-xs-12 text-center">
                                                <div class="table-responsive">
        
												
                                                  
                                                    <table class="table" border='1' width="100%">
													<tbody>
														<tr class="colorize" height="30px">
															
															<td width="5%">No</td>
															<td width="20%">Dosen</td>
                                                            <td width="10%">Status Dosen</td>
															<td width="35%">Catatan Perbaikan</td>
                                                            <td width="5%">-</td>
                                                            <td>Keterangan/Reminder</td>
														</tr>
                                                        
                                                        <?php $no = 1; foreach($perbaikan as $p) { ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td><?= $p->Nama_dosen ?></td>
                                                                <td><?php switch($p->status_dosen) {
        case 'pembimbing1'; echo "Pembimbing 1";break;
        case 'pembimbing2'; echo "Pembimbing 2";break;
        case 'pembanding1'; echo "Pembanding 1";break;
        case 'pembanding2'; echo "Pembanding 2";break;
} ?></td>
                                                                <td><?= $p->catatan_perbaikan ?></td>
                                                               
                                                                
                                                                    <td><?php if($p->status_perbaikan == 'sudah') {echo "<center><i class='md md-check'></i></center>";} ?></td>
                                                                    <td><input type="hidden" name="keterangan[]" value="<?= $p->keterangan_catatan ?>"><?php if($p->keterangan_catatan != '') {echo "<b>Masih Ada Catatan Perbaikan, Mahasiswa Diharapkan menemui Dosen Bersangkutan</b>";} ?></td>
                                                             
                                                            </tr>
                                                        <?php } ?>
                                                 
                                                       
                                                </tbody>
                                            </table>
													
													
                                                    
												
                                                </div>
											</div><!--end .col -->
                                            
                                          
                                            
										</div>            
                                        
                                        
                                        <?php } ?>
										</div>
                        
                       
                                     
                                    
                                   
											
						</div><!--end .row -->
						<!-- END RESPONSIVE TABLE 1 -->
                                    
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
             
$("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
        
                </script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
