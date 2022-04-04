<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            
            $table->bigInteger('id');
            $table->mediumText('relationship');
            $table->mediumText('systemName');
            $table->mediumText('label');
            $table->mediumText('dataType');
            $table->boolean('isAvailableInContactManager');
            $table->boolean('isRequired');
            
            $table->unsignedBigInteger('categoria_id')->default(1);
            $table->unsignedBigInteger('empresa_id');
            $table->timestamps();
            

            $table->primary('id');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('fields_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields');
    }
}
