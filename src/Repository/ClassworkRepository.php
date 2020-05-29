<?php

namespace App\Repository;

use App\Entity\Classwork;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Classwork|null find($id, $lockMode = null, $lockVersion = null)
 * @method Classwork|null findOneBy(array $criteria, array $orderBy = null)
 * @method Classwork[]    findAll()
 * @method Classwork[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassworkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Classwork::class);
    }

    // /**
    //  * @return Classwork[] Returns an array of Classwork objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Classwork
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
