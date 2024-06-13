<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeRecette;

class TypeRecetteController extends Controller
{
    public function index()
    {
        return TypeRecette::all();
    }

    public function store(Request $request)
    {
        return TypeRecette::create($request->all());
    }

    public function show($id)
    {
        return TypeRecette::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $typeRecette = TypeRecette::findOrFail($id);
        $typeRecette->update($request->all());
        return $typeRecette;
    }

    public function destroy($id)
    {
        $typeRecette = TypeRecette::findOrFail($id);
        $typeRecette->delete();
        return response()->json(['message' => 'Type de recette supprimé avec succès']);
    }
}
