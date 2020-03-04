<?php

namespace App\Repository;

use App\Entity\EterPlay;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EterPlay|null find($id, $lockMode = null, $lockVersion = null)
 * @method EterPlay|null findOneBy(array $criteria, array $orderBy = null)
 * @method EterPlay[]    findAll()
 * @method EterPlay[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EterPlayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EterPlay::class);
    }

    // /**
    //  * @return EterPlay[] Returns an array of EterPlay objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EterPlay
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
