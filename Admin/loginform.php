<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Admininistrador Otomiees</title>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href="../css/bootstrap.css" rel='stylesheet' type='text/css'/>



<link rel="stylesheet" href="../css/admin/login.css">
<link rel="stylesheet" href="../css/admin/cabecera.css">
<meta name="viewport" content="width=device-width, initial-scale=1">




<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<link href="../css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="../js/wow.min.js"></script>
<script>
 new WOW().init();
</script>

</head>
<body>


<?php include('function.php'); ?>
<?php
$_SESSION['loginstatus']="";
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$s="select * from users where Username='" . $_POST["t1"] . "' and Pwd='" . $_POST["t2"] ."'";
	
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
$data=mysqli_fetch_array($q);
	mysqli_close($cn);
	if($r>0)
	{
		$_SESSION["Username"]= $_POST["t1"];
		$_SESSION["usertype"]=$data[2];
		$_SESSION['loginstatus']="yes";
		header("location:sistema.php");
	}
	else
	{
	echo "<script>alert('Invalid User Name or Password');</script>";
}
}
?>


<form  class="user" method="post" action="" autocomplete="off">
   <h1 class="animate__animated animate__backInLeft">!BIENVENIDO AL SISTEMA OTOMIES!</h1>
        <?php echo (isset($alert)) ? $alert : ''; ?>
      <p>Usuario <input type="text"  style="color: black;" placeholder="ingrese su nombre de usuario" id="usuario" name="t1" required pattern="[a-zA-z _]{1,50}" title"Please Enter Only Characters between 1 to 50 for User Name" ></p>
      <p>Contraseña <input type="password" style="color: black;" placeholder="ingrese su contraseña"  id="clave" name="t2" required pattern="[a-zA-z0-9]{1,10}" title"Please Enter Only Characters between 1 to 10 for Password"></p>
   <input type="submit" value="Ingresar" name="sbmt">
</form> 



</body>
</html>