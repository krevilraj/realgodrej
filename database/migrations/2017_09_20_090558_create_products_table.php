<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('products', function (Blueprint $table) {
	        $table->increments('id');
	        $table->string('name')->nullable();
	        $table->string('slug')->nullable();
            $table->string('sku')->nullable();
            $table->string('price')->nullable();
            $table->string('page_title')->nullable();
            $table->string('page_description')->nullable();
	        $table->longText('description')->nullable();
	        $table->longText('short_description')->nullable();
	        $table->tinyInteger('is_featured')->nullable();
	        $table->tinyInteger('status')->nullable();

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
        Schema::dropIfExists('products');
    }
}
