

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Superhéroes</h1>
    <a href="{{ route('superheroes.create') }}" class="btn btn-primary mb-3">AGREGAR SUPERHEROE</a>
    
    <a href="{{ route('superheroes.trash') }}" class="btn btn-primary mb-3">
        VER ELIMINADOS
    </a>

    


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre Real</th>
                <th>Alias</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($superheroes as $superhero)
                <tr>
                    <td>{{ $superhero->real_name }}</td>
                    <td>{{ $superhero->hero_name }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $superhero->photo) }}" width="80" height="80">
                    </td>
                    <td>
                        <a href="{{ route('superheroes.show', $superhero) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('superheroes.edit', $superhero) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('superheroes.destroy', $superhero) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
