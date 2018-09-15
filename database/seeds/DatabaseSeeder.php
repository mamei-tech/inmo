<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name' => 'Antonio',
            'email' => 'antonio@gmail.com',
            'password' => bcrypt('User*123'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('promotion')->insert([
            'title_es' => '¿SABES QUE?',
            'title_en' => 'DO YOU KNOW THAT?',
            'text_es' => 'asdas as dasdas das das das dasas dasdasasas das das dasd assad asd asd asdas
                dasdsadasdsad dasas dasd asdasdas dasas das',
            'text_en' => 'asdas as dasdas das das das dasas dasdasasas das das dasd assad asd asd asdas
                dasdsadasdsad dasas dasd asdasdas dasas das',
            'link' => 'Antonio',
            'image' => '/storage/promotions/O7rubZ6qjaXArZ9OcgXXOMyFU3eAkHcPtLd4mhHi.jpeg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('promotion')->insert([
            'title_es' => 'HOY ES TU DIA!',
            'title_en' => 'TODAY IS YOUR DAY!',
            'text_es' => 'asdas as dasdas das das das dasas dasdasasas das das dasd assad asd asd asdas
                dasdsadasdsad dasas dasd asdasdas dasas das',
            'text_en' => 'asdas as dasdas das das das dasas dasdasasas das das dasd assad asd asd asdas
                dasdsadasdsad dasas dasd asdasdas dasas das',
            'link' => 'Antonio',
            'image' => '/storage/promotions/oPdonVXG2jEvebYU9pcaAc0R3ser2f2iEcB3Ovh0.jpeg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('promotion')->insert([
            'title_es' => 'YOUR HOME FROM THE BEACH',
            'title_en' => 'YOUR HOME FROM THE BEACH',
            'text_es' => 'asdas as dasdas das das das dasas dasdasasas das das dasd assad asd asd asdas
                dasdsadasdsad dasas dasd asdasdas dasas das',
            'text_en' => 'asdas as dasdas das das das dasas dasdasasas das das dasd assad asd asd asdas
                dasdsadasdsad dasas dasd asdasdas dasas das',
            'link' => 'Antonio',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('promotion')->insert([
            'title_es' => 'GREAT HOMES IN BRICKELL TO LOW PRICES',
            'title_en' => 'GREAT HOMES IN BRICKELL TO LOW PRICES',
            'text_es' => 'asdas as dasdas das das das dasas dasdasasas das das dasd assad asd asd asdas
                dasdsadasdsad dasas dasd asdasdas dasas das',
            'text_en' => 'asdas as dasdas das das das dasas dasdasasas das das dasd assad asd asd asdas
                dasdsadasdsad dasas dasd asdasdas dasas das',
            'link' => 'Antonio',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('promotion')->insert([
            'title_es' => 'ROLAND FRANK',
            'title_en' => 'ROLAND FRANK',
            'text_es' => 'asdas as dasdas das das das dasas dasdasasas das das dasd assad asd asd asdas
                dasdsadasdsad dasas dasd asdasdas dasas das',
            'text_en' => 'asdas as dasdas das das das dasas dasdasasas das das dasd assad asd asd asdas
                dasdsadasdsad dasas dasd asdasdas dasas das',
            'link' => 'Antonio',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}
