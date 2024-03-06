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
        Schema::create('return_histories', function (Blueprint $table) {
            $table->bigIncrements('return_id');

            $table->string('borrow_id', 6);

            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users');
            
            $table->string('book_id', 15);
            $table->foreign('book_id')->references('book_id')->on('books');

            $table->date('return_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_histories');
    }
};
