<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePromotionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('promotion', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title_es');
			$table->string('title_en');
			$table->string('text_en');
			$table->string('text_es');
			$table->string('link');
			$table->string('image_lg')->nullable();
			$table->string('image_md')->nullable();
			$table->string('image_sm')->nullable();
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
		Schema::drop('promotion');
	}

}
