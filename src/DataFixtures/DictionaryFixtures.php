<?php

namespace App\DataFixtures;

use App\Entity\Dictionary;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Date;

class DictionaryFixtures extends Fixture
{
    public const REFERENCE_BICYCLE_FRAME_MATERIAL = 'bicycle-frame-material';

    public function load(ObjectManager $manager): void
    {
        $dateTime = new \DateTimeImmutable();
        $dictionary = new Dictionary();
        $dictionary->setName(self::REFERENCE_BICYCLE_FRAME_MATERIAL);
        $dictionary->setCreatedAt($dateTime);

        $manager->persist($dictionary);
        $manager->flush();

        $this->addReference(self::REFERENCE_BICYCLE_FRAME_MATERIAL, $dictionary);
    }
}
