<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoteChambre;

class NoteChambreController extends Controller
{
    public function index()
    {
        return NoteChambre::all();
    }

    public function store(Request $request)
    {
        return NoteChambre::create($request->all());
    }

    public function show($id)
    {
        return NoteChambre::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $noteChambre = NoteChambre::findOrFail($id);
        $noteChambre->update($request->all());
        return $noteChambre;
    }

    public function destroy($id)
    {
        $noteChambre = NoteChambre::findOrFail($id);
        $noteChambre->delete();
        return response()->json(['message' => 'Note de chambre supprimée avec succès']);
    }
}
