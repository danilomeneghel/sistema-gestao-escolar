@extends('layout')

@section('titulo', 'Gestão Escolar')

@section('content')
<div class="margin-card">
    <div class="row">
        <div class="card col-card bg-blue">
            <a href="{{ route('escolas.index') }}">
                <img src="{{asset('images/escolas.png')}}" class="card-img-top">
            </a>
            <div class="card-body text-right">
                <p class="card-text">
                    <a class="text-white" href="{{ route('escolas.index') }}">ESCOLAS ></a>
                </p>
            </div>
        </div>
        <div class="card col-card bg-blue">
            <a href="{{ route('alunos.index') }}">
                <img src="{{asset('images/alunos.png')}}" class="card-img-top">
            </a>
            <div class="card-body text-right">
                <p class="card-text">
                    <a class="text-white" href="{{ route('alunos.index') }}">ALUNOS ></a>
                </p>
            </div>
        </div>
        <div class="card col-card bg-blue">
            <a href="{{ route('turmas.index') }}">
                <img src="{{asset('images/turmas.png')}}" class="card-img-top">
            </a>
            <div class="card-body text-right">
                <p class="card-text">
                    <a class="text-white" href="{{ route('turmas.index') }}">TURMAS ></a>
                </p>
            </div>
        </div>
        <div class="card col-card bg-blue">
            <a href="{{ route('materias.index') }}">
                <img src="{{asset('images/materias.png')}}" class="card-img-top">
            </a>
            <div class="card-body text-right">
                <p class="card-text">
                    <a class="text-white" href="{{ route('materias.index') }}">MATÉRIAS ></a>
                </p>
            </div>
        </div>
        <div class="card col-card bg-blue">
            <a href="{{ route('periodos.index') }}">
                <img src="{{asset('images/periodos.png')}}" class="card-img-top">
            </a>
            <div class="card-body text-right">
                <p class="card-text">
                    <a class="text-white" href="{{ route('periodos.index') }}">PERÍODOS ></a>
                </p>
            </div>
        </div>
        <div class="card col-card bg-blue">
            <a href="{{ route('notas.index') }}">
                <img src="{{asset('images/notas.png')}}" class="card-img-top">
            </a>
            <div class="card-body text-right">
                <p class="card-text">
                    <a class="text-white" href="{{ route('notas.index') }}">NOTAS ></a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
