<?php

namespace App\Controller\Admin;

use App\Entity\DocumentEntityVarchar;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DocumentEntityVarcharCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DocumentEntityVarchar::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Donnée de l\'attribut'),
            IdField::new('documentEntityVarcharId', 'ID')->hideOnForm(),
            TextField::new('documentEntityVarcharValue', 'Valeur'),
            AssociationField::new('documentEav', 'Attribut'),
            AssociationField::new('document', 'Document')
        ];
    }

}
