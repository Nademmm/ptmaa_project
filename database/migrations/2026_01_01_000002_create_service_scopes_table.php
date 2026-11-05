<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_scopes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_pillar_id')->constrained('service_pillars')->cascadeOnDelete();
            $table->enum('type', ['barang', 'jasa']);
            $table->string('title');
            $table->text('description')->nullable();
            $table->json('items')->nullable(); // JSON list of points
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_scopes');
    }
};

