<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Karyawan;
use App\Cuti;

use Faker\Generator as Faker;

$factory->define(Karyawan::class, function (Faker $faker) {

    $randomNumber = rand(1, 100);
    $cover = "https://picsum.photos/{$randomNumber}/237/200/300";

    return [
        //
        'no_induk'              => $faker->unique()->swiftBicNumber,
        'nama'                  => $faker->name,
        'alamat'                => $faker->address,
        'tanggal_lahir'         => $faker->date($format = 'Y-m-d', $max = 'now'),
        'tanggal_bergabung'     => $faker->date($format = 'Y-m-d', $max = 'now'),
        'cover'                 => $cover,
    ];
});
