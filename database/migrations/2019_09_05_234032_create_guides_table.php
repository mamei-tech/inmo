<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGuidesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('guides', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('text_es');
			$table->string('text_en');
			$table->string('guide_es');
			$table->string('guide_en');
			$table->timestamps();
			$table->string('image');
			$table->string('description_es');
			$table->string('description_en');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('guides');
	}

}
