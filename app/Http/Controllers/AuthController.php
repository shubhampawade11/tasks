<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            
        ]);

        $user->save();
        $token = $user->createToken('AuthToken')->plainTextToken;
        return response()->json(['message' => 'User created successfully', 'token' => $token], 201);
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    if (!auth()->attempt($request->only('email', 'password'))) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    $token = auth()->user()->createToken('AuthToken')->plainTextToken;

    return response()->json(['token' => $token], 200);
}

public function loginShow(Request $request){

    $user = $request->user();
    return response()->json(['message' => 'Show the authenticated user', 'user' => $user], 200);
}
}