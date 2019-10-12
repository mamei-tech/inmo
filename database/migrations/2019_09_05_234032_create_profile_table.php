<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profile', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('bio_es', 5000);
			$table->string('bio_en', 5000);
			$table->string('email');
			$table->string('site_web');
			$table->string('phone');
			$table->string('address');
			$table->string('link_facebook');
			$table->string('link_instagram');
			$table->string('link_in');
            $table->string('link_youtube');
            $table->string('privacy_es', 1000);
            $table->string('privacy_en', 1000);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profile');
	}

}
