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
    public function more($id)
    {
        $user = (new File('users'))->show($id);

        return App::view('more', [
            'title' => 'Account',
            'user' => $user,
        ]);
    }
    public function add($id)
    {
        $user = (new File('users'))->show($id);

        return App::view('add', [
            'title' => 'Add Funds',
            'user' => $user,
        ]);
    }
    public function withdraw($id)
    {
        $user = (new File('users'))->show($id);

        return App::view('withdraw', [
            'title' => 'Withdraw Funds',
            'user' => $user,
        ]);
    }
    public function delete($id)
    {
        $user = (new File('users'))->show($id);

        return App::view('delete', [
            'title' => 'Confirm Deletion',
            'user' => $user,
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
            'sasId' => $_POST['sasId'],
        ];

        (new File('users'))->create($_POST);

        return App::redirect('');
    }

    public function destroy($id)
    {

        (new File('users'))->delete($id);

        return App::redirect('/acc');
    }
    public function plus($id, $plus)
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
            'sum' => $_POST['sum'],
            'id' => $_POST['id'],
            'sasId' => $_POST['sasId'],
        ];

        (new File('users'))->plus($id, $data, $plus);

        return App::redirect('/acc');
    }
    public function minus($id, $minus)
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
            'sum' => $_POST['sum'],
            'id' => $_POST['id'],
            'sasId' => $_POST['sasId'],
        ];

        (new File('users'))->minus($id, $data, $minus);

        return App::redirect('/acc');
    }
}