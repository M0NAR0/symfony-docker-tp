<?php

namespace App\Repository;

use App\Entity\DocumentEntityInt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DocumentEntityIntRepository|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentEntityIntRepository|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentEntityIntRepository[]    findAll()
 * @method DocumentEntityIntRepository[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentEntityIntRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DocumentEntityInt::class);
    }

    // /**
    //  * @return DocumentEntityInt[] Returns an array of DocumentEntityInt objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DocumentEntityInt
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
