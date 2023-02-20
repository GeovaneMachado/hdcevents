<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->text('description');
            $table->string('city');
            $table->boolean('private');
            $table->string('image')->nullable();
            //insert data in database
            /*
                INSERT INTO events (title, description, city, private, image, date, user_id) 
                VALUES('Laravel', 
                    'testes',
                    'chapecó-sc', 
                    'true', 
                    '523bfd3f74a62dd8a2232a841c8d57ac.jpg',
                    '2023-02-26',
                1)
            */
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
