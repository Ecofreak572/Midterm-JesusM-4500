<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaptopProducthistoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('laptop_producthistory', function (Blueprint $table) {
            $table->unsignedBigInteger('producthistory_id');
            $table->foreign('producthistory_id', 'producthistory_id_fk_6331332')->references('id')->on('producthistories')->onDelete('cascade');
            $table->unsignedBigInteger('laptop_id');
            $table->foreign('laptop_id', 'laptop_id_fk_6331332')->references('id')->on('laptops')->onDelete('cascade');
        });
    }
}
