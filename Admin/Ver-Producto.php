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
			<form method="post">
				<table border="0" width="800px" height="800px" align="center" class="tableshadow">
					<tr><td class="toptd">Ver productos</td></tr>
					<tr><td align="center" valign="top" style="padding-top:10px;">
						<table border="0" align="center" width="90%" >
							<tr><td style="font-size:15px; padding:5px; font-weight:bold;">Id</td>
							<td style="font-size:15px; padding:5px; font-weight:bold;">Nombre del producto</td>
							<td style="font-size:15px; padding:5px; font-weight:bold;">Precio</td>
							<td style="font-size:15px; padding:5px; font-weight:bold;">Imagen</td></tr>

							<?php
							$cn=mysqli_connect("localhost","root","","otomies");
							$s="select * from productos";
							$result=mysqli_query($cn,$s);
							$r=mysqli_num_rows($result);
							//echo $r;

							while($data=mysqli_fetch_array($result))
							{
								
									echo "<tr><td style=' padding:5px;'>$data[0]</td><td style=' padding:5px;'>$data[1]</td><td style=' padding:5px;'>$data[2]</td><td style=' padding:5px;'><img src='productos-imagenes/$data[3]' style='height:50px' /></td></tr>";

							}
							mysqli_close($cn);



							?>

						</table>
				</td></tr></table>

			</form>
		</div>
	</div>
</div>
<?php include('../Admin/Piesistema.php'); ?>
