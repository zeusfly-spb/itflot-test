<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $success = [
            'token' => $user->createToken('MyApp')->accessToken,
            'name' => $user->name
        ];
        return response()->json(['success' => $success]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success = [
                'token' => $user->createToken('MyApp')->accessToken,
                'name' => $user->name
            ];
            return response()->json(['success' => $success]);
        } else {
            return response()->json(['error'=>'Unauthorised']);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        return response()->json(['user' => Auth::user()->toArray()]);
    }
}
