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
	$s="insert into categorias(categorias_nombre) values('" . $_POST["t1"] ."')";
	mysqli_query($cn,$s);
	
	echo "<script>alert('Ver paquete');</script>";
}
?>
<div>
	<div>
		<?php include('../Admin/Sistema.php'); ?>
			
			<div class="col-sm-9">
				<form method="post">
					<table border="0" width="90%" height="600px" align="center" class="tableshadow">
						<tr><td class="toptd">Ver paquete turistico</td></tr>
						<tr><td align="center" valign="top" style="padding-top:10px;">
						  	<table border="0" align="center" width="95%" >
								<tr><td style="font-size:15px; padding:5px; font-weight:bold;">Id</td>
								<td style="font-size:15px; padding:5px; font-weight:bold;">Nombre del paquete turistico</td>
								<td style="font-size:15px; padding:5px; font-weight:bold;">Categoria</td>
								<td style="font-size:15px; padding:5px; font-weight:bold;">Subcategoria</td>
								<td style="font-size:15px; padding:5px; font-weight:bold;">Precio</td>
								<td style="font-size:15px; padding:5px; font-weight:bold;">Imagen1</td>
								<td style="font-size:15px; padding:5px; font-weight:bold;">Imagen2</td>
								<td style="font-size:15px; padding:5px; font-weight:bold;">Imagen3</td></tr>

									<?php

									$s="select * from paquetes";
									$result=mysqli_query($cn,$s);
									$r=mysqli_num_rows($result);
									//echo $r;

									while($data=mysqli_fetch_array($result))
									{
										
											echo "<tr><td style=' padding:5px;'>$data[0]</td>
											<td style=' padding:5px;'>$data[1]</td>
											<td style=' padding:5px;'>$data[2]</td>
											<td style=' padding:5px;'>$data[3]</td>
											<td style=' padding:5px;'>$data[4]</td>
											<td style=' padding:5px;'><IMG src='paquetes-imagenes/$data[5]' style='height:50PX' /></td>
											<td style=' padding:5px;'><IMG src='paquetes-imagenes/$data[6]' style='height:50PX' /></td>
											<td style=' padding:5px;'><IMG src='paquetes-imagenes/$data[7]' style='height:50PX' /></td></tr>";

									}


									?>

							</table>
					</td></tr></table>

				</form>
			</div>
	</div>
</div>
<?php include('../Admin/Piesistema.php'); ?>
