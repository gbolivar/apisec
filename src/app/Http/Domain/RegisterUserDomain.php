<?php

namespace App\Http\Domain;

use App\Dto\ReturnServiceOrDomainDto;
use App\Dto\UserRegisterDto;
use App\Models\User;
use App\Services\Validator\CreateUserValidator;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

readonly class RegisterUserDomain
{
    public function __construct(private CreateUserValidator $validator)
    {
    }
    public function __invoke(Request $request): ReturnServiceOrDomainDto
    {
        $validator = ($this->validator)($request);

        if ($validator->fails()) {
            return new ReturnServiceOrDomainDto(
                success: false,
                message: $validator->errors(),
                data: null,
                statusCode: 422
            );
        }

        $dataDto = new UserRegisterDto(
            name: $request->name,
            email: $request->email,
            password: $request->password
        );

        $user = User::register($dataDto);

        $token = JWTAuth::fromUser($user);
        return new ReturnServiceOrDomainDto(
            success: true,
            message: $token,
            data: ['token' => $token],
            statusCode: 201
        );
    }
}
