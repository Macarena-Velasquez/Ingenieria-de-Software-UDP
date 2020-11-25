<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
/* 1. Entrar a la cuenta gmail.
2. Gestionar tu cuenta
3. Poner en la barra "Acceso de aplicaciones poco seguras"
4. Permitir
*/

// TRUE O FALSE EN LA OPCIÓN QUE QUIERAS AÑADIR
// CONTRASEÑA DE REGISTRO.-------------------------------------------

$longitud = 10;
$opcLetra = TRUE;
$opcNumero = TRUE;
$opcMayus = TRUE;
$opcEspecial = TRUE;
$letras ="abcdefghijklmnopqrstuvwxyz";
$numeros = "1234567890";
$letrasMayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$especiales ="|@#~$%()=^*+[]{}-_";
$listado = "";
$password = "";
if ($opcLetra == TRUE) $listado .= $letras;
if ($opcNumero == TRUE) $listado .= $numeros;
if($opcMayus == TRUE) $listado .= $letrasMayus;
if($opcEspecial == TRUE) $listado .= $especiales;

for( $i=1; $i<=$longitud; $i++) {
    $caracter = $listado[rand(0,strlen($listado)-1)];
    $password.=$caracter;
    $listado = str_shuffle($listado);
    }
echo $password;
//--------------------------------------------------------------

require 'PHPMailer-Archivos/Exception.php';
require 'PHPMailer-Archivos/PHPMailer.php';
require 'PHPMailer-Archivos/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'macarena.velasquez@mail.udp.cl';                     // SMTP username
    $mail->Password   = 'macarena200112';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('macarena.velasquez@mail.udp.cl', 'Maca1');
    $mail->addAddress('macarena.velasquez@mail.udp.cl', 'Maca2');     // Add a recipient
    $mail->addAddress('macarenavelasquez02@gmail.com');               // Name is optional
    /*$mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');*/

    /* Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); */   // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Password temporal';
    $mail->Body    = 'Hola, esta es su contraseña temporal: hola123' ;
    /*$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';*/

    $mail->send();
    echo 'El mensaje se envió correctamente';
} catch (Exception $e) {
    echo "El mensaje no se envió. Mailer Error: {$mail->ErrorInfo}";
}
?>