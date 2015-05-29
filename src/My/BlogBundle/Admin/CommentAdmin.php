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


class CommentAdmin extends Admin {
    
    
    

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('name')
                ->add('email')
                ->add('date','date')
                ->add('blog')
                ->add('message')
               
        ;


    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('name')
                ->add('email')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->add('name')
                ->add('email')
                ->add('date','date')
                ->add('blog')
                ->add('message')
                 ->add('_action', 'actions', array(
                'actions' => array(
                           
                            'edit'    => array(),
                            'delete'  => array(),
                            )
                                            )
                )
                
        ;
    }

}
