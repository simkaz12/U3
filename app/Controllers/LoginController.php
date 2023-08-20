<?php
namespace Acc\Controllers;

use Acc\App;
use Acc\Auth;
use Acc\Msg;

class LoginController
{
    public function showLogin()
    {

        return App::view('auth/login', [
            'title' => 'Login Page',
            'showNav' => false,
        ]);
    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (Auth::attempt($email, $password)) {
            return App::redirect('/');
        } else {
            return App::redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        Msg::add('Loged Out');
        return App::redirect('');
    }
}