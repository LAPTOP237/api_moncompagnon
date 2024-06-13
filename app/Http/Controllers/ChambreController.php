<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chambre;

class ChambreController extends Controller
{
    public function index()
    {
        return Chambre::all();
    }

    public function store(Request $request)
    {
        return Chambre::create($request->all());
    }

    public function show($id)
    {
        return Chambre::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $chambre = Chambre::findOrFail($id);
        $chambre->update($request->all());
        return $chambre;
    }

    public function destroy($id)
    {
        $chambre = Chambre::findOrFail($id);
        $chambre->delete();
        return response()->json(['message' => 'Chambre supprimée avec succès']);
    }
}
