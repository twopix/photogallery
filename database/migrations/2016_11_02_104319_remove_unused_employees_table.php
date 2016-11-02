<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveUnusedEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::drop('employees');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            Schema::create('employees', function (Blueprint $table) {
              $table->increments('id');
              $table->string('name')->unique();
              $table->string('email')->unique();
              $table->string('contact_number');
              $table->string('position');
              $table->timestamps();
            });
        });
    }
}
