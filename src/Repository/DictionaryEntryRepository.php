<?php

namespace App\Repository;

use App\Entity\DictionaryEntry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DictionaryEntry>
 *
 * @method DictionaryEntry|null find($id, $lockMode = null, $lockVersion = null)
 * @method DictionaryEntry|null findOneBy(array $criteria, array $orderBy = null)
 * @method DictionaryEntry[]    findAll()
 * @method DictionaryEntry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DictionaryEntryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DictionaryEntry::class);
    }

//    /**
//     * @return DictionaryEntry[] Returns an array of DictionaryEntry objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DictionaryEntry
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
