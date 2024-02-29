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
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')-> unique() -> nullable();
            $table->string('description_group',2000);
            $table->string('hierarchy')-> unique() -> nullable();
        
            $table->timestamps();
        /*------------FOREIN KEYS-------------------- */ 

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
