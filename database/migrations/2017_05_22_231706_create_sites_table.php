<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('keyword');
            $table->string('description');
            $table->string('facebook');
            $table->string('twister');
            $table->string('youtube');
            $table->string('subcategory1_id');
            $table->integer('format1_type');
            $table->string('subcategory2_id');
            $table->integer('format2_type');
            $table->string('subcategory3_id');
            $table->integer('format3_type');
            $table->string('subcategory4_id');
            $table->integer('format4_type');
            $table->string('subcategory5_id');
            $table->integer('format6_type');
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
        Schema::dropIfExists('sites');
    }
}
