<?php

namespace App\Controller\Admin;

use App\Entity\DocumentEntity;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DocumentEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DocumentEntity::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Informations du document'),
            IdField::new('documentId', 'ID')
                ->hideOnForm(),
            TextField::new('documentReference','Référence'),
            DateField::new('documentCreatedAt', 'Date de création')
                ->hideOnForm(),
            AssociationField::new('doctype', 'Type du document'),
            AssociationField::new('employee', 'En charge'),
            AssociationField::new('site', 'Dossier chantier'),
            AssociationField::new('documentEavTypes', 'Groupes d\'attributs')
                ->hideOnIndex()
        ];
    }

    /**
     *
     * @param Actions $actions
     * @return Actions
     */
    public function configureActions(Actions $actions): Actions
    {
        $seeDetails = Action::new('pdf', 'Télécharger')
            ->linkToRoute('document_export', function (DocumentEntity $document): array {
                return ['id' => $document->getDocumentId()];
            });

        return $actions->add(Crud::PAGE_INDEX, $seeDetails);
    }

}
