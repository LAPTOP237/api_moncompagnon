<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    public function index()
    {
        return Ingredient::all();
    }

    public function store(Request $request)
    {
        return Ingredient::create($request->all());
    }

    public function show($id)
    {
        return Ingredient::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->update($request->all());
        return $ingredient;
    }

    public function destroy($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();
        return response()->json(['message' => 'Ingrédient supprimé avec succès']);
    }
}
