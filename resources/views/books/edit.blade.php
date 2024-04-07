<!-- resources/views/books/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Editar Libro</h2>
                <form action="{{ route('books.update', $book->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Título:</label>
                        <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="author_name">Autor:</label>
                        <input type="text" name="author_name" class="form-control" value="{{ $book->author_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="isbn">ISBN:</label>
                        <input type="text" name="isbn" class="form-control" value="{{ $book->isbn }}" required>
                    </div>
                    <div class="form-group">
                        <label for="published_year">Año de Publicación:</label>
                        <input type="number" name="published_year" class="form-control" value="{{ $book->published_year }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection