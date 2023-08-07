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
				<table border="0" width="700px" height="500px" align="center" class="tableshadow">
					<tr><td colspan="2" class="toptd">Añadir producto</td></tr>
					<tr><td class="lefttxt">Nombre del producto</td><td><input type="text" name="t1" /></td></tr>
					<tr><td class="lefttxt">Precio del producto</td><td><input type="text" name="t2" /></td></tr>
					<tr><td class="lefttxt">Imagen del producto</td><td><input type="file" name="t3"/></td></tr>
					<tr><td class="lefttxt">Detalles del producto</td><td><textarea name="t4"/></textarea></td></tr>
					<tr><td>&nbsp;</td><td ><input  class="btn btn-success" type="submit" value="AGREGAR" name="sbmt" /></td></tr>
				</table>
			</form>
		</div>


	</div>

	<?php include('../Admin/Piesistema.php'); ?>

					<?php
					if(isset($_POST["sbmt"]))
					{
						$cn=makeconnection();
						
						$target_dir = "productos-imagenes/";
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
						
						
						
						
				
						if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
							echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
							$uploadok=0;
						}else{
							if(move_uploaded_file($_FILES["t3"]["tmp_name"], $target_file)){
								
						
						
						$s="insert into productos(nombre,precio,imagen,detalles) values('" . $_POST["t1"] ."','" . $_POST["t2"] . "','" . basename($_FILES["t3"]["name"]) . "','" . $_POST["t4"] ."')";
						mysqli_query($cn,$s);
						mysqli_close($cn);
						echo "<script>alert('Guardar producto');</script>";
						
						
							} else{
								echo "sorry there was an error uploading your file.";
							}}
					}
					?>


