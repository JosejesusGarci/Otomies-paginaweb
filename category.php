<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Categorias Experiencias</title>
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
<div style="width:1200px; margin:auto" >

<div style="width:200px; float:left">

<table cellpadding="0" cellspacing="0" width="1200px">
<tr><td style=" font-weight:bold; font-family:Lucida Calligraphy; font-size:22px; color:#09F"><b>Tipo de experiencias</b></td></tr>
<?php


$s="select * from categorias";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	
		echo "<tr><td style='  font-weight:bold; font-size:18px; padding:5px;'><b><a href='subcat.php?categorias_id=$data[0]'>$data[1]</a></b></td></tr>";

}
mysqli_close($cn);
?>

</table>

</div>

<div style="width:1000px; float:left">
<table cellpadding="0px" cellspacing="0" width="1200px">
<tr><td class="headingText">Otomies Experiencias</td></tr>
<tr><td class="paraText" style="font-size: 16px;" width="1000px">
Durante nuestras participaciones en eventos para promover los productos gourmet, decidimos 
gestionar espacios para dar a conocer el turismo y cultura del Valle del Mezquital, 
en la Cdmx se realizaron dos festivales, nutrida con música, danza, gastronomía, artesanías, 
desarrollos ecoturísticos y parques acuáticos, ante los resultados inmediatos se decide arrancar 
una promotora no solo turística sino también cultural.
Dentro de todos los atractivos turístico-culturales con que se cuenta se acordó realizar 
paquetes turísticos como una alternativa de dar a conocer además de los parques acuáticos, 
todos los atractivos, por ejemplo tenemos monumentos históricos, museos, vivir las tradiciones 
y mucho más que no se estaba difundiendo.
Al estar en un importante corredor de parques acuáticos a nivel nacional, 
se tiene esa gran área de oportunidad al fusionar todos los atractivos y servicios; 
creamos rutas establecidas para que los turistas se puedan deleitar con los destinos, 0
durante varios días, capacitar a los prestadores de servicios y se brinden servicios profesionales 
y competitivos. Quienes aquí participamos, en su mayoría somos empresas sociales 
y/o comunitarias.</td><td style="background-image:url(images/Experiencias-1.png); background-repeat:no-repeat; color:#FFF; font-family:Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:28px; " width="1000px" height="500px" >
</td></tr></table>

</div>

</div>

<div style="clear:both"></div>


<!--PLUGIN DE FACEBOOK-->
<div class="facebook" style="padding:70px; font-family:Lucida Calligraphy; font-size:20px; color:#09F">
  <h2>Visita nuestra pagina en facebook</h2>

  <br></br>

  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" 
  src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v15.0" 
  nonce="3Ly2LQsW">
  </script>

  <div class="fb-page" data-href="https://www.facebook.com/otomies.experiencias" 
  data-tabs="timeline" data-width="1200" data-height="900" data-small-header="false" 
  data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
  <blockquote cite="https://www.facebook.com/otomies.experiencias" class="fb-xfbml-parse-ignore">
  <a href="https://www.facebook.com/otomies.experiencias">Otomíes Gourmet</a>
  </blockquote>
  </div>

</div>

<br></br>

<?php include('bottom.php'); ?>
</body>
</html>