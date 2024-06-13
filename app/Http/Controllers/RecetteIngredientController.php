<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecetteIngredient;

class RecetteIngredientController extends Controller
{
    public function index()
    {
        return RecetteIngredient::all();
    }

    public function store(Request $request)
    {
        return RecetteIngredient::create($request->all());
    }

    public function show($id)
    {
        return RecetteIngredient::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $recetteIngredient = RecetteIngredient::findOrFail($id);
        $recetteIngredient->update($request->all());
        return $recetteIngredient;
    }

    public function destroy($id)
    {
        $recetteIngredient = RecetteIngredient::findOrFail($id);
        $recetteIngredient->delete();
        return response()->json(['message' => 'Recette-Ingredient supprimé avec succès']);
    }
}

