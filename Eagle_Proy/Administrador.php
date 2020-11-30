<?php
    session_start(); 
    $Id_Usuario_Session=$_SESSION['ID_Usuario'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Menu Eaglecopters</title>
        <link rel="stylesheet" href="css/estilos_menu.css">
        
    </head>
    <body>
        <div class="logoEagle">
            <img src="img/logoEagle.png" alt="logo_Eagle" >
        </div>
        
        <nav>
            <?php include("conexionphp/principal.php");?>
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
                    <a href="menu.php" >Home
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
                     <a href="Administrador.php">Administrador</a> <!--aqui hacer una consulta verificando si la cuenta iniciada es tipo administrador -->
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

        <br>
        <div class="title-client">
            <h2>Tabla de Usuarios</h2>
        </div>

        <div class="search_bar">
            <a href="#" class="icon-search" name="buscador"><img src="img/icon_buscar_clientes.png" alt="icon-search"></a>
            <input type="text" id="busqueda" name="busqueda"  placeholder="¿A quién buscas?">            
        </div>

        <section id="tabla_resultado">

        </section>      

        <script src="js/jquery-3.1.1.min.js"></script>        
        <script src="js/js_administrador_buscador.js"></script>
        <script src="js/js_menu.js"></script>

    </body>
</html>