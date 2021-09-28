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
            $table->id()->unique();
            $table->unsignedBigInteger('user_id')
                   ->foreign('user_id')
                   ->references('id')
                   ->on('users');

            $table->string('name');
            $table->string('document');
            $table->enum('status', ['new', 'active', 'suspended', 'cancelled'])
                  ->default('new');
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
