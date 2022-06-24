<?php

namespace App\Repository;

use App\Entity\DemandType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DemandType|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemandType|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemandType[]    findAll()
 * @method DemandType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DemandType::class);
    }

    // /**
    //  * @return DemandType[] Returns an array of DemandType objects
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
    public function findOneBySomeField($value): ?DemandType
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
