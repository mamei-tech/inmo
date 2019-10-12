<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
			$table->string('name');
			$table->string('email', 190)->unique();
            $table->string('password')->nullable();//->change();
            $table->string('avatar')->nullable();
			$table->boolean('lock')->default(0);
			$table->string('token_verified_email')->nullable();
			$table->date('email_verified_at')->nullable();
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('users');
	}

}
