<?php

namespace App\Repository;

use App\Entity\SeanceDeformation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SeanceDeformation|null find($id, $lockMode = null, $lockVersion = null)
 * @method SeanceDeformation|null findOneBy(array $criteria, array $orderBy = null)
 * @method SeanceDeformation[]    findAll()
 * @method SeanceDeformation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SeanceDeformationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SeanceDeformation::class);
    }

    // /**
    //  * @return SeanceDeformation[] Returns an array of SeanceDeformation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SeanceDeformation
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
