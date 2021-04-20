<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->id();
            $table->string('buyer_id');//done
            $table->string('buyer_name');//done
            $table->string('buyer_address');//done
            $table->string('buyer_website');//done
            $table->string('buyer_telephone');//done
            $table->string('buyer_email');//buyer
            $table->string('buyer_passport');//buyer
            $table->string('buyer_nid');//buyer
            $table->string('br_name');
            $table->string('br_email');
            $table->string('br_phone');
            $table->date('passport_expire_date')->nullable();
            $table->string('br_image');
            $table->string('buyer_type');
            $table->string('trade_license')->nullable();
            $table->date('expire_date');
            $table->string('buyer_logo')->nullable();//done
            $table->string('tagline');//done
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('buyers');
    }
}
