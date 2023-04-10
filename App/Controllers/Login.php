<?php

namespace ReactMVC\App\Controllers;

use ReactMVC\App\Models\User;
use ReactMVC\App\Utilities\Asset;

class Login
{

    public static function index()
    {

        $database = new User();
        $login_error = null;
        // Check if the user is already logged in
        session_start();
        if (isset($_SESSION['user_id'])) {
            header("Location: /dashboard");
            exit;
        }

        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Validate email and password
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            if (empty($email) || empty($password)) {
                $error = "Please enter your email and password";
            } else {
                // Check if the email and password are correct
                $user = $database->get(["id", "name", "email", "role"], ["email" => $email, "password" => $password]);

                if ($user) {
                    // Set session variables and redirect to dashboard
                    $_SESSION['user_id'] = $database->get(["id"], ["email" => $email, "password" => $password]);
                    $_SESSION['user_name'] = $database->get(["name"], ["email" => $email, "password" => $password]);
                    $_SESSION['user_email'] = $database->get(["email"], ["email" => $email, "password" => $password]);
                    $_SESSION['user_role'] = $database->get(["role"], ["email" => $email, "password" => $password]);
                    header("Location: /dashboard");
                    exit;
                } else {
                    $login_error = "<p>Invalid email or password</p>";
                }
            }
        }
        $css = Asset::get('login.css');
        $data = [
            'appName' => $_ENV['APP_NAME'],
            'style' => $css,
            'error' => $login_error,
        ];
        view('index', $data);
    }
}