<html>
    <style>
        .header {
            background-color: salmon;
            font-style: oblique;
        }
    </style>
    <table border="1" cellpadding="5" align="center">
        <tr class="header">
            <td>No</td>
            <td>NIM</td>
            <td>Nama Mahasiswa</td>
            <td>Status</td>
            <td>Pembimbing 1</td>
            <td>Pembimbing 2</td>
        </tr>
<?php $no = 1; foreach($data as $data) {  
        
        					switch($data->status) {
			case 'pengajuan judul' : $statusnya = "sedang pengajuan judul";break;
			case 'belum sempro' : $statusnya = "sudah pengajuan judul";break;
			case 'belum semhas' : $statusnya = "sudah seminar proposal";break;
			case 'belum sidang' : $statusnya = "sudah seminar hasil";break;
			case 'sudah sidang' : $statusnya = "sudah sidang";break;
			case 'lulus' : $statusnya = "lulus";break; }
 ?>
        
        <tr>
            <td><?= $no ++ ?></td>
            <td><?= $data->nim ?></td>
            <td><?= $data->nama ?></td>
            <td><?= $statusnya ?></td>
            <td><?= $data->pembimbing1 ?></td>
            <td><?= $data->pembimbing2 ?></td>
        </tr>
    <?php } ?>
    </table>
</html>