<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Informacion</title>
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
<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$s="insert into consultas(paquete_id,nombre,genero,telefono,email,numero_dias,numero_ninos,numero_adultos,mensaje,estado_consulta) values('" . $_REQUEST["pid"] ."','" . $_POST["t1"] ."','" . $_POST["r1"] ."','" . $_POST["t2"] ."','" . $_POST["t3"] ."','" . $_POST["t4"] ."','" . $_POST["t5"] ."','" . $_POST["t6"] ."','" . $_POST["t7"] ."','Pending')";	
	
	
		mysqli_query($cn,$s);
	
	echo "<script>alert('Guardar consulta');</script>";
}
?>

<?php include('top.php'); ?>
<!--/sticky-->
<?php include('slider.php'); ?>
<div style="height:50px"></div>
<div style="width:1000px; margin:auto"  >

<div style="width:200px; font-size:18px; color:#09F; float:left">

<table cellpadding="0" cellspacing="0" width="1000px">
<tr><td style="font-size:22px; font-weight:bold; font-family:Lucida Calligraphy; color:#09F">Tipo de experiencia</td></tr>
<?php

$s="select * from categorias";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	
		echo "<tr><td style=' font-weight:bold; font-size:18px; padding:5px;'><a href='subcat.php?categorias_id=$data[0]'>$data[1]</a></td></tr>";

}
?>

</table>

</div>

<div style="width:800px; float:left">
<table cellpadding="0px" cellspacing="0" width="1000px">
<tr><td class="headingText">Informacion paquete turistico</td></tr>
<tr><td class="paraText" width="900px">
<table cellpadding="0" cellspacing="0" width="900px">
<td>

<table border="0"; width="650px" height="550px" align="center" >
<?php

$s="select * from paquetes,categorias,subcategorias where paquetes.categorias=categorias.categorias_id and paquetes.subcategorias=subcategorias.subcategorias_id and paquetes.paquete_id='" . $_GET["pid"] ."'";

$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;
$n=0;
$data=mysqli_fetch_array($result);
mysqli_close($cn);
?>
 
<form method="post" enctype="multipart/form-data">
<tr><td colspan="3" class="middletext" style="font-size: 17px;">Id paquete turistico:&nbsp;&nbsp;&nbsp;<?php echo $data[0];?></td></tr>
<tr><td colspan="3" class="middletext" style="font-size: 17px;">Nombre del paquete turistico:&nbsp;&nbsp;&nbsp;<?php echo $data[1];?></td></tr>
<tr><td class="lefttxt" style="font-size: 17px;">Nombre del usuario:</td><td><input type="text" name="t1" required pattern="[a-zA-z1 _]{3,50}" title"Please Enter Only Characters and numbers between 1 to 50 for Name"/></td></tr><br/>
<tr><td class="lefttxt" style="font-size: 17px;">Genero:</td><td><input type="radio" name="r1" value="Male" checked="checked" />Mujer<input type="radio" name="r1"  value="Female"/>Hombre</td></tr><br/>
<tr><td class="lefttxt" style="font-size: 17px;">Numero de telefono:</td><td><input type="text" name="t2" required pattern="[0-9]{10,12}" title"Please Enter Only numbers between 10 to 12 for Mobile No"/></td></tr><br/>
<tr><td class="lefttxt" style="font-size: 17px;">Correo electronico:</td><td><input type="email" name="t3" required /></td><td><br/>
<tr><td class="lefttxt" style="font-size: 17px;">No. de dias:</td><td><input type="number" name="t4" required pattern="[1 _]{1,20}" title"Please Enter Only numbers between 1 to 20 for No. oF Days"/></td><td><br/>
<tr><td class="lefttxt" style="font-size: 17px;">No. de ninos:</td><td><input type="number" name="t5" required pattern="[1 _]{1,10}" title"Please Enter Only numbers between 1 to 10 for Children"/></td><td><br/>
<tr><td class="lefttxt" style="font-size: 17px;">No. de adultos:</td><td><input type="number" name="t6" required pattern="[1 _]{1,20}" title"Please Enter Only numbers between 1 to 20 for No.Of Adults"/></td><td><br/>
<tr><td class="lefttxt" style="font-size: 17px;">Mensaje:</td><td><textarea name="t7" required="required"/></textarea></td><td><br/>
<tr><td>&nbsp;</td><td ><input class="btn btn-success" style="font-size: 22	px; padding:10px;" type="submit" value="Enviar mensaje" name="sbmt" /></td></tr>

</form></td></tr>
</table>
</td>
</table>
</td></tr>
</table>

</div>

</div>

<div style="clear:both"></div>

<?php include('bottom.php'); ?>
</body>
</html>

