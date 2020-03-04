<?php

namespace App\Repository;

use App\Entity\EterStatut;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EterStatut|null find($id, $lockMode = null, $lockVersion = null)
 * @method EterStatut|null findOneBy(array $criteria, array $orderBy = null)
 * @method EterStatut[]    findAll()
 * @method EterStatut[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EterStatutRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EterStatut::class);
    }

    // /**
    //  * @return EterStatut[] Returns an array of EterStatut objects
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
    public function findOneBySomeField($value): ?EterStatut
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
