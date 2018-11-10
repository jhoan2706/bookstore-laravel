<?php

use Illuminate\Database\Seeder;
use Prueba\Libro;
use Prueba\CategoriaLibro;

class LibrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $libros = factory(Prueba\Libro::class, 40)->create();
    }
}
