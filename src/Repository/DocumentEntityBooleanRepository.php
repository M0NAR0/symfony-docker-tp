<?php

namespace App\Repository;

use App\Entity\DocumentEntityBoolean;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DocumentEntityBooleanRepository|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentEntityBooleanRepository|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentEntityBooleanRepository[]    findAll()
 * @method DocumentEntityBooleanRepository[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentEntityBooleanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DocumentEntityBoolean::class);
    }

    // /**
    //  * @return DocumentEntityBoolean[] Returns an array of DocumentEntityBoolean objects
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
    public function findOneBySomeField($value): ?DocumentEntityBoolean
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
