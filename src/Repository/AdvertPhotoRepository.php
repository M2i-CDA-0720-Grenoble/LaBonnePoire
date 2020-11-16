<?php

namespace App\Repository;

use App\Entity\AdvertPhoto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdvertPhoto|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdvertPhoto|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdvertPhoto[]    findAll()
 * @method AdvertPhoto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdvertPhotoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdvertPhoto::class);
    }

    // /**
    //  * @return AdvertPhoto[] Returns an array of AdvertPhoto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AdvertPhoto
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
