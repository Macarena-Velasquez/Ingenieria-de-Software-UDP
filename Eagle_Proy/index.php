   
<html>
    <head>
        <meta charset="UTF-8">
        <title>login eaglecop</title>
        <link rel="stylesheet" href="css/estilos_index.css">
    </head>
    <body>
        <div class="contenedor-form">
            <div class="toggle">
                <span>Crear cuenta</span>
            </div>

            <div class="formulario">
                <h2>Iniciar sesión</h2>
                <form action="conexionphp/verificar_login.php" method="post">
                    <input type="email" id="correo" name="correo" placeholder="Correo electronico" required>
                    <input type="password" id="pass" name="pass" placeholder="Contraseña" required>
                    <input type="submit" name="login" value="Iniciar Sesión" >
                </form>
            </div>

            <div class="formulario">
                <h2>Crea tu cuenta</h2>
                <form action="conexionphp/registrar.php" method="post">
                    <input type="text" name="nombre" placeholder="Nombre y apellido" required>
                    <input type="password" name="pass" placeholder="Contraseña" required>
                    <input type="email" name="correo" placeholder="Correo electronico" required>
                    <input type="text" name="telefono" placeholder="Telefono" required>
                    <input type="submit" name="register" value="Registrarse">
                </form>
            </div>

            <div class="reset-password">
                <a href="OlvideMiContrasenia.php">Olvide mi contraseña</a>
            </div>
            
            <div class="contacto">
                <a href="https://www.eaglecopters.cl/">Eaglecopters</a>
                <p>Num: +562 2948 3200</p>
                <p>Administrador@correo.com</p>
            </div>

        </div>

        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>