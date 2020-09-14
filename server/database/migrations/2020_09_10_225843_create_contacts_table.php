<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable(FALSE);
            $table->string('name')->nullable(FALSE);
            $table->string('surname')->nullable(FALSE);
            $table->string('email', 191)->unique()->nullable(FALSE);
            $table->string('phone')->nullable(FALSE);
            $table->string('cep');
            $table->string('state')->nullable(FALSE);
            $table->string('city')->nullable(FALSE);
            $table->string('street')->nullable(FALSE);
            $table->string('neighborhood')->nullable(FALSE);
            $table->string('number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
