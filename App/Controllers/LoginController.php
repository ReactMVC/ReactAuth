<?php

namespace ReactMVC\App\Controllers;

use ReactMVC\App\Models\User;

class LoginController
{
    public static function index()
    {
        session_start();

        $error = array();
        $database = new User();
        $get = array();


        if (isset($_SESSION['login_key']) || isset($_COOKIE['login_key'])) {
            $get = $database->get(['name', 'email', 'role', 'login_key'], ['login_key' => $_COOKIE['login_key']]);
        }

        if ($get and $get[0]['login_key'] == $_COOKIE['login_key'] || $get[0]['login_key'] == $_SESSION['login_key']) {
            header('Location: /dashboard');
            exit;
        } else {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (empty($_POST['email']) || empty($_POST['password']) || !isset($_POST['email']) || !isset($_POST['password'])) {
                    $error[] = 'Please enter your email and password.';
                } else {
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $user = $database->get(["id"], [
                        "email" => $email,
                        "password" => md5($password)
                    ]);

                    if ($user) {

                        do {
                            $key = base64_encode(random_bytes(40));
                            $check = $database->get(["id"], [
                                "login_key" => md5($key)
                            ]);
                        } while ($check);

                        $database->update(['login_key' => md5($key)], ['id' => $user[0]['id']]);
                        // successful login - set session and/or cookie
                        $_SESSION['login_key'] = md5($key);
                        setcookie('login_key', md5($key), time() + 3600);
                        header('Location: /dashboard');
                        exit;
                    } else {
                        $error[] = 'Invalid email or password.';
                    }
                }
            }

            $data = [
                'appName' => $_ENV['APP_NAME'],
                'error' => $error
            ];

            view('auth.login', $data);
        }
    }
}