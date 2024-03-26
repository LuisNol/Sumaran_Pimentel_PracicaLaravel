<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Http\Requests\LibroRequest;

/**
 * Class LibroController
 * @package App\Http\Controllers
 */
class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::all();
        return response()->json($libros);
    }

    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return response()->json($libro);
    }

    public function store(LibroRequest $request)
    {
        $libro = Libro::create($request->all());
        return response()->json($libro, 201);
    }

    public function update(LibroRequest $request, $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->update($request->all());
        return response()->json($libro, 200);
    }

    public function destroy($id)
    {
        Libro::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
