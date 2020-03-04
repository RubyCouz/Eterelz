<?php

namespace App\Repository;

use App\Entity\EterAffiliation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EterAffiliation|null find($id, $lockMode = null, $lockVersion = null)
 * @method EterAffiliation|null findOneBy(array $criteria, array $orderBy = null)
 * @method EterAffiliation[]    findAll()
 * @method EterAffiliation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EterAffiliationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EterAffiliation::class);
    }

    // /**
    //  * @return EterAffiliation[] Returns an array of EterAffiliation objects
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
    public function findOneBySomeField($value): ?EterAffiliation
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
