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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pipeline_id')->nullable()->constrained('pipelines')->nullOnDelete();;
            $table->foreignId('stage_id')->nullable()->constrained('stages')->nullOnDelete();;
            $table->foreignId('industry_id')->nullable()->constrained('industries')->nullOnDelete();;
            $table->foreignId('company_id')->nullable()->constrained('companies')->nullOnDelete();;
            $table->foreignId('contact_id')->nullable()->constrained('contacts')->nullOnDelete();;
            $table->foreignId('deal_id')->nullable()->constrained('deals')->nullOnDelete();;
            $table->string('type')->nullable();
            $table->string('source')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('title')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_size')->nullable();
            $table->string('label')->nullable();
            $table->timestamp('last_contacted_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};



