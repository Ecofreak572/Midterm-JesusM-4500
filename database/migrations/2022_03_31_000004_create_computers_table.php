<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputersTable extends Migration
{
    public function up()
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('model')->nullable();
            $table->integer('year')->nullable();
            $table->string('price')->nullable();
            $table->date('date')->nullable();
            $table->integer('invoice')->nullable();
            $table->string('hardware_specs')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
