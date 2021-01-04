<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('store_id');
            $table->integer('total');
            $table->tinyInteger('delflag');
            $table->date('created');
            $table->date('modified');
        });

        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('store_id');
            $table->integer('person_id');
            $table->char('remark', 30);
            $table->date('sale_date');
            $table->date('created');
            $table->date('modified');
            $table->tinyInteger('delflag');
        });

        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->char('person_name', 20);
            $table->integer('store_id');
            $table->date('created');
            $table->date('modified');
            $table->tinyInteger('delflag');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_type_id');
            $table->char('product_name', 20);
            $table->date('created');
            $table->date('modified');
            $table->tinyInteger('delflag');
        });

        Schema::create('products_types', function (Blueprint $table) {
            $table->increments('id');
            $table->char('product_type', 20);
            $table->date('created');
            $table->date('modified');
            $table->tinyInteger('delflag');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock');
    }
}
