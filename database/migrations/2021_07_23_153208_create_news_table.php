<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Название новости');
            $table->string('description')->comment('Краткое описание, превью');
            $table->text('text')->comment('текст новости');
            $table->boolean('favorites')->default(0)->comment('является ли избраной');
            $table->string('img')->nullable()->comment('изображение');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
