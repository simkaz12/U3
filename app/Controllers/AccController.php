<?php
namespace Acc\Controllers;

use Acc\App;
use Acc\DB\File;

class AccController
{

    public function index()
    {

        return App::view('index', [
            'title' => 'U3 Bank',
        ]);
    }
    public function acc()
    {

        $accounts = (new File('users'))->showAll();

        return App::view('acc', [
            'title' => 'Account Info',
            'accounts' => $accounts,
        ]);
    }

    public function create()
    {

        return App::view('create', [
            'title' => 'Open New Acc',
        ]);
    }

    public function store()
    {


        $data = [
            'name' => $_POST['name'],
            'last' => $_POST['last'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'sex' => $_POST['sex'],
            'day' => $_POST['day'],
            'month' => $_POST['month'],
            'year' => $_POST['year'],
            'idNr' => $_POST['idNr'],

        ];

        (new File('users'))->create($_POST);

        return App::redirect('');
    }
}