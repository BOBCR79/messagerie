<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\BrowserKit\Response;

/**
 * @extends ServiceEntityRepository<Post>
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function fetchPostsWithUsername():Response
    {
        $qb = $this->createQueryBuilder('p');

        $qb->select('p.id', 'p.content', 'p.media', 'p.posted_at', 'u.username', 'COUNT(DISTINCT c.id) AS commentNumber', 'COUNT(DISTINCT l.id) AS likesNumber')
            ->leftJoin('p.user_id', 'u')
            ->leftJoin('p.comments', 'c')
            ->leftJoin('p.likes', 'l')
            ->groupBy('p.id');
        $query = $qb->getQuery();
//        $results = $query->getResult();

        return $query->getResult();
    }

    public function fetchPaginatedPosts(int $offset, int $perPage)
    {
        $qb = $this->createQueryBuilder('p');

        $qb->select('p.id', 'p.content', 'p.media', 'p.posted_at', 'u.username', 'COUNT(DISTINCT c.id) AS commentNumber', 'COUNT(DISTINCT l.id) AS likesNumber')
            ->leftJoin('p.user_id', 'u')
            ->leftJoin('p.comments', 'c')
            ->leftJoin('p.likes', 'l')
            ->groupBy('p.id')
            ->setMaxResults($perPage)
            ->setFirstResult($offset);
        $paginator = $qb->getQuery();
        return $paginator->getResult();
    }
    //    /**
    //     * @return Post[] Returns an array of Post objects
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

    //    public function findOneBySomeField($value): ?Post
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
