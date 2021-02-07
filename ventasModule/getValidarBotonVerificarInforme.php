<?php
$view = $_GET['view'];
if($view != NULL){
    session_start();
    include_once("formListaInforme.php");
    $objForm = new formListaInforme;
    $objForm -> formListaInformeShow();
}else{
    include_once("../shared/formMensajeSistema.php");
    $objMessaje = new formMensajeSistema;
    $objMessaje -> formMensajeSistemaShow("Se ha detectado un acceso no autorizado","../index.php");
}
if(isset($_POST["btnBuscar"]))
{
	include_once("controlVerificarInforme.php");
	$accesoPrincipal = new controlVerificarInforme;
	$accesoPrincipal -> validarBotonVerificarInforme();
}



?>