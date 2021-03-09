<?php 
		if(!isset($_SESSION['username']))
		{
			redirect('tugas/login');
		}

		error_reporting(0);
?>
<style>
.padder {
	margin-left : 6px;
}

</style>

<header id="header" class="header-inverse ">
			<div class="headerbar">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="headerbar-left">
					<ul class="header-nav header-nav-options">
						<li class="header-nav-brand" >
							<div class="brand-holder">
								<a href="../../html/dashboards/dashboard.html">
									<img src="<?php echo base_url('assets/img/usu.png'); ?>" width="50" height="50">

								</a>
							</div>
						</li>
						<li class="header-nav-brand padder">
							<div class="brand-holder">
						<span class="text-lg text-bold text-primary"><h4>Sistem Informasi Tugas Akhir</h4>
									<h4><strong>(SISFO TA) Fasilkom-TI USU</h4></span>
								</div>
						</li>
					</ul>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				
				<div class="headerbar-right">
					<?php if($form == 1) { ?>

						<ul class="header-nav header-nav-options">
						<li>
							 <a href="<?php echo base_url().'mahasiswa/pengajuan_judul';?>">Kembali</a>
						</li>
						</ul>
				

					<?php } else if($form == 2) { ?>

						<ul class="header-nav header-nav-options">
						<li>
							 <a href="<?php echo base_url().'mahasiswa/uji_program';?>">Kembali</a>
						</li>
						</ul>
					<?php } else if ($form == 3) { ?>
						<ul class="header-nav header-nav-options">
						<li>
							 <a href="<?php echo base_url().'mahasiswa/sempro';?>">Kembali</a>
						</li>
						</ul>
					
					<?php } else if($form == 4) { ?>
						<ul class="header-nav header-nav-options">
						<li>
							 <a href="<?php echo base_url().'mahasiswa/semhas';?>">Kembali</a>
						</li>
						</ul>
					<?php } else if($form == 5) { ?>
						<ul class="header-nav header-nav-options">
						<li>
							 <a href="<?php echo base_url().'mahasiswa/sidang';?>">Kembali</a>
						</li>
						</ul>
					<?php } else if($form == 6) { ?>
						<ul class="header-nav header-nav-options">
						<li>
							 <a href="<?php echo base_url().'mahasiswa/validasi';?>">Kembali</a>
						</li>
						</ul>
					<?php } else if($form == 9) { ?>
					<ul class="header-nav header-nav-options">
						<li>
							 <a href="<?php echo base_url().'mahasiswa/status_validasi_berkas_sempro';?>">Kembali</a>
						</li>
						</ul>
					<?php } else if($form == 10) { ?>
						<ul class="header-nav header-nav-options">
						<li>
							 <a href="<?php echo base_url().'mahasiswa/status_validasi_berkas_semhas';?>">Kembali</a>
						</li>
						</ul>
					<?php }else if($form == 11) { ?>
						<ul class="header-nav header-nav-options">
						<li>
							 <a href="<?php echo base_url().'mahasiswa/status_validasi_berkas_sidang';?>">Kembali</a>
						</li>
						</ul>
					<?php } else if($form == 12) { ?>
						<ul class="header-nav header-nav-options">
						<li>
							 <a href="<?php echo base_url().'mahasiswa/status_validasi_berkas_penggandaan';?>">Kembali</a>
						</li>
						</ul>
					<?php } else if($form == 13) { ?>
						<ul class="header-nav header-nav-options">
						<li>
							 <a href="<?php echo base_url().'mahasiswa/catatan_perbaikan';?>">Kembali</a>
						</li>
						</ul>
					<?php } ?>
				
					<ul class="header-nav header-nav-profile">
						<li class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
								<img src="<?php echo base_url().'assets/img/avatar1.jpg?1403934956';?>" alt="" />
								<span class="profile-info">
									<?php echo $_SESSION['username']; ?>
									<small>Mahasiswa</small>
								</span>
							</a>
							<ul class="dropdown-menu animation-dock">
								<li class="dropdown-header">Config</li>
                                <li><a href="<?php echo base_url().'mahasiswa/profil'; ?>">Profil</a></li>
								<li><a href="<?php echo base_url().'mahasiswa/list_judul'; ?>">List Judul</a></li>
								<li class="divider"></li>
								
								<li><a href="<?php echo base_url().'tugas/logout'; ?>"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
					</ul><!--end .header-nav-profile -->
					
				</div><!--end #header-navbar-collapse -->
			</div>
		</header>