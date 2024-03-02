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
            $table->string('fantasy',100)-> unique() -> nullable();
            $table->string('social',100)-> unique() -> nullable();
            $table->string('cnpj',14)-> unique() -> nullable();
            $table->string('type')-> unique() -> nullable();
            $table->string('nationality', 20)-> unique() -> nullable();
            $table->string('responsible',100)-> unique() -> nullable();
            $table->date('opening')->nullable();
            

             /*--------- STATUS ---------------*/
            $table->string('description',2000)->nullable();

            /*---------ENDEREÇO LOCAL E WEB---------------*/
            $table->string('address')-> unique() -> nullable();
            $table->integer('phone')-> unique() -> nullable();
            $table->string('website')-> unique() -> nullable();

            /*------------FOREIN KEYS-------------------- */
          

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
