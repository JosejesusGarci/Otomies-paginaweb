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
	$s="delete from users  where Username='" . $_POST["t1"] . "'";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Eliminar usuario');</script>";
}
?>



<div>
          <div>
           <?php include('../Admin/Sistema.php'); ?>
        
          <div class="col-sm-9">





<form method="post">
<table border="0" width="400px" height="200px" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Eliminar usuario</td></tr>
<tr><td class="lefttxt">Seleccionar usuario</td><td><select name="t1" required/><option value="">Seleccionar</option>

<?php
$cn=makeconnection();
$s="select * from users";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	
		echo "<option value=$data[0]>$data[0]</option>";
	
}
mysqli_close($cn);



?>

</select>

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

<tr><td>&nbsp;</td><td ><input  class="btn btn-danger" type="submit" value="Eliminar" name="sbmt" /></td></tr>
</table>
</form>
</div>


</div>
<?php include('../Admin/Piesistema.php'); ?>

