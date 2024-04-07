<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // Mostrar todos los libros
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // Mostrar el formulario para crear un nuevo libro
    public function create()
    {
        return view('books.create');
    }

    // Almacenar un nuevo libro en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author_name' => 'required',
            'isbn' => 'required|unique:books',
            'published_year' => 'required|numeric',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Libro creado exitosamente.');
    }

    // Mostrar el formulario para editar un libro
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // Actualizar el libro en la base de datos
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author_name' => 'required',
            'isbn' => 'required|unique:books,isbn,'.$book->id,
            'published_year' => 'required|numeric',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Libro actualizado exitosamente.');
    }

    // Eliminar un libro de la base de datos
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Libro eliminado exitosamente.');
    }
}