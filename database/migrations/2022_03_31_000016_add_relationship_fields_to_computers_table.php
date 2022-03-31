<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToComputersTable extends Migration
{
    public function up()
    {
        Schema::table('computers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6330991')->references('id')->on('users');
            $table->unsignedBigInteger('manufacturer_id')->nullable();
            $table->foreign('manufacturer_id', 'manufacturer_fk_6330730')->references('id')->on('item_manufacturers');
            $table->unsignedBigInteger('services_id')->nullable();
            $table->foreign('services_id', 'services_fk_6331220')->references('id')->on('producthistories');
        });
    }
}
