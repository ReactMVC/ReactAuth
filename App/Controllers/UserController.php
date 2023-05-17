<?php

namespace ReactMVC\App\Controllers;

use ReactMVC\App\Models\User;

class UserController
{
    public static function index()
    {
        session_start();

        // check if user is logged in
        if (!isset($_SESSION['login_key']) and !isset($_COOKIE['login_key'])) {
            header('Location: /login');
            exit;
        }


        $user = new User();

        $get = $user->get(['name', 'email', 'role'], ['login_key' => $_COOKIE['login_key']]);
        if (!$get) {
            redirect('/login');
        } else {
            $name = $get[0]['name'];
            $email = $get[0]['email'];
            $role = $get[0]['role'];
            $text = 'User';
            if($role == 1){
                $text = 'Admin';
            }

            $data = [
                'name' => $name,
                'email' => $email,
                'role' => $text
            ];
            view('pages.dashboard', $data);
        }
    }
}