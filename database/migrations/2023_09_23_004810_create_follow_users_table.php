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
        Schema::create('follow_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('followed_id');
            $table->timestamps();

            $table->foreign('followed_id')->references('id')->on('users')->onDelete('cascade');
            
            // Unique constraint untuk mencegah user mengikuti user yang sama lebih dari satu kali
            $table->unique(['user_id', 'followed_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follow_users');
    }
};
