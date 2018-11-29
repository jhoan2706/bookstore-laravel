<?php

use Illuminate\Database\Seeder;
use Bookstore\CategoriaLibro;

class CategoriaLibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = new CategoriaLibro();
        $categoria->descripcion = "Educacion";
        $categoria->save();

        $categoria = new CategoriaLibro();
        $categoria->descripcion = "Computacion e Internet";
        $categoria->save();

        $categoria = new CategoriaLibro();
        $categoria->descripcion = "Arte";
        $categoria->save();

        $categoria = new CategoriaLibro();
        $categoria->descripcion = "Drama";
        $categoria->save();

        $categoria = new CategoriaLibro();
        $categoria->descripcion = "Filosofía";
        $categoria->save();
    }
}
