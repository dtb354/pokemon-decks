<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            // 1️⃣ Drop the old foreign keys (to re-add with cascade)
            $table->dropForeign(['user_id']);
            $table->dropForeign(['post_id']);

            // 2️⃣ Re-add them with cascade delete
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            // 3️⃣ Change text column from string(255) to text
            $table->text('text')->change();

            // 4️⃣ Add updated_at column (and make sure created_at behaves normally)
            $table->timestamp('updated_at')->nullable()->after('created_at');
        });
    }

    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            // Rollback changes
            $table->dropForeign(['user_id']);
            $table->dropForeign(['post_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('post_id')->references('id')->on('posts');

            $table->string('text', 255)->change();
            $table->dropColumn('updated_at');
        });
    }
};

