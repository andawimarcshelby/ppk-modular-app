<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_submodule', function (Blueprint $table) {
            $table->id();

            // FK -> users.id (permission holder)
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // FK -> submodules.id (what is granted)
            $table->foreignId('submodule_id')
                ->constrained('submodules')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // Metadata
            $table->timestamp('granted_at')->useCurrent();
            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete()
                ->cascadeOnUpdate();

            // Avoid duplicate grants
            $table->unique(['user_id', 'submodule_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_submodule');
    }
};
