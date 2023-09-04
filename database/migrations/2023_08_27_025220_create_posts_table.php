<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('worker_id');
            $table->string('title');
            $table->longText('description');
            $table->integer('city')->nullable();
            $table->integer('location')->nullable();
            $table->integer('work')->nullable();
            $table->integer('job')->nullable();
            $table->enum('status', ['approve', 'waiting'])->default('waiting'); // Enum column for roles
            $table->timestamps();
            $table->softDeletes();
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
