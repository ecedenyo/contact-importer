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

            $table->string('name', 75);
            $table->date('birthdate');
            $table->string('telephone', 25);
            $table->string('address');
            $table->string('creditcard_number');
            $table->char('creditcard_lastnumbers', 4);
            $table->string('franchise', 50);
            $table->string('email', 75);

            $table->foreignId('user_id')->constrained('users');
            
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
        Schema::dropIfExists('contacts');
    }
}
