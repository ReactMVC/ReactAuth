<?php

namespace ReactMVC\App\Controllers;

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Send
{
    public static function mail()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            view('errors.404');
            die();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['message']) || empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
                view('errors.404');
            } else {

                $name = $_POST['name'];
                $fromMail = $_POST['email'];
                $msg = $_POST['message'];

                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer();


                /*
                Start Email Options
                */

                // Set mailer to use smtp
                $mail->isSMTP();
                // define smtp host
                $mail->Host = $_ENV['MAIL_HOST'];
                // enable smtp authentication
                $mail->SMTPAuth = true;
                // set type of encryption (ssl / tls)
                $mail->SMTPSecure = $_ENV['MAIL_ENCRYPTION'];
                // set port to connect smtp
                $mail->Port = $_ENV['MAIL_PORT'];
                // set email username
                $mail->Username = $_ENV['MAIL_USERNAME'];
                // set email password
                $mail->Password = $_ENV['MAIL_PASSWORD'];
                // set email subject
                $mail->Subject = $_ENV['MAIL_SUBJECT'];
                // set email sender
                $mail->setFrom($fromMail, $name);
                // Enable html
                $mail->isHTML(true);
                // Enable UTF-8 Encode
                $mail->CharSet = "UTF-8";
                // Email body
                $mail->Body = "<p>$msg</p>";
                // Add recipients
                $mail->AddAddress($_ENV['MAIL_ADMIN']);
                // Finally send email
                if ($mail->Send()) {
                    echo "Email sent...!";
                } else {
                    echo "Error...!";
                }
                // Closing smtp connection
                $mail->smtpClose();
            }
        }
    }
}