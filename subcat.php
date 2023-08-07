<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Experiencias</title>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href="stylecss.css" rel='stylesheet' type='text/css'/>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
<link href="css/estilos.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<script src="js/jquery.min.js"></script>


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
<div style="height:60px"></div>
<div style="width:1000px; margin:auto" >

<div style="width:100px; float:left">

<table cellpadding="0" cellspacing="0" width="9000px">
<tr><td style="font-size:22px;font-weight:bold; font-family:Lucida Calligraphy; color:#09F"><b>Tipo de experiecia</b></td></tr>
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
<table cellpadding="0px" cellspacing="0" width="900px">
<tr><td class="headingText">Otomies Experiencias</td></tr>
<tr><td class="paraText" width="900px">




<table cellpadding="0" cellspacing="0" width="900px">

<?php

$s="select * from subcategorias where categorias_id='" .$_GET["categorias_id"] . "'";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;
$n=0;
while($data=mysqli_fetch_array($result))
{
	
	if($n%3==0)
	{
	?>
		


<tr>
<?php

	}?>
<td>
<table border="0" width="100px" bordercolor="#FF6666">


<tr><td  align="center" style="padding: 20px; font-size:28px; font-family:Aharoni Bold Aharoni Bold;"  class="headingText"><?php echo $data[1];?> </td></tr>
<tr><td class="image"><img src="Admin/subcategoria-imagenes/<?php echo $data[3]; ?>" width="370px" height="320px" /></td></tr><br/><br/>
<tr><td align="center" style=" padding: 10px; font-size:20px; font-family:Aharoni Bold Aharoni Bold;"><a href="package.php?subcatid=<?php echo $data[0];?>"><font class="headingText" style="color:green;">Paquete turistico</font></a></td></tr>

</table>
</td>


<?php

if($n%3==2)
{
?>
</tr>

<?php
}
$n=$n+1;
}
mysqli_close($cn);
?>

</table>




</td></tr></table>

</div>

</div>

<div style="clear:both"></div>

<br></br>

<?php include('bottom.php'); ?>
</body>
</html>