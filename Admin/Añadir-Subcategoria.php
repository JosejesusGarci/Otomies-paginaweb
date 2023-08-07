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
					<table border="0" width="400px" height="300px" align="center" class="tableshadow">
						<tr><td colspan="2" class="toptd">Agregar subcategoria</td></tr>
						<tr><td class="lefttxt">Nombre subcategoria</td><td><input type="text" name="t1" required pattern="[a-zA-z _]{2,50}" title"Please Enter Only Characters between 2 to 50 for Subcategory name"/></td></tr>
						<tr><td class="lefttxt">Seleccionar categoria</td><td><select name="t2" required/><option value="">Seleccionar</option>

								<?php
								$cn=makeconnection();
								$s="select * from categorias";
								$result=mysqli_query($cn,$s);
								$r=mysqli_num_rows($result);
								//echo $r;

								while($data=mysqli_fetch_array($result))
								{
									
										echo "<option value=$data[0]>$data[1]</option>";
									
								}
								?>

						</select>
						<tr><td class="lefttxt">Selecionar imagen</td><td><input type="file" name="t3" /></td></tr>
						<tr><td class="lefttxt">Detalles</td><td><textarea name="t4"/></textarea></td></tr>
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
						
						$target_dir = "subcategoria-imagenes/";
						$target_file = $target_dir.basename($_FILES["t3"]["name"]);
						$uploadok = 1;
						$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
						
						$check=getimagesize($_FILES["t3"]["tmp_name"]);
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
						
					
						if($_FILES["t3"]["size"]>500000){
							echo "sorry, your file is too large.";
							$uploadok=0;
						}
						
						
						if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
							echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
							$uploadok=0;
						}else{
							if(move_uploaded_file($_FILES["t3"]["tmp_name"], $target_file)){
								
						
						
						$s="insert into subcategorias(subcategorias_nombre,categorias_id,imagen,detalles) values('" . $_POST["t1"] ."','" . $_POST["t2"] . "','" . basename($_FILES["t3"]["name"]) . "','" . $_POST["t4"] ."')";
						mysqli_query($cn,$s);
						
						echo "<script>alert('Anadir subcategoria');</script>";
						
						
							} else{
								echo "sorry there was an error uploading your file.";
							}}
					}
					?>



