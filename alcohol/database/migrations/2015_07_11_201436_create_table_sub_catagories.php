<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSubCatagories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sub_categories', function(Blueprint $table)
      	{
          $table->increments('id');
          $table->integer('category_id')->unsigned();
          $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
          $table->string('name', 255);
          $table->text('description');
          $table->decimal('liter_per_item', 5, 2);
          $table->decimal('alcohol_content_per_item', 5, 2);
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
	    Schema::dropIfExists('sub_categories');
	    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
