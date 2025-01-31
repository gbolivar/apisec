<?php

namespace App\Dto;

use Illuminate\Support\MessageBag;

readonly class ReturnServiceOrDomainDto
{

    public function __construct(
        private bool $success,
        private MessageBag|string $message,
        private array|null $data,
        private int $statusCode = 0
    ) {}

    public function getSuccess(): bool
    {
        return $this->success;
    }

    public function getMessage(): MessageBag|string
    {
        return $this->message;
    }

    public function getData(): array|null
    {
        return $this->data;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}
