<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('seller_id');//
            $table->string('seller_name');//
            $table->string('seller_address');//
            $table->string('seller_website');//
            $table->string('seller_telephone');//
            $table->string('seller_email');//
            $table->string('sr_name');//
            $table->string('sr_email');//
            $table->string('sr_phone');//
            $table->date('passport_expire_date')->nullable();//
            $table->string('sr_image');
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
        Schema::dropIfExists('sellers');
    }
}
