<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginApiRequest;
use App\Http\Requests\Api\LoginApiResponse;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming login request.
     */
    public function __invoke(LoginApiRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        if (! Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Your credentials do not match our records.'
            ], 401);
        }

        $user = Auth::user();

        $token = $user->createToken('myAppToken')->plainTextToken;

        return response()->json([
            'token' => $token,
        ], 200);
    }
}
