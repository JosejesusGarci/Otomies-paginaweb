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
	$s="delete from paquetes  where paquete_id='" . $_POST["t1"] . "'";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Eliminar paquete');</script>";
    }
?>




<div>
	<div>
		<?php include('../Admin/Sistema.php'); ?>
				
			<div class="col-sm-9">

				<form method="post" enctype="multipart/form-data">
					<table border="0" width="500px" height="350px" align="center" class="tableshadow">
						<tr><td colspan="2" class="toptd">Eliminar paquete turistico</td></tr>
						<tr><td class="lefttxt">Seleccionar paquete</td><td><select name="t1" required/><option value="">Select</option>

								<?php
								$cn=makeconnection();
								$s="select * from paquetes";
								$result=mysqli_query($cn,$s);
								$r=mysqli_num_rows($result);
								//echo $r;

								while($data=mysqli_fetch_array($result))
								{
										
											echo "<option value=$data[0]>$data[1]</option>";
										
									
								}
								mysqli_close($cn);
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




             