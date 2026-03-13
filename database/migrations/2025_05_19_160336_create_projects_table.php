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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->unsignedBigInteger('winner_id')->nullable();
            $table->foreign('winner_id', 'projects_winner_foreign')->references('id')->on('clients')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->text('details')->nullable();
            $table->text('skills')->nullable();
            $table->text('more_details')->nullable();
            $table->float('budget_min')->nullable();
            $table->float('budget_max')->nullable();
            $table->string('location')->nullable();
            $table->string('status')->default('pending');
            $table->boolean('is_active')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
