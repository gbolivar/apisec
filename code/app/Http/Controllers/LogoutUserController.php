<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutUserController extends Controller
{
    public function __invoke(): JsonResponse
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Logged out successfully']);
    }
}
