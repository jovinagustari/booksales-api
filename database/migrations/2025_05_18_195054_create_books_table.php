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
            $table->id();
            $table->string('title');
            $table->integer('year');
            $table->string('cover_image'); // URL/Path gambar cover
            $table->text('description');
            $table->integer('price');
            $table->integer('stock');
            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('author_id');
            $table->timestamps();

            // Foreign keys untuk relasi ke tabel genres dan authors
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
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
