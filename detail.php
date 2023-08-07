<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Paquete turistico</title>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href="stylecss.css" rel='stylesheet' type='text/css'/>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
<link href="css/estilos.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--js--> 
<script src="js/jquery.min.js"></script>

<!--/js-->
<!--animated-css-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
</head>

<body>
<?php include('function.php'); ?>
<?php include('top.php'); ?>
<!--/sticky-->
<?php include('slider.php'); ?>
<div style="height:50px"></div>
<div style="width:1000px; margin:auto"  >

<div style="width:200px; font-size:18px; color:#09F; float:left">

<table cellpadding="0" cellspacing="0" width="1000px" >
<tr><td style="font-size:22px; font-weight:bold; font-family:Lucida Calligraphy; color:#09F">Tipo de experiencia</td></tr>
<?php

$s="select * from categorias";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	
		echo "<tr><td style=' font-weight:bold; font-size:18px; padding: 8px;'><a href='subcat.php?categorias_id=$data[0]'>$data[1]</a></td></tr>";

}

?>

</table>

</div>

<div style="width:800px; float:left">
<table cellpadding="0px" cellspacing="0" width="1000px" >
<tr><td class="headingText">Informacion del paquete turistico</td></tr>
<tr><td class="paraText" width="900px">
<table cellpadding="0" cellspacing="0" width="900px" border="0">
<tr>
<td>

<table border="0" width="600px" height="400px" align="center" >
<?php

$s="select * from paquetes,categorias,subcategorias where paquetes.categorias=categorias.categorias_id and paquetes.subcategorias=subcategorias.subcategorias_id and paquetes.paquete_id='" . $_GET["pid"] ."'";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;
$n=0;
$data=mysqli_fetch_array($result);
mysqli_close($cn);
?>
 

<tr><td colspan="3"><span class="middletext" style="font-size: 16px;">Paquete turistico:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data[1];?></td></tr>
<tr><td class="middletext"><img src="Admin/paquetes-imagenes/<?php echo $data[5];?>" width="290px" height="250px"  /></td>

<td class="middletext" style="padding-left:15px; font-size: 16px;"><img src="Admin/paquetes-imagenes/<?php echo $data[6];?>" width="290px" height="250px"  /></td>

<td class="middletext" style="padding-left:15px; font-size: 16px;"><img src="Admin/paquetes-imagenes/<?php echo $data[7];?>" width="290px" height="250px"  /></td>
</tr>
<tr><td  colspan="3" height="90px"><span class="middletext" style="font-size: 16px;">Experiencia:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $data[10];?>
 <br/>
  <span class="middletext" style="font-size: 16px;">Subcategoria:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <?php echo $data[12];?>
  <br/>
   <span class="middletext" style="font-size: 16px;">Precio:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <?php echo $data[4]; ?>
</td></tr>
<tr><td colspan="3" style="font-size: 16px;"><p><?php echo $data[8];?></p></td></tr>
<tr><td align="left" colspan="3" height="50px"><a href="enquiry.php?pid=<?php echo $data[0];   ?>"><input class="btn btn-info" type="button" value="Informacion" name="sbmt" /></a></td></tr>
</table>
</td>
</tr>
</table>
</td></tr>
</table>

</div>

</div>

<div style="clear:both"></div>

<?php include('bottom.php'); ?>
</body>
</html>



