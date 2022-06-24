<?php

namespace App\Controller\Admin;

use App\Entity\PurchaseOrderProduct;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PurchaseOrderProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PurchaseOrderProduct::class;
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
