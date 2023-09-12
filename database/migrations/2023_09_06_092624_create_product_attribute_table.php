<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductAttributeTable extends Migration {

	public function up()
	{
		Schema::create('product_attribute', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->integer('attribute_id')->unsigned();
			$table->integer('value_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('product_attribute');
	}
}