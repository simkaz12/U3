<?php

$host = '127.0.0.1';
$db = 'kolibris';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $user, $pass, $options);

$users = [
    [
        'name' => 'admin',
        'last' => 'admin',
        'email' => 'admin@email.com',
        'password' => md5('123'),
        'sex' => 'Male',
        'idNr' => 12312312312,
        'sasId' => 'LT 013122632062259566',
        'day' => rand(1, 31),
        'month' => rand(1, 12),
        'year' => rand(1945, 2023),
        'sum' => rand(0, 5000),
        'role' => 'admin',
    ],
    [
        'name' => 'antras',
        'last' => 'antras',
        'email' => 'admsdsdin@email.com',
        'password' => md5('123'),
        'sex' => 'Male',
        'idNr' => 12312312312,
        'sasId' => 'LT 013122632062259566',
        'day' => rand(1, 31),
        'month' => rand(1, 12),
        'year' => rand(1945, 2023),
        'sum' => rand(0, 5000),
        'role' => 'user',
    ],
    [
        'name' => 'trecias',
        'last' => 'trecias',
        'email' => 'adsdsd@email.com',
        'password' => md5('123'),
        'sex' => 'Male',
        'idNr' => 12312312312,
        'sasId' => 'LT 013122632062259566',
        'day' => rand(1, 31),
        'month' => rand(1, 12),
        'year' => rand(1945, 2023),
        'sum' => rand(0, 5000),
        'role' => 'user',
    ]
];

foreach ($users as $user) {
    $sql = "
        INSERT INTO accounts (name, last, email, password, sex, idNr, sasId, day, month, year, sum, role)
        VALUES (? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? )
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user['name'], $user['last'], $user['email'], $user['password'], $user['sex'], $user['idNr'], $user['sasId'], $user['day'], $user['month'], $user['year'], $user['sum'], $user['role']]);
}

echo 'Done' . PHP_EOL;