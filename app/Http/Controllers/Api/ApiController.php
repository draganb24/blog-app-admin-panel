<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{

    public function login(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return redirect('/')->with([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if (!Auth::attempt($request->only(['email', 'password']))) {
                return redirect('/')->with([
                    'status' => false,
                    'message' => 'Email and password do not match any records',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();
            return redirect('/objave')->with([
                'status' => true,
                'message' => 'User logged in successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ]);
        } catch (\Throwable $th) {
            return redirect('/')->with([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function logout()
    {
        return redirect('/ulogujte-se')->with([
            'status' => true,
            'message' => 'User logged out',
            'data' => []
        ], 200);
    }
}
