<?php

namespace App\Repository;

use App\Entity\EterOwn;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EterOwn|null find($id, $lockMode = null, $lockVersion = null)
 * @method EterOwn|null findOneBy(array $criteria, array $orderBy = null)
 * @method EterOwn[]    findAll()
 * @method EterOwn[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EterOwnRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EterOwn::class);
    }

    // /**
    //  * @return EterOwn[] Returns an array of EterOwn objects
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
    public function findOneBySomeField($value): ?EterOwn
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
