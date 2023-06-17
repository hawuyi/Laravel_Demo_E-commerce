<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    //

    public function signup(CreateUser $reguest)
    {
        $validatedData = $reguest->validated();  
        $user = new User([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);
        $user->save();
        return response('success', 201);    
    }
    public function login(Request $reguest)
    {
        $validatedData = $reguest->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        if(!Auth::attempt($validatedData)) {
            return response('授權失敗', 401);
        }
        $user = $reguest->user();
        $tokenResult = $user->createToken('Token');
        $tokenResult->token->save();
        return response(['token' => $tokenResult->accessToken]);
    }
    public function logout(Request $reguest)
    {
        $reguest->user()->token()->revoke();
        return response(
            ['message' => '成功登出']
        );
    }
    public function user(Request $reguest)
    {
        return response(
            $reguest->user()
        );
    }
}
