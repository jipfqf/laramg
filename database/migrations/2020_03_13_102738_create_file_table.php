<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file', function (Blueprint $table) {
            $table->id();
			$table->string('name')->nullable()->comment('文件名称');
			$table->string('oname')->nullable()->comment('原文件名称');
			$table->string('path')->nullable()->comment('保存路径');
			$table->string('spath')->nullable()->comment('缩略图保存路径');
			$table->tinyInteger('type')->default(1)->comment('图片上传类型 1本地 2七牛云 3OSS 4COS ')->index();
			$table->bigInteger('pid')->comment('文件分类id')->index();
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
        Schema::dropIfExists('file');
    }
}
