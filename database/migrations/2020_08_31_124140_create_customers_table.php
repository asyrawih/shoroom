<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('sold_to_party')->uniqid();
            $table->string('ship_to_id')->unique();
            $table->string('name');
            $table->string('phone_number');
            $table->string('city');
            $table->string('virtual_account');
            $table->string('address');
            $table->string('info_scc');
            $table->string('npwp');
            $table->string('ktp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
