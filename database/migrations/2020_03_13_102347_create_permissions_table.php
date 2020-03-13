<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
			$table->string('name')->nullable()->comment('权限名称');
			$table->string('path')->nullable()->comment('权限地址');
			$table->string('note')->nullable()->comment('备注');
			$table->tinyInteger('type')->default(0)->comment('0-页面权限，1-功能权限')->index();
			$table->bigInteger('pid')->comment('上级id')->index();
			$table->bigInteger('left')->comment('树节点')->index();
			$table->bigInteger('right')->comment('树节点')->index();
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
        Schema::dropIfExists('permissions');
    }
}
