<?php

namespace App\Http\Controllers;

use App\Http\Domain\RegisterUserDomain;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function __construct(private readonly RegisterUserDomain $registerUserDomain)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $domainRegister = ($this->registerUserDomain)($request);
        $data = $domainRegister->getSuccess() ? $domainRegister->getData() : $domainRegister->getMessage();
        return response()->json($data, $domainRegister->getStatusCode());
    }
}
