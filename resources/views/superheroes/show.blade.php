
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $superhero->hero_name }}</h1>

    <div class="mb-3">
        <strong>Nombre Real:</strong> {{ $superhero->real_name }}
    </div>

    <div class="mb-3">
        <strong>Foto:</strong><br>
        <img src="{{ asset('storage/' . $superhero->photo) }}" width="200">
    </div>

    <div class="mb-3">
        <strong>Información Adicional:</strong>
        <p>{{ $superhero->additional_info }}</p>
    </div>

    <a href="{{ route('superheroes.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('superheroes.edit', $superhero) }}" class="btn btn-warning">Editar</a>
@endsection
