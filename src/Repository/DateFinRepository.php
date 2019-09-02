<?php

namespace App\Repository;

use App\Entity\DateFin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DateFin|null find($id, $lockMode = null, $lockVersion = null)
 * @method DateFin|null findOneBy(array $criteria, array $orderBy = null)
 * @method DateFin[]    findAll()
 * @method DateFin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DateFinRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DateFin::class);
    }

    // /**
    //  * @return DateFin[] Returns an array of DateFin objects
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
    public function findOneBySomeField($value): ?DateFin
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
