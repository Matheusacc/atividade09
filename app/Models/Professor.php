<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = 'professores';

    public function eixo() {
        return $this->hasOne(Eixo::class, 'id', 'eixo_id');
    }
}
