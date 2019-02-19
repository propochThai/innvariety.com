<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStyleTitleDesciptionKeyboardSubcategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_categories', function($table) {
                $table->string('title')->nullable();
                $table->text('description')->nullable();
                $table->text('keyword')->nullable();
                $table->integer('style_id')->unsigned();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_categories', function($table) {
                $table->dropColumn('title');
                $table->dropColumn('description');
                $table->dropColumn('keyword');
                $table->dropColumn('style_id');
        });
    }
}
