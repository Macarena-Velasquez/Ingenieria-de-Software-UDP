<?php 
session_start(); 

 

include("principal.php");

if (isset($_POST['login'])) {
    
	    $correo = trim($_POST['correo']);
        $pass = trim($_POST['pass']);
	    $consulta = "SELECT pass, ID FROM eaglecopters.usuarios WHERE mail='$correo'";
        $hash = mysqli_query($con,$consulta);
        

        
        
        while($hash2= $hash->fetch_assoc()){
            
            if (password_verify($pass, $hash2['pass'])) {
                $contrass=$hash2['pass'];
                $ID_Usuario=$hash2['ID'];
                echo '¡La contraseña es válida!';
                $consulta = "SELECT * FROM eaglecopters.usuarios WHERE mail='$correo' and pass='$contrass'";
                $resultado = mysqli_query($con,$consulta);
            
                $filas=mysqli_num_rows($resultado);
            
                if($filas>0){
                    
                    $tiempo_UNIX = time();
                    $fecha_hoy = date("Ymd", $tiempo_UNIX);
                    $consulta_tablafecha = "SELECT * FROM eaglecopters.cliente WHERE fecha < '$fecha_hoy'  OR fecha = '$fecha_hoy'"; 
                    $resultado_notificacion = mysqli_query($con,$consulta_tablafecha);
                    $consulta_notificacion = "UPDATE eaglecopters.cliente SET notificacion = '1' WHERE (fecha < '$fecha_hoy')  OR (fecha = '$fecha_hoy')"; 
                    $resultado_notificacion = mysqli_query($con,$consulta_notificacion);
                    
                    $_SESSION['ID_Usuario']=$ID_Usuario;

                    header('Location: ../menu.php');
    
                }else {
                 echo 'La contraseña no es válida.';
                }
    
    
    
    
            }else {
                echo "Error en la verificacion";
            }
        }
        
        
        
    
}

?>

