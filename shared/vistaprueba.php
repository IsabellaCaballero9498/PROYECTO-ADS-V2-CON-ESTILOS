<?php 
	class vistaprueba{

		public function vistapruebashow(){
			session_start();
			?>
			
			
			<p>HOLA YA REGISTRASTE TU VENTA</p>
			<form action="../VentasModule/controlRegistrarVenta.php" method="POST">
				<input type="submit" name="cancelar" value="VOLVER AL INICIO">
			</form>
			<a href="../ventasModule/boletaElectronica.php" class="btn btn-primary">imprimir boleta</a>
<?php
		}
	}
 ?>