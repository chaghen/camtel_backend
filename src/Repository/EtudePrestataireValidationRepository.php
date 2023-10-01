<?php

namespace App\Repository;

use App\Entity\EtudePrestataireValidation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EtudePrestataireValidation>
 *
 * @method EtudePrestataireValidation|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtudePrestataireValidation|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtudePrestataireValidation[]    findAll()
 * @method EtudePrestataireValidation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtudePrestataireValidationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtudePrestataireValidation::class);
    }

//    /**
//     * @return EtudePrestataireValidation[] Returns an array of EtudePrestataireValidation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EtudePrestataireValidation
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
