<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Caracteristicas Eaglecopters</title>
        <link rel="stylesheet" href="css/estilos_gestionarEjecutivo.css">
        
    </head>
    <body>
        <div class="logoEagle">
            <img src="img/logoEagle.png" alt="logo_Eagle" >
        </div>
        
        <nav>
            <?php include("conexionphp/principal.php");?>
            <div class="logo">
                <h4>Administrador</h4>
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
                    <a href="menu.php">Home
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
                    <a href="Administrador.php">Administrador</a>
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

        <?php
            $IdEjecutivo = trim($_GET['IDejecutivo']);
        ?>

        <div class="title-contenedor">
            <h1>Gestionar Ejecutivo</h1>

            <li>
                <a href="Administrador.php"> <img class="icon_volver_atras" src="img/icon_volver_atras.png" alt="icon_volver_atras"> Volver atrás</a>
            </li>
        </div>
        <?php 
            $consulta_gestionar = "SELECT * FROM usuarios INNER JOIN ejecutivos ON  ejecutivos.usuarioID= usuarios.ID WHERE usuarios.ID = '$IdEjecutivo'"; 
            $resultado_gestionar = mysqli_query($con,$consulta_gestionar);
            $data_gestionar= $resultado_gestionar->fetch_assoc();
        ?>
        <div class="contenedor_AgregarCliente">

                <div class="formulario">
                    <form action="conexionphp/actualizar_ejecutivo.php?IDejecutivo=<?php echo $IdEjecutivo ?>" method="POST">
                        <ul>
                            <li>
                              <label for="name">Nombre:</label>
                              <input type="text" id="name" name="user_name" value = "<?php echo $data_gestionar['nombre_apellido'] ?>">
                            </li>
                                 
                            <li class="correo_elec">
                                <label for="mail">Correo electrónico:</label>
                                <input type="email" id="mail" name="user_mail" value = "<?php echo $data_gestionar['mail'] ?>">
                            </li>
                            <li>
                                <label for="telefono">Telefono:</label>
                                <input type="text" id="telefono" name="user_telefono" value = "<?php echo $data_gestionar['telefono'] ?>">
                            </li>
                            
                            <li class="guardarCambios">
                                <button type="submit" name='Guardar_Cambios' >Guardar Cambios</button>
                            </li>
                            <li class="guardarCambios">
                                <button type="submit" name='Eliminar_Ejecutivo' >Eliminar Ejecutivo</button>
                            </li>
                        </ul>
                    </form>
                </div>
                                  
                                  
                                        
        </div>

        
        
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/js_actualizarEjecutivo.js"></script>

    </body>
</html>