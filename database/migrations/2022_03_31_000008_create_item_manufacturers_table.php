<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemManufacturersTable extends Migration
{
    public function up()
    {
        Schema::create('item_manufacturers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('contactinfo')->nullable();
            $table->string('address')->nullable();
            $table->string('sales_contact_info')->nullable();
            $table->string('tech_support_contact_info')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
