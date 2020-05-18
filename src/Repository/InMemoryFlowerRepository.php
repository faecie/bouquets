<?php
declare(strict_types=1);

namespace Faecie\Bouquets\Repository;

use Faecie\Bouquets\Entity\Flower;

class InMemoryFlowerRepository implements RepositoryInterface
{
    /**
     * @var Flower[] array of flowers
     */
    private array $flowers = [];

    public function insert(array $collection): void
    {
        $this->flowers = array_merge(array_map(fn(Flower $flower) => $flower, $collection), $this->flowers);
    }

    public function getAllByName(string $name): array
    {
        $result = [];
        foreach ($this->flowers as $flower) {
            if ($flower->getDisplayName() === $name) {
                $result[] = $flower;
            }
        }

        return $result;
    }

    public function count(): int
    {
        return count($this->flowers);
    }

    public function delete(object $entity): void
    {
        $result = [];
        foreach ($this->flowers as $flower) {
            if ($flower !== $entity) {
                $result[] = $flower;
            }
        }

        $this->flowers = $result;
    }
}
