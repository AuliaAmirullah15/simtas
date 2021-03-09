<!-- BEGIN HEADER-->
		<header id="header" >
			<div class="headerbar">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="headerbar-left">
					<ul class="header-nav header-nav-options">
						<li class="header-nav-brand" >
							<div class="brand-holder">
								<a href="#">
									<img src="<?php echo base_url('assets/img/usu.png'); ?>" width="50" height="50">
								</a>
							</div>
						</li>
						<li class="header-nav-brand padder">
							<div class="brand-holder">
                                <span class="text-lg text-bold text-primary"><center><h4>R E P O S I T O R I</h4></center></span>
                                <span class="text-secondary"><center><h6>U N I V E R S I T A S &nbsp S U M A T E R A &nbsp U T A R A</h6></center></span>
								</div>
						</li>
					</ul>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="headerbar-right">
					<ul class="header-nav header-nav-profile">
						<li class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                                 <?php if(isset($_SESSION['username'])) { ?>
								<img src="<?php echo base_url().'assets/img/avatar1.jpg?1403934956';?>" alt="" />
                               
								<span class="profile-info">
									<?= $_SESSION['username'] ?><small>User</small>
								</span>
                                <?php } else { ?>
                                <span class="profile-info">
                                    <br><small>L O G I N &nbsp H E R E</small>
                                </span>
                                <?php } ?>
							</a>
                            <?php if(isset($_SESSION['username'])) { ?>
							<ul class="dropdown-menu animation-dock">
								<li><a href="#">Akun</a></li>
								<li><a href="<?php echo base_url().'/Admin/logout';?>"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
							</ul><!--end .dropdown-menu -->
                            <?php } else { ?>
                            <ul class="dropdown-menu animation-dock">
                                <li><a href="<?php echo base_url().'Admin/login';?>"><i class="fa fa-fw fa-power-off text-danger"></i> Login</a></li></ul>
                            <?php } ?>
						</li><!--end .dropdown -->
					</ul><!--end .header-nav-profile -->
				</div><!--end #header-navbar-collapse -->
			</div>
		</header>
		<!-- END HEADER-->