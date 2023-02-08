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
            //insert data in database
        });
        $this->seed();
    }

    //insert data in database
    public function seed()
    {
        DB::table('events')->insert([
            'title' => 'Laravel 8',
            'description' => 'Laravel 8 is the latest version of Laravel',
            'city' => 'Lagos',
            'private' => false,
        ]);
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
