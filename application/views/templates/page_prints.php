<html>
    <table border="1" cellpadding="5" align="center">
        <tr>
            <td>No</td>
            <td>NIM</td>
            <td>Nama Mahasiswa</td>
            <td>Jadwal Lulus</td>
            <td>Judul</td>
            <td>Program Studi</td>
            <td>Pembimbing 1</td>
            <td>Pembimbing2</td>
        </tr>
<?php $no = 1; foreach($data as $data) { 
    
    switch($data->bulan_lulus) {
        case '0' : $bulan_lulus = "";break;
        case '1' : $bulan_lulus = "Januari";break;
        case '2' : $bulan_lulus = "Februari";break;
        case '3' : $bulan_lulus = "Maret";break;
        case '4' : $bulan_lulus = "April";break;
        case '5' : $bulan_lulus = "Mei";break;
        case '6' : $bulan_lulus = "Juni";break;
        case '7' : $bulan_lulus = "Juli";break;
        case '8' : $bulan_lulus = "Agustus";break;
        case '9' : $bulan_lulus = "September";break;
        case '10' : $bulan_lulus = "Oktober";break;
        case '11' : $bulan_lulus = "November";break;
        case '12' : $bulan_lulus = "Desember";break;
        default : $bulan_lulus = "";break;
        
    }
        ?>
        
        <tr>
            <td><?= $no ++ ?></td>
            <td><?= $data->nim ?></td>
            <td><?= $data->nama ?></td>
            <td><?php echo $bulan_lulus.' '.$data->tahun_lulus; ?></td>
            <td><?= $data->judul ?></td>
            <td><?= $data->nama_PS ?></td>
            <td><?= $data->Dosen_Pembimbing1 ?></td>
            <td><?= $data->Dosen_Pembimbing2 ?></td>
        </tr>
    <?php } ?>
    </table>
</html>