<?php

namespace App\Services\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Validation\Validator as ValidatorUser;

class CreateUserValidator
{
    public function __invoke(Request $request): ValidatorUser
    {
        return Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }
}
