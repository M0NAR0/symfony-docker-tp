<?php

namespace App\Controller\Admin;

use App\Entity\Customer;
use App\Entity\Demand;
use App\Entity\DemandType;
use App\Entity\DocumentEav;
use App\Entity\DocumentEavType;
use App\Entity\DocumentEntity;
use App\Entity\DocumentEntityBoolean;
use App\Entity\DocumentEntityDate;
use App\Entity\DocumentEntityInt;
use App\Entity\DocumentEntityVarchar;
use App\Entity\DocumentType;
use App\Entity\Employee;
use App\Entity\Product;
use App\Entity\Provider;
use App\Entity\PurchaseOrder;
use App\Entity\ResetPassword;
use App\Entity\Role;
use App\Entity\Site;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @var SessionInterface
     */
    private $_session;

    /**
     * DashboardController constructor.
     * @param SessionInterface $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->_session = $session;
    }

    /**
     * @Route("/admin", name="admin")
     * @return Response
     */
    public function index() :Response
    {
        //check if an employee is logged in
        if (!$this->_session->get('employee_login')) {
            $redirect = $this->redirectToRoute('login');
        } else {
            $routeBuilder = $this->get(CrudUrlGenerator::class)->build();
            //get employee role title
            $employeeRoleTitle = $this->_session->get('employee_login')['roleTitle'];
            //get right redirection with employee role title in dashboard
            if ($employeeRoleTitle == "Administrateur") {
                $url = $routeBuilder->setController(EmployeeCrudController::class)->generateUrl();
            } else {
                $url = $routeBuilder->setController(SiteCrudController::class)->generateUrl();
            }

            $redirect = $this->redirect($url);
        }

        return $redirect;
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Plafitech FR');
    }

    public function configureMenuItems(): iterable
    {
        $employee = $this->_session->get('employee_login')['employee'];
        $currentRole = $employee->getRole()->getRoleId();

        yield MenuItem::linktoDashboard('Tableau de bord', 'fa fa-home');

        if (in_array($currentRole, [1])) {
            yield MenuItem::section('Gestion des employés');
            yield MenuItem::linkToCrud('Employés', 'fa fa-user', Employee::class);
            yield MenuItem::linkToCrud('Roles des employés', 'fa fa-crown', Role::class);
        }

        yield MenuItem::section('Gestion des demandes');
        yield MenuItem::linkToCrud('Demandes', 'fa fa-envelope', Demand::class);
        if (in_array($currentRole, [1])) {
            yield MenuItem::linkToCrud('Types de demandes', 'fa fa-mail-bulk', DemandType::class);
        }

        if (in_array($currentRole, [1,2])) {
            yield MenuItem::section('Gestion des commandes');
            yield MenuItem::linkToCrud('Commandes', 'fa fa-clipboard', PurchaseOrder::class);
            yield MenuItem::linkToCrud('Fournisseurs', 'fa fa-trailer', Provider::class);
            yield MenuItem::linkToCrud('Produits fournisseurs', 'fa fa-cube', Product::class);
        }

        yield MenuItem::section('Gestion des chantiers');
        if (in_array($currentRole, [1,2])) {
            yield MenuItem::linkToCrud('Clients', 'fa fa-users', Customer::class);
        }
        yield MenuItem::linkToCrud('Dossiers chantier', 'fa fa-map-pin', Site::class);

        if (in_array($currentRole, [1,2])) {
            yield MenuItem::section('Gestion des documents');
            yield MenuItem::linkToCrud('Documents', 'fa fa-file', DocumentEntity::class);
            yield MenuItem::linkToCrud('Types de documents', 'fa fa-file', DocumentType::class);

            yield MenuItem::section('Gestion des attributs Document');
            yield MenuItem::linkToCrud('Groupe d\'attributs', 'fa fa-file-alt', DocumentEavType::class);
            yield MenuItem::linkToCrud('Attributs', 'fa fa-file-alt', DocumentEav::class);
            yield MenuItem::linkToCrud('Cases à cocher', 'fa fa-file-alt', DocumentEntityBoolean::class);
            yield MenuItem::linkToCrud('Dates', 'fa fa-file-alt', DocumentEntityDate::class);
            yield MenuItem::linkToCrud('Nombres', 'fa fa-file-alt', DocumentEntityInt::class);
            yield MenuItem::linkToCrud('Chaines de caractères', 'fa fa-file-alt', DocumentEntityVarchar::class);
        }
    }
}
