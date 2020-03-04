<?php

namespace App\Repository;

use App\Entity\EterType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EterType|null find($id, $lockMode = null, $lockVersion = null)
 * @method EterType|null findOneBy(array $criteria, array $orderBy = null)
 * @method EterType[]    findAll()
 * @method EterType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EterTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EterType::class);
    }

    // /**
    //  * @return EterType[] Returns an array of EterType objects
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
    public function findOneBySomeField($value): ?EterType
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
