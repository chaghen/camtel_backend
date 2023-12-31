<?php

namespace App\Repository;

use App\Entity\Techniciens;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Techniciens>
 *
 * @method Techniciens|null find($id, $lockMode = null, $lockVersion = null)
 * @method Techniciens|null findOneBy(array $criteria, array $orderBy = null)
 * @method Techniciens[]    findAll()
 * @method Techniciens[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TechniciensRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Techniciens::class);
    }

//    /**
//     * @return Techniciens[] Returns an array of Techniciens objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Techniciens
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
