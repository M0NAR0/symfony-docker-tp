<?php

namespace App\Controller\Admin;

use App\Entity\DemandType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DemandTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DemandType::class;
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
}
