<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Provinsi;
use Faker\Generator as Faker;

$factory->define(Provinsi::class, function (Faker $faker) {
    return [
        'nama_provinsi'   => $faker->sentence(4),
        'tanggal_jadi_provinsi'    => $faker->date($format = 'Y-m-d', $max = 'now'),
        'keterangan'      =>  $faker->text,
    ];
});
