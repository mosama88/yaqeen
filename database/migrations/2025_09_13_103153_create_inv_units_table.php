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
        Schema::create('inv_units', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('slug')->unique();
            $table->tinyInteger('is_master')->default(2); //هل هى وحدة رئيسية (2  = ليست  رئيسية)
            $table->tinyInteger('active')->default(1); //حالة التفعيل
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->integer('com_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inv_units');
    }
};
