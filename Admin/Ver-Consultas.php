<?php if(!isset($_SESSION)) { session_start(); } ?>


<?php
if($_SESSION['loginstatus']=="")
{
	header("location:loginform.php");
}
?>


<?php include('../Admin/function.php'); ?>

<div>

	<?php include('../Admin/Sistema.php'); ?>

	<div class="col-sm-9">


		<form method="post">
			<table border="0" width="110%" height="1100px" align="center" class="tableshadow">
				<tr><td class="toptd">Ver consultas</td></tr>
				<tr><td align="center" valign="top" style="padding-top:10px;">
					<table border="0" align="center" width="100%">
						<tr><td style="font-size:15px; padding:7px; font-weight:bold;" >Nombre del paquete turistico</td>
						<td style="font-size:15px; padding:7px; font-weight:bold; ">Id paquete</td>
						<td style="font-size:15px; padding:7px; font-weight:bold;">Nombre</td>
						<td style="font-size:15px; padding:7px; font-weight:bold;">Genero</td>
						<td style="font-size:15px; padding:7px; font-weight:bold;">Numero de telefono</td>
						<td style="font-size:15px; padding:7px; font-weight:bold;">Correo electronico</td>
						<td style="font-size:15px; padding:7px; font-weight:bold;">No. de dias</td>
						<td style="font-size:15px; padding:7px; font-weight:bold;">No. de menores</td>
						<td style="font-size:15px; padding:7px; font-weight:bold;">no. de adultos</td>
						<td style="font-size:15px; padding:7px; font-weight:bold;">Estado del paquete</td></tr>


						<?php

						$s="select * from consultas,paquetes where consultas.paquete_id=paquetes.paquete_id";
						$result=mysqli_query($cn,$s);
						$r=mysqli_num_rows($result);
						//echo $r;

						while($data=mysqli_fetch_array($result))
						{

							
								echo "<td style=' padding:5px;'>$data[12]</td>
								<td style=' padding:5px;'>$data[1]</td>
								<td style=' padding:5px;'>$data[2]</td>
								<td style=' padding:5px;'>$data[3]</td>
								<td style=' padding:5px;'>$data[4]</td>
								<td style=' padding:5px;'>$data[5]</td>
								<td style=' padding:5px;'>$data[6]</td>
								<td style=' padding:5px;'>$data[7]</td>
								<td style=' padding:5px;'>$data[8]</td>
								<td style=' padding:5px;'><a href='chstatus.php?eid=$data[0]'>$data[10]</a></td>
								</tr>";

						}

						?>

					</table>
			</td></tr></table>

		</form>
	</div>
</div>

<?php include('../Admin/Piesistema.php'); ?>