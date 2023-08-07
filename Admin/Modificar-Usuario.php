<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php
if($_SESSION['loginstatus']=="")
{
	header("location:loginform.php");
}
?>

<?php include('function.php'); ?>
<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$s="update users set pwd='" . $_POST["t2"] ."',Typeofuser='" . $_POST["s1"] . "' where Username='" . $_POST["t1"] . "'";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Modificar usuario');</script>";
}
?>



<div>
         <div>
         <?php include('../Admin/Sistema.php'); ?>

      
		 <div class="col-sm-9">





           <form method="post">
            <table border="0" width="400px" height="300px" align="center" class="tableshadow">
              <tr><td colspan="2" class="toptd">Modificar usuario</td></tr>
              <tr><td class="lefttxt">Seleccionar usuario</td><td><select name="t1" required/><option value="">Seleccionar</option>

<?php
$cn=makeconnection();
$s="select * from users";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	if(isset($_POST["show"])&& $data[0]==$_POST["t1"])
	{
		echo"<option value=$data[0] selected>$data[0]</option>";
	}
	else
	{
		echo "<option value=$data[0]>$data[0]</option>";
	}
}
mysqli_close($cn);



?>

</select>
<input class="btn btn-warning" type="submit" value="Mostrar" name="show" formnovalidate/>
<?php
if(isset($_POST["show"]))
{
$cn=makeconnection();
$s="select * from users where Username='" .$_POST["t1"] ."'";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

$data=mysqli_fetch_array($result);
$Username=$data[0];
$Pass=$data[1];
$Usertype=$data[2];

mysqli_close($cn);

}

?>

</td></tr>
<tr><td class="lefttxt">Contraseña</td><td><input type="password"  value="<?php if(isset($_POST["show"])){ echo $Pass ;} ?>" name="t2" required pattern="[a-zA-z0-9]{1,10}" title"Please Enter Only Characters and numbers between 1 to 10 for Password"/></td></tr>
<tr><td class="lefttxt">Confirmar Contraseña</td><td><input type="password" value="<?php if(isset($_POST["show"])){ echo $Pass ;} ?>" name="t3" required pattern="[a-zA-z0-9]{1,10}" title"Please Enter Only Characters and numbers between 1 to 10 for Password"/></td></tr>
<tr><td class="lefttxt">Tipo de usuario</td><td><select name="s1" required /><option value="">Seleccionar</option>
<option value="Admin" <?php if(isset($_POST["show"])&& $Usertype=="Admin"){ echo "selected"; } ?>>Admin</option>
<option value="General" <?php if(isset($_POST["show"])&& $Usertype=="General"){ echo "selected"; } ?>>General</option>
</select></td></tr>
<tr><td>&nbsp;</td><td ><input class="btn btn-success" type="submit" value="Modificar" name="sbmt" /></td></tr>
</table>
</form>
</div>
 </div>


<?php include('../Admin/Piesistema.php'); ?>
