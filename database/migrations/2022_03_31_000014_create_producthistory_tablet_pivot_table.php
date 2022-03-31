<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducthistoryTabletPivotTable extends Migration
{
    public function up()
    {
        Schema::create('producthistory_tablet', function (Blueprint $table) {
            $table->unsignedBigInteger('producthistory_id');
            $table->foreign('producthistory_id', 'producthistory_id_fk_6331331')->references('id')->on('producthistories')->onDelete('cascade');
            $table->unsignedBigInteger('tablet_id');
            $table->foreign('tablet_id', 'tablet_id_fk_6331331')->references('id')->on('tablets')->onDelete('cascade');
        });
    }
}
