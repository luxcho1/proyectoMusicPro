<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class ProductoTableData extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        foreach(range(1,10) as $index){
            DB::table('productos')->insert([
                'Nombre' => $faker->name,
                'Codigo' => rand(1,9999),
                'Descripcion' => $faker->sentence,
                'Precio' => rand(1000,999999),
                'Stock' => rand(1,50),
                'Foto' => $faker->imageUrl(640, 480, 'animals', true)
                //php artisan db:seed
            ]);
        }
    }
}
