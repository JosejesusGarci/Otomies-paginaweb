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
	$s="update categorias set categorias_nombre='" . $_POST["t2"] ."' where categorias_id='" . $_POST["t1"] . "'";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Modificar categoria');</script>";
}
?>



<div>
 		<div >
			<?php include('../Admin/Sistema.php'); ?>

			<div class="col-sm-9">





				<form method="post">
					<table border="0" width="500px" height="300px" align="center" class="tableshadow">
						<tr><td colspan="2" class="toptd">Modificar categoria</td></tr>
						<tr><td class="lefttxt">Selecionar categoria</td><td><select name="t1" required/><option value="">Seleccionar</option>



							<?php
								$cn=makeconnection();
								$s="select * from categorias";
								$result=mysqli_query($cn,$s);
								$r=mysqli_num_rows($result);
								//echo $r;

										while($data=mysqli_fetch_array($result))
											{
												if(isset($_POST["show"])&& $data[0]==$_POST["t1"])
													{
														echo"<option value=$data[0] selected>$data[1]</option>";
													}
												else
													{
														echo "<option value=$data[0]>$data[1]</option>";
													}
											}
								mysqli_close($cn);
							?>

										</select>
									 <input class="btn btn-warning"" type="submit" value="Mostrar" name="show" formnovalidate/>
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
								<tr><td class="lefttxt">Nombre de la categoria</td><td><input type="text"   value="<?php if(isset($_POST["show"])){ echo $Cat_name ;} ?>" name="t2" required pattern="[a-zA-z _]{3,10}" title"Please Enter Only Characters between 3 to 10 for Category Name"/></td></tr>
								<tr><td>&nbsp;</td><td ><input class="btn btn-success" type="submit" value="MODIFICAR" name="sbmt" /></td></tr>
					</table>
				</form>
			</div>

		</div>
</div>
<?php include('../Admin/Piesistema.php'); ?>



