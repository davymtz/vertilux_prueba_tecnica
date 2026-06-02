<?php

namespace App\Http\Controllers;

use App\Exceptions\NotFoundException;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        
        $credentials = $request->toArray();

        if (!Auth::attempt($credentials)) {
            // throw new NotFoundException('Usuario no encontrado');
            return response()->json([
                'message' => 'Credenciales no válidas'
            ], 422);
        }

        $user = Auth::user();

        $token = $user->createToken('sanctum-personal');

        return (object)[
            'user' => [
                'name' => $user->name, 'email' => $user->email
            ],
            'token' => $token->plainTextToken,
            'tokenExpiration' => $token->accessToken->expires_at ?? null
        ];
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out'
        ]);
    }
}
