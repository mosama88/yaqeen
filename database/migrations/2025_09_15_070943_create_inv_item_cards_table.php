<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\InvItemCategory;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inv_item_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->bigInteger('item_code')->unique();
            $table->string('bar_code', 50)->unique()->nullable();
            $table->string('slug')->unique();
            $table->tinyInteger('item_type')->default(1); //واحد يساوى مخزنة و اثنين استهلاكى وثلاثه يساوى عهدة
            $table->foreignIdFor(InvItemCategory::class)->nullable()->constrained()->nullOnDelete();
            $table->unsignedBigInteger('parent_inv_item_card_id')->nullable(); //كود صنف الاب له
            $table->tinyInteger('does_has_retail_unit')->default(1); //هل للصنف وحدة تجزئة
            $table->tinyInteger('retail_uom')->default(1); //هل للصنف وحدة تجزئة
            $table->tinyInteger('uom_id')->default(1); //كود وحدة القياس
            $table->decimal('retail_uom_qty_parent', 10, 2)->default(1); //كود وحدة القياس
            $table->tinyInteger('active')->default(1); //كود وحدة التجزئة
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
        Schema::dropIfExists('inv_item_cards');
    }
};
