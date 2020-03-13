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
            $table->string('name');
			$table->string('show_name')->nullable();
			$table->string('email')->nullable();
			$table->string('password');
			$table->string('login_ip')->nullable();
			$table->string('last_login_ip')->nullable();
            $table->string('avatar')->comment('头像')->nullable();
            $table->string('phone')->comment('手机号')->nullable();
            $table->tinyInteger('state')->default(1)->comment('状态：1-正常，0-锁定')->index();
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
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
