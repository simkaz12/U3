<?php

use Faker\Factory as Faker;

require __DIR__ . '/../vendor/autoload.php';

$faker = Faker::create();

$users = [];



$users[] = [
    [
        'id' => rand(100000000, 999999999),
        'name' => $faker->name($gender = 'male' | 'female'),
        'last' => $faker->lastName,
        'email' => 'admin@email.com',
        'password' => md5('adminas'),
        'sex' => rand(0, 1) ? 'male' : 'female',
        'idNr' => 11111111111,
        'sasId' => 'LT111111112222222222',
        'day' => rand(1, 31),
        'month' => rand(1, 12),
        'year' => rand(1945, 2023),
        'sum' => rand(0, 5000),
        'role' => 'admin',
    ],
    [
        'id' => rand(100000000, 999999999),
        'name' => $faker->name($gender = 'male' | 'female'),
        'last' => $faker->lastName,
        'email' => 'kebas@email.com',
        'password' => md5('123456'),
        'sex' => rand(0, 1) ? 'male' : 'female',
        'idNr' => 11111111111,
        'sasId' => 'LT111111112222222222',
        'day' => rand(1, 31),
        'month' => rand(1, 12),
        'year' => rand(1945, 2023),
        'sum' => rand(0, 5000),
        'role' => 'user',
    ],
    [
        'id' => rand(100000000, 999999999),
        'name' => $faker->name($gender = 'male' | 'female'),
        'last' => $faker->lastName,
        'email' => 'ponas@email.com',
        'password' => md5('123456'),
        'sex' => rand(0, 1) ? 'male' : 'female',
        'idNr' => 11111111111,
        'sasId' => 'LT111111112222222222',
        'day' => rand(1, 31),
        'month' => rand(1, 12),
        'year' => rand(1945, 2023),
        'sum' => rand(0, 5000),
        'role' => 'user',
    ]
];

$users = json_encode($users);
file_put_contents(__DIR__ . '/../data/users.json', $users);