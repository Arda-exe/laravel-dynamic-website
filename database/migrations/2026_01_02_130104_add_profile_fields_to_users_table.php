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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->after('name');
            $table->date('birthday')->nullable()->after('username');
            $table->string('photo')->nullable()->after('birthday');
            $table->text('bio')->nullable()->after('photo');
            $table->boolean('is_admin')->default(false)->after('bio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'birthday', 'photo', 'bio', 'is_admin']);
        });
    }
};
