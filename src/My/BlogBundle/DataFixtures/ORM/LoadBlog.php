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
use My\BlogBundle\Entity\Blog;

class LoadBlog extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
      	$blog1 = new Blog();
     
        $this->addReference("blog-1",$blog1);
    	$blog1->setTitle("Aliquam lorem ante dapibus");
    	$blog1->setAuthor("Michael");
    	$blog1->setImg("img1.jpg");
    	$blog1->setText("TemplateMo.com provides free css templates for your static or dynamic websites. All web templates are absolutely free to download, modify and apply for your websites without restrictions. Validate XHTML & CSS.Even though Doctrine now knows how to persist a Product object to the database, the class itself isn't really useful yet. Since Product is just a regular PHP class, you need to create getter and setter methods (e.g. getName(), setName()) in order to access its properties (since the properties are protected).");
    	$blog1->setTag("Symfony2");
    	$blog1->setDatecreate();
        $blog1->setForAuthUser(true);
    	$blog1->setDateupdate();
    	$manager->persist($blog1);
    	$blog2 = new Blog();
        $this->addReference("blog-2",$blog2);
    	$blog2->setTitle("Lorem ipsum dolor sit amet");
    	$blog2->setAuthor("John");
        $blog2->setForAuthUser(true);
    	$blog2->setTag("Symfony2");
    	$blog2->setDatecreate();
    	$blog2->setDateupdate();
       
    	$blog2->setImg("img2.jpg");
    	$blog2->setText("In Doctrine2, fixtures are just objects where you load data by interacting with your entities as you normally do. This allows you to create the exact fixtures you need for your application.
							The most serious limitation is that you cannot share objects between fixtures. Later, you'll see how to overcome this limitation.");

        $manager->persist($blog2);
        
    	$blog3 = new Blog();
        $this->addReference("blog-3",$blog3);
    	$blog3->setTitle("Doctrine Mapping Types");
        $blog3->setForAuthUser(true);
    	$blog3->setDatecreate();
    	$blog3->setDateupdate();
    	$blog3->setAuthor("Yuriy");
    	$blog3->setTag("PHP");
    	$blog3->setImg("img1.jpg");
    	$blog3->setText("The type option used in the @Column accepts any of the existing Doctrine types or even your own custom types. A Doctrine type defines the conversion between PHP and SQL types, independent from the database vendor you are using. All Mapping Types that ship with Doctrine are fully portable between the supported database systems.

As an example, the Doctrine Mapping Type string defines the mapping from a PHP string to a SQL VARCHAR (or VARCHAR2 etc. depending on the RDBMS brand). Here is a quick overview of the built-in mapping types:");
 
        $manager->persist($blog3);
    	$blog4 = new Blog();
        $this->addReference("blog-4",$blog4);
        $blog4->setForAuthUser(false);
    	$blog4->setTitle("Creating Classes for the Database");
    	$blog4->setTag("PHP");
    	$blog4->setDatecreate();
    	$blog4->setDateupdate();
    	$blog4->setAuthor("Alex");
    	$blog4->setImg("img2.jpg");
    	$blog4->setText("Every PHP object that you want to save in the database using Doctrine is called an “Entity”. The term “Entity” describes objects that have an identity over many independent requests. This identity is usually achieved by assigning a unique identifier to an entity. In this tutorial the following Message PHP class will serve as the example Entity:");
        $manager->persist($blog4);
    	$manager->flush();

    }
    
      public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
    
}