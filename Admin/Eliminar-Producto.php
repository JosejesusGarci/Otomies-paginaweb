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
	$s="delete from productos  where id_productos ='" . $_POST["t1"] . "'";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Eliminar producto');</script>";
    }
?>


<div>
	<div>
	   <?php include('../Admin/Sistema.php'); ?>
				
		<div class="col-sm-9">
			<form method="post" enctype="multipart/form-data">
				<table border="0" width="600px" height="400px" align="center" class="tableshadow">
					<tr><td colspan="2" class="toptd">Eliminar producto</td></tr>
					<tr><td class="lefttxt">Seleccionar producto</td><td><select name="t1" required/><option value="">Seleccionar</option>

						<?php
						$cn=makeconnection();
						$s="select * from productos";
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
						<input type="submit" value="Mostrar" name="show" formnovalidate/>
						<?php
						if(isset($_POST["show"]))
						{
						$cn=makeconnection();
						$s="select * from productos where id_productos='" .$_POST["t1"] ."'";
						$result=mysqli_query($cn,$s);
						$r=mysqli_num_rows($result);
						//echo $r;

						$data=mysqli_fetch_array($result);
						$id_productos=$data[0];		
						$Title=$data[1];
						$nombre=$data[2];
						$imagen=$data[3];


						mysqli_close($cn);

						}

						?>

					</td></tr>

					<tr><td class="lefttxt">Nombre del producto</td><td><input type="text"  value="<?php if(isset($_POST["show"])){ echo $nombre ;} ?> " name="t2"  "/></td></tr>

					<tr><td class="lefttxt">Imagen</td><td><img src="productos-imagenes/<?php echo @$imagen; ?>" width="150px" height="100px" /></td></tr>

					<tr><td>&nbsp;</td><td ><input class="btn btn-danger" type="submit" value="ELIMINAR" name="sbmt" /></td></tr>




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
			
	       } else{
			echo "sorry there was an error uploading your file.";
		}}
}
?>



