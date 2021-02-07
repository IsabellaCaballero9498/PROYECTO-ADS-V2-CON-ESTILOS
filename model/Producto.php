<?php 

    require_once __DIR__."/Conexion.php";


    class Producto{

        public function obtenerProductos(){
            $c = new Conexion();
            $stm = $c->query("SELECT * FROM producto");
            while ( $row = mysqli_fetch_array($stm) ){
                $r[] = $row;
            }
            return $r;
        }

        public function consultarStock($idproducto,$cantidadMax)
        {
            $c = new Conexion();
            $stm = $c->query("SELECT if(stock>0 AND stock >= $cantidadMax, TRUE,FALSE) as verificarStock,stock,nombre,precio FROM producto WHERE idproducto = $idproducto ");
            if ( $row = mysqli_fetch_array($stm) ){
                $r = $row;
            }
            return $r;
            
        }
    
    }
?>