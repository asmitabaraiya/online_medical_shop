<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->integer('medicine_category_id');
            $table->string('medicine_name_en');
            $table->string('medicine_name_hin');
            $table->string('medicine_slug_en');
            $table->string('medicine_slug_hin');
            $table->string('medicine_code');
            $table->string('medicine_qty');
            $table->string('medicine_tags_en');
            $table->string('medicine_tags_hin');           
            $table->string('medicine_selling_price');
            $table->string('medicine_discount_price')->nullable();
            $table->string('medicine_short_descp_en');
            $table->string('medicine_short_descp_hin');
            $table->string('medicine_long_descp_en');
            $table->string('medicine_long_descp_hin');
            $table->string('medicine_thumbnail');
            $table->integer('medicine_hot_deals')->nullable();
            $table->integer('medicine_featured')->nullable();
            $table->integer('medicine_special_offer')->nullable();
            $table->integer('medicine_special_deals')->nullable();
            $table->integer('medicine_px')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('medicines');
    }
}
