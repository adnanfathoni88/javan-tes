<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create(config('laravolt.indonesia.table_prefix') . 'provinces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('code', 2)->unique();
            $table->string('name', 255);
            $table->text('meta')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop(config('laravolt.indonesia.table_prefix') . 'provinces');
    }
};
