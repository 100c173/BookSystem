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
            $table->id(); // Primary Key
            $table->foreignId('author_id')->constrained()->onDelete('cascade'); // Foreign Key to authors table
            $table->string('title');
            $table->text('description')->nullable();
            $table->year('publication_year')->nullable();
            $table->integer('pages')->nullable();
            $table->string('cover_image')->nullable(); // path or filename
            $table->integer('available_copies')->default(0);
            $table->string('path_file')->nullable(); // for storing book files (e.g., PDF)
            $table->softDeletes(); // deleted_at
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_controllers');
    }
};
