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
				
				$target_dir = "subcategoria-imagenes/";
				$target_file = $target_dir.basename($_FILES["t3"]["name"]);
				$uploadok = 1;
				$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
				
				
				if(move_uploaded_file($_FILES["t3"]["tmp_name"], $target_file)){
						
				}else{
						echo "sorry there was an error uploading your file.";
					}
					}
			?>


			<?php
			if(isset($_POST["sbmt"]))
			{
				$cn=makeconnection();

			if (empty($_FILES['t3']['name'])) {
				
				$s="update subcategorias set subcategorias_nombre='" . $_POST["t1"] ."',categorias_id='" . $_POST["t2"] . "',imagen='" . $_POST["h1"] . "',detalles='" . $_POST["t4"] . "' where subcategorias_id='" . $_POST["s1"] . "'";
				
			}
			else
			{
				
					$s="update subcategorias set subcategorias_nombre='" . $_POST["t1"] ."',categorias_id='" . $_POST["t2"] . "',imagen='" .  basename($_FILES["t3"]["name"]) . "',detalles='" . $_POST["t4"] . "' where subcategorias_id='" . $_POST["s1"] . "'";}
				mysqli_query($cn,$s);
				mysqli_close($cn);
				echo "<script>alert('Guardar subcategoria');</script>";
				}
			?>


    <div>
		<div>
			<?php include('../Admin/Sistema.php'); ?>

			<div class="col-sm-9">

				<form method="post" enctype="multipart/form-data">
					<table border="0" width="650px" height="500px" align="center" class="tableshadow">
							<tr><td colspan="2" class="toptd">Modificar Subcategoria</td></tr>
							<tr><td class="lefttxt">Seleccionar Subcategoria</td><td><select name="s1" required/><option value="">Seleccionar</option>

									<?php
									$cn=makeconnection();
									$s="select * from subcategorias";
									$result=mysqli_query($cn,$s);
									$r=mysqli_num_rows($result);
									//echo $r;

									while($data=mysqli_fetch_array($result))
									{
										if(isset($_POST["show"])&& $data[0]==$_POST["s1"])
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
									<input class="btn btn-warning" type="submit" value="Mostrar" name="show" formnovalidate/>
										<?php
										if(isset($_POST["show"]))
											{
											$cn=makeconnection();
											$s="select * from subcategorias where subcategorias_id='" .$_POST["s1"] ."'";
											$result=mysqli_query($cn,$s);
											$r=mysqli_num_rows($result);
											//echo $r;

											$data=mysqli_fetch_array($result);
											$Subcatid=$data[0];
											$Subcatname=$data[1];
											$Catid=$data[2];
											$Pic=$data[3];
											$Detail=$data[4];

											mysqli_close($cn);

											}

										?>

							</td></tr>

							<tr><td class="lefttxt">Nombre subcategoria</td><td><input type="text" value="<?php if(isset($_POST["show"])){ echo $Subcatname ;} ?> " name="t1" required pattern="[a-zA-z1 _]{1,50}" title="Please Enter Only Characters and numbers between 1 to 50 for Subcategory Name" /></td></tr>
							<tr><td class="lefttxt">Seleccionar categoria</td><td><select name="t2"  value="<?php if(isset($_POST["show"])){ echo $Catid ;} ?> " required="required" pattern="[a-zA-z1 _]{1,50}" title"Please Enter Only Characters and numbers between 1 to 50 for Company name"/><option value="Select">Select</option>

							<?php
							$cn=makeconnection();
							$s="select * from categorias";
							$result=mysqli_query($cn,$s);
							$r=mysqli_num_rows($result);
							//echo $r;

							while($data=mysqli_fetch_array($result))
							{
								if(isset($_POST["show"]) && $data[0]==$Catid)
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

							<tr><td class="lefttxt">Imagen anterior</td><td><img src="subcategoria-imagenes/<?php echo @$Pic; ?>" width="150px" height="100px" / >
							<input type="hidden" name="h1" value="<?php if(isset($_POST["show"])) {echo $Pic;} ?>" />
							</td></tr>

							<tr><td class="lefttxt">Selecionar imagen</td><td><input type="file" name="t3" /></td></tr>
							<tr><td class="lefttxt">Detalles</td><td><textarea name="t4" /><?php if(isset($_POST["show"])){ echo $Detail ;} ?></textarea></td></tr>
							<tr><td>&nbsp;</td><td ><input class="btn btn-success" type="submit" value="MODIFICAR" name="sbmt" /></td></tr>

					</table>
				</form>

			</div>
		</div>
	</div>
<?php include('../Admin/Piesistema.php'); ?>




             