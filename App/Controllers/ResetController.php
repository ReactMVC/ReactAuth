<?php

namespace ReactMVC\App\Controllers;

use ReactMVC\App\Models\User;

class ResetController
{
    public static function index()
    {
        global $request;
        session_start();

        $error = array();
        $database = new User();
        $id = $request->get_route_param('id');
        $login_key = $request->get_route_param('key');
        $get = array();
        $ok = array();


        if (isset($_SESSION['login_key']) || isset($_COOKIE['login_key'])) {
            $get = $database->get(['name', 'email', 'role', 'login_key'], ['login_key' => $_COOKIE['login_key']]);
        }

        if ($get and $get[0]['login_key'] == $_COOKIE['login_key'] || $get[0]['login_key'] == $_SESSION['login_key']) {
            header('Location: /dashboard');
            exit;
        } else {
            $user = $database->get(["id", "name"], [
                'id' => $id,
                "login_key" => $login_key
            ]);
            if (!$user) {
                redirect('/');
                exit;
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                if ($user) {
                    if (empty($_POST['new_password']) || !isset($_POST['new_password']) || empty($_POST['repeat_password']) || !isset($_POST['repeat_password'])) {
                        $error[] = 'Please fill in all required fields.';
                    } else {
                        $new_password = $_POST['new_password'];
                        $repeat_password = $_POST['repeat_password'];

                        if ($new_password == $repeat_password) {

                            do {
                                $key = base64_encode(random_bytes(40));
                                $check = $database->get(["id"], [
                                    "login_key" => md5($key)
                                ]);
                            } while ($check);

                            $database->update(['login_key' => md5($key), 'password' => md5($new_password)], ['id' => $user[0]['id']]);
                            $ok[] = "Password changed successfully...! Redirect in 3 seconds";
                            refresh(3, '/login');

                        } else {
                            $error[] = 'Passwords do not match';
                        }
                    }
                } else {
                    redirect('/');
                    exit;
                }
            }

            $data = [
                'appName' => $_ENV['APP_NAME'],
                'error' => $error,
                'ok' => $ok
            ];

            view('auth.reset', $data);
        }
    }
}