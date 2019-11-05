<?php

namespace App\Repository;

use App\Entity\WeatherInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method WeatherInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeatherInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeatherInfo[]    findAll()
 * @method WeatherInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeatherInfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeatherInfo::class);
    }

    // /**
    //  * @return WeatherInfo[] Returns an array of WeatherInfo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WeatherInfo
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
