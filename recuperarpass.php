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
$especiales ="@#$%()=*+-_";
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
    $mail->Password   = 'Macarena200112.';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('macarena.velasquez@mail.udp.cl', 'Reestablecimiento de contraseña');
//    $mail->addAddress('macarena.velasquez@mail.udp.cl', 'Maca2');     // Add a recipient
    $mail->addAddress('macarenavelasquez02@gmail.com');               // Name is optional
    /*$mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');*/

    /* Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); */   // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Reestablecimiento de contraseña de usuario';
    $mail->Body    = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Demystifying Email Design</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<style type="text/css">
		a[x-apple-data-detectors] {color: inherit !important;}
	</style>

</head>
<body style="margin: 0; padding: 0;">
	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding: 20px 0 30px 0;">

<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #cccccc;">
	<tr>
		<td align="center" bgcolor="#FFFFFF" style="padding: 40px 0 30px 0;">
			<img src="https://d1hbpr09pwz0sk.cloudfront.net/logo_url/eagle-copters-ltd-d67cca02" alt="EagleCopters" width="500" height="200" style="display: block;" />
		</td>
	</tr>
	<tr>
		<td bgcolor="#D73917" style="padding: 40px 30px 40px 30px;">
			<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
				<tr>
					<td style="color: #E9E3E4; font-family: Arial, sans-serif;">
						<h1 style="font-size: 24px; margin: 0;">¿Contraseña olvidada?</h1>
					</td>
				</tr>
				<tr>
					<td style="color: #E9E3E4; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;">
						<p style="margin: 0;">Ha solicitado el reestablecimiento de su contraseña, esta es su nueva contraseña: <?php echo $password <php> </p>
					</td>
				</tr>
				<tr>
					<td>
						<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
							<tr>
								<td width="260" valign="top">
									<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
										<tr>
											<td>

											</td>
										</tr>
										<tr>
											<td style="color: #E9E3E4; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 25px 0 0 0;">
												<p style="margin: 0;">Puede cambiarla en cualquier momento, ingresado a la página web en su perfil de usuario.</p>
											</td>
										</tr>
									</table>
								</td>
								<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
								<td width="260" valign="top">
									<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
										<tr>
											<td>
											</td>
										</tr>
										<tr>
											<td style="color: #E9E3E4; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 25px 0 0 0;">
												<p style="margin: 0;">Recuerde nunca entregar sus datos personales a terceros.</p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td bgcolor="#ffffff" style="padding: 30px 30px;">
    		<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
				<tr>
					<td style="color: #D73917; font-family: Arial, sans-serif; font-size: 14px;">
						<p style="margin: 0;">&reg; Someone, somewhere 2013<br/>
					</td>
					<td align="right">
						<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
							<tr>
								<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
								<td>
									<a href="https://www.eaglecopters.cl/">
										<img src="" alt="" width="38" height="38" style="display: block;" border="0" />
									</a>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

			</td>
		</tr>
	</table>
</body>
</html>' ;
    /*$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';*/

    $mail->send();
    echo 'El mensaje se envió correctamente';
} catch (Exception $e) {
    echo "El mensaje no se envió. Mailer Error: {$mail->ErrorInfo}";
}
?>
