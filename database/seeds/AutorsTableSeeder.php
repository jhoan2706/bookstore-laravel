<?php

use Illuminate\Database\Seeder;
use Prueba\Autor;
use Prueba\Libro;
use Prueba\CategoriaLibro;
use Prueba\Pais;

class AutorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pais1 = Pais::where('nombre', 'COLOMBIA')->first();
        $pais2 = Pais::where('nombre', 'BELGICA')->first();
        $pais3 = Pais::where('nombre', 'BRASIL')->first();

        $libro1 = CategoriaLibro::where('descripcion','Arte')->first();
        $libro2 = Libro::where('nombre', 'Mr. Vern Champlin')->first();
        $libro3 = Libro::where('nombre', 'Dr. Johanna Considine MD')->first();

        /* $autor = new Autor();
        $autor->nombre = "Autor";
        $autor->apellido = "Prueba";
        $autor->fecha_nacimiento = "1985-03-12";
        $autor->pais_id = $pais3->id;
        $autor->save(); */
        $autor=Autor::where('nombre','Gonzalo')->first();
        $autor->libros()->attach($libro3);
        //$autor->libros()->attach($libro_educacion);
        //$autores=factory(Prueba\Autor::class,30)->create();


    }
}
