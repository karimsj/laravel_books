<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('publish_date');
            $table->integer('edition');
            $table->char('isbn_10', 10)->index();
            $table->char('isbn_13', 13)->index();
            $table->integer('publisher_id')->unsigned()->index();
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('restrict');
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
        Schema::drop('books');
    }
}
