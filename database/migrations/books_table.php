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
        Schema::create('books', function (Blueprint $table) {
            $table->string('book_id', 15)->primary()->notNullable();
            $table->string('book_title', 100)->notNullable();
            $table->string('author', 50)->nullable();
            $table->string('genre', 150)->nullable();
            $table->string('image_path', 2048)->nullable();
            $table->enum('book_status', ['พร้อมให้ยืม', 'ถูกยืม'])->default('พร้อมให้ยืม');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
