<?php
declare(strict_types=1);

namespace Tests\Faecie\Bouquets\Unit;

use Faecie\Bouquets\Entity\Flower;
use PHPUnit\Framework\TestCase;

class FlowerTest extends TestCase
{
    public function testDisplayName(): void
    {
        $sut = new Flower('e', 'L');
        $this->assertSame('eL', $sut->getDisplayName());
    }
}
