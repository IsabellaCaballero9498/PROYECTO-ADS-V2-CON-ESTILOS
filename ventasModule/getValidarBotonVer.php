<?php
$id=$_GET['idinforme'];
if(isset($id)){
    session_start();
    
	$idinforme = $_GET["idinforme"];
	include_once("controlVerificarInforme.php");
	$accesoVer = new controlVerificarInforme;
	$accesoVer -> ValidarBotonVerInforme($idinforme);
}else{
    include_once("../shared/formMensajeSistema.php");
    $objMessaje = new formMensajeSistema;
    $objMessaje -> formMensajeSistemaShow("Se ha detectado un acceso no autorizado","../index.php");
}

?>
