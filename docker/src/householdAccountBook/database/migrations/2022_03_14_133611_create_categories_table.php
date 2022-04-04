<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true);
            $table->string('name');
            $table->boolean('balance'); //0が収入、1が支出
            $table->unsignedBigInteger('user_id');
            $table->timestamp('updated_at')->default(\DB::raw("CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP"));
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('books');
    }
};
