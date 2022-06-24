<?php

namespace App\Controller\Admin;

use App\Entity\DocumentEntityDate;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DocumentEntityDateCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DocumentEntityDate::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Donnée de l\'attribut'),
            IdField::new('documentEntityDateId', 'ID')->hideOnForm(),
            DateField::new('documentEntityDateValue', 'Valeur'),
            AssociationField::new('documentEav', 'Attribut'),
            AssociationField::new('document', 'Document')
        ];
    }

}
