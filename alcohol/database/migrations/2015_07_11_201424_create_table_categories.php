<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCategories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
      	{
          $table->increments('id');
          $table->string('name', 255);
          $table->text('description');
          $table->decimal('standard', 5, 2);
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
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
	    Schema::dropIfExists('categories');
	    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
