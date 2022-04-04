<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuionesFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guiones_fields', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('guion_id');
            $table->bigInteger('field_id');
            $table->integer('order');
            $table->timestamps();

            
            $table->foreign('field_id')->references('id')->on('fields');
            // $table->foreign('guion_id')->references('id')->on('guiones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guiones_fields');
    }
}
