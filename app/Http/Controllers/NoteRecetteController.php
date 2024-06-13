<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoteRecette;

class NoteRecetteController extends Controller
{
    public function index()
    {
        return NoteRecette::all();
    }

    public function store(Request $request)
    {
        return NoteRecette::create($request->all());
    }

    public function show($id)
    {
        return NoteRecette::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $noteRecette = NoteRecette::findOrFail($id);
        $noteRecette->update($request->all());
        return $noteRecette;
    }

    public function destroy($id)
    {
        $noteRecette = NoteRecette::findOrFail($id);
        $noteRecette->delete();
        return response()->json(['message' => 'Note de recette supprimée avec succès']);
    }
}
