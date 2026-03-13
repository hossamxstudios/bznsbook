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
        Schema::create('batch_clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('batch_id')->constrained('batches')->onDelete('cascade');
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->float('budget_min')->nullable();
            $table->float('budget_max')->nullable();
            $table->string('status')->default('pending');
            $table->boolean('is_applied')->default(0);
            $table->boolean('is_contacted')->default(0);
            $table->boolean('is_proposal')->default(0);
            $table->boolean('is_accepted')->default(0);
            $table->boolean('is_rejected')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_clients');
    }
};
