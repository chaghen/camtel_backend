<?php

namespace App\Repository;

use App\Entity\Installations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Installations>
 *
 * @method Installations|null find($id, $lockMode = null, $lockVersion = null)
 * @method Installations|null findOneBy(array $criteria, array $orderBy = null)
 * @method Installations[]    findAll()
 * @method Installations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InstallationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Installations::class);
    }

//    /**
//     * @return Installations[] Returns an array of Installations objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Installations
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
