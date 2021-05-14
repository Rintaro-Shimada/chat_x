<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChatData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_data', function (Blueprint $table) {
            $table->increments("chat_id")->autoIncrement();
            $table->foreignId('id')->constrained('users');
            $table->string('title',"32");
            $table->string("text_body","128");
            $table->ipAddress('visitor');
            $table->bigInteger('reply_id')->nullable();
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
        Schema::dropIfExists('chat_data');
    }
}
