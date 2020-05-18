<?php

declare(strict_types=1);

namespace Faecie\Bouquets\Entity;

class Flower
{
    private string $specie;
    private string $size;

    public function __construct(string $specie, string $size)
    {
        $this->specie = $specie;
        $this->size = $size;
    }

    public function getDisplayName(): string
    {
        return $this->specie . $this->size;
    }
}
