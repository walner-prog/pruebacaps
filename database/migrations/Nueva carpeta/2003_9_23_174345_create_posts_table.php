<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
          // En tu migración de la tabla 'posts'
             $table->string('name', 255); // Ajusta la longitud según tus necesidades

           // En tu migración de la tabla 'posts'
             $table->string('slug', 255); // Ajusta la longitud según tus necesidades

           $table->text('extract')->nullable();
            $table->longText('body')->nullable();
            $table->enum('status', [1,2])->default(1);

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id'); 

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

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
        Schema::dropIfExists('posts');
    }
}
