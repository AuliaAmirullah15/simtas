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
                        
              <?php if($error != '' AND $error != null) {

if($error == 'berhasil upload')
{

							echo "

					<div class=\"section-body\">
						<div class=\"alert alert-success\" role=\"alert\">
							<strong>Selamat! </strong> Anda berhasil mengupload <b>Berkas Persyaratan Seminar Proposal</b></div>";
}
    else if ($error == 'Simpan Sementara Berhasil')
    {
        echo "

					<div class=\"section-body\">
						<div class=\"alert alert-success\" role=\"alert\">
							<strong>Selamat! </strong> ".$error."</b></div>";
    }
else
{
echo "

					<div class=\"section-body\">
						<div class=\"alert alert-warning\" role=\"alert\">
							<strong>Maaf! </strong>". $error."</div>";
}
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
                                        
                                        <?php foreach($data as $d) {
    
                                            $id = $d->id;
                                            $nim = $d->nim;
                                            $judul = $d->judul;
                                            $id_pengajuan = $d->id_pengajuan;
                                            $tgl_penyerahan = $d->tgl_penyerahan;
                                            $tgl_selesai_diperiksa = $d->tgl_selesai_diperiksa;
                                            $tgl_terima_kembali = $d->tgl_terima_kembali;
                                            $catatan = $d->catatan;
                                            $pembimbing = $d->pembimbing;
    
                                        }
                                        ?>

										<!-- BEGIN BLOG POST TEXT -->
										<div class="col-md-9">
											<article class="style-default-bright">
												<div class="card-body">
                                                    <h3>Edit Riwayat Bimbingan Pra-<?php switch($jenis_seminar) {
                                                        
    case 'sempro': echo "Seminar Proposal";break;
    case 'semhas': echo "Seminar Hasil"; break;
    case 'sidang': echo "Sidang Meja Hijau"; break;
                                                    }?></h3>
                                                    <hr>
                                                    
                                                    <!-- FORM TAMBAH RIWAYAT BIMBINGAN -->
                                                    
                                                   <form class="form" method="post" action="<?php echo base_url().'mahasiswa/update_riwayat_bimbingan/'.$id.'/'.$jenis_seminar ;?>" enctype="multipart/form-data" onsubmit="return confirm('Yakin Data ini Sudah Diedit dengan benar?');">
									
										 <input type="hidden" id="id_pengajuan" name ='id_pengajuan' value="<?= $id_pengajuan ?>">
        <div class="row">
                                                       
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" class="form-control" name="judul" value="<?= $judul ?>" disabled>
                    <label for="judul">Judul</label>
                </div>
            </div>
        </div>
            
           <div class="row">
												<div class="col-sm-4">
													<div class="form-group">
														<input type="date" class="form-control" id="tgl_penyerahan" name='tgl_penyerahan' value="<?= $tgl_penyerahan ?>">
														<label for="tgl_penyerahan">Tanggal Penyerahan</label>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<input type="date" class="form-control" id="tgl_selesai_diperiksa" name='tgl_selesai_diperiksa' value="<?= $tgl_selesai_diperiksa ?>">
														<label for="tgl_selesai_diperiksa">Tanggal Selesai Diperiksa</label>
													</div>
												</div>
                                                <div class="col-sm-4">
													<div class="form-group">
														<input type="date" class="form-control" id="tgl_terima_kembali" name='tgl_terima_kembali' value="<?= $tgl_terima_kembali ?>">
														<label for="tgl_terima_kembali">Tanggal Terima Kembali</label>
													</div>
												</div>
											</div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea class="form-control" id="message-text" name="catatan"><?= $catatan ?></textarea>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
														<select class="form-control" name="pembimbing">
																
                                                            <option value="pembimbing1" <?php if($pembimbing == 'pembimbing1') {echo "selected='selected'";} ; ?>>Pembimbing 1</option>
                                                            <option value="pembimbing2" <?php if($pembimbing == 'pembimbing2') {echo "selected='selected'";} ; ?>>Pembimbing 2</option>
                                                            <?php if($form == '5') { ?>
                                                                <option value="penguji1" <?php if($pembimbing == 'penguji1') {echo "selected='selected'";} ; ?>>Penguji 1</option>
                                                                <option value="penguji2" <?php if($pembimbing == 'penguji2') {echo "selected='selected'";} ; ?>>Penguji 2</option>
                                                            <?php } ?>
                                                           
														</select>
														<label>Catatan Bimbingan Dengan Pembimbing</label>
													</div>
													
											
                </div>
            </div>
										
										<div class="card-actionbar">
											<div class="card-actionbar-row">
												<a href="<?php echo base_url('mahasiswa/riwayat_bimbingan/'. $jenis_seminar) ;?>"><button type="button" class="btn btn-flat btn-primary ink-reaction" name="tombol" value="simpan sementara">Kembali</button>
												<button type="submit" class="btn btn-flat btn-primary ink-reaction" name="tombol" value="applied">Update</button>
											</div>
										</div>
								
									
								</form>
                                                    
                                                    
                                                    
                                                    
                                                    <!-- END FORM TAMBAH RIWAYAT BIMBINGAN --> 
								
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
        
		<!-- END JAVASCRIPT -->

	</body>
</html>
