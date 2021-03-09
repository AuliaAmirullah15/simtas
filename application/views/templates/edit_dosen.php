<!DOCTYPE html>
<html lang="en">
<?php 
		if(!isset($_SESSION['username']))
		{
			redirect('tugas/login');
		}
	?>
	<head>
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

			<!-- BEGIN HEADER-->
		<?php $this->load->view('main_templates/header') ?>
		<?php error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);?>
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

						<!-- BEGIN VERTICAL FORM -->
						<?php
							foreach($dosen as $dsn)
							{
								$kd=$dsn->Kode_dosen;
								$nama=$dsn->Nama_dosen;
								$pangkat=$dsn->Pangkat;
								$gol=$dsn->Golongan;
								$nip=$dsn->NIP;
								$nidn=$dsn->NIDN;
								$kd_ps=$dsn->Kode_PS;
								$prodi=$dsn->nama_PS;
                                $ttd = $dsn->ttd;
							}

							foreach($akun as $a)
							{
								$username = $a->username;
							}

						?>
						
						<div class="row">
							
							
							<div class="col-lg-12 col-md-8">
								<form class="form" method="post" action="<?php echo base_url().'tugas/update_dsn/'.$active.'/'.$kd;?>" enctype="multipart/form-data" > 
									<div class="card">
										<div class="card-head style-primary">
											<header>Edit Data Dosen</header>
										</div>
										<div class="card-body">
                                            <?php if($_SESSION['level'] == '4') { ?>
                                            
                                            <div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<input type="hidden" class="form-control" id="Firstname1" name="Kode_dosen" value="<?php
														echo $kd;?>" >
                                                        <input type="text" class="form-control" id="Firstname1" name="Kode_dosen" value="<?php
														echo $kd;?>" disabled>
														<label for="KodeDosen">Kode Dosen</label>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<input type="text" class="form-control" id="Lastname1" name="Nama_dosen" value="<?php
														echo $nama;?>">
														<label for="Lastname1">Nama Dosen</label>
													</div>
												</div>
											</div>

                                            <div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<select class="form-control" id="stambuk"
												name="stambuk" onchange="showUser(this.value)">
                                                            <option value="">Pilih Stambuk</option>
													<?php
														foreach($stambuk as $sta)
														{ if($sta->stambuk != '0') { ?>
															<option value='<?=$sta->stambuk ?>' ><?=$sta->stambuk?></option>";
														<?php } }
													?>

												</select>
												<label for="prodi">Kuota Bimbingan</label>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group" id="kuotas">
														<input type="number" class="form-control" id="kuota" name="kuota" placeholder="0" disabled>
														<label for="Lastname1">Kuota Bimbingan</label>
													</div>
												</div>
											</div>
                                            
                                            
                                            <?php } else { ?>
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<input type="text" class="form-control" id="Firstname1" name="Kode_dosen" value="<?php
														echo $kd;?>" >
														<label for="KodeDosen">Kode Dosen</label>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<input type="text" class="form-control" id="Lastname1" name="Nama_dosen" value="<?php
														echo $nama;?>">
														<label for="Lastname1">Nama Dosen</label>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<input type="text" class="form-control" id="Firstname1" name="username" value="<?php
														echo $username;?>" >
														<label for="username">Username</label>
													</div>
												</div>
												
														<input type="hidden" class="form-control" id="Firstname1" name="username_lama" value="<?php
														echo $username;?>">
												
												<div class="col-sm-6">
													<div class="form-group">
														<input type="text" class="form-control" id="Lastname1" name="password">
														<label for="Lastname1">Password</label>
													</div>
												</div>
											</div>
                                            
                                            <div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<select class="form-control" id="stambuk"
												name="stambuk" onchange="showUser(this.value)">
                                                            <option value="">Pilih Stambuk</option>
													<?php
														foreach($stambuk as $sta)
														{ if($sta->stambuk != '0') { ?>
															<option value='<?=$sta->stambuk ?>' ><?=$sta->stambuk?></option>";
														<?php } }
													?>

												</select>
												<label for="prodi">Kuota Bimbingan</label>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group" id="kuotas">
														<input type="number" class="form-control" id="kuota" name="kuota" placeholder="0" disabled>
														<label for="Lastname1">Kuota Bimbingan</label>
													</div>
												</div>
											</div>

											<div class="form-group">
												<input type="text" class="form-control" id="Username1" name="Pangkat" value="<?php
														echo $pangkat;?>">
												<label for="Username1">Pangkat</label>
											</div>
											<div class="form-group">
												<input type="text" class="form-control" id="Password1"
												name="Golongan" value="<?php
														echo $gol;?>">
												<label for="Golongan">Golongan</label>
											</div>
											<div class="form-group">
												<input type="text" class="form-control" id="Password1" name="NIP" value="<?php
														echo $nip;?>">
												<label for="NIP">NIP</label>
											</div>
											<div class="form-group">
												<input type="text" class="form-control" id="Password1"
												name="NIDN" value="<?php
														echo $nidn;?>">
												<label for="nidn">NIDN</label>
											</div>
											<div class="form-group">
												<select class="form-control" id="Password1"
												name="Kode_PS">
													<?php
														foreach($studi as $pro)
														{ ?>
															<option value='<?=$pro->id_PS ?>' <?php if($kd_ps==$pro->id_PS) echo "selected='selected'";?> ><?=$pro->nama_PS?></option>";
														<?php }
													?>

												</select>
												<label for="prodi">Prodi</label>
											</div>
                                            <div class="form-group">
													<label for="cover" class="col-sm-2 control-label">Tanda Tangan</label>
													<div class="col-sm-10">
													<img id="uploadPreview" src="<?php if($ttd != '' ) {echo base_url().'ttd_dosen/'. $ttd ;} else {echo base_url().'assets/img/avatar1.jpg';}  ?>" style="width: 150px; height: 150px;" /><br>
                                                        
													<input id="uploadImage" type="file" name="uploadImage" onchange="PreviewImage();">
													</div>
											</div>
                                            <?php } ?>
										</div><!--end .card-body -->
										<div class="card-actionbar">
											<div class="card-actionbar-row">
												<button type="submit" class="btn btn-flat btn-primary ink-reaction">Edit</button>
											</div>
										</div>
									</div><!--end .card -->
									<em class="text-caption">Vertical layout with static labels</em>
								</form>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END VERTICAL FORM -->

						

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
		<script src="<?php echo base_url('assets/js/core/source/AppOffcanvas.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppCard.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppForm.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppNavSearch.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppVendor.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/demo/Demo.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/demo/DemoFormLayouts.js');?>"></script>
        <script>
function showUser(str) {
    var kd = '<?php echo $kd ; ?>';
    if (str == "") {
        document.getElementById("kuotas").innerHTML = "<input type='number' class='form-control' id='kuota' name='kuota' placeholder='0' disabled><label for='Lastname1'>Kuota Bimbingan</label>";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("kuotas").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../../../getkuota.php?q="+str+"&&s="+ kd,true);
        xmlhttp.send();
    }
}
</script>
    <script>
    
    function PreviewImage() {
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
oFReader.onload = function (oFREvent)
 {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
};
};
</script>
    
		<!-- END JAVASCRIPT -->

	</body>
</html>
