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
        Schema::create('demands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('to_client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->text('details');
            $table->float('budget_min')->nullable();
            $table->float('budget_max')->nullable();
            $table->integer('weeks')->nullable();
            $table->date('start_date')->nullable();
            $table->boolean('is_accepted')->default(0);
            $table->boolean('is_rejected')->default(0);
            $table->boolean('is_completed')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demands');
    }
};
