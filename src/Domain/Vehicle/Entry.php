<?php

namespace App\Domain\Vehicle;

use \DateTimeInterface;

class Entry
{
    public function __construct(
        DateTimeInterface $date,
        float $gallons,
        float $total,
        int $trip,
        int $odometer
    ) {}

    public function __toArray(): array
    {
        return [
            'date'     => $this->date,
            'gallons'  => $this->gallons,
            'total'    => $this->total,
            'trip'     => $this->trip,
            'odometer' => $this->odometer
        ];
    }
}
