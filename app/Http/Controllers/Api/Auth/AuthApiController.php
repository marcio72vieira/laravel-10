<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthApiController extends Controller
{
    public function login (Request $request) {
        $credential = $request->only([
            'email', 
            'password', 
            'device_name'
        ]);


        $user = User::where('email', $request->email)->first();

        // Hash::check($request->password, $user->password)

        // Se não encontrou o usuário ou a senha está incorreta, lança uma exception.
        if(!$user || !Hash::check($request->password, $user->password)){
          throw ValidationException::withMessages([
            'email' => 'The credentials are incorrects'
          ]);
        }

        // Implementando um login único, deletando todos os tokens do usuário armazenado no banco.
        // Deslogando o usuário de todos os outros dispositivos que o usuário estiver logado.
        // Logout others devices
        // if ($request->has('logout_others_devices)){$user->tokens()->delete();}
        
        $user->tokens()->delete();

        // Se encontrou o usuário, cria um token para o mesmo, com o método createToken, extraido da trait(HasApiTokens) utilizada no model User
        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
          'token' => $token
        ]);
    }
}
