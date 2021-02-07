<?php
    class formBalancePDF{
        public function formBalancePDFShow($array){
            session_start();
            include_once("../securityModule/formBienvenida.php");
        $obj = new formBienvenida();
        $obj->formBienvenidaShow();
            
?>  

<h2>BALANCE DE VENTAS</h2>
<script>
        document.getElementById("ventas").onclick = function() {ventas()};
        function ventas() {
            var n1 = parseInt(document.formNuevo.llevados.value);
            var n2 = parseInt(document.formNuevo.ventas.value);
            document.formNuevo.eficiencias.value=((n2*100)/n1);
        }
    </script>
<form action="generarBoleta.php" name="formNuevo" method="post">

        <div>
        <table class="table table-striped">
            <tbody>
                <tr>
                <td>
                <label for="">Cantidad de productos Llevados a zona</label>
                </td>
                
                <td>
                <input type="text" name="llevados" value="<?php echo $array["sum(cantprodllevados)"]?>" readonly><br>
                </td>
                </tr>
                <tr> 
                <td>
                    <label for="">Cantidad de productos Perdidos</label>
                </td>
                
                <td>
                <input type="text" name="perdidos" value="<?php echo $array["sum(cantprodperdidos)"]?>" readonly><br>
                </td>
                </tr>

                <tr> 
                <td>
                <label for="">Cantidad de productos regresados a almacen</label>
                </td>
                
                <td>
                <input type="text" name="retornados" value="<?php echo $array["sum(cantprodretornados)"]?>" readonly><br>
                </td>
                </tr>
                <tr> 
                <td>
                <label for="">Cantidad Total de productos vendidos</label>
                </td>
                
                <td onclick="ventas()">
                <input type="text" name="ventas" value="<?php echo $array["sum(totalventas)"]?>" onclick="ventas()" readonly><br>
                </td>
                </tr>
                </tr>
                <tr> 
                <td>
                <label for="">Porcentaje de eficiencia</label>
                </td>
                
                <td>
                <input type="text" name="eficiencias"  readonly><br>
                </td>
                </tr>
            </tbody>
        </table>
           
            
            
            
            
            
            
            
        </div><br>
        
                
        </form>

        <input type="button" value="Grabar Venta" onclick="window.print();" class="btn btn-success mb-2 mt-2" style="width: 25%;">    

        <a href="../ventasModule/getResumenVentas.php?view=editarResVen"><input type='button' class ='btn btn-danger' value='Salir' onClick='history.go(-1);'></a>



<?php
include_once("../shared/pie.php");

        }

    }


?>