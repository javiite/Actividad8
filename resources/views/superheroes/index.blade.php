@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Superhéroes</h1>
    <a href="{{ route('superheroes.create') }}" class="btn btn-primary">Agregar Superhéroe</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nombre Real</th>
                <th>Alias</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($superheroes as $hero)
            <tr>
                <td>{{ $hero->real_name }}</td>
                <td>{{ $hero->hero_name }}</td>
                <td><img src="{{ $hero->photo_url }}" alt="{{ $hero->hero_name }}" width="100"></td>
                <td>
                    <a href="{{ route('superheroes.show', $hero->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('superheroes.edit', $hero->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('superheroes.destroy', $hero->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminarlo?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection