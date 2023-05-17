<?php

namespace ReactMVC\App\Controllers;

class LogoutController
{
    public static function index()
    {
        session_start();
        if (isset($_COOKIE['login_key'])) {
            session_destroy();
            setcookie('login_key', '', time() - 3600);
        }
        header('Location: /login');
        exit;
    }
}