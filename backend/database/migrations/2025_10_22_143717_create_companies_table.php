<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();                  // e.g., ZENITH, AETHER, ZENITH_CHRONOS
            $table->string('primary_color', 9);               // hex like #52357B
            $table->string('accent_color', 9)->nullable();    // optional hex
            $table->string('logo_url')->nullable();           // optional CDN/URL
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
