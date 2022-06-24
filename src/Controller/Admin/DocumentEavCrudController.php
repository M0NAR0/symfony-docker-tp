<?php

namespace App\Controller\Admin;

use App\Entity\DocumentEav;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DocumentEavCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DocumentEav::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Informations de l\'attribut'),
            IdField::new('documentEavId', 'ID')->hideOnForm(),
            TextField::new('documentEavCode', 'Code unique'),
            TextField::new('documentEavTitle', 'Titre'),
            BooleanField::new('documentEavIsVisible', 'Visible'),
            TextareaField::new('documentEavDesciption', 'Description')
                ->hideOnIndex(),
            TextareaField::new('documentEavValidationRule', 'Règle de validation')
                ->hideOnIndex()
        ];
    }

}
