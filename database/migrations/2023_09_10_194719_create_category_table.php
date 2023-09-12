<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryTable extends Migration {

	public function up()
	{
		Schema::create('category', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('category_name');
			$table->string('category_image');
			$table->string('category_description');
		});
	}

	public function down()
	{
		Schema::drop('category');
	}
}