@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Superhéroe</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('superheroes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nombre Real</label>
            <input type="text" name="real_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alias</label>
            <input type="text" name="hero_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Foto del Superhéroe</label>
            <input type="file" name="photo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Información Adicional</label>
            <textarea name="additional_info" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
