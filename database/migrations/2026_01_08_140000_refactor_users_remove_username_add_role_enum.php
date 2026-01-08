<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add role column with default 'user'
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['user', 'admin'])->default('user')->after('email');
        });

        // Migrate existing is_admin to role
        DB::table('users')->where('is_admin', true)->update(['role' => 'admin']);
        DB::table('users')->where('is_admin', false)->update(['role' => 'user']);

        // Remove old columns
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'is_admin']);
        });

        // Drop role_user pivot table
        Schema::dropIfExists('role_user');

        // Drop roles table
        Schema::dropIfExists('roles');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Recreate roles table
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Recreate pivot table
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Add back old columns
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->after('name');
            $table->boolean('is_admin')->default(false)->after('email');
        });

        // Migrate role back to is_admin
        DB::table('users')->where('role', 'admin')->update(['is_admin' => true]);
        DB::table('users')->where('role', 'user')->update(['is_admin' => false]);

        // Remove role column
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
