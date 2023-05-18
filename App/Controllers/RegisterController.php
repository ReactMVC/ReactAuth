<?php

namespace ReactMVC\App\Controllers;

use ReactMVC\App\Models\User;

class RegisterController
{
    public static function index()
    {
        session_start();
        $database = new User();
        $error = array();
        $get = array();


        if (isset($_SESSION['login_key']) and isset($_COOKIE['login_key'])) {
            $get = $database->get(['name', 'email', 'role', 'login_key'], ['login_key' => $_COOKIE['login_key']]);
        }

        if ($get and $get[0]['login_key'] == $_COOKIE['login_key'] || $get[0]['login_key'] == $_SESSION['login_key']) {
            header('Location: /dashboard');
            exit;
        } else {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || !isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['password'])) {
                    $error[] = 'Please fill in all required fields.';
                } else {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = md5($_POST['password']);
                    $role = 0;
                    $user_data = [
                        'name' => $name,
                        'email' => $email,
                        'password' => $password,
                        'role' => $role
                    ];
                    $new = $database->get(['email'], ['email' => $email]);

                    if ($new == []) {
                        $database->create($user_data);
                        header('Location: /login');
                        exit;
                    } else {
                        $error[] = "Duplicate email.";
                    }
                }
            }

            $data = [
                'appName' => $_ENV['APP_NAME'],
                'error' => $error,
            ];
            view('auth.register', $data);
        }
    }
}