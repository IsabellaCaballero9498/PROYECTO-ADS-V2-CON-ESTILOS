<?php
class formListaOrden
{
	public function formListaOrdenesShow($respuesta,$idinforme)
	{
		include_once("../securityModule/formBienvenida.php");
        $obj = new formBienvenida();
        $obj->formBienvenidaShow();
?>
		<!DOCTYPE html>
		<html>

		<head>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
			<title>Lista Boletas</title>
		</head>

		<body>
			<h1 align="center"> Informe <?php echo $idinforme?> </h1>
			<?php $total = 0; ?>
			<form method="post" action="getValidarBotonInforme.php?idinforme=<?php echo $idinforme?>">
				<div align="center">
					<table style="width:400px" border="2" class="table">
						<thead>
							<tr>
								<td>Orden</td>
								<td>Monto</td>
							</tr>
						</thead>


						<?php

						$a = count($respuesta);
						for ($i = 0; $i < $a; $i++) {
						?>
							<tr>

								<td>Orden #<?php echo $respuesta[$i]['0'] ?></td>
								<td><?php echo $respuesta[$i]['1'] ?></td>
								<?php $total = $total + $respuesta[$i]['1']; ?>
							<?php
						}
							?>

							</tr>
					</table>
					<h2> Suma de Boletas: <?php echo $total; ?></h2>
					
					<br></br>
					<?php
					echo "<input type='button' class ='btn btn-danger' value='Salir' onClick='history.go(-1);'>";
					?>
					<button type="submit" class="btn btn-success" id="btnInformeAceptado" name="btnInformeAceptado">Informe Aceptado</button>
					
					<button type="submit" class="btn btn-warning" id="btnInformeObservado" name="btnInformeObservado">Informe Observado</button>
				</div>

			</form>
		</body>

		</html>
<?php
	}
}
?>