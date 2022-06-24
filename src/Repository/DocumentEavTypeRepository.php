<?php


namespace App\Repository;


use App\Entity\DocumentEavType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DocumentEavTypeRepository|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentEavTypeRepository|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentEavTypeRepository[]    findAll()
 * @method DocumentEavTypeRepository[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentEavTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DocumentEavType::class);
    }
}