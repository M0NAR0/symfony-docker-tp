<?php

namespace App\Controller\Admin;

use App\Entity\Role;
use App\Entity\Site;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Site::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Informations sur le dossier chantier'),
            IdField::new('siteId', 'ID')->hideOnForm(),
            TextField::new('siteTitle', 'Titre'),
            BooleanField::new('siteNeuf', 'Neuf'),
            BooleanField::new('siteRenovation', 'Rénovation'),
            AssociationField::new('customer', 'Client'),
            DateField::new('siteCreatedAt', 'Date de création')
                ->hideOnForm(),
            AssociationField::new('documentEntities','Documents Associés')
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
        $seeDetails = Action::new('Detail', 'Détail')
            ->linkToRoute('site_detail', function (Site $site): array {
                return [
                    'id' => $site->getSiteId()
                ];
            });

        return
            $actions
                ->add(Crud::PAGE_INDEX, $seeDetails);
    }

}
