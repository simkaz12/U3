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
        $acc = (new File('users'))->show($id);

        return App::view('more', [
            'title' => 'Account',
            'acc' => $acc,
        ]);
    }
    public function add($id)
    {
        $user = (new File('users'))->show($id);

        return App::view('add', [
            'title' => 'Add Funds',
            'acc' => $user,
        ]);
    }
    public function withdraw($id)
    {
        $user = (new File('users'))->show($id);

        return App::view('withdraw', [
            'title' => 'Withdraw Funds',
            'acc' => $user,
        ]);
    }
    public function delete($id)
    {
        $user = (new File('users'))->show($id);

        return App::view('delete', [
            'title' => 'Confirm Deletion',
            'acc' => $user,
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
        $user = (new File('users'))->show($id);

        if ($user['sum'] == 0) {

            (new File('users'))->delete($id);

            Msg::add('Account Deleted');
            return App::redirect('/acc');
        } else {
            Msg::add('Account with funds cannot be deleted', 'danger');
            return App::redirect('/acc');
        }
    }
    public function plus($id)
    {

        $user = (new File('users'))->show($id);

        $data = [
            'name' => $user['name'],
            'last' => $user['last'],
            'email' => $user['email'],
            'password' => $user['password'],
            'sex' => $user['sex'],
            'day' => $user['day'],
            'month' => $user['month'],
            'year' => $user['year'],
            'idNr' => $user['idNr'],
            'sum' => $user['sum'] + $_POST['plus'],
            'id' => $user['id'],
            'sasId' => $user['sasId'],
        ];

        (new File('users'))->update($id, $data);
        Msg::add('Funds Added');

        return App::redirect('/acc');
    }
    public function minus($id)
    {
        $user = (new File('users'))->show($id);
        $suma = 0;

        if ($user['sum'] - $_POST['minus'] <= 0) {
            $suma = 0;
        } else {
            $suma = $user['sum'] - $_POST['minus'];
        }

        $data = [
            'name' => $user['name'],
            'last' => $user['last'],
            'email' => $user['email'],
            'password' => $user['password'],
            'sex' => $user['sex'],
            'day' => $user['day'],
            'month' => $user['month'],
            'year' => $user['year'],
            'idNr' => $user['idNr'],
            'sum' => $suma,
            'id' => $user['id'],
            'sasId' => $user['sasId'],
        ];

        (new File('users'))->update($id, $data);
        Msg::add('Funds Withdrawn');

        return App::redirect('/acc');
    }
}