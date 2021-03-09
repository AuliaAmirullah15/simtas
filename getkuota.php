<!DOCTYPE html>
<html>
    <head>
    </head>
    
    <body>
        <?php 
            $q = intval($_GET['q']);
            $s = $_GET['s'];
    
            $con = mysqli_connect('localhost','root','','simta');
        
        if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ti_simtas_backup");
$sql="SELECT kuota FROM kuota_bimbingan WHERE stambuk = '".$q."' AND kd_dosen = '". $s ."'";
$result = mysqli_query($con,$sql);
        
        while($row = mysqli_fetch_array($result)) {
            $kuota = $row['kuota'];
        }
        
        ?>
        
        <input type="number" class="form-control" id="kuota" name="kuota" placeholder="0" value="<?= $kuota ?>">
<label for="Lastname1">Kuota Bimbingan</label>
        
        <?php mysqli_close($con); ?>
    </body>



</html>