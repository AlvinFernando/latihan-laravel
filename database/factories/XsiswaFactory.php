<?php

use Faker\Generator as Faker;

$factory->define(\App\Xsiswa::class, function (Faker $faker) {
    return [
        //
        'nama_depan' => $faker->name,
        'nama_belakang' => ''
        'jk' => $faker->randomElement(['P','W']),
        'agama' => $faker-randomElement(['Islam','Kristen','Katholik','Hindu','Budha','Kong Hu Chu']).
        'alamat' => $faker->name,
    ];
});
