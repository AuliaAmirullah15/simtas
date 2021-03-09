<div class="card-body">
												<h3 class="text-light">MENU BAR</h3>
												<ul class="nav nav-pills nav-stacked nav-transparent">
													<li><a href="<?php echo base_url().'mahasiswa/index'; ?>" <?php if($form == 0 ) { echo "class=\"active\" " ; } ?> ><i class="md md-home pull-right"></i>Home</a></li>
													<li><a href="<?php echo base_url().'mahasiswa/pengajuan_judul'; ?>"<?php if($form == 1 ) { echo "class=\"active\" " ; } ?>><i class="md md-description pull-right"></i>Pengajuan Judul</a></li>
													<li><a href="<?php echo base_url().'mahasiswa/list_judul'; ?>" <?php if($form == 7 ) { echo "class=\"active\" " ; } ?> ><i class="md md-list pull-right"></i>List Judul</a></li>
                                                    <li><a href="<?php echo base_url().'mahasiswa/pengumuman' ?>" <?php if($form == 15) { echo "class=\"active\" " ; } ?> ><i class="fa fa-bell-o pull-right"></i><?php if($jlh_pengumuman > 0) { ?><span class="badge pull-right"><?= $jlh_pengumuman ?></span><?php } ?> Pengumuman</a></li>
                                                    <li><a href="<?php echo base_url().'mahasiswa/catatan_perbaikan'; ?>" <?php if($form == 13 ) { echo "class=\"active\" " ; } ?> ><i class="fa fa-pencil-square-o pull-right"></i>Catatan Seminar/Sidang</a></li>
													<li><a href="<?php echo base_url().'mahasiswa/sempro' ?>" <?php if($form == 3 || $form == 9) { echo "class=\"active\" " ; } ?> ><i class="md md-assignment pull-right"></i>Seminar Proposal</a></li>
													<li><a href="<?php echo base_url().'mahasiswa/uji_program' ?>" <?php if($form == 2 ) { echo "class=\"active\" " ; } ?>><i class="md md-computer pull-right"></i>Uji Program</a></li>
													<li><a href="<?php echo base_url().'mahasiswa/semhas' ?>" <?php if($form == 4 || $form== 10) { echo "class=\"active\" " ; } ?> ><i class="md md-pages pull-right"></i>Seminar Hasil</a></li>
													<li><a href="<?php echo base_url().'mahasiswa/sidang' ?>" <?php if($form == 5 || $form == 11) { echo "class=\"active\" " ; } ?>><i class="md md-school pull-right"></i>Sidang Meja Hijau</a></li>
<!--                                                    <li><a href="<?php echo base_url().'mahasiswa/kirim_aplikasi' ?>" <?php if($form == 14) { echo "class=\"active\" " ; } ?>><i class="fa fa-paper-plane-o pull-right"></i>Kirim Aplikasi</a></li>-->
                                                    <li><a href="<?php echo base_url().'mahasiswa/upload_berkas_validasi' ?>" <?php if($form == 16) { echo "class=\"active\" " ; } ?>><i class="md md-file-upload pull-right"></i>Upload Berkas Validasi</a></li>
													<li><a href="<?php echo base_url().'mahasiswa/validasi' ?>" <?php if($form == 6 || $form == 12 ) { echo "class=\"active\" " ; } ?>><i class="md md-check-box pull-right"></i>Validasi Aplikasi</a></li>
												</ul>
											</div><!--end .card-body -->