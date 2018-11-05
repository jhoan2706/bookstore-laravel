<?php

use Faker\Generator as Faker;

$factory->define(Prueba\Autor::class, function (Faker $faker) {
	$paises=Prueba\Pais::pluck('id')->toArray();
    return [
        'nombre'=>$faker->name,
        'apellido'=>$faker->lastName,
        'fecha_nacimiento'=>$faker->dateTime,
        'pais_id'=>$faker->randomElement($paises)
    ];
});
