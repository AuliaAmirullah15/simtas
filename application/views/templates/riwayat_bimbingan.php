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
        
        
		foreach($dosen as $dsn)
		{
			$dopim1 = $dsn->dopim1;
			$dopim2 = $dsn->dopim2;
			$nip1 = $dsn->nip1;
			$nip2 = $dsn->nip2;
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
					
								<h1 class="text-primary">Riwayat Bimbingan Pra-<?php  $seminar = ''; switch($jenis_seminar)
        {
            case 'sempro' :  $seminar= "Seminar Proposal"; echo "Seminar Proposal"; break;
    case 'uji_program':   $seminar= "Uji Program"; echo "Uji Program"; break;
            case 'semhas' :  $seminar= "Seminar Hasil"; echo "Seminar Hasil"; break;
            case 'sidang' :  $seminar= "Sidang Meja Hijau"; echo "Sidang Meja Hijau"; break;
            
        } ?></h1>
		                 
								<div class="card">
								<div class="row">
									<div class="card-body">
                                        <div class="row">
											<div class="col-xs-4">
												<h4 class="text-light">Pembimbing I </h4>
												<h4 class="text-light">Pembimbing II</h4>
												<br>
												<h4 class="text-light">NIM</h4>
												<h4 class="text-light">Nama</h4>
												<h4 class="text-light">Program Studi</h4>
											</div><!--end .col -->
											<div class="col-xs-5">
												<h4 class="text-light">: <?= $dopim1 ?></h4>
												<h4 class="text-light">: <?= $dopim2 ?></h4>
												<br>
												<h4 class="text-light">: <?= $nim ?></h4>
												<h4 class="text-light">: <?= $nama ?></h4>
												<h4 class="text-light">: <?= $prodi ?></h4>
											</div>
											
										</div><!--end .row -->
										<!-- END  -->

										<div class="row">
											<div class="col-xs-12 text-center">
												<h4><b>Rencana Judul Skripsi</b></h4>
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
										<div class="row">
											<div class="col-xs-12 text-center">
												<table border='1' width="100%">
													<tbody>
														<tr class="colorize" height="30px">
															
															<td rowspan='2' width="5%">No</td>
															<td colspan='3'>Tanggal Bimbingan</td>
                                                            <td rowspan='2'  width="25%">Judul</td>
															<td rowspan='2' width="30%">Catatan</td>
                                                            <td rowspan='2' width="10%">Dosen Pembimbing</td>
														</tr>

														<tr class="colorize" height="30px">
															<td width="10%">Penyerahan</td>
															<td width="10%">Selesai Diperiksa</td>
															<td width="10%">Terima Kembali</td>
														</tr>
															<?php if($riwayat == '' OR $riwayat == null) {

															for($i = 1;$i<=5;$i++)
															{
																echo "<tr height='30px'>
																	<td>$i</td>
																	<td></td>
                                                                    <td></td>
																	<td></td>
																	<td></td>
																	<td></td>
                                                                    <td></td>";
															} }else { $no = 1; foreach($riwayat as $r) {?>
                                                                    <tr>
                                                        
                                                                        <td><?= $no++ ?></td>
                                                                        <td><?= $r->tgl_penyerahan ?></td>
                                                                        <td><?= $r->tgl_selesai_diperiksa ?></td>
                                                                        <td><?= $r->tgl_terima_kembali ?></td>
                                                                        <td><?= $r->judul ?></td>
                                                                        <td><?= $r->catatan ?></td>
                                                                        <td><?php switch($r->pembimbing) {
    case 'pembimbing1' : echo "Pembimbing 1"; break;
    case 'pembimbing2' : echo "Pembimbing 2"; break;
    case 'penguji1' : echo "Penguji 1"; break;
    case 'penguji2' : echo "Penguji 2"; break;
} ?></td>
                                                        
                                                                    </tr>
                                                            

															<?php } } ?>
													</tbody>
												</table>

											</div><!--end .col -->
                                            
                                            <?php   if($tgl_seminar == null){
                                                    $pembimbing1 = '0000-00-00';
$pembimbing2 = '0000-00-00';
                $penguji1 = '0000-00-00';
                $penguji2 = '0000-00-00';} else {foreach($tgl_seminar as $ts)
            {
                $rencana_tgl_seminar = $ts->rencana_tgl_seminar;
                $pembimbing1 = $ts->pembimbing1;
                $pembimbing2 = $ts->pembimbing2;
                $penguji1 = $ts->penguji1;
                $penguji2 = $ts->penguji2;
   
            }
                                        }
                                            ?>
                                            
										</div>
                                       
                                       

										</div>
                                    
                                   <?php if($catatan_perbaikan != null) { ?>
                                    <form method="post" action="<?php echo base_url('Tugas/update_catatan_perbaikan/'.$nim.'/'. $status_dopim.'/'. $jenis_seminar);?>">
                                    <div class="card-body">
                                        <hr>
                                         <h4>Catatan Perbaikan Seminar Hasil Mahasiswa</h4>
                                        <div class="table-responsive">
        
									<table id="" class="table table-striped table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th class="sort-numeric">Dosen</th>
												<th class="sort-alpha">Status Dosen</th>
												<th class="sort-numeric">Catatan Perbaikan </th>
                                                <th>Tanggal</th>
												<th class="sort-numeric">Status Perbaikan</th>
												<th class="sort-alpha"><input type="checkbox" id="checkAll" name="checkAll" value="all" /></th>
											</tr>
										</thead>
										<tbody>
										<!-- content of table -->
												<?php 
													$no = 1;
													foreach($catatan_perbaikan as $c){ 
												?>
												<tr>
													<td><?php echo $no++ ?></td>
                                                    <input type="hidden" name="id[]" value="<?= $c->id?>">
													<td><?php echo $c->Nama_dosen ?></td>
                                                    <td><?php echo $c->status_dosen ?></td>
													<td><?php echo $c->catatan_perbaikan ?></td>
                                                    <td><?php echo $c->jadwal ?></td>
													<td><?php echo $c->status_perbaikan ?></td>
													<td><input type="checkbox" name="status_perbaikan[]" value="<?= $c->id ?>" <?php if($c->status_perbaikan == 'sudah') {echo "checked";} ?> <?php if($c->kunci == 'locked') {echo "disabled";}?>></td>
												</tr>
												<?php } ?>


											<?php if($catatan_perbaikan == NULL) {echo "<tr><td colspan='10'><center>No data Available</center></td></tr>";} ?>
										<!-- End of content of table -->
										</tbody>

									</table>
								</div>
                                        
                                        <?php if($jlh_dilocked < $jlh_catatan_perbaikan) { ?><button type="submit" class="btn btn-primary">Submit</button><?php } ?>
								</div><!--end .table-responsive -->
                                        
                                    </form>
                                <?php } ?>

                                     <div class="card-body">
                                         
                                          <h3 class="text-light"><strong>Notes:</strong></h3>
                                                    <p class="text-light"></p>
                                                    <ul class="customli">
                                                        <li>1. Untuk dapat membuka tombol verifikasi/izinkan mahasiswa mengikuti seminar/sidang, mahasiswa harus memenuhi syarat minimal bimbingan</li>
                                                        <li>2. Pemenuhan syarat minimal bimbingan dilakukan dengan mahasiswa mengisi riwayat bimbingan di portalnya </li>
                                                        <li>3. Batas minimal bimbingan <?= $seminar ?> adalah <?= $batas ?> kali</li>
                                                        <?php if($catatan_perbaikan != null) { ?>
                                                        <li>4. Untuk mahasiswa yang mengulang seminar hasil, tombol verifikasi akan muncul jika perbaikan sudah diceklis. </li>
                                                        <?php } ?>
                                                    </ul>
                                       
                                         
                                         
                                         <?php if($jlh_bimbingan >= $batas) { if($catatan_perbaikan != null or $jenis_seminar=='sempro') { echo "Here"; if($jlh_diceklis == $jlh_catatan_perbaikan) { ?> 
                                          <form class="form" method="post" action="<?php echo base_url().'Tugas/update_izin_bimbingan/'.$nim.'/'.$jenis_seminar.'/'.$status_dopim ;?>" enctype="multipart/form-data">
            <input type="hidden" id="id_pengajuan" name ='id_pengajuan' value="<?= $id_pengajuan ?>">
                                              
                                            <div class="row">
                                                <div class="col-sm-3">
                                                <div class="form-group">
                                                   <input type="date" class="form-control" name="rencana_tgl_seminar" value="<?= $rencana_tgl_seminar ?>">
                                                    <label>Rencana Tanggal Seminar</label>
                                                </div>
                                                </div>
                                                
                                                <div class="col-sm-2">
                                                    <button type="submit" class="btn btn-primary">Izinkan Mengikuti <?= $seminar ?></button>
                                                </div>
                                                
                                            </div>
                                              
                                            
                                              
                                         </form> 
                                         <?php } } } ?>
                                    </div>
                                    
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <p class="text-light">Status : <?php if($status_dopim == 'pembimbing1') {
                                                    if($pembimbing1 != '0000-00-00')
                                                    {
                                                        echo "Sudah Mengizinkan";
                                                    }
                                                    else
                                                    {
                                                        echo "Belum Mengizinkan";
                                                    }
                                                    }
                                                                             
                                                    else if($status_dopim == 'pembimbing2') {
                                                    if($pembimbing2 != '0000-00-00')
                                                    {
                                                        echo "Sudah Mengizinkan";
                                                    }
                                                    else
                                                    {
                                                        echo "Belum Mengizinkan";
                                                    }
                                                    }
                                                                             
                                                    else if($status_dopim == 'penguji1') {
                                                    if($penguji1 != '0000-00-00')
                                                    {
                                                        echo "Sudah Mengizinkan";
                                                    }
                                                    else
                                                    {
                                                        echo "Belum Mengizinkan";
                                                    }
                                                    }
                                                                             
                                                    else if($status_dopim == 'penguji2') {
                                                    if($penguji2 != '0000-00-00')
                                                    {
                                                        echo "Sudah Mengizinkan";
                                                    }
                                                    else
                                                    {
                                                        echo "Belum Mengizinkan";
                                                    }
                                                    }
                                                    ?></p>
                                            </div>
                                            </div>
                                    </div>
											
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
             
             $("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
                </script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
