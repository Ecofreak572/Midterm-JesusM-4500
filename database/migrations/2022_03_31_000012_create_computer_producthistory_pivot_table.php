<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputerProducthistoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('computer_producthistory', function (Blueprint $table) {
            $table->unsignedBigInteger('producthistory_id');
            $table->foreign('producthistory_id', 'producthistory_id_fk_6331263')->references('id')->on('producthistories')->onDelete('cascade');
            $table->unsignedBigInteger('computer_id');
            $table->foreign('computer_id', 'computer_id_fk_6331263')->references('id')->on('computers')->onDelete('cascade');
        });
    }
}
