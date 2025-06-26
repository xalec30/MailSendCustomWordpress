<?php
/*
Plugin Name: Gesto SMTP Personalizado
Plugin URI:  https://vog365.com/
Description: Plugin personalizado para enviar correos usando Outlook SMTP
Version:     1.0
Author:      Alexander Rodriguez
Author URI:  https://vog365/
License:     GPL2
*/

// Asegurarse de que WordPress esté cargado.
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Salir si se accede directamente.
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




function outlook_custom_send_mail($to_email, $subject, $message_html, $message_plain = '') {
    cto.
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // Configuración del servidor SMTP de Outlook
        $mail->isSMTP();                                            // Enviar usando SMTP
        $mail->Host       = 'smtp.office365.com';                   // Servidor SMTP de Outlook
        $mail->SMTPAuth   = true;                                   // Habilitar autenticación SMTP

        $mail->Username   = 'tu_correo@outlook.com';                // Reemplaza con tu correo de Outlook/Office 365
        $mail->Password   = 'tu_contraseña';                        // Reemplaza con tu contraseña de Outlook/Office 365

        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS; // Habilitar cifrado TLS
        $mail->Port       = 587;                                    // Puerto SMTP para TLS

        // Remitente (debe coincidir con el Username para evitar problemas de spoofing)
        $mail->setFrom('tu_correo@outlook.com', 'Tu Nombre del Remitente'); // Reemplaza con tu correo y nombre

        // Destinatario
        $mail->addAddress($to_email);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message_html;
        $mail->AltBody = !empty($message_plain) ? $message_plain : strip_tags($message_html); // Versión de texto plano

        $mail->send();
        return true;

    } catch (PHPMailer\PHPMailer\Exception $e) {
        error_log("Outlook Custom SMTP Error: " . $e->getMessage());
        error_log("PHPMailer Error Info: " . $mail->ErrorInfo);
        return false;
    }
}
