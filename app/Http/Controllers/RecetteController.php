<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recette;

class RecetteController extends Controller
{
    public function index()
    {
        return Recette::all();
    }

    public function store(Request $request)
    {
        return Recette::create($request->all());
    }

    public function show($id)
    {
        $recette = Recette::with('ingredients')->findOrFail($id);
        return response()->json($recette);
    }

    public function update(Request $request, $id)
    {
        $recette = Recette::findOrFail($id);
        $recette->update($request->all());
        return $recette;
    }

    public function destroy($id)
    {
        $recette = Recette::findOrFail($id);
        $recette->delete();
        return response()->json(['message' => 'Recette supprimée avec succès']);
    }
}
