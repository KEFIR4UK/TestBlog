<?php

namespace My\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * BlogRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BlogRepository extends EntityRepository {

    function showAllBlog($show) {
        if ($show) {
            return $this->getEntityManager()
                            ->createQuery(
                                    ' SELECT u,count( g.blog) 
                FROM MyBlogBundle:Blog u
                LEFT JOIN u.comment g GROUP BY u.id'
                            )
                            ->getResult();
        } else {
            return $this->getEntityManager()
                            ->createQuery(
                                    ' SELECT u,count( g.blog) 
                FROM MyBlogBundle:Blog u
                LEFT JOIN u.comment g WHERE u.for_auth_user =1  GROUP BY u.id'
                            )
                            ->getResult();
        }
    }

    function showBlog($id) {

        return $this->getEntityManager()
                        ->createQuery(
                                'SELECT p FROM MyBlogBundle:Blog p WHERE p.id =:id'
                        )
                        ->setParameter('id', $id)
                        ->getResult();
    }

    function getTags() {
        return $this->getEntityManager()
                        ->createQuery(
                                ' SELECT u.tag 
                FROM MyBlogBundle:Blog u GROUP BY u.tag '
                        )
                        ->getResult();
    }

    function getTag($tag, $show) {

        if ($show) {
            return $this->getEntityManager()
                            ->createQuery(
                                    ' SELECT u,count( g.blog) 
                FROM MyBlogBundle:Blog u
                LEFT JOIN u.comment g WHERE u.tag =:tag GROUP BY u.id  '
                            )
                            ->setParameter('tag', $tag)
                            ->getResult();
        } else {
            return $this->getEntityManager()
                            ->createQuery(
                                    ' SELECT u,count( g.blog) 
                FROM MyBlogBundle:Blog u
                LEFT JOIN u.comment g WHERE u.tag =:tag AND u.for_auth_user =1 GROUP BY u.id  '
                            )
                            ->setParameter('tag', $tag)
                            ->getResult();
        }
    }

}