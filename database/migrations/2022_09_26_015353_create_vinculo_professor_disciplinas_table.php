<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVinculoProfessorDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vinculo_professor_disciplinas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('disciplina_id');
            $table->foreignId('professor_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vinculo_professor_disciplinas');
    }
}
