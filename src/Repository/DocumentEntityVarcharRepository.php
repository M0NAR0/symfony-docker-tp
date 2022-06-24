<?php

namespace App\Repository;

use App\Entity\DocumentEntityVarchar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DocumentEntityVarcharRepository|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentEntityVarcharRepository|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentEntityVarcharRepository[]    findAll()
 * @method DocumentEntityVarcharRepository[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentEntityVarcharRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DocumentEntityVarchar::class);
    }

    // /**
    //  * @return DocumentEntityVarchar[] Returns an array of DocumentEntityVarchar objects
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
    public function findOneBySomeField($value): ?DocumentEntityVarchar
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
