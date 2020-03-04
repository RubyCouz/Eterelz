<?php

namespace App\Repository;

use App\Entity\EterAnswer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EterAnswer|null find($id, $lockMode = null, $lockVersion = null)
 * @method EterAnswer|null findOneBy(array $criteria, array $orderBy = null)
 * @method EterAnswer[]    findAll()
 * @method EterAnswer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EterAnswerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EterAnswer::class);
    }

    // /**
    //  * @return EterAnswer[] Returns an array of EterAnswer objects
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
    public function findOneBySomeField($value): ?EterAnswer
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
