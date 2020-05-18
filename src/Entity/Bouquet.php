<?php
declare(strict_types=1);

namespace Faecie\Bouquets\Entity;

class Bouquet
{
    private string $name;
    private string $size;

    /**
     * @var array|Flower[]
     */
    private array $flowers;

    public function __construct(string $name, string $size, array $flowers)
    {
        $this->name = $name;
        $this->size = $size;
        $this->flowers = array_map(fn(Flower $flower) => $flower, $flowers);
    }

    public function getCode(): string
    {
        $flowerQuantities = $this->getFlowerQuantities();
        ksort($flowerQuantities);
        $quantitiesString = '';
        foreach ($flowerQuantities as $specie => $quantity) {
            $quantitiesString .= $quantity . $specie;
        }

        return $this->name . $this->size . $quantitiesString;
    }

    private function getFlowerQuantities(): array
    {
        $result = [];
        foreach ($this->flowers as $flower) {
            $specie = $flower->getSpecie();
            $result[$specie] = isset($result[$specie]) ? $result[$specie] + 1 : 1;
        }

        return $result;
    }
}
