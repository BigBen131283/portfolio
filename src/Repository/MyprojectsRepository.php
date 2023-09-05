<?php

namespace App\Repository;

use App\Entity\Myprojects;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Myprojects>
 *
 * @method Myprojects|null find($id, $lockMode = null, $lockVersion = null)
 * @method Myprojects|null findOneBy(array $criteria, array $orderBy = null)
 * @method Myprojects[]    findAll()
 * @method Myprojects[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MyprojectsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Myprojects::class);
    }

//    /**
//     * @return Myprojects[] Returns an array of Myprojects objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Myprojects
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
