<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->string('name');
            $table->string('firstSpecification');
            $table->string('secondSpecification');
            $table->string('thirdSpecification');
            $table->float('price');
            $table->string('type');
            $table->integer('stock');
            $table->timestamps();
        });

        Schema::table('graphic_cards', function (Blueprint $table) {
            DB::statement("ALTER TABLE products ADD COLUMN picture MEDIUMBLOB");
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
