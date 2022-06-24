<?php

namespace App\Controller\Admin;

use App\Entity\DocumentEntityBoolean;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DocumentEntityBooleanCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DocumentEntityBoolean::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Donnée de l\'attribut'),
            IdField::new('documentEntityBooleanId', 'ID')->hideOnForm(),
            BooleanField::new('documentEntityBooleanValue', 'Valeur'),
            AssociationField::new('documentEav', 'Attribut'),
            AssociationField::new('document', 'Document')
        ];
    }

}
