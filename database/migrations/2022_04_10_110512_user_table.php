<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_table', function (Blueprint $table) 
        {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('password');
            $table->enum('types',['person','employee','tl'])->default('employee');
            $table->boolean('status')->default(true);
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->nullable();
            $table->softDeletes("deleted_at")->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('user_table');
    }

}
