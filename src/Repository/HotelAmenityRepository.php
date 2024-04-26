<?php

namespace App\Repository;

use App\Entity\HotelAmenity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HotelAmenity>
 *
 * @method HotelAmenity|null find($id, $lockMode = null, $lockVersion = null)
 * @method HotelAmenity|null findOneBy(array $criteria, array $orderBy = null)
 * @method HotelAmenity[]    findAll()
 * @method HotelAmenity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HotelAmenityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HotelAmenity::class);
    }

    //    /**
    //     * @return HotelAmenity[] Returns an array of HotelAmenity objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('h')
    //            ->andWhere('h.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('h.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?HotelAmenity
    //    {
    //        return $this->createQueryBuilder('h')
    //            ->andWhere('h.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
