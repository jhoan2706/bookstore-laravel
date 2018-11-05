<?php

use Illuminate\Database\Seeder;
use Prueba\Autor;
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
/*    	$pais1=Pais::where('nombre','COLOMBIA')->first();        
    	$pais2=Pais::where('nombre','BELGICA')->first();
    	$pais3=Pais::where('nombre','BRASIL')->first();

    	// for ($i=0; $i <10 ; $i++) { 
    	// 	$random_number=rand(2,244);
    	// }
    	$autor=new Autor();
    	$autor->nombre="Martin";
    	$autor->apellido="Lopez";
    	$autor->fecha_nacimiento="1998-10-12";
    	$autor->pais_id=$pais1->id;
    	$autor->save();

    	$autor=new Autor();
    	$autor->nombre="Lucas";
    	$autor->apellido="Ramirez";
    	$autor->fecha_nacimiento="1988-06-12";
    	$autor->pais_id=$pais2->id;
    	$autor->save();

    	$autor=new Autor();
    	$autor->nombre="Jorgio";
    	$autor->apellido="Moura";
    	$autor->fecha_nacimiento="1994-04-11";
    	$autor->pais_id=$pais3->id;
    	$autor->save();

    	$autor=new Autor();
    	$autor->nombre="Rodrigo";
    	$autor->apellido="Dihno";
    	$autor->fecha_nacimiento="1984-04-11";
    	$autor->pais_id=$pais1->id;
    	$autor->save();*/

    	$autores=factory(Prueba\Autor::class,30)->create();
    }
}
