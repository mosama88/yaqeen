<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Treasury;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('treasury_deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Treasury::class)->nullable()->constrained()->nullOnDelete();
            $table->integer('treasuries_can_delivery')->default(1); //الخزن التى سيتم تسليمها
            $table->tinyInteger('active')->default(1);
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
        Schema::dropIfExists('treasury_deliveries');
    }
};