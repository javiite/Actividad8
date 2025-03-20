@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Superhéroe</h1>
    <form action="{{ route('superheroes.update', $superhero->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nombre Real</label>
            <input type="text" name="real_name" class="form-control" value="{{ $superhero->real_name }}" required>
        </div>
        <div class="mb-3">
            <label>Alias</label>
            <input type="text" name="hero_name" class="form-control" value="{{ $superhero->hero_name }}" required>
        </div>
        <div class="mb-3">
            <label>URL de la Foto</label>
            <input type="text" name="photo_url" class="form-control" value="{{ $superhero->photo_url }}" required>
        </div>
        <div class="mb-3">
            <label>Información Adicional</label>
            <textarea name="description" class="form-control">{{ $superhero->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection