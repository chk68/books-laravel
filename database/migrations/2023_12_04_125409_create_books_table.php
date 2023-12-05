<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable(false);
            $table->text('description')->nullable();
            $table->foreignId('author_id')->nullable()->constrained('authors');
            $table->date('publish_date');
            $table->string('image')->nullable();
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
};
