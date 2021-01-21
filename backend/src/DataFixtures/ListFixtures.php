<?php

namespace App\DataFixtures;

use App\Entity\ListEntity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ListFixtures extends Fixture
{
    private const COUNT_LIST = 5;

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i <= self::COUNT_LIST; $i++){
            $product = new ListEntity();
            $product->setName("Name list {$i}");
            $product->setValue($i);
            $product->setType($i % 2 ? ListEntity::TYPE['INTEGER'] : ListEntity::TYPE['STRING']);
            $manager->persist($product);
        }

        $manager->flush();
    }
}
