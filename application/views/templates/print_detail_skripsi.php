<html>
    <head>
    <style>
        .header {
            background-color: salmon;
            font-style: oblique;
        }
        hr {
            
            border-top: 0px;
            border-right: 0px;
            border-left:0px;
            border-bottom: 1px solid #8c8b8b;
        }
    </style>
    </head>
    <body>
    
    	<?php
				foreach($data as $skr)
							{
								$nim=$skr->nim;
								$tahun_lulus=$skr->tahun_lulus;
								$sk_pembimbing=$skr->nomor_sk_pembimbing;
								$sk_pembanding=$skr->nomor_sk_pembanding;
								$nama=$skr->nama;
								$nama_PS=$skr->nama_PS;
								$judul=$skr->judul;
								$dopim1=$skr->Dosen_Pembimbing1;
								$dopim2=$skr->Dosen_Pembimbing2;
								$dopem1=$skr->Dosen_Pembanding1;
								$dopem2=$skr->Dosen_Pembanding2;
								$uji_program=$skr->nilai_uji_program;
								$semhas = $skr->nilai_semhas;
								$sidang = $skr->nilai_sidang;
								$total = $skr->total;
								$grade = $skr->grade;
                                $ilmu1 = $skr->ilmu1;
                                $ilmu2 = $skr->ilmu2;
							}




			?>
        <center><h4>Detail Skripsi Mahasiswa</h4></center>
    <br><br><br>
   <table class="table no-margin" width="100%">
												
												
													<tr>
														<td>NIM</td>
														<td>:</td>
														<td><?=$nim ?></td>
													</tr>
                                                    <tr>
                                                        <td colspan="3"><hr></td>
                                                    </tr>
													<tr>
														<td>Tahun Lulus</td>
														<td>:</td>
														<td><?=$tahun_lulus ?></td>
													</tr>
                                                     <tr>
                                                        <td colspan="3"><hr></td>
                                                    </tr>
													<tr>
														<td>Nomor SK Pembimbing</td>
														<td>:</td>
														<td><?=$sk_pembimbing ?></td>
													</tr>
                                                     <tr>
                                                        <td colspan="3"><hr></td>
                                                    </tr>
													<tr>
														<td>Nomor SK Pembanding</td>
														<td>:</td>
														<td><?=$sk_pembanding ?></td>
													</tr>
                                                     <tr>
                                                        <td colspan="3"><hr></td>
                                                    </tr>
													<tr>
														<td>Nama Lengkap</td>
														<td>:</td>
														<td><?=$nama ?></td>
													</tr>
                                                     <tr>
                                                        <td colspan="3"><hr></td>
                                                    </tr>
													<tr>
														<td>Judul</td>
														<td>:</td>
														<td><?=$judul ?></td>
													</tr>
                                                     <tr>
                                                        <td colspan="3"><hr></td>
                                                    </tr>
                                                    <tr>
														<td>Bidang Ilmu 1</td>
														<td>:</td>
														<td><?=$ilmu1 ?></td>
													</tr>
                                                     <tr>
                                                        <td colspan="3"><hr></td>
                                                    </tr>
                                                    <tr>
														<td>Bidang Ilmu 2</td>
														<td>:</td>
														<td><?=$ilmu2 ?></td>
													</tr>
                                                     <tr>
                                                        <td colspan="3"><hr></td>
                                                    </tr>
													<tr>
														<td>Pembimbing 1</td>
														<td>:</td>
														<td><?=$dopim1 ?></td>
													</tr>
                                                     <tr>
                                                        <td colspan="3"><hr></td>
                                                    </tr>
													<tr>
														<td>Pembimbing 2</td>
														<td>:</td>
														<td><?=$dopim2 ?></td>
													</tr>
                                                     <tr>
                                                        <td colspan="3"><hr></td>
                                                    </tr>
													<tr>
														<td>Pembanding 1</td>
														<td>:</td>
														<td><?=$dopem1 ?></td>
													</tr>
                                                     <tr>
                                                        <td colspan="3"><hr></td>
                                                    </tr>
													<tr>
														<td>Pembanding 2</td>
														<td>:</td>
														<td><?=$dopem2 ?></td>
													</tr>
                                                     <tr>
                                                        <td colspan="3"><hr></td>
                                                    </tr>
													<tr>
														<td>Nilai Uji Program</td>
														<td>:</td>
														<td><?=$uji_program ?></td>
													</tr>
                                                     <tr>
                                                        <td colspan="3"><hr></td>
                                                    </tr>
													<tr>
														<td>Nilai Seminar Hasil</td>
														<td>:</td>
														<td><?=$semhas ?></td>
													</tr>
                                                     <tr>
                                                        <td colspan="3"><hr></td>
                                                    </tr>
													<tr>
														<td>Nilai Sidang Meja Hijau</td>
														<td>:</td>
														<td><?=$sidang ?></td>
													</tr>
                                                     <tr>
                                                        <td colspan="3"><hr></td>
                                                    </tr>
													<tr>
														<td>Total</td>
														<td>:</td>
														<td><?=$total ?></td>
													</tr>
                                                     <tr>
                                                        <td colspan="3"><hr></td>
                                                    </tr>
													<tr>
														<td>Grade</td>
														<td>:</td>
														<td><?=$grade ?></td>
													</tr>

											</table>
    </body>
    
</html>