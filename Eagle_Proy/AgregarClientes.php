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
        <link rel="stylesheet" href="css/estilos_agregarClientes.css">
        
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
            <h1>Agregar cliente</h1>
        </div>

        <div class="contenedor_AgregarCliente">
            <div class="formulario">
                <form action="conexionphp/agregar_clientes.php" method="POST">
                    <ul>
                        <li>
                          <label for="name">Nombre:</label>
                          <input type="text" id="name" name="user_name">
                        </li>
                        <li>
                            <label for="rubro">Rubro:</label>
                            <select name="pcentro2" id="pcentro2">
                                <option value="0" selected> elija el rubro de la empresa</option>
                                <?php
                                $consulta = "SELECT nombre FROM eaglecopters.rubros ";
                                $resultado = mysqli_query($con,$consulta);

                                $resultado_final= mysqli_num_rows($resultado);
                                if($resultado_final > 0){

                                    while($data = mysqli_fetch_array($resultado)){
                                ?>
                                    <option value="<?php echo $data['nombre'] ?>" > <?php echo $data['nombre']?></option>    

                                <?php
                                    }

                                }

                                ?>
                            </select>

                            <span class="boton_nuevaEmpresa"> Agregar nuevo rubro/empresa <img src="img/icon_agregar_empresa.png" alt="icon_agregar_empresa"></span>
                        </li>
                            

                        <li>
                            <label for="empresa">Empresa:</label>
                            <select name="pcentro" id="pcentro">
                                <option value="0" selected> elija una empresa</option>


                                <?php
                                $consulta = "SELECT nombre FROM eaglecopters.empresa ";
                                $resultado = mysqli_query($con,$consulta);

                                $resultado_final= mysqli_num_rows($resultado);
                                if($resultado_final > 0){

                                    while($data = mysqli_fetch_array($resultado)){
                                ?>
                                    <option value="<?php echo $data['nombre'] ?>" > <?php echo $data['nombre']?></option>    

                                <?php
                                    }

                                }

                                ?>
                            </select>
                            
                        </li>

                        <li>
                            <label for="mail">Correo electrónico:</label>
                            <input type="email" id="mail" name="user_mail">
                        </li>
                        <li>
                            <label for="telefono">Telefono:</label>
                            <input type="text" id="telefono" name="user_telefono">
                        </li>
                        <li>
                            <label for="calendario">Indique fecha para contactar</label>
                            <input type="date" id="calendario" name="user_calendario">
                        </li>    

                        <li>
                            <label for="comentarios">Comentarios:</label>
                            <textarea id="comentarios" name="user_comentario"></textarea>
                        </li>
                        <li class="guardarCambios">
                            <button type="submit" name='Agregar_Cliente' >Agregar Cliente</button>
                        </li>
                    </ul>
                </form>
            </div>
                



            <div class="formulario">
                <form action="conexionphp/agregar_clientes.php" method="POST">
                
                    <ul>
                        <li>
                            <span class="boton_nuevaEmpresa"> Volver atras</span>
                        </li>
                        <li>
                          <label for="name_rubro">Nombre del rubro:</label>
                          <input type="text" id="name_rubro" name="rubro_name">
                        </li>

                        <li>
                          <label for="name_empresa">Nombre de la empresa:</label>
                          <input type="text" id="name_empresa" name="empresa_name">
                        </li>

                        <li class="guardarCambios">
                            <button type="submit" name="agregar_rubroEmpresa">Agregrar Rubro/Empresa</button>
                        </li>
                    </ul>
                </form>
            </div>                    
                
        </div>


        
        
        
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/js_agregarClientes.js"></script>

    </body>
</html>