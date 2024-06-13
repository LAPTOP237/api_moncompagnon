<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cite;

class CiteController extends Controller
{
    public function index()
    {
        return Cite::all();
    }

    public function store(Request $request)
    {
        return Cite::create($request->all());
    }

    public function show($id)
    {
        $cite = Cite::with('chambres')->findOrFail($id);
        return response()->json($cite);
    }

    public function update(Request $request, $id)
    {
        $cite = Cite::findOrFail($id);
        $cite->update($request->all());
        return $cite;
    }

    public function destroy($id)
    {
        $cite = Cite::findOrFail($id);
        $cite->delete();
        return response()->json(['message' => 'Cité supprimée avec succès']);
    }
}
