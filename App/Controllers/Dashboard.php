<?php

namespace ReactMVC\App\Controllers;

use ReactMVC\App\Utilities\Asset;

class Dashboard
{

    public static function index()
    {
        // Check if the user is logged in
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header('Location: /');
            exit();
        }

        $css = Asset::get('style.css');
        $user_name = $_SESSION['user_name'];
        $user_email = $_SESSION['user_email'];

        $data = [
            'user_name' => $user_name[0]['name'],
            'user_email' => $user_email[0]['email'],
            'style' => $css,
        ];

        view('dashboard', $data);
    }
}