<?php

namespace App\Repository;

use App\Entity\EterParticipation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EterParticipation|null find($id, $lockMode = null, $lockVersion = null)
 * @method EterParticipation|null findOneBy(array $criteria, array $orderBy = null)
 * @method EterParticipation[]    findAll()
 * @method EterParticipation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EterParticipationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EterParticipation::class);
    }

    // /**
    //  * @return EterParticipation[] Returns an array of EterParticipation objects
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
    public function findOneBySomeField($value): ?EterParticipation
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
