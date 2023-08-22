<?php

$users = [
    [
        'id' => 999999999,
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
        'id' => 999219999,
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
        'id' => 991119999,
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

$users = json_encode($users);
file_put_contents(__DIR__ . '/../data/users.json', $users);