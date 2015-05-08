<?php

namespace My\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use My\BlogBundle\Entity\Blog;
use My\BlogBundle\Entity\Comment;
use My\BlogBundle\Form\Type\CommentType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {

    function showtagsAction(Request $request, $tag) {
        $em = $this->getDoctrine()->getManager();
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $show = true;
        } else {
            $show = false;
        }
        $query = $em->getRepository('MyBlogBundle:Blog')
                ->getTag($tag, $show);
        $paginator = $this->get('knp_paginator');
        $blogs = $paginator->paginate(
                $query, $request->query->get('page', 1)/* page number */, 1/* limit per page */
        );

        return $this->render('MyBlogBundle:Default:index.html.twig', array('blogs' => $blogs));
    }

    function sidebarAction() {
        $em = $this->getDoctrine()->getManager();
        $tags = $em->getRepository('MyBlogBundle:Blog')->getTags();
        return $this->render('MyBlogBundle:Default:sidebar.html.twig', array('tags' => $tags));
    }

    function aboutAction() {
        return $this->render('MyBlogBundle:Default:about.html.twig');
    }

    public function indexAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $show = true;
        } else {
            $show = false;
        }
        $query = $em->getRepository('MyBlogBundle:Blog')
                ->showAllBlog($show);
        $paginator = $this->get('knp_paginator');
        $blogs = $paginator->paginate(
                $query, $request->query->get('page', 1)/* page number */, 1/* limit per page */
        );

        return $this->render('MyBlogBundle:Default:index.html.twig', array('blogs' => $blogs));
    }

    public function showAction(Request $request, $id) {
        $comment = new Comment;
        $form = $this->createForm(new CommentType(), $comment);

        $em = $this->getDoctrine()->getManager();
        $blogs = $em->getRepository('MyBlogBundle:Blog')
                ->showBlog($id);

        $comments = $em->getRepository('MyBlogBundle:Comment')
                ->getComment($id);
        $count = count($comments);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $blog = new Blog();
            $blog = $this->getDoctrine()->getEntityManager()->getReference("MyBlogBundle:Blog", $id);
            $comment->setBlog($blog);
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->persist($blog);
            $em->flush();
            $request->getSession()->getFlashBag()->add(
                    'notice', 'Ваш коментар успішно доданий!');
            return $this->redirectToRoute('my_blog_show', array('id' => $id));
        }
        return $this->render('MyBlogBundle:Default:show.html.twig', array(
                    'blogs' => $blogs,
                    'comments' => $comments,
                    'count' => $count,
                    'form' => $form->createView()
        ));
    }

}
