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
                $mail->Host = "mail.reactmvc.ir";
                // enable smtp authentication
                $mail->SMTPAuth = true;
                // set type of encryption (ssl / tls)
                $mail->SMTPSecure = "ssl";
                // set port to connect smtp
                $mail->Port = 465;
                // set email username
                $mail->Username = "info@reactmvc.ir";
                // set email password
                $mail->Password = "apkapikapm12";
                // set email subject
                $mail->Subject = "ReactMVC";
                // set email sender
                $mail->setFrom($fromMail, $name);
                // Enable html
                $mail->isHTML(true);
                // Enable UTF-8 Encode
                $mail->CharSet = "UTF-8";
                // Email body
                $mail->Body = "<p>$msg</p>";
                // Add recipients
                $mail->AddAddress("h3dev.pira@gmail.com");
                $mail->AddAddress("hosseinpiradev@gmail.com");
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