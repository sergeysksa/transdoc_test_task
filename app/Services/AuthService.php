<?php

namespace App\Services;

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class AuthService
{

    public function authCheck(): Response
    {
        if(!auth()->check()) {
            return response('User not Auth', 401);
        }

        return response()->json([
            'user' => auth()->user(),
            'token'=> auth()->user()->createToken('transdoc')->plainTextToken
        ]);
    }
}
