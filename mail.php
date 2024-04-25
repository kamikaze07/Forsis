<?php

/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
require("phpmailer/class.phpmailer.php");
date_default_timezone_set('Etc/UTC');
//Create a new PHPMailer instance
$mail             = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->IsSMTP();

//Whether to use SMTP authentication
$mail->SMTPAuth = true;


//variables
$nom = strtoupper($_POST['name']);
$correo = ($_POST['email']);
$phone = strtoupper($_POST['phone']);
$asunto = strtoupper($_POST['subject']);
$suc = strtoupper($_POST['sucursal']);
$eq = strtoupper($_POST['equipo']);
$otro = strtoupper($_POST['otro']);
$serv = strtoupper($_POST['servicio']);
$mens = strtoupper($_POST['message']);

if ($eq == 'OTRO') {
    $eq = $otro;
}

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
//$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'webmail.forsis.com.mx';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 26;

//Set the encryption system to use - ssl (deprecated) or tls
//$mail->SMTPSecure = 'tls';


//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "cotizaciones@forsis.com.mx";
//Password to use for SMTP authentication
$mail->Password = "cot98121";

//Set who the message is to be sent from
//$mail->setFrom('contacto@visualrendervfx.com', 'Contacto Visual Render VFX');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
//$mail->addAddress($_POST['email'], $_POST['name']);

//Set the subject line
$mail->Subject = "SOLICITO COTIZACIÓN";

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('email.html'), dirname(__FILE__));

//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.webp');

//send the message, check for errors
/*if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    echo "<br/>";
}*/

//$mail->ClearAddresses();
//$mail->addAddress('cesarkun07@gmail.com', 'Cesar Luis Soto Gonzalez');
$mail->addAddress('operaciones.poza@forsis.com.mx', 'Victoriano Gallegos Ochoa');
$mail->addAddress('sistemas.poza@forsis.com.mx', 'Uzziel Contreras Portilla');
$mail->addAddress('gerardo@forsis.com.mx', 'Gerardo Ramírez Sánchez');
$mail->addAddress('roger@forsis.com.mx', 'Roger Garza Cantu');
$mail->addAddress('operaciones1.ver@forsis.com.mx', 'Jose Luis Lopez Quiroz');
$mail->addAddress('liliana@forsis.com.mx', 'Liliana Garza');
$mail->addAddress('trafico1.tab@forsis.com.mx', 'Mario Peña');
$mail->addAddress('trafico1.ver@forsis.com.mx', 'Alberto Lara');

//$mail->setFrom('contacto@visualrendervfx.com', 'contacto Visual Render VFX');
$mail->From = 'cotizaciones@forsis.com.mx';

//$mail->Subject = 'Contact Mail';

$mail->ContentType = "text/html";
$mail->CharSet     = "utf-8";
$mail->FromName    = "Cotizaciones Grupo Forsis";


//$mail->Body = 'Mensaje de: ' . $_POST['email'] . '<br/>' .  'Mensaje recibido: ' . $_POST['message'] . '<br/>' .'Telefono de Contacto: '.$_POST['phone']. '<br/>' .'Asunto: '.$_POST['subject']. '<br/>' .'Sucursal '.$_POST['sucursal']. '<br/>' .'Equipo: '.$_POST['equipo']. '<br/>' .'Otro: '.$_POST['otro']. '<br/>' .'Servicio: '.$_POST['servicio'];

//$mail->Body        = "Prueba desde phpmailer";

$mail->Body = "
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
</head>
<body style='margin: 0; padding: 0;'>
    <table align='center' border='0' cellspacing='0' width='650' style='border-color: #666' rules='all'>
        <tr>
            <td bgcolor='#ed1717' style='padding: 20px 5 20px 0;'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='font-family: Helvetica, Arial, sans-serif; font-size: 38px; color: white'>
                    <tr>
                        <td width='15%' style='color: white'>
                            <img src='https://s.gravatar.com/avatar/8d556db4c2dfdd09797a1f8ac721d5fe?s=80' alt='Fletes Y Materiales Forsis, SA de CV' border='0' class='sig-logo' height='80' width='84'></img>
                        </td>
                        <td>
                            GRUPO FORSIS
                        </td>
                        <td style='font-family: Helvetica, Arial, sans-serif; font-size: 20px; color: white' align='center' width='50'>
                            Mensaje desde el portal
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor='#ffffff' style='padding: 0 0 0 0;'>
            <table border='0' cellpadding='5' cellspacing='0' width='100%' style='font-family: Helvetica, Arial, sans-serif; font-size: 12px;'><!--Tabla 'Ha recibido'-->
                <tr>
                    <td>
                        Ha recibido un correo desde la página de Grupo Forsis solicitando información, estos son los datos:
                    </td>
                </tr>
                <tr>
                    <td>
                        <table border='1' cellpadding='5' cellspacing='0' width='100%' style='border-color: #666' rules='all'>
                            <tr>
                                <th colspan='3'>
                                    <strong>Nombre: " . $nom . "</strong>
                                </th>    
                            </tr>
                            <tr>
                                <td><strong>Telefono: </strong>" . $phone . "</td>
                                <td> <strong>Correo: </strong> " . $correo . "</td>
                                <td><strong>Sucursal: </strong>" . $suc . "</td>
                            </tr>
                            <tr>
                                <td colspan='2'><strong>Equipo: </strong>" . $eq . "</td>
                                <td><strong>Servicio: </strong>" . $serv . "</td>
                            </tr>
                            <td colspan='3'>
                                <strong>Mensaje: </strong>" . $mens . "
                            </td>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor='#ed1717' style='padding: 8px 30px 8px 30px;'>
            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='font-family: Helvetica, Arial, sans-serif; font-size: 12px;'>
                <tr>
                    <td width='75%' style='color: white'>
                        &reg; FLETES Y MATERIALES FORSIS, SA DE CV<br/>
                        Tecnologias de la Informacion
                    </td>
                    <td align='right'>
                        <table border='0' cellpadding='0' cellspacing='0'>
                            <tr>
                                <td>
                                </td>
                                <td style='font-size: 0; line-height: 0;' width='20'>&nbsp;</td>
                                <td style='font-size: 10'>
                                    <a href='http://www.forsis.com.mx'>
                                        www.forsis.com.mx
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
</body>
";

if ($mail->send()) {
    echo "succes";
}

$mail->ClearAddresses();

$mail->Subject = 'Gracias por ponerte en Contacto';

$mail->addAddress($correo, $nom);

$mail->From = 'cotizaciones@forsis.com.mx';

$mail->FromName    = "Cotizaciones Grupo Forsis";

$mail->msgHTML(file_get_contents('mailContact.html'), dirname(__FILE__));

if ($mail->send()) {
    echo "succes";
}
