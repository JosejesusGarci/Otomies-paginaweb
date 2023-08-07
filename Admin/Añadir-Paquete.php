<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php
if($_SESSION['loginstatus']=="")
{
	header("location:loginform.php");
}
?>

<?php include('../Admin/function.php'); ?>



	<div>
		<div>
			<?php include('../Admin/Sistema.php'); ?>
				<div class="col-sm-9">

					<form method="post" enctype="multipart/form-data">
						<table border="0" width="550px" height="650px" align="center" class="tableshadow">
								<tr><td colspan="2" class="toptd">Añadir paquete turistico</td></tr>
								<tr><td class="lefttxt">Nombre del paquete turistico</td><td><input type="text" name="t1" required pattern="[a-zA-z _]{3,50}" title"Please Enter Only Characters between 3 to 50 for Package Name" /></td></tr>
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
											echo "<option value=$data[0] selected='selected'>$data[1]</option>";
									}
									else
									{
										echo "<option value=$data[0]>$data[1]</option>";
									}
								}



								?>

								</select>
									<input  class="btn btn-warning" type="submit" value="Mostrar" name="show" formnovalidate/>

								<tr><td class="lefttxt">Seleccionar subcategoria</td><td><select name="t3" required/><option value="">Seleccionar</option>

								<?php
								$cn=makeconnection();
								$s="select * from subcategorias";
								$result=mysqli_query($cn,$s);
								$r=mysqli_num_rows($result);
								//echo $r;

								while($data=mysqli_fetch_array($result))
								{
									if(isset($_POST["show"]))
									{
									if($data[2]==$_POST["t2"])
									{
										echo"<option value=$data[0] >$data[1]</option>";
									}
									else
									{
									//	echo "<option value=$data[0]>$data[1]</option>";
									}
									}
								}



								?>

								</select>

									<tr><td class="lefttxt">Precio del paquete</td><td><input type="text" name="t8" /></td></tr>
									<tr><td class="lefttxt">Agregar imagen1</td><td><input type="file" name="t4" /></td></tr>
									<tr><td class="lefttxt">Agregar imagen2</td><td><input type="file" name="t5" /></td></tr>
									<tr><td class="lefttxt">Agregar imagen3</td><td><input type="file" name="t6" /></td></tr>
									<tr><td class="lefttxt">Detalles</td><td><textarea name="t7"></textarea></td></tr>
									<tr><td>&nbsp;</td><td ><input class="btn btn-success" type="submit" value="GUARDAR" name="sbmt" /></td></tr>

						</table>
					</form>

				</div>
		</div>
	</div>
								
	<?php include('../Admin/Piesistema.php'); ?>

								<?php
								if(isset($_POST["sbmt"]))
								{
									$cn=makeconnection();
									$f1=0;
									$f2=0;
									$f3=0;
									
									$target_dir = "paquetes-imagenes/";
								
									$target_file = $target_dir.basename($_FILES["t4"]["name"]);
									$uploadok = 1;
									$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
								
									$check=getimagesize($_FILES["t4"]["tmp_name"]);
									if($check!==false) {
										echo "file is an image - ". $check["mime"]. ".";
										$uploadok = 1;
									}else{
										echo "file is not an image.";
										$uploadok=0;
									}
									
									
									
									if(file_exists($target_file)){
										echo "sorry,file already exists.";
										$uploadok=0;
									}
									
								
									if($_FILES["t4"]["size"]>500000){
										echo "sorry, your file is too large.";
										$uploadok=0;
									}
									
									
								
									if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
										echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
										$uploadok=0;
									}else{
										if(move_uploaded_file($_FILES["t4"]["tmp_name"], $target_file)){
											$f1=1;
									} else{
											echo "sorry there was an error uploading your file.";
										}
									}
									
									
								
									$target_file = $target_dir.basename($_FILES["t5"]["name"]);
									$uploadok = 1;
									$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
									
									$check=getimagesize($_FILES["t5"]["tmp_name"]);
									if($check!==false) {
										echo "file is an image - ". $check["mime"]. ".";
										$uploadok = 1;
									}else{
										echo "file is not an image.";
										$uploadok=0;
									}
									
									
								
									if(file_exists($target_file)){
										echo "sorry,file already exists.";
										$uploadok=0;
									}
									
									
									if($_FILES["t5"]["size"]>500000){
										echo "sorry, your file is too large.";
										$uploadok=0;
									}
									
									
									
									if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
										echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
										$uploadok=0;
									}else{
										if(move_uploaded_file($_FILES["t5"]["tmp_name"], $target_file)){
											$f2=1;
									} else{
											echo "sorry there was an error uploading your file.";
										}
									}
									//t6
									$target_file = $target_dir.basename($_FILES["t6"]["name"]);
									$uploadok = 1;
									$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
									
									$check=getimagesize($_FILES["t6"]["tmp_name"]);
									if($check!==false) {
										echo "file is an image - ". $check["mime"]. ".";
										$uploadok = 1;
									}else{
										echo "file is not an image.";
										$uploadok=0;
									}
									
									
								
									if(file_exists($target_file)){
										echo "sorry,file already exists.";
										$uploadok=0;
									}
									
									
									if($_FILES["t6"]["size"]>500000){
										echo "sorry, your file is too large.";
										$uploadok=0;
									}
									
									
									if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
										echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
										$uploadok=0;
									}else{
										if(move_uploaded_file($_FILES["t6"]["tmp_name"], $target_file)){
											$f3=1;
									} else{
											echo "sorry there was an error uploading your file.";
										}
									}
									
										if($f1>0&& $f2>0&&$f3>0)
										{
									
									$s="insert into paquetes(nombre_paquetes,categorias,subcategorias,precio_paquete,imagen1,imagen2,imagen3,detalles) values('" . $_POST["t1"] ."','" . $_POST["t2"] . "','" . $_POST["t3"] ."','". $_POST["t8"] . "','" . basename($_FILES["t4"]["name"]) . "','" . basename($_FILES["t5"]["name"]) . "','" . basename($_FILES["t6"]["name"]) . "','" . $_POST["t7"] ."')";
									mysqli_query($cn,$s);
									mysqli_close($cn);
									echo "<script>alert('Guardar paquete');</script>";
										}
										
								}
								?>



