<?php
namespace Acc;

use Acc\DB\File;

class Auth
{

    public static function attempt($email, $password): bool
    {

        $users = (new File('users'))->showAll();
        foreach ($users as $user) {
            if ($user['email'] == $email && $user['password'] == md5($password)) {

                $_SESSION['logged_in'] = true;
                $_SESSION['user'] = $user;
                return true;
            }
        }
        return false;
    }

    public function check()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            return true;
        }
        return false;
    }

    public static function user()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        return null;
    }

    public static function logout()
    {
        $_SESSION['logged_in'] = false;
        unset($_SESSION['user']);
    }
}