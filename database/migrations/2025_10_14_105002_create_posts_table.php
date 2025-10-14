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

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name', 255);
            $table->text('text');
            $table->unsignedBigInteger('type_tag_id');
            $table->foreign('type_tag_id')->references('id')->on('type_tags');
            $table->unsignedBigInteger('strategy_tag_id');
            $table->foreign('strategy_tag_id')->references('id')->on('strategy_tags');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->default('DEFAULT NULL');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
