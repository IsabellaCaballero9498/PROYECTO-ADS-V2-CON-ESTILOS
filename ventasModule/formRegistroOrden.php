<?php
session_start();
class formRegistroOrden
{


    public function formRegistroOrdenShow($trabajadores,$tipoOrden)
    {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js" integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw==" crossorigin="anonymous"></script>

        </head>
       <?php 
       $tot=0;
       foreach ($_SESSION['productos_seleccionados'] as $key => $value) {
        $tot=$tot+$value['precio'] * $value['cantidad'];
       }
        ?>
        <body>
            <div class="container">
            
                <div class="card m-auto mt-5 border border-2" style="width: 55%;">
                    <h1 style="text-align: center;">Registro Orden</h1>

                    <?php
                        if($tipoOrden=="credito") {
                    ?>
                    <form action="controlRegistrarOrden.php" method="POST" onSubmit="return confirm('¿Seguro que quieres continuar?')">
                        <div class="m-auto mt-2 mb-2" style="width: 75%;">
    
                            <span>Dia de visita</span>
                            <select name="diavisita" id="" class="form-select">
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miercoles">Miercoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sabado">Sabado</option>
                                <option value="Domingo">Domingo</option>
                            </select>
                            <br>
                            <span>Cobrador</span>
                            <select name="trabajador" id="" class="form-select">
                                <?php
                                foreach ($trabajadores as $trabajador)
                                    echo '<option value="' . $trabajador["idtrabajador"] . '" >' . $trabajador["nombre_cargo"] . '</option>';
    
                                $total = 0;
                                foreach ($_SESSION["productos_seleccionados"] as $producto => $arr) {
                                    $total += $arr["precio"];
                                }
                                $month = date('m');
                                $day = date('d');
                                $year = date('Y');
    
                                $today = $year . '-' . $month . '-' . $day;
    
                                ?>
                            </select>
                            <br>
                            <input type="hidden" name="total" value="<?php echo $tot ?>">
                            <span>Cantidad de cuota</span>
                            <select name="cantidadcuota" id="cantidadCuota" class="form-select">
                                <option value="2">2 semanas</option>
                                <option value="3">3 semanas</option>
                                <option value="4">4 semanas</option>
                            </select>
                            <br>
                            <span>Fecha</span>
                            <input type="date" value="<?php echo $today; ?>" id="date" name="fecha" readonly>
                            <br>
                            <span>Cuota</span>
                            <input type="text" name="cuota" value="<?php echo round((float)($tot / 2), 2); ?>" id="cuota" class="form-control">
                            <br>
                    <?php //var_dump($_SESSION['productos_seleccionados']) ?>
                        </div>
                        <button type="submit" name="guardarOrden" class="btn btn-success mb-2 mt-2" style="width: 80%;display: block;margin:auto; ">Guardar Registro de Orden</button>
                    </form>
                    <?php
                    } elseif($tipoOrden=="contado") {
                        ?>
                    <form action="controlRegistrarOrden.php" method="POST" onSubmit="return confirm('¿Seguro que quieres continuar?')">
                        <div class="m-auto mt-2 mb-2" style="width: 75%;">
                            <input name="trabajador" value="3" hidden>
                            <br>
                            <span>Fecha</span>
                            <?php 
                                $month = date('m');
                                $day = date('d');
                                $year = date('Y');
    
                                $today = $year . '-' . $month . '-' . $day;
                            ?>
                            <input type="date" value="<?php echo $today; ?>" id="date" name="fecha" readonly>
                            <br>
                            <span>Monto</span>
                            <input type="text" name="total" value="<?php echo $tot ?>" class="form-control" readonly>
                            <br>
                    <?php //var_dump($_SESSION['productos_seleccionados']) ?>
                        </div>
                        <input type="text" name="tipoOrden" value="contado" hidden readonly>
                        <button type="submit" name="guardarOrden" class="btn btn-success mb-2 mt-2" style="width: 80%;display: block;margin:auto; ">Guardar Registro de Orden</button>
                    </form>
                        <?php
                    }
                    ?>
                 <a href="controlRegistrarCliente.php?op=siguiente01" class="btn btn-secondary" style="width: 80%;margin: auto;">Atras</a>
                </div>
            </div>

            <script>
                let tot = +"<?php echo $tot ?>";
                const cantidadCuota = document.getElementById("cantidadCuota");
                cantidadCuota.addEventListener('change', event => {
                    document.getElementById('cuota').value = Math.round(tot / event.target.value * 100) / 100;
                });
            </script>
        </body>
        </html>
<?php
    }
} ?>