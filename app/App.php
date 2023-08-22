<?php
namespace Acc;

use Acc\Controllers\AccController as AC;
use Acc\Controllers\LoginController as LC;
use Acc\Auth;
use Acc\Msg;

class App
{

    public static function start()
    {
        return self::router();

    }

    public static function router()
    {

        $uri = $_SERVER['REQUEST_URI'];
        $uri = explode('/', $uri);
        array_shift($uri);
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == 'GET' && count($uri) == 1 && $uri[0] == '') {
            return (new AC)->index();
        }
        if ($method == 'GET' && count($uri) == 1 && $uri[0] == 'login') {
            return (new LC)->showLogin();
        }
        if ($method == 'POST' && count($uri) == 1 && $uri[0] == 'login') {
            return (new LC)->login();
        }
        if ($method == 'POST' && count($uri) == 1 && $uri[0] == 'logout') {
            return (new LC)->logout();
        }



        if ($method == 'GET' && count($uri) == 1 && $uri[0] == 'create') {
            return (new AC)->create();
        }
        if ($method == 'POST' && count($uri) == 1 && $uri[0] == 'store') {
            return (new AC)->store();
        }
        if ($method == 'GET' && count($uri) == 1 && $uri[0] == 'acc') {
            return (new AC)->acc();
        }
        if ($method == 'GET' && count($uri) == 2 && $uri[0] == 'more') {
            return (new AC)->more($uri[1]);
        }
        if ($method == 'GET' && count($uri) == 2 && $uri[0] == 'add') {
            return (new AC)->add($uri[1]);
        }
        if ($method == 'GET' && count($uri) == 2 && $uri[0] == 'withdraw') {
            return (new AC)->withdraw($uri[1]);
        }
        if ($method == 'POST' && count($uri) == 2 && $uri[0] == 'plus') {
            return (new AC)->plus($uri[1]);
        }
        if ($method == 'POST' && count($uri) == 2 && $uri[0] == 'minus') {
            return (new AC)->minus($uri[1]);
        }
        if ($method == 'GET' && count($uri) == 2 && $uri[0] == 'delete') {
            return (new AC)->delete($uri[1]);
        }
        if ($method == 'POST' && count($uri) == 2 && $uri[0] == 'destroy') {
            return (new AC)->destroy($uri[1]);
        }





        http_response_code(404);
        return self::error('404');
    }

    public static function view($path, $data = null)
    {

        if ($data) {
            extract($data);
        }

        $user = Auth::user();
        $msg = Msg::get();
        ob_start();

        require ROOT . 'resources/view/layout/top.php';
        require ROOT . 'resources/view/' . $path . '.php';
        require ROOT . 'resources/view/layout/bottom.php';

        clearFlash();
        return ob_get_clean();
    }

    public static function error($path)
    {

        ob_start();

        require ROOT . 'resources/view/errors/' . $path . '.php';

        clearFlash();

        return ob_get_clean();
    }

    public static function redirect($url)
    {

        header('Location: ' . URL . $url);
        return;
    }
}