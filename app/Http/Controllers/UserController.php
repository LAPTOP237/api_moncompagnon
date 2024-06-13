<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_prenom' => 'required|string',
            'email_user' => 'required|email|unique:users,email_user',
            'photo_user' => 'nullable|string',
            'sexe_user' => 'required|string|max:2',
            'date_naiss' => 'required|date',
            'tel' => 'required|string',
            'tel_whatsapp' => 'nullable|string',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:6',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        return response()->json($user, 201);
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'nom_prenom' => 'sometimes|required|string',
            'email_user' => 'sometimes|required|email|unique:users,email_user,' . $id,
            'photo_user' => 'nullable|string',
            'sexe_user' => 'sometimes|required|string|max:2',
            'date_naiss' => 'sometimes|required|date',
            'tel' => 'sometimes|required|string',
            'tel_whatsapp' => 'nullable|string',
            'username' => 'sometimes|required|string|unique:users,username,' . $id,
            'password' => 'nullable|string|min:6',
        ]);

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(null, 204);
    }
}
