<?php
namespace Acc\Controllers;

use Acc\App;
use Acc\DB\File;
use Acc\Msg;

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
        $errors = false;
        if (!isset($_POST['name']) || strlen($_POST['name']) < 3) {
            Msg::add('Name must be at least 3 characters long', 'danger');
            $errors = true;
        }
        if (!isset($_POST['last']) || strlen($_POST['last']) < 3) {
            Msg::add('Last name must be at least 3 characters long', 'danger');
            $errors = true;
        }
        if (!isset($_POST['password']) || strlen($_POST['password']) < 6) {
            Msg::add('Password must be at least 3 characters long', 'danger');
            $errors = true;
        }
        if (!isset($_POST['idNr']) || strlen($_POST['idNr']) < 11) {
            Msg::add('Identification number must be 11 characters long', 'danger');
            $errors = true;
        }
        if ($errors) {
            flash();
            return App::redirect('/create');
        }

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

        (new File('users'))->create($data);
        Msg::add('Account Created');

        return App::redirect('');
    }

    public function destroy($id)
    {

        (new File('users'))->delete($id);
        Msg::add('Account Deleted');

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
        Msg::add('Funds Added');

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
        Msg::add('Funds Withdrawn');

        return App::redirect('/acc');
    }
}