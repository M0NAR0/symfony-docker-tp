<?php

namespace App\Controller\Admin;

use App\Entity\Customer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CustomerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Customer::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Informations Client / Société'),
            IdField::new('customerId', 'ID')->hideOnForm(),
            TextField::new('customerCompany', 'Nom de la société'),
            TextField::new('customerAddress', 'Adresse'),
            TextField::new('customerCity', 'Ville'),
            IntegerField::new('customerPostalCode', 'Code postal'),

            FormField::addPanel('Contact Client / Société'),
            TextField::new('customerContactName', 'Nom du contact'),
            TextField::new('customerDirection', 'Direction'),
        ];
    }

}
