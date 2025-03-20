@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de {{ $superhero->hero_name }}</h1>
    <p><strong>Nombre Real:</strong> {{ $superhero->real_name }}</p>
    <p><strong>Alias:</strong> {{ $superhero->hero_name }}</p>
    <img src="{{ $superhero->photo_url }}" alt="{{ $superhero->hero_name }}" width="200">
    <p><strong>Información Adicional:</strong> {{ $superhero->description }}</p>
    <a href="{{ route('superheroes.index') }}" class="btn btn-secondary">Volver</a>
</div>