<?php

namespace App\Repository;

use App\Entity\RapportsIntervention;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RapportsIntervention|null find($id, $lockMode = null, $lockVersion = null)
 * @method RapportsIntervention|null findOneBy(array $criteria, array $orderBy = null)
 * @method RapportsIntervention[]    findAll()
 * @method RapportsIntervention[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RapportsInterventionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RapportsIntervention::class);
    }

    // /**
    //  * @return RapportsIntervention[] Returns an array of RapportsIntervention objects
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
    public function findOneBySomeField($value): ?RapportsIntervention
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
