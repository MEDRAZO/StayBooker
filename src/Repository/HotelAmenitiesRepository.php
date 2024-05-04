<?php

namespace App\Repository;

use App\Entity\HotelAmenities;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HotelAmenities>
 *
 * @method HotelAmenities|null find($id, $lockMode = null, $lockVersion = null)
 * @method HotelAmenities|null findOneBy(array $criteria, array $orderBy = null)
 * @method HotelAmenities[]    findAll()
 * @method HotelAmenities[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HotelAmenitiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HotelAmenities::class);
    }

//    /**
//     * @return HotelAmenities[] Returns an array of HotelAmenities objects
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

//    public function findOneBySomeField($value): ?HotelAmenities
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
