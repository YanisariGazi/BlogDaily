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
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('avatar')->nullable();
            $table->string('bio')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->date('tgl_bergabung')->default(now());
            $table->json('sosmed')->nullable(); // Asumsi sosmed sebagai json (misal: {"facebook": "url", "twitter": "url"})
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
