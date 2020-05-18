<?php
declare(strict_types=1);

namespace Tests\Faecie\Bouquets\Integration\Service;

use Faecie\Bouquets\Entity\Bouquet;
use Faecie\Bouquets\Entity\BouquetDesign;
use Faecie\Bouquets\Entity\Flower;
use Faecie\Bouquets\Repository\InMemoryFlowerRepository;
use Faecie\Bouquets\Service\BouquetProductionFacility;
use PHPUnit\Framework\TestCase;

class BouquetProductionFacilityTest extends TestCase
{
    public function testGetBouquet(): void
    {
        $design = BouquetDesign::parse('VL1d1b1a4');
        $flowerRepository = new InMemoryFlowerRepository();
        $productionFacility = new BouquetProductionFacility($flowerRepository);

        $flowerRepository->insert([
            Flower::parse('dL'),
            Flower::parse('bL'),
            Flower::parse('aL'),
            Flower::parse('fL'),
        ]);

        $bouquet = $productionFacility->getBouquet($design);
        $this->assertInstanceOf(Bouquet::class, $bouquet);
    }
}
