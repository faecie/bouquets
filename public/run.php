<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use \Faecie\Bouquets\Entity\BouquetDesign;
use Faecie\Bouquets\Entity\Bouquet;
use \Faecie\Bouquets\Entity\Flower;
use \Faecie\Bouquets\Repository\InMemoryFlowerRepository;
use \Faecie\Bouquets\Service\BouquetProductionFacility;

fwrite(STDOUT, "Enter bouquet design and press ENTER. Press double Enter if you're done with it \n");

$finished = false;
$designs = [];
$flowerRepository = new InMemoryFlowerRepository();
$productionFacility = new BouquetProductionFacility($flowerRepository);

while (true) {
    $designCode = fgets(STDIN, 1024);
    if ("\n" == $designCode) {
        break;
    }

    $design = BouquetDesign::parse($designCode);
    if (! $design instanceof BouquetDesign) {
        fwrite(STDOUT, "Incorrect design $designCode. Please follow the format (read specs)\n");
    } else {
        $designs[$designCode] = $design;
    }
}

fwrite(STDOUT, "Add a flower and press Enter. Press double Enter to exit\n");
while (true) {
    $flowerCode = fgets(STDIN, 1024);
    if ("\n" == $flowerCode) {
        break;
    }

    $flower = Flower::parse($flowerCode);
    if (! $flower instanceof Flower) {
        fwrite(STDOUT, "Wrong flower format. Please follow the specs (e.g eL, dS, gL - are correct formats) \n");
    } else {
        $flowerRepository->insert([$flower]);
    }

    foreach ($designs as $design) {
        $bouquet = $productionFacility->getBouquet($design);
        if ($bouquet instanceof Bouquet) {
            fwrite(STDOUT, $bouquet->getCode() . "\n");
        }
    }
}
