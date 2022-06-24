<?php

namespace App\Repository;

use App\Entity\DocumentEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DocumentEntityRepository|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentEntityRepository|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentEntityRepository[]    findAll()
 * @method DocumentEntityRepository[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DocumentEntity::class);
    }

    /**
     * @param $documentId
     * @return array|\mixed[][]
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws \Doctrine\DBAL\Exception
     */
    public function findIntsByDocument($documentId)
    {
        $db = $this->getEntityManager()->getConnection();

        $query = '
            SELECT 
                t1.DOCUMENT_EAV_CODE,
                t0.DOCUMENT_ENTITY_INT_VALUE
            FROM 
                 document_entity_int t0
            INNER JOIN 
                document_eav t1 ON t0.DOCUMENT_EAV_ID = t1.DOCUMENT_EAV_ID
            WHERE 
                t0.DOCUMENT_ID = :docId
        ';

        $stmt = $db->prepare($query);
        $stmt->execute(['docId' => $documentId]);

        return $stmt->fetchAllAssociative();
    }

    /**
     * @param $documentId
     * @return array|\mixed[][]
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws \Doctrine\DBAL\Exception
     */
    public function findVarcharsByDocument($documentId)
    {
        $db = $this->getEntityManager()->getConnection();

        $query = '
            SELECT 
                t1.DOCUMENT_EAV_CODE,
                t0.DOCUMENT_ENTITY_VARCHAR_VALUE
            FROM 
                 document_entity_varchar t0
            INNER JOIN 
                document_eav t1 ON t0.DOCUMENT_EAV_ID = t1.DOCUMENT_EAV_ID
            WHERE 
                t0.DOCUMENT_ID = :docId
        ';

        $stmt = $db->prepare($query);
        $stmt->execute(['docId' => $documentId]);

        return $stmt->fetchAllAssociative();
    }

    /**
     * @param $documentId
     * @return array|\mixed[][]
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws \Doctrine\DBAL\Exception
     */
    public function findDatesByDocument($documentId)
    {
        $db = $this->getEntityManager()->getConnection();

        $query = '
            SELECT 
                t1.DOCUMENT_EAV_CODE,
                t0.DOCUMENT_ENTITY_DATE_VALUE
            FROM 
                 document_entity_date t0
            INNER JOIN 
                document_eav t1 ON t0.DOCUMENT_EAV_ID = t1.DOCUMENT_EAV_ID
            WHERE 
                t0.DOCUMENT_ID = :docId
        ';

        $stmt = $db->prepare($query);
        $stmt->execute(['docId' => $documentId]);

        return $stmt->fetchAllAssociative();
    }


    /**
     * @param $documentId
     * @return array|\mixed[][]
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws \Doctrine\DBAL\Exception
     */
    public function findBooleansByDocument($documentId)
    {
        $db = $this->getEntityManager()->getConnection();

        $query = '
            SELECT 
                t1.DOCUMENT_EAV_CODE,
                t0.DOCUMENT_ENTITY_BOOLEAN_VALUE
            FROM 
                 document_entity_boolean t0
            INNER JOIN 
                document_eav t1 ON t0.DOCUMENT_EAV_ID = t1.DOCUMENT_EAV_ID
            WHERE 
                t0.DOCUMENT_ID = :docId
        ';

        $stmt = $db->prepare($query);
        $stmt->execute(['docId' => $documentId]);

        return $stmt->fetchAll();
    }

}
