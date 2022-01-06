<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickvisaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickvisa', function (Blueprint $table) {
            $table->id();
            $table->string('alpha_2_code')->nullable();
            $table->string('alpha_3_code')->nullable();
            $table->integer('numeric_code')->nullable();
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->string('display_name')->nullable();
            $table->string('keywords')->nullable();
            $table->json('translations')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pickvisa');
    }
}
