<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Dicton;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0;$i < 10; $i++){
            $author = new Author();
            $author->setName($faker->name());
            for ($j = 0; $j < 4; $j++){
                $dicton = new Dicton();
                $dicton->setCreatedAt(new \DateTimeImmutable());
                $dicton->setContent($faker->text());
                $dicton->setAuthor($author);
                $manager->persist($dicton);
            }
            $manager->persist($author);
        }


        $manager->flush();
    }
}
