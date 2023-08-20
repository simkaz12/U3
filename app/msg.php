<?php
namespace Acc;



class Msg
{
    public static function add($text, $type = 'info')
    {
        if (!isset($_SESSION['msg'])) {
            $_SESSION['msg'] = [];
        }
        $_SESSION['msg'][] = [
            'text' => $text,
            'type' => $type,
        ];
    }

    public static function get()
    {
        if (isset($_SESSION['msg'])) {
            $msg = $_SESSION['msg'];
            unset($_SESSION['msg']);
            return $msg;
        }
        return [];
    }
}