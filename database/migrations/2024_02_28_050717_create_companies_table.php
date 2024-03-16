<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) { 
            $table->increments('id');
            $table->text('fantasy');
            $table->text('social');
            $table->text('cnpj');
            $table->text('type');
            $table->text('nationality');
            $table->text('responsible');
            $table->text('opening');
            

             /*--------- STATUS ---------------*/
            $table->text('description');

            /*---------ENDEREÇO LOCAL E WEB---------------*/
            $table->text('address');
            $table->text('phone');
            $table->text('website');

            /*------------ TRABALHO DAS TURMAS -------------------- */
            $table->text('class');
            $table->text('faculty');
            $table->text('semester');
            $table->text('year');
            $table->integer('group_id')->unsigned();
          

             /*------------FOREIN KEYS-------------------- */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
