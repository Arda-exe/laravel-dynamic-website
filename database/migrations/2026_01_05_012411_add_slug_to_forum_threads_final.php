<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Drop slug if it exists (from failed migration)
        if (Schema::hasColumn('forum_threads', 'slug')) {
            Schema::table('forum_threads', function (Blueprint $table) {
                $table->dropColumn('slug');
            });
        }

        // Add slug column
        Schema::table('forum_threads', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
        });

        // Generate slugs for existing threads
        $threads = DB::table('forum_threads')->get();
        foreach ($threads as $thread) {
            $slug = \Illuminate\Support\Str::slug($thread->title);
            $originalSlug = $slug;
            $count = 1;

            while (DB::table('forum_threads')->where('slug', $slug)->where('id', '!=', $thread->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            DB::table('forum_threads')->where('id', $thread->id)->update(['slug' => $slug]);
        }

        // Make slug unique and not nullable
        DB::statement('ALTER TABLE forum_threads MODIFY slug VARCHAR(255) NOT NULL');
        DB::statement('ALTER TABLE forum_threads ADD UNIQUE INDEX forum_threads_slug_unique (slug)');
    }

    public function down(): void
    {
        Schema::table('forum_threads', function (Blueprint $table) {
            $table->dropUnique('forum_threads_slug_unique');
            $table->dropColumn('slug');
        });
    }
};
