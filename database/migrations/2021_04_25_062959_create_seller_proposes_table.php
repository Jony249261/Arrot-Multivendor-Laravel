<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerProposesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_proposes', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->string('seller_id');
            $table->float('price');
            $table->integer('quantity');
            $table->enum('status',['pending','accepted','rejected','processing','sell'])->default('pending');
            $table->float('total')->nullable();
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
        Schema::dropIfExists('seller_proposes');
    }
}
