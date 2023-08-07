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
	$s="delete from categorias  where categorias_id='" . $_POST["t1"] . "'";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Eliminar categoria');</script>";
}
?>



<div>
		<div>
			<?php include('../Admin/Sistema.php'); ?>
	
		<div class="col-sm-9">





			<form method="post">
				<table border="0" width="400px" height="200px" align="center" class="tableshadow">
					<tr><td colspan="2" class="toptd">Eliminar categoria</td></tr>
					<tr><td class="lefttxt">Seleccionar categoria</td><td><select name="t1" required/><option value="">Seleccionar</option>

						<?php
							$cn=makeconnection();
							$s="select * from categorias";
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
										$s="select * from categorias where categorias_id='" .$_POST["t1"] ."'";
										$result=mysqli_query($cn,$s);
										$r=mysqli_num_rows($result);
										//echo $r;

										$data=mysqli_fetch_array($result);
										$Cat_id=$data[0];
										$Cat_name=$data[1];


													mysqli_close($cn);

										}

									?>

							</td></tr>

							<tr><td>&nbsp;</td><td ><input class="btn btn-danger" type="submit" value="ELIMINAR" name="sbmt" /></td></tr>
				</table>
			</form>
		</div>
	</div>
</div>

<?php include('../Admin/Piesistema.php'); ?>
