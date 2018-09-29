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
            'image_lg' => 'public/promotions/lg/gbxatWeHx2daxP4NdZPbDgdrJ7alqXSfprmFPFqi.jpeg',
            'image_md' => 'public/promotions/md/gbxatWeHx2daxP4NdZPbDgdrJ7alqXSfprmFPFqi.jpeg',
            'image_sm' => 'public/promotions/sm/gbxatWeHx2daxP4NdZPbDgdrJ7alqXSfprmFPFqi.jpeg',
            'text_es' => $faker->paragraph,
            'text_en' => $faker->paragraph,
            'link' => $faker->url,
            'created_at' => '2012-10-29 23:42:29',
            'updated_at' => $faker->dateTime
        ]);

        DB::table('promotion')->insert([
            'title_es' => 'HOY ES TU DIA!',
            'title_en' => 'TODAY IS YOUR DAY!',
            'image_lg' => 'public/promotions/lg/pRuKbSK0Fq34k80PYhumiDODf3MzR10PwBGqlDoF.jpeg',
            'image_md' => 'public/promotions/md/pRuKbSK0Fq34k80PYhumiDODf3MzR10PwBGqlDoF.jpeg',
            'image_sm' => 'public/promotions/sm/pRuKbSK0Fq34k80PYhumiDODf3MzR10PwBGqlDoF.jpeg',
            'text_es' => $faker->paragraph,
            'text_en' => $faker->paragraph,
            'link' => $faker->url,
            'created_at' => '2011-10-29 23:42:29',
            'updated_at' => $faker->dateTime
        ]);

        DB::table('promotion')->insert([
            'title_es' => 'YOUR HOME FROM THE BEACH',
            'title_en' => 'YOUR HOME FROM THE BEACH',
            'text_es' => $faker->paragraph,
            'text_en' => $faker->paragraph,
            'link' => $faker->url,
            'created_at' => '2011-10-29 23:42:29',
            'updated_at' => $faker->dateTime
        ]);

        DB::table('promotion')->insert([
            'title_es' => 'GREAT HOMES IN BRICKELL TO LOW PRICES',
            'title_en' => 'GREAT HOMES IN BRICKELL TO LOW PRICES',
            'text_es' => $faker->paragraph,
            'text_en' => $faker->paragraph,
            'link' => $faker->url,
            'created_at' => '2010-10-29 23:42:29',
            'updated_at' => $faker->dateTime
        ]);

        DB::table('promotion')->insert([
            'title_es' => 'ROLAND FRANK',
            'title_en' => 'ROLAND FRANK',
            'text_es' => $faker->paragraph,
            'text_en' => $faker->paragraph,
            'link' => $faker->url,
            'created_at' => '2009-10-29 23:42:29',
            'updated_at' => $faker->dateTime
        ]);

        DB::table('slider')->insert([
            'title_es' => 'SU NUEVO HOGAR ESTÁ A UNA LLAMADA DE DISTANCIA',
            'title_en' => 'YOUR NEW HOME IS A PHONE CALL AWAY',
            'subtitle_es' => '¡llámame hoy!',
            'subtitle_en' => 'call me today!',
            'image_lg' => 'public/slider/lg/imZeGxGdGZP4otEOWIWXpjUEnwQOred1KKqttQO8.jpeg',
            'image_md' => 'public/slider/md/imZeGxGdGZP4otEOWIWXpjUEnwQOred1KKqttQO8.jpeg',
            'image_sm' => 'public/slider/sm/imZeGxGdGZP4otEOWIWXpjUEnwQOred1KKqttQO8.jpeg',
            'created_at' => '2013-10-29 23:42:29',
            'updated_at' => $faker->dateTime
        ]);

        DB::table('slider')->insert([
            'title_es' => 'USTED PUEDE VIVIR EN LO MEJOR DE MIAMI ',
            'title_en' => 'YOU CAN LIVE IN THE BEST OF MIAMI',
            'subtitle_es' => 'Pagando los mejores precios',
            'subtitle_en' => 'paying the best prices',
            'image_lg' => 'public/slider/lg/TAldvs7Bg09wpx1gtdQf8vcpmjMOCc2VLVl8tp40.jpeg',
            'image_md' => 'public/slider/md/TAldvs7Bg09wpx1gtdQf8vcpmjMOCc2VLVl8tp40.jpeg',
            'image_sm' => 'public/slider/sm/TAldvs7Bg09wpx1gtdQf8vcpmjMOCc2VLVl8tp40.jpeg',
            'created_at' => '2012-10-29 23:42:29',
            'updated_at' => $faker->dateTime
        ]);

        DB::table('slider')->insert([
            'title_es' => 'DISFRUTA DE LAS MEJORES VISTAS DE UN VERANO',
            'title_en' => 'ENJOY THE BEST VIEWS OF A SUMMER',
            'subtitle_es' => 'que dura todo el año',
            'subtitle_en' => 'that last the entire year',
            'image_lg' => 'public/slider/lg/vUTpLRNrau2YhlOP7rC1mcSTMg4J4zUxQ8QISuhB.jpeg',
            'image_md' => 'public/slider/md/vUTpLRNrau2YhlOP7rC1mcSTMg4J4zUxQ8QISuhB.jpeg',
            'image_sm' => 'public/slider/sm/vUTpLRNrau2YhlOP7rC1mcSTMg4J4zUxQ8QISuhB.jpeg',
            'created_at' => '2011-10-29 23:42:29',
            'updated_at' => $faker->dateTime
        ]);

        DB::table('profile')->insert([
            'bio_es' => 'Jorge E. Hidalgo nació y creció en La Habana, Cuba. En 2013, el Sr. Hidalgo se trasladó con su familia a Miami, Florida, donde reside actualmente. Antes de mudarse a los Estados Unidos, el Sr.Hidalgo estudió bellas artes en la "Academia de Bellas Artes de San Alejandro" en Cuba, donde descubrió su amor por la arquitectura. El Sr. Hidalgo utilizó la fuerte ética de trabajo que le inculcaron su madre, una médico cubana, y su padre, un ingeniero cubano, para obtener y aprovechar lo que los Estados Unidos tenía para ofrecer.
Una de las primeras oportunidades brindadas al Sr. Hidalgo fue en el Hotel Biltmore. Mientras trabajaba en el Hotel Biltmore, el Sr. Hidalgo aprendió la importancia y el arduo trabajo que conllevaba la industria de la hospitalidad. Aprendió mucho sobre el servicio al cliente, incluyendo cómo abordar las necesidades específicas de la clientela del hotel y resolver problemas a medida que surgieron. El Sr. Hidalgo tuvo la suerte de usar las habilidades que aprendió en el Hotel Biltmore y aplicarlas a su próximo puesto como Asistente Legal en Miami Legal Firm.
Durante sus cuatro años como asistente legal en Miami Legal Firm, el Sr. Hidalgo afinó las habilidades de servicio al cliente que había adquirido en su empleo anterior. Sus principales responsabilidades incluían, entre otras cosas, realizar entrevistas a clientes, ser una persona clave para el cliente en la etapa inicial de su caso y proporcionar una orientación adecuada a las consultas del cliente. Su constante exposición e interacción con los clientes de la firma le permitió obtener la confianza y el interés para avanzar hacia una profesión que le permitiera obtener su propia clientela. La pasión del Sr. Hidalgo por la arquitectura, el compromiso con el servicio al cliente y su deseo de construir un negocio propio lo llevaron a obtener su Licencia de Bienes Raíces.
El Sr. Hidalgo actualmente trabaja como Agente de Bienes Raíces en Colfax Realty y trabaja para obtener su B.A. en Bienes Raíces y Mercadeo en Florida International University (FIU). La integridad, la honestidad y el compromiso del Sr. Hidalgo para aprender continuamente sobre su profesión es lo que lo convierte en un exitoso agente de bienes raíces. Él siempre está preparado para un desafío y cree que los desafíos son importantes porque construyen el carácter y hacen la vida un poco más emocionante. El Sr. Hidalgo se da cuenta de que la compra o venta de una casa es una de las decisiones más importantes que una persona puede tomar y se acerca a cada paso de su trabajo con eso en mente.
El Sr. Hidalgo tiene conocimiento en el mercado de Miami en general, pero su área de especialización se centra en el área Downtown-Miami / Brickell.',
            'bio_en' => 'Jorge E. Hidalgo was born and raised in Havana, Cuba.  In 2013, Mr. Hidalgo relocated with his family to Miami, Florida where he currently resides.  Prior to relocating to the United States, Mr. Hidalgo studied fine arts at the “Academy of Fine Arts of San Alejandro” in Cuba where he discovered his love for architecture.  Mr. Hidalgo used the strong work ethic instilled in him by his mother, a Cuban Physician, and his father, a Cuban Engineer, to obtain and take advantage of what the United States had to offer. 
One of the first opportunities afforded to Mr. Hidalgo was at the Biltmore Hotel.  While employed at the Biltmore Hotel, Mr. Hidalgo learned the importance and hard work that came with the hospitality industry.  He learned a great deal about customer service including how to address specific needs of the hotel clientele and problem solve issues as they arose.  Mr. Hidalgo was then fortunate enough to use the skills he learned at the Biltmore Hotel and apply them to his next position as a Legal Assistant at Miami Legal Firm. 
During his four years as a Legal Assistant at Miami Legal Firm, Mr. Hidalgo fine-tuned the customer service skills he had acquired in his previous employment.  His primary responsibilities included, but were not limited to, conducting client interviews, being a point person for client at the initial stage of their case, and providing proper guidance to client’s inquiries. His constant exposure and interaction with the firm’s clients allowed him to obtain the confidence and interest to move towards a profession that would allow him the opportunity to obtain his own clientele.  Mr. Hidalgo’s passion for architecture, commitment to customer service, and his desire to build a business of his own led him to obtain his Real Estate License.
Mr. Hidalgo is currently employed as a Real Estate Agent at Colfax Realty and working towards his B.A in Real Estate and Marketing at Florida International University (FIU).   Mr. Hidalgo’s integrity, honesty and his commitment to continually learn about his profession is what makes him a successful Real Estate Agent.  He is always up for a challenge and believes that challenges are important because they build character and make life a bit more exciting!  Mr. Hidalgo realizes that the purchase or sale of a home is one of the single most important decisions a person can make and he approaches every step of his work with that in mind.  
Mr. Hidalgo’s is knowledgeable in the Miami market generally but his area of expertise focuses on the Downtown-Miami/Brickell area.',
            'email' => 'JHIDALGO@COLDFAXREALTY.COM',
            'site_web' => 'WWW.COLDFAXMIAMI.COM',
            'phone' => 'PH: 1-(561)-503-2456',
            'address' => '55 MERRICK WAY SUITE 202-A, CORAL GABLES, FL 33314',
            'link_facebook' => 'http://www.facebook.com',
            'link_instagram' => 'http://www.instagram.com',
            'link_in' => 'http://www.linkedin.com',
            'link_youtube' => 'http://www.youtube.com',
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime
        ]);

        DB::table('guides')->insert([
            'text_es' => 'Comprador',
            'text_en' => 'Buyer',
            'guide' => 'public/guides/aOoSb7FB6NjOH0JEcE8BMPCP3v3tmORTOGQgKzp3.docx',
            'created_at' => '2011-10-29 23:42:29',
            'updated_at' => $faker->dateTime
        ]);

        DB::table('guides')->insert([
            'text_es' => 'Vendedor',
            'text_en' => 'Seller',
            'guide' => 'public/guides/cQseguX6YN13UFitRTUuzbWuLvHHcVSBb9nnA3aw.docx',
            'created_at' => '2011-10-29 23:42:29',
            'updated_at' => $faker->dateTime
        ]);

        DB::table('guides')->insert([
            'text_es' => 'Empaca como un pro/ profesional ',
            'text_en' => 'Pack like a pro',
            'guide' => 'public/guides/Keh4FVbXG4y7gpF8dDeVSlEaCmCWmG4iRPEz7Y3D.docx',
            'created_at' => '2011-10-29 23:42:29',
            'updated_at' => $faker->dateTime
        ]);

        DB::table('guides')->insert([
            'text_es' => 'Para nuevos propietarios',
            'text_en' => 'For the new owners',
            'guide' => 'public/guides/nHREQCr2hJnMJjPdM2VxiVSiKNVtKqHGIV7fVEzu.docx',
            'created_at' => '2011-10-29 23:42:29',
            'updated_at' => $faker->dateTime
        ]);

        DB::table('guides')->insert([
            'text_es' => 'Mudarse con mascotas',
            'text_en' => 'Move with pets',
            'guide' => 'public/guides/Ip4Co4nDAPvsdnh3OMNgTqMkpZBCc4OUygSkamjc.docx',
            'created_at' => '2011-10-29 23:42:29',
            'updated_at' => $faker->dateTime
        ]);

        DB::table('guides')->insert([
            'text_es' => 'Prepare para su mudanza',
            'text_en' => 'Prepare for your move',
            'guide' => 'public/guides/9yM1emHvl8Dob4VYknVL1BNaQzga7XFWdStFuVXY.docx',
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
