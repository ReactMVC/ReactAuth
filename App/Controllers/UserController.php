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
        $get = $user->get(['id', 'name', 'email', 'role'], ['login_key' => $_COOKIE['login_key']]);

        if (!$get) {
            redirect('/login');
        } else {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                if (!isset($_POST['name']) || !isset($_POST['email']) || empty($_POST['name']) || empty($_POST['email'])) {
                    return;
                } else {
                    $user->update(['name' => $_POST['name'], 'email' => $_POST['email']], ['id' => $get[0]['id']]);
                }
            }
            $name = $get[0]['name'];
            $email = $get[0]['email'];
            $role = $get[0]['role'];
            $text = 'User';
            if ($role == 1) {
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