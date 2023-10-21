<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'telefone', 'data_nascimento', 'genero'];

    public function turma()
    {
        return $this->belongsToMany(Turma::class, 'alunos_turmas', 'aluno_id', 'turma_id');
    }
}
