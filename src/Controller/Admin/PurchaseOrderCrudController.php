<?php

namespace App\Controller\Admin;

use App\Entity\PurchaseOrder;
use App\Form\PurchaseOrderProductForm;
use App\Repository\EmployeeRepository;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PurchaseOrderCrudController extends AbstractCrudController
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
     * PurchaseOrderCrudController constructor.
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
        return PurchaseOrder::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Bon de commande'),
            IdField::new('purchOrderId', 'ID')->hideOnForm(),
            AssociationField::new('provider', 'Fournisseur'),
            DateField::new('purchOrderCreatedAt', 'Créé(e) le')->hideOnForm(),
            AssociationField::new('employee', 'Employé')->hideOnForm(),
            BooleanField::new('purchOrderAskedPrice', 'Demande de prix ?'),
            CollectionField::new('purchaseOrderProducts', 'Produits')
            ->allowAdd()
            ->allowDelete()
            ->setEntryType(PurchaseOrderProductForm::class)
            ->hideOnIndex(),
            DateField::new('purchOrderDeliveryDate', 'Date de livraison'),
            TextField::new('purchOrderDeliveryLocation', 'Adresse de livraison'),
            IntegerField::new('purchOrderNbPage' , 'Nombre de pages')->hideOnIndex()
        ];
    }
    
    public function createEntity(string $entityFqcn)
    {
        $purchaseOrder = new PurchaseOrder();
        //Set default employee to the purchaseOrder
        //default employee is the one who's currenly logged in
        $employeeSession = $this->_session->get('employee_login');
        $employee = $this->_employeeRepository->findOneBy(['id' => $employeeSession['employee']->getId()]);

        $currentDate = new DateTime();

        $purchaseOrder->setEmployee($employee);
        $purchaseOrder->setPurchOrderCreatedAt($currentDate);

        return $purchaseOrder;
    }

    /**
     *
     * @param Actions $actions
     * @return Actions
     */
    public function configureActions(Actions $actions): Actions
    {
        $download = Action::new('Download', 'Télécharger')
            ->linkToRoute('purchase_order_export', function (PurchaseOrder $purchaseOrder): array {
                return [
                    'id' => $purchaseOrder->getPurchOrderId()
                ];
            });

        return
            $actions
                ->add(Crud::PAGE_INDEX, $download);
    }

}
