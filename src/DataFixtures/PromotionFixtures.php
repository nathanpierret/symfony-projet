<?php

namespace App\DataFixtures;

use App\Entity\Promotion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PromotionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create("fr_FR");
        //Création de 10 promotions
        for ($i=1;$i<=10;$i++) {
            $promotion = new Promotion();
            $promotion->setNom($faker->unique()->word());
            $promotion->setAnnee("2023");
            //Créer une référence pour la promotion (fixtures)
            $this->setReference("promotion_$i",$promotion);
            //Persister la promotion
            $manager->persist($promotion);
        }

        $manager->flush();
    }
}
