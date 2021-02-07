<?php
session_start();

class formRegistrarVenta
{
    public function formRegistrarVentaShow($productos, $fila = null){
        session_start();
    include_once "controllerResumenVentas.php";
    include_once("../securityModule/formBienvenida.php");
    $obj = new formBienvenida();
    $obj->formBienvenidaShow();
    { ?>
        

        <body>
            <div class="container mt-5 center">
                <h1>Formulario registrar Venta</h1>
                <?php
                    if(isset($_SESSION["productos_seleccionados"]) && !empty($_SESSION["productos_seleccionados"])) {
                        ?>
                            <h3>Lista de productos agregados</h3>
                            <table class="table w-50">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Acciones</th>
                                        </tr>
                
                                    </thead>
                                    <tbody>
                                        <?php
                
                                        $total = 0;
                                        $fila = 1;
                                        foreach ($_SESSION["productos_seleccionados"] as $producto) {
                                            
                                            echo "<form action='controlRegistrarVenta.php' method=POST>
                                            <tr>";
                                            echo "<td><input type=number value=$fila name='filaProducto' readonly></td>";
                                            echo "<td>" . $producto['nombre'] . "</td>";
                                            echo "<td>" . $producto["cantidad"] . "</td>";
                                            echo "<td>". $producto["precio"] * $producto["cantidad"] ."</td>";
                                            echo "<td><input type=submit value='eliminar' name='eliminar'></td>";
                                            echo "</tr>
                                            </form>";
                                            $total += $producto["precio"] * $producto["cantidad"];
                                            $fila++;
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2" style="text-align: center;font-weight: bold;">Total</td>
                                            <td><?php echo $total; ?></td>
                                        </tr>
                                    </tfoot>
                            </table>
                        <?php
                    }
                ?>
               
                    </section>
                    <br>
                    </div >
                    <div class="container">
                        
                        <form action="controlRegistrarVenta.php" method="post">
                            <button type="submit" name="cancelar" class="btn btn-danger" <?php  echo isset($_SESSION["productos_seleccionados"]) ? "":"" ?>>Cancelar</button>
                        </form>
                    </div>
                    <?php 
                    echo "<div class='container'>";
                    if( isset($_SESSION["productos_seleccionados"]) && !empty($_SESSION["productos_seleccionados"]) ){

                        ?>
              <!--       <a href="../Controlador/controlRegistrarCliente.php?op=contado" class="btn btn-primary">CONTADO</a> -->
                        <a href="controlRegistrarCliente.php?op=siguiente01" class="btn btn-secondary">SIGUIENTE</a>
                        
                        <?php 
                        
                    }
                    echo "</div'>"
                    ?>

                    <h3>Lista de productos</h3>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Descripcion</th>
                                        <th>Cantidad</th>
                                        <!-- <th>Imagen</th> -->
                                        <th>Accion</th>
                                    </tr>
                
                                </thead>
                                <tbody>
                                    <?php
                
                                    $total = 0;
                                    foreach ($productos as $producto) {
                                        
                                        echo "<form action='controlRegistrarVenta.php' method=POST>
                                        <tr>
                                        <input name='idProducto' value='$producto[idproducto]' hidden>";
                                        echo "<td><input name='nombreProducto' value='$producto[nombre]' readonly></td>";
                                        echo "<td><input type=number name='precio' value=$producto[precio] readonly></td>";
                                        echo "<td>" . $producto["descripcion"] . "</td>";
                                        echo "<td><input type=number name=cantidadProducto min=1 value=1></td>";
                                        // echo "<td>" . $producto['imagen'] . "</td>";
                                        echo "<td><input type=submit value='agregar' name='agregar'></td>";
                                        echo "</tr>
                                        </form>";
                                    }
                                    
                                    ?>
                                </tbody>
                            </table>

        </body>
        </html>
    <?php
        include_once("../shared/pie.php");
    }
    }

}

?>