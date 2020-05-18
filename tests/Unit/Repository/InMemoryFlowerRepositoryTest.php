<?php
declare(strict_types=1);

namespace Tests\Faecie\Bouquets\Unit\Repository;

use Faecie\Bouquets\Entity\Flower;
use Faecie\Bouquets\Repository\InMemoryFlowerRepository;
use PHPUnit\Framework\TestCase;

class InMemoryFlowerRepositoryTest extends TestCase
{
    public function testCanInsertFlower(): void
    {
        $sut = new InMemoryFlowerRepository();
        $sut->insert([
            new Flower('e', 'L'),
            new Flower('p', 'S'),
            new Flower('e', 'S'),
            new Flower('e', 'L'),
        ]);

        $this->assertSame(4, $sut->count());
        $this->assertCount(2, $sut->getAllByName('eL'));
    }

    public function testCanRemoveFlower(): void
    {
        $flowerToRemove = new Flower('e', 'L');
        $sut = new InMemoryFlowerRepository();
        $sut->insert([
            new Flower('e', 'L'),
            new Flower('p', 'S'),
            new Flower('e', 'S'),
            $flowerToRemove,
        ]);

        $sut->delete($flowerToRemove);

        $this->assertSame(3, $sut->count());
        $this->assertCount(1, $sut->getAllByName('eL'));
    }
}
