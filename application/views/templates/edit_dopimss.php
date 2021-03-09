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
            #display {
                color: indianred;
                font-weight: 200;
                font-style: oblique;
                font: bold;
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
<?php
							foreach($data as $d)
							{
								$id_pengajuan = $d->id_pengajuan;
								$nim = $d->nim;
								$judul = $d->judul;
                                $pemb1 = $d->pembimbing1;
                                $pembimbing2 = $d->pembimbing2;
                            }
                
						?>
                
				<section>
				<div class="section-body">

				
					<div class="section-body contain-lg">
						<?php if($message != '' OR $message != NULL) { 
    echo 

					"<div class=\"alert alert-warning\" role=\"alert\">
							<strong>".$message."</strong></div>";}?>
						<!-- BEGIN HORIZONTAL FORM -->
						<div class="row">
							<ol class="breadcrumb">
											<li><a href="<?php echo base_url('tugas/pengajuan_judul');?>">Pengajuan Judul</a></li>
											<li class="active">Detail Pengajuan Judul</li>
										</ol>

							<div class="col-lg-12">
								
									<div class="card">
										<div class="card-head style-primary">
											<header>Pengajuan Judul</header>
										</div>

									<form class="form-horizontal form-validate floating-label" method="post" action="<?php echo base_url().'tugas/update_dopim/'.$nim.'/'.$id_pengajuan;?>" novalidate="novalidate">
										<div class="card-body">
											<h4>Dosen Pembimbing</h4>
											<hr>
											<div class="form-group">
												<label for="SK Pembimbing" class="col-sm-2 control-label">Pembimbing 1</label>
												<div class="col-sm-10">
													<select id="pembimbing1" name="pembimbing1" class="form-control" onchange="myFunction()">
						                              <option value=""></option>
                                                         <?php foreach($dopim as $dopim)
														{ if($dopim->sisa < 1) {?>

                                                            
															<option value="<?php echo $dopim->sisa; ?>" <?php if($dopim->pembimbing1 == $pemb1) { echo "selected"; }?>><?php echo $dopim->Nama_dosen ; ?>(<?php echo $dopim->sisa; ?>)</option>

														<?php } else {?>
                                                        
                                                        <option value="<?php echo $dopim->pembimbing1; ?>" <?php if($dopim->pembimbing1 == $pemb1) { echo "selected"; }?>><?php echo $dopim->Nama_dosen ; ?>(<?php echo $dopim->sisa; ?>) </option>
                                                        
                                                        <?php }}?>
                                                        
														<?php foreach($dosen as $dosen)
														{ if($dosen->kuota < 1) { ?>

                                                            
															<option value="<?php echo $dosen->kuota; ?>" <?php if($dosen->Kode_dosen == $pemb1) { echo "selected"; }?>><?php echo $dosen->Nama_dosen ; ?>(<?php echo $dosen->kuota; ?>)</option>

														<?php } else {?>
                                                        
                                                        <option value="<?php echo $dosen->Kode_dosen; ?>" <?php if($dosen->Kode_dosen == $pemb1) { echo "selected"; }?>><?php echo $dosen->Nama_dosen ; ?>(<?php echo $dosen->kuota; ?>)</option>
                                                        
                                                        
                                                        
                                                        <?php }} ?>
                                                        

											
													</select>
													
												</div>
											</div>
											<div class="form-group">
												<label for="SK Pembimbing" class="col-sm-2 control-label">Pembimbing 2</label>
												<div class="col-sm-10">
														<select id="pembimbing2" name="pembimbing2" class="form-control">
						                                  
                                                             <option value=""></option>
														<?php foreach($dosen2 as $dosen2)
														{ ?>
                                                            <?php if($dosen2->Kode_dosen == 'NO') {?>
                                                                <option value="<?php echo $dosen2->Kode_dosen; ?>" <?php if($dosen2->Kode_dosen == $pembimbing2) {echo "selected='selected'";}?>>Tidak Ada Pembimbing 2</option>
                                                            
                                                            <?php } else { ?>

															<option value="<?php echo $dosen2->Kode_dosen; ?>" <?php if($dosen2->Kode_dosen == $pembimbing2) {echo "selected='selected'";}?>><?php echo $dosen2->Nama_dosen ; ?></option>

														<?php }}?>

											
													</select>
												</div>
											</div>
                                            <div class="form-group">
												<label for="SK Pembimbing" class="col-sm-2 control-label">Pembimbing 3</label>
												<div class="col-sm-10">
														<select id="pembimbing3" name="pembimbing3" class="form-control">
						                                  
                                                             <option value=""></option>
														<?php foreach($dosen3 as $dosen3)
														{ ?>
                                                            <?php if($dosen3->Kode_dosen == 'NO') {?>
                                                                <option value="<?php echo $dosen3->Kode_dosen; ?>" <?php if($dosen3->Kode_dosen == $pemb1) {echo "selected='selected'";}?>>Tidak Ada Pembimbing 1</option>
                                                            
                                                            <?php } else { ?>

															<option value="<?php echo $dosen3->Kode_dosen; ?>" <?php if($dosen3->Kode_dosen == $pemb1) {echo "selected='selected'";}?>><?php echo $dosen3->Nama_dosen ; ?></option>

														<?php }}?>

											
													</select>
												</div>
											</div>
											
                                            <div id="display">
                                            </div>
										<div class="card-actionbar">
											<div class="card-actionbar-row">
                                                <a href="<?php echo base_url('Tugas/penentuan_pembimbing');?>" class="btn btn-flat btn-primary ink-reaction update">Kembali</a>
												<button type="submit" class="btn btn-flat btn-primary ink-reaction update" value="update">Update</button>
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
		<script src="<?php echo base_url('assets/js/core/source/AppOffcanvas.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppCard.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppForm.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppNavSearch.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/source/AppVendor.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/demo/Demo.js');?>"></script>
		<script src="<?php echo base_url('assets/js/core/demo/DemoFormLayouts.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/jquery-validation/dist/jquery.validate.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/libs/jquery-validation/dist/additional-methods.min.js');?>"></script>
        <script>
            //, attr, order

var sortSelect = function (select, attr, order) {
    if(attr === 'text'){
        if(order === 'asc'){
            $(select).html($(select).children('option').sort(function (x, y) {
                return $(x).text().toUpperCase() < $(y).text().toUpperCase() ? -1 : 1;
            }));
            $(select).get(0).selectedIndex = 0;
            e.preventDefault();
        }// end asc
        if(order === 'desc'){
            $(select).html($(select).children('option').sort(function (y, x) {
                return $(x).text().toUpperCase() < $(y).text().toUpperCase() ? -1 : 1;
            }));
            $(select).get(0).selectedIndex = 0;
            e.preventDefault();
        }// end desc
    }
};

//, attr, order
$(document).ready(function () {

        sortSelect('#pembimbing1', 'text', 'asc');

    ; // event listener click

});        
        </script>
                
                <script>
              function myFunction() {
    var x = document.getElementById("pembimbing1").value;

    if(x != '' && x < 1)
        {
            var x = document.getElementById("pembimbing1").selectedIndex;
            var y = document.getElementById("pembimbing1").options;
            
            document.getElementById("display").innerHTML = "<div class='form-group'><div class='col-sm-12'><p>Maaf! Kuota Bimbingan "+ y[x].text.slice("", -3) +" Tidak Mencukupi! </p></div></div>";
  
        var button = document.getElementsByTagName("button")[0];
    var att = document.createAttribute("disabled");
    button.setAttributeNode(att);
        }
    else {
        document.getElementById("display").innerHTML = "";
       document.getElementsByTagName("button")[0].removeAttribute("disabled");
    }
}
                </script>
		<!-- END JAVASCRIPT -->
                

	</body>
</html>
