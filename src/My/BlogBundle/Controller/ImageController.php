<?php

namespace My\BlogBundle\Controller;
use My\BlogBundle\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use My\BlogBundle\Form\ImageType;
use Symfony\Component\HttpFoundation\Request;

class ImageController extends Controller
{
   public function indexAction(Request $request)
            
    {
        $contact = new Image;
        $form =$this->createForm(new ImageType(),$contact);
         $form->handleRequest($request);
         if ($form->isValid()) 
        { 
            
           $em = $this->getDoctrine()->getManager();
        $em->persist($contact);
        $em->flush();
          return $this->redirect($this->generateUrl('my_blog_image'));
        }
        
        
        return $this->render('MyBlogBundle:Image:index.html.twig',array('form'=>$form->createView()));
    }
}
