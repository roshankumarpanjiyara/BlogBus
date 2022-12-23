<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('username');
            $table->string('title');
            $table->string('slug');
            $table->text('body');
            $table->string('image')->nullable();
            $table->integer('category_id');
            $table->string('created_by');
            $table->string('approved_by');
            $table->integer('status')->default(0);
            $table->bigInteger('reads')->unsigned()->default(0)->index();
            $table->text('postmessage')->nullable();
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
};
