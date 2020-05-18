<?php
declare(strict_types=1);

namespace Faecie\Bouquets\Repository;

interface RepositoryInterface
{
    public function count(): int;
    public function getAllByName(string $name): array;
    public function insert(array $collection): void;
    public function delete(object $entity): void;
}
