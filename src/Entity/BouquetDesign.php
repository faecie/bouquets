<?php
declare(strict_types=1);

namespace Faecie\Bouquets\Entity;

class BouquetDesign
{
    private string $name;
    private string $size;
    private int $totalQuantity;
    private array $flowerQuantities;

    public function __construct(string $name, string $size, array $flowerQuantities, int $totalQuantity)
    {
        $this->name = $name;
        $this->size = $size;
        $this->totalQuantity = $totalQuantity;
        $this->flowerQuantities = $flowerQuantities;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * @return int
     */
    public function getTotalQuantity(): int
    {
        return $this->totalQuantity;
    }

    /**
     * @return array
     */
    public function getFlowerQuantities(): array
    {
        return $this->flowerQuantities;
    }

    public static function parse(string $code): ?self
    {
        $parts = [];
        if (preg_match('/^([A-Z])([S,L])((\d+[a-z])+)(\d+)$/', $code, $parts) === 0 ) {
            return null;
        }

        $matches = [];
        preg_match_all('/(\d+)([a-z])/', $code, $matches);

        $quantities = array_combine($matches[2], array_map('intval' , $matches[1]));

        return new self($parts[1], $parts[2], $quantities, (int) $parts[5]);
    }
}
