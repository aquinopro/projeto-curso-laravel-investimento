<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('instituition_id');
            $table->string('name', 45);
            $table->text('description');
            $table->text('index');
            $table->decimal('interest_rate');
            
            $table->timestampsTz();
            $table->softDeletes();

            $table->foreign('instituition_id')->references('id')->on('instituitions');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('products');
	}

}
