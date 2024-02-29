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
        
            Schema::create('company_work', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id');
                $table->unsignedBigInteger('work_id');
                $table->foreign('company_id')->references('id')->on('companies');
                $table->foreign('work_id')->references('id')->on('works');
            });
        
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
