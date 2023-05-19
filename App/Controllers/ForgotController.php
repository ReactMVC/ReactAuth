<?php

namespace ReactMVC\App\Controllers;

use ReactMVC\App\Models\User;

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ForgotController
{
    public static function index()
    {
        session_start();

        $error = array();
        $database = new User();
        $get = array();
        $ok = array();


        if (isset($_SESSION['login_key']) || isset($_COOKIE['login_key'])) {
            $get = $database->get(['name', 'email', 'role', 'login_key'], ['login_key' => $_COOKIE['login_key']]);
        }

        if ($get and $get[0]['login_key'] == $_COOKIE['login_key'] || $get[0]['login_key'] == $_SESSION['login_key']) {
            header('Location: /dashboard');
            exit;
        } else {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (empty($_POST['email']) || !isset($_POST['email'])) {
                    $error[] = 'Please enter your email.';
                } else {
                    $email = $_POST['email'];

                    $user = $database->get(["id", "name"], [
                        "email" => $email,
                    ]);

                    if ($user) {

                        do {
                            $key = base64_encode(random_bytes(40));
                            $check = $database->get(["id"], [
                                "login_key" => md5($key)
                            ]);
                        } while ($check);

                        $userName = $user[0]['name'];
                        $appURL = $_ENV['APP_URL'] . '/reset/' . $user[0]['id'] . '/' . md5($key);

                        $database->update(['login_key' => md5($key)], ['id' => $user[0]['id']]);

                        $msg = "<div dir='ltr'><h1>" . $_ENV['APP_NAME'] . "</h1><hr><h2>Hello $userName </h2><br><p>for reset your password, please click on this link:</p><br><a href='$appURL'>$appURL</a></div>";
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
                        $mail->Subject = $_ENV['MAIL_SUBJECT'] . ' - Reset Password';
                        // set email sender
                        $mail->setFrom($_ENV['MAIL_FROM'], $_ENV['MAIL_NAME']);
                        // Enable html
                        $mail->isHTML(true);
                        // Enable UTF-8 Encode
                        $mail->CharSet = "UTF-8";
                        // Email body
                        $mail->Body = $msg;
                        // Add recipients
                        $mail->AddAddress($_ENV['MAIL_ADMIN']);
                        // Finally send email
                        if ($mail->Send()) {
                            $ok[] = "Email sent...! Refresh in 3 seconds";
                            refresh(3, '/');
                        } else {
                            $error[] = "Error...!";
                        }
                        // Closing smtp connection
                        $mail->smtpClose();
                    } else {
                        $error[] = 'Invalid email.';
                    }
                }
            }

            $data = [
                'appName' => $_ENV['APP_NAME'],
                'error' => $error,
                'ok' => $ok
            ];

            view('auth.forgot', $data);
        }
    }
}