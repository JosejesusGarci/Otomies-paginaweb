<?php if(!isset($_SESSION)) { session_start(); } ?>


<?php
if($_SESSION['loginstatus']=="")
{
	header("location:loginform.php");
}
?>

<?php include('../Admin/function.php'); ?>

<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$s="insert into users values('" . $_POST["t1"] ."','" . $_POST["t2"] . "','" . $_POST["s1"] . "')";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Guardar usuario');</script>";
}
?>

<div>
    <div>
    <?php include('../Admin/Sistema.php'); ?>
    
 
       <div class="col-sm-9">
             <form method="post">
                <table border="0" width="400px" height="300px" align="center" class="tableshadow">
                <tr><td colspan="2" class="toptd">Agregar usuario</td></tr>
                <tr><td class="lefttxt">Nombre de usuario</td><td><input type="text" name="t1" required pattern="[a-zA-z1 _]{3,50}" title"Please Enter Only Characters and numbers between 3 to 50 for User name" /></td></tr>
                <tr><td class="lefttxt">Contraseña</td><td><input type="password" name="t2" required pattern="[a-zA-z0-9]{1,10}" title"Please Enter Only Characters and numbers between 1 to 10 for Company name"/></td></tr>
                 <tr><td class="lefttxt">Confirmar contraseña</td><td><input type="password" name="t3" required pattern="[a-zA-z0-9]{1,10}" title"Please Enter Only Characters and numbers between 1 to 10 for Company name"/></td></tr>
                 <tr><td class="lefttxt">Tipo de usuario</td><td><select name="s1" required><option value="">Seleccionar</option><option value="Admin">Admin</option><option value="General">General</option></select></td></tr>
                 <tr><td>&nbsp;</td><td ><input  class="btn btn-success" type="submit" value="GUARDAR" name="sbmt" /></td></tr>
                </table>
            </form>
	   </div>
    </div>
</div>
     


<?php include('../Admin/Piesistema.php'); ?>
