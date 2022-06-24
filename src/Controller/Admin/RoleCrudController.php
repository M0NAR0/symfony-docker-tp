<?php

namespace App\Controller\Admin;

use App\Entity\Role;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RoleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Role::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */

    /**
     * hide delete and edit action for "Administrateur" role
     * @param Actions $actions
     * @return Actions
     */
    public function configureActions(Actions $actions): Actions
    {
        return
            $actions
                ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                    return $action->displayIf(static function (Role $entity) {
                        return $entity->getRoleTitle() != "Administrateur";
                    });
                })
                ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                    return $action->displayIf(static function (Role $entity) {
                        return $entity->getRoleTitle() != "Administrateur";
                    });
                });
    }
}
