<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDesignationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designations', function (Blueprint $table) {
            $table->id();
            $table->string('Name', 100);
            $table->timestamp('Created_at');
        });
        DB::table('designations')->insert([
            ['Name' => 'General Manager'],
            ['Name' => 'App Developer'],
            ['Name' => 'Trainee'], 
            ['Name' => 'Laravel Developer'], 
            ['Name' => 'Deputy Manager'], 
            ['Name' => 'Legal Manager'], 
            ['Name' => 'Web Developer'], 
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('designations');
    }
}
