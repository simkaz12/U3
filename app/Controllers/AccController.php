<?php
namespace Acc\Controllers;

use Acc\App;
use Acc\DB\Storage;
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

        $accounts = Storage::getStorage('accounts')->showAll();

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
        $acc = Storage::getStorage('accounts')->show($id);

        return App::view('more', [
            'title' => 'Account',
            'acc' => $acc,
        ]);
    }
    public function add($id)
    {
        $user = Storage::getStorage('accounts')->show($id);

        return App::view('add', [
            'title' => 'Add Funds',
            'acc' => $user,
        ]);
    }
    public function withdraw($id)
    {
        $user = Storage::getStorage('accounts')->show($id);

        return App::view('withdraw', [
            'title' => 'Withdraw Funds',
            'acc' => $user,
        ]);
    }
    public function delete($id)
    {
        $user = Storage::getStorage('accounts')->show($id);

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

        Storage::getStorage('accounts')->create($data);
        Msg::add('Account Created');

        return App::redirect('');
    }

    public function destroy($id)
    {
        $user = Storage::getStorage('accounts')->show($id);

        if ($user['sum'] == 0) {

            Storage::getStorage('accounts')->delete($id);

            Msg::add('Account Deleted');
            return App::redirect('/acc');
        } else {
            Msg::add('Account with funds cannot be deleted', 'danger');
            return App::redirect('/acc');
        }
    }
    public function plus($id)
    {

        $user = Storage::getStorage('accounts')->show($id);

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

        Storage::getStorage('accounts')->update($id, $data);
        Msg::add('Funds Added');

        return App::redirect('/acc');
    }
    public function minus($id)
    {
        $user = Storage::getStorage('accounts')->show($id);
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

        Storage::getStorage('accounts')->update($id, $data);
        Msg::add('Funds Withdrawn');

        return App::redirect('/acc');
    }
}