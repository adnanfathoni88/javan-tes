<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create(config('laravolt.indonesia.table_prefix') . 'districts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('code', 7)->unique();
            $table->char('city_code', 4);
            $table->string('name', 255);
            $table->text('meta')->nullable();
            $table->timestamps();

            $table->foreign('city_code')
                ->references('code')
                ->on(config('laravolt.indonesia.table_prefix') . 'cities')
                ->onUpdate('cascade')->onDelete('restrict');
        });
    }


    public function down()
    {
        Schema::drop(config('laravolt.indonesia.table_prefix') . 'districts');
    }
};
