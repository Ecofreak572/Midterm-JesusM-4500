<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPhonesTable extends Migration
{
    public function up()
    {
        Schema::table('phones', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6331032')->references('id')->on('users');
            $table->unsignedBigInteger('manufacturer_id')->nullable();
            $table->foreign('manufacturer_id', 'manufacturer_fk_6331103')->references('id')->on('item_manufacturers');
            $table->unsignedBigInteger('services_id')->nullable();
            $table->foreign('services_id', 'services_fk_6331221')->references('id')->on('producthistories');
        });
    }
}
