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
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/materialadmin_print.css?1419847669');?>"  media="print"/>
		<style>
		.box {
			border: 3px solid black;
			width: 200px;
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
					<div class="section-header">
						<ol class="breadcrumb">
							<li class="active">Rekapitulasi Nilai</li>
						</ol>
					</div>
                    
                    <?php 
        
            foreach($penguji as $pj)
            {
                $pembimbing1 = $pj->dosen1;
                $pembimbing2 = $pj->dosen2;
                $pembanding1 = $pj->dosen3;
                $pembanding2 = $pj->dosen4;
                $ttd = $pj->ttd;
                $nip = $pj->nip;
            }
        
            foreach($nilai_uji_program as $program)
            {
                $total_uji_program = $program->total;
            }
            echo $total_uji_program;
            $total_semhas = 0;
                   
            foreach($nilai_semhas as $semhas)
            {
                echo $semhas->status_dosen;
                if($semhas->status_dosen == 'pembimbing1')
                {
                    $nilai_semhas_pembimbing1 = $semhas->total;
                    echo $nilai_semhas_pembimbing1;
                    $total_semhas += $nilai_semhas_pembimbing1;
                    echo $total_semhas;
                }
                else if($semhas->status_dosen == 'pembimbing2')
                {
                    $nilai_semhas_pembimbing2 = $semhas->total;
                    echo $nilai_semhas_pembimbing2;
                    $total_semhas += $nilai_semhas_pembimbing2;
                    echo $total_semhas;
                }
                else if($semhas->status_dosen == 'pembanding1')
                {
                    $nilai_semhas_pembanding1 = $semhas->total;
                    echo $nilai_semhas_pembanding1;
                    $total_semhas += $nilai_semhas_pembanding1;
                    echo $nilai_semhas_pembanding1;
                }
                else if($semhas->status_dosen == 'pembanding2')
                {
                    $nilai_semhas_pembanding2 = $semhas->total;
                    $total_semhas += $nilai_semhas_pembanding2;
                }
            }
        
        
        $total_sidang = 0;
            foreach($nilai_sidang as $sidang)
            {
                if($sidang->status_dosen == 'pembimbing1')
                {
                    $nilai_sidang_pembimbing1 = $sidang->total;
                    $total_sidang += $nilai_sidang_pembimbing1;
                }
                else if($sidang->status_dosen == 'pembimbing2')
                {
                    $nilai_sidang_pembimbing2 = $sidang->total;
                    $total_sidang += $nilai_sidang_pembimbing2;
                }
                else if($sidang->status_dosen == 'pembanding1')
                {
                    $nilai_sidang_pembanding1 = $sidang->total;
                    $total_sidang += $nilai_sidang_pembanding1;
                }
                else if($sidang->status_dosen == 'pembanding2')
                {
                    $nilai_sidang_pembanding2 = $sidang->total;
                    $total_sidang += $nilai_sidang_pembanding2;
                }
            }
                    //RUMUS TOTAL NILAI SKRIPSI
                    $total_semhas_dibagi = $total_semhas / 4;
                    $total_sidang_dibagi = $total_sidang / 4;
                    
                    $nilai_skripsi = (($total_semhas_dibagi * 4) + ($total_sidang_dibagi * 4) + ($total_uji_program * 2)) / 10;
                    $sum = $nilai_skripsi;
                    if($sum >= 81)
                    {
                        $grade = 'A';
                    }
                    else if ($sum >= 74 && $sum <= 80)
                    {
                        $grade = 'B+';
                    }
                    else if ($sum >= 66 && $sum <= 73)
                    {
                        $grade = 'B';
                    }
                    else if ($sum >= 59 && $sum <= 65)
                    {
                        $grade = 'C+';
                    }
                    else if ($sum >= 51 && $sum <= 58)
                    {
                        $grade = 'C';
                    }
                    else if ($sum >= 41 && $sum <= 50)
                    {
                        $grade = 'D';
                    }
                    else{
                        $grade = 'E';
                    }
        
        ?>
                    
					<div class="section-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="card card-printable style-default-light">
									<div class="card-head">
										<div class="tools">
											<div class="btn-group">
												<a class="btn btn-floating-action btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="md md-print"></i></a>
											</div>
										</div>
									</div><!--end .card-head -->
									<div class="card-body style-default-bright">

										<!-- BEGIN INVOICE HEADER -->
										<div class="row">
											<div class="col-xs-2">
												<h1 class="text-light"><img src="<?php echo base_url('assets/img/usu.png');?>" width = '100%' height='100%'/></h1>
											</div>
											<div class="col-xs-10 text-center">
												<h3 class="text-light text-default-light">KEMENTERIAN RISET,TEKNOLOGI DAN PENDIDIKAN TINGGI <br>
												<b>UNIVERSITAS SUMATERA UTARA </b><br>
												FAKULTAS ILMU KOMPUTER DAN TEKNOLOGI INFORMASI<br>
												PROGRAM STUDI S-1 TEKNOLOGI INFORMASI<br>
												<h5>Jalan Universitas No.9A Kampus USU, Medan 20155 <br>
												Tel/Fax.:061 8228048, e-mail: fasilkomti@usu.ac.id, laman : http://fasilkom-ti.usu.ac.id</h5></h3>
											</div>
								
										<hr id='line' width="100%">
										</div><!--end .row -->
										<!-- END INVOICE HEADER -->

											<div class="row">
											<div class="col-xs-12 text-center">
												<h4>REKAPITULASI NILAI UJI PROGRAM, SEMINAR HASIL<br> DAN SIDANG MEJA HIJAU</h4>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-12">
												<table border='1' width="100%">
													<thead>
														<tr>
															<td><center><b>No</b></center></td>
															<td><center><b>Nama Dosen</b></center></td>
															<td><center><b>Nilai Seminar Hasil</b></center></td>
															<td><center><b>Nilai Sidang</b></center></td>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><center>1</center></td>
															<td style="padding-left: 5px"><?= $pembimbing1 ?></td>
                                                            <td><center><?= $nilai_semhas_pembimbing1 ?></center></td>
                                                            <td><center><?= $nilai_sidang_pembimbing1 ?></center></td>
														</tr>

														<tr>
															<td><center>2</center></td>
															<td style="padding-left: 5px"><?= $pembimbing2 ?></td>
                                                            <td><center><?= $nilai_semhas_pembimbing2 ?></center></td>
                                                            <td><center><?= $nilai_sidang_pembimbing2 ?></center></td>
														</tr>

														<tr>
															<td><center>3</center></td>
															<td style="padding-left: 5px"><?= $pembanding1 ?></td>
                                                            <td><center><?= $nilai_semhas_pembanding1 ?></center></td>
                                                            <td><center><?= $nilai_sidang_pembanding1 ?></center></td>
														</tr>

														<tr>
															<td><center>4</center></td>
															<td style="padding-left: 5px"><?= $pembanding2 ?></td>
                                                            <td><center><?= $nilai_semhas_pembanding2 ?></center></td>
                                                            <td><center><?= $nilai_sidang_pembanding2 ?></center></td>
														</tr>

														<tr>
															<td></td>
															<td>&nbsp TOTAL</td>
                                                            <td>&nbsp (a)<center><?= $total_semhas ?></center></td>
                                                            <td>&nbsp (b)<center><?= $total_sidang ?></center></td>
														</tr>


														<tr>
															<td></td>
															<td colspan='2'>&nbsp NILAI UJI PROGRAM : </td>
															<td>&nbsp (c)<center><?= $total_uji_program ?></center></td>
														</tr>

														<tr>
															<td></td>
															<td colspan='2'>&nbsp NILAI KESELURUHAN ((a x 4) + (b x 4) + (c x 2))/10 </td>
                                                            <td>&nbsp <center><?= $nilai_skripsi ?></center></td>
														</tr>

														<tr>
															<td></td>
															<td colspan='2'>&nbsp NILAI HURUF </td>
															<td>&nbsp <center><?= $grade ?></center></td>
														</tr>

													</tbody>

												</table>
											</div>
										</div>

									

										

										<br>
										<div class="row">
											<div class="col-xs-8">
												<b><p>Kategori Nilai</p>
												<h6 class="text-light">81 - 100 = A </h6>
												<h6 class="text-light">74 - 80   = B+</h6>
												<h6 class="text-light">66 – 73   = B</h6>
												<h6 class="text-light">59 - 65   = C+</h6>
												<h6 class="text-light">51 - 58   = C</h6>
												<h6 class="text-light">41 - 50   = D</h6>
												<h6 class="text-light">  0 - 40   = E</h6>
											</div>
											<div class="col-xs-4">
												<center>
												Medan,.....................................<br>
												Ketua Penguji<br><?php if($ttd != '') { ?>
                                    
                                                    <img src="<?php echo base_url('ttd_dosen/'. $ttd); ?>" height="50px" width="50px">
                                                    
                                                <?php } else {echo "<br>"; } ?>
                                                    
                                                    <br>
												
												(<?= $pembimbing1 ?>)<br>
                                                    NIP. <?php if($nip == '') {echo ".............................................";} else { echo $nip; } ?></center>
												
											</div>
										</div>

										
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
						</div><!--end .row -->
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
		<!-- END JAVASCRIPT -->
	</body>
</html>


