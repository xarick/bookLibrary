<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('year_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('book_file');
            $table->text('description');
            $table->string('image')->nullable();
            $table->text('keywords')->nullable();
            $table->string('book_size')->nullable();
            $table->integer('watched')->default(0);
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
