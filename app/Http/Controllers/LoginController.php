<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
//use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function signup(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);
        $user = new User([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->save();
        return response()->json([
            'message' => 'Usuario creado correctamente!'], 201);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email'       => 'required|string|email',
            'password'    => 'required|string',
            'remember_me' => 'boolean',
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'No  autorizado'], 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse(
                $tokenResult->token->expires_at)
                    ->toDateTimeString(),
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 
            'Sesion cerrada correctamente']);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
    
    
    
    
    
    
    
    
    
    
    
    
    /*public function login(Request $request)
    {
        $login = $request->validate([
            'correo'=> 'required|string',
            'contraseña'=> 'required|string'
        ]);

        if ( !Auth::attempt($login)){
        return response(['mensaje' => 'datos ingresados invalidos']);
        }
        
        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        return response(['user'=> Auth::user(), 'access_token' =>$accessToken]);
    }*/
}
