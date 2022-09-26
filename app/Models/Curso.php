<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model {

    protected $table = 'cursos';

    public function disciplina() {
        return $this->hasMany('\App\Models\Disciplina');
    }
}
