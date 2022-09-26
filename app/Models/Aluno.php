<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model {

    protected $table = 'alunos';

    public function disciplina() {
        return $this->belongsToMany('\App\Models\Disciplina', 'matriculas')
            ->withPivot('descricao');
    }
}
