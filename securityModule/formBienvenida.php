<?php
  //formBienvenida
  class formBienvenida{
      public function formBienvenidaShow(){
       include("../shared/cabecera.php");
          ?>  
<br>    
<?php 

if ($_SESSION['idcargo']==1) {
    ?>

<a class="nav-link disabled" href="#">Configuración</a> 
<a class="nav-link" href="../configuracionModulo/formGestionar.php">Gestionar Datos Usuario</a> 

<?php } ?>
<?php 
if ($_SESSION['idcargo']==1 || $_SESSION['idcargo']==2 ||$_SESSION['idcargo']==3) {
?>
<a class="nav-link disabled" href="#">Ventas</a> 

<?php } ?>
 <?php 
  if ($_SESSION['idcargo']==1 || $_SESSION['idcargo']==2){ ?>
<a class="nav-link" href="../ventasModule/getResumenVentas.php?view=editarResVen" >Editar resumen de ventas</a> 
<a class="nav-link" href="proveedor.php">Generar Balance de Ventas</a> 
 <?php } 
    if($_SESSION['idcargo']==1 || $_SESSION['idcargo']==3){   
?>
<a class="nav-link" href="proveedor.php">Generar Balance de Ventas</a> 
<a class="nav-link" href="../ventasModule/controlRegistrarVenta.php">Registrar Ventas</a>

        <?php }
        ?>

  
</nav>
</div>
</div>
    


			         
          
          
          <?php
          
      }
  }  
?>