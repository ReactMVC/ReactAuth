<?php

namespace ReactMVC\App\Controllers;

use ReactMVC\App\Models\User;
use ReactMVC\App\Utilities\Asset;

class Register
{
    public static function index()
    {
        // Check if the user is already logged in
        session_start();
        if (isset($_SESSION['user_id'])) {
        header("Location: /dashboard");
        exit; 
        }
        $register_error = null;
        $database = new User();
        $css = Asset::get('register.css');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
 
            if ($new == []){
            $database->create($user_data);
            header('Location: /');
            exit;
            }else{
                $register_error = "<p>Duplicate email.</p>";
            }
        }

        $data = [
            'appName' => $_ENV['APP_NAME'],
            'style' => $css,
            'error' => $register_error,
        ];
        view('register', $data);
    }
}
