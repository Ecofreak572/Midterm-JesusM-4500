<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneProducthistoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('phone_producthistory', function (Blueprint $table) {
            $table->unsignedBigInteger('producthistory_id');
            $table->foreign('producthistory_id', 'producthistory_id_fk_6331330')->references('id')->on('producthistories')->onDelete('cascade');
            $table->unsignedBigInteger('phone_id');
            $table->foreign('phone_id', 'phone_id_fk_6331330')->references('id')->on('phones')->onDelete('cascade');
        });
    }
}
