<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{

    public function login(Request $request)
{
    try {
        $validator = $this->validateLoginRequest($request);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors());
        }

        if (!auth()->attempt($request->only(['email', 'password']))) {
            return response()->json([
                'status' => false,
                'message' => 'Ne postoji takav korisnik u bazi.',
            ], 401);
        }
        return redirect('/objave');

    } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage(),
        ], 500);
    }
}


    public function logout() {
        session()->flush();
        return redirect('/');
    }

    private function validateLoginRequest(Request $request)
    {
        return Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
    }

    private function validationErrorResponse($errors)
    {
        return response()->json([
            'status' => false,
            'message' => 'Greška tokom validacije',
            'errors' => $errors
        ], 401);
    }
}
