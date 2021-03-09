<!DOCTYPE html>
<html lang="en">
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
		<style>
		.wrapper {
			width: 100%;
			padding : 20px;
			padding-top: 60px;
			padding-bottom: 50px;
			background:white;
			border-radius: 10px;
			box-shadow: 3px 3px 20px 1px #888888;  
		}
        
            .contain-sm {
                max-width: 500px;
            }
		label {
			text-align: left;
		}

section.section-account .img-backdrop, section.section-account .spacer {
    height: 70px;
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

		<!-- BEGIN LOGIN SECTION -->
		<section class="section-account">
			<div class="spacer"></div>
             <?php if($message != '' AND $message != null) {

							echo "

					<div class=\"section-body\">
						<div class=\"alert alert-danger\" role=\"alert\">
							<strong>Maaf!</strong> ". $message."</div></div>"; } ?>
			<div class="card contain-sm style-transparent">
                
               
                
				<div class="card-body">
				<center><strong><h2 class="text-bold text-primary">Sistem Informasi Tugas Akhir</h2></strong></center>
					<div class="row">
						<center><div class="col-sm-12">
                            <div class="wrapper_out">
							<div class ="wrapper">
							<span class="text-lg text-bold text-primary">Log In</span>
								<div class="row"><img src="<?php echo base_url('assets/img/usu.png'); ?>" width="100px" height="100px"></div>
							<form class="form floating-label" action="<?php base_url().'tugas/login' ?>" accept-charset="utf-8" method="post" URL:"https://www.google.com/recaptcha/api/siteverify">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-content">
									
									<?= form_input('username', $input->username,['class'=> 'form-control','id' => 'username', 'name' => 'username']) ?><?= form_label('Username ', 'username') ?></div><span class="input-group-addon"></span></div>
									<?= form_error('username') ?>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-content">
									<?= form_password('password', $input->password, ['class' => 'form-control', 'id' => 'password', 'name' => 'password']) ?><?= form_label('Password ', 'password') ?></div> <span class="input-group-addon"><img id="eye" src="https://cdn0.iconfinder.com/data/icons/feather/96/eye-16.png" alt="eye" /></span></div>
									<?= form_error('password') ?>
									
									
								</div>
								
								<br/>
								<div class="row">
									<div class="col-xs-6 text-left">
<!--
										<div class="checkbox checkbox-inline checkbox-styled">
											<label>
												Kembali Ke <?php echo anchor('tugas/index','<strong>Halaman Utama</strong>') ; ?>
											</label>
										</div>
-->
									</div>
									<div class="col-xs-6 text-right">
										<button class="btn btn-primary btn-raised" type="submit">Login</button>
									</div><!--end .col -->
								</div><!--end .row -->
							</form>
                                </div></div></div></center><!--end .col -->
						
					</div><!--end .card -->
				</section>
				<!-- END LOGIN SECTION -->

				<!-- BEGIN JAVASCRIPT -->
				<script src="<?php echo base_url('assets/js/libs/jquery/jquery-1.11.2.min.js');?>"></script>
				<script src="<?php echo base_url('assets/js/libs/jquery/jquery-migrate-1.2.1.min.js');?>"></script>
				<script src="<?php echo base_url('assets/js/libs/bootstrap/bootstrap.min.js');?>"></script>
				<script src="<?php echo base_url('assets/js/libs/spin.js/spin.min.js');?>"></script>
				<script src="<?php echo base_url('assets/js/libs/autosize/jquery.autosize.min.js');?>"></script>
				<script src="<?php echo base_url('ssets/js/libs/nanoscroller/jquery.nanoscroller.min.js');?>"></script>
				<script src="<?php echo base_url('assets/js/core/source/App.js');?>"></script>
				<script src="<?php echo base_url('assets/js/core/source/AppNavigation.js');?>"></script>
				<script src="<?php echo base_url('assets/js/core/source/AppOffcanvas.js');?>"></script>
				<script src="<?php echo base_url('assets/js/core/source/AppCard.js');?>"></script>
				<script src="<?php echo base_url('assets/js/core/source/AppForm.js');?>"></script>
				<script src="<?php echo base_url('assets/js/core/source/AppNavSearch.js');?>"></script>
				<script src="<?php echo base_url('assets/js/core/source/AppVendor.js');?>"></script>
				<script src="<?php echo base_url('assets/js/core/demo/Demo.js');?>"></script>
				<!-- END JAVASCRIPT -->
				<script type="text/javascript">
					function show() {
    var p = document.getElementById('password');
    p.setAttribute('type', 'text');
}

function hide() {
    var p = document.getElementById('password');
    p.setAttribute('type', 'password');
}

var pwShown = 0;

document.getElementById("eye").addEventListener("click", function () {
    if (pwShown == 0) {
        pwShown = 1;
        show();
    } else {
        pwShown = 0;
        hide();
    }
}, false);


				</script>
			</body>
		</html>
