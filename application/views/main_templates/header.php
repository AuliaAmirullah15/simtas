<!-- BEGIN HEADER-->
<style>
.padder {
	margin-left : 6px;
}

<?php error_reporting(0); ?>
</style>
		<header id="header" >
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
									<h4>(SISFO TA) Fasilkom-TI USU</h4></span>
								</div>
						</li>
						<?php if(isset($_SESSION['username']) AND !isset($bar)) { ?>
						<li>
							<a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
								<i class="fa fa-bars"></i>
							</a>
						</li>
						<?php } ?>
					</ul>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="headerbar-right">
                    
                    <?php if($_SESSION['level'] == '2') { ?>
                    <ul class="header-nav header-nav-options">
                        <li class="dropdown hidden-xs">
							<a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
								<i class="fa fa-bell"></i><?php if($notifikasi_dsn != '') { ?><sup class="badge style-danger"><?= $notifikasi_dsn ?></sup><?php } ?>
							</a>
							<ul class="dropdown-menu animation-expand">
								<li class="dropdown-header">Notifikasi</li>
                                <?php foreach($notifikasi_dsn_detail as $n) { ?>
								<li>
									<a class="alert alert-callout alert-warning" href="<?php echo base_url('Tugas/notifikasi_dosen'); ?>">
										<img class="pull-right img-circle dropdown-avatar" src="<?php echo base_url('assets/img/avatar2.jpg?1404026449');?>" alt="" />
										<strong><?= $n->seminar ?></strong><br/>
										<small><?= $n->jadwal ?></small>
									</a>
                                </li>
                                <?php } ?>
								
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
                        
                    </ul>
                    <?php } ?>
				
					<ul class="header-nav header-nav-profile">
						<li class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
								<img src="<?php echo base_url('assets/img/avatar1.jpg?1403934956');?>" alt="" />
								<span class="profile-info">
									<?php
										if(isset($_SESSION['username']))
										{
											if($_SESSION['level'] == '1') {
											echo $_SESSION['username']. "<small>Administrator</small>";
											}
                                            
                                            else if($_SESSION['level'] == '2') {
											echo $_SESSION['username']. "<small>Dosen</small>";
											}
                                            
                                            else if($_SESSION['level'] == '4') {
											echo $_SESSION['username']. "<small>Ketua Program Studi</small>";
											}
                                            
                                            else if($_SESSION['level'] == '5') {
											echo $_SESSION['username']. "<small>Sekretaris Program Studi</small>";
											}
                                            
                                            else if($_SESSION['level'] == '6') {
											echo $_SESSION['username']. "<small>Kepala Lab TA</small>";
											}

											else {
											echo $_SESSION['username']. "<small>Dosen</small>";
											}
										}
										else
										{
											echo "Login Here";
										}
									?>
									
								
								</span>
							</a>
							<ul class="dropdown-menu animation-dock">
								<li><?php if(isset($_SESSION['username'])) { echo anchor('Tugas/profil/','Profil',array('class'=>'profil')); } ?></li>
								<li><?php if(isset($_SESSION['username'])) { echo anchor('tugas/logout/','Log out',array('class'=>'logout')); } else { echo anchor('tugas/index/', 'Login');}?></li>
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
					</ul><!--end .header-nav-profile -->
					
				</div><!--end #header-navbar-collapse -->
			</div>
		</header>
		<!-- END HEADER-->