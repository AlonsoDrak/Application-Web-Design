@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Lista de Libros</h2>
                <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Agregar Libro</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>ISBN</th>
                            <th>Año de Publicación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author_name }}</td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->published_year }}</td>
                                <td>
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-info">Editar</a>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este libro?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection