<?php

namespace App\Repository;

use App\Entity\Posts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Posts>
 */
class PostsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Posts::class);
    }

    public function getPostPaginator(int $offset): Paginator
    {
        $query = $this->createQueryBuilder('p')
            ->setMaxResults(maxResults: self::PAGINATOR_PER_PAGE)
            ->setFirstResult($offset)
            ->getQuery();
        return new Paginator($query);
    }

    public function fetchPostsWithUsername(){
        $qb = $this->createQueryBuilder('p');

        $qb->select('p.id','p.content','p.media', 'p.posted_at', 'u.username','COUNT(c.id) AS commentNumber', 'COUNT(l.id) AS likesNumber')
        ->leftJoin('p.user_id','u')
        ->leftJoin('p.comments','c')
        ->leftJoin('p.likes','l')
        ->groupBy('p.id');
        $query = $qb->getQuery();
        $results = $query->getResult();

        return $results;
    }

    //    /**
    //     * @return Posts[] Returns an array of Posts objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Posts
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

}
