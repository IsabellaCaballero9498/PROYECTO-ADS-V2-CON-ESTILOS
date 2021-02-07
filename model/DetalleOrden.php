<?php

class DetalleOrden {

    public function insertarDetallesOrden($idOrden,$arrayProductos = []) {
        $c = new Conexion();
        foreach($arrayProductos as $producto) {
            $query = "INSERT INTO detalle_orden (`idorden`, `idproducto`,`cantidad`) 
                VALUES ($idOrden,$producto[idProducto],$producto[cantidad])";
            $c->query($query);

        }
    }
}