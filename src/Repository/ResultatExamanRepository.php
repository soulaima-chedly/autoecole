<?php

namespace App\Repository;

use App\Entity\ResultatExaman;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ResultatExaman|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResultatExaman|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResultatExaman[]    findAll()
 * @method ResultatExaman[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResultatExamanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResultatExaman::class);
    }

    // /**
    //  * @return ResultatExaman[] Returns an array of ResultatExaman objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ResultatExaman
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
