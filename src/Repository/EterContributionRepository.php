<?php

namespace App\Repository;

use App\Entity\EterContribution;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EterContribution|null find($id, $lockMode = null, $lockVersion = null)
 * @method EterContribution|null findOneBy(array $criteria, array $orderBy = null)
 * @method EterContribution[]    findAll()
 * @method EterContribution[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EterContributionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EterContribution::class);
    }

    // /**
    //  * @return EterContribution[] Returns an array of EterContribution objects
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
    public function findOneBySomeField($value): ?EterContribution
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
