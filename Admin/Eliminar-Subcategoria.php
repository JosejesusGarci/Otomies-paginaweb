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
				$s="delete from subcategorias  where subcategorias_id='" . $_POST["s1"] . "'";
				mysqli_query($cn,$s);
				mysqli_close($cn);
				echo "<script>alert('Eliminar subcategoria');</script>";
				}
			?>





	<div>
		<div>
			<?php include('../Admin/Sistema.php'); ?>
				<div class="col-sm-9">
					<form method="post" enctype="multipart/form-data">
						<table border="0" width="400px" height="250px" align="center" class="tableshadow">
							<tr><td colspan="2" class="toptd">Eliminar subcategoria</td></tr>
							<tr><td class="lefttxt">Seleccionar categoria</td><td><select name="t2" required/><option value="">Seleccionar</option>

								<?php
								$cn=makeconnection();
								$s="select * from categorias";
								$result=mysqli_query($cn,$s);
								$r=mysqli_num_rows($result);
								//echo $r;

								while($data=mysqli_fetch_array($result))
								{
										if(isset($_POST["show"])&& $data[0]==$_POST["t2"])
										{
										echo "<option value=$data[0] selected>$data[1]</option>";
										}
										else
										{
											echo "<option value=$data[0]>$data[1]</option>";
										}
									
								}
								mysqli_close($cn);
								?>
								</select>
								
								<input class="btn btn-warning" type="submit" value="Mostrar" name="show" formnovalidate/>



								<tr><td class="lefttxt">Seleccionar Subcategoria</td><td><select name="s1" required/><option value="">Seleccionar</option>

								<?php
								if(isset($_POST["show"]))
								{

								$cn=makeconnection();
								$s="select * from subcategorias where categorias_id='" . $_POST["t2"] ."'";
								$result=mysqli_query($cn,$s);
								$r=mysqli_num_rows($result);
								//echo $r;

								while($data=mysqli_fetch_array($result))
								{
									
									
										echo "<option value=$data[0]>$data[1]</option>";
									
								}
								mysqli_close($cn);
								}
								?>

								</select>

								</td></tr>

								<tr><td>&nbsp;</td><td ><input class="btn btn-danger" type="submit" value="ELIMINAR" name="sbmt" /></td></tr>

						</table>
					</form>

				</div>
		</div>
	</div>
<?php include('../Admin/Piesistema.php'); ?>




             