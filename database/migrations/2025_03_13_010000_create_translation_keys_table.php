<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('translation_keys', function (Blueprint $table) {
            $table->id();
            $table->text('param');
            $table->string('place')->nullable();
            $table->text('default_text');
            $table->string('translatable_type')->nullable();
            $table->unsignedBigInteger('translatable_id')->nullable();
            $table->timestamps();

            $table->index([DB::raw('param(191)'), 'place'], 'tk_param_place_index');
            $table->index(['translatable_type', 'translatable_id'], 'tk_morph_index');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('translation_keys');
    }
};
