<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)
            ->first();

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Credenciales invalidas'
            ], 401);
        }
        return response()->json([
            'ok'    => true,
            'data' => $user,
            'token' => $user->createToken('create_token')->plainTextToken,
            'message' => 'Success'
        ]);
    }

    public function me()
    {
        return response()->json([
            'ok'    => true,
            'data'  => auth()->user(),
            'message' => 'success'
        ]);
    }
}
