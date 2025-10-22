<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Target: users table must match spec
     * Fields after migration:
     *  id (pk), username (unique), email (unique, nullable), password,
     *  full_name (string), company_id (fk -> companies.id), is_active (bool),
     *  created_at, updated_at
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // rename default 'name' -> 'full_name'
            if (Schema::hasColumn('users', 'name')) {
                $table->renameColumn('name', 'full_name');
            }

            // add username (unique, required)
            if (!Schema::hasColumn('users', 'username')) {
                $table->string('username')->unique()->after('id');
            }

            // make email nullable (keep existing unique index from default migration)
            if (Schema::hasColumn('users', 'email')) {
                $table->string('email')->nullable()->change();
            }

            // add company_id FK -> companies.id
            if (!Schema::hasColumn('users', 'company_id')) {
                $table->foreignId('company_id')
                    ->after('password')
                    ->constrained('companies')
                    ->cascadeOnUpdate()
                    ->restrictOnDelete();
            }

            // add is_active flag (default true)
            if (!Schema::hasColumn('users', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('company_id');
            }

            // drop fields we don't need per spec
            if (Schema::hasColumn('users', 'email_verified_at')) {
                $table->dropColumn('email_verified_at');
            }
            if (Schema::hasColumn('users', 'remember_token')) {
                $table->dropRememberToken();
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // restore dropped columns
            if (!Schema::hasColumn('users', 'email_verified_at')) {
                $table->timestamp('email_verified_at')->nullable();
            }
            if (!Schema::hasColumn('users', 'remember_token')) {
                $table->rememberToken();
            }

            // drop is_active
            if (Schema::hasColumn('users', 'is_active')) {
                $table->dropColumn('is_active');
            }

            // drop company_id with constraint
            if (Schema::hasColumn('users', 'company_id')) {
                $table->dropConstrainedForeignId('company_id');
            }

            // make email NOT NULL again (unique index from original remains)
            if (Schema::hasColumn('users', 'email')) {
                $table->string('email')->nullable(false)->change();
            }

            // drop username
            if (Schema::hasColumn('users', 'username')) {
                $table->dropColumn('username');
            }

            // rename full_name back to name
            if (Schema::hasColumn('users', 'full_name')) {
                $table->renameColumn('full_name', 'name');
            }
        });
    }
};
