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
        <link rel="stylesheet" href="css/estilos_verCaract.css">
        
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
        
        <?php
        $IdCliente = trim($_GET['ID']);
            
        ?>
        <div class="title-contenedor">
            <h1>Ficha cliente</h1>

            <li>
                <a href="GestionarClientes.php?ID=<?php echo $IdCliente?>"> <img class="icon_gestionar_persona" src="img/icon_gestionar_persona.png" alt="icon_gestionar_persona"> Gestionar cliente</a>
            </li>

        </div>

        

                <?php
                    $consulta = "SELECT *  FROM  (SELECT rubros.nombre AS 'Nombre_rubro', empresa.nombre AS 'Nombre_Empresa', empresa.ID as 'empresa_ID' FROM empresa INNER JOIN rubros ON empresa.rubroID=rubros.ID) AS tb_rubro_empresa INNER JOIN cliente ON cliente.empresaID=tb_rubro_empresa.empresa_ID WHERE ID=$IdCliente";
                    $resultado = mysqli_query($con,$consulta);

                    $resultado_final= mysqli_num_rows($resultado);
                    if($resultado_final > 0){
                        while($data = mysqli_fetch_array($resultado)){
                ?>
                            <div class="contenedor-form-1">
                                <li>
                                    <label for="nombre">Nombre:</label>
                                    <label for="nombre2"><?php echo $data['Nombre']?></label>
                                </li>
                                <li>
                                    <label for="Rubro">Rubro:</label>
                                    <label for="Rubro:"><?php echo $data['Nombre_rubro']?></label>
                                </li>
                                <li>
                                    <label for="Empresa">Empresa:</label>
                                    <label for="Empresa"><?php echo $data['Nombre_Empresa']?></label>
                                </li>
                                <li>
                                    <label for="Correo">Correo:</label>
                                    <label for="Correo"><?php echo $data['email']?></label>
                                </li>
                                <li>
                                    <label for="Celular">Celular:</label>
                                    <label for="Celular"><?php echo $data['telefono']?></label>
                                </li>
                                <li>
                                    <label for="Fecha">Fecha(aaaammdd):</label>
                                    <label for="Fecha"><?php echo $data['fecha']?></label>
                                </li>
                                <li>
                                    <label for="Comentarios">Comentarios:</label>
                                    <label for="Comentarios"><?php echo $data['comentarios']?></label>
                                </li>
                            </div>
                            
                            

                <?php
                        }
                    }

        ?>

                   
        
        
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/js_VerCaract.js"></script>
        
    </body>
</html>