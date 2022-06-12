<?php
// C'est ok ça fonctionne le 13 decembre 2019
require "PHPMailer.php";
require "SMTP.php";
require "Exception.php";

class EMail
{
    public function sendMail($MailDestinataire, $NomDestinataire, $Objet, $MessageHTML, $MessageBrut){

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 2;   //2;  // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'felix31320@gmail.com';   //'<mon adresse mail>';  // SMTP username
            $mail->Password = 'motdepasse';                       //<mon mot de passe messagerie>';    // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('felix31320@gmail.com', 'Mailer');
            $mail->addAddress($MailDestinataire, $NomDestinataire);     // Add a recipient
            //$mail->addAddress('ericweiss@wanadoo.fr', 'WEISS Eric');     // Add a recipient
            #$mail->addAddress('ellen@example.com');               // Name is optional
            #$mail->addReplyTo('info@example.com', 'Information');
            #$mail->addCC('cc@example.com');
            #$mail->addBCC('bcc@example.com');

            //Attachments
            #$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            #$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            //$mail->Subject = 'Here is the subject';  // Objet
            $mail->Subject = $Objet;  // Objet
            //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';  // Message en HTML
            $mail->Body    = $MessageHTML;  // Message en HTML
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; // Message sans HTML
            $mail->AltBody = $MessageBrut; // Message sans HTML

            $mail->send();

            //echo 'Message has been sent';
            return true;
        } catch (Exception $e) {
            return false;
            //echo 'Message could not be sent.';
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
        }

    }
}