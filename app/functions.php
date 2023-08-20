<?php

function sasId()
{
    $res = '';
    $pre = '01';
    $nums = '0123456789';
    foreach (range(1, 16) as $_) {
        $res .= $nums[(rand(0, 9))];
    }
    $accNum = 'LT ' . $pre . $res;
    return $accNum;
}

function flash()
{
    $_SESSION['flash'] = $_POST;
}

function clearFlash()
{
    unset($_SESSION['flash']);
}

function old($field)
{
    return $_SESSION['flash'][$field] ?? '';
}