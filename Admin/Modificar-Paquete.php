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
	$f1=0;
	$f2=0;
	$f3=0;
	
	$target_dir = "paquetes-imagenes/";

	$target_file = $target_dir.basename($_FILES["t4"]["name"]);
	$uploadok = 1;
	$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	
	
	

		if(move_uploaded_file($_FILES["t4"]["tmp_name"], $target_file)){
			$f1=1;
	} 	

	
	
	$target_file = $target_dir.basename($_FILES["t5"]["name"]);
	$uploadok = 1;
	$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	
	
	
	
	

	$target_file = $target_dir.basename($_FILES["t6"]["name"]);
	$uploadok = 1;
	$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	
	
	
	

	if($_FILES["t6"]["size"]>500000){
		echo "sorry, your file is too large.";
		$uploadok=0;
	}
	
	
	else{
		if(move_uploaded_file($_FILES["t6"]["tmp_name"], $target_file)){
			$f3=1;
	} 
	}
}
	 
?>

<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	
	if (empty($_FILES['t3']['name'])) {
	
		$s="update paquetes set nombre_paquete='" . $_POST["t1"] ."',categorias='" . $_POST["t2"] . "',subcategorias='" . $_POST["t3"] . "',precio_paquete='" . $_POST["t8"] . "',imagen1='" . $_POST["h1"] . "',imagen2='" . $_POST["h2"]. "',imagen3='" .$_POST["h3"] . "',detalles='" . $_POST["t7"] . "' where paquete_id='" . $_POST["s1"] . "'";
	
}
else
{
	
	
	$s="update paquetes set nombre_paquete='" . $_POST["t1"] ."',categorias='" . $_POST["t2"] . "',subcategorias='" . $_POST["t3"] . "',precio_paquete='" . $_POST["t8"] . "',imagen1='" . $_POST["h1"] . "',imagen2='" . $_POST["h2"]. "',imagen3='" .$_POST["h3"] . "',detalles='" . $_POST["t7"] . "' where paquete_id='" . $_POST["s1"] . "'";}
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Modificar paquete');</script>";
    }

?>


<div>
	<div>
		<?php include('../Admin/Sistema.php'); ?>
						
		<div class="col-sm-9">
			<form method="post" enctype="multipart/form-data">
				<table border="0" width="800px" height="700px" align="center" class="tableshadow">
						<tr><td colspan="2" class="toptd">Modificar paquete turistico</td></tr>
						<tr><td class="lefttxt">Seleccionar paquete</td><td><select name="s1" required/><option value="">Seleccionar</option>

								<?php
								$cn=makeconnection();
								$s="select * from paquetes";
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
								$s="select * from paquetes where paquete_id='" .$_POST["s1"] ."'";
								$result=mysqli_query($cn,$s);
								$r=mysqli_num_rows($result);
								//echo $r;

								$data=mysqli_fetch_array($result);
								$Packid=$data[0];
								$Packname=$data[1];
								$Category=$data[2];
								$Subcategory=$data[3];
								$Packprice=$data[4];
								$Pic1=$data[5];
								$Pic2=$data[6];
								$Pic3=$data[7];
								$Detail=$data[8];

								mysqli_close($cn);

								}

								?>

								</td></tr>

								<tr><td class="lefttxt">Nombre del paquete</td><td><input type="text"  value="<?php if(isset($_POST["show"])){ echo $Packname ;} ?> " name="t1" /></td></tr>
								<tr><td class="lefttxt">Seleccionar categoria</td><td><select name="t2" required/><option value="">Seleccionar</option>

								<?php
								$cn=makeconnection();
								$s="select * from categorias";
								$result=mysqli_query($cn,$s);
								$r=mysqli_num_rows($result);
								//echo $r;

								while($data=mysqli_fetch_array($result))
								{
									if(isset($_POST["show"])&& $Category==$data[0])
									{
										
										echo "<option value=$data[0] selected='selected' >$data[1]</option>";
									}
									else
									{
										echo "<option value=$data[0]>$data[1]</option>";
									
								}
								}
								mysqli_close($cn);



								?>

								</select>

								<tr><td class="lefttxt">Seleccionar subcategoria</td><td><select name="t3" required/><option value="">Seleccionar</option>

								<?php
								$cn=makeconnection();
								$s="select * from subcategorias";
								$result=mysqli_query($cn,$s);
								$r=mysqli_num_rows($result);
								//echo $r;

								while($data=mysqli_fetch_array($result))
								{
									if(isset($_POST["show"])&& $Subcategory==$data[0])
									{
										
										echo "<option value=$data[0] selected='selected' >$data[1]</option>";
									}
									else
									{
										echo "<option value=$data[0]>$data[1]</option>";
									
								}
								}
								mysqli_close($cn);



								?>

								</select>

						<tr><td class="lefttxt">Precio del paquete</td><td><input type="text" name="t8" value="<?php if(isset($_POST["show"])){ echo $Packprice ;} ?> " /></td></tr>

						<tr><td class="lefttxt">Imagen anterior</td><td><img src="paquetes-imagenes/<?php echo @$Pic1; ?>" width="150px" height="50px" />
						<input type="hidden" name="h1" value="<?php if(isset($_POST["show"])) {echo $Pic1;} ?>" />
						</td></tr>
						<tr><td class="lefttxt">Selecionar imagen1</td><td><input type="file" name="t4"/></td></tr>

						<tr><td class="lefttxt">Imagen anterior</td><td><img src="paquetes-imagenes/<?php echo @$Pic2; ?>" width="150px" height="50px" />
						<input type="hidden" name="h2" value="<?php if(isset($_POST["show"])) {echo $Pic2;} ?>" />
						</td></tr>
						<tr><td class="lefttxt">Seleccionar imagen2</td><td><input type="file" name="t5"/></td></tr>

						<tr><td class="lefttxt">Imagen anterior</td><td><img src="paquetes-imagenes/<?php echo @$Pic3; ?>" width="150px" height="50px" />
						<input type="hidden" name="h3" value="<?php if(isset($_POST["show"])) {echo $Pic3;} ?>" />
						</td></tr>
						<tr><td class="lefttxt">Seleccionar imagen3</td><td><input type="file" name="t6"/></td></tr>

						<tr><td class="lefttxt">Detalles<td><td><textarea name="t7" /><?php if(isset($_POST["show"])){ echo $Detail ;} ?></textarea></td></tr>
						<tr><td>&nbsp;</td><td ><input class="btn btn-success" type="submit" value="MODIFICAR" name="sbmt" /></td></tr>


				</table>
			</form>
		</div>
	</div>
</div>
<?php include('../Admin/Piesistema.php'); ?>



