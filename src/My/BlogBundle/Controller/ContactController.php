<?php

namespace My\BlogBundle\Controller;
use My\BlogBundle\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use My\BlogBundle\Form\Type\ContactType;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
   public function indexAction(Request $request)
            
    {
        $contact = new Contact;
        $form =$this->createForm(new ContactType(),$contact);
         $form->handleRequest($request);

        if ($form->isValid()) 
        { 
            $data = $form->getData();
            $mailer = $this->get('mailer');
            $message = $mailer->createMessage()
                  ->setSubject('Запитання')
                  ->setFrom($data->getEmail())
                  ->setTo("Yuric17@mail.ru")
                  ->setBody( $this->renderView('MyBlogBundle:Contact:mail.html.twig',array('data' => $data)),'text/html');
            $this->get('mailer')->send($message);
            $request->getSession()->getFlashBag()->add(
              'notice',
              'Ваше повідомлення успішно відправлене!');
          return $this->redirect($this->generateUrl('my_blog_contact'));
        }
        
        
        return $this->render('MyBlogBundle:Contact:index.html.twig',array('form'=>$form->createView()));
    }
}
