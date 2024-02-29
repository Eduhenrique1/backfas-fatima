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
     
            Schema::create('group_work', function (Blueprint $table) {
                $table->unsignedBigInteger('group_id');
                $table->unsignedBigInteger('work_id');
                $table->foreign('group_id')->references('id')->on('groups');
                $table->foreign('work_id')->references('id')->on('works');
            });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_work');
    }
};
