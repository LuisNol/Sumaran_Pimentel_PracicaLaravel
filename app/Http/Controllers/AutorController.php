<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Http\Requests\AutorRequest;

/**
 * Class AutorController
 * @package App\Http\Controllers
 */
class AutorController extends Controller
{
   
    public function index()
    {
        $autores = Autor::all();
        return response()->json($autores);
    }


  
    public function create()
    {
        $autor = new Autor();
        return view('autor.create', compact('autor'));
    }

  
    public function store(AutorRequest $request)
    {
        $autor = Autor::create($request->all());
        return response()->json($autor, 201);
    }

   
    public function show($id)
    {

        $autor = Autor::find($id);
        if (!$autor) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
        return response()->json($autor);
    }
   
    public function edit($id)
    {
        $autor = Autor::find($id);

        return view('autor.edit', compact('autor'));
    }

   
    public function update(AutorRequest $request, $id)
    {
        $autor = Autor::findOrFail($id);
        $autor->update($request->all());
        return response()->json($autor, 200);
    }
  
    public function destroy($id)
    {
  
        $autor = Autor::find($id);
        if (!$autor) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        $autor->delete();

        return response()->json(['message' => 'Producto eliminado correctamente']); 

    }
}
