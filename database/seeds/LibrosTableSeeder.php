<?php

use Illuminate\Database\Seeder;
use Bookstore\Libro;
use Bookstore\CategoriaLibro;

class LibrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $libros = factory(Bookstore\Libro::class, 40)->create();
    }
}
