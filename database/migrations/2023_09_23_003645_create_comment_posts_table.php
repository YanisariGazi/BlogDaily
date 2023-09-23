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
        Schema::create('comment_posts', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->text('content');
            $table->timestamps(); // created_at & updated_at

            // Optional: Foreign key untuk 'parent_id' yang merujuk ke 'comments.id'
            $table->foreign('parent_id')->references('id')->on('comment_posts')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_posts');
    }
};
