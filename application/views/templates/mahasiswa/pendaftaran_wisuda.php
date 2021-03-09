<!DOCTYPE html>
<html lang="en">
<head>
<title>SISFO TA</title>
<link rel="shortcut icon" href="<?php echo base_url('assets/img/usu.png') ; ?>" />
</head>
<body>
    
    <a href="<?php echo base_url().'/berkas_mahasiswa/'.$file;?>" class="media"></a>
	  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/media-master/media-master/jquery.media.js');?>"></script>
      <script type="text/javascript">
      var w = window,
    d = document,
    e = d.documentElement,
    g = d.body,
    x = w.innerWidth || e.clientWidth || g.clientWidth, // x = Lebar layar
    y = w.innerHeight || e.clientHeight || g.clientHeight; // y = Tinggi layar

    $(function () {
        $('.media').media({width: x,height: y});
    });
</script>
</html>