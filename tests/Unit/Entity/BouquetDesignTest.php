<?php
declare(strict_types=1);

namespace Tests\Faecie\Bouquets\Unit\Entity;

use Faecie\Bouquets\Entity\BouquetDesign;
use PHPUnit\Framework\TestCase;

class BouquetDesignTest extends TestCase
{
    public function testParsesCorrectDesign(): void
    {
        $testDesignCode = 'AS3a4b6k20';
        $design = BouquetDesign::parse($testDesignCode);

        $this->assertSame('S', $design->getSize());
        $this->assertSame('A', $design->getName());
        $this->assertSame(20, $design->getTotalQuantity());
        $this->assertCount(3, $design->getFlowerQuantities());
    }

    /**
     * @dataProvider invalidDesignStringProvider
     */
    public function testDoesNotParseInvalidDesignString(string $invalidDesignString): void
    {
        $design = BouquetDesign::parse($invalidDesignString);

        $this->assertNull($design);
    }

    public function invalidDesignStringProvider(): array
    {
        return [
            'empty string considered invalid design code' => [''],
            'string with spaces' => ['AS3a 4b6k20'],
            'string with wrong bouquet size code' => ['AM3a4b6k20'],
            'without flower quantities' => ['AS20'],
            'without total flowers quantity' => ['AS3a4b6k'],
        ];
    }
}
