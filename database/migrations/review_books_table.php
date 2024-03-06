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
        Schema::create('review_books', function (Blueprint $table) {
            $table->id("review_id");


            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users');

            $table->string('book_id', 15);
            $table->foreign('book_id')->references('book_id')->on('books');

            $table->string('review_text', 150)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_books');
    }
};
