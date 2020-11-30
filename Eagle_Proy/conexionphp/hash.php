
<?php
$hash = password_hash("hola", PASSWORD_BCRYPT);
echo $hash."\n" ;


if (password_verify('hola', $hash)) {
    echo '¡La contraseña es válida!';
} else {
    echo 'La contraseña no es válida.';
}

?>