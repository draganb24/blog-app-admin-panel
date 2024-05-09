<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CurrentlyLoggedInUser;
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
                return redirect('/ulogujte-se')->with([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if (!Auth::attempt($request->only(['email', 'password']))) {
                return redirect('/ulogujte-se')->with([
                    'status' => false,
                    'message' => 'Email and password do not match any records',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();
            $userAgent = md5($request->header('User-Agent'));
            $token = $user->createToken("API TOKEN")->plainTextToken;

            CurrentlyLoggedInUser::create([
                'user_id' => $user->id,
                'session_token' => $token,
                'browser' => $userAgent
            ]);

            return redirect('/objave')->with([
                'status' => true,
                'message' => 'User logged in successfully',
                'token' => $token
            ]);
        } catch (\Throwable $th) {
            return redirect('/ulogujte-se')->with([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        $lastLoggedInUser = CurrentlyLoggedInUser::latest()->first();

        if ($lastLoggedInUser) {
            $lastLoggedInUser->delete();
        }

        return redirect('/ulogujte-se')->with([
            'status' => true,
            'message' => 'User logged out',
            'data' => []
        ], 200);
    }
}
