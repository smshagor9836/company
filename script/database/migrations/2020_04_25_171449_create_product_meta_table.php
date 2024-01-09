<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_meta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('term_id');
            $table->integer('s_price')->nullable();
            $table->integer('p_price')->nullable();
            $table->integer('qty')->nullable();
            $table->string('sku')->nullable();
            $table->string('stock_status')->nullable();
            $table->integer('total_sales')->nullable();
            $table->integer('tax')->nullable();
            $table->timestamps();
            $table->foreign('term_id')
            ->references('id')->on('terms')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_meta');
    }
}
