<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    /**
     * Define os campos que podem ser gravados
     * @var array
     */
    protected $fillable = ['escola_id','turno', 'serie', 'nivel', 'ano'];
    

    public function escola()
    {
        return $this->belongsTo(Escola::class, 'escola_id', 'id');
    }

    public function aluno()
    {
        return $this->belongsToMany( Aluno::class, 'alunos_turmas', 'turma_id', 'aluno_id');
    }
}
