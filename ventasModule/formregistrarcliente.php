<?php

session_start();

class formRegistrarCliente
{
    public function formRegistrarClienteShow($dni = null,$cliente = null,$message_error = null)
    {
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js" integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw==" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="..assets/sweetalert/dist/sweetalert/dist/sweetalert2.min.css">
            
            <title>Document</title>
        </head>

        <body>
            <div class="container">
                
                    <div class="card m-auto mt-5 border border-2" style="width: 50%;">
                        <h1 style="text-align: center;">REGISTRAR</h1>
                        <form action="controlRegistrarCliente.php" method="POST" class="w-100">
                            <button name="buscar" type="submit" class="btn btn-secondary mb-2 mt-2" style="width: 80%; display: block;margin:auto;">Buscar</button>
                            <br>

                            <div class="m-auto" style="width: 70%;">
                                <span>DNI</span>
                                <input type="number" name="dni" value="<?php  echo $dni!=null?$dni:'' ?>" required  class="form-control">
                                <br>
                                <span>Nombres</span>
                                <input type="text" name="nombre"  value="<?php echo $cliente != null ?$cliente["nombre"] : '' ?>"  <?php echo $cliente!=null?"disabled":"" ?> class="form-control" style="display: inline;" >
                                <br>
                                <span>Apellidos</span>
                                <input type="text" name="apellido" value="<?php echo $cliente != null ?$cliente["apellido"] : '' ?>"  <?php echo $cliente!=null?"disabled":"" ?> class="form-control" style="display: inline;">
                                <br>
                                <span>E-mail</span>
                                <input type="email" name="email" value="<?php echo $cliente != null ?$cliente["email"] : '' ?>" <?php echo $cliente!=null?"disabled":"" ?> class="form-control" style="display: inline;">
                                <br>
                                <span>Dirección</span>
                                <input type="text" name="direccion" value="<?php echo $cliente != null ?$cliente["direccion"] : '' ?>" <?php echo $cliente!=null?"disabled":"" ?> class="form-control" style="display: inline;">
                                <br>
                                <span>Celular</span>
                                <input type="number" name="celular" value="<?php echo $cliente != null ?$cliente["celular"] : '' ?>" <?php echo $cliente!=null?"disabled":"" ?> class="form-control" style="display: inline;">
                                
                            </div >
                            <br>
                            <?php 
                            if($message_error!=null){
                                echo "<p>$message_error</p>";
                            }
                            ?>
                            <button type="submit" name="<?php echo $cliente!=null?'contado':'grabar'?>" <?php  echo $dni!=null?:'disabled'?> value="contado" class="btn btn-success mb-2 mt-2" style="width: 80%; display: block;margin:auto;" >CONTADO</button>
                            <button type="submit" name="<?php echo $cliente!=null?'credito':'grabar'?>" <?php  echo $dni!=null?:'disabled'?> value="credito" class="btn btn-success mb-2 mt-2" style="width: 80%; display: block;margin:auto;" >CRÉDITO</button>
                        </form>
                        <a href="controlRegistrarProducto.php" class="btn btn-danger" style="width: 80%; margin: auto;">Cancelar</a>
                    </div>
            </div>
        </body>
        <script src="..assets/sweetalert/dist/sweetalert2.all.min.js"></script>
        </html> 
<?php
    }
}