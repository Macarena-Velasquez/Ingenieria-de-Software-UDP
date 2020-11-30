<html>
    <head>
        <meta charset="UTF-8">
        <title>login eaglecop</title>
        <link rel="stylesheet" href="css/estilos_recuperarContrasenia.css">
    </head>
    <body>
        <div class="contenedor-form">


            <div class="formulario">

                <h2>Recuperar Contraseña</h2>
                <h4>Para recuperar tu contraseña se enviara una provisoria a tu email.</h4>
                <form action="enviar_correo/recuperar_pass.php" method="post">
                    <input type="email" id="correo" name="correo" placeholder="Correo electronico" required>
                    <input type="submit" name="register" value="Enviar contraseña al mail" >
                    
                </form>
            </div>


            <div class="reset-password">
                <a href="index.php">volver</a>
            </div>
            
            <div class="contacto">
                <a href="https://www.eaglecopters.cl/">Eaglecopters</a>
                <p>Num: +562 2948 3200</p>
                <p>Aqui va correo adminitrador</p>
            </div>

        </div>

        <script src="js/jquery-3.1.1.min.js"></script>
    </body>
</html>