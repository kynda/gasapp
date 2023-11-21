<?php

namespace App\Domain\Vehicle;

class Vehicle
{
    public function __construct(
        private string $nick,
        private string $make,
        private string $model,
        private string $year,
        private int $tank
    ) {}

    public function toArray(): array
    {
        return [
            'nick'  => $this->nick,
            'make'  => $this->make,
            'model' => $this->model,
            'year'  => $this->year,
            'tank'  => $this->tank
        ];
    }
}
