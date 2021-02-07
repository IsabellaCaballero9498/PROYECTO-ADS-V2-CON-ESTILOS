<?php
class formMensaje
{
	public function formMensajeShow($mensaje, $link)
	{
		
?>
		<!DOCTYPE html>
		<html>

		<head>
			<title>Mensaje</title>
			<!-- Bootstrap CSS -->
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
			<link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;600&display=swap" rel="stylesheet">
		</head>

		<body>
			<h2>
			<center><?php echo strtoupper($mensaje); ?></center>
			</h2>
			<br>
			
			<?php
			if (empty($link)) {
				?>	
					
						<p align="center">
						<a type="button" class="btn btn-success" href="../ventasModule/getValidarBotonVerificarInforme.php?view=listaform">Actualizar</a>
						</p>
						
					
				<?php
				} else {
					?><p align="center">
					<?php echo $link ?>
				</p><?php
					}
					?>

		</body>

		</html>
<?php
	}
}
?>