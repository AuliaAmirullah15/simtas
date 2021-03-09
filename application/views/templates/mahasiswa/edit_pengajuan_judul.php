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
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/font-awesome.min.css?1422529194');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/material-design-iconic-font.min.css?1421434286');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/libs/wizard/wizard.css?1425466601');?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/libs/summernote/summernote.css?1425218701');?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/libs/multi-select/multi-select.css?1424887857');?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/libs/typeahead/typeahead.css?1424887863');?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/libs/bootstrap-tagsinput/bootstrap-tagsinput.css?1424887862');?>" />
        
        <style>
             .note-editor {
                height: 300px;
            }
            
            .cke_editable {
                border: 3px solid #f5f5f5;
                height: 300px;
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

	<!-- GET DATA PROFIL -->
		<?php
			foreach($profil as $profil)
			{
				$nim = $profil->nim;
				$nama = $profil->nama;
				$id_PS = $profil->id_PS;
				$status = $profil->status;
			}

			foreach($pengajuan as $pengajuan)
			{
				$id_pengajuan = $pengajuan->id_pengajuan;
				$nim = $pengajuan->nim;
				$judul_diajukan = $pengajuan->judul_diajukan;
				$judul_diajukan_mahasiswa = $pengajuan->judul_diajukan_mahasiswa;
				$ilmu1 = $pengajuan->ilmu1;
				$ilmu2 = $pengajuan->ilmu2;
				$dopim1 = $pengajuan->calon_dopim1;
				$dopim3 = $pengajuan->calon_dopim2;
				$tgl = $pengajuan->tgl_pengajuan;
				$judul = $pengajuan->judul;
				$latar_belakang = $pengajuan->latar_belakang;
				$rumusan_masalah = $pengajuan->rumusan_masalah;
				$metodologi = $pengajuan->metodologi;
				$referensi = $pengajuan->referensi;
				$upload = $pengajuan->upload;
				$jenis_ta = $pengajuan->jenis_TA;
                $file = $pengajuan->file;
                $catatan_validasi = $pengajuan->catatan_validasi;
                $status_validasi = $pengajuan->status_validasi;
                $ringkasan = $pengajuan->ringkasan;
                $keywords = $pengajuan->keywords;
			}
		?>

	<!-- END GET DATA PROFIL -->

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
						<div class="row">
							<div class="col-lg-12">
							<?php if($warning != ' ' AND $warning != null) {
									if($warning == 'Data Pengajuan Judul Berhasil Diedit') { 	echo "

					<div class=\"section-body\">
						<div class=\"alert alert-success\" role=\"alert\">
							<strong>Selamat! </strong>". $warning."</div>";}
							else { echo "

					<div class=\"section-body\">
						<div class=\"alert alert-danger\" role=\"alert\">
							<strong>Maaf! </strong>". $warning."</div>"; } }
							 ?>
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
                                                    
                                                    <?php if(($catatan_validasi != '' OR $catatan_validasi != 'NULL') AND $status_validasi == 'ditolak'){ ?>
    
                                                    <div class="section-body">
						                              <div class="alert alert-info" role="alert">
							                             <strong><h3>Catatan Perbaikan Validasi: </h3></strong>
                                                          <h5><?= $catatan_validasi ?></h5>
                                                        </div>
                                                    </div>
                            
                                                    <?php } ?>
												<!-- Start Form Pengajuan Judul -->
													<form class="form" method="post" action="<?php echo base_url().'mahasiswa/post_pengajuan/sementara_hapus';?>" enctype="multipart/form-data">
									<div class="card">
										<div class="card-head style-primary">
											<header>Pengajuan Judul</header>
										</div>
										<div class="card-body floating-label">
										<h4>Form Pengajuan Judul </h4>
										<hr>
										<input type="hidden" id="id_pengajuan" name ='id_pengajuan' value="<?= $id_pengajuan ?>">
										
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<input type="hidden" class="form-control" id="nama_hidden" name='nama_hidden' value="<?= $nama ?>" >
                                                        <input type="text" class="form-control" id="nama" name='nama' value="<?= $nama ?>" disabled>
														<label for="nama">Nama</label>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<input type="text" class="form-control" id="nim1" name="nim" value="<?= $nim ?>" disabled>
														<label for="nim">NIM</label>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="judul diajukan">Judul Diajukan Oleh</label>
												<div class="col-sm-12">
													<div class="checkbox-inline checkbox-styled">
														<label>
															<input type="checkbox" name="diajukan1" value="dosen" <?php if($judul_diajukan == 'dosen') {echo 'checked';}?>>
															<span>Dosen</span>
														</label>
													</div>
													<div class="checkbox-inline checkbox-styled">
														<label>
															<input type="checkbox" name="diajukan2" value="mahasiswa" <?php if($judul_diajukan_mahasiswa == 'mahasiswa') {echo 'checked';}?>>
															<span>Mahasiswa</span>
														</label>
													</div>
												</div><!--end .col -->
											</div>
												<div class="form-group">
												<div class="input-group">
													<div class="input-group-content">
														<select class="form-control" name="ilmu1">
																<?php foreach($bidang_ilmu as $bidang_ilmu) { ?>
                                                        
                                                            <option value="<?= $bidang_ilmu->bidang_ilmu ?>" <?php if($ilmu1 == $bidang_ilmu->bidang_ilmu) {echo "selected='selected'";}?>><?= $bidang_ilmu->bidang_ilmu ?></option>
                                                            
                                                            <?php } ?>
														</select>
														<label>Bidang Ilmu (2 Bidang)</label>
													</div>
													<span class="input-group-addon">atau</span>
													<div class="input-group-content">
														<select class="form-control" name="ilmu2">
																<?php foreach($bidang_ilmu2 as $bidang_ilmu2) { ?>
                                                            
                                                            <option value="<?= $bidang_ilmu2->bidang_ilmu ?>" <?php if($ilmu2 == $bidang_ilmu2->bidang_ilmu) {echo "selected='selected'";}?>><?= $bidang_ilmu2->bidang_ilmu ?></option>
                                                            
                                                            <?php } ?>
														</select>
														<div class="form-control-line"></div>
													</div>
												</div>
											</div>
										
										<div class="form-group">
										<label for="select13" class=" control-label">Calon Dopim1</label>
											<select id="dopim1" name="dopim1" class="form-control">
												<option value=""></option>
												<?php
													foreach($dopim as $dopim)
													{
														if($dopim1 == $dopim->Kode_dosen)
														{
															echo "<option value='".$dopim->Kode_dosen."' selected>".$dopim->Nama_dosen."</option>";
														}
														else
														{
														echo "<option value='".$dopim->Kode_dosen."'>".$dopim->Nama_dosen."</option>";
														}
													}

												?>
											</select>
									</div>

										<div class="form-group">
										<label for="select13" class=" control-label">Calon Dopim2</label>
											<select id="dopim2" name="dopim2" class="form-control" disabled>
												<option value=""></option>
												<?php
													foreach($dopim2 as $dopim2)
													{
														if($dopim3 == $dopim2->Kode_dosen)
														{
															echo "<option value='".$dopim2->Kode_dosen."' selected>".$dopim2->Nama_dosen."</option>";
														}

														else
														{
														echo "<option value='".$dopim2->Kode_dosen."'>".$dopim2->Nama_dosen."</option>";
														}
													}

												?>
											</select>
										</div>

<!--
										<div class="row">
										<div class="form-group">
										<div style="border: 1px solid black; float: left;">
   										 <img id="preview-image" width="100px" height="150px" src="<?php if($upload){ echo base_url().'foto/'.$upload;} else{ echo '#';} ?>" alt="your image will be placed here" />

   										

										</div>
										</div>
                                        </div>
-->
                                          <div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<input type="text" class="form-control" id="judul" name='judul' value="<?= $judul ?>">
														<label for="nama">Judul</label>
													</div>
												</div>
                                        </div>
                                            
                                         <div class="row">
                                                <div class="col-sm-12">
                                                    <label for="nama" style="color: gray;">Ringkasan</label>
                                        <div class="card-body">
								<textarea id="ckeditor" name="ringkasan" class="form-control control-12-rows" placeholder="Enter text ...">
									<?php echo $ringkasan; ?>
                                            </textarea></div></div>
							</div><!--end .card-body -->
                                            
                                      
											<div class="form-group">
												<input type="text" name="keywords" placeholder="Artificial Intelligence, Cosine Similarity, Natural Language Generation" value="<?php echo $keywords; ?>" data-role="tagsinput" />
												<label>Keywords</label>
											</div><!--end .form-group -->
											
                                            
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="upload" class="control-label" value='<?php echo $file; ?>'>Berkas yang disimpan sementara: </label>
                                                <?php echo anchor('mahasiswa/download_berkas/'.$file, $file); ?>
                                                <input type="hidden" name="file_older" id="file_older" value="<?= $file ?>">
                                            </div>    
                                        </div>
                                            
                                            <div class="row">
										<h5 class="text-light"><strong>Notes : </strong>
                                            <ls>
                                                <ol type="1">
                                                    <li>Format yang didukung PDF</li>
                                                    <li>Ukuran File Tidak Melebihi 2 MB (2048 KB)</li>
                                                    <li>Format Nama File Akan Berubah Secara Otomatis: PengajuanJudul_Nim_Nama</li>
                                                </ol>
                                            </ls>
                                                </h5>

										</div>

										<div class="form-group">
										<input type="file" name="berkas" id="berkas">
										<label for="upload" class="control-label" value='<?php echo $file; ?>'>Upload Berkas</label>
										</div>
											
										</div><!--end .card-body -->
										<div class="card-actionbar">
											<div class="card-actionbar-row">
												<button type="submit" class="btn btn-flat btn-primary ink-reaction" name="tombol" value="simpan sementara">Simpan Sementara</button>
												<button type="submit" class="btn btn-flat btn-primary ink-reaction" name="tombol" value="applied">Apply</button>
											</div>
										</div>
									</div><!--end .card -->
									
								</form>
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
		<script src="<?php echo base_url('assets/js/core/demo/DemoFormWizard.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/wizard/jquery.bootstrap.wizard.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/demo/DemoFormEditors.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/ckeditor/ckeditor.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/ckeditor/adapters/jquery.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/summernote/summernote.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js');?>"></script>
        
<!--
		<script type="text/javascript">
	function previewImage(input) {
		
		if (input.files && input.files[0]) {
			var fileReader = new FileReader();
			var imageFile = input.files[0];
			
			if(imageFile.type == "image/png" || imageFile.type == "image/jpeg") {
				fileReader.readAsDataURL(imageFile);
				
				fileReader.onload = function (e) {
					$('#preview-image').attr('src', e.target.result);
				}
			}
			else {
				alert("your file is not image");
			}
		}
	}

	$("[name='berkas']").change(function(){
		previewImage(this);
	});
</script>
-->
		<!-- END JAVASCRIPT -->

	</body>
</html>
