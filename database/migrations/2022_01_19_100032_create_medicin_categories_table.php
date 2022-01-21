<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicin_categories', function (Blueprint $table) {
            $table->id();
            $table->string('medicine_category_name_en');
            $table->string('medicine_category_name_hin');
            $table->string('medicine_category_slug_en');
            $table->string('medicine_category_slug_hin');
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
        Schema::dropIfExists('medicin_categories');
    }
}
