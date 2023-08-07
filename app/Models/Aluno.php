<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    /**
     * Define os campos que podem ser gravados
     * @var array
     */
    protected $fillable = ['nome','telefone', 'email', 'data_nascimento', 'genero'];
    

    public function turma()
    {
        return $this->belongsToMany( Turma::class, 'alunos_turmas', 'aluno_id', 'turma_id');
    }
}
