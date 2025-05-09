<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->string('image'); // Add the image column
        });
    }
    
    public function down()
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
