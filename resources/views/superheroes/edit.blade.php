@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Superhéroe</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('superheroes.update', $superhero) }}" method="POST" enctype="multipart/form-data">
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
            <label>Foto actual:</label><br>
            <img src="{{ asset('storage/' . $superhero->photo) }}" width="150">
        </div>
        <div class="mb-3">
            <label>Subir nueva foto</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <div class="mb-3">
            <label>Información Adicional</label>
            <textarea name="additional_info" class="form-control">{{ $superhero->additional_info }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
