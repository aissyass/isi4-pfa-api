<?php

namespace App\Repository;

use App\Entity\ClassworkType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ClassworkType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClassworkType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClassworkType[]    findAll()
 * @method ClassworkType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassworkTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClassworkType::class);
    }

    // /**
    //  * @return ClassworkType[] Returns an array of ClassworkType objects
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
    public function findOneBySomeField($value): ?ClassworkType
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
