<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use OEMS\User;

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
            $table->Increments('id');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('email');
            $table->string('position');
            $table->string('designation');
            $table->string('section');
            $table->string('image');
            $table->integer('employee_number');
            $table->integer('status')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        
            User::create([
                'firstname' => 'Eugene',
                'middlename' => 'Pahati',
                'lastname' => 'Rubio',
                'email' => 'eugene.rubio@ph.fujitsu.com',
                'position' => 'Admin',
                'designation' => 'Admin',
                'section' => 'PRESS 1',
                'employee_number' => '190099',
                'password' => Hash::make('123123123'),
                'image' => 'Eugene_Rubio.jpg',
                'status' => 0
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
