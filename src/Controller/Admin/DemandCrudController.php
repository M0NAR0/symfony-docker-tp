<?php

namespace App\Controller\Admin;

use App\Entity\Demand;
use App\Repository\EmployeeRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DemandCrudController extends AbstractCrudController
{
    /**
     * @var SessionInterface
     */
    private $_session;

    /**
     * @var EmployeeRepository
     */
    private $_employeeRepository;

    /**
     * DemandCrudController constructor.
     * @param SessionInterface $session
     * @param EmployeeRepository $employeeRepository
     */
    public function __construct(
        SessionInterface $session,
        EmployeeRepository $employeeRepository
    ){
        $this->_session = $session;
        $this->_employeeRepository = $employeeRepository;
    }

    public static function getEntityFqcn(): string
    {
        return Demand::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Nouvelle demande'),
            IdField::new('id')
                ->hideOnForm(),
            TextEditorField::new('message'),
            AssociationField::new('demandType', 'Type de demande'),
            AssociationField::new('employee', 'Employé')
                ->hideOnForm(),
            DateField::new('sending_date', 'Date de création')
                ->hideOnForm(),
            BooleanField::new('status', 'Terminé')
        ];
    }

    public function createEntity(string $entityFqcn)
    {
        $demand = new Demand();
        //Set default employee to the demand
        //default employee is the one who's currently logged in
        $employeeSession = $this->_session->get('employee_login');
        $employee = $this->_employeeRepository->findOneBy(['id' => $employeeSession['employee']->getId()]);
        $demand->setEmployee($employee);

        return $demand;
    }

}
