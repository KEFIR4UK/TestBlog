<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace My\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use My\BlogBundle\Entity\Comment;

class LoadComment extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
      	$comment1 = new Comment();
    	$comment1->setName("Kefir4uk");
        $comment1->setEmail("Kefir4uk@mail.com");
    	$comment1->setMessage("You now have a usable Product class with mapping information so that Doctrine knows exactly how to persist it. Of course, you don't yet have the corresponding product table in your database. ");
    	$comment1->setDate();
    	$comment1->setBlog($this->getReference('blog-1'));
    	$manager->persist($comment1);
    	$comment1 = new Comment();
    	$comment1->setName("qwerty");
        $comment1->setEmail("qwerty@mail.com");
    	$comment1->setMessage("Many to Many relationships occur when each record in the first table has many linked records in the related table and vice-versa. In a normalized database, these are always stored using dedicated join tables.");
    	$comment1->setDate();
    	$comment1->setBlog($this->getReference('blog-1'));
    	$manager->persist($comment1);
    	$comment1 = new Comment();
    	$comment1->setName("Yuriy");
        $comment1->setEmail("Yuriy@mail.com");
    	$comment1->setMessage("The many–to–many relationship actually consists of two one–to–many relationships, both of which involve the association or join table.");
    	$comment1->setDate();
    	$comment1->setBlog($this->getReference('blog-4'));
    	$manager->persist($comment1);
    	$comment1 = new Comment();
    	$comment1->setName("Alex");
        $comment1->setEmail("Alex@mail.com");
    	$comment1->setMessage("This bidirectional mapping requires the mappedBy attribute on the OneToMany association and the inversedBy attribute on the ManyToOne association. ");
    	$comment1->setDate();
    	$comment1->setBlog($this->getReference('blog-1'));
    	$manager->persist($comment1);
    	$comment1 = new Comment();
    	$comment1->setName("Misha");
        $comment1->setEmail("Misha@mail.com");
    	$comment1->setMessage("This bidirectional mapping requires the mappedBy attribute on the OneToMany association and the inversedBy attribute on the ManyToOne association. ");
    	$comment1->setDate();
    	$comment1->setBlog($this->getReference('blog-1'));
    	$manager->persist($comment1);
    	$manager->flush(); 

    }
    
      public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
    
}