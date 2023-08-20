<?php
use Acc\App;

session_start();

define('ROOT', __DIR__ . '/../'); //serverio path
define('URL', 'http://u3.test'); //narsykles path

require '../app/functions.php';
require '../vendor/autoload.php';

echo App::start();