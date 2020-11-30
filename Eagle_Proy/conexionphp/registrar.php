<?php 

include("principal.php");

if (isset($_POST['register'])) {
    
	    $name = trim($_POST['nombre']);
		$pass = trim($_POST['pass']);
		$telefono = trim($_POST['telefono']);
		$mail = trim($_POST['correo']);
	    
        $hash = password_hash($pass, PASSWORD_BCRYPT);
        echo $hash."\n" ;
        
        

        
        
	    $consulta = "INSERT INTO eaglecopters.usuarios(mail, pass, telefono, nombre_apellido) VALUES ('$mail','$hash','$telefono','$name')";
		$resultado = mysqli_query($con,$consulta);
		$consulta2 = "SELECT * FROM usuarios WHERE nombre_apellido = '$name'";
		$resultado2 = mysqli_query($con,$consulta2);
		while($tabla_usuarios= $resultado2->fetch_assoc()){
			$id_usuario=$tabla_usuarios['ID'];
			$consulta3 = "INSERT INTO eaglecopters.ejecutivos(nombre, usuarioID) VALUES ('$name','$id_usuario')";
			$resultado3 = mysqli_query($con,$consulta3);
		}
		
		
	    if ($resultado) {
			header('Location: ../');
			
	    } else {
			?> 
			<h3 class="bad">¡Ups ha ocurrido un error!</h3>
	    	
           <?php
	    }
      
    
}

?>