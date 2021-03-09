<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

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
		<meta prefix="og: http://ogp.me/ns#" property="og:title" content="HideSeek jQuery plugin" />
  		<meta prefix="og: http://ogp.me/ns#" property="og:type" content="website" />
  		<meta prefix="og: http://ogp.me/ns#" property="og:image" content="http://vdw.github.io/HideSeek/images/hideseek_logo.png" />
  		<meta prefix="og: http://ogp.me/ns#" property="og:url" content="http://vdw.github.io/HideSeek/" />
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
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/jquery.datatables.min.css');?>" />
 		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/vendor/normalize.css');?>">
 		
 		 
 		 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/vendor/github.css');?>">
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
			<div class="section-header">
						
					</div>
			<?php if($message != ' ' AND $message != null) {
						if($message == 'Tanggal Tidak Valid')
							{
								echo "
							

					<div class=\"section-body\">
						<div class=\"alert alert-danger\" role=\"alert\">
							<strong>Maaf! </strong>". $message."</div>"; 
							}

							else if($message == 'Gagal Menambah Jadwal Baru')
							{
								echo "
							

					<div class=\"section-body\">
						<div class=\"alert alert-danger\" role=\"alert\">
							<strong>Maaf! </strong>". $message."</div>"; 
							}


							else{
							echo "
							

					<div class=\"section-body\">
						<div class=\"alert alert-success\" role=\"alert\">
							<strong>Well done! </strong>". $message."</div>"; } }?>
								<div class="section-header">
										<ol class="breadcrumb">
											<li><a href="<?php echo base_url('tugas/jadwal_seminar');?>">Jadwal Seminar</a></li>
											<li class="active">Edit Jadwal</li>
										</ol>
					</div>
			<div class="section-body contain-lg">

			<?php foreach($data as $data_b) {

					$id = $data_b->id;
					$seminar = $data_b->seminar;
					$jadwal = $data_b->jadwal;
					$batas = $data_b->batas_sidang;
					$pembanding1 = $data_b->pembanding1;
					$pembanding2 = $data_b->pembanding2;

			}

			?>

		
			
			<div class="card">
							<div class="card-body">
							
								<form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'tugas/update_jadwal/'.$id;?>" >

									<!-- Seminar -->
									<div class="col-md-12">
										<h4>Edit Jadwal</h4>
										<hr>
										<h5>Seminar</h5>
									</div><!--end .col -->
									<div class="form-group">
										<label for="seminar" class="col-sm-2 control-label">Seminar </label>
										<div class="col-sm-10">
											<div class="input-group">
												<div class="input-group-content">

													<select id='seminar' name='seminar' class='form-control' disabled>
													
													<option value='proposal' <?php if($seminar == 'seminar proposal') { echo "selected ='selected'";} ?> >Seminar Proposal</option>

													<option value='hasil' <?php if($seminar == 'seminar hasil') { echo "selected ='selected'";} ?>>Seminar Hasil</option>
													<option value='sidang' <?php if($seminar == 'sidang') { echo "selected ='selected'";} ?>> Sidang</option>
													</select>
												
												</div>
											</div>
										</div>
									</div><!--end SEMINAR  -->
								
								
									<!-- Jadwal -->
									
									<div class="form-group">
										<label for="Jadwal" class="col-sm-2 control-label">Jadwal Seminar </label>
										<div class="col-sm-10">
											<div class="input-group">
												
													<input type="date" class="form-control" name="jadwal" value="<?php echo $jadwal; ?>">
												
											</div>
										</div>
									</div><!--end JADWAL -->
		
									
									<!-- Batas Jumlah Peserta Sidang -->
									<div class="form-group">
										<label for="Jadwal" class="col-sm-2 control-label">Batas Sidang </label>
										<div class="col-sm-10">
											<div class="input-group">
												<div class="input-group-content">
													<input type="number" class="form-control" name="batas" value="<?php echo $batas; ?>">
													<span class="input-group-addon">Orang</span>
												</div>
											</div>
										</div>
									</div><!--end Batas Jumlah Peserta Sidang -->


									<div class="form-group">
										
										<div class="col-sm-2 control-label">
											<div class="input-group">
												<div class="input-group-btn">
													<button type="submit" class="btn btn-default" onclick="return confirm('Apakah Anda Yakin Mengedit Data ini?')">Simpan</button>
												</div>
											</div>
										</div>
									</div><!--end .form-group -->

								</form>

							



							<hr><hr>
							<div class="col-md-12">
									<h4><strong>Mahasiswa <?= ucwords($seminar) ?></strong></h4>
									<hr>
									<h6>Pada : <b><?php 
$dayName = date("l", strtotime($jadwal));

switch($dayName)
{
	case 'Sunday' : $hari = 'Minggu';break;
	case 'Monday' : $hari = 'Senin';break;
	case 'Tuesday' : $hari = 'Selasa';break;
	case 'Wednesday' : $hari = 'Rabu';break;
	case 'Thursday' : $hari = 'Kamis';break;
	case 'Friday' : $hari = 'Jumat';break;
	case 'Saturday' : $hari = 'Sabtu';break;
}
	
	$orderdate = explode('-', $jadwal);
$tahun = $orderdate[0];
$month   = $orderdate[1];
$tanggals  = $orderdate[2];

switch($month)
{
	case '1' : $bulan = 'Januari';break;
	case '2' : $bulan = 'Februari';break;
	case '3' : $bulan = 'Maret';break;
	case '4' : $bulan = 'April';break;
	case '5' : $bulan = 'Mei';break;
	case '6' : $bulan = 'Juni';break;
	case '7' : $bulan = 'Juli';break;
	case '8' : $bulan = 'Agustus';break;
	case '9' : $bulan = 'September';break;
	case '10' : $bulan = 'Oktober';break;
	case '11' : $bulan = 'November';break;
	case '12' : $bulan = 'Desember';break;
} echo $hari .", ". $tanggals ." ". $bulan ." ". $tahun;
 ?></b></h6>
							</div>
							
							<div class="row">
							
							<div class="col-sm-12">
								<div class="table-responsive">
									<table id="datatable1" class="table table-striped table-hover">
										<thead>
											<tr>
												<th>NIM</th>
												<th>Peserta Sidang</th>
												<th>Program Studi</th>
												<th>Dosen Pembimbing 1</th>
												<th>Dosen Pembimbing 2</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>

											<?php foreach($tgl as $b) { ?>
											<tr>
												<td><?php echo $b->nim ?></td>
												<td><?php echo $b->nama ?></td>
												<td><?php echo $b->nama_PS ?></td>
												<td><?php echo $b->Dosen_Pembimbing1 ?></td>
												<td><?php echo $b->Dosen_Pembimbing2 ?></td>
												<td><?php echo anchor('tugas/delete_mahasiswa_sidang/'.$b->nim.'/'.$b->id_jadwal_seminar,'<button type="button" class="btn btn-warning">Hapus</button>'); ?>
												<?php echo anchor('tugas/berita_acara/'.$b->nim.'/'.$b->id_jadwal_seminar.'/'. $b->id_pengajuan,'<button type="button" class="btn btn-success">Berita Acara</button>'); ?>
													<?php echo anchor('tugas/form_penilaian/'.$b->nim.'/'.$b->id_jadwal_seminar.'/'. $b->id_pengajuan.'/all','<button type="button" class="btn btn-info">Form Penilaian</button>'); ?>
												<?php if($seminar != 'seminar proposal') { ?>
												<?php echo anchor('tugas/nilai/'.$b->nim.'/'.$seminar.'/'.$b->id_jadwal_seminar,'<button type="button" class="btn btn-danger">Nilai</button>'); ?>

												<?php } if($seminar == 'seminar hasil') { ?>

												<?php echo anchor('tugas/update_pembanding/'.$b->nim.'/'.$seminar.'/'.$b->id_jadwal_seminar,'<button type="button" class="btn btn-info">Pembanding</button>'); ?>

												<?php } if($seminar == 'sidang') { ?>
													<?php echo anchor('tugas/lampiran_borang_sidang/'.$b->nim,'<button type="button" class="btn btn-danger">Lampiran</button>'); ?>
													<?php echo anchor('tugas/rekapitulasi_nilai/'.$b->nim.'/'. $b->id_pengajuan.'/'. $b->id_jadwal_seminar,'<button type="button" class="btn btn-info">Rekapitulasi</button>'); ?>
													<?php echo anchor('tugas/kata_pengantar_sidang/'.$b->nim,'<button type="button" class="btn btn-success">Pengantar Sidang</button>'); ?>
												<?php } ?>
												</td>

											</tr>
											<?php } ?>


										</tbody>
									</table>
								</div><!--end .table-responsive -->
							</div><!--end .col -->
							<div class="row">
<!--									<div class="col-sm-6"><button type="button" class="btn btn-success" <?= !$button_active ? 'disabled' : '' ?>><?php echo anchor('tugas/add_mahasiswa/'.$id,'Tambah Mahasiswa'); ?></button></div>-->
                                
                                <div class="col-sm-6"><?php echo anchor('tugas/add_mahasiswa/'.$id,'<button type="button" class="btn btn-success"><span><i class="fa fa-plus-square"></i></span> Tambah Mahasiswa</button>'); ?></div>
						</div><!--end .row -->
							</div><!--end .card-body -->
						</div><!--end .card -->
						
						</div>
					</div>
					</section>
				</div>
			<!-- END CONTENT -->

			<!-- BEGIN MENUBAR-->
				<?php $this->load->view('main_templates/menu_bar') ?>
			<!-- END MENUBAR -->

		</div><!--end #base-->
		<!-- END BASE -->

		<!-- BEGIN JAVASCRIPT -->
		<script src="<?php echo base_url('assets/js/libs/jquery/jquery-1.11.2.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/libs/jquery/jquery-migrate-1.2.1.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/libs/bootstrap/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/libs/spin.js/spin.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/autosize/jquery.autosize.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/DataTables/jquery.dataTables.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/nanoscroller/jquery.nanoscroller.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/App.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppNavigation.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppOffcanvas.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppCard.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppForm.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppNavSearch.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppVendor.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/demo/Demo.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/demo/DemoTableDynamic.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/DataTables/search.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/vendor/jquery.hideseek.min.js');?>"></script>
 		<script type="text/javascript" src="<?php echo base_url('assets/js/vendor/rainbow-custom.min.js');?>"></script>
 		<script type="text/javascript" src="<?php echo base_url('assets/js/vendor/jquery.anchor.js');?>"></script>
 		<script src="<?php echo base_url('assets/js/initializers.js');?>"></script>
		<!-- END JAVASCRIPT -->

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
	</body>
</html>
