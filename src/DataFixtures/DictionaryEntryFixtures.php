<?php

namespace App\DataFixtures;

use App\Entity\Dictionary;
use App\Entity\DictionaryEntry;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DictionaryEntryFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $dateTime = new \DateTimeImmutable();
        $dictionaryEntry1 = new DictionaryEntry();
        $dictionaryEntry1->setDictionary($this->getReference(DictionaryFixtures::REFERENCE_BICYCLE_FRAME_MATERIAL));
        $dictionaryEntry1->setValueId(1);
        $dictionaryEntry1->setValue('aluminium');
        $dictionaryEntry1->setCreatedAt($dateTime);
        $dictionaryEntry1->setUpdatedAt($dateTime);

        $dictionaryEntry2 = new DictionaryEntry();
        $dictionaryEntry2->setDictionary($this->getReference(DictionaryFixtures::REFERENCE_BICYCLE_FRAME_MATERIAL));
        $dictionaryEntry2->setValueId(2);
        $dictionaryEntry2->setValue('carbon');
        $dictionaryEntry2->setCreatedAt($dateTime);
        $dictionaryEntry2->setUpdatedAt($dateTime);

        $dictionaryEntry3 = new DictionaryEntry();
        $dictionaryEntry3->setDictionary($this->getReference(DictionaryFixtures::REFERENCE_BICYCLE_FRAME_MATERIAL));
        $dictionaryEntry3->setValueId(3);
        $dictionaryEntry3->setValue('steel');
        $dictionaryEntry3->setCreatedAt($dateTime);
        $dictionaryEntry3->setUpdatedAt($dateTime);

        $manager->persist($dictionaryEntry1);
        $manager->persist($dictionaryEntry2);
        $manager->persist($dictionaryEntry3);
        $manager->flush();
    }


    public function getDependencies()
    {
        return [
            DictionaryFixtures::class
        ];
    }
}
