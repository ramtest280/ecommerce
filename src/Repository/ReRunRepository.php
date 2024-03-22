<?php

namespace App\Repository;

use App\Entity\ReRun;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReRun>
 *
 * @method ReRun|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReRun|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReRun[]    findAll()
 * @method ReRun[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReRunRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReRun::class);
    }

//    /**
//     * @return ReRun[] Returns an array of ReRun objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ReRun
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
