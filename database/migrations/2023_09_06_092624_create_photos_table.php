<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhotosTable extends Migration {

	public function up()
	{
		Schema::create('photos', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('parent')->unsigned()->nullable();
			$table->integer('product_id')->unsigned();
			$table->string('title');
			$table->text('description');
			$table->integer('width')->unsigned();
			$table->integer('height')->unsigned();
			$table->string('attachments_name');
		});
	}

	public function down()
	{
		Schema::drop('photos');
	}
}