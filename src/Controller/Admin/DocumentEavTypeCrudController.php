<?php


namespace App\Controller\Admin;


use App\Entity\DocumentEav;
use App\Entity\DocumentEavType;
use App\Entity\DocumentEntity;
use App\Entity\Site;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DocumentEavTypeCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return DocumentEavType::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Information(s) du nouveau groupe d\'attributs'),
            IdField::new('documentEavTypeId', 'ID')->hideOnForm(),
            TextField::new('documentEavTypeCode', 'Code unique'),
            TextField::new('documentEavTypeTitle', 'Titre'),
            IntegerField::new('documentEavTypeOrder', 'Ordre / Placement'),
            AssociationField::new('documentEavs', 'Attributs')
                ->hideOnIndex()
        ];
    }
}