<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\Admin;
use App\Models\ResponsableCite;
use App\Models\Etudiant;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom_prenom' => 'required|string|max:255',
            'email_user' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'user_type' => 'required|string|in:admin,responsableCite,etudiant', // Validation du type d'utilisateur
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'nom_prenom' => $request->nom_prenom,
            'email_user' => $request->email_user,
            'password' => Hash::make($request->password),
        ]);


        $token = JWTAuth::fromUser($user);

      // Enregistrement du token dans le champ remember_token
      $user->setRememberToken($token);
      $user->save();
// Enregistrement dans la table spécifique selon le type d'utilisateur
switch ($request->user_type) {
    case 'admin':
        $admin = new Admin();
        $admin->user()->associate($user);
        $admin->save();
        break;

    case 'responsableCite':
        $responsableCite = new ResponsableCite();
        $responsableCite->user()->associate($user);
        $responsableCite->save();
        break;

    case 'etudiant':
        $etudiant = new Etudiant();
        $etudiant->user()->associate($user);
        $etudiant->save();
        break;
}

      // Retour de la réponse avec le token
      return response()->json([
          'token' => $token,
          'token_type' => 'Bearer',
          'user_type' => $request->user_type,
          'user' => $user
      ], 201);
    }

    public function login(Request $request)
 {
    // Validation des données de connexion
    $validator = Validator::make($request->all(), [
        'email_user' => 'required|string|email',
        'password' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // Crédentials pour la connexion
    $credentials = $request->only('email_user', 'password');

    try {
        // Tentative de connexion
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        // Obtenir l'utilisateur authentifié
        $user = Auth::user();

          // Déterminer le type d'utilisateur
          if ($admin = Admin::where('id_user', $user->id_user)->first()) {
            $userType = 'admin';
        } elseif ($responsableCite = ResponsableCite::where('id_user', $user->id_user)->first()) {
            $userType = 'responsableCite';
        } elseif ($etudiant = Etudiant::where('id_user', $user->id_user)->first()) {
            $userType = 'etudiant';
        } else {
            $userType = 'unknown';
        }

        // Enregistrement du token dans le champ remember_token
        $user->setRememberToken($token);
        // Retourner le token et les informations de l'utilisateur
        return response()->json([
            'token' => $token,
            'token_type' => 'Bearer',
            'user_type' => $userType,
            'user' => $user
           // 'expires_in' => auth('api')->factory()->getTTL() * 60
        ], 200);
    } catch (JWTException $e) {
        return response()->json(['error' => 'Could not create token'], 500);
    }
}
       

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return response()->json(['token' => Auth::refresh()]);
    }

    public function me()
    {
        return response()->json(Auth::user());
    }
}
