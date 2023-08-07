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
				
				echo "<script>alert('Record Save');</script>";
			}
			?>




<div>
		<div >
			<?php include('../Admin/Sistema.php'); ?>

			 <div class="col-sm-9">

				<form method="post">
					<table border="0" width="400px" height="300px" align="center" class="tableshadow">
							<tr><td class="toptd">Ver categorias</td></tr>
							<tr><td align="center" valign="top" style="padding-top:10px;">
						<table border="0" align="center" width="70%" >
							<tr><td style="font-size:15px; padding:5px; font-weight:bold;">Id categoria</td>
							<td style="font-size:15px; padding:5px; font-weight:bold;">Nombre de la categoria</td></tr>

								<?php

									$s="select * from categorias";
									$result=mysqli_query($cn,$s);
									$r=mysqli_num_rows($result);
									//echo $r;

									while($data=mysqli_fetch_array($result))
									{
										
											echo "<tr><td style=' padding:5px;'>$data[0]</td><td style=' padding:5px;'>$data[1]</td></tr>";

									}

								?>

						</table>
					</td></tr></table>

				</form>
            </div>
		</div>
</div>
<?php include('../Admin/Piesistema.php'); ?>
