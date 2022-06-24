<?php

namespace App\Controller\Admin;

use App\Entity\DocumentType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DocumentTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DocumentType::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Information(s) du type de document'),
            IdField::new('doctypeId', 'ID')->hideOnForm(),
            TextField::new('doctypeCode', 'Code'),
            TextField::new('doctypeTitle', 'Titre')
        ];
    }

}
