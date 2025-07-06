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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pipeline_id')->nullable()->constrained('pipelines')->nullOnDelete();;
            $table->foreignId('stage_id')->nullable()->constrained('stages')->nullOnDelete();;
            $table->foreignId('company_id')->nullable()->constrained('companies')->nullOnDelete();;
            $table->string('name');
            $table->float('amount');
            $table->boolean('is_paid')->default(0);
            $table->timestamp('closed_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
