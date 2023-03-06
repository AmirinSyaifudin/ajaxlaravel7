<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Model;
use App\Cuti;
use Faker\Generator as Faker;

$factory->define(Cuti::class, function (Faker $faker) {
    return [
        //
        'no_induk'              => $faker->swiftBicNumber,
        'tanggal_cuti'          => $faker->date($format = 'Y-m-d', $max = 'now'),
        'lama_cuti'             => $faker->randomDigit,
        'keterangan'            => $faker->text,
    ];
});