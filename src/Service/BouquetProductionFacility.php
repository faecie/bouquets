<?php
declare(strict_types=1);

namespace Faecie\Bouquets\Service;

use Faecie\Bouquets\Entity\Bouquet;
use Faecie\Bouquets\Entity\BouquetDesign;
use Faecie\Bouquets\Entity\Flower;
use Faecie\Bouquets\Repository\RepositoryInterface;

class BouquetProductionFacility
{
    private RepositoryInterface $flowersRepository;

    public function __construct(RepositoryInterface $flowersRepository)
    {
        $this->flowersRepository = $flowersRepository;
    }

    public function getBouquet(BouquetDesign $design): ?Bouquet
    {
        if ($design->getTotalQuantity() > $this->flowersRepository->count()) {
            return null;
        }

        if ($design->getTotalQuantity() > $this->flowersRepository->countWithSize($design->getSize())) {
            return null;
        }

        $flowers = $this->getBouquetFlowers($design);
        if (empty($flowers)) {
            return null;
        }

        if (count($flowers) < $design->getTotalQuantity()) {
            $flowers = array_merge($flowers, $this->getExtraFlowers($design));
        }

        return new Bouquet($design->getName(), $design->getSize(), $flowers);
    }

    private function getBouquetFlowers(BouquetDesign $design): array
    {
        $flowers = [];
        foreach ($design->getFlowerQuantities() as $specie => $quantity) {
            $specificFlowers = $this->flowersRepository->getAllByName($specie . $design->getSize());
            if (count($specificFlowers) < $quantity) {
                return [];
            }

            $flowers = array_merge($flowers, array_slice($specificFlowers, 0, $quantity));
        }

        array_map(fn(Flower $flower) => $this->flowersRepository->delete($flower), $flowers);

        return $flowers;
    }

    private function getExtraFlowers(BouquetDesign $design): array
    {
        $remains = $this->flowersRepository->getAll();
        $extraFlowers = array_filter($remains, fn(Flower $flower) => $flower->getSize() === $design->getSize());
        array_map(fn(Flower $flower) => $this->flowersRepository->delete($flower), $extraFlowers);

        return $extraFlowers;
    }
}
