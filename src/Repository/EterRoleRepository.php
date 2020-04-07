<?php

namespace App\Repository;

use App\Entity\EterRole;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EterRole|null find($id, $lockMode = null, $lockVersion = null)
 * @method EterRole|null findOneBy(array $criteria, array $orderBy = null)
 * @method EterRole[]    findAll()
 * @method EterRole[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EterRoleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EterRole::class);
    }

    // /**
    //  * @return EterRole[] Returns an array of EterRole objects
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
    public function findOneBySomeField($value): ?EterRole
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
