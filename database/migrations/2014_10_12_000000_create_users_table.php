<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 50);
            $table->string('owner_name', 50);
            $table->string('owner_lastname', 50);
            $table->string('city', 50);
            $table->string('cap', 10);
            $table->string('phone', 30);
            $table->string('address', 50);
            $table->date('dob');
            $table->string('piva', 11);
            $table->string('iban', 50);
            $table->string('email')->unique();
            $table->string('password', 64);
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
        Schema::dropIfExists('users');
    }
}
