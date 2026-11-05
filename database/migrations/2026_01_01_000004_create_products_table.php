<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_category_id')->constrained('product_categories')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sub_badge')->nullable(); // e.g. "All In One", "Two In One", "Sparepart"
            $table->string('brand')->nullable(); // e.g. "Philips", "Osram", "COB", "Estika"
            $table->string('availability_status')->default('tersedia'); // enum string
            $table->string('thumbnail_image')->nullable();
            $table->json('gallery_images')->nullable();
            $table->text('short_summary')->nullable();
            $table->longText('description')->nullable();
            $table->longText('why_choose_text')->nullable();
            $table->json('specifications')->nullable(); // Key-value array: [{"label": "Daya", "value": "100W"}]
            $table->json('advantages')->nullable(); // List array: [{"point": "Hemat energi 100%"}]
            $table->boolean('is_featured')->default(false);
            $table->boolean('has_warranty_badge')->default(true);
            $table->boolean('has_eco_k3_badge')->default(true);
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

