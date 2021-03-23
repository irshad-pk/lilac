<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->string('Name');
            $table->foreignId('Department_id');
            $table->foreignId('Designation_id');
            $table->string('Phone_number');
            $table->timestamp('Created_at');
            $table->foreign('Department_id')->references('id')->on('departments');
            $table->foreign('Designation_id')->references('id')->on('designations');
        });
        DB::table('users')->insert([
            ['Name' => 'John', 'Department_id' => 1, 'Designation_id' => 1, 'Phone_number' => '8975634152'],
            ['Name' => 'Tommy', 'Department_id' => 2, 'Designation_id' => 2, 'Phone_number' => '9685743625'],
            ['Name' => 'Adam', 'Department_id' => 1, 'Designation_id' => 3, 'Phone_number' => '9368574215'],
            ['Name' => 'Abid', 'Department_id' => 3, 'Designation_id' => 3, 'Phone_number' => '7539514568'],
            ['Name' => 'Irfan', 'Department_id' => 2, 'Designation_id' => 4, 'Phone_number' => '9638527412'],
            ['Name' => 'Fasalu', 'Department_id' => 1, 'Designation_id' => 5, 'Phone_number' => '8529637412'],
            ['Name' => 'Safad', 'Department_id' => 4, 'Designation_id' => 6, 'Phone_number' => '8639527521'],
            ['Name' => 'Ramshad', 'Department_id' => 2, 'Designation_id' => 7, 'Phone_number' => '9741852369'],
        ]);
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
