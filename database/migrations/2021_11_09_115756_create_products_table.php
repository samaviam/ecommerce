<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('user_ids')->nullable();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('cover');
            $table->json('images');
            $table->string('reference');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('regular_price');
            $table->text('short_description');
            $table->text('description');
            $table->boolean('active')->default(false);
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
