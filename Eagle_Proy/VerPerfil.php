<?php
    session_start(); 
    $Id_Usuario_Session=$_SESSION['ID_Usuario'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Caracteristicas Eaglecopters</title>
        <link rel="stylesheet" href="css/estilos_verPerfil.css">
        
    </head>
    <body>
        <?php include("conexionphp/principal.php");?>
        <div class="logoEagle">
            <img src="img/logoEagle.png" alt="logo_Eagle" >
        </div>
        
        <nav>
            
            <div class="logo">
                <h4>Ejecutivo de ventas</h4>
            </div>

            <ul class="nav-links">
                <li class=notificacion>
                    <h2 class=numero_notificacion>
                        <?php 
                            $consulta = "SELECT *  FROM eaglecopters.cliente WHERE cliente.notificacion = 1"; 
                            $resultado = mysqli_query($con,$consulta);
                            $resultado_final= mysqli_num_rows($resultado);
                            echo $resultado_final;
                        ?>
                    </h2>
                    <a href="Notificaciones.php">Notificaciones</a>
                    
                </li>
                <li>
                    
                    <a href="menu.php"> Home
                    <?php
                        $tiempo_UNIX = time();
                        $fecha_hoy = date("Ymd", $tiempo_UNIX);
                        $consulta_tablafecha = "SELECT * FROM eaglecopters.cliente WHERE fecha < '$fecha_hoy'  OR fecha = '$fecha_hoy'"; 
                        $resultado_notificacion = mysqli_query($con,$consulta_tablafecha);
                        $consulta_notificacion = "UPDATE eaglecopters.cliente SET notificacion = '1' WHERE (fecha < '$fecha_hoy')  OR (fecha = '$fecha_hoy')"; 
                        $resultado_notificacion = mysqli_query($con,$consulta_notificacion);
                    ?>
                    </a>
                </li>

                <li>
                    <?php
                        $consulta_admin = "SELECT * FROM eaglecopters.administrador WHERE usuarioID = '$Id_Usuario_Session'"; 
                        $resultado_admin = mysqli_query($con,$consulta_admin);
                        $filas_admin=mysqli_num_rows($resultado_admin);
                        if($filas_admin==1){
                            ?><a href="Administrador.php">Administrador</a> <!--aqui hacer una consulta verificando si la cuenta iniciada es tipo administrador -->
                            <?php
                        }
                        
                    ?>
                </li>

                <li>
                    <a href="VerPerfil.php">Perfil</a>
                </li>
            </ul>
            <div class="burger">
                <div class="linea1"></div>
                <div class="linea2"></div>
                <div class="linea3"></div>
            </div>
        </nav>
        
        
        <div class="title-contenedor">
            <h1>Perfil de Usuario</h1>

        </div>

        

                <?php
                    $consulta = "SELECT *  FROM  usuarios WHERE ID=$Id_Usuario_Session";
                    $resultado = mysqli_query($con,$consulta);

                    $resultado_final= mysqli_num_rows($resultado);
                    if($resultado_final > 0){
                        while($data = mysqli_fetch_array($resultado)){
                ?>
                            
                            <div class="contenedor-form-1">
                                    <form action="conexionphp/actualizar_Perfil.php" method="POST" class="formulario">
                                        <h4>Para cambiar atributos, modificar cada casilla.</h4>
                                        <li>
                                            <label for="nombre">Nombre:</label>
                                            <input type="text" id="name" name="user_name" value = "<?php echo $data['nombre_apellido'] ?>">
                                            
                                        </li>
                                        <li>
                                            <label for="Correo">Correo:</label>
                                            <input type="email" id="mail" name="user_mail" value = "<?php echo $data['mail'] ?>">
                                        </li>
                                        <li>
                                            <label for="telefono">Celular:</label>
                                            <input type="text" id="telefono" name="user_telefono" value = "<?php echo $data['telefono'] ?>">
                                        </li>
                                        <h4>En el caso de NO cambiar contraseña dejar atributo vacio.</h4>
                                        <li class="new_pass">
                                            <label for="name_rubro">Nueva Password:</label>
                                            <input type="password" name="pass" placeholder="Contraseña" >
                                        </li>
                                        
                                        <li class="guardarCambios">
                                            <button type="submit" name='Guardar_Cambios' >Guardar Cambios</button>
                                        </li>
                                </form>

                            </div>
                <?php
                        }
                    }

        ?>

                   
        
        
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/js_VerPerfil.js"></script>
        
    </body>
</html>