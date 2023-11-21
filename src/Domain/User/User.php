<?php

namespace App\Domain\User;

class User
{
    public function __construct(
        private string $username,
        private string $password
    ) {}

    public function toArray(): array
    {
        return [
            'username' => $username,
            'password' => $password
        ];
    }
}
