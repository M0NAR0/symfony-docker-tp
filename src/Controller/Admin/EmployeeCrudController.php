<?php

namespace App\Controller\Admin;

use App\Entity\Employee;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EmployeeCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Employee::class;
    }

    /**
     * @param string $pageName
     * @return iterable
     */
    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Informations personnelles'),
            IdField::new('id', 'ID')->hideOnForm(),
            TextField::new('employeeFirstname', 'Prénom'),
            TextField::new('employeeLastname', 'Nom'),
            TextField::new('email', 'Email'),
            TextField::new('password', 'Mot de passe')
                ->hideOnIndex(),
            TextField::new('employeeAddress' , 'Adresse'),
            TextField::new('employeeCity', 'Ville'),
            IntegerField::new('employeePostalCode', 'Code Postal'),
            ChoiceField::new('employeeGenre', 'Genre')->setChoices([
                'Genre' => [
                    'Homme' => true,
                    'Femme' => false
                ]
            ])->hideOnIndex(),
            FormField::addPanel('Role de l\'employé'),
            AssociationField::new('role', 'Role')
        ];
    }

}
