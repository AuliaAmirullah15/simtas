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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom_css.css');?>">
 		 <style type="text/css">
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
				<section class="style-default-bright">
					<div class="section-header">
				
						<h2 class="text-primary">Daftar Tugas Akhir</h2>
					</div>

					<div class="section-body">

						<?php if($message != ' ' AND $message != null) {

							echo "

					<div class=\"section-body\">
						<div class=\"alert alert-success\" role=\"alert\">
							<strong>Well done!</strong>". $message."</div></div>"; } ?>

					

						<div class="row">
							
								<article class="margin-bottom-xxl">
									<p class="lead">
									<?php if(empty($set) ) { ?>
									<form class="form" role="form" action="<?php echo base_url('tugas/skripsi') ?>" method="post">
										<div class="col-sm-1"><select id="select2" name="batas" class="form-control">
												<option value="5" <?php if($_SESSION['batas'] == 5) {echo "selected='selected'";} else {echo "selected='selected'";}?> > 5 </option>
												<option value="10" <?php if($_SESSION['batas'] == 10) {echo "selected='selected'";} ?> > 10 </option>
												<option value="20" <?php if($_SESSION['batas']==20) {echo "selected='selected'";} ?> > 20 </option>
												<option value="50" <?php if($_SESSION['batas']==50) {echo "selected='selected'";} ?> > 50 </option>
												<option value="100" <?php if($_SESSION['batas']==100) {echo "selected='selected'";} ?> > 100 </option>
                                                <option value="all" <?php if($_SESSION['batas']=='all') {echo "selected='selected'";} ?> > All </option>
												</select>
												</div>
											<div class="col-sm-1"><input type="submit" value="submit" class="btn btn-default"></div>
									<?php } ?>
									</p>
								</article>
							</form>
						</div><!--end .row -->

						<div class="row">
							<div >
								<div class="">
									<div class="card-body">
										<form class="form" role="form" action="<?php echo base_url('tugas/search_skripsi') ?>" method="post">
									<div class="row">
										<div class="col-sm-3">	
											<div class="form-group floating-label">
												<input type="text" class="form-control" id="regular2" name="key" value="<?php if($cari != NULL) { echo $cari;} else {echo "";} ?>" >
						
												<label for="regular2">Nama Dosen Pembimbing</label>
											</div>
										</div>

										<div class="col-sm-3">
											<div class="form-group floating-label">
												<input type="text" class="form-control" id="search-hidden-mode" name="skripsi" data-list=".hidden_mode_list" autocomplete="off" value="<?php if($skripsi != NULL) { echo $skripsi;} else {echo "";} ?>" >
												
            <ul class="vertical hidden_mode_list" style="list-style: none;">
            	<?php foreach($data as $d) {

            		echo "<a class='test' value='$d->judul'><li>$d->judul</li></a>";
}

            	 ?>
            </ul>

  
												<label for="regular2">Judul Skripsi</label>
											</div>
										</div>
										<div class ="col-sm-3">
											<div class="form-group floating-label">
												<input type="text" class="form-control" id="regular2" name="nim" value="<?php if($nim != NULL) { echo $nim;} else {echo "";} ?>" >
						
												<label for="regular2">NIM/Nama</label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group floating-label">
												<select id="select2" name="prodi" class="form-control">
												<option value="all" <?php if($prodi == NULL) {echo "selected='selected'" ;} ?> > All </option>

												<?php foreach($studi as $prodi2)
												{?>

													<option value = "<?php echo $prodi2->nama_PS?>" <?php if($prodi2->nama_PS == $prodi) {echo "selected='selected'";} ?> ><?php echo $prodi2->nama_PS; ?> </option>
												<?php 
											}



												?>
												</select>
												<label for="regular2">Program Studi</label>
											</div>
										</div>
									</div>
									<div class="row">
                                        <div class="col-sm-6">
                                        <div class="form-group">
												<div class="input-daterange input-group" id="demo-date-range">
													<div class="input-group-content">
														<input type="text" class="form-control" id="placeholder2" name="tahun_lulus" value="<?php if($tahun_lulus != NULL) { echo $tahun_lulus;} else {echo "";} ?>" placeholder="2014">
												<label for="placeholder2">Tahun Lulus</label>
													</div>
													<span class="input-group-addon">s/d</span>
													<div class="input-group-content">
														<input type="text" class="form-control" id="placeholder2" name="tahun_lulus2" value="<?php if($tahun_lulus2 != NULL) { echo $tahun_lulus2;} else {echo "";} ?>" placeholder="2014">
														<div class="form-control-line"></div>
													</div>
												</div>
								        </div>
                                        </div>

										<div class="col-sm-3">
												<div class="form-group floating-label">
												<select id="select2" name="jenis_ta" class="form-control">
												<option value="all" <?php if($jenis_ta == NULL) {echo "selected='selected'" ;} ?> > All </option>

													<option value = "skripsi" <?php if($jenis_ta == 'skripsi') {echo "selected='selected'";} ?> >Skripsi </option>
													<option value = "tesis" <?php if($jenis_ta == 'tesis') {echo "selected='selected'";} ?> >Tesis </option>
													<option value = "disertasi" <?php if($jenis_ta == 'disertasi') {echo "selected='selected'";} ?> >Disertasi </option>
											
												</select>
												<label for="regular2">Jenis Tugas Akhir</label>
											</div>
										</div>
										

										<div class="col-sm-1">
											<input type="hidden" class="form-control" id="regular2" name="page">
											<div><input type="submit" id="submitSearch" class="btn btn-default" value="Cari"></div>	
										</div>
										<div class="col-sm-1">							
											<div><button name="reset" class="btn btn-default" value="reset"><?php echo anchor('tugas/skripsi/','Reset'); ?></button></div>
										</div>
									</div>
                                             <br><br>
                                            
                                                <div class="row">
                                    <div class="col-sm-6">
                                        Total Data : <?= $jumlah ?> data
                                    </div>
                                    <div class="col-sm-6">
                                        
                                        <div class="pull-right">
                                            <ul class="list-table"><?php if($_SESSION['level'] == '1') { ?><li><?php echo anchor('tugas/tambah_skripsi/','<button type="button" class="btn btn-success"><span><i class="fa fa-plus-square"></i></span> Tambah Data</button>',array('class'=>'tambah_skripsi')); ?></li>
                                                <?php } ?>
                                                <li><button class="btn btn-info" name="cetak" value="cetak"><span><i class="fa fa-print"></i></span>  CETAK</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
										</form>
									</div><!--end .card-body -->
								</div><!--end .card -->
								
        						<div class="table-responsive">
        
									<table id="" class="table table-striped table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th class="sort-numeric">NIM</th>
												<th class="sort-alpha">Tahun Lulus</th>
												<th class="sort-numeric">Nama </th>
												<th class="sort-numeric">Judul</th>
												<th class="sort-alpha">Program Studi</th>
												<th class="sort-numeric">Pembimbing 1</th>
												<th class="sort-numeric">Pembimbing 2</th>
                                                <th class="sort-numeric">Penguji 1</th>
												<th class="sort-numeric">Penguji 2</th>
												<th class="sort-numeric">Tugas Akhir</th>
                                                <th class="sort-numeric">Bidang Ilmu 1</th>
                                                <th class="sort-numeric">Bidang Ilmu 2</th>
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
													<td><?php echo $d->nim ?></td>
													<td><?php echo $d->tahun_lulus ?></td>
													<td><?php echo $d->nama ?></td>
													<td><?php echo $d->judul ?></td>
													<td><?php echo $d->nama_PS ?></td>
													<td><?php echo $d->Dosen_Pembimbing1 ?></td>
													<td><?php echo $d->Dosen_Pembimbing2 ?></td>
                                                    <td><?php echo $d->Dosen_Pembanding1 ?></td>
													<td><?php echo $d->Dosen_Pembanding2 ?></td>
													<td><?php echo $d->jenis_TA ?></td>
                                                    <td><?php echo $d->ilmu1 ?></td>
                                                    <td><?php echo $d->ilmu2 ?></td>
                                                    <td><ul class="list-table"><?php if($_SESSION['level'] == '1') { ?><li><?php echo anchor('tugas/update_skripsi/'.$d->nim,'<i class="fa fa-pencil" title="Edit"></i>'); ?></li>
													<li><?php echo anchor('tugas/delete_skripsi/'.$d->nim,'<i class="fa fa-trash-o title="Hapus" OnClick="return confirm(\'Yakin Ingin Menghapus Data ini ?\')"></i>',array('class'=>'delete_skripsi',
						'onclick'=>"return confirmDialog('Yakin Ingin Menghapus?');")

                                                                         ); ?></li><?php } ?>
                                                        <li><?php echo anchor('tugas/detail_skripsi/'.$d->nim,'<i class="fa fa-reorder" title="Detail"></i>'); ?></li></ul></td>
												</tr>
												<?php } ?>


											<?php if($jumlah == NULL) {echo "<tr><td colspan='10'><center>No data Available</center></td></tr>";} ?>
										<!-- End of content of table -->
										</tbody>

									</table>
								</div>

								<div class="row">
									<div class="col-sm-5"><?php if($_SESSION['level'] == '1') { ?><?php echo anchor('tugas/tambah_skripsi/','<button type="button" class="btn btn-success"><span><i class="fa fa-plus-square"></i></span> Tambah Data</button>',array('class'=>'tambah_skripsi')); ?><?php } ?></div>
									<div class="col-sm-4"> Total Data : <?= $jumlah ?> data</div>

									<!--<div class="col-xs-1"><?= $pagination ?></div>-->
									<div class="col-sm-3"><ul class="pagination"><?= $pagination ?></ul></div>
								</div>
								</div><!--end .table-responsive -->
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END DATATABLE 1 -->

						<hr class="ruler-xxl"/>

						
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
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
		 <script>
                    $(document).ready(function(){
                        $(".test").click(function(e){
                            var x = e.currentTarget.attributes.value.nodeValue;
                            $("input[name=skripsi]").val(x);
                            return false;
                            
                        });
                    });
                </script>
	</body>
</html>
