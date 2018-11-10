<?php

use Faker\Generator as Faker;

$factory->define(Prueba\Libro::class, function (Faker $faker) {
    $categorias = Prueba\CategoriaLibro::pluck('id')->toArray();
    return [
        'nombre' => $faker->name,
        'resumen' => $faker->paragraph(3, true),
        'n_paginas' => $faker->numberBetween(20, 300),
        'precio' => $faker->numberBetween($min = 1000, $max = 900000),
        'fecha_publicacion' => $faker->date('Y-m-d', 'now'),
        'categoria_libro_id' => $faker->randomElement($categorias),
        'editorial_id' => $faker->numberBetween(1, 10),
        'libreria_id' => $faker->numberBetween(1, 10),
    ];
});
