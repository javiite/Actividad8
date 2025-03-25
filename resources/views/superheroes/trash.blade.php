@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Superhéroes Eliminados</h1>

    <a href="{{ route('superheroes.trash') }}" class="btn btn-primary mb-3">← Volver a la lista</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($superheroes->count())
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
                @foreach ($superheroes as $superhero)
                    <tr>
                        <td>{{ $superhero->real_name }}</td>
                        <td>{{ $superhero->hero_name }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $superhero->photo_url) }}" width="100" height="100" alt="Foto">
                        </td>
                        <td>
                            <form action="{{ route('superheroes.restore', $superhero->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-success btn-sm">Restaurar</button>
                            </form>

                            <form action="{{ route('superheroes.forceDelete', $superhero->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro que deseas eliminarlo permanentemente?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Eliminar Definitivamente</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay superhéroes eliminados.</p>
    @endif
</div>
@endsection
