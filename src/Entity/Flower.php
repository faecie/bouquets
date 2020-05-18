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

    public function getSpecie(): string
    {
        return $this->specie;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function getDisplayName(): string
    {
        return $this->specie . $this->size;
    }

    public static function parse(string $code): ?self
    {
        $parts = [];
        if (preg_match('/^([a-z])([S,L])$/', $code, $parts) === 0 ) {
            return null;
        }

        return new self($parts[1], $parts[2]);
    }
}
