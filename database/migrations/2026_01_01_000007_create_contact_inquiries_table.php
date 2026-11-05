<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('company_or_institution')->nullable();
            $table->string('whatsapp_number');
            $table->string('email')->nullable();
            $table->foreignId('service_pillar_id')->nullable()->constrained('service_pillars')->nullOnDelete();
            $table->string('subject')->nullable();
            $table->text('message');
            $table->string('pipeline_status')->default('komunikasi'); // komunikasi, survei, negosiasi, deal, batal
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_inquiries');
    }
};

