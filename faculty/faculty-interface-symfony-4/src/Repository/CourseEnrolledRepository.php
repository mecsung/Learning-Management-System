<?php

namespace App\Repository;

use App\Entity\CourseEnrolled;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Course|null find($id, $lockMode = null, $lockVersion = null)
 * @method Course|null findOneBy(array $criteria, array $orderBy = null)
 * @method Course[]    findAll()
 * @method Course[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourseEnrolledRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CourseEnrolled::class);
    }

    // /**
    //  * @return Course[] Returns an array of Course objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Course
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findStudent(string $search1, string $search2): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT u
            FROM App\Entity\CourseEnrolled u
            WHERE u.course = :course
            AND u.programClass = :programClass'
        )->setParameter('course', $search1)
        ->setParameter('programClass', $search2);
        
        // returns an array of Product objects
        return $query->getResult();
    }
    public function findmyStudent(string $search1, string $search2): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT u
            FROM App\Entity\CourseEnrolled u
            WHERE u.course = :course
            AND u.fullname = :fullname'
        )->setParameter('course', $search1)
        ->setParameter('fullname', $search2);
        
        // returns an array of Product objects
        return $query->getResult();
    }
}
