<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCartItemsTable extends Migration {

	public function up()
	{
		Schema::create('cart_items', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('cart_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->integer('qty')->unsigned();
			$table->text('options');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('cart_items');
	}
}