<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php
if($_SESSION['loginstatus']=="")
{
	header("location:loginform.php");
}

?>
<?php include('../function.php'); ?>
<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$s="insert into categorias(categorias_nombre) values('" . $_POST["t1"] ."')";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Añadir categoria');</script>";
}
?>


<div>
        <div >
             <?php include('../Admin/Sistema.php'); ?>
   
        	<div class="col-sm-9">
  



     		<form method="post">
		  		<table border="0" width="400px" height="200px" align="center" class="tableshadow">
					<tr><td colspan="2" class="toptd">Añadir categoria</td></tr>
					<tr><td class="lefttxt">Nombre categoria</td><td><input type="text" name="t1" required pattern="[a-zA-z _]{3,20}" title"Please Enter Only Characters between 3 to 10 for Category Name" /></td></tr>
					<tr><td>&nbsp;</td><td ><input class="btn btn-success" type="submit" value="GUARDAR" name="sbmt" /></td></tr>

				</table>
			</form>

			</div>
		</div>


</div>

<?php include('../Admin/Piesistema.php'); ?>
