<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name' => 'Antonio',
            'email' => 'antonio@gmail.com',
            'password' => bcrypt('User*123'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

//        factory(App\User::class, 20)->create()->each(function ($u) {
//            //$u->posts()->save(factory(App\Post::class)->make());
//        });

        DB::table('promotion')->insert([
            'title_es' => '¿SABES QUE?',
            'title_en' => 'DO YOU KNOW THAT?',
            'image' => 'public/promotions/gbxatWeHx2daxP4NdZPbDgdrJ7alqXSfprmFPFqi.jpeg',
            'text_es' =>  $faker->paragraph,
            'text_en' =>  $faker->paragraph,
            'link' => $faker->url,
            'created_at' => '2012-10-29 23:42:29',
            'updated_at' => $faker->dateTime
        ]);

        DB::table('promotion')->insert([
            'title_es' => 'HOY ES TU DIA!',
            'title_en' => 'TODAY IS YOUR DAY!',
            'image' => 'public/promotions/pRuKbSK0Fq34k80PYhumiDODf3MzR10PwBGqlDoF.jpeg',
            'text_es' =>  $faker->paragraph,
            'text_en' =>  $faker->paragraph,
            'link' => $faker->url,
            'created_at' => '2011-10-29 23:42:29',
            'updated_at' => $faker->dateTime
        ]);

        DB::table('promotion')->insert([
            'title_es' => 'YOUR HOME FROM THE BEACH',
            'title_en' => 'YOUR HOME FROM THE BEACH',
            'text_es' =>  $faker->paragraph,
            'text_en' =>  $faker->paragraph,
            'link' => $faker->url,
            'created_at' => '2011-10-29 23:42:29',
            'updated_at' => $faker->dateTime
        ]);

        DB::table('promotion')->insert([
            'title_es' => 'GREAT HOMES IN BRICKELL TO LOW PRICES',
            'title_en' => 'GREAT HOMES IN BRICKELL TO LOW PRICES',
            'text_es' =>  $faker->paragraph,
            'text_en' =>  $faker->paragraph,
            'link' => $faker->url,
            'created_at' => '2010-10-29 23:42:29',
            'updated_at' => $faker->dateTime
        ]);

        DB::table('promotion')->insert([
            'title_es' => 'ROLAND FRANK',
            'title_en' => 'ROLAND FRANK',
            'text_es' =>  $faker->paragraph,
            'text_en' =>  $faker->paragraph,
            'link' => $faker->url,
            'created_at' => '2009-10-29 23:42:29',
            'updated_at' => $faker->dateTime
        ]);

        DB::table('slider')->insert([
            'title_es' => 'SU NUEVO HOGAR ESTÁ A UNA LLAMADA DE DISTANCIA',
            'title_en' => 'YOUR NEW HOME IS A PHONE CALL AWAY',
            'subtitle_es' => '¡llámame hoy!',
            'subtitle_en' => 'call me today!',
            'image' => 'public/slider/imZeGxGdGZP4otEOWIWXpjUEnwQOred1KKqttQO8.jpeg',
            'created_at' => '2013-10-29 23:42:29',
            'updated_at' => $faker->dateTime
        ]);

        DB::table('slider')->insert([
            'title_es' => 'USTED PUEDE VIVIR EN LO MEJOR DE MIAMI ',
            'title_en' => 'YOU CAN LIVE IN THE BEST OF MIAMI',
            'subtitle_es' => 'Pagando los mejores precios',
            'subtitle_en' => 'paying the best prices',
            'image' => 'public/slider/TAldvs7Bg09wpx1gtdQf8vcpmjMOCc2VLVl8tp40.jpeg',
            'created_at' => '2012-10-29 23:42:29',
            'updated_at' => $faker->dateTime
        ]);

        DB::table('slider')->insert([
            'title_es' => 'DISFRUTA DE LAS MEJORES VISTAS DE UN VERANO',
            'title_en' => 'ENJOY THE BEST VIEWS OF A SUMMER',
            'subtitle_es' => 'que dura todo el año',
            'subtitle_en' => 'that last the entire year',
            'image' => 'public/slider/vUTpLRNrau2YhlOP7rC1mcSTMg4J4zUxQ8QISuhB.jpeg',
            'created_at' => '2011-10-29 23:42:29',
            'updated_at' => $faker->dateTime
        ]);

        //Ejecutar otro seeder
       /* $this->call([
            UsersTableSeeder::class,
            PostsTableSeeder::class,
            CommentsTableSeeder::class,
        ]);*/
    }
}
