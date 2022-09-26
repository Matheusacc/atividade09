<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model {

    protected $table = 'disciplinas';

    public function curso() {
        return $this->hasOne(Curso::class, 'id', 'curso_id');
    }

    public function aluno() {
        return $this->belongsToMany('\App\Models\Aluno', 'matriculas');
    }

}
