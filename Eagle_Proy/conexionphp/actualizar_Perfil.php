<?php
    session_start(); 
    $Id_Usuario_Session=$_SESSION['ID_Usuario'];
?>
<?php 

include("principal.php");

if (isset($_POST['Guardar_Cambios'])) {
    
	    $nombre = trim($_POST['user_name']);
		$correo = trim($_POST['user_mail']);
        $telefono = trim($_POST['user_telefono']);
        $pass = trim($_POST['pass']);
        echo $pass;
        $consulta6 = "UPDATE eaglecopters.usuarios SET nombre_apellido='$nombre', mail='$correo',telefono='$telefono' WHERE ID='$Id_Usuario_Session'";
        $resultado6 = mysqli_query($con,$consulta6); 
        $consulta4 = "UPDATE eaglecopters.ejecutivos SET nombre='$nombre' WHERE usuarioID='$Id_Usuario_Session'";
        $resultado4 = mysqli_query($con,$consulta4);

        if($pass != ""){
            $hash = password_hash($pass, PASSWORD_BCRYPT);
            $consulta7 = "UPDATE eaglecopters.usuarios SET pass='$hash' WHERE ID='$Id_Usuario_Session'";
            $resultado7 = mysqli_query($con,$consulta7);     
        }

	    if ($resultado6) {
            if($resultado4){
                header('Location: ../menu.php');

            }
	
	    } else {
            ?> 
                <h3 class="bad">¡Ups ha ocurrido un error!</h3>
        
            <?php
	    }
        
        
        
      
    
}
?>  