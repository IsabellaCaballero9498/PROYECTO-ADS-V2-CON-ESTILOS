<?php 
require_once __DIR__."/formRegistarVenta.php";
require_once __DIR__."/../Model/Producto.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
    unset($_SESSION["productos_seleccionados"]);
    $objProducto = new Producto();
    $productos = $objProducto->obtenerProductos();
    $formRegistrarVenta = new formRegistrarVenta();
    $formRegistrarVenta->formRegistrarVentaShow($productos);
}

else if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["agregar"]) AND isset($_POST["cantidadProducto"])){

        $productos = array("idProducto" => $_POST['idProducto'], "nombre" => $_POST['nombreProducto'], "cantidad" => $_POST['cantidadProducto'], "precio"=> $_POST['precio']);
        
        $objProducto = new Producto();
        $verificarStock = $objProducto->consultarStock($productos["idProducto"],$productos["cantidad"]);

        if($verificarStock["verificarStock"]=="1") {
            if (empty($_SESSION["productos_seleccionados"])) {
                $i = 0;
                $_SESSION["productos_seleccionados"][$i] = $productos;
            } else {
                $i = count($_SESSION["productos_seleccionados"]);
                $i++;
                $_SESSION["productos_seleccionados"][$i] = $productos;
            }
        }
        
        $objProducto = new Producto();
        $productos = $objProducto->obtenerProductos();
        $fila = $objProducto->consultarStock($_POST["idProducto"], $_POST["cantidadProducto"]);
        $formRegistrarVenta = new formRegistrarVenta();
        $formRegistrarVenta->formRegistrarVentaShow($productos);

    } elseif(isset($_POST["eliminar"])) {

        $filaProducto = $_POST['filaProducto'];
        array_splice($_SESSION['productos_seleccionados'], $filaProducto-1,1);

        $objProducto = new Producto();
        $productos = $objProducto->obtenerProductos();
        $formRegistrarVenta = new formRegistrarVenta();
        $formRegistrarVenta->formRegistrarVentaShow($productos);
        
    } elseif(isset($_POST["cancelar"])){
        // session_start();
        unset($_SESSION["productos_seleccionados"]);
        $objProducto = new Producto();
        $productos = $objProducto->obtenerProductos();
        $formRegistrarVenta = new formRegistrarVenta();
        $formRegistrarVenta->formRegistrarVentaShow($productos);
        
    }
}
