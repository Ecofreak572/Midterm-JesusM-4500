<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducthistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('producthistories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('services')->nullable();
            $table->string('software')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
