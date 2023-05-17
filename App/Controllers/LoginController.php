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
        $get = $database->get(['name', 'email', 'role'], ['login_key' => $_COOKIE['login_key']]);

        if ($get) {
            header('Location: /dashboard');
            exit;
        } else {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $email = $_POST['email'];
                $password = $_POST['password'];

                if (empty($email) || empty($password) || !isset($email) || !isset($password)) {
                    $error[] = 'Please enter your email and password.';
                } else {
                    $user = $database->get(["id"], [
                        "email" => $email,
                        "password" => md5($password)
                    ]);

                    if ($user) {
                        $key = base64_encode(random_bytes(40));
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