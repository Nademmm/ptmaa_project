<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('client_or_unit_code')->nullable(); // e.g. "Adelle Jewellery", "Unit PGIC-E34"
            $table->string('location')->nullable(); // e.g. "Gempol - Sidoarjo - Malang"
            $table->string('category')->default('pju'); // pju, me, interior_exterior, alat_berat_sparepart
            $table->string('image_path');
            $table->text('description')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->date('completion_date')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};

