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
}
