<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabletsTable extends Migration
{
    public function up()
    {
        Schema::create('tablets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('model')->nullable();
            $table->string('price')->nullable();
            $table->string('year')->nullable();
            $table->date('date')->nullable();
            $table->integer('invoice')->nullable();
            $table->string('hardware_specs')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
