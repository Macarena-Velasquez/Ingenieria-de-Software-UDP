<?php 

include("principal.php");

if (isset($_POST['agregar_rubroEmpresa'])) {
    
	    $N_rubro = trim($_POST['rubro_name']);
		$N_empresa = trim($_POST['empresa_name']);
     
        

        
        
	    $consulta1 = "INSERT INTO eaglecopters.rubros(nombre) VALUES ('$N_rubro')";
        $resultado1 = mysqli_query($con,$consulta1);
        $consulta1_2 = "SELECT ID FROM eaglecopters.rubros WHERE nombre= '$N_rubro'";
        $resultado1_2 = mysqli_query($con,$consulta1_2);

        while($id_rubro= $resultado1_2->fetch_assoc()){
            $id_rubro_aux=$id_rubro['ID'];
            $consulta2 = "INSERT INTO eaglecopters.empresa(nombre, rubroID) VALUES ('$N_empresa', '$id_rubro_aux')";
            $resultado2 = mysqli_query($con,$consulta2);
		
		
	        if ($resultado2) {
			    header('Location: ../AgregarClientes.php');
			
	        } else {
			    ?> 
			    <h3 class="bad">¡Ups ha ocurrido un error!</h3>
	    	
            <?php
	        }
        }
        
        
      
    
}
?>


<?php 
if (isset($_POST['Agregar_Cliente'])) {
    $Nombre_cliente = trim($_POST['user_name']);
    $N_rubro = trim($_POST['pcentro2']);
    $N_empresa = trim($_POST['pcentro']);
    $email = trim($_POST['user_mail']);
    $telefono = trim($_POST['user_telefono']);
    $comentario = trim($_POST['user_comentario']);
    $fecha = trim($_POST['user_calendario']);
    $fecha_anio=$fecha[0]*1000+$fecha[1]*100+$fecha[2]*10+$fecha[3]*1;
    $fecha_mes=$fecha[5]*10+$fecha[6]*1;
    $fecha_dia=$fecha[8]*10+$fecha[9]*1;
    $fecha_final=$fecha_anio*10000+$fecha_mes*100+$fecha_dia;
    
    // Asumiremos que objetivosID de todos los clientes sera 1 de helicopteros


    $consulta1_3 = "SELECT ID FROM eaglecopters.empresa WHERE nombre= '$N_empresa'";
    $resultado1_3 = mysqli_query($con,$consulta1_3);

    $id_empresa= $resultado1_3->fetch_assoc();
    $id_empresa_aux=$id_empresa['ID'];
    // while($id_empresa= $resultado1_3->fetch_assoc()){
    //     $id_empresa_aux=$id_empresa['ID'];

        $consulta3 = "INSERT INTO eaglecopters.cliente(nombre,empresaID,email,telefono,objetivoID,fecha,comentarios,notificacion) VALUES ('$Nombre_cliente','$id_empresa_aux','$email','$telefono',1,'$fecha_final','$comentario','0')";
        $resultado3 = mysqli_query($con,$consulta3);    
     
        if ($resultado3) {
            header('Location: ../menu.php');
         
        } else {
            ?> 
            <h3 class="bad">¡Ups ha ocurrido un error!</h3>
         
        <?php
        }
    // }
    
    
  

}


?>