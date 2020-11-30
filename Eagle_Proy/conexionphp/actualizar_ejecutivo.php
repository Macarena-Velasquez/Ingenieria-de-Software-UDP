<?php 

include("principal.php");

if (isset($_POST['Eliminar_Ejecutivo'])){
    $Idusuario = trim($_GET['IDejecutivo']);
    echo $Idusuario;
    $consulta7 = "DELETE FROM eaglecopters.ejecutivos WHERE usuarioID='$Idusuario'";
    $resultado7 = mysqli_query($con,$consulta7);
    $consulta8 = "DELETE FROM eaglecopters.usuarios WHERE ID='$Idusuario'";
    $resultado8 = mysqli_query($con,$consulta8);  
    echo $resultado7;
    if($resultado7){
        if($resultado8){
            header('Location: ../Administrador.php');
    
        }
        

    }
    else {
        ?> 
            <h3 class="bad">¡Ups ha ocurrido un error!</h3>
    
        <?php
    }
}
?>
<?php

if (isset($_POST['Guardar_Cambios'])) {
    
	    $nombre = trim($_POST['user_name']);
		$correo = trim($_POST['user_mail']);
        $telefono = trim($_POST['user_telefono']);
        
        $Idusuario = trim($_GET['IDejecutivo']);


            
        $consulta6 = "UPDATE eaglecopters.usuarios SET nombre_apellido='$nombre', mail='$correo',telefono='$telefono' WHERE ID='$Idusuario'";
        $resultado6 = mysqli_query($con,$consulta6); 
        $consulta4 = "UPDATE eaglecopters.ejecutivos SET nombre='$nombre' WHERE usuarioID='$Idusuario'";
        $resultado4 = mysqli_query($con,$consulta4);

		echo $resultado6;
	    if ($resultado6) {
            if($resultado4){
                header('Location: ../Administrador.php');

            }
	
	    } else {
            ?> 
                <h3 class="bad">¡Ups ha ocurrido un error!</h3>
        
            <?php
	    }
        
        
        
      
    
}
?>  