<?php

namespace App\Controller\Admin;

use App\Entity\DocumentEntityInt;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DocumentEntityIntCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DocumentEntityInt::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Donnée de l\'attribut'),
            IdField::new('documentEntityIntId', 'ID')->hideOnForm(),
            IntegerField::new('documentEntityIntValue', 'Valeur'),
            AssociationField::new('documentEav', 'Attribut'),
            AssociationField::new('document', 'Document')
        ];
    }

}
