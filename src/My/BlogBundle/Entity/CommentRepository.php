<?php

namespace My\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CommentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommentRepository extends EntityRepository
{
    function getComment($id){
         return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM MyBlogBundle:Comment p WHERE p.blog =:id'
            )
            ->setParameter('id',$id)
            ->getResult();
    }
}