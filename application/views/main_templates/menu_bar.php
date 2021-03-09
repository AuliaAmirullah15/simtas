<div id="menubar" class="menubar-inverse ">
				<div class="menubar-fixed-panel">
					<div>
						<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
							<i class="fa fa-bars"></i>
						</a>
					</div>
					<div class="expanded">
						<a href="../../html/dashboards/dashboard.html">
							<span class="text-lg text-bold text-primary ">SISFO-TA</span>
						</a>
					</div>
				</div>
				<div class="menubar-scroll-panel">

					<!-- BEGIN MAIN MENU -->
					<ul id="main-menu" class="gui-controls">
					
						<!-- BEGIN TABLES -->

						<!--AKUN MENU-->
                        <?php if($_SESSION['level'] == '1') {?>
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-assignment-ind"></i></div>
								<span class="title">Manage Akun</span>
							</a>
							<!--start submenu -->

							<ul>
								<li><a href="<?php echo base_url().'tugas/akun';?>" <?php if($active == 'akun') { echo "class='active'"; }?>><span class="title">Akun Mahasiswa</span></a></li>
                                
                                <li><a href="<?php echo base_url().'tugas/akun_user';?>" <?php if($active == 'akun_user') { echo "class='active'"; }?>><span class="title">Akun Pengguna</span></a></li>
                                
<!--								<li><a href="<?php echo base_url().'tugas/akun_dosen';?>" <?php if($active == 'akun dosen') { echo "class='active'"; }?> ><span class="title">Akun Dosen</span></a></li>-->
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
                        
                        
                        <li>
							<a href="<?php echo base_url().'tugas/pengambilan_ijazah';?>" <?php if($active == 'ijazah') {
								echo "class='active'";} ?> >
								<div class="gui-icon"><i class="fa fa-graduation-cap"></i></div>
								<span class="title">Pengambilan Ijazah</span>
							</a>
						</li>
                        
                        <?php } ?>
						<!-- END MANAGE TA MENU -->

						<!-- LIST TA MENU-->
                        <?php if($_SESSION['level'] == '1' OR $_SESSION['level'] == '4' OR $_SESSION['level'] == '5' OR $_SESSION['level'] == '6' OR $_SESSION['level'] == '7') {?>
						<li>
							<a href="<?php echo base_url().'tugas/skripsi';?>" <?php if($active == 'skripsi') {
								echo "class='active'";} ?> >
								<div class="gui-icon"><i class="fa fa-table"></i></div>
								<span class="title">Repositori Tugas Akhir</span>
							</a>
						</li>
                        <?php } ?>
						<!-- END LIST TA MENU -->
                        
                         <!-- BERKAS MAHASISWA -->
                        <?php if($_SESSION['level'] == '1') {?>
                        <li>
                            <li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-description"></i></div>
								<span class="title">Berkas Mahasiswa</span>
							</a>
							<!--start submenu -->
							<ul>
                                	<li>
							<a href="<?php echo base_url().'tugas/pengajuan_judul';?>" <?php if($active == 'pengajuan judul') {
								echo "class='active'";} ?> >
								<span class="title">Berkas Pengajuan Judul</span>
							</a>
						</li>
                                
								<li><a href="<?php echo base_url().'tugas/berkas_mahasiswa/sempro';?>" <?php if($active == 'sempro') { echo "class='active'"; }?>><span class="title">Berkas Seminar Proposal</span></a></li>
                                
                                <li><a href="<?php echo base_url().'tugas/berkas_mahasiswa/uji_program';?>" <?php if($active == 'uji_program') { echo "class='active'"; }?>><span class="title">Berkas Uji Program</span></a></li>
                                
                                <li><a href="<?php echo base_url().'tugas/berkas_mahasiswa/semhas';?>" <?php if($active == 'semhas') { echo "class='active'"; }?>><span class="title">Berkas Seminar Hasil</span></a></li>
                                
                                <li><a href="<?php echo base_url().'tugas/berkas_mahasiswa/sidang';?>" <?php if($active == 'sidang') { echo "class='active'"; }?>><span class="title">Berkas Sidang</span></a></li>
                                
                                <li><a href="<?php echo base_url().'tugas/berkas_mahasiswa/validasi_aplikasi';?>" <?php if($active == 'validasi_aplikasi') { echo "class='active'"; }?>><span class="title">Berkas Validasi Aplikasi</span></a></li>
                                
                                

							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
                            
                        </li>
                    <?php } ?>
                        <!-- END BERKAS MAHASISWA -->

						<!-- VALIDASI BERKAS MAHASISWA -->
<!--
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-dns"></i></div>
								<span class="title">Validasi Berkas Mahasiswa</span>
							</a>
-->
							<!--start submenu -->

<!--
							<ul>
								<li>
							<a href="<?php echo base_url().'tugas/validasi_berkas_sempro';?>" <?php if($active == 'validasi berkas sempro') {
								echo "class='active'";} ?> >
								<span class="title">Pra Seminar Proposal</span>
							</a>
						</li>

						<li>
							<a href="<?php echo base_url().'tugas/validasi_berkas_semhas';?>" <?php if($active == 'validasi berkas semhas') {
								echo "class='active'";} ?> >
								<span class="title">Pra Seminar Hasil</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url().'tugas/validasi_berkas_sidang';?>" <?php if($active == 'validasi berkas sidang') {
								echo "class='active'";} ?> >
								<span class="title">Pra Sidang</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url().'tugas/validasi_penggandaan_skripsi';?>" <?php if($active == 'validasi penggandaan skripsi') {
								echo "class='active'";} ?> >
								<span class="title">Penggandaan Skripsi</span>
							</a>
						</li>
-->
							
<!--
							</ul>
						</li>
-->
						<!-- END VALIDASI BERKAS MENU -->

						<!--MANAGE Sistem TA-->
<!--
                    <?php if($_SESSION['level'] == '1') {?>
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-group-work"></i></div>
								<span class="title">Sistem TA</span>
							</a>
							

							<ul>
								<li>
							<a href="<?php echo base_url().'tugas/pengajuan_judul';?>" <?php if($active == 'pengajuan judul') {
								echo "class='active'";} ?> >
								<span class="title">Pengajuan Judul</span>
							</a>
						</li>
                      
-->
                                
<!--
						<li>
							<a href="<?php echo base_url().'tugas/sempro';?>" <?php if($active == 'semproposal') {
								echo "class='active'";} ?> >
								<span class="title">Seminar Proposal</span>
							</a>
						</li>
-->

<!--
						<li>
							<a href="<?php echo base_url().'tugas/semhas';?>" <?php if($active == 'semhasil') {
								echo "class='active'";} ?> >
								<span class="title">Seminar Hasil</span>
							</a>
						</li>
-->
<!--
							
							</ul>
-->
<!--						</li> -->
<!--                        <?php } ?>-->
						<!-- END SISTEM TA MENU -->

						<!-- JADWAL SEMINAR MENU-->
                        <?php if($_SESSION['level'] == '1') {?>
						<li>
							<a href="<?php echo base_url().'tugas/jadwal_seminar';?>" <?php if($active == 'jadwal seminar') {
								echo "class='active'";} ?> >
								<div class="gui-icon"><i class="glyphicon glyphicon-time"></i></div>
								<span class="title">Jadwal Seminar</span>
							</a>
						</li>
                        <?php } ?>

						<!-- END JADWAL SEMINAR MENU -->

						<!-- SETTING MENU-->
                    <?php if($_SESSION['level'] == '1') {?>
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-create"></i></div>
								<span class="title">Setting</span>
							</a>

							<ul>
								<li>
								<a href="<?php echo base_url().'tugas/dosen';?>" <?php if($active == 'dosen') { echo "class='active'"; }?>><span class="title">Dosen</span></a>
								</li>
								<li>
							<a href="<?php echo base_url().'tugas/prodi';?>" <?php if($active == 'prodi') { echo "class='active'"; }?>>
								<span class="title">Program Studi</span>
							</a>
						</li>
                        	<li>
							<a href="<?php echo base_url().'tugas/kuota_bimbingan';?>" <?php if($active == 'kuota') { echo "class='active'"; }?>>
								<span class="title">Kuota Bimbingan</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url().'tugas/gaji_dosen';?>" <?php if($active == 'gaji') {
								echo "class='active'";} ?> >
								<span class="title">Gaji Dosen Seminar</span>
							</a>
						</li>

							</ul>


						</li>
                        <?php } ?>
						<!-- END SETTING MENU -->

						<!-- SEARCHING MENU-->
                    <?php if($_SESSION['level'] == '1' OR $_SESSION['level'] == '4'  OR $_SESSION['level'] == '5' OR $_SESSION['level'] == '6') {?>
					    <li>
                            <li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="glyphicon glyphicon-search"></i></div>
								<span class="title">Pencarian</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="<?php echo base_url().'tugas/search_mahasiswa';?>" <?php if($active == 'pencarian_mahasiswa') {
								echo "class='active'";} ?> >
								<span class="title">Mahasiswa Bimbingan</span>
                                    </a></li>
                                
                                <li><a href="<?php echo base_url().'Tugas/mahasiswa_diuji';?>" <?php if($active == 'mahasiswa_diuji') { echo "class='active'"; }?>><span class="title">Mahasiswa Yang Diuji</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
                            
                        </li>
    <?php } ?>

						<!-- END SEARCHING MENU -->
    
                      

						
						  <!-- PENENTUAN KUOTA BIMBINGAN -->
                    <?php if($_SESSION['level'] == '4') {?>
					     <li>
							<a href="<?php echo base_url().'tugas/dosen';?>" <?php if($active == 'dosen') {
								echo "class='active'";} ?> >
								<div class="gui-icon"><i class="md md-create"></i></div>
								<span class="title">Kuota Bimbingan</span>
							</a>
						</li>
                <?php } ?>

						<!-- END PENENTUAN KUOTA BIMBINGAN -->
    

						<!--PENCATATAN SKRIPSI MENU-->
        <?php if($_SESSION['level'] == '1' OR $_SESSION['level'] == '5' ) {?>
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="fa fa-table"></i></div>
								<span class="title">Pencatatan Tugas Akhir</span>
							</a>
							<!--start submenu -->

							<ul>
								<li><a href="<?php echo base_url().'tugas/tambah_skripsi';?>" <?php if($active == 'tambah_skripsi') {echo "class='active'";} ?> ><span class="title">Pencatatan</span></a></li>
								<li><a href="<?php echo base_url().'tugas/log_pencatatan';?>" <?php if($active == 'log_pencatatan') { echo "class='active'"; }?>><span class="title">Log Pencatatan</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
    <?php } ?>
						<!-- END PENCATATAN SKRIPSI MENU -->

						<!--BERITA MENU-->
    <?php if($_SESSION['level'] == '1') {?>
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-view-day"></i></div>
								<span class="title">BERITA</span>
							</a>
							<!--start submenu -->

							<ul>
								<li><a href="<?php echo base_url().'tugas/tambah_berita';?>" <?php if($active == 'tambah_berita') {echo "class='active'";} ?> ><span class="title">Tambah Berita</span></a></li>
								<li><a href="<?php echo base_url().'tugas/list_berita';?>" <?php if($active == 'list_berita') { echo "class='active'"; }?>><span class="title">List Berita</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
    <?php } ?>
						<!-- END PENCATATAN SKRIPSI MENU -->

                        
                        <?php if($_SESSION['level'] == '4' OR $_SESSION['level'] == '5') { ?>
                        <li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-view-day"></i></div>
								<span class="title">Penentuan Pembimbing</span>
							</a>
							<!--start submenu -->

							<ul>
								<li><a href="<?php echo base_url().'tugas/penentuan_pembimbing';?>" <?php if($active == 'penentuan_pembimbing') {echo "class='active'";} ?> ><span class="title">Penentuan Pembimbing</span></a></li>
								<li><a href="<?php echo base_url().'tugas/penentuan_pembanding';?>" <?php if($active == 'penentuan_pembanding') { echo "class='active'"; }?>><span class="title">Penentuan Pembanding</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
    
                    
                        
                        <li>
							<a href="<?php echo base_url().'tugas/mahasiswa_seminar';?>" <?php if($active == 'mahasiswa_seminar') {
								echo "class='active'";} ?> >
								<div class="gui-icon"><i class="fa fa-graduation-cap"></i></div>
								<span class="title">Mahasiswa Seminar</span>
							</a>
						</li>
                        
    
                        <?php } ?>
						<!-- END TABLES -->
					
                        <!-- KEPALA LAB TA -->
    
    
                        <?php if($_SESSION['level'] == '6') { ?>
    
                           <li>
							<a href="<?php echo base_url().'tugas/kelayakan_pengajuan_judul';?>" <?php if($active == 'kelayakan_pengajuan_judul') {
								echo "class='active'";} ?> >
								<div class="gui-icon"><i class="fa fa-check-circle-o"></i></div>
								<span class="title">Kelayakan Pengajuan Judul</span>
							</a>
						</li>
    
                        <?php } ?>
    
    
    
    
                        <!-- END KEPALA LAB TA -->

						<?php if($_SESSION['level'] == '2') { ?>
					

							<!-- LIST TA MENU-->
						<li>
							<a href="<?php echo base_url().'tugas/skripsi';?>" <?php if($active == 'skripsi') {
								echo "class='active'";} ?> >
								<div class="gui-icon"><i class="fa fa-table"></i></div>
								<span class="title">Skripsi</span>
							</a>
						</li>

						<!-- END LIST TA MENU -->
    
                        <!-- SEARCHING MENU -->
    
                        <li>
                            <li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="glyphicon glyphicon-search"></i></div>
								<span class="title">Pencarian</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="<?php echo base_url().'tugas/search_mahasiswa';?>" <?php if($active == 'pencarian_mahasiswa') {
								echo "class='active'";} ?> >
								<span class="title">Mahasiswa Bimbingan</span>
                                    </a></li>
                                
                                <li><a href="<?php echo base_url().'Tugas/mahasiswa_diuji';?>" <?php if($active == 'mahasiswa_diuji') { echo "class='active'"; }?>><span class="title">Mahasiswa Yang Diuji</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
                            
                        </li>
                        
                        <li>
							<a href="<?php echo base_url().'tugas/notifikasi_dosen';?>" <?php if($active == 'notifikasi') {
								echo "class='active'";} ?> >
								<div class="gui-icon"><i class="fa fa-bell-o"></i></div>
								<span class="title">Notifikasi <span class="badge style-accent"><?php if($notifikasi_dsn > 0) {echo $notifikasi_dsn;} ?></span></span>
							</a>
						</li>
    
                        <!-- END SEARCHING MENU -->

                          <!-- SEMINAR PROPOSAL -->
    
                        <li>
                            <li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-assignment"></i></div>
								<span class="title">Seminar Proposal</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="<?php echo base_url().'tugas/pra_sempro';?>" <?php if($active == 'pra_sempro') {
								echo "class='active'";} ?> >
								<span class="title">Pra Seminar Proposal</span>
                                    </a></li>
                                
                                <li><a href="<?php echo base_url().'Tugas/sempro_ongoing';?>" <?php if($active == 'sempro_ongoing') { echo "class='active'"; }?>><span class="title">Seminar Proposal</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li --> 
                        </li>
    
    
                        <!-- END SEMINAR PROPOSAL -->

                        <!-- UJI PROGRAM -->

                        
						<li>
							<a href="<?php echo base_url().'tugas/pra_semhas';?>" <?php if($active == 'pra_semhas') {
								echo "class='active'";} ?> >
								<div class="gui-icon"><i class="fa fa-laptop"></i></div>
								<span class="title">Pra Seminar Hasil</span>
							</a>
						</li>

				
                        
                        <!-- END UJI PROGRAM -->

                          <!-- PRA SIDANG MEJA HIJAU -->

                        
						<li>
							<a href="<?php echo base_url().'tugas/pra_sidang';?>" <?php if($active == 'pra_sidang') {
								echo "class='active'";} ?> >
								<div class="gui-icon"><i class="fa fa-legal"></i></div>
								<span class="title">Pra Sidang Meja Hijau</span>
							</a>
						</li>

				
                        
                        <!-- END PRA SIDANG MEJA HIJAU -->

                        <!-- VALIDASI APLIKASI -->

                        
						<li>
                            <li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-check-box"></i></div>
								<span class="title">Validasi Aplikasi</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="<?php echo base_url().'tugas/revisi_skripsi';?>" <?php if($active == 'revisi_skripsi') {
								echo "class='active'";} ?> >
								<span class="title">Revisi Skripsi</span>
                                    </a></li>
                                
                                <li><a href="<?php echo base_url().'Tugas/aplikasi_mahasiswa';?>" <?php if($active == 'aplikasi_mahasiswa') { echo "class='active'"; }?>><span class="title">Aplikasi Mahasiswa</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li --> 
                        </li>

				
                        
                        <!-- END VALIDASI APLIKASI -->


                        <!-- Mahasiswa Seminar/Sidang -->

                        
						<li>
							<a href="<?php echo base_url().'tugas/mahasiswa_seminar';?>" <?php if($active == 'mahasiswa_seminar') {
								echo "class='active'";} ?> >
								<div class="gui-icon"><i class="fa fa-graduation-cap"></i></div>
								<span class="title">Mahasiswa Seminar/Sidang</span>
							</a>
						</li>

				
                        
                        <!-- END MAHASISWA SEMINAR/SIDANG -->



						<!-- END LEVELS -->
						<?php } ?>

                         <!-- February 14th 2020 -->
                        <!-- VALIDASI PLAGIARISME -->
                        <?php if($_SESSION['level'] == '7') {?>
						<li>
							<a href="<?php echo base_url().'tugas/validasi_plagiarisme';?>" <?php if($active == 'validasi_plagiarisme') {
								echo "class='active'";} ?> >
								<div class="gui-icon"><i class="fa fa-check-circle"></i></div>
								<span class="title">Validasi Plagiarisme</span>
							</a>
						</li>
                        <?php } ?>
						<!-- END VALIDASI PLAGIARISME -->

					</ul><!--end .main-menu -->
					<!-- END MAIN MENU -->

					<div class="menubar-foot-panel">
						<small class="no-linebreak hidden-folded">
							<span class="opacity-75"></span> <strong>Sisfo TA</strong>, powered by : CodeCovers 
						</small>
					</div>
				</div><!--end .menubar-scroll-panel-->
			</div><!--end #menubar-->