<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->string('nombre', 200);
            $table->string('autor', 200);
            $table->string('idioma', 200);
            $table->text('descripcion');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE books ADD FULLTEXT fulltext_index (nombre, idioma, descripcion)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
