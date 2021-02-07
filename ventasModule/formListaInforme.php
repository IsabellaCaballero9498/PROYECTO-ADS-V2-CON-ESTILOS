<?php
    class formListaInforme{
        public function formListaInformeShow(){
            include_once("../securityModule/formBienvenida.php");
        $obj = new formBienvenida();
        $obj->formBienvenidaShow();
?>


<!DOCTYPE html>
<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<title>Lista Informes</title>
</head>

<body>
	<h1 align="center"> Informes </h1>
	<!--<form method="post" action="getValidarBotonVer.php">-->

	<div align="center">
		<form method="POST" action="#">
			<input name="fecha" type="date" min="2015-02-20">
			<input type="submit" value="Buscar" name="btnBuscar">
		</form>

		<br></br>
		<?php
		if (isset($_POST['btnBuscar'])) {
			echo $_POST['fecha'];
			$idfecha = $_POST['fecha'];
		?>
			<form>

				<table style="width:400px" border="2" class="table">
					<thead>
						<tr>
							<td>Informe</td>
							<td>Estado</td>
							<td>Boton</td>
						</tr>
						<?php
						include_once('../model/conexion.php');

						$resultado = mysqli_query($instancia, "SELECT DISTINCT i.idinforme, i.estado FROM informe i, orden o, detalleinforme d WHERE o.idorden = d.idorden AND d.idinforme=i.idinforme AND o.fechaventa = '$idfecha'");
						?>
					</thead>

					<?php
					while ($consulta = mysqli_fetch_array($resultado)) {
						$idinfor = $consulta['idinforme'];
						$estado = $consulta['estado'];
					?>
						<tr>
							<th scope="row"><?php echo $idinfor ?></td>
							<?php
							if($estado=="2"){
								$state="Vacio";
							}
							switch ($estado) {
								case '0':
									$state="Observado";
									break;
								case '1':
									$state="Aceptado";
									break;
								case '2':
									$state="Vacio";
									break;
							}
							?>
							<td><?php echo $state ?></td>
							<td>
							
							<a class="btn btn-primary" href="getValidarBotonVer.php?idinforme=<?php echo $idinfor ?>">Ver</a>
							
							</td>
					<?php
					}
					?>
					</tr>
				</table>
				<div class="d-grid gap-2 col-2 mx-auto">
					<?php
					//echo "<input size='' type='button' class ='btn btn-danger btn-lg' value='Salir' onClick='history.go(-1);'>";
					?>
			</form>
	</div>
<?php
		}
?>



</div>

</body>

</html>

<?php
		}
	}
?>