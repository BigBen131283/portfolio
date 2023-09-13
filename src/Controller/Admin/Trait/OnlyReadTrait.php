<?php

// https://www.youtube.com/watch?v=4dmsUalc5Ds&list=PLxEJ5uJLOPDyfRKG77PuSvEpDoV6hn6jd&index=7
// 22:04

namespace App\Controller\Admin\Trait;

use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

trait ReadOnlyTrait
{
    public function configureActions(Actions $actions): Actions
    {
        // $actions = parent::configureActions();
        $actions->disable(Action::NEW, Action::EDIT, Action::DELETE)
                ->add(Crud::PAGE_INDEX, Action::DETAIL);
        return $actions;
    }
}