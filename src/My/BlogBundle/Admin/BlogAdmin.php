<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace My\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class BlogAdmin extends Admin {

    protected function configureShowFields(ShowMapper $showMapper) {
        // Here we set the fields of the ShowMapper variable, $showMapper (but this can be called anything)
        $showMapper

                /*
                 * The default option is to just display the value as text (for boolean this will be 1 or 0)
                 */
                ->add('title', 'text', array('label' => 'Post Title'))
                ->add('datecreate', 'date')
                ->add('author')
                ->add('tag')
                ->add('file', 'file')
                ->add('text')

        ;
    }

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('title', 'text', array('label' => 'Post Title'))
                ->add('datecreate', 'date')
                ->add('dateupdate', 'date')
                ->add('author')
                ->add('tag')
                ->add('text')
                ->add('file', 'file')
                ->add('for_auth_user', 'choice', array(
                    'choices' => array(true => 'Рарешено', false => 'Не разрешено')
                ))

        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('title')
                ->add('author')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->add('title', 'text', array('label' => 'Post Title'))
                ->add('datecreate', 'date')
                ->add('dateupdate', 'date')
                ->add('author')
                ->add('tag')
                ->add('img')
                ->add('text')
                ->add('for_auth_user', 'boolean')
                ->add('_action', 'actions', array(
                    'actions' => array(
                        'view' => array(),
                        'edit' => array(),
                        'delete' => array(),
                    )
                ))
        ;
    }


}
